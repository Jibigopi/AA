
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
										
										<div class="tab-content">	
												<div id="tb3_a" class="tab-pane active"> <h4>Supplier Contact</h4>
													<div class="panel panel-default">
                                                                                                           
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>SL NO</th>
                                                                                                              <th>Name</th>
                                                                                                              <th>Company</th>    
                                                                                                              <th>Address</th>                                                                                        
                                                                                                              <th>Email  </th>                                                                                                             
                                                                                                              <th>Phone  </th>      
                                                                                                              </tr>
                                                                                                            </thead>
                                                                                                            <tbody style="padding-bottom: 100px !important"> 
                                                                                                                <?php $i=0; foreach ($supplier as $srow){?>
                                                                                                                <tr><td><?php echo ++$i; ?></td><td><?php echo $srow->name ?></td><td><?php echo $srow->company ?></td><td><?php echo $srow->address ?></td><td><?php echo $srow->email ?></td><td><?php echo $srow->phone ?></td></tr>
                                                                                                                <?php } ?>
                                                                                                             </tbody>

                                                                                                          </table>
                                                                                                         
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
										<div class="tab-content">	
												<div id="tb3_a" class="tab-pane active"> <h4>Customer Contact</h4>
													<div class="panel panel-default">
                                                                                                           
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>SL NO</th>
                                                                                                              <th>Name</th>
                                                                                                              <th>Customer Type</th>    
                                                                                                              <th>Address</th>                                                                                        
                                                                                                              <th>Email  </th>                                                                                                             
                                                                                                              <th>Phone  </th>      
                                                                                                              </tr>
                                                                                                            </thead>
                                                                                                            <tbody style="padding-bottom: 100px !important"> 
                                                                                                                <?php $i=0; foreach ($customer as $crow){?>
                                                                                                                <tr><td><?php echo ++$i; ?></td><td><?php echo $crow->name ?></td><td><?php echo $crow->customer_type ?></td><td><?php echo $crow->address ?></td><td><?php echo $crow->email ?></td><td><?php echo $crow->phone ?></td></tr>
                                                                                                                <?php } ?>
                                                                                                             </tbody>

                                                                                                          </table>
                                                                                                         
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
										<div class="tab-content">	
												<div id="tb3_a" class="tab-pane active"> <h4>Warehouse Contact</h4>
													<div class="panel panel-default">
                                                                                                           
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>SL NO</th>
                                                                                                              <th>Name</th>   
                                                                                                              <th>Address</th>                                                                                        
                                                                                                              <th>Email  </th>                                                                                                             
                                                                                                              <th>Phone  </th>      
                                                                                                              </tr>
                                                                                                            </thead>
                                                                                                            <tbody style="padding-bottom: 100px !important"> 
                                                                                                                <?php $i=0; foreach ($location as $srow){?>
                                                                                                                <tr><td><?php echo ++$i; ?></td><td><?php echo $srow->name ?></td><td><?php echo $srow->contact ?></td><td><?php echo $srow->email ?></td><td><?php echo $srow->phone ?></td></tr>
                                                                                                                <?php } ?>
                                                                                                             </tbody>

                                                                                                          </table>
                                                                                                         
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
			
             