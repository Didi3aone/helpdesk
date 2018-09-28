var create = function (){
    //init validate form.
    var create_form = "#form";
    var create_rules = {
        kecamatan: {
            required: true,
            minlength: 2,
            maxlength: 50,
        },
        kabupaten: {
            required: true,
        },
    };
    //call it.
    init_validate_form (create_form, create_rules);
};

$(document).ready(function() {
    kabupaten_select();
    create();
});
