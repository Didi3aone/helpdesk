var create = function (){
    //init validate form org
    var create_form = "#group-form";
    var create_rules = {
        nama: {
            required: true,
            maxlength:100,
        },
        code: {
            required: true,
        },
    };

    init_validate_form (create_form,create_rules);
};

$(document).ready(function() {
    create();
});
