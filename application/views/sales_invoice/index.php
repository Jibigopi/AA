
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
										<h4>SALES INVOICE DETAILS</h4>
										<div class="tab-content">	
												<div id="tb3_a" class="tab-pane active">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>Id</th>
                                                                                                              <th>Select</th>
                                                                                                              <th>Invoice Number</th>                                                                                                             
                                                                                                              <th>Address</th>                                                                                                             
                                                                                                              <th>Customer  </th>                                                                                                             
                                                                                                              <th>Customer  </th>                                                                                                             
                                                                                                              <th>Product</th>                                                                                                             
                                                                                                              <th>Approve</th>
                                                                                                              <th>Action</th>
                                                                                                              </tr>
                                                                                                            </thead>
                                                                                                            <tbody style="padding-bottom: 100px !important"> 
                                                                                                             </tbody>

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
                            <div id="add_sales" class="modal fade">
                            <div class="modal-dialog" style="width: 80%">
								<div class="modal-content">
                                                                    <form id="parsley_ext" action="<?php echo base_url('index.php/sales_order/add') ?>" method="post" onsubmit="false">
									<div class="modal-header">
											<button type="button" id="add_new_sales_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">SALE</h4>
										</div>
										<div class="modal-body">
											
                                                                                    <div class="row">
                                                                                        <div class='col col-lg-3 '>
                                                                                             <label ><br></label><label for="sales_order" class="pull-right">Invoice Number</label></div>										
                                                                                        <div class='col col-lg-2'>										
												<div class="form-group">
													   <label ><br></label>
											 <?php $invoice_number=array('name'=>'invoice_number_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'invoice_number_o',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('invoice_number'));
                                                                                                            echo form_input($invoice_number)?>          
                                                                                                           <input type="hidden" name="invoice_number" id="invoice_number">
                                                                                                           <input type="hidden" name="sales_order" id="sales_order">
												</div>	
											</div>
                                                                                            <div class='col col-lg-2'>
                                                                                              <div class="form-group">
                                                                                                    <label for="order_received_date">Order Received Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                         <input class="form-control" data-required='true' type="text" disabled="disabled" name="order_received_date" id="order_received_date">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    

                                                                                            </div>
                                                                                        </div>
                                                                                         <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="customer">Customer</label>
												 <?php $customer=array('name'=>'customer',
                                                                                                            'class'=>'form-control customer',
                                                                                                            'id'=>'customer',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('customer'));
                                                                                                            echo form_input($customer)?>          
													
												</div>	
                                                                                        </div>
                                                                                        
                                                                                        <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="product">Product</label>
												 <?php $product=array('name'=>'product',
                                                                                                            'class'=>'form-control product',
                                                                                                            'id'=>'product',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('product'));
                                                                                                            echo form_input($product)?>          
													
												</div>	
                                                                                        </div>
                                                                                       
                                                                                    </div>
                                                                                    <div class="row">
                                                                                          
                                                                                        <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="shipping_provider ">Shipping Provider </label>
												 <?php $shipping_provider=array('name'=>'shipping_provider',
                                                                                                            'class'=>'form-control ',
                                                                                                            'id'=>'shipping_provider',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('shipping_provider'));
                                                                                                            echo form_input($shipping_provider)?>          
													
												</div>	
                                                                                        </div>
                                                                                          <div class='col col-lg-2'>
                                                                                              <div class="form-group">
                                                                                                    <label for="shipping_date">Shipping Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" data-required='true' type="text" name="shipping_date" id="shipping_date">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    

                                                                                            </div>
                                                                                        </div> 
                                                                                          <div class='col col-lg-2'>
                                                                                              <div class="form-group">
                                                                                                    <label for="delivery_date">Delivery Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" data-required='true' type="text" name="delivery_date" id="delivery_date">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                  

                                                                                            </div>
                                                                                        </div> 
                                                                                          <div class='col col-lg-2'>
                                                                                              <div class="form-group">
                                                                                                    <label for="customer_received_date">Customer Recvd Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" data-required='true' type="text" name="customer_received_date" id="customer_received_date">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                   

                                                                                            </div>
                                                                                        </div> 
                                                                                          <div class='col col-lg-2'>
                                                                                              <div class="form-group">
                                                                                                    <label for="invoice_paid_date">Invoice Paid Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" data-required='true' type="text" name="invoice_paid_date" id="invoice_paid_date">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                   

                                                                                            </div>
                                                                                        </div> 
                                                                                        <input type="hidden" name="sales_order_guid" id="sales_order_guid">
                                                                                          <input type="hidden" name="product_id" id="product_id">
                                                                                          <input type="hidden" name="customer_id" id="customer_id">
												<div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="received_by "> Received By </label>
												 <?php $received_by=array('name'=>'received_by',
                                                                                                            'class'=>'form-control ',
                                                                                                            'id'=>'received_by',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('received_by'));
                                                                                                            echo form_input($received_by)?>          
													
												</div>	
                                                                                        </div>	
                                                                                        </div>
                                                                                    
                                                                                    <div class="row">
                                                                                        
                                                                                        <div class='col col-lg-2'>
                                                                                         
                                                                                            <div class="form-group">
													<label for="unit_price">CDPH</label>
												 <?php $cdph =array('name'=>'cdph',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'cdph',           
                                                                                                            'value'=>set_value('cdph'));
                                                                                                            echo form_input($cdph )?>   
                                                                                                        
												</div>
                                                                                        </div>
                                                                                        <div class='col col-lg-2'>
                                                                                         
                                                                                            <div class="form-group">
													<label for="ccof">CCOF No</label>
												 <?php $ccof=array('name'=>'ccof',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'ccof',
                                                                                                            'value'=>set_value('ccof'));
                                                                                                            echo form_input($ccof)?>   
                                                                                                        
												</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        
                                                                                        <div class='col col-lg-2'>
                                                                                         
                                                                                            <div class="form-group">
													<label for="unit_price">Unit Price</label>
												 <?php $unit_price=array('name'=>'unit_price_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'unit_price',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('unit_price'));
                                                                                                            echo form_input($unit_price)?>   
                                                                                                        <input type="hidden" name="unit_price" id="unit_price_o">
                                                                                                        <input type="hidden" name="unit_stock" id="unit_stock">
                                                                                                        
												</div>	
                                                                                            <div class="form-group">
													<label for="case_price">Case Price</label>
												 <?php $case_price=array('name'=>'case_price_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'case_price',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('case_price'));
                                                                                                            echo form_input($case_price)?>   
                                                                                                        <input type="hidden" name="case_price" id="case_price_o">
                                                                                                        <input type="hidden" name="case_stock" id="case_stock">
                                                                                                        
												</div>	
                                                                                               <div class="form-group">
													<label for="pallet_price">Price Pallet</label>
												 <?php $pallet_price=array('name'=>'pallet_price_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'pallet_price',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('pallet_price'));
                                                                                                            echo form_input($pallet_price)?>   
                                                                                                        <input type="hidden" name="pallet_price" id="pallet_price_o">
                                                                                                        <input type="hidden" name="pallet_stock" id="pallet_stock">
                                                                                                        
												</div>	
                                                                                        </div>
                                                                                          <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="no_of_unit">No Of Unit</label>
												 <?php $no_of_unit=array('name'=>'no_of_unit',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_unit',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'onkeyup'=>'update_total_unit_amount()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_unit'));
                                                                                                            echo form_input($no_of_unit)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="no_of_case">No Of case</label>
												 <?php $no_of_case=array('name'=>'no_of_case',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_case',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'onkeyup'=>'update_total_case_amount()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_case'));
                                                                                                            echo form_input($no_of_case)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="no_of_pallet">No Of Pallet</label>
												 <?php $no_of_pallet=array('name'=>'no_of_pallet',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_pallet',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'onkeyup'=>'update_total_pallet_amount()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_pallet'));
                                                                                                            echo form_input($no_of_pallet)?>          
													
												</div>	
                                                                                        </div>
                                                                                                <div class='col col-lg-2'>
                                                                                           <div class="form-group">
													<label for="total">Price For Units</label>
												 <?php $total_price_for_unit=array('name'=>'total_price_for_unit_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'total_price_for_unit',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('total_price_for_unit'));
                                                                                                            echo form_input($total_price_for_unit)?>  
                                                                                                        <input type="hidden" name="total_price_for_unit" id="total_price_for_unit_o">
													
												</div>	
                                                                                            <div class="form-group">
													<label for="total_price_for_case">Price For Case</label>
												 <?php $total_price_for_case=array('name'=>'total_price_for_case_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'total_price_for_case',
                                                                                                           'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('total_price_for_case'));
                                                                                                            echo form_input($total_price_for_case)?>          
                                                                                                        <input type="hidden" name="total_price_for_case" id="total_price_for_case_o">
												</div>	
                                                                                            <div class="form-group">
													<label for="total">Price For Pallet</label>
												 <?php $total_price_for_pallet=array('name'=>'total_price_for_pallet',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'total_price_for_pallet',
                                                                                                           'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('total_price_for_pallet'));
                                                                                                            echo form_input($total_price_for_pallet)?>   
                                                                                                        <input type="hidden" name="total_price_for_pallet" id="total_price_for_pallet_o">
													
												</div>	
                                                                                            <div class="form-group">
													<label for="total">Total Price</label>
												 <?php $total=array('name'=>'total_price_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'total_price_o',
                                                                                                           'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('total'));
                                                                                                            echo form_input($total)?>          
													 <input type="hidden" name="total_price" id="total_price">
												</div>	
                                                                                        </div>
                                                                                     
                                                                                         
                                                                                         <div class='col col-lg-2'>
                                                                                              <div class="form-group">
													<label for="payment">Payment Term</label>
												 <?php $payment=array('name'=>'payment',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'payment',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('payment'));
                                                                                                            echo form_input($payment)?>          
													
												</div>
                                                                                          	<div class="form-group">
													<label for="tax">Sale Tax</label>
												 <?php $tax=array('name'=>'tax',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'tax',
                                                                                                     'disabled'=>'disabled',
                                                                                                          'onkeyup'=>'grand_totals()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('tax'));
                                                                                                            echo form_input($tax)?>          
													
												</div>
                                                                                            <div class="form-group">
													<label for="discount">Discount</label>
												 <?php $discount=array('name'=>'discount',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'discount',
                                                                                                     'disabled'=>'disabled',
                                                                                                     'onkeyup'=>'grand_totals()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('discount'));
                                                                                                            echo form_input($discount)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="grand_total">Grand Total</label>
												 <?php $grand_total=array('name'=>'grand_total_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'grand_total_o',
                                                                                                           'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('grand_total'));
                                                                                                            echo form_input($grand_total)?>          
                                                                                                        <input type="hidden" name="grand_total" id="grand_total">
												</div>	
                                                                                             
                                                                                        </div>
                                                                                        <div class='col col-lg-2'>
                                                                                              <div class="form-group">
													<label for="shipping_cost">Shipping Cost</label>
												 <?php $shipping_cost=array('name'=>'shipping_cost',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'shipping_cost',
                                                                                                            'rows'=>4,
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('shipping_cost'));
                                                                                                            echo form_input($shipping_cost)?>          
													
												</div>
                                                                                        </div>
                                                                                        <div class='col col-lg-2'>
                                                                                              <div class="form-group">
													<label for="returns">Returns</label>
												 <?php $returns=array('name'=>'returns',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'returns',
                                                                                                            'rows'=>4,
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('returns'));
                                                                                                            echo form_textarea($returns)?>          
													
												</div>
                                                                                            <div class="form-group">
													<label for="notes">Notes</label>
												 <?php $notes=array('name'=>'notes',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'notes',
                                                                                                            'rows'=>4,
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('notes'));
                                                                                                            echo form_textarea($notes)?>          
													
												</div>
                                                                                        </div>
                                                                                         
                                                                                        </div>
                                                                                        <div class="row"> 
											<div class='col col-lg-4'></div>										
											<div class='col col-lg-4'>										
												<div class="form-group text-center">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" name="add_sales" id="add_sales">ADD SALE</button>        
												</div>	
											</div>
                                                                                        </div>
										
										</div>
									</form>
								 </div>
							</div>
						</div>
                            
			
             