var create = function (){
    //init validate form.
    var create_form = "#form";
    var create_rules = {
        kabupaten_name: {
            required: true,
        },
    };
    //call it.
    init_validate_form (create_form, create_rules);
};

$(document).ready(function() {
    create();
});
