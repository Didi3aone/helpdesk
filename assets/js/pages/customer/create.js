var create = function (){
    //init validate form.
    var create_form = "#form-1";
    var create_rules = {
        kode_customer: {
            required: true,
            minlength: 2,
            maxlength: 20,
        },
        nama_customer: {
            required: true,
            minlength: 2,
            maxlength: 100,
        },
        kategori_customer_id: {
            required: true,
        },
        latitude: {
            required: true,
        },
        longitude: {
            required: true,
        },
        kantor_cabang_id: {
        required: true,
        },
        kabupaten_id: {
            required: true,
        },
        kecamatan_id: {
            required: true,
        },
    };
    //call it.
    init_validate_form (create_form, create_rules, {}, ['#form-2', '#form-3']);
};

$(document).ready(function() {
    create();
    kabupaten_select();
    kecamatan_select();
    kategori_customer_select();
    kantor_cabang_select();

    $("#addimage").click(function (){
        var image_size = $(this).data("maxsize");
        var words_max_upload = $(this).data("maxwords");
        imageCropper ({
            target_form_selector : "#form-1",
            file_input_name : "image-file",
            data_crop_name : "data-image",
            image_ratio : 600/600,
            button_trigger_selector : "#addimage",
            image_preview_selector : ".add-image-preview",
            placeholder_path : "/img/placeholder/600x600.png",
            max_file_size : image_size,
            words_max_file_size : words_max_upload,
        } );
    });
});