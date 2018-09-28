<!-- MAIN CONTENT -->
<div id="content" class="container">

    <div class="row">
        <div class="col-xs-10 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
            <h1 class="txt-color-red login-header-big"><?= DEFAULT_TITLE_MANAGER ?></h1>
            <img src="<?= base_url(); ?>assets/img/uniat.png" class="img img-responsive" style="box-shadow: 1px 5px 5px 5px rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);" alt="Logo">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
            <div class="well no-padding">
                <form action="<?= site_url('manager/auth');?>" id="login-form" class="smart-form smarts-form client-form" method="post">
                    <header>
                        <i style="color: white;">Sign In</i>
                    </header>

                    <fieldset>
                        <?php if ($this->session->flashdata('message')): ?>
                        <section>
                            <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <?= $this->session->flashdata('message'); ?>
                            </div>
                        </section>
                        <?php endif; ?>

                        <section>
                            <label class="label">Username</label>
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="username" placeholder="Username" autofocus>
                                <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter username</b></label>
                        </section>

                        <section>
                            <label class="label">Password</label>
                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                <input type="password" name="password" placeholder="Password">
                                <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                            <div class="note">
                                <a href="/forgot-password">Forgot password?</a>
                            </div>
                        </section>
                    </fieldset>
                    <footer>
                        <button type="submit" class="btn btn-primary" name="login">
                            Sign in
                        </button>
                    </footer>
                </form>

            </div>
        </div>
    </div>
</div>
