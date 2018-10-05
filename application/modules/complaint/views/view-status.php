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
                <a class="btn btn-warning back-button" href="<?= site_url("complaint/tracking_state") ?>" title="Back" rel="tooltip" data-placement="left">
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
                                    <label class="textarea">
                                        <textarea name="desc" class="" cols="176" rows="10" disabled="disabled"><?= $text; ?></textarea>
                                    </label>
                                </section>
                                <?php if(!empty($note)): ?>
                                    <section>
                                        <label class="label">Note</label>
                                        <label class="textarea">
                                            <textarea name="note" cols="176" disabled="disabled" rows="10"><?= $note; ?></textarea>
                                        </label>
                                    </section>
                                <?php endif; ?>
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
