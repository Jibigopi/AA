
			<nav id="mobile_navigation"></nav>
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						<h4>PRODUCT DETAILS</h4>
						<!-- main content -->
                                                <br>
                                                <?php   $form =array('name'=>'grains');
                                                echo form_open('grains/grains_list',$form) ?>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                        <tr>
                                                                          <th>Id</th>
                                                                          <th >Select</th>
                                                                          <th >Code</th>
                                                                          
                                                                          <th >Name</th>
                                                                          <th>Category Name</th>
                                                                         
                                                                          <th>SKU </th>
                                                                          <th width="100px">Action</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody >



                                                                        </tbody>

                                                                  </table>
								</div>
							</div>
						</div>
						<?php  echo form_close()?>
						
						

					</div>
				</div>
		            


			</section>
			<div id="footer_space"></div>
		</div>

