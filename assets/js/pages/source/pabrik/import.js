var imports = function (){
    //init validate form org
    var import_form = "#import-form";
    var import_rules = {
        file: {
            required: true,
            extension: "xls|xlsx",
        },
    };

    init_validate_form (import_form,import_rules);
};

var empty_btn = function () {

    $(".empty-data").click(function () {
        var url = "/source/pabrik/empty-data";
        var title = "Warning";
        var content = "Are you sure you want to empty Pabrik Data ?"
        popup_confirm (url, false, title, content, {}, "warning");
    });
}

$(document).ready(function() {
    imports();
    empty_btn();
});
