<?php
    //get all data user
    $user_id            = isset($datas["user_id"]) ? $datas["user_id"] : "";
    $name               = isset($datas["user_full_name"]) ? $datas["user_full_name"] : "";
    $username           = isset($datas["user_name"]) ? $datas["user_name"] : "";
    $email              = isset($datas["user_email"]) ? $datas["user_email"] : "";
    $password           = isset($datas["user_password"]) ? $datas["user_password"] : "";
    $last_login_time    = isset($datas["user_last_login"]) ? $datas["user_last_login"] : "";
    $role_id            = isset($datas["user_role_id"]) ? $datas["user_role_id"] : "";
    $type_id            = isset($datas["user_type_id"]) ? $datas["user_type_id"] : "";
    $fak_id             = isset($datas["FakultasId"]) ? $datas["FakultasId"] : "";
    $fak_name           = isset($datas["FakultasName"]) ? $datas["FakultasName"] : "";
    $type_name          = isset($datas["type_name"]) ? $datas["type_name"] : "";
    $role_name          = isset($datas["role_name"]) ? $datas["role_name"] : "";
    $created_date       = isset($datas["user_created_date"]) ? $datas["user_created_date"] : "";
    $updated_date       = isset($datas["user_updated_date"]) ? $datas["user_updated_date"] : "";

    //title button
    $btn_msg    = ($user_id == 0) ? "Create" : " Update";
    $title_msg  = ($user_id == 0) ? "Create" : " Update";
?>
<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
			<h1>
                <a class="btn btn-warning back-button" href="<?= site_url("user"); ?>" title="Back" rel="tooltip" data-placement="left" data-original-title="Batal">
					<i class="fa fa-arrow-circle-left fa-lg"></i>
				</a>
				<button class="btn btn-primary submit-form" data-form-target="user-form" title="<?= $btn_msg; ?>" rel="tooltip" data-placement="top" >
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
                <div class="jarviswidget" id="wid-id-0"
                data-widget-editbutton="false"
                data-widget-deletebutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil-square-o"></i> </span>
                        <h2><?= $title_msg ?> User</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <form class="smart-form" id="user-form" action="<?= site_url(); ?>user/process-form" method="post">
                                <?php if($user_id != 0): ?>
                                    <input type="hidden" name="id" value="<?= $user_id ?>" />
                                <?php endif; ?>
                                <fieldset>
                                    <section>
                                        <label class="label">Name <sup class="color-red">*</sup></label>
                                        <label class="input">
                                            <input type="text" name="name" value="<?= $name ?>" placeholder="User Full Name">
                                        </label>
                                    </section>

                                    <section>
                                        <label class="label">User Role <sup class="color-red">*</sup></label>
                                        <label class="select">
                                            <select name="role" id="role">
                                                <option value="0">-- choose -- </option>
                                                <?php
                                                    if($role_id != "") {
                                                        echo "<option value=".$role_id." selected>".$role_name."</option>";
                                                        foreach($role as $key => $value) {
                                                            echo "<option value=".$value['role_id']."> ".$value['role_name']."</option>";
                                                        }
                                                    } else {
                                                        foreach($role as $key => $value) {
                                                            echo "<option value=".$value['role_id']."> ".$value['role_name']."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>

                                    <section style="display: none;" id="id_1">
                                        <label class="label"> User Level <sup class="color-red">*</sup></label>
                                        <label class="select">
                                            <select name="user_type">
                                                <option value="">-- choose --</option>
                                                <?php
                                                    foreach($type as $key => $value) {
                                                        if($user_id != "") {
                                                            echo "<option value=''>test</option>";
                                                        } else {
                                                            echo "<option value=".$value['type_id']."> ".$value['type_name']."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </label>
                                    </section>

                                    <section style="display: none;" id="id_2">
                                        <label class="label">Fakultas <sup class="color-red">*</sup></label>
                                        <label class="select">
                                            <select name="fak_id">
                                                <option value="">-- choose --</option>
                                                <?php
                                                    foreach($fakultas as $key => $value) {
                                                        if($user_id != "") {
                                                            echo "<option value=''>test</option>";
                                                        } else {
                                                            echo "<option value=".$value['FakultasId']."> ".$value['FakultasName']."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </label>
                                    </section>

                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label">Username <sup class="color-red">*</sup></label>
                                            <label class="input">
                                                <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Email <sup class="color-red">*</sup></label>
                                            <label class="input">
                                                <input type="text" name="email" value="<?= $email ?>" placeholder="Email">
                                            </label>
                                        </section>
                                        <?php if($user_id == 0): ?>
                                        <section class="col col-6">
                                            <label class="label">Password <sup class="color-red">*</sup></label>
                                            <label class="input">
                                                <input type="password" name="password" id="password" placeholder="Password">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Confirm New Password <sup class="color-red">*</sup></label>
                                            <label class="input">
                                                <input type="password" name="conf_password" placeholder="Confirm Password">
                                            </label>
                                        </section>
                                        <?php else: ?>
                                        <section class="col col-6">
                                            <label class="label">New Password</label>
                                            <label class="input">
                                                <input type="password" name="new_password" id="new_password" placeholder="New Password">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Confirm New Password</label>
                                            <label class="input">
                                                <input type="password" name="conf_new_password" placeholder="Confirm New Password">
                                            </label>
                                        </section>
                                        <?php endif; ?>

                                    <div>
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
