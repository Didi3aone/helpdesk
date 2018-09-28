<script>

    function tinymceinit() {
        var url = "<?= site_url(); ?>";
        tinymce.init({
            selector: '.tinymce',
            menubar: false,
            allow_script_urls: true,
            directionality : 'ltr',
            plugins: [
              "code fullscreen preview table visualblocks contextmenu responsivefilemanager link image media",
              "table hr textcolor lists "
            ],
            height: 400,
            toolbar1: "bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | styleselect formatselect fontsizeselect arabic",
            toolbar2: "link unlink image responsivefilemanager media code | bullist numlist outdent indent | removeformat table hr",
            image_advtab: true ,
            extended_valid_elements: "a[href|onclick]",
            external_filemanager_path: url +"assets/js/plugins/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : url +"assets/js/plugins/filemanager/plugin.min.js"},
            media_url_resolver: function (data, resolve/*, reject*/) {
                if (data.url.indexOf('youtube') !== -1) {
                    var id_youtube = getIdYoutube(data.url);
                    var embedHtml = "<div class='embed-responsive embed-responsive-16by9'>" +
                                        '<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' + id_youtube + '" allowfullscreen></iframe>'+
                                    "</div>";
                    resolve({html: embedHtml});
                } else {
                    resolve({html: ''});
                }
            }
        });
    }
	// runAllForms();
	var create = function (){
	    //init validate form org
	    var create_form = "#user-form";
	    var create_rules = {
	    	title: {
	    		required:true,
	    	},
	    	to_id: {
	    		required:true
	    	},
            fakultas_id: {
	    		required:true
	    	},
            // desc: {
            //     required: true
            // },
	    };

	    init_validate_form (create_form,create_rules);
	};
	$(document).ready(function() {
	    create();
        tinymceinit();
	});
</script>
