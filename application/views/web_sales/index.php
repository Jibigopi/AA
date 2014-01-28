
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
									<h4>WEB SALES DETAILS</h4>	
                                                                    <div class="tab-content">	
                                                             
												<div id="tb3_a" class="tab-pane active">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>Id</th>
                                                                                                              <th>Select</th>
                                                                                                              <th>Order Number</th>                                                                                                             
                                                                                                              <th>Customer Name</th>                                                                                                             
                                                                                                                   <th>Customer Address  </th>                                                                                                         
                                                                                                              <th>Shipping Address  </th>                                                                                                             
                                                                                                              <th>Payment Status</th>     
                                                                                                             
                                                                                                              <th>Order Status</th>
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
			<div id="edit_web_sale" class="modal fade">
                            <div class="modal-dialog" style="width: 80%">
								<div class="modal-content">
                                                                    <form id="parsley_ext" action="<?php echo base_url('index.php/web_sale/add') ?>" method="post" onsubmit="false">
									<div class="modal-header">
											<button type="button" id="update_order_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">WEB SALE ORDER STATUS</h4>
										</div>
										<div class="modal-body">
											
                                                                                    <div class="row">
                                                                                        <div class='col col-lg-3 '>
                                                                                             <label ><br></label><label for="web_sale" class="pull-right">Order Number</label></div>										
                                                                                        <div class='col col-lg-2'>										
												<div class="form-group">
													   <label ><br></label>
												 <?php $web_sale=array('name'=>'web_sale',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'web_sale',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('web_sale'));
                                                                                                            echo form_input($web_sale)?>          
													
												</div>	
                                                                                            <input type="hidden" name="web_sale_guid" id="web_sale_guid">
											</div>
                                                                                            <div class='col col-lg-2'>
                                                                                              <div class="form-group">
                                                                                                    <label for="order_received_date">Order Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                         <input class="form-control" data-required='true' disabled="disabled" type="text" name="order_received_date" id="order_received_date">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    <span class="help-block">dd.mm.yyyy</span> 

                                                                                            </div>
                                                                                                    
                                                                                        </div> 
                                                                                        <div class="col  col-lg-2">
                                                                                                <label for="order_received_date">Order Status</label>
                                                                                                     <select name='order_status' id='order_status' class="form-control">
                                                                                                         <option value="1">Order Placed </option>
                                                                                                              <option value="2">Approved </option>
                                                                                                              <option value="3">Packing </option>
                                                                                                         </select>
                                                                                                   
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                          <div class='col col-lg-1'></div>
                                                                                        <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="customer">Customer Name</label>
												 <?php $customer=array('name'=>'cname',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'cname',
                                                                                                       'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('customer'));
                                                                                                            echo form_input($customer)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="caddress">Customer Address</label>
												 <?php $caddress=array('name'=>'caddress',
                                                                                                            'class'=>'form-control ',
                                                                                                            'id'=>'caddress',
                                                                                                            'rows'=>3,
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('customer'));
                                                                                                            echo form_textarea($caddress)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="cphone">Customer Phone</label>
												 <?php $cphone=array('name'=>'cphone',
                                                                                                            'class'=>'form-control ',
                                                                                                            'id'=>'cphone',
                                                                                                       'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('cphone'));
                                                                                                            echo form_input($cphone)?>          
													
												</div>
                                                                                            <div class="form-group">
													<label for="cemail">Customer Email</label>
												 <?php $cemail=array('name'=>'cemail',
                                                                                                            'class'=>'form-control ',
                                                                                                            'id'=>'cemail',
                                                                                                       'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('cemail'));
                                                                                                            echo form_input($cemail)?>          
													
												</div>
                                                                                        </div>
                                                                                        <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="sname">Shipping Name</label>
												 <?php $sname=array('name'=>'sname',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'sname',
                                                                                                       'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sname'));
                                                                                                            echo form_input($sname)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="saddress">Shipping Address</label>
												 <?php $saddress=array('name'=>'saddress',
                                                                                                            'class'=>'form-control ',
                                                                                                            'id'=>'saddress',
                                                                                                            'rows'=>3,
                                                                                                       'disabled'=>'disabled',
                                                                                                            'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('saddress'));
                                                                                                            echo form_textarea($saddress)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="sphone">Shipping Phone</label>
												 <?php $sphone=array('name'=>'sphone',
                                                                                                            'class'=>'form-control ',
                                                                                                            'id'=>'sphone',
                                                                                                       'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sphone'));
                                                                                                            echo form_input($sphone)?>          
													
												</div>
                                                                                            <div class="form-group">
													<label for="semail">Shipping Email</label>
												 <?php $semail=array('name'=>'semail',
                                                                                                            'class'=>'form-control ',
                                                                                                            'id'=>'semail',
                                                                                                       'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('semail'));
                                                                                                            echo form_input($semail)?>          
													
												</div>
                                                                                        </div>
                                                                                          <div class="col col-lg-6">
                                                                                              <table class="table table-striped" id="item_list_table">
                                                                                                 <thead>
                                                                                                            <tr>
                                                                                                              <th>S NO</th>
                                                                                                              <th >Product Name</th>
                                                                                                              <th >Quantity</th>
                                                                                                              <th >Price</th>
                                                                                                              <th >Total</th>
                                                                                                              </tr>
                                                                                                            </thead>
                                                                                                            <tbody id="ordered_items"> 
                                                                                                            </tbody> 
                                                                                              </table>
                                                                                          </div>
                                                                                       
                                                                                        </div>
                                                                                        <div class="row"> 
											<div class='col col-lg-4'></div>										
											<div class='col col-lg-4'>										
												<div class="form-group text-center">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" name="update_order" id="update_web_sale">UPDATE STATUS</button>        
												</div>	
											</div>
                                                                                        </div>
										
										</div>
									</form>
								 </div>
							</div>
						</div>
	<div id="add_new" class="modal fade">
							<div class="modal-dialog" style="width: 80%">
								<div class="modal-content">
									<form id="parsley_reg" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="add_order_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">ADD NEW SALES ORDER</h4>
										</div>
										<div class="modal-body">
											
                                                                                    <div class="row">
                                                                                        <div class='col col-lg-3 '>
                                                                                             <label ><br></label><label for="web_sale" class="pull-right">Sales Order Number</label></div>										
                                                                                        <div class='col col-lg-2'>										
												<div class="form-group">
													   <label ><br></label>
												 <?php $web_sale=array('name'=>'web_sale',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'web_sale',
                                                                                                     'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('web_sale'));
                                                                                                            echo form_input($web_sale)?>  
                                                                                                           <input type="hidden" name="web_saleweb_sale" id="web_sale_o">
													
												</div>	
											</div>
                                                                                            <div class='col col-lg-4'>
                                                                                              <div class="form-group">
                                                                                                    <label for="order_received_date">Order Received Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" data-required='true' type="text" name="order_received_date" id="order_received_date">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    <span class="help-block">dd.mm.yyyy</span> 

                                                                                            </div>
                                                                                        </div> 
                                                                                    </div>
                                                                                    <div class="row">
                                                                                          <div class='col col-lg-1'></div>
                                                                                        <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="customer">Customer</label>
												 <?php $customer=array('name'=>'customer',
                                                                                                            'class'=>'form-control customer',
                                                                                                            'id'=>'customer',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('customer'));
                                                                                                            echo form_input($customer)?>          
													
												</div>	
                                                                                        </div>
                                                                                        <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="recipient">Recipient</label>
												 <?php $recipient=array('name'=>'recipient',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'recipient',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('recipient'));
                                                                                                            echo form_input($recipient)?>          
													
												</div>	
                                                                                        </div>
                                                                                        <div class='col col-lg-2'>										
												<div class="form-group">
													<label for="address">Address</label>
												 <?php $address=array('name'=>'address',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'address',
                                                                                                     
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('address'));
                                                                                                            echo form_input($address)?>          
													
												</div>	
											</div>
                                                                                        <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="product">Product</label>
												 <?php $product=array('name'=>'product',
                                                                                                            'class'=>'form-control product',
                                                                                                            'id'=>'product',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('product'));
                                                                                                            echo form_input($product)?>          
													
												</div>	
                                                                                        </div>
                                                                                          <input type="hidden" name="product_id" id="product_id">
                                                                                          <input type="hidden" name="customer_id" id="customer_id">
													
                                                                                        </div>
                                                                                    
                                                                                    <div class="row">
                                                                                        <div class='col col-lg-1'></div>
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
                                                                                                            'onkeyup'=>'total_unit_amount()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_unit'));
                                                                                                            echo form_input($no_of_unit)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="no_of_case">No Of case</label>
												 <?php $no_of_case=array('name'=>'no_of_case',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_case',
                                                                                                            'onkeyup'=>'total_case_amount()',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('no_of_case'));
                                                                                                            echo form_input($no_of_case)?>          
													
												</div>	
                                                                                            <div class="form-group">
													<label for="no_of_pallet">No Of Pallet</label>
												 <?php $no_of_pallet=array('name'=>'no_of_pallet',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'no_of_pallet',
                                                                                                            'onkeyup'=>'total_pallet_amount()',
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
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('payment'));
                                                                                                            echo form_input($payment)?>          
													
												</div>
                                                                                          	
                                                                                             <div class="form-group">
													<label for="description">Description</label>
												 <?php $description=array('name'=>'description',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'description',
                                                                                                     'rows'=>4,
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('description'));
                                                                                                            echo form_textarea($description)?>          
													
												</div>
                                                                                        </div>
                                                                                        <div class='col col-lg-2'>
                                                                                              <div class="form-group">
													<label for="tax">Sale Tax</label>
												 <?php $tax=array('name'=>'tax',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'tax',
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
                                                                                         
                                                                                        </div>
                                                                                   
                                                                                       
                                                                                        <div class="row"> 
											<div class='col col-lg-4'></div>										
											<div class='col col-lg-4'>										
												<div class="form-group text-center">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_web_sale">SAVE</button>        
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
});
</script>
<style type="text/css">
    #parsley_ext .error{
        color: #990000 !important;
    }
    #parsley_ext .form-group input.error {
        border: 1px solid #CC0000 
    }</style>