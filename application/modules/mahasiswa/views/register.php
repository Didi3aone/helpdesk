<div id="main" role="main">
	<!-- MAIN CONTENT -->
	<div id="content" class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-6 hidden-xs hidden-sm">
				<h1 class="txt-color-red login-header-big"><?= DEFAULT_TITLE_MANAGER ?></h1>
				<img src="<?= base_url(); ?>assets/img/uniat.png" class="img img-responsive" style="box-shadow: 1px 5px 5px 5px rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); margin-left: 40px;" alt="Logo">
			</div>
			<div class="col-md-6">
				<div class="well no-padding">
					<form action="<?= site_url('mahasiswa/process_form'); ?>" id="creates-form" class="smart-form smarts-form" method="POST">
						<header>
							<i style="color: white;"><?= $title_msg; ?></i> 
						</header>

						<fieldset>
							<section>
								<label for="">Nama Lengkap : </label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="name" id="name" placeholder="Nama Lengkap" required>
								</label>
							</section>

							<section>
								<label for="">NIM</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="nim" id="nim" placeholder="NIM" required>
								</label>
							</section>

							<section>
								<label for="">Email</label>
								<label class="input"> <i class="icon-append fa fa-envelope"></i>
									<input type="email" name="email" id="email" placeholder="Email address" required>
								</label>
							</section>

							<section>
								<label for="">Password</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password" placeholder="Password" id="password" required>
								</label>
							</section>

							<section>
								<label for="">Password Confirmation</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="conf_password" id="conf_password" placeholder="Confirm password" required>
								</label>
							</section>

							<section>
								<label for="">Fakultas</label>
								<label class="select">
									<select name="jurusan_id">
										<option value="0">-- choose --</option>
										<?php 
											foreach($fakultas as $key => $value) : ?>
												<option value="<?= $value['FakultasId']?>"><?= $value['FakultasName']; ?></option>
										<?php endforeach;?>
									</select> <i></i> 
								</label>
							</section>

							<section>
								<label for="">Jurusan</label>
								<label class="select">
									<select name="jurusan_id">
										<option value="0">-- choose --</option>
										<?php 
											foreach($jurusan as $key => $value) : ?>
												<option value="<?= $value['JurusanId']?>"><?= $value['JurusanName']; ?></option>
										<?php endforeach;?>
									</select> <i></i> 
								</label>
							</section>
 
							<section>
								<label class="input">Address</label>
								<textarea name="pob" cols="63" rows="8.6"></textarea>
							</section>
						</fieldset>

						<!-- <fieldset> -->
							<!-- <div class="row"> -->
								<!-- <section class="col col-6">
									<label class="input">
										<input type="text" name="firstname" placeholder="First name">
									</label>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="lastname" placeholder="Last name">
									</label>
								</section> -->
							<!-- </div> -->

							<!-- <div class="row">
								<section class="col col-6">
									<label class="select">
										<select name="gender">
											<option value="0" selected="" disabled="">Gender</option>
											<option value="1">Male</option>
											<option value="2">Female</option>
											<option value="3">Prefer not to answer</option>
										</select> <i></i> 
									</label>
								</section> -->

								<!-- <section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="request" placeholder="Request activation on" class="datepicker" data-dateformat='dd/mm/yy'>
									</label>
								</section> -->
							<!-- </div> -->
						<!-- </fieldset> -->
						<footer>
							<a href="<?= site_url('mahasiswa'); ?>" title="" class="btn btn-danger" style="float: left;">Already Login</a>
							<button type="submit" class="btn btn-primary">
								Register
							</button>
						</footer>
						<div class="message">
							<i class="fa fa-check"></i>
							<p>
								Thank you for your registration!
							</p>
						</div>
					</form>
				</div>
				<!-- <p class="note text-center">*FREE Registration ends on October 2015.</p> -->
				<!-- <h5 class="text-center">- Or sign in using -</h5>
				<ul class="list-inline text-center">
					<li>
						<a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
					</li>
					<li>
						<a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
					</li>
					<li>
						<a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
					</li>
				</ul> -->
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
