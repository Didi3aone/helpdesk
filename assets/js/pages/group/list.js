var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "/pabrik/master-pabrik/list-all-data";
    var columns = [
        {"data": "nama" },
        {"data": "alamat" ,"sortable": false},
        {"data": "kabupaten_name" },
        {"data": "kecamatan_name" },
        {"data": "latitude" },
        {"data": "longitude" },
        {"data": "luas_bangunan" },
        {"data": "kategori_name" },
        {"data": "is_active_name" },
        {
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {
                var edit =  '<td>';
                            if (full.is_active == "1") {
                    edit +=  ' <a href="/pabrik/master-pabrik/edit/' + full.pabrik_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit Pabrik" data-placement="top" ><i class="fa fa-pencil"></i></a>' +
                             ' <a href="/pabrik/master-pabrik/delete" data-id ="' + full.pabrik_id + '" data-name ="' + full.nama + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Pabrik" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
                            } else {
                    edit +=  ' <a href="/pabrik/master-pabrik/reactivate" data-id ="' + full.pabrik_id + '" data-name ="' + full.nama + '" class="btn btn-danger btn-circle reactivate-confirm" rel="tooltip" title="Reactivate Pabrik" data-placement="top" ><i class="fa fa-power-off"></i></a>';
                            }
                    edit +=  '</td>';

                return edit;
            }
        },
    ];
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

var export_btn = function () {
    $(".export-btn").click(function() {

        $.ajax({
            type: "post",
            url: "/pabrik/master-pabrik/process-export",
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
                        var $a = $("<a>");
                        $a.attr("href",data.file_data);
                        $("body").append($a);
                        $a.attr("download",data.filename + ".xlsx");
                        $a[0].click();
                        $a.remove();
                    });
                }
            },
            error: function() {
                $('.loading-box').css("display", "none");
                swal("Error!", "Something Went wrong", "error");
            }
        });
    });
}

$(document).ready(function() {
    lists();
    export_btn();
});
