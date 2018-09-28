var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "/source/cabang/list-all-data";
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
        {
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {
                var edit =  '<td>';
                    edit +=  ' <a href="/source/cabang/view/' + full.kode_cabang + '" class="btn btn-info btn-circle" rel="tooltip" title="View" data-placement="top" ><i class="fa fa-eye"></i></a>';
                    edit +=  '</td>';

                return edit;
            }
        },
    ];
    setup_daterangepicker(".date-range-picker");
    init_datatables (table_id, ajax_source, columns);

};

var sync = function (){
    //init validate form org
    var import_form = "#sync-form";

    init_validate_form (import_form);
};

$(document).ready(function() {
    lists();
    sync();
});
