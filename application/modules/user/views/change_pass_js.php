<script type="text/javascript">
    var change_pass = function (){
    //init validate form org
    var change_pass_form = "#changepass-form";
    var change_pass_rules = {
        password: {
            required: true,
            minlength: 6,
            maxlength: 12,
        },
        new_password: {
            required: true,
            minlength: 6,
            maxlength: 12,
        },
        confirm_password: {
            required: true,
            minlength: 6,
            maxlength: 12,
            equalTo: '#new_password'
        },
    };

    init_validate_form (change_pass_form,change_pass_rules);
};

$(document).ready(function() {
    change_pass();
});

</script>