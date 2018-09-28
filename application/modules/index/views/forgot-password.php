<!-- MAIN CONTENT -->
<div id="content" class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
            <h1 class="txt-color-red login-header-big"><?= DEFAULT_TITLE_MANAGER ?></h1>
            <img src="/logo/avianlogo.png" class="img img-responsive" alt="Logo">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
            <div class="well no-padding">
                <form action="/forgot-password" id="forgotpass-form" class="smart-form client-form" method="post">
                    <header>
                        Forgot Password
                    </header>

                    <fieldset>
                        <?php if ($this->session->flashdata('message')): ?>
                        <section>
                            <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        </section>
                        <?php endif; ?>

                        <section>
                            <label class="label">Email</label>
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="email" placeholder="Email" autofocus>
                                <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email</b></label>
                            <div class="note">
                                <a href="/login">I remember my password</a>
                            </div>
                        </section>
                    </fieldset>
                    <footer>
                        <button type="submit" class="btn btn-primary" name="send">
                            Send
                        </button>
                    </footer>
                </form>

            </div>

        </div>
    </div>
</div>
