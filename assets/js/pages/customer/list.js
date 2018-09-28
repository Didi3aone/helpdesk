var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "/customer/master-customer/list-all-data";
    var columns = [
        {"data": "kode_customer" },
        {"data": "nama_customer" },
        {"data": "kategori_name" },
        {"data": "nama_cabang" },
        {"data": "kabupaten_name" },
        {"data": "kecamatan_name" },
        {"data": "is_active_name" },
        {
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {
                var edit =  '<td>';
                    edit += ' <a href="/customer/master-customer/view/' + full.customer_id + '" class="btn btn-info btn-circle" rel="tooltip" title="View" data-placement="top" ><i class="fa fa-eye"></i></a>';
                    edit += ' <a href="/customer/master-customer/edit/' + full.customer_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Customer" data-placement="top" ><i class="fa fa-pencil"></i></a>';
                    if (full.is_active == "1") {
                        edit +=  ' <a href="/customer/master-customer/delete" data-id ="' + full.customer_id + '" data-name ="' + full.nama_customer + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Customer" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                    } else {
                        edit +=  ' <a href="/customer/master-customer/reactivate" data-id ="' + full.customer_id + '" data-name ="' + full.nama_customer + '" class="btn btn-danger btn-circle reactivate-confirm" rel="tooltip" title="Reactivate Customer" data-placement="top" ><i class="fa fa-power-off"></i></a>';
                    }
                    edit += '</td>';

                return edit;
            }
        },
    ];
    setup_daterangepicker(".date-range-picker");
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
    lists();
});
