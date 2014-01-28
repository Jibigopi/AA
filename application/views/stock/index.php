
	

			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
			
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->
                                                <br>
						
						 
					<div class="row">
                                           
						<div class="col-sm-12">
                                                    <h4>INVENTORY DETAILS</h4>
								<div class="tabbable tabs-left tabbable-bordered">
										<ul class="nav nav-tabs">
											<?php $i=1;
                                                                                        foreach ($row as $stages){?>
                                                                                    
                                                                                    <li <?php if ($i==1){ ?> class="active"
                                                                                        <?php  } ?>><?php if ($i==1){ ?><input type="hidden" name="deafault_stage" id="deafault_stage" value="<?php echo $stages->name ?>"><?php  } ?> <a id="<?php echo 'stock_'.$i; ?>" data-toggle="tab" href="#tb3_a" onclick="get_stock('<?php echo $stages->name ?>')"><?php echo $stages->name ?></a></li>
                                                                                       <?php $i++; }
                                                                                        ?>
												
										</ul>
										<div class="tab-content">	<a data-toggle="modal" href="#newMail" onclick="Sales_order_number()" class="btn btn-success btn-sm"><i class="icon icon-plus"></i> ADD INVENTORY </a>
										 
                                                                    <a href="javascript:delete_selected_customer()" class="btn btn-danger"><i class="icon icon-trash"></i> DELETE</a>
                                                                    <div id="tb3_a" class="tab-pane active" style="margin-bottom:  75px;">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>Id</th>
                                                                                                              <th >Select</th>
                                                                                                              <th >Inventory ID</th>
                                                                                                              <th >Supplier</th>
                                                                                                              <th >Grain</th>
                                                                                                              <th>SKU</th>
                                                                                                              <th>Inventory Date </th>
                                                                                                              <th >Best Buy Date</th>
                                                                                                              <th>Storage Location</th>
                                                                                                            
													     
                                                                                                              <th width='150' >Action</th>
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
                                    </div>
			</section>

                        <div id="footer_space"><a href=""><i class="icon icon-note"></i></a></div>
		</div>
			<div id="edit_stock" class="modal fade">
							<div class="modal-dialog" style="width: 85%">
								<div class="modal-content">
                                                                    <form id="update_stock_form" action="<?php echo base_url('index.php/stock/update_stock') ?>" method="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="update_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Update Inventory</h4>
										</div>
										<div class="modal-body">
                                                                                    <div class='row'>
                                                                                    <div class='col col-lg-2'>										
												<div class="form-group">
													<label for="stage">Inventory Stage</label>												
												 <?php $stage=array('name'=>'estage',
                                                                                                        'class'=>'form-control',
                                                                                                        'id'=>'estage',
                                                                                                        'data-required'=>'true',
                                                                                                        'disabled'=>'disabled',
                                                                                                        'value'=>set_value('stage'));
                                                                                                        echo form_input($stage)?>             
													<input type="hidden" class="form-control"  name="stage" id="edis_stage">
													<input type="hidden" class="form-control"  name="edit_id" id="edit_id">
												</div>	
											</div>
                                                                                 
											<div class='col col-lg-2 '>
                                                                                            <label for="stage">Inventory ID</label>
                                                                                            <input type="text" id="stock_id_o" disabled="disabled" name="stock_id_o" class="form-control required" data-required="true">
                                                                                            <input type="hidden" id="stock_id"  name="stock_id" class="form-control required" data-required="true">
                                                                                        </div>
                                                                                    <div class='col col-lg-2'>
												<div class="form_sep">
                                                                                        <label for="supplier_name" class="reg">Supplier Name</label>
													
                                                                                           <input type="text" name="supplier_name"  class="required  form-control" id="supplier_name"  style="width: 100%;"/>                                                  
                                                                                           <input type='hidden' name='supplier_id' id='supplier_id'>
											</div> 
											</div> 
                                                                                         <div class='col-lg-2'>
												<div class="form_sep">
													<label for="grain">Product Name</label>
																									
                                                                                                                <input type="text" name="grain"  class="required  form-control" id="grain"  style="width: 100%;"/>                                                  

                                                                                                            </div>
                                                                                      </div>
                                                                                                        
                                                                                        <input type='hidden' name='grain_id' id='grain_id'>
                                                                                           	
                                                                                    <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="stock">Product ID</label>
													 <?php $invid=array('name'=>'invid',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'invid_add',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('invid'));
                                                                                                            echo form_input($invid)?>
												</div>
                                                                                        </div>	
                                                                                          <div class='col col-lg-2'>
                                                                                        <div class="form-group">
                                                                                            <label for="stock">SKU</label>
                                                                                            <?php
                                                                                            $sku = array('name' => 'sku',
                                                                                                'class' => 'form-control',
                                                                                                'id' => 'add_sku',
                                                                                                'disabled' => 'disabled',
                                                                                                'data-required' => 'true',
                                                                                                'value' => set_value('sku'));
                                                                                            echo form_input($sku)
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                     
                                                                                </div>
											
										<div class='row'>											
										
                                                                                    <div class='col col-lg-5'>
                                                                                            <div class="form-group">
													<label for="case_label">Case Label(GS1-128)</label>
													 <?php $case_label=array('name'=>'case_label',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'case_label',
                                                                                                              'data-required'=>'true',
                                                                                                            'value'=>set_value('case_label'));
                                                                                                            echo form_input($case_label)?>
												</div>
                                                                                        </div>
											<div class='col col-lg-5'>
                                                                                            <div class="form-group">
													<label for="pallet">Pallet code (SSCC)</label>
													 <?php $pallet=array('name'=>'pallet',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'pallet',
                                                                                                              'data-required'=>'true',
                                                                                                            'value'=>set_value('pallet'));
                                                                                                            echo form_input($pallet)?>
												</div>
                                                                                        </div>
											<div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="best_buy_date">Best Buy Date</label>
                                                                                                <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                <input class="form-control" data-required='true' type="text" name="best_buy_date" id="best_buy_date">
                                                                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                </div>
                                                                                                <span class="help-block">dd.mm.yyyy</span> 

                                                                                        </div>
                                                                                        </div>
                                                                                   
                                                                                </div>
										<div class='row'>
                                                                                  
                                                                                     <div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_of_unit">No of Units</label>
													 <?php $no_of_unit=array('name'=>'no_of_unit',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_unit',
                                                                                                            'onkeyup'=>'edit_total_amount()',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_unit'));
                                                                                                            echo form_input($no_of_unit)?>
                                                                                                   
												</div>
											</div>
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="unit_purchase_price">Unit Purchase Price</label>
													 <?php $unit_purchase_price=array('name'=>'unit_purchase_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'unit_purchase_price',
                                                                                                             'onkeyup'=>'edit_total_amount()',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('unit_purchase_price'));
                                                                                                            echo form_input($unit_purchase_price)?>
												</div>
											</div>
                                                                                          <div class='col col-lg-2'>
												<div class="form-group">
													<label for="unit_sales_price">Unit Sales Price</label>
													 <?php $unit_sales_price=array('name'=>'unit_sales_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'unit_sales_price',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('unit_sales_price'));
                                                                                                            echo form_input($unit_sales_price)?>
												</div>
											</div>
                                                                                          <div class='col col-lg-2'>
												<div class="form-group">
													<label for="amount_for_unit">Amount For Units</label>
													 <?php $amount_for_unit=array('name'=>'amount_for_unit_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'amount_for_unit_o',
                                                                                                             'disabled'=>'disabled',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('amount_for_unit_o'));
                                                                                                            echo form_input($amount_for_unit)?>
                                                                                                        <input type="hidden" name="amount_for_unit" id="amount_for_unit">
												</div>
											</div>
                                                                                    <div class='col col-lg-2'></div>
                                                                                   
											
                                                                                </div>
											
                                                                                    <div class="row">
                                                                                        
                                                                                        <div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_boxes">No of Cases</label>
													 <?php $no_boxes=array('name'=>'no_boxes',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_boxes',
                                                                                                              'onkeyup'=>'edit_total_for_case()',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_boxes'));
                                                                                                            echo form_input($no_boxes)?>
												</div>
											</div>	
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="case_purchase_price">Case Purchase Price</label>
													 <?php $case_purchase_price=array('name'=>'case_purchase_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'case_purchase_price',
                                                                                                              'onkeyup'=>'edit_total_for_case()',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('case_purchase_price'));
                                                                                                            echo form_input($case_purchase_price)?>
												</div>
											</div>
                                                                                    
                                                                                  
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="case_sales_price">Case Sales Price</label>
													 <?php $case_sales_price=array('name'=>'case_sales_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'case_price',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('case_sales_price'));
                                                                                                            echo form_input($case_sales_price)?>
                                                                                                       
												</div>
											</div>
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="amount_for_case">Total Price For Case</label>
													 <?php $amount_for_case=array('name'=>'amount_for_case_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'amount_for_case_o',
                                                                                                             'disabled'=>'disabled',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('amount_for_case'));
                                                                                                            echo form_input($amount_for_case)?>
                                                                                                         <input type="hidden" name="amount_for_case" id="amount_for_case">
												</div>
											</div>
                                                                                         <div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_of_unit_each_case">No of units Each Case</label>
													 <?php $no_of_unit_each_case=array('name'=>'no_of_unit_each_case',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_unit_each_case',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_unit_each_case'));
                                                                                                            echo form_input($no_of_unit_each_case)?>
												</div>
											</div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                     <div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_of_pallet">No of Pallet</label>
													 <?php $no_of_pallet=array('name'=>'no_of_pallet',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_pallet',
                                                                                                            'onkeyup'=>'edit_total_for_pallet()',
                                                                                                            'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_pallet'));
                                                                                                            echo form_input($no_of_pallet)?>
												</div>
											</div>
                                                                                    
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="pallet_purchase_price">Pallet Purchase Price </label>
													 <?php $pallet_purchase_price=array('name'=>'pallet_purchase_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'pallet_purchase_price',
                                                                                                            'data-type'=>'number',
                                                                                                            'onkeyup'=>'edit_total_for_pallet()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('pallet_purchase_price'));
                                                                                                            echo form_input($pallet_purchase_price)?>
												</div>
											</div>
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="pallet_sales_price">Pallet Sales Price </label>
													 <?php $pallet_sales_price=array('name'=>'pallet_sales_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'pallet_sales_price',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('pallet_sales_price'));
                                                                                                            echo form_input($pallet_sales_price)?>
												</div>
											</div>
                                                                                        <div class='col col-lg-2'>
												<div class="form-group">
													<label for="amount_for_pallet">Total Price For Pallet</label>
													 <?php $amount_for_unit=array('name'=>'amount_for_pallet_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'amount_for_pallet_o',
                                                                                                             'disabled'=>'disabled',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('amount_for_pallet'));
                                                                                                            echo form_input($amount_for_unit)?>
                                                                                                        <input type="hidden" name="amount_for_pallet" id="amount_for_pallet">
												</div>
											</div>
                                                                                       	
											<div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_of_case_each_pallet">No of Case Each Pallet</label>
													 <?php $no_of_case_each_pallet=array('name'=>'no_of_case_each_pallet',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_case_each_pallet',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_case_each_pallet'));
                                                                                                            echo form_input($no_of_case_each_pallet)?>
												</div>
											</div>	
												     <div class='col-lg-2'>
												<div class="form_sep">
													<label for="location">Storage Location</label>
																									
                                                                                                                <input type="text" name="location"  class="required  form-control" id="location"  style="width: 100%;"/>                                                  

                                                                                                            </div>
                                                                                      </div>
                                                                                                        
                                                                                        <input type='hidden' name='location_name_add' id='location_name_add'>
                                                                                           
                                                                                      
                                                                                </div>
                                                                                    <div class='row'>
                                                                                    
										
											
										<div class='col col-lg-4'>	</div>
										<div class='col col-lg-4'>	
                                                                                  <div class='col col-lg-4'><div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="update_stock">Update</button>        
												</div>	
												</div>	</div>
										</div>
										</div>
                                                                                      
													
												
                                                                                </div>
										
									</form>
								 </div>
							</div>
						</div>
	<div id="newMail" class="modal fade">
            <div class="modal-dialog" style="width: 85%">
								<div class="modal-content">
                                                                    <form id="parsley_reg" action="<?php echo base_url('index.php/stock/add_new_stock')?>" method="post">
										<div class="modal-header">
											<button type="button" id="stock_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Inventory</h4>
										</div>
										<div class="modal-body">
                                                                                    <div class='row'>
                                                                                    <div class='col col-lg-2'>										
												<div class="form-group">
													<label for="stage">Inventory Stage</label>												
												 <?php $stage=array('name'=>'dis_stage',
                                                                                                        'class'=>'form-control',
                                                                                                        'id'=>'dis_stage',
                                                                                                        'data-required'=>'true',
                                                                                                        'disabled'=>'disabled',
                                                                                                        'value'=>set_value('stage'));
                                                                                                        echo form_input($stage)?>             
                                                                                                        <input type="hidden" class="form-control"  name="stage" id="stage">
												</div>	
											</div>
                                                                                 
											<div class='col col-lg-2 '>
                                                                                            <label for="stage">Inventory ID</label>
                                                                                            <input type="text" id="stock_id_o" disabled="disabled" name="stock_id_o" class="form-control required" data-required="true">
                                                                                            <input type="hidden" id="stock_id" name="stock_id" class="form-control required" data-required="true">
                                                                                        </div>
                                                                                    <div class='col col-lg-2'>
												<div class="form_sep">
                                                                                        <label for="supplier_name" class="reg">Supplier Name</label>
													
                                                                                           <input type="text" name="supplier_name"  class="required  form-control" id="supplier_name"  style="width: 100%;"/>                                                  
                                                                                           <input type='hidden' name='supplier_id' id='supplier_id'>
											</div> 
											</div> 
                                                                                    <div class='col-lg-2'>
												<div class="form_sep">
													<label for="grain">Product Name</label>
																									
                                                                                                                <input type="text" name="grain"  class="required  form-control" id="grain"  style="width: 100%;"/>                                                  

                                                                                                            </div>
                                                                                      </div>
                                                                                                        
                                                                                        <input type='hidden' name='grain_id' id='grain_id'>
                                                                                                        
												
                                                                                    <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="stock">Product ID</label>
													 <?php $invid=array('name'=>'invid',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'invid_add',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('invid'));
                                                                                                            echo form_input($invid)?>
												</div>
                                                                                        </div>	
                                             
                                                                                          <div class='col col-lg-2'>
                                                                                        <div class="form-group">
                                                                                            <label for="stock">SKU</label>
                                                                                            <?php
                                                                                            $sku = array('name' => 'sku',
                                                                                                'class' => 'form-control',
                                                                                                'id' => 'add_sku',
                                                                                                'disabled' => 'disabled',
                                                                                                'data-required' => 'true',
                                                                                                'value' => set_value('sku'));
                                                                                            echo form_input($sku)
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                     
                                                                                </div>
										<div class='row'>
													
										</div>	
										<div class='row'>											
											
											
                                                                                    
                                                                                  
                                                                                    <div class='col col-lg-5'>
                                                                                            <div class="form-group">
													<label for="case_label">Case Label(GS1-128)</label>
													 <?php $case_label=array('name'=>'case_label',
                                                                                                            'class'=>'form-control required',
                                                                                                             'data-required' => 'true',
                                                                                                            'id'=>'case_label',
                                                                                                            'value'=>set_value('case_label'));
                                                                                                            echo form_input($case_label)?>
												</div>
                                                                                        </div>
											<div class='col col-lg-5'>
                                                                                            <div class="form-group">
													<label for="pallet">Pallet code (SSCC)</label>
													 <?php $pallet=array('name'=>'pallet',
                                                                                                            'class'=>'form-control',
                                                                                                             'data-required' => 'true',
                                                                                                            'id'=>'add_pallet',
                                                                                                            'value'=>set_value('pallet'));
                                                                                                            echo form_input($pallet)?>
												</div>
                                                                                        </div>
											<div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="best_buy_date">Best Buy Date</label>
                                                                                                <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                <input class="form-control" data-required='true' type="text" name="best_buy_date" id="best_buy_date">
                                                                                                <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                </div>
                                                                                                <span class="help-block">dd.mm.yyyy</span> 

                                                                                        </div>
                                                                                        </div>
                                                                                   
                                                                                </div>
										<div class='row'>
                                                                                  
                                                                                     <div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_of_unit">No of Units</label>
													 <?php $no_of_unit=array('name'=>'no_of_unit',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_unit',
                                                                                                            'onkeyup'=>'total_amount()',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_unit'));
                                                                                                            echo form_input($no_of_unit)?>
                                                                                                   
												</div>
											</div>
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="unit_purchase_price">Unit Purchase Price</label>
													 <?php $unit_purchase_price=array('name'=>'unit_purchase_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'unit_purchase_price',
                                                                                                             'onkeyup'=>'total_amount()',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('unit_purchase_price'));
                                                                                                            echo form_input($unit_purchase_price)?>
												</div>
											</div>
                                                                                          <div class='col col-lg-2'>
												<div class="form-group">
													<label for="unit_sales_price">Unit Sales Price</label>
													 <?php $unit_sales_price=array('name'=>'unit_sales_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'unit_sales_price',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('unit_sales_price'));
                                                                                                            echo form_input($unit_sales_price)?>
												</div>
											</div>
                                                                                          <div class='col col-lg-2'>
												<div class="form-group">
													<label for="amount_for_unit">Amount For Units</label>
													 <?php $amount_for_unit=array('name'=>'amount_for_unit_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'amount_for_unit_o',
                                                                                                             'disabled'=>'disabled',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('amount_for_unit_o'));
                                                                                                            echo form_input($amount_for_unit)?>
                                                                                                        <input type="hidden" name="amount_for_unit" id="amount_for_unit">
												</div>
											</div>
                                                                                    <div class='col col-lg-2'></div>
                                                                                   
											
                                                                                </div>
											
                                                                                    <div class="row">
                                                                                        
                                                                                        <div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_boxes">No of Cases</label>
													 <?php $no_boxes=array('name'=>'no_boxes',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_boxes',
                                                                                                              'onkeyup'=>'total_for_case()',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_boxes'));
                                                                                                            echo form_input($no_boxes)?>
												</div>
											</div>	
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="case_purchase_price">Case Purchase Price</label>
													 <?php $case_purchase_price=array('name'=>'case_purchase_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'case_purchase_price',
                                                                                                              'onkeyup'=>'total_for_case()',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('case_purchase_price'));
                                                                                                            echo form_input($case_purchase_price)?>
												</div>
											</div>
                                                                                    
                                                                                  
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="case_sales_price">Case Sales Price</label>
													 <?php $case_sales_price=array('name'=>'case_sales_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'case_price',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('case_sales_price'));
                                                                                                            echo form_input($case_sales_price)?>
                                                                                                       
												</div>
											</div>
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="amount_for_case">Total Price For Case</label>
													 <?php $amount_for_case=array('name'=>'amount_for_case_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'amount_for_case_o',
                                                                                                             'disabled'=>'disabled',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('amount_for_case'));
                                                                                                            echo form_input($amount_for_case)?>
                                                                                                         <input type="hidden" name="amount_for_case" id="amount_for_case">
												</div>
											</div>
                                                                                         <div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_of_unit_each_case">No of units Each Case</label>
													 <?php $no_of_unit_each_case=array('name'=>'no_of_unit_each_case',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_unit_each_case',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_unit_each_case'));
                                                                                                            echo form_input($no_of_unit_each_case)?>
												</div>
											</div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                     <div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_of_pallet">No of Pallet</label>
													 <?php $no_of_pallet=array('name'=>'no_of_pallet',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_pallet',
                                                                                                            'onkeyup'=>'total_for_pallet()',
                                                                                                            'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_pallet'));
                                                                                                            echo form_input($no_of_pallet)?>
												</div>
											</div>
                                                                                    
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="pallet_purchase_price">Pallet Purchase Price </label>
													 <?php $pallet_purchase_price=array('name'=>'pallet_purchase_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'pallet_purchase_price',
                                                                                                            'data-type'=>'number',
                                                                                                            'onkeyup'=>'total_for_pallet()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('pallet_purchase_price'));
                                                                                                            echo form_input($pallet_purchase_price)?>
												</div>
											</div>
                                                                                    <div class='col col-lg-2'>
												<div class="form-group">
													<label for="pallet_sales_price">Pallet Sales Price </label>
													 <?php $pallet_sales_price=array('name'=>'pallet_sales_price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'pallet_sales_price',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('pallet_sales_price'));
                                                                                                            echo form_input($pallet_sales_price)?>
												</div>
											</div>
                                                                                        <div class='col col-lg-2'>
												<div class="form-group">
													<label for="amount_for_pallet">Total Price For Pallet</label>
													 <?php $amount_for_unit=array('name'=>'amount_for_pallet_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'amount_for_pallet_o',
                                                                                                             'disabled'=>'disabled',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('amount_for_pallet'));
                                                                                                            echo form_input($amount_for_unit)?>
                                                                                                        <input type="hidden" name="amount_for_pallet" id="amount_for_pallet">
												</div>
											</div>
                                                                                       	
											<div class='col col-lg-2'>
												<div class="form-group">
													<label for="no_of_case_each_pallet">No of Case Each Pallet</label>
													 <?php $no_of_case_each_pallet=array('name'=>'no_of_case_each_pallet',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_case_each_pallet',
                                                                                                             'data-type'=>'number',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_case_each_pallet'));
                                                                                                            echo form_input($no_of_case_each_pallet)?>
												</div>
											</div>	
												
                                                                                        <div class="col-lg-2">
                                                                                        <div class="form_sep">
												<label for="location">Storage Location </label>
													
                                                                                                
                                                                                                  <input type="text"  class="required " id="location"  style="width: 100%;"/>                                                  
                                                                                              
                                                                                                </div>	
                                                                                            <input type="hidden" name="location_name_add" id="location_name_add">
                                                                                    </div>
                                                                                        
                                                                                </div>
                                                                                    <div class='row'>
                                                                                    
										
											
										<div class='col col-lg-4'>	</div>
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_new_stock">SAVE</button>        
												</div>	
												
										</div>
										</div>
										</div>
										</div>
									</form>
								 </div>
							</div>
            
						</div>
      <div id="receiving_notes" class="modal fade">
            <div class="modal-dialog" style="width: 70%">
								<div class="modal-content">
                                                                    <form id="receiving_note_form" action="<?php echo base_url('index.php/stock/receiving_note')?>" method="post">
										<div class="modal-header">
											<button type="button" id="receiving_notes_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Receiving Notes</h4>
										</div>
										<div class="modal-body">
                                                                                    <div class='row'>
                                                                                    
                                                                                    <div class='col col-lg-4 '><h4 class="pull-right">Inventory ID</h4></div>
											<div class='col col-lg-4 '>
                                                                                            <input type="text" id="stock_id" name="" required  disabled="disabled" class="form-control required" data-required="true">
                                                                                            <input type="hidden" name="stock_id" id="stock_guid">
                                                                                        </div>
                                                                                </div>
										<div class='row'>
											<div class='col col-lg-4'>
												<div class="form-group">
													<label for="grain">Product Category</label>
                                                                                                        <input type="text" class="form-control" disabled="disabled" data-required='true' name="product" id="product">
                                                                                                        
												</div>
											</div>	
										
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="item_no">Product ID</label>
													 <?php $item_no=array('name'=>'item_no',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'item_no',
                                                                                                             'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('item_no'));
                                                                                                            echo form_input($item_no)?>
												</div>
                                                                                        </div>	
                                                                                    <div class='col col-lg-4'>	
                                                                                        <div class="form-group">
													<label for="supplier">Supplier</label>
													 <?php $supplier=array('name'=>'supplier',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'supplier',
                                                                                                               'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('supplier'));
                                                                                                            echo form_input($supplier)?>
											   </div>
												
											</div>
												
										</div>	
										<div class='row'>											
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="delivery_date">Delivery Date</label>												
												  <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" type="text" name="delivery_date" id="delivery_date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    <span class="help-block">dd.mm.yyyy</span>
                                                                                                </div>	
                                                                                        </div>
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="delivery_status">Delivery Status  </label>
													 <select class="form-control" name="delivery_status" id="delivery_status">
                                                                                                            <option value="1">Active</option>
                                                                                                            <option value="0">Inactive</option>
                                                                                                        </select>
												</div>
                                                                                        </div>
                                                                                    <div class='col col-lg-4'>										
												<div class="form-group">
													<label for="received_by">Received By</label>
												
												 <?php $received_by=array('name'=>'received_by',
                                                                                                    'class'=>'form-control',
                                                                                                    'id'=>'received_by',
                                                                                                    'data-required'=>'true',
                                                                                                    'value'=>set_value('received_by'));
                                                                                                    echo form_input($received_by)?>             
												</div>	
											</div>
                                                                                </div>
										<div class='row'>
											<div class='col col-lg-4'>
												<div class="form-group">
													<label for="received_date">Received Date</label>
												 <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" type="text" name="received_date" id="received_date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    <span class="help-block">dd.mm.yyyy</span>
                                                                                                </div>	
											</div>	
										
												
                                                                                    <div class='col col-lg-4'>
												<div class="form-group">
													<label for="invoice_no">Invoice No</label>
													 <?php $invoice_no=array('name'=>'invoice_no',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'invoice_no',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('invoice_no'));
                                                                                                            echo form_input($invoice_no)?>
												</div>
											</div>	
                                                                                    <div class='col col-lg-4'>
												<div class="form-group">
													<label for="invoice_status">Invoice Status</label>
                                                                                                        <select class="form-control" name="invoice_status" id="invoice_status">
                                                                                                            <option value="1">Active</option>
                                                                                                            <option value="0">Inactive</option>
                                                                                                        </select>
												</div>
											</div>
										</div>		
											<div class='row'>
												
                                                                               
                                                                                        <div class='col col-lg-4'>										
												<div class="form-group">
												<label for="accounts">Accounts</label>
													 <?php $accounts=array('name'=>'accounts',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'accounts',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('accounts'));
                                                                                                            echo form_input($accounts)?>
                                                                                                </div>	
											</div>	
											
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_receiving_note">SAVE</button>        
												</div>	
												
										</div>
										</div>
										</div>
										</div>
									</form>

								 </div>
							</div>
						</div>
      <div id="inventory_withdrawals" class="modal fade">
            <div class="modal-dialog" style="width: 70%">
								<div class="modal-content">
                                                                    <form id="inventory_withdrawals_form" action="<?php echo base_url('index.php/stock/receiving_note')?>" method="post">
										<div class="modal-header">
											<button type="button" id="get_inventory_withdrawals_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Inventory Withdrawals</h4>
										</div>
										<div class="modal-body">
                                                                                    <div class='row'>
                                                                                    
                                                                                    <div class='col col-lg-4 '><h4 class="pull-right">Inventory ID</h4></div>
											<div class='col col-lg-4 '>
                                                                                            <input type="text" id="stock_id" name="" required  disabled="disabled" class="form-control required" data-required="true">
                                                                                            <input type="hidden" name="stock_id" id="stock_guid">
                                                                                        </div>
                                                                                </div>
											
										<div class='row'>											
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="date">Date</label>												
												  <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" type="text" name="date" id="date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    <span class="help-block">dd.mm.yyyy</span>
                                                                                                </div>	
                                                                                        </div>
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="storage_location">storage Location </label>
													 <?php $storage_location=array('name'=>'storage_location',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'storage_location',
                                                                                                             'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('storage_location'));
                                                                                                            echo form_input($storage_location)?>             
											   </div>
										        </div>
                                                                                    
                                                                                    <div class='col col-lg-4'>										
												<div class="form-group">
													<label for="label">Label</label>
												
												 <?php $label=array('name'=>'label',
                                                                                                    'class'=>'form-control',
                                                                                                    'id'=>'label',
                                                                                                    'disabled'=>'disabled',
                                                                                                    'data-required'=>'true',
                                                                                                    'value'=>set_value('label'));
                                                                                                    echo form_input($label)?>    
                                                                                                        <input type="hidden" name="label" id="label_add">
												</div>	
											</div>
                                                                                </div>
										<div class='row'>
											<div class='col col-lg-4'>
												<div class="form-group">
													<label for="issue_type">Issue Type</label>
                                                                                                        <select class="form-control" name="issue_type" id="issue_type">
                                                                                                            <option value="1">Manually</option>
                                                                                                            <option value="0">Automatically</option>
                                                                                                        </select>
                                                                                                </div>	
											</div>	
										
												
                                                                                    <div class='col col-lg-4'>
												<div class="form-group">
													<label for="sku">SKU</label>
													 <?php $sku=array('name'=>'sku',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'sku',
                                                                                                             'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sku'));
                                                                                                            echo form_input($sku)?>
												</div>
											</div>	
                                                                                    <div class='col col-lg-4'>
												<div class="form-group">
													<label for="grain_id">Product Id</label>
                                                                                                        <?php $grain_id=array('name'=>'grain_id',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'grain_id',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('grain_id'));
                                                                                                            echo form_input($grain_id)?>
												</div>
											</div>
										</div>		
											<div class='row'>
												
                                                                               
                                                                                        <div class='col col-lg-4'>										
												<div class="form-group">
												<label for="pallet_serial_no">Pallet serial No</label>
													 <?php $pallet_serial_no=array('name'=>'pallet_serial_no',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'pallet_serial_no',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('pallet_serial_no'));
                                                                                                            echo form_input($pallet_serial_no)?>
                                                                                                </div>	
											</div>	
                                                                                        <div class='col col-lg-4'>										
												<div class="form-group">
												<label for="cost">Cost</label>
													 <?php $cost=array('name'=>'cost',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'cost',
                                                                                                            
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('cost'));
                                                                                                            echo form_input($cost)?>
                                                                                                </div>	
											</div>	
											
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_inventory_withdrawals">SAVE</button>        
												</div>	
												
										</div>
										</div>
										</div>
										</div>
									</form>

								 </div>
							</div>
						</div>
      <div id="inventory_transfers" class="modal fade">
            <div class="modal-dialog" style="width: 70%">
								<div class="modal-content">
                                                                    <form id="inventory_transfers_form" action="<?php echo base_url('index.php/stock/receiving_note')?>" method="post">
										<div class="modal-header">
											<button type="button" id="inventory_transfers_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Inventory Transfers</h4>
										</div>
										<div class="modal-body">
                                                                                    <div class='row'>
                                                                                    
                                                                                    <div class='col col-lg-4 '><h4 class="pull-right">Inventory ID</h4></div>
											<div class='col col-lg-4 '>
                                                                                            <input type="text" id="stock_id" name="" required  disabled="disabled" class="form-control required" data-required="true">
                                                                                            <input type="hidden" name="stock_id" id="stock_guid">
                                                                                        </div>
                                                                                </div>
										<div class='row'>
                                                                                    <div class='col col-lg-4'>										
												<div class="form-group">
												<label for="product">Product ID</label>
													 <?php $product=array('name'=>'product',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'product',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('product'));
                                                                                                            echo form_input($product)?>
                                                                                                </div>	
											</div>
                                                                                    <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="sku">SKU</label>
													 <?php $sku=array('name'=>'sku',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'sku',
                                                                                                             'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sku'));
                                                                                                            echo form_input($sku)?>
												</div>
                                                                                        </div>
                                                                                    <div class="col col-lg-4">
                                                                                        <div class="form-group">
													<label for="reason_moved">Reason Moved</label>
													 <?php $reason_moved=array('name'=>'reason_moved',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'reason_moved',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('reason_moved'));
                                                                                                            echo form_input($reason_moved)?>
												</div>
                                                                                    </div>
											
                                                                                </div>
                                                                                    <div class="row">
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="orign_storage">Origin Storage Location</label>
													 <?php $orign_storage=array('name'=>'orign_storage',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'orign_storage',
                                                                                                             'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('orign_storage'));
                                                                                                            echo form_input($orign_storage)?>
												</div>
                                                                                        </div>	
                                                                                    <div class='col col-lg-4'>	
													<label for="destination">Destination Storage Location</label>
													
                                                                                                        <input type="text" class="form-control "  data-required='true' name="destination" id="destination">
                                                                                                        <input type='hidden' name='destination_id' id='destination_id'>
				
												
											</div>
												
																					
											
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="authorized_by">Authorized By</label>													 
                                                                                                        <?php $authorized_by=array('name'=>'authorized_by',
                                                                                                           'class'=>'form-control',
                                                                                                           'id'=>'authorized_by',
                                                                                                           'data-required'=>'true',
                                                                                                           'value'=>set_value('authorized_by'));
                                                                                                           echo form_input($authorized_by)?>
												</div>
                                                                                        </div>
                                                                                        </div>	
										<div class='row'>
                                                                                    <div class='col col-lg-4'>										
												<div class="form-group">
													<label for="transport_vender">Transport Vendor</label>
												
												 <?php $transport_vender=array('name'=>'transport_vender',
                                                                                                    'class'=>'form-control',
                                                                                                    'id'=>'transport_vender',
                                                                                                    'data-required'=>'true',
                                                                                                    'value'=>set_value('transport_vender'));
                                                                                                    echo form_input($transport_vender)?>             
												</div>	
											</div>
                                                                               
											<div class='col col-lg-4'>
												<div class="form-group">
													<label for="milage">Milage</label>
												<?php $milage=array('name'=>'milage',
                                                                                                    'class'=>'form-control',
                                                                                                    'id'=>'milage',
                                                                                                    'data-required'=>'true',
                                                                                                    'value'=>set_value('milage'));
                                                                                                    echo form_input($milage)?>             
												</div>
                                                                                                </div>	
											
										
												
                                                                                    <div class='col col-lg-4'>
                                                                                        <div class="form-group">
													<label for="date">Date</label>
                                                                                                    <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" type="text" name="date" id="date">
													<span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    <span class="help-block">dd.mm.yyyy</span>
                                                                                                </div>
												
											</div>
                                                                                    </div>	
										<div class='row'>
                                                                                    <div class='col col-lg-4'>
												
                                                                                    </div>
										
												
                                                                               
                                                                                        	
											
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_inventory_transfers">SAVE</button>        
												</div>	
												
										</div>
										</div>
										</div>
										</div>
									</form>

								 </div>
							</div>
						</div>
      <div id="inventory_location" class="modal fade">
            <div class="modal-dialog" style="width: 70%">
								<div class="modal-content">
                                                                    <form id="inventory_location_form" action="<?php echo base_url('index.php/stock/inventory_location')?>" method="post">
										<div class="modal-header">
											<button type="button" id="inventory_location_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Inventory Location</h4>
										</div>
										<div class="modal-body">
                                                                                    <div class='row'>
                                                                                    
                                                                                    <div class='col col-lg-4 '><h4 class="pull-right">Inventory ID</h4></div>
											<div class='col col-lg-4 '>
                                                                                            <input type="text" id="stock_id" name="" required  disabled="disabled" class="form-control required" data-required="true">
                                                                                            <input type="hidden" name="stock_id" id="stock_guid">
                                                                                        </div>
                                                                                </div>
										<div class='row'>
                                                                                    <div class='col col-lg-4'>										
												<div class="form-group">
												<label for="location">Location</label>
													 <?php $location=array('name'=>'location',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'location',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('location'));
                                                                                                            echo form_input($location)?>
                                                                                                </div>	
											</div>
                                                                                    <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="sqt">Sqr Ft Available</label>
													 <?php $sqt=array('name'=>'sqt',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'sqt',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sqt'));
                                                                                                            echo form_input($sqt)?>
												</div>
                                                                                        </div>
											<div class='col col-lg-4'>
												<div class="form-group">
													<label for="price">Sqr Ft Unit Price</label>
                                                                                                     <?php $price=array('name'=>'price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'price',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('price'));
                                                                                                            echo form_input($price)?>
                                                                                                </div>
											</div>	
                                                                                </div>
                                                                                    <div class="row">												
                                                                                    <div class='col col-lg-4'>	
                                                                                        <div class="form-group">
													<label for="contact">Contact</label>
													 <?php $contact=array('name'=>'contact',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'contact',
                                                                                                             'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('contact'));
                                                                                                            echo form_input($contact)?>
											   </div>												
											</div>
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="phone">Phone</label>													 
                                                                                                        <?php $phone=array('name'=>'phone',
                                                                                                           'class'=>'form-control',
                                                                                                           'id'=>'phone',
                                                                                                            'disabled'=>'disabled',
                                                                                                           'data-required'=>'true',
                                                                                                           'value'=>set_value('phone'));
                                                                                                           echo form_input($phone)?>
												</div>
                                                                                        </div>
                                                                                         <div class='col col-lg-4'>										
												<div class="form-group">
													<label for="email">Email</label>
												
												 <?php $email=array('name'=>'transport_vender',
                                                                                                    'class'=>'form-control',
                                                                                                    'id'=>'email',
                                                                                                     'disabled'=>'disabled',
                                                                                                    'data-required'=>'true',
                                                                                                    'value'=>set_value('email'));
                                                                                                    echo form_input($email)?>             
												</div>	
											</div>
                                                                                        </div>	
										<div class='row'>
                                                                                        <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="used">Used Sqr Ft</label>
													 <?php $used=array('name'=>'used',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'used',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('used'));
                                                                                                            echo form_input($used)?>
												</div>
                                                                                        </div>
                                                                               
											<div class='col col-lg-4'>
												<div class="form-group">
													<label for="transport">Transport</label>
												<?php $transport=array('name'=>'transport',
                                                                                                    'class'=>'form-control',
                                                                                                    'id'=>'transport',
                                                                                                    'data-required'=>'true',
                                                                                                    'value'=>set_value('transport'));
                                                                                                    echo form_input($transport)?>             
												</div>
                                                                                                </div>	
											
										
												
                                                                                    <div class='col col-lg-4'>
												<div class="form-group">
													<label for="temperature">Temperature</label>
													 <?php $temperature=array('name'=>'temperature',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'temperature',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('temperature'));
                                                                                                            echo form_input($temperature)?>
												</div>
											</div>
                                                                                    </div>	
										<div class='row'>
                                                                                    <div class='col col-lg-4'>
												
											</div>
										
												
                                                                               
                                                                                        	
											
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_inventory_location">SAVE</button>        
												</div>	
												
										</div>
										</div>
										</div>
										</div>
									</form>

								 </div>
							</div>
						</div>
                <script type="text/javascript">
$(document).ready(function() {
$('#update_stock_form').validate(
{
rules: {
item_no: {
minlength: 2,
required: true
},
grain: {
required: true
},
supplier: {
required: true
},
no_of_unit: {
required: true
},
unit_purchase_price: {
required: true
},
unit_sales_price: {
required: true
},
no_boxes: {
required: true
},
case_purchase_price: {
required: true
},
pallet: {
required: true
},
case_label: {
required: true
},
no_of_unit_each_case: {
required: true
},
no_of_pallet: {
required: true
},
pallet_purchase_price: {
required: true
},
pallet_sales_price: {
required: true
},
no_of_case_each_pallet: {
required: true
},
location: {
required: true
}
}
});
$('#receiving_note_form').validate(
{
rules: {
item_no: {
minlength: 2,
required: true
},
d_date: {
minlength: 2,
required: true
},
supplier: {
minlength: 2,
required: true
},
received_by: {
minlength: 2,
required: true
},
invoice_no: {
minlength: 2,
required: true
},
accounts: {
minlength: 2,
required: true
},
received_date: {
minlength: 2,
required: true
},
delivery_date: {
minlength: 2,
required: true
}
}
});
$('#inventory_withdrawals_form').validate(
{
rules: {
date: {
minlength: 2,
required: true
},
storage_location: {
minlength: 2,
required: true
},
label: {
minlength: 2,
required: true
},
sku: {
minlength: 2,
required: true
},
grain_id: {
minlength: 2,
required: true
},
pallet_serial_no: {
minlength: 2,
required: true
}
}
});
$('#inventory_transfers_form').validate(
{
rules: {
date: {
minlength: 2,
required: true
},
orign_storage: {
minlength: 2,
required: true
},
destination: {
required: true
},
authorized_by: {
minlength: 2,
required: true
},
transport_vender: {
minlength: 2,
required: true
},
milage: {
minlength: 2,
required: true
},
reason_moved: {
minlength: 2,
required: true
},
unit: {
minlength: 2,
number:true,
required: true
}
}
});
$('#inventory_location_form').validate(
{
rules: {
used: {
minlength: 2,
required: true
},
transport: {
minlength: 2,
required: true
},
temperature: {
minlength: 2,
required: true
}
}
});
});
</script>
<style type="text/css">
    #receiving_note_form .error{
        color: #990000 !important;
    }
    #receiving_note_form .form-group input.error {
        border: 1px solid #CC0000 
    }
    #inventory_withdrawals_form .error{
        color: #990000 !important;
    }
    #inventory_withdrawals_form .form-group input.error {
        border: 1px solid #CC0000 
    }
    #inventory_transfers_form .error{
        color: #990000 !important;
    }
    #inventory_transfers_form .form-group input.error {
        border: 1px solid #CC0000 
    }
    #inventory_location_form .error{
        color: #990000 !important;
    }
    #inventory_location_form .form-group input.error {
        border: 1px solid #CC0000 
    }
</style>