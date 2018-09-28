<script>
	var create = function (){
    //init validate form org
    var create_form = "#user-form";
    var create_rules = {
        name: {
            required: true,
        },
        username: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },
        email: {
            required: true,
            email: true,
        },
        password: {
            required: true,
            minlength: 6,
            maxlength: 20,
        },
        conf_password: {
            required: true,
            minlength: 6,
            maxlength: 20,
            equalTo: "#password"
        },
        new_password: {
            minlength: 6,
            maxlength: 20,
        },
        conf_new_password: {
            minlength: 6,
            maxlength: 20,
            equalTo: "#new_password"
        },
    };

    init_validate_form (create_form,create_rules);
};

    $('#role').change(function() {
        if ($(this).val() === '3') {
            $("#id_1").show();
            $("#id_2").show();
        } else {
            $("#id_1").hide();
            $("#id_2").hide();
        }
    });

$(document).ready(function() {
    create();
});

</script>