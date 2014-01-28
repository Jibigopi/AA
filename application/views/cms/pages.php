

	<input type="hidden" name="deafault_sales_order" id="deafault_sales_order" value="Organic Farm">

			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>


			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">

						<!-- main content -->
                                                <br>


					<div class="row">
						<div class="col-sm-12">
                                                    <div class="tabbable ">
										<h4>PAGE DETAILS</h4>
										<div class="tab-content">
                                                                                    <a data-toggle="modal" href="#add_new" class="btn btn-success btn-sm"><i class="icon icon-plus"></i> ADD NEW</a>
										    <a href="javascript:delete_selected_menu()" class="btn btn-danger"><i class="icon icon-trash"></i> DELETE</a>
												<div id="tb3_a" class="tab-pane active">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>Id</th>
                                                                                                              <th>Select</th>
                                                                                                              <th >Page Title</th>
                                                                                                             
                                                                                                             
                                                                                                              <th>Action</th>
                                                                                                              </tr>
                                                                                                            </thead>
                                                                                                            <tbody > </tbody>

                                                                                                          </table>
                                                                                                            <?php echo form_close(); ?>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
								</div>
								




					</div>
				</div>

			</section>
           <div id="add_new" class="modal fade">
            <div class="modal-dialog" style="width: 80%">
								<div class="modal-content">
                                                                    <form id="parsley_reg" action="<?php echo base_url('index.php/cms/createa')?>" method="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="add_page_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Page</h4>
										</div>
										<div class="modal-body">
										<div class='row'>									
                                                                                    <div class="col col-lg-1"></div>	
                                                                                    <div class="col col-lg-10">	

									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>


                         <tbody style="padding-bottom: 100px !important">

<tr>


		
	</tr>
<tr>

<tr>


		<td>Title</td>

		<td><?php echo form_input('title',set_value('title'),'class="form-control required"'); ?></td>
	</tr>
<tr>
		<td>Body</td>

		<td><?php	//echo form_textarea('body1',set_value('body')); ?>
                    <textarea name="body" id="update_page_body"></textarea></td>
	</tr>
	<tr>

   <td>Submit</td>
		<td><?php $submit=array('name'=>'submit','value'=>'SUBMIT','class'=>'btn btn-success','id'=>'save_new_page');
                echo form_submit($submit); ?>
                 
                </td>




                                                                                                          </table>

                                                                                                    
											
										</div> <div class="col col-lg-1"></div>
										</div>
                                                                                  
                                                                                 
										
										</div>
									</form>
								 </div>
							</div>
						</div>
           <div id="edit_page" class="modal fade">
            <div class="modal-dialog" style="width: 80%">
								<div class="modal-content">
                                                                    <form id="parsley_reg" name="grains" action="<?php echo base_url('index.php/cms/createa')?>" method="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="add_page_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Page</h4>
										</div>
										<div class="modal-body">
										<div class='row'>									
                                                                                    <div class="col col-lg-1"></div>	
                                                                                    <div class="col col-lg-10">	

									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>


                         <tbody style="padding-bottom: 100px !important">

<tr>


		<td>id</td>

		<td><?php echo form_input('id',set_value('id'),'class="form-control"'); ?></td>
	</tr>
<tr>

<tr>


		<td>Title<input type="hidden" name="guid" id="guid"</td>

		<td>
                     <?php $title=array('name'=>'title',
                                    'class'=>'form-control',
                                    'id'=>'title',
                                    'data-required'=>'true',
                                    'value'=>set_value('title'));
                                    echo form_input($title)?>    
                </td>
	</tr>
<tr>
		<td>body</td>

		<td><?php	echo form_textarea('body',set_value('body')); ?></td>
	</tr>
	<tr>

   <td>submit</td>
		<td><?php $submit=array('name'=>'submit','value'=>'SUBMIT','class'=>'btn btn-success','id'=>'save_new_page');
                echo form_submit($submit); ?>
                 
                </td>




                                                                                                          </table>

                                                                                                    
											
										</div> <div class="col col-lg-1"></div>
										</div>
                                                                                  
                                                                                 
										
										</div>
									</form>
								 </div>
							</div>
						</div>
			<div id="footer_space"></div>
		</div>

