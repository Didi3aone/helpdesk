<script>
var change_profile = function (){
    //init validate form org
    var change_profile_form = "#changeprofile-form";
    var change_profile_rules = {
        name: {
            required: true,
        },
        nim: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
    };

    init_validate_form (change_profile_form,change_profile_rules);
};

$(document).ready(function() {
    change_profile();
});

</script>