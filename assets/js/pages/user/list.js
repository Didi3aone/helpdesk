var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "/admin/list-all-data";
    var columns = [
        {"data": "admin_id" },
        {"data": "name" },
        {"data": "username" },
        {"data": "email" },
        {"data": "admin_type_name" },
        {
            "data": "last_login_time",
            "render":function(data, type, full) {
                if (data != null && data != "") {
                    return moment(data).format("DD MMM YYYY HH:mm:ss");
                }

                return "";
            }
        },
        {"data": "is_active_name" },
        {
            "title": "Action",
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {
                var edit =  '<td>';
                    edit +=  ' <a href="/admin/view/' + full.admin_id + '" class="btn btn-info btn-circle" rel="tooltip" title="View Admin" data-placement="top" ><i class="fa fa-eye"></i></a>';
                            if (full.is_active == "1") {
                    edit +=  ' <a href="/admin/edit/' + full.admin_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Admin" data-placement="top" ><i class="fa fa-pencil"></i></a>' +
                             ' <a href="/admin/delete" data-id ="' + full.admin_id + '" data-name ="' + full.name + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Admin" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                            } else {
                    edit +=  ' <a href="/admin/reactivate" data-id ="' + full.admin_id + '" data-name ="' + full.name + '" class="btn btn-danger btn-circle reactivate-confirm" rel="tooltip" title="Reactivate Admin" data-placement="top" ><i class="fa fa-power-off"></i></a>';
                            }
                    edit +=  '</td>';

                return edit;
            }
        },
    ];
    setup_daterangepicker(".date-range-picker");
    init_datatables (table_id, ajax_source, columns);

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

    $(document).on("popup-confirm:success", function (e, url, data_id){
        $("#dataTable").dataTable().fnClearTable();
    });
};

$(document).ready(function() {
    lists();
});
