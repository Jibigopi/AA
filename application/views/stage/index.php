
	<input type="hidden" name="deafault_stage" id="deafault_stage" value="Organic Farm">

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
									<h4>INVENTORY STAGE DETAILS</h4>	
										<div class="tab-content">	<a data-toggle="modal" href="#add_new" class="btn btn-success btn-sm"><i class="icon icon-plus"></i> ADD NEW</a>
										 
                                                                    <a href="javascript:delete_selected_customer()" class="btn btn-danger"><i class="icon icon-trash"></i> DELETE</a>
												<div id="tb3_a" class="tab-pane active">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>Id</th>
                                                                                                              <th >Stage</th>
                                                                                                              <th >Stage</th>
                                                                                                             
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
				</div>
		
			</section>
			<div id="footer_space"></div>
		</div>
			<div id="edit_stage" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<form id="parsley_ext" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="update_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Update Stage</h4>
										</div>
										<div class="modal-body">
										<div class='row'>
											<div class='col col-lg-3'></div>										
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="stage">Stage</label>
												 <?php $estage=array('name'=>'estage',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'estage',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('estage'));
                                                                                                            echo form_input($estage)?>          
                                                                                                        <input type="hidden" name="stage_id" id="stage_id">
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="update_stage">UPDATE</button>        
												</div>	
											</div>		
										</div>	
										
										</div>
										</div>
									</form>
								 </div>
							</div>
						</div>
	<div id="add_new" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<form id="parsley_reg" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="stock_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Stage</h4>
										</div>
										<div class="modal-body">
										<div class='row text-center'>
											
										
											<div class='col col-lg-3'></div>										
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="stage">Stage</label>
												 <?php $stage=array('name'=>'stage',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'stage',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('stage'));
                                                                                                            echo form_input($stage)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_new_stock">SAVE</button>        
												</div>	
											</div>	
										</div>
										</div>
									</form>
								 </div>
							</div>
						</div>
     