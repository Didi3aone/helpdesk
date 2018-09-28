<script>
			// runAllForms();
			
			var create = function (){
			    //init validate form org
			    var create_form = "#creates-form";
			    var create_rules = {
			    	name: {
			    		required:true,
			    	},
			    	nim: {
			    		required:true
			    	},
			    	email: {
			            required: true,
			            email: true,
			        },
			        jurusan: {
			        	required: true,
			        },
			        password: {
			            required: true,
			            minlength: 6,
			            maxlength: 20,
			        },
			        conf_password: {
			            required: true,
			            minlength: 6,
			            maxlength: 20,
			            equalTo: "#password"
			        },
			    };

			    init_validate_form (create_form,create_rules);
			};
			$(document).ready(function() {
			    create();
			});
		</script>