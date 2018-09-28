//flag apakah sudah di init cropnya
var initcrop = 0;
//flag apakah dia add image
var addflag = 0;
//first flag waktu add image
var firstaddflag = {};
//set image name
var image_upload = "";
//nampung preview image sebelumnya
var preview_image = {};

var selectorElem = "#mAddimage .img-container > img";
var selectorPreview = "#mAddimage #img-preview";
var selectorDataImage = "#mAddimage #data-image";
var ratio = 200/200;
var element;
var placeholder;
var image_size;
var words_max_upload;
var form_append;
var file_name;
var data_image_crop;
var selector_button;
var preview_in_front;

/**
 * buat element bootstrap pop up dynamically
 */
function create_element (placeholder , image_size , words_max_upload) {
    element = '<div class="modal fade" id="mAddimage" tabindex="-1" role="dialog" aria-labelledby="addimageLabel" data-backdrop="static">' +
                '<div class="modal-dialog modal-lg" role="document">' +
                    '<div class="modal-content">' +
                        '<div class="modal-header">' +
                            '<h4 class="modal-title">Upload Image</h4>' +
                        '</div>' +
                        '<div class="modal-body">' +
                            '<div class="row modal-hide">' +
                                '<div class="col-md-8">' +
                                    '<div class="m_file">' +
                                        '<label class="jcroppperlabel" for="file"><span>Choose File:</span></label>' +
                                        '<div class="inputwrap"><input type="file" class="image-file" name="image-file"></div>' +
                                    '</div>' +
                                    '<div class="img-container" style="margin-top: 10px;">' +
                                        '<img src="' + placeholder + '" id="preview">' +
                                    '</div>' +
                                    '<input name="data-image" id="data-image" type="hidden" value=""/>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                    '<div class="jcroppperlabel">Result:</div>' +
                                    '<div class="img-preview preview-lg" id="img-preview"></div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +

                        '<div class="modal-footer">' +
                            '<button type="button" name="add-image" id="add-image" class="btn btn-primary">Add</button>' +
                            '<button type="button" name="cancel-image" id="cancel-image" class="btn btn-warning">Cancel</button>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';

    return element;
}

//validasi harus extensionnya image file.
function isImageFile (file) {
    if (file.type) {
        return /^image\/\w+$/.test(file.type);
    } else {
        return /\.(jpg|jpeg|png|gif)$/.test(file);
    }
}

/**
 * Dependency with cropper.js
 * untuk init si cropper
 */
function initCropper (selectorElem = "", selectorPreview = "", selectorDataImage = "", ratio = "") {

    initcrop = 1;

    $(selectorElem).cropper({
        viewMode: 1,
        dragMode: 'move',
        aspectRatio: ratio,
        restore: false,
        preview: selectorPreview,
        guides: false,
        highlight: false,
        cropBoxMovable: false,
        cropBoxResizable: false,
        crop: function(data) {
            var json = [
              '{"x":' + Math.round(data.x),
              '"y":' + Math.round(data.y),
              '"height":' + Math.round(data.height),
              '"width":' + Math.round(data.width),
              '"rotate":' + Math.round(data.rotate) + '}'
            ].join();
            $(selectorDataImage).val(json);
        }
    });



}

// Cropper for upload new design
// form_append : untuk append hidden file yang di crop.
// file_name : nama file untuk si inputan hidden di form.
// data_image_crop : data image untuk si file.
// ratio : ratio dari Cropper
// selector_button = button yang di front waktu onclick
// preview_in_front = preview untuk si image yang di crop
// placeholder = image placeholder untuk cropper
// image_size = max size untuk image (dalam bytes)
// words_max_upload = kata" untuk max size nya (dalam huruf yang baik)
/**
 * {
    target_form_selector : "#form",
    file_input_name : "image-file",
    data_crop_name : "data-image",
    image_ratio : 600/600,
    button_trigger_selector : "#addimage",
    image_preview_selector : ".add-image-preview",
    placeholder_path : "/img/placeholder/600x600.png",
    max_file_size : image_size,
    words_max_file_size : words_max_upload,
    }
 */

