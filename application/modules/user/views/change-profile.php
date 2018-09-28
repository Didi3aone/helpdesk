<?php
    $admin_id   = isset($item["admin_id"]) ? $item["admin_id"] : "";
    $name       = isset($item["name"]) ? $item["name"] : "";
    $username   = isset($item["username"]) ? $item["username"] : "";
    $email      = isset($item["email"]) ? $item["email"] : "";
?>
<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
			<h1>
                <button class="btn btn-warning back-button" onclick="<?= (isset($back) ? "go('".$back."');" : "window.history.back();") ?>" title="Back" rel="tooltip" data-placement="left" data-original-title="Batal">
					<i class="fa fa-arrow-circle-left fa-lg"></i>
				</button>
				<button class="btn btn-primary submit-form" data-form-target="changeprofile-form" title="Simpan" rel="tooltip" data-placement="top" >
					<i class="fa fa-floppy-o fa-lg"></i>
				</button>
			</h1>
		</div>
	</div>

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <!-- NEW WIDGET ROW START -->
            <article class="col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil-square-o"></i> </span>
                        <h2>Change Profile</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <form class="smart-form" id="changeprofile-form" action="/admin/change-profile-process" method="post">
                            <fieldset>
                                <section>
                                    <label class="label">Name <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="name" value="<?= $name ?>">
                                    </label>
                                </section>
                                <section>
                                    <label class="label">Username <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="username" value="<?= $username ?>">
                                    </label>
                                </section>
                                <section>
                                    <label class="label">Email <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="email" value="<?= $email ?>">
                                    </label>
                                </section>

                            </fieldset>
                        </form>

                    </div>
                    <!-- end widget content -->


                </div>
                <!-- end widget div -->

            </article>
        </div>
    </section> <!-- end widget grid -->
</div> <!-- END MAIN CONTENT -->
