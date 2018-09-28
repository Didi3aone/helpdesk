/**
 * extend string function, add function replaceAll for string
 */
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    target.search(new RegExp(search, 'g'));
    return target.replace(new RegExp(search, 'g'), replacement);
};

/**
 * function to call form
 * ==== PARAMS ====
 * @form_id : element of form , eg : #form-id
 * @rules : object rules , eg : { name: { required:true } }
 * @message : object message, eg : { name: { required:"nama harus diisi." } }
 * ==== TRIGGER =====
 * form-submit:success => saat form submit sudah sukses.
 * form-submit:noredirect => jika result dari json tidak di redirect.
 */
function init_validate_form (form_id, rules = {} , message = {}, extra_form = [], submit_form = true) {
    $(form_id).validate({
        errorClass: 'invalid',
        errorElement: 'em',
        ignore: [],
        highlight: function(element) {
            $(element).parent().removeClass('state-success').addClass("state-error");
            $(element).removeClass('valid');
        },
        unhighlight: function(element) {
            $(element).parent().removeClass("state-error").addClass('state-success');
            $(element).addClass('valid');
        },
        // Rules for form validation
        rules: rules,
        // Messages for form validation
        messages: message,
        // Ajax form submition.
        submitHandler: function(form) {
            if (submit_form == false) {
                // do nothing
                $(document).trigger("form-submit:noajax", [form_id]);
            } else {
                var extra_data = [];
                var valid = true;
                if (extra_form.length > 0) {
                    $.each(extra_form, function( key, value ) {
                        if (valid == true) {
                            //check form if valid
                            if ($(value).valid() == false) {
                                valid = false;
                            } else {
                                var form_data = $(value).serializeArray();
                                if (form_data.length > 0) extra_data = $.merge(extra_data, form_data);
                            }
                        }

                    });
                }

                if (valid == true) {
                    $(form).ajaxSubmit({
                        dataType: 'json',
                        data: extra_data,
                        beforeSerialize: function(form, options) {

                            // return false to cancel submit
                            $.each(extra_form, function( key, value ) {
                                if ($(value + ' input[type="file"]').length > 0) {

                                    $(value + ' input[type="file"]').each(function($i){
                                        var element_file = $(this).clone().css("display","none");
                                        var name = $(this).prop("name");

                                        if ($(form_id + ' > input[type="file"][name="'+ name +'"]').length > 0) {
                                            $(form_id + ' > input[type="file"][name="'+ name +'"]').remove();
                                        }

                                        $(form).append(element_file);
                                    });
                                }
                            });
                        },
                        beforeSend: function() {
                            $(form).find("button").attr('disabled', true);
                            $('.loading-box').css("display", "block");
                        },
                        success: function(data) {
                            $('.loading-box').css("display", "none");
                            //validate if success or not.
                            if (data['is_error']) {
                                swal("Oops!", data['error_msg'], "error");
                                $(form).find("button").attr('disabled', false);

                            } else {
                                //success.
                                $.smallBox({
                                    title: '<strong>' + data['notif_title'] + '</strong>',
                                    content: data['notif_message'],
                                    color: "#659265",
                                    iconSmall: "fa fa-check fa-2x fadeInRight animated",
                                    timeout: 1000
                                }, function() {
                                    //triger form submit success
                                    $(document).trigger("form-submit:success", [form_id,data]);

                                    if (data['redirect_to'] == "") {
                                        $(form)[0].reset();
                                        $(form).find("button").attr('disabled', false);

                                        //triger form submit no redirection
                                        $(document).trigger("form-submit:noredirect", [form_id,data]);
                                    } else {
                                        go(data['redirect_to']);
                                    }
                                });
                            }
                        },
                        error: function() {
                            $('.loading-box').css("display", "none");
                            $(form).find("button").attr('disabled', false);
                            swal("Oops!", "Something went wrong.", "error");
                        }
                    });
                }

            }

        },
        // Do not change code below
        errorPlacement: function(error, element) {
            error.insertAfter(element.parent());
        }
    });
}

