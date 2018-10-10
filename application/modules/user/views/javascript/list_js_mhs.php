<script>
	var lists = function () {
    var table_id = "#dataTable";
    var ajax_source = "<?= site_url('user/list-all-datas') ?>";
    var url = "<?= site_url('mahasiswa/'); ?>"
    var columns = [
        {"data": "user_nim" },
        {"data": "user_full_name" },
        {"data": "FakultasName" },
        {"data": "JurusanName" },
        {"data": "user_email" },
        {
            "title": "Action",
            "class": "text-center",
            "data": null,
            "sortable": false,
            "render": function(data, type, full) {
                var edit =  '<td>';
                    // edit +=  ' <a href="'+ url +'view/' + full.user_id + '" class="btn btn-info btn-circle" rel="tooltip" title="View user" data-placement="top" ><i class="fa fa-eye"></i></a>';
                    // edit +=  ' <a href="'+ url +'edit/' + full.user_id + '" class="btn btn-primary btn-circle" rel="tooltip" title="Edit user" data-placement="top" ><i class="fa fa-pencil"></i></a>';
                    edit +=' <a href="'+ url +' delete" data-id ="' + full.user_id + '" data-name ="' + full.user_full_name + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete user" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
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

</script>