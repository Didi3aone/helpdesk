<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title> <?= $title . " | " . DEFAULT_TITLE_MANAGER ?> </title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/smartadmin-production.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/smartadmin-skins.min.css">

        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/loading.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/sweetalert.css">

        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/style.css">

        <!-- #GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">

        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="152x152" href="/logo/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/logo/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/logo/favicon-16x16.png">
        <link rel="manifest" href="/logo/manifest.json">
        <link rel="mask-icon" href="/logo/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/logo/favicon.ico">
        <meta name="msapplication-config" content="/logo/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body class="smart-style-2">

		<!-- #HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="<?= base_url(); ?>assets/img/uniat.png" alt="Logo"> </span>
				<!-- END LOGO PLACEHOLDER -->


			</div>

			<!-- #TOGGLE LAYOUT BUTTONS -->
			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?= site_url(); ?>manager/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->

                <!-- clear local storage button -->
				<div id="reset" class="btn-header transparent pull-right">
					<span> <a title="Reset UI" data-action="resetWidgets"><i class="fa fa-history"></i></a> </span>
				</div>
				<!-- end clear local storage button -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

        <!-- #NAVIGATION -->
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?= base_url(); ?>assets/logo/mds.png" alt="me" class="online" />
						<span>
							<?= $this->session->userdata('name'); ?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a>

				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!--
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
                    <!-- Dashboard and Statuses -->
					<li class="dashboard">
						<a href="<?= site_url('manager'); ?>"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
					</li>
                    <!-- Customer Processed Data Module -->
                   <!--  <li class="customer">
						<a href="/customer/master-customer" title="List Customer"><i class="fa fa-lg fa-fw fa-id-card"></i> <span class="menu-item-parent">Customer</span></a>
					</li> -->
                    <!-- Statics Processed Data Module -->
                   	<?php 
                   		$level = $this->session->userdata("level");
                   		$type  = $this->session->userdata("user_type");
                   	?>
                   	<?php 

                   		if( $level == "SYSTEM APPLICATION" ) :
                   	?>
                    <li class="">
						<a href="#"><i class="fa fa-lg fa-fw fa-file"></i> <span class="menu-item-parent">Complain</span></a>
                        <ul>
                            <li class="<?= (isset($active_page) && $active_page == 'list-keuangan') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-keuangan'); ?>" title="Bagian Keuangan"><span class="menu-item-parent">Bagian Keuangan</span></a>
							</li>

							<li class="<?= (isset($active_page) && $active_page == 'list-kemahasiswaan') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-kemahasiswaan'); ?>" title="Bagian Kemahasiswaan"><span class="menu-item-parent">Bagian Kemahasiswaan</span></a>
							</li>

							<li class="<?= (isset($active_page) && $active_page == 'list-akademik') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-akademik'); ?>" title="Bagian Akademik"><span class="menu-item-parent">Bagian Akademik</span></a>
							</li>

							<li class="<?= (isset($active_page) && $active_page == 'list-sdm') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-sdm'); ?>" title="Bagian SDM"><span class="menu-item-parent">Bagian SDM</span></a>
							</li>

							<li class="<?= (isset($active_page) && $active_page == 'list-alumni') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-alumni'); ?>" title="Bagian ALUMNI"><span class="menu-item-parent">Bagian ALUMNI</span></a>
							</li>

							<li class="<?= (isset($active_page) && $active_page == 'list-umum') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-umum'); ?>" title="Bagian UMUM"><span class="menu-item-parent">Bagian UMUM</span></a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent"> Mahasiswa</span></a>
                        <ul>
                            <li class="<?= (isset($active_page) && $active_page == 'mahasiswa-list') ? "active" : "" ?>">
								<a href="<?= site_url('user/list'); ?>" title="List"><span class="menu-item-parent">List</span></a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#"><i class="fa fa-lg fa-fw fa-building"></i> <span class="menu-item-parent"> Fakultas</span></a>
                        <ul>
							<li class="<?= (isset($active_page) && $active_page == 'Fakultas-list') ? "active" : "" ?>">
								<a href="<?= site_url('fakultas'); ?>" title="List"><span class="menu-item-parent">List Fakultas</span></a>
							</li>

                            <li class="<?= (isset($active_page) && $active_page == 'Fakultas-list') ? "active" : "" ?>">
								<a href="<?= site_url('fakultas/create'); ?>" title="List"><span class="menu-item-parent">Create Fakultas</span></a>
							</li>

						</ul>
					</li>

					<li class="">
						<a href="#"><i class="fa fa-lg fa-fw fa-file-o"></i> <span class="menu-item-parent"> Jurusan</span></a>
                        <ul>
							<li class="<?= (isset($active_page) && $active_page == 'jurusan-list') ? "active" : "" ?>">
								<a href="<?= site_url('jurusan'); ?>" title="List"><span class="menu-item-parent">List Jurusan</span></a>
							</li>

                            <li class="<?= (isset($active_page) && $active_page == 'jurusan-create') ? "active" : "" ?>">
								<a href="<?= site_url('jurusan/create'); ?>" title="List"><span class="menu-item-parent">Create Jurusan</span></a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#"><i class="fa fa-lg fa-fw fa-clipboard"></i> <span class="menu-item-parent"> Reporting</span></a>
                        <ul>
                            <li class="<?= (isset($active_page) && $active_page == 'GET') ? "active" : "" ?>">
								<a href="<?= site_url('report'); ?>" title="List"><span class="menu-item-parent">Get Report</span></a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Management User</span></a>
                        <ul>
                            <li class="<?= (isset($active_page) && $active_page == 'user-list') ? "active" : "" ?>">
								<a href="<?= site_url('user'); ?>" title="List"><span class="menu-item-parent">List</span></a>
							</li>
                            <li class="<?= (isset($active_page) && $active_page == 'user-create') ? "active" : "" ?>">
								<a href="<?= site_url('user/create'); ?>" title="Inbox"><span class="menu-item-parent">Create User</span></a>
							</li>
						</ul>
					</li>
					<?php else : 
					?>
					<li class="">
						<a href="#"><i class="fa fa-lg fa-fw fa-file"></i> <span class="menu-item-parent">Complain</span></a>
                        <ul>
                        	<?php if( $type == "BAGIAN KEUANGAN"): ?>
                            <li class="<?= (isset($active_page) && $active_page == 'list-keuangan') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-keuangan'); ?>" title="Bagian Keuangan"><span class="menu-item-parent">Bagian Keuangan</span></a>
							</li>
							<?php elseif( $type == "BAGIAN KEMAHASISWAAN") : ?>
							<li class="<?= (isset($active_page) && $active_page == 'list-kemahasiswaan') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-kemahasiswaan'); ?>" title="Bagian Kemahasiswaan"><span class="menu-item-parent">Bagian Kemahasiswaan</span></a>
							</li>
							<?php elseif( $type == "BAGIAN AKADEMIK") : ?>
							<li class="<?= (isset($active_page) && $active_page == 'list-akademik') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-akademik'); ?>" title="Bagian Kemahasiswaan"><span class="menu-item-parent">Bagian Akademik</span></a>
							</li>
							<?php elseif( $type == "BAGIAN SDM") : ?>
							<li class="<?= (isset($active_page) && $active_page == 'list-sdm') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-sdm'); ?>" title="Bagian Kemahasiswaan"><span class="menu-item-parent">Bagian SDM</span></a>
							</li>
							<?php elseif( $type == "BAGIAN ALUMNI") : ?>
							<li class="<?= (isset($active_page) && $active_page == 'list-alumni') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-alumni'); ?>" title="Bagian Kemahasiswaan"><span class="menu-item-parent">Bagian ALUMNI</span></a>
							</li>
							<?php else : ?>
							<li class="<?= (isset($active_page) && $active_page == 'list-umum') ? "active" : "" ?>">
								<a href="<?= site_url('complaint/list-umum'); ?>" title="Bagian Kemahasiswaan"><span class="menu-item-parent">Bagian SDM</span></a>
							</li>
							<?php endif;?>
						</ul>
					</li>
					<?php endif; ?>
				</ul>
			</nav>

			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment">
					<span id="refresh" onclick="location.reload();" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reload this page." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<?= isset($breadcrumb) ? $breadcrumb : "" ?>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->
