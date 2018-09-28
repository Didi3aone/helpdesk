
var exports = function (){
    //init validate form org
    var create_form = "#form";
    var create_rules = {
        name: {
            required: true,
        },
        groups: {
            groups: true,
        },
    };

    init_validate_form (create_form,create_rules);
};

/**
 * export player
 */
function export_customer_name ()
{
	//select2 for players name.
	$(".select-customer-name").select2({
	    ajax: {
	        url: "/customer/master-customer/list-customer-name",
	        dataType: "json",
	        delay: 500,
	        data: function(params) {
	            return {
	                q: params.term,
	                page: params.page
	            };
	        },
	        processResults: function (data, params) {

	            params.page = params.page || 1;

	            return {
	                results: $.map(data.datas, function (item) {
	                    return {
	                        text: item.nama_customer,
	                        id: item.customer_id,
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
	});
}

$(document).ready(function() {
	exports();
	export_customer_name();

    var $a = $("<a>");

    $(document).on("form-submit:success", function(e, form , data) {
        console.log("here");
        $a.attr("href",data.file_data);
        $("body").append($a);
        $a.attr("download",data.filename + ".xlsx");
        $a[0].click();
        $a.remove();
    });
});
