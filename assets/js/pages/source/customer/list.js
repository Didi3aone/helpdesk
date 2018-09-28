var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "/source/customer/list-all-data";
    var columns = [
        {"data": "kode_customer" },
        {"data": "nama_customer" },
        {"data": "alamat" ,"sortable": false},
        {"data": "kategori_customer" },
        {"data": "customer_avian" },
        {"data": "nama_cabang" },
        {"data": "kabupaten" },
        {"data": "kecamatan" },
        {
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {
                var edit =  '<td>';
                    edit +=  ' <a href="/source/customer/view/' + full.kode_customer + '" class="btn btn-info btn-circle" rel="tooltip" title="View" data-placement="top" ><i class="fa fa-eye"></i></a>';
                    edit +=  '</td>';

                return edit;
            }
        },
    ];
    setup_daterangepicker(".date-range-picker");
    init_datatables (table_id, ajax_source, columns);

};

$(document).ready(function() {
    lists();
});
 
$(document).on("click", ".btn_sync", function(e) {
    e.stopPropagation();
    e.preventDefault();
    var url = $(this).attr("href");
    
    swal({
        title: 'Sync Confirmation',
        text: 'Do you really want to sync?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: "Yes",
    }).then(function () {
        $.ajax({
            type: "post",
            url: url,
            cache: false,
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
                        $(document).trigger("popup-confirm:success", [url]);
                    });
                }
            },
            error: function() {
                $('.loading-box').css("display", "none");
                swal("Error!", "Something Went wrong", "error");
            }
        });
    }).catch(swal.noop);;

});

