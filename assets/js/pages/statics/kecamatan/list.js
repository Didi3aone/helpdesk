// Export
var goExport = function (){
    //init validate form org
    var create_form = "#form";
    var create_rules = "";

    init_validate_form (create_form,create_rules);
};

//js for datatable list.
var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "/statics/kecamatan/list-all-data";
    var columns = [
        {"data": "kecamatan_name" },
        {"data": "kabupaten_name" },
        {"data": "is_active_name" },
        {"data": "version" },
        {
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {

                //action buttons.
                var buttons =  '<td>';
                buttons +=  ' <a href="/statics/kecamatan/edit/' + full.kecamatan_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Kecamatan" data-placement="top" ><i class="fa fa-pencil"></i></a>';
                if (full.is_active == "1") {
                    buttons +=  ' <a href="/statics/kecamatan/delete" data-id ="' + full.kecamatan_id + '" data-name ="' + full.kecamatan_name + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Kecamatan" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                } else {
                    buttons +=  ' <a href="/statics/kecamatan/reactivate" data-id ="' + full.kecamatan_id + '" data-name ="' + full.kecamatan_name + '" class="btn btn-danger btn-circle reactivate-confirm" rel="tooltip" title="Reactivate Kecamatan" data-placement="top" ><i class="fa fa-power-off"></i></a>';
                }
                buttons +=  '</td>';

                return buttons;
            }
        },
    ];

    //setup datepicker for advanced search.
    setup_daterangepicker(".date-range-picker");

    //begin initialize datatable.
    init_datatables (table_id, ajax_source, columns);

    //on delete action button click.
    $(document).on("click", ".delete-confirm", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url = $(this).attr("href");
        var data_id = $(this).data("id");
        var data_name = $(this).data("name");

        title = 'Delete Confirmation';
        content = 'Do you really want to delete ' + data_name + ' ?';

        popup_confirm (url, data_id, title, content);

    });

    //on reactivate action button click.
    $(document).on("click", ".reactivate-confirm", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url = $(this).attr("href");
        var data_id = $(this).data("id");
        var data_name = $(this).data("name");

        title = 'Re-activate Confirmation';
        content = 'Do you really want to re-activate ' + data_name + ' ?';

        popup_confirm (url, data_id, title, content);

    });

    //on popup confirm trigger success.
    $(document).on("popup-confirm:success", function (e, url, data_id){
        $("#dataTable").dataTable().fnClearTable();
    });
};

$(document).ready(function() {
    var $a = $("<a>");

    goExport();
    lists();

    $(document).on("form-submit:success", function(e, form , data) {
        console.log("here");
        $a.attr("href",data.file_data);
        $("body").append($a);
        $a.attr("download",data.filename + ".xlsx");
        $a[0].click();
        $a.remove();
    });

});
