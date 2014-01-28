
	<input type="hidden" name="deafault_sales_chanel" id="deafault_sales_chanel" value="Organic Farm">

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
									<h4>SALES CHANNEL DETAILS</h4>	
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
                                                                                                              <th >Sales Chanel</th>
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
			<div id="edit_sales_chanel" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<form id="parsley_ext" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="update_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Update Sales Chanel</h4>
										</div>
										<div class="modal-body">
										<div class='row'>
											<div class='col col-lg-3'></div>										
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="sales_chanel">Sales Chanel</label>
												 <?php $esales_chanel=array('name'=>'esales_chanel',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'esales_chanel',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('esales_chanel'));
                                                                                                            echo form_input($esales_chanel)?>          
                                                                                                        <input type="hidden" name="esales_chanel_id" id="esales_chanel_id">
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="update_sales_chanel">Update</button>        
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
											<h4 class="modal-title" id="myModalLabel">New Sales Chanel</h4>
										</div>
										<div class="modal-body">
										<div class='row text-center'>
											
										
											<div class='col col-lg-3'></div>										
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="sales_chanel">Sales Chanel</label>
												 <?php $sales_chanel=array('name'=>'sales_chanel',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'sales_chanel',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sales_chanel'));
                                                                                                            echo form_input($sales_chanel)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_new_sales_chanel">Save</button>        
												</div>	
											</div>	
										</div>
										</div>
									</form>
								 </div>
							</div>
						</div>
     