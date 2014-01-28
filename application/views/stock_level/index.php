
		<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
			
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->
                                                <br>
						
						 
					<div class="row">
                                            <div class="col col-lg-1">
                                                
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form_sep">
                                                        <label for="stage" >Inventory Stage</label>													
                                                        <input type="text" name="stage" value="" class="required  form-control" id="stage"  />                                                  
                                                         <input type="text" id="stage_id" >
                                                    </div>
                                            </div>
                                            <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                        <label for="location" >Storage Location</label>													
                                                        <input type="text" name="location" value="" class="required  form-control" id="location"  />   
                                                        <input type="text" id="location_id" >
                                                    </div>
                                            </div>
                                            
                                            <div class="col-lg-3">
                                                <div class="form_sep">
                                                        <label for="product" >Product</label>													
                                                        <input type="text" name="product" value="" class="required  form-control" id="product"  />  
                                                         <input type="text" id="product_id" >
                                                 </div>
                                            </div>
                                        </div>
					<div class="row">
                                            
						<div class="col-sm-12">
								<div class="tabbable ">
									<h4>Product Stock DETAILS</h4>	
										<div class="tab-content">	

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
			