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
			if( $level == "SYSTEM APPLICATION"):
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

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?= $akademik['total']; ?></h3>

					<p>Total Complain Bag Akademik</p>
				</div>
				<div class="icon">
					<i class="fa fa-file-o"></i>
				</div>
				<a href="<?= site_url('complaint/list-akademik'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-silver">
				<div class="inner">
					<h3><?= $sdm['total']; ?></h3>

					<p>Total Complain Bag SDM</p>
				</div>
				<div class="icon">
					<i class="fa fa-file-o"></i>
				</div>
				<a href="<?= site_url('complaint/list-sdm'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?= $alumni['total']; ?></h3>

					<p>Total Complain Bag Alumni</p>
				</div>
				<div class="icon">
					<i class="fa fa-file-o"></i>
				</div>
				<a href="<?= site_url('complaint/list-alumni'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-purple">
				<div class="inner">
					<h3><?= $umum['total']; ?></h3>

					<p>Total Complain Bag Umum</p>
				</div>
				<div class="icon">
					<i class="fa fa-file-o"></i>
				</div>
				<a href="<?= site_url('complaint/list-umum'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
			<?php elseif($type == "BAGIAN KEMAHASISWAAN") : ?>
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
			<?php elseif($type == "BAGIAN AKADEMIK") : ?>
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?= $akademik['total']; ?></h3>
							<p>Total Complain Bag Akademik</p>
						</div>
						<div class="icon">
							<i class="fa fa-file-o"></i>
						</div>
						<a href="<?= site_url('complaint/list-akademik'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>

			<?php elseif($type == "BAGIAN SDM") : ?>
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?= $sdm['total']; ?></h3>
							<p>Total Complain Bag SDM</p>
						</div>
						<div class="icon">
							<i class="fa fa-file-o"></i>
						</div>
						<a href="<?= site_url('complaint/list-sdm'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			<?php elseif($type == "BAGIAN ALUMNI") : ?>
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?= $alumni['total']; ?></h3>
							<p>Total Complain Bag ALUMNI</p>
						</div>
						<div class="icon">
							<i class="fa fa-file-o"></i>
						</div>
						<a href="<?= site_url('complaint/list-alumni'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			<?php else: ?>
				<div class="col-lg-4 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?= $umum['total']; ?></h3>
							<p>Total Complain Bag UMUM</p>
						</div>
						<div class="icon">
							<i class="fa fa-file-o"></i>
						</div>
						<a href="<?= site_url('complaint/list-umum'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			<?php endif;?>
		<?php endif; ?>
	</div>
</div>
