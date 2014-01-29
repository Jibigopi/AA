
		<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
			
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                        <div class="col-lg-3">
                                                            <div class="form_sep">
						 <h4> STOCK DETAILS</h4>
                                                 </div>
                                                            </div>
                                                 </div>
                                                </div>
						<!-- main content -->
                                                <br>
						
						 
					<div class="row">
                                            <div class="col-sm-12">
                                            <div class="col-lg-3">
                                                <div class="form_sep">
                                                        <label for="stage" >Inventory Stage</label>													
                                                        <input type="text" name="stage" value="" class="required  form-control" id="stage" style="width: 100%" />                                                  
                                                         <input type="hidden" id="stage_id" >
                                                    </div>
                                            </div>
                                            <div class="col col-lg-3">
                                                    <div class="form_sep">
                                                        <label for="location" >Storage Location</label>													
                                                        <input type="text" name="location" value="" class="required  form-control" id="location" style="width: 100%" />   
                                                        <input type="hidden" id="location_id" >
                                                    </div>
                                            </div>
                                            
                                            <div class="col-lg-3">
                                                <div class="form_sep">
                                                        <label for="product" >Product</label>													
                                                        <input type="text" name="product" value="" class="required  form-control" id="product" style="width: 100%" />  
                                                        <input type="hidden" id="product_id" >
                                                 </div>
                                            </div>
                                            <div class="col-lg-2">    <label for="product" >.</label>
                                                 <input type="button" class="btn btn-success" value="Clear" onclick="clear_search()">
                                            </div>
                                        </div>
                                        </div>
                                                <br><br>
					<div class="row">
                                            
						<div class="col-sm-12">
								<div class="tabbable ">
                                                                   	
										<div class="tab-content">	

												<div id="tb3_a" class="tab-pane active">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              
                                                                                                              <th >Stage</th>
                                                                                                              <th >Stage</th>
                                                                                                              <th >Location</th>
                                                                                                              <th >Product</th>
                                                                                                              <th >Sku</th>
                                                                                                              <th >Pallet Code</th>
                                                                                                              <th >Case Label</th>
                                                                                                              <th >Unit Stock</th>
                                                                                                              <th >Case Stock</th>
                                                                                                              <th >Pallet Stock</th>
                                                                                                             
                                                                                                              
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
			