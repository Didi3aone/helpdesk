var create = function (){
    //init validate form org
    var create_form = "#create-form";
    var create_rules = {
        kabupaten: {
            required: true,
        },
        kecamatan: {
            required: true,
        },
        kode_area: {
            required: true,
        },
        kode_cabang: {
            required: true,
        },
        nama_cabang: {
            required: true,
        },
    };

    init_validate_form (create_form,create_rules);
};

$(document).ready(function() {
    $("#tanggal_buka").datepicker();
    kabupaten_select();
    kecamatan_select();
    area_select();
    create();
});
