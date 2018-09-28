var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "/cabang/master-cabang/list-all-data";
    var columns = [
        {"data": "kode_cabang" },
        {"data": "nama_cabang" },
        {"data": "alamat" ,"sortable": false},
        {"data": "kode_area" },
        {"data": "kelas" },
        {
            "data": "tanggal_buka",
            "render":function(data, type, full) {
                if (data != null && data != "") {
                    return moment(data).format("DD MMM YYYY");
                }

                return "";
            }
        },
        {"data": "status_sewa" },
        {"data": "luas_bangunan" },
        {"data": "is_active_name" },
        {
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {
                var edit =  '<td>';
                    edit +=  ' <a href="/cabang/master-cabang/view/' + full.kantor_cabang_id + '" class="btn btn-info btn-circle" rel="tooltip" title="View" data-placement="top" ><i class="fa fa-eye"></i></a>';
                    edit +=  ' <a href="/cabang/master-cabang/map/' + full.kantor_cabang_id + '" class="btn btn-info btn-circle" rel="tooltip" title="Map" data-placement="top" ><i class="fa fa-map-marker"></i></a>';
                    if (full.is_active == 1) {
                        edit +=  ' <a href="/cabang/master-cabang/edit/' + full.kantor_cabang_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Cabang" data-placement="top" ><i class="fa fa-pencil"></i></a>' +
                             ' <a href="/cabang/master-cabang/deactivate" data-id ="' + full.kantor_cabang_id + '" data-name ="' + full.nama_cabang + '" class="btn btn-danger btn-circle deactivate-confirm" rel="tooltip" title="Deactivate Cabang" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                    } else {
                        edit +=  ' <a href="/cabang/master-cabang/reactivate" data-id ="' + full.kantor_cabang_id + '" data-name ="' + full.nama_cabang + '" class="btn btn-danger btn-circle reactivate-confirm" rel="tooltip" title="Reactivate Cabang" data-placement="top" ><i class="fa fa-power-off"></i></a>';
                    }
                    edit +=  '</td>';

                return edit;
            }
        },
    ];
    setup_daterangepicker(".date-range-picker");
    init_datatables (table_id, ajax_source, columns);

    $(document).on("click", ".deactivate-confirm", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url = $(this).attr("href");
        var data_id = $(this).data("id");
        var data_name = $(this).data("name");

        title   = 'Delete Confirmation';
        content = 'Do you really want to deactivate ' + data_name + ' ?';

        popup_confirm (url, data_id, title, content);

    });

    $(document).on("click", ".reactivate-confirm", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url       = $(this).attr("href");
        var data_id   = $(this).data("id");
        var data_name = $(this).data("name");

        title   = 'Re-activate Confirmation';
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
