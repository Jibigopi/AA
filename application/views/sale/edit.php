<script type="text/javascript">


</script>

			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
			
			<section class="container clearfix main_section">
                            
                            <div id="main_content_outer" class="clearfix"><div class="row">
                                    <div class="col col-lg-7">
                                         <?php echo validation_errors(); ?>
                                    </div>
                                </div>
                                    <form id="parsley_reg" action="<?php echo base_url('index.php/sale/update');?>" method="post">
	<?php foreach ($sale as $row) { ?>
                                  <div id="main_content"> <br>
				     <div class="row">
					<div class="col-sm-12">
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                       <label for="invoice">Invoice No</label>                                                        
                                                     <?php $invoice=array('name'=>'invoice',
                                                        'class'=>'form-control',
                                                        'id'=>'invoice',
                                                         'disabled'=>'disabled',
                                                        'data-required'=>'true',
                                                        'value'=>$row->invoice);
                                                        echo form_input($invoice)?>    
                                                           
                                                </div>
                                            </div>	
                                            <input type="hidden" name="guid" value="<?php echo $row->guid ?>">
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="customer">Customer</label>                                                        
                                                     <?php $customer=array('name'=>'customer',
                                                        'class'=>'form-control customer',
                                                        'id'=>'customer',
                                                        'data-required'=>'true',
                                                        'value'=>$row->customer);
                                                        echo form_input($customer)?>  
                                                </div>
                                            </div>	
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="product">Product Name</label>
                                                        <?php $product=array('name'=>'product',
                                                        'class'=>'form-control product',
                                                        'id'=>'product',
                                                        'data-required'=>'true',
                                                        'value'=>$row->product);
                                                        echo form_input($product)?>  
                                                        
                                                </div>
                                            </div>	
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="pallet">Pallet Number</label>
                                                        <?php $pallet=array('name'=>'o_pallet',
                                                        'class'=>'form-control',
                                                        'id'=>'pallet',
                                                        'disabled'=>'disabled',
                                                        'data-required'=>'true',
                                                        'value'=>$row->pallet);
                                                        echo form_input($pallet)?>  
                                                          <input type="hidden" name="pallet" value="<?php echo $row->pallet ?>" id="o_pallet">
                                                </div>
                                            </div>	
					</div>
				    </div>
                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="price">Unit Price</label>
                                                          <?php $price=array('name'=>'d_price',
                                                                'class'=>'form-control ',
                                                                'id'=>'price',
                                                                'disabled'=>'disabled',
                                                                'data-required'=>'true',
                                                                'value'=>$row->price);
                                                                echo form_input($price)?>  
                                                          <input type="hidden" name="price" value="<?php echo $row->price ?>" id="o_price">
                                                        
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="no_of_unit">No Of Unit</label>
                                                          <?php $no_of_unit=array('name'=>'no_of_unit',
                                                                'class'=>'form-control ',
                                                                'id'=>'no_of_unit',
                                                             'onkeyup'=>'total_amount()',
                                                                'data-required'=>'true',
                                                                'value'=>$row->no_of_unit);
                                                                echo form_input($no_of_unit)?>  
                                                        
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="shipping">Shipping Cost</label>
                                                          <?php $shipping=array('name'=>'shipping',
                                                                'class'=>'form-control ',
                                                                'id'=>'shipping',
                                                                'onkeyup'=>'total_amount()',
                                                                'data-required'=>'true',
                                                                'value'=>$row->shipping);
                                                                echo form_input($shipping)?>                                                          
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="tax">Tax</label>
                                                          <?php $tax=array('name'=>'tax',
                                                                'class'=>'form-control ',
                                                                'id'=>'tax',
                                                                'onkeyup'=>'total_amount()',
                                                                'data-required'=>'true',
                                                                'value'=>$row->tax);
                                                                echo form_input($tax)?>                                                          
                                                </div>
                                            </div> 
                                           
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="total">Total Price</label>
                                                          <?php $total=array('name'=>'demo_total',
                                                                'class'=>'form-control ',
                                                                'id'=>'total',
                                                              'disabled'=>'disabled',
                                                                'data-required'=>'true',
                                                                'value'=>$row->total);
                                                                echo form_input($total)?>  
                                                        <input type="hidden" value="<?php echo $row->total ?>" name="total" id="o_total">
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="order_received_date">Order Received Date</label>
                                                         <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                        <input class="form-control" data-required='true' type="text" name="order_received_date" value="<?php echo $row->order_received_date ?>" id="order_received_date">
                                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <span class="help-block">dd.mm.yyyy</span> 
                                                        
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="processed_date">Processed Date</label>
                                                          <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                        <input class="form-control" data-required='true' type="text" name="processed_date" value="<?php echo $row->processed_date ?>" id="processed_date">
                                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <span class="help-block">dd.mm.yyyy</span>                                                         
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="shipping_date">Shipping Date</label>
                                                        <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                        <input class="form-control" data-required='true' type="text" name="shipping_date" value="<?php echo $row->shipping_date ?>" id="shipping_date">
                                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <span class="help-block">dd.mm.yyyy</span>                                                         
                                                </div>
                                            </div> 
                                           
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="delivery_date">Delivery Date</label>
                                                          <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                        <input class="form-control" data-required='true' type="text" name="delivery_date" value="<?php echo $row->delivery_date ?>" id="delivery_date">
                                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <span class="help-block">dd.mm.yyyy</span>
                                                        
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="provider">Shipping Provider</label>
                                                          <?php $provider=array('name'=>'provider',
                                                                'class'=>'form-control ',
                                                                'id'=>'provider',
                                                                'data-required'=>'true',
                                                                'value'=>$row->provider);
                                                                echo form_input($provider)?>  
                                                        
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="received_by">Received By</label>
                                                          <?php $received_by=array('name'=>'received_by',
                                                                'class'=>'form-control ',
                                                                'id'=>'received_by',
                                                                'data-required'=>'true',
                                                                'value'=>$row->received_by);
                                                                echo form_input($received_by)?>                                                          
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                    <label for="customer_received">Customer Received Date</label>
                                                         <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                             <input class="form-control" data-required='true' type="text" name="customer_received" value="<?php echo $row->customer_received ?>" id="customer_received">
                                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <span class="help-block">dd.mm.yyyy</span>                                                       
                                                </div>
                                            </div> 
                                           
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="payment">Payment Method</label>
                                                          <?php $payment=array('name'=>'payment',
                                                                'class'=>'form-control ',
                                                                'id'=>'payment',
                                                                'data-required'=>'true',
                                                                'value'=>$row->payment);
                                                                echo form_input($payment)?>  
                                                        
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="invoice_paid_date">Invoice Paid Date</label>
                                                          <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                        <input class="form-control"  data-required='true' type="text" name="invoice_paid_date"value="<?php echo $row->invoice_paid_date ?>" id="invoice_paid_date">
                                                        <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <span class="help-block">dd.mm.yyyy</span>  
                                                        
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                        <label for="returns">Returns</label>
                                                          <?php $returns=array('name'=>'returns',
                                                                'class'=>'form-control ',
                                                                'id'=>'returns',
                                                                'data-required'=>'true',
                                                                'value'=>$row->returns);
                                                                echo form_input($returns)?>                                                          
                                                </div>
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <div class="form-group">
                                                    <label for="notes">Notes</label>
                                                          <?php $notes=array('name'=>'notes',
                                                                'class'=>'form-control ',
                                                                'id'=>'notes',
                                                                'data-required'=>'true',
                                                                'value'=>$row->notes);
                                                                echo form_input($notes)?>                                                          
                                                </div>
                                            </div> 
                                           
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-lg-12">
                                            <div class='col col-lg-3'>
                                                
                                            </div> 
                                            <div class='col col-lg-3'>
                                                <input type="submit" class="btn btn-success" name="update" value="UPDATE SALE" >
                                            </div> 
                                        </div>
                                    </div>
        </div><?php }?>
                                        </form>
                                </div>
		         </section>
			<div id="footer_space"></div>
		</div>
			
	
    