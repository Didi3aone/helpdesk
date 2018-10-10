<!-- MAIN CONTENT --> 
<div id="content">
   <!--  <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark">tet</h1>
		</div>
	</div> -->

    <!-- widget grid -->
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET ROW START -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                 <div class="jarviswidget" id="wid-id-0"
                data-widget-editbutton="false"
                data-widget-deletebutton="false">
                    <form class="smart-form" method="get" accept-charset="utf-8">
                        <fieldset>
                       		<section class="col col-5">
                       			<label>Start Date</label>
                       			<label class="input">
        		               		<input type="text" name="start" id="start" class="dates"> 
        		               	</label>
                       		</section>

                       		<section class="col col-5">
                       			<label>End Date</label>
        	               		<label class="input">
        		               		<input type="text" name="end" id="end" class="dates"> 
        		               	</label>
                       		</section>

                       		<section class="col col-5">
                       			<label>Bagian</label>
                       			<label class="select">
        	               			<select name="bagian" id="bagian">
        	               				<option value="0">-- choose --</option>
        	               				<?php
                                            foreach ($bagian as $key => $value) { ?>
                                                <option value="<?php echo $value['type_id'] ?>"><?= $value['type_name']; ?></option>
                                                <?php
                                            }
                                        ?>
        	               			</select>
                       			</label>
                       		</section>
                        </fieldset>

                   		<a class="btn btn-primary btns" target="_blank" id="bot" style="margin-left: 40px;"> <i class="fa fa-eye"></i>
    						Show Detail
    					</a>
                        <a class="btn btn-info btni" target="_blank" id="boti"> <i class="fa fa-file"></i>
                            Export To excel
                        </a>
                    </form>
                </div>
            </article>
        </div>
    </section> <!-- end widget grid -->
</div> <!-- END MAIN CONTENT-->