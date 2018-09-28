var create = function (){
    //init validate form.
    var create_form = "#form";
    var create_rules = {
        kode_area: {
            required: true,
            minlength: 2,
            maxlength: 20,
        },
    };
    //call it.
    init_validate_form (create_form, create_rules);
};

$(document).ready(function() {
    create();
});