/**
 * function to call data tables , with or without extra params
 * ==== PARAMS ====
 * @table_id : element of table , eg : #table-id
 * @ajax_source : "/group-usaha/list_all_data"
 * @columns : "/group-usaha/list_all_data" eg :
    [ {
         "sTitle": "Id",
         "mData": "group_id"
     } ];
 * @extra_params : function name , eg : dothis
 * @sorting : array of sorting , eg :
    [
        [0, "desc"]
    ]
 * @display_length : display in one page.
 */
function init_datatables (table_id, ajax_source = "", columns = "", extra_params = [".filter-this"], sorting = false , display_length = 50) {
    var responsiveHelper_dt_basic = undefined;
    var breakpointDefinition = {
        desktop: 1320,
        tablet: 1024,
        phone: 480
    };

    if (sorting == false) {
        sorting = [
            [0, "desc"]
        ];
    }

    if (ajax_source === "") {
        //jika data tidak memakai ajax
        $(table_id).dataTable({
            "dom": "<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
    		"paging": false,
            "preDrawCallback": function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($(table_id), breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_dt_basic.respond();
            }

        });
    } else {
        //f represent filter
        $(table_id).dataTable({
            "dom": "<'dt-toolbar'<'col-xs-12 col-sm-6'><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "order": sorting,
            "pageLength": display_length,
            "pagingType": "full_numbers",
            "processing" : true,
            "serverSide": true,
    		"ajax": {
                "url" : ajax_source,
                "data" : function ( d ) {
                    var extra = [];
                    if (extra_params) {
                        $.each(extra_params, function( key, value ) {
                            var form_data = $(value).serializeArray();
                            $.each(form_data, function( form_key, value ) {
                                var name = value.name;
                                d[name] = value.value;
                            });
                        });
                    }

                    return d;
                }
            },
            "columns": columns,
            "preDrawCallback": function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($(table_id), breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_dt_basic.respond();
            }

        });
    }

    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 800;  //time in ms, 1 second for example

    $(table_id + " input[type=text].filter-this").on( 'keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function () {
            $(table_id).dataTable().fnClearTable();
        }, doneTypingInterval);
    });

    $(table_id + " select.filter-this, " + table_id + " input[type=radio].filter-this").on( 'change', function () {
        $(table_id).dataTable().fnClearTable();
    });

    $(table_id + " .filter-this").on( 'keydown', function () {
        clearTimeout(typingTimer);
    });

    $(table_id + " .clear-filter").on( 'click', function () {
        $( this ).closest( ".input-group" ).find("input").val("");
        $(table_id).dataTable().fnClearTable();
    });

    $('.adv-search-form #reset-button').on("click", function() {
        $('.adv-search-form')[0].reset();
        var table_id = $(this).parents(".widget-body").find("table");
        $(table_id).dataTable().fnClearTable();
    });

    $('.adv-search-form #search-button').on("click", function() {
        var table_id = $(this).parents(".widget-body").find("table");
        $(table_id).dataTable().fnClearTable();
    });

}

// function to init select to , date picker , or both
function init_datepicker (selector = ".datepicker-addon", year_range = "c-100:c") {
    $(selector).datepicker({
        dateFormat : 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        prevText : '<i class="fa fa-chevron-left"></i>',
        nextText : '<i class="fa fa-chevron-right"></i>',
        yearRange: year_range
    });
}

/**
 * setup a single date picker.
 */
function setup_singledatepicker (elementID, format_locale="DD/MM/YYYY") {
    /**
     * to setup a single date picker.
     */
    $(elementID).daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            autoApply: true,
            opens: "left",
            locale: { format: format_locale },
        },
        function(start, end, label) {
            //console.log('New date range selected: ' + start.format('DD/MM/YYYY') + ' to ' + end.format('DD/MM/YYYY'));
        }
    );

    $(elementID).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY'));

        //if it contains "filter-this" class, then it should be filter.
        if ($(this).hasClass("filter-this")) {
            var table_id = $(this).parents("table").attr("id");
            $("#" + table_id).dataTable().fnClearTable();
        }
    });

    $(elementID).on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');

        //if it contains "filter-this" class, then it should be filter.
        if ($(this).hasClass("filter-this")) {
            var table_id = $(this).parents("table").attr("id");
            $("#" + table_id).dataTable().fnClearTable();
        }
    });

    //add listener for open-calendar-button class.
    $('.open-calendar-button').on("click", function() {
        //open the calendar.
        var input = $(this).parents("div").prev("input");
        input.focus();
    });
}

/**
 * setup daterange picker.
 */
function setup_daterangepicker (elementID, format_locale="DD/MM/YYYY") {
    /**
     * to setup advanced search date pickers...
     */
    $(elementID).daterangepicker({
            autoUpdateInput: false,
            linkedCalendars: false,
            showDropdowns: true,
            autoApply: false,
            opens: "left",
            locale: {
                applyLabel: "Pilih",
                cancelLabel: "Hapus",
                customRangeLabel: "Tentukan sendiri",
                format: format_locale
            },
            ranges: {
                'Hari ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
                'Tahun kemarin': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            }
        },
        function(start, end, label) {
            //console.log('New date range selected: ' + start.format('DD/MM/YYYY') + ' to ' + end.format('DD/MM/YYYY'));
        }
    );

    $(elementID).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' ~ ' + picker.endDate.format('DD/MM/YYYY'));

        //if it contains "filter-this" class, then it should be filter. (datatables)
        if ($(this).hasClass("filter-this")) {
            var table_id = $(this).parents("table").attr("id");
            $("#" + table_id).dataTable().fnClearTable();
        }
    });

    $(elementID).on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');

        //if it contains "filter-this" class, then it should be filter. (datatables)
        if ($(this).hasClass("filter-this")) {
            var table_id = $(this).parents("table").attr("id");
            $("#" + table_id).dataTable().fnClearTable();
        }
    });

    //add listener for open-calendar-button class.
    $('.open-calendar-button').on("click", function() {
        //open the calendar.
        var input = $(this).parents("div").prev("input");
        input.focus();
    });
}

var init_color_picker = function (element = ".colorpicker") {
    $(element).colorpicker({
        customClass: 'colorpicker-2x',
        sliders: {
            saturation: {
                maxLeft: 200,
                maxTop: 200
            },
            hue: {
                maxTop: 200
            },
            alpha: {
                maxTop: 200
            }
        }
    });
}

function init_select (selector = ".select2") {
    $(selector).select2({
        allowClear : true,
        width : '100%'
    });
}

/**
 * function for popup delete with ajax
 * ==== PARAMS ====
 * @url : url untuk delete , eg : "/orang/delete"
 * @data_id : id untuk delete , eg : 1
 * @title : title dari pop up , eg : "Delete Confirmation"
 * @content : content dari pop up , eg : "want to delete ?"
 * ==== TRIGGER =====
 * delete-confirm:success => saat form submit sudah sukses.
 */
function popup_confirm (url, data_id, title = false, content = false, replace_data = false, type="warning") {
    if (title === false) title = 'Delete Confirmation';
    if (content === false) content = 'Do you really want to delete this ?';
    if (replace_data === false) replace_data = { id: data_id };

    swal({
        title: title,
        text: content,
        type: type,
        showCancelButton: true,
        confirmButtonText: "Yes",
    }).then(function () {
        $.ajax({
            type: "post",
            url: url,
            cache: false,
            data: replace_data,
            dataType: 'json',
            beforeSend: function() {
                $('.loading-box').css("display", "block");
            },
            success: function(data) {
                $('.loading-box').css("display", "none");

                if (data.is_error == true) swal("Error!", data.error_msg, "error");
                else {
                    $.smallBox({
                        title: '<strong>' + data.notif_title + '</strong>',
                        content: data.notif_message,
                        color: "#659265",
                        iconSmall: "fa fa-check fa-2x fadeInRight animated",
                        timeout: 2000
                    }, function() {
                        $(document).trigger("popup-confirm:success", [url,data_id,data]);
                    });
                }
            },
            error: function() {
                $('.loading-box').css("display", "none");
                swal("Error!", "Something Went wrong", "error");
            }
        });
    }).catch(swal.noop);;
}

function go(dest) {
    location.href = dest;
}

function kabupaten_select () {
    $( "select.kabupaten-select" ).select2({
        ajax: {
            url: "/statics/kabupaten/get-list-kabupaten",
            dataType: "json",
            delay: 500,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page,
                };
            },
            processResults: function(data, params) {

                params.page = params.page || 1;

                return {
                    results: $.map(data.datas, function(item) {
                        return {
                            text: item.kabupaten_name,
                            id: item.kabupaten_id,
                        }
                    }),
                    pagination: {
                        more: (params.page * data.paging_size) < data.total_data,
                    }
                };
            },
            cache: true,
        },
        minimumInputLength: 0,
        allowClear: true,
        placeholder: "Pilih Kabupaten",
    });
}

function kecamatan_select () {
    $( "select.kecamatan-select" ).select2({
        ajax: {
            url: "/statics/kecamatan/get-list-kecamatan",
            dataType: "json",
            delay: 500,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page,
                };
            },
            processResults: function(data, params) {

                params.page = params.page || 1;

                return {
                    results: $.map(data.datas, function(item) {
                        return {
                            text: item.kecamatan_name,
                            id: item.kecamatan_id,
                        }
                    }),
                    pagination: {
                        more: (params.page * data.paging_size) < data.total_data,
                    }
                };
            },
            cache: true,
        },
        minimumInputLength: 0,
        allowClear: true,
        placeholder: "Pilih Kecamatan",
    });
}

function kantor_cabang_select () {
    $( "select.kantor-cabang-select" ).select2({
        ajax: {
            url: "/cabang/master-cabang/get-list-cabang",
            dataType: "json",
            delay: 500,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page,
                };
            },
            processResults: function(data, params) {

                params.page = params.page || 1;

                return {
                    results: $.map(data.datas, function(item) {
                        return {
                            text: item.nama_cabang,
                            id: item.kantor_cabang_id,
                        }
                    }),
                    pagination: {
                        more: (params.page * data.paging_size) < data.total_data,
                    }
                };
            },
            cache: true,
        },
        minimumInputLength: 0,
        allowClear: true,
        placeholder: "Pilih Kantor Cabang",
    });
}

function area_select () {
    $( "select.area-select" ).select2({
        ajax: {
            url: "/statics/area/get-list-area",
            dataType: "json",
            delay: 500,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page,
                };
            },
            processResults: function(data, params) {

                params.page = params.page || 1;

                return {
                    results: $.map(data.datas, function(item) {
                        return {
                            text: item.kode_area,
                            id: item.area_id,
                        }
                    }),
                    pagination: {
                        more: (params.page * data.paging_size) < data.total_data,
                    }
                };
            },
            cache: true,
        },
        minimumInputLength: 0,
        allowClear: true,
        placeholder: "Pilih Area",
    });
}

function kategori_customer_select () {
    $( "select.kategori-customer-select" ).select2({
        ajax: {
            url: "/statics/kategori-customer/get-list-kategori-customer",
            dataType: "json",
            delay: 500,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page,
                };
            },
            processResults: function(data, params) {

                params.page = params.page || 1;

                return {
                    results: $.map(data.datas, function(item) {
                        return {
                            text: item.kategori_name,
                            id: item.kategori_customer_id,
                        }
                    }),
                    pagination: {
                        more: (params.page * data.paging_size) < data.total_data,
                    }
                };
            },
            cache: true,
        },
        minimumInputLength: 0,
        allowClear: true,
        placeholder: "Pilih Kategori Customer",
    });
}

$(function () {
    // console.log($.isFunction($.fn.pageSetUp));
    // if ($.fn.pageSetUp) {
        //do something
        // pageSetUp();
    // }

    $('body').tooltip({selector:'[rel="tooltip"]'});

    //submit handler from external button.
    $(".submit-form").on("click", function() {
        var formID = $(this).data("form-target");
        $("#" + formID).submit();
    });

    if ($(".menu-head > ul > li.active").length > 0) {
        $.each ($(".menu-head > ul > li.active") , function (index, val) {
            $(val).find("ul").show();
            $(val).addClass("open");
            $(val).find(".fa-plus-square-o").removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
        });
        $(this).addClass("active");
    }

});
