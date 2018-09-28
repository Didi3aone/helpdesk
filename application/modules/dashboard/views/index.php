<!-- MAIN CONTENT -->
<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
	</div>
	<div class="row">
		<?php 
			$level = $this->session->userdata("level");
       		$type  = $this->session->userdata("user_type");	
		?>
		<?php 
			if( $level == "SYSTEM APPLICATION" || $level == "STAFF"):
		?>
		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?= $keuangan['total']; ?></h3>

					<p>Total Complain Bag keuangan</p>
				</div>
				<div class="icon">
					<i class="fa fa-file"></i>
				</div>
				<a href="<?= site_url('complaint/list-keuangan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?= $kemahasiswaan['total']; ?></h3>

					<p>Total Complain Bag kemahasiswaan</p>
				</div>
				<div class="icon">
					<i class="fa fa-file-o"></i>
				</div>
				<a href="<?= site_url('complaint/list-kemahasiswaan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php else : ?>
			<?php if($type == "BAGIAN KEUANGAN"): ?>
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3><?= $keuangan['total']; ?></h3>

							<p>Total Complain Bag keuangan</p>
						</div>
						<div class="icon">
							<i class="fa fa-file"></i>
						</div>
						<a href="<?= site_url('complaint/list-keuangan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			<?php else: ?>
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?= $kemahasiswaan['total']; ?></h3>
							<p>Total Complain Bag kemahasiswaan</p>
						</div>
						<div class="icon">
							<i class="fa fa-file-o"></i>
						</div>
						<a href="<?= site_url('complaint/list-kemahasiswaan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			<?php endif;?>
		<?php endif; ?>
	</div>

	<!-- <div class="row">
		<header>
			<h2 style="margin-left: 40px;">Grafik Total Complain Mahasiswa </h2>							
		</header> -->
		<!-- widget div-->
		<!-- <div class="col-md-10">			 -->
			<!-- widget edit box -->
			<!-- <div class="jarviswidget-editbox"> -->
				<!-- This area used as dropdown edit box -->
				<!-- <input class="form-control" type="text">	 -->
			<!-- </div> -->
			<!-- end widget edit box -->
			
			<!-- widget content -->
			<!-- <div class="widget-body"> -->
				<!-- this is what the user will see -->
				<!-- <canvas id="lineChart" height="120"></canvas> -->
				<!-- <i>Informasi</i><br> -->
				<!-- <p> <b style="color: blue;">Biru</b>  = Bagian Keuangan <br/> -->
				<!-- <b style="color: silver;">Silver</b> = Bagian Kemahasiswaan</p> -->
			<!-- </div> -->
			<!-- end widget content -->
		<!-- </div> -->
		<!-- end widget div -->
	<!-- </div> -->
</div>
