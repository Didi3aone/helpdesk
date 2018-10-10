<script>
	var create = function (){
    //init validate form org
    var create_form = "#fak-form";
    var create_rules = {
        kode: {
            required: true,
        },
        desc: {
            required: true,
        },
    };

    init_validate_form (create_form,create_rules);
};

$(document).ready(function() {
    create();
});

</script>