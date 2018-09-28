            <div class="loading-box"><div class="cssload-box-loading"></div></div>
        </div>
		<!-- END #MAIN PANEL -->

		<!-- #SHORTCUT AREA : With large tiles (activated via clicking user name tag)
			 Note: These tiles are completely responsive, you can add as many as you like -->
		<div id="shortcut">
			<ul>
				<li>
					<a href="<?= site_url(); ?>mahasiswa/change-profile" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-id-card-o fa-4x"></i> <span>Change Profile </span> </span> </a>
				</li>
                <li>
					<a href="<?= site_url(); ?>mahasiswa/change_password" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-key fa-4x"></i> <span>Change Password </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->


		<!-- #PLUGINS -->
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local-->
		<script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/jquery-ui-1.12.1.min.js"></script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?= base_url(); ?>assets/js/app.config.seed.js"></script>
		<script src="<?= base_url(); ?>assets/js/plugins/smartwidgets/jarvis.widget.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/plugins/jquery-touch/jquery.ui.touch-punch.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/SmartNotification.min.js"></script>

        <!-- form and validate js -->
        <script src="<?= base_url(); ?>assets/js/plugins/jquery.form.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/validate-extension.js"></script>

        <!-- daterange picker -->
        <script src="<?= base_url(); ?>assets/js/plugins/moment.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-daterangepicker-master/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/js/plugins/bootstrap-daterangepicker-master/daterangepicker.css">

		<!--[if IE 8]>
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="<?= base_url(); ?>assets/js/app.js"></script>
		<script src="<?= base_url(); ?>assets/js/global.js"></script>
        <?php
        //snippet for javascript or anything else that you want to put at the last line...
        if (isset($css)) {
            if (is_array($css)) {
                foreach($css as $value) {
                    echo '<link rel="stylesheet" href="'.base_url($value).'" type="text/css"/>';
                }
            } else {
                echo '<link rel="stylesheet" href="'.base_url($css).'" type="text/css"/>';
            }
        }
        ?>

        <?php
        //snippet for javascript or anything else that you want to put at the last line...
        if (isset($script)) {
            if (is_array($script)) {
                foreach($script as $value) {
                    echo '<script src="'.base_url($value).'"></script>';
                }
            } else {
                echo '<script src="'.base_url($script).'"></script>';
            }
        }
        //snippet for get script
        if(isset($view_js_nav)) {
            $this->load->view($view_js_nav);
        }
       
        ?>

    </body>
</html>
