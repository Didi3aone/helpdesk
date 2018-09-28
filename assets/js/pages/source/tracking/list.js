var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "/source/tracking/list-all-data";
    var columns = [
        {
            "data": "nama_karyawan",
            "render": function(data, type, full) {
                return "[" + full.kode_karyawan + "] " + data;
            }
        },
        {"data": "nama_cabang"},
        {"data": "tracking_datetime", "render": function(data, type, full) {
            if (data != null && data != "") {
                return moment(data).format("DD MMM YYYY HH:mm:ss");
            }

            return "";
        }},
        {"data": "latitude" },
        {"data": "longitude" },
        {"data": "achievement_all" },
        {"data": "achievement_cat_div_1" },
        {"data": "achievement_cat_div_2" },
        {"data": "achievement_cat_div_3" },
        {"data": "achievement_mebel" },
        {"data": "achievement_pipa" },
    ];
    setup_daterangepicker(".date-range-picker");
    init_datatables (table_id, ajax_source, columns);

};

$(document).ready(function() {
    lists();

    $(document).on("click", ".btn_sync", function(e) {
        e.stopPropagation();
        e.preventDefault();
        var url = $(this).attr("href");

        title = 'Sync Confirmation';
        content = 'Do you really want to Sync data ?';

        popup_confirm (url, 0, title, content, {});

    });
});