function imageCropper (options) {
    //cek apakah options sudah object
    if (typeof options != "object") {
        console.log("Option must be and object!. consist of target_form_selector,file_input_name,data_crop_name,image_ratio,button_trigger_selector,image_preview_selector,placeholder_path,max_file_size,words_max_file_size. ");
        return false;
    }

    //cek apakah semua variable sudah di sent
    if (typeof options.target_form_selector == "undefined") {
        console.log("option target_form_selector must be sent to imageCropper");
        return false;
    } else if (typeof options.file_input_name == "undefined") {
        console.log("option file_input_name must be sent to imageCropper");
        return false;
    } else if (typeof options.data_crop_name == "undefined") {
        console.log("option data_crop_name must be sent to imageCropper");
        return false;
    } else if (typeof options.image_ratio == "undefined") {
        console.log("option image_ratio must be sent to imageCropper");
        return false;
    } else if (typeof options.button_trigger_selector == "undefined") {
        console.log("option button_trigger_selector must be sent to imageCropper");
        return false;
    } else if (typeof options.image_preview_selector == "undefined") {
        console.log("option image_preview_selector must be sent to imageCropper");
        return false;
    } else if (typeof options.placeholder_path == "undefined") {
        console.log("option placeholder_path must be sent to imageCropper");
        return false;
    } else if (typeof options.max_file_size == "undefined") {
        console.log("option max_file_size must be sent to imageCropper");
        return false;
    } else if (typeof options.words_max_file_size == "undefined") {
        console.log("option words_max_file_size must be sent to imageCropper");
        return false;
    }

    //initialize global variable
    form_append = options.target_form_selector;
    file_name = options.file_input_name;
    data_image_crop = options.data_crop_name;
    ratio = options.image_ratio;
    selector_button = options.button_trigger_selector;
    preview_in_front = options.image_preview_selector;
    placeholder = options.placeholder_path;
    image_size = options.max_file_size;
    words_max_upload = options.words_max_file_size;


    //create element pop up
    var elem = create_element (placeholder , image_size , words_max_upload);

    //append si pop up to body
    $("body").append(elem);

    //event waktu modal pop up di buka
    $('#mAddimage').on('shown.bs.modal', function () {

        //cek apakah sudah ada file di form target ? jika sudah di clone lalu di pindahkan ke pop up dengan nama image-file
        if ($(form_append + " input[type='file'][name='"+file_name+"']").length > 0) {
            var file_elem_temp = $(form_append + " input[type='file'][name='"+file_name+"']").clone()
                                                                                            .css("display", "block")
                                                                                            .attr("name", "image-file")
                                                                                            .attr("id", "image-file")
                                                                                            .attr("class", "image-file");

            $("#mAddimage .m_file .inputwrap").remove();
            $("#mAddimage .m_file").append('<div class="inputwrap">');
            $("#mAddimage .m_file").append(file_elem_temp);
            $("#mAddimage .m_file").append('</div>');

            //input jg preview dari imagenya ke si cropper
            var img = $(preview_in_front + " > img").attr("src");
            if (img != "") $(selectorElem).attr("src",img);
        }

        //bikin variable untuk menyimpan data preview image sebelumnya jika dari edit, dan nyimpen data first add flag jika dr edit
        var name_preview = String(preview_in_front.replace(".", ""));

        //check apakah sudah ada image sebelumnya, dan apakah baru pertama kali pencet
    	if($(selector_button).data("edit") == 1 && typeof firstaddflag[name_preview] == "undefined") {
    		//save image sebelumnya
    		preview_image[name_preview] = $(preview_in_front).html();
            firstaddflag[name_preview] = 1;

    	}

        //check apakah crop belum di init
        if (initcrop == 0) {

            //init cropper
            initCropper (selectorElem, selectorPreview, selectorDataImage, ratio);

            initcrop = 1;
        }

        //meng init kembali bahwa dia belum memencet add button yg ada di modal
        addflag = 0;
    });

    //when modal hide, destroy the cropper for preventing the kotaknya jalan jalan
    $('#mAddimage').on('hide.bs.modal', function (e) {
        $(selectorElem).cropper('destroy');
        initcrop = 0;
    });

    //when modal hidden , destroy the element
    $('#mAddimage').on('hidden.bs.modal', function (e) {

        //check jika bukan saat pencet add , maka jd seperti cancel
        if (addflag == 0) {
            initcrop = 0;

            //check apakah sudah ada image sebelumnya, text jd change image ttp masukan image yg sebelumnya
            if($(selector_button).data("edit") == 1) {
    			$(selector_button).text("Change Image");
                var name_preview = String(preview_in_front.replace(".", ""));
    			$(preview_in_front).html(preview_image[name_preview]);
    		} else {
    			$(selector_button).text("Add Image");
    			$(preview_in_front).html("");
    		}

        }

        //destroy element
        $("#mAddimage").remove();
        //unbind semua event yg penah di bikin untuk button yang ada di dalem si pop up
        $("#mAddimage .image-file").off('change');
        $("#mAddimage #add-image").off('click');
        $("#mAddimage #cancel-image").off('click');
    });

    //when image file change in modal
    $(document).on("change","#mAddimage .image-file",function() {
      var files, file;
      var url =  $("#mAddimage #preview").attr('src');
      var maxsize = image_size;
      var maxword = words_max_upload;

      //check image file size
      if (!!$(this).prop('files') && (!!window.URL && URL.createObjectURL)) {
        files = $(this).prop('files');

        if (files.length > 0 && files[0].size < maxsize) {
          file = files[0];

          if (isImageFile(file)) {

            if (url) {
              URL.revokeObjectURL(url); // Revoke the old one
            }

            url = URL.createObjectURL(file);
            $("#mAddimage #preview").cropper('replace', url);
          }
        } else if (files[0].size > maxsize) {
            alert("Image file exceeded maximum size. maximum size is " + maxword);
            $(this).val("");
        }
      }

    });

    //when button add in modal being clicked, append the file into the form
    $("#mAddimage #add-image").click(function(e){
        //ambil width, height dan isi dari preview yang di dalam modal untuk di taro di preview depan
        var data_html = $(selectorPreview).html();
        var data_width = $(selectorPreview).css("width");
        var data_height = $(selectorPreview).css("height");

        //add to preview in front
        $(preview_in_front).css("width",data_width);
        $(preview_in_front).css("height",data_height);
        $(preview_in_front).html(data_html);

        //ganti button jadi change image
        $(selector_button).text("Change Image");

        addflag = 1;

        $("#mAddimage").modal("hide");

        //append inputan file hidden dan data cropper ke dalam form target
        if ($(form_append + " input[type='file'][name='"+file_name+"']").length > 0) {
            $(form_append + " input[type='file'][name='"+file_name+"']").remove();
        }

        if ($(form_append + " input[type='hidden'][name='"+data_image_crop+"']").length > 0) {
            $(form_append + " input[type='hidden'][name='"+data_image_crop+"']").remove();
        }

        //append to form
        var element_file = $("#mAddimage input[type='file']").clone().css("display","none").attr("name", file_name);

        var element_data_image = $("#mAddimage #data-image").clone().attr("type", "hidden").attr("name", data_image_crop).attr("id",data_image_crop);

        $(form_append).append(element_file);
        $(form_append).append(element_data_image);
    });

    //button cancel in modal
    $("#mAddimage #cancel-image").click(function(){

        $("#mAddimage").modal("hide");
    });

    $("#mAddimage").modal("show");

};
