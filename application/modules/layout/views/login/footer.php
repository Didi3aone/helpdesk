
        </div>

		<!--================================================== -->

	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?= base_url(); ?>assets/js/app.config.seed.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->
		<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!--[if IE 8]>

			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="<?= base_url(); ?>assets/js/app.seed.js"></script>

        <!-- plugins -->
        <script src="<?= base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
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
        ?>

	</body>
</html>
