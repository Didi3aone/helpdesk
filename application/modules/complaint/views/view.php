<?php
    $id        = isset($item["ComplainId"]) ? $item["ComplainId"] : "";
    $perihal   = isset($item["ComplainName"]) ? $item["ComplainName"] : "";
    $text      = isset($item["ComplainDesc"]) ? $item["ComplainDesc"] : "";
    $note      = isset($item['ComplainRemark']) ? $item['ComplainRemark'] : "";
?>
<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
			<h1>
				<?php 
					$redirect = $this->session->userdata("user_type");

					if( $redirect == "BAGIAN KEUANGAN") {
						$string = "list-keuangan";
					} elseif( $redirect == "BAGIAN KEMAHASISWAAN" ) {
						$string = "list-kemahasiswaan";
					} elseif( $redirect == "BAGIAN AKADEMIK") {
                        $string = "list-akademik";
                    } elseif( $redirect == "BAGIAN SDM") {
                        $string = "list-sdm";
                    } elseif($redirect == "BAGIAN ALUMNI") {
                        $string = "list-alumni";
                    } else {
                        $string = "list-umum";
                    }
				?>
                <a class="btn btn-warning back-button" href="<?= site_url("complaint/".$string) ?>" title="Back" rel="tooltip" data-placement="left">
					<i class="fa fa-arrow-circle-left fa-lg"></i>
				</a>
                <button class="btn btn-primary submit-form" data-form-target="user-form" title="Simpan" rel="tooltip" data-placement="top" >
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
                        <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                        <h2>Detail Complain</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                       <form class="smart-form" id="user-form" action="<?= site_url('complaint/update_complain'); ?>" method="post">
                            <?php if($id != 0): ?>
                                <input type="hidden" name="id" value="<?= $id ?>" />
                            <?php endif; ?>
                            <fieldset>
                                <section>
                                    <label class="label">Perihal</label>
                                    <label class="input">
                                        <input type="text" name="name" readonly="readonly" value="<?= $perihal ?>">
                                    </label>
                                </section>

                                <!-- <div class="row"> -->
                                <section>
                                    <label class="label">Isi</label>
                                    <label class="textare">
                                        <textarea name="desc" class="" cols="176" rows="20" disabled="disabled"><?= $text; ?></textarea>
                                    </label>
                                </section>

                                <section>
                                    <label class="label"> Update Status Complain <sup class="color-red">*</sup></label>
                                    <label class="select">
                                        <select name="StatusId">
                                            <option value="">-- choose --</option>
                                            <?php 
                                                foreach($status as $key => $value) {
                                                    echo "
                                                    <option value=".$value['StatusId']."> 
                                                        ".$value['StatusName'].
                                                    "</option>";                                                 
                                                }
                                            ?>
                                        </select>
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Note</label>
                                    <label class="textarea">
                                        <textarea name="note" rows="30"><?= $note; ?></textarea>
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
