	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <!--================================================== -->
	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?= base_url(); ?>assets/js/app.config.seed.js"></script>
		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->
		<!-- BOOTSTRAP JS -->
		<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/SmartNotification.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?php //base_url('assets/js/app.seed.js'); ?>"></script>
        <!-- plugins -->
        <script src="<?= base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/global.js"></script>
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

	</body>
</html>