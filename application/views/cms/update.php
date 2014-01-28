
	<input type="hidden" name="deafault_sales_order" id="deafault_sales_order" value="Organic Farm">
       <nav id="mobile_navigation"></nav>
		<section class="container clearfix main_section">
			<div id="main_content_outer" class="clearfix">
			<div id="main_content">
                                <div class="row">
					<div class="col-sm-12">
						<div class="tabbable ">
                                                    <div class="tab-content"><a href="<?php echo base_url('index.php/cms/pages') ?>" class="btn btn-success pull-right"><i class="icon icon-backward"></i> PAGE LIST</a>
							<div id="tb3_a" class="tab-pane active"> <h4>UPDATE PAGE</h4>
	<div class="panel panel-default">
<?php echo form_open('cms/update_page'); ?>
	<table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                     <tbody style="padding-bottom: 100px !important">
                             <?php $i=0; foreach ($record as $srow){?>

                <tr>
                    <td>Title<input type="hidden" name="guid" value="<?php echo $srow->id ?>"> </td>
		<td><?php echo form_input('title',set_value('title', $srow->title),'class="form-control"'); ?></td>
	</tr>
        <tr>
		<td>Body</td>
		<td><?php	echo form_textarea('body',set_value('body', $srow->body),'name = "content"','class = "tinymce"'); ?></td>
	</tr>
	<tr>
   <td>submit</td>
	<td><?php echo form_submit('submit',  'submit','class="btn btn-success"'); ?></td></tr>

                                                                                                                <?php } ?>


                                                                                                          </table>
        </form>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    
							
						</div>
						</div>
						</div>




					</div>
					</div>
				</div>

			</section>
			<div id="footer_space"></div>
		</div>

