<script type="text/javascript">
function add_new_customer(){
    $('#add_customer').show('slow');
   
    
}
</script>
	<input type="hidden" name="deafault_customer" id="deafault_customer" value="Organic Farm">

			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
			
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
                                                <br>
					    <div class="row">
						<div class="col-sm-12">
								<div class="tabbable ">
										<h4>CUSTOMER DETAILS</h4>
										<div class="tab-content">
                                                                                    <a data-toggle="modal" href="#add_new" class="btn btn-success btn-sm"><i class="icon icon-plus"></i> ADD NEW</a>
										    <a href="javascript:delete_selected_customer()" class="btn btn-danger"><i class="icon icon-trash"></i> DELETE</a>
												<div id="tb3_a" class="tab-pane active">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>Id</th>
                                                                                                              <th >Stage</th>
                                                                                                              <th >First Name</th>
                                                                                                              <th >Customer Type</th>
                                                                                                              <th >Phone</th>
                                                                                                              <th >Email</th>
                                                                                                              <th >Address</th>
                                                                                                              <th >Shipping Address</th>
                                                                                                             
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
					    <div class="row" id="add_customer">
						<div class="col-sm-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                                <h4 class="panel-title">Add Customer</h4>                                                                               
                                                        </div>
                                                    </div>
						</div>
					</div>
				</div>
				</div>
		        </section>
			
			<div id="footer_space"></div>
		</div>
			<div id="edit_customer" class="modal fade">
                            <div class="modal-dialog" style="width: 60%">
								<div class="modal-content">
									<form id="parsley_ext" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="update_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Update Customer</h4>
										</div>
										<div class="modal-body">
                                                                                  <div class='row'>									
											<div class='col col-lg-3'>										
												<div class="form-group" class="req">
													<label for="firstname">First Name</label>
												 <?php $firstname=array('name'=>'firstname',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'firstname',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('firstname'));
                                                                                                            echo form_input($firstname)?>          
                                                                                                        <input type="hidden" name="customer_id"  id="customer_id">
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="lastname" class="req">Last Name</label>
												 <?php $lastname=array('name'=>'lastname',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'lastname',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('lastname'));
                                                                                                            echo form_input($lastname)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="email" class="req">Email</label>
												 <?php $email=array('name'=>'email',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'email',
                                                                                                            'data-required'=>'true',
                                                                                                            'data-type'=>'email',
                                                                                                            'value'=>set_value('email'));
                                                                                                            echo form_input($email)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="phone" class="req">Phone</label>
												 <?php $phone=array('name'=>'phone',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'phone',
                                                                                                            'data-required'=>'true',
                                                                                                            'data-type'=>'number',
                                                                                                            'value'=>set_value('phone'));
                                                                                                            echo form_input($phone)?>          
													
												</div>	
											</div>	
										</div>
										<div class='row'>									
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="address" class="req">Address</label>
												                   <?php $address = array(
                                                                                                                        'name'        => 'address',
                                                                                                                        'id'          => 'address',
                                                                                                                        'value'       =>  set_value('address'),
                                                                                                                        'rows'        => '2',                                                                                                    
                                                                                                                        'cols'        => '30',
                                                                                                                        'class'       =>'form-control required'                                                                                                                        
                                                                                                                      );
                                                                                                                    echo form_textarea($address);   ?>       
												</div>	
											</div>	
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="country" class="req">Shipping Address</label>
                                                                                                <?php $shipping_address = array(
                                                                                                                        'name'        => 'shipping_address',
                                                                                                                        'id'          => 'shipping_address',
                                                                                                                        'value'       =>  set_value('shipping_address'),
                                                                                                                        'rows'        => '2',                                                                                                    
                                                                                                                        'cols'        => '30',
                                                                                                                        'class'       =>'form-control required'                                                                                                                        
                                                                                                                      );
                                                                                                                    echo form_textarea($shipping_address);   ?>    
												</div>	
											</div>	
										</div>
                                                                                     <div class='row'>									
											<div class='col col-lg-3'>										
												<div class="form-group" >
													<label for="city">City</label>
												 <?php $city=array('name'=>'city',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'city',
                                                                                                            'value'=>set_value('city'));
                                                                                                            echo form_input($city)?>          
                                                                                                       
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="state" >State</label>
												 <?php $state=array('name'=>'state',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'state',
                                                                                                            'value'=>set_value('state'));
                                                                                                            echo form_input($state)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="country" >Country</label>
												 <?php $country=array('name'=>'country',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'country',
                                                                                                            'value'=>set_value('country'));
                                                                                                            echo form_input($country)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="Zip" >Zip</label>
												 <?php $zip=array('name'=>'zip',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'zip',
                                                                                                            'value'=>set_value('zip'));
                                                                                                            echo form_input($zip)?>          
													
												</div>	
											</div>	
										</div>
										<div class='row'>									
											<div class='col col-lg-3'>										
												<div class="form-group">
                                                                                                  <label for="customer_type" class="req">Customer Type</label>												
                                                                                                       
                                                                                              <select name="customer_type" class="form-control" id="customer_type">
                                                                                                      <option value="None">None</option>
                                                                                                  <?php foreach ($row as $type) {
                                                                                                      ?>
                                                                                                  <option value="<?php  echo $type->type ?>"><?php  echo $type->type ?></option>
                                                                                                          <?php
                                                                                                      
                                                                                                  }
                                                                                                  ?>
                                                                                                </select>
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="finance_manager" class="req">Finance Manger</label>	
                                                                                                <?php $finance_manager=array('name'=>'finance_manager',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'finance_manager',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('finance_manager'));
                                                                                                               echo form_input($finance_manager)?> 	
												</div>	
											</div>	
											<div class='col col-lg-3'>	
                                                                                                              <div class="form-group">
                                                                                                    <label for="order_received_date">Order Received Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" data-required='true' type="text" name="date_of_record" id="date_of_record">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    <span class="help-block">dd.mm.yyyy</span> 

                                                                                            </div>
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="web" >Web</label>	
                                                                                                                   <?php $web=array('name'=>'web',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'web',
                                                                                                                                    'value'=>set_value('web'));
                                                                                                               echo form_input($web)?> 	
												</div>	
											</div>	
										</div>
										<div class='row'>									
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="handed_of_day" class="req">Handed Of Day</label>	
                                                                                                                   <?php $handed_of_day=array('name'=>'handed_of_day',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'handed_of_day',
                                                                                                                                    'value'=>set_value('handed_of_day'));
                                                                                                               echo form_input($handed_of_day)?> 	
												</div>
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="organic" >Organic Certification </label>	
                                                                                                                   <?php $organic=array('name'=>'organic',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'organic',                                                                                                                                   
                                                                                                                                    'value'=>set_value('organic'));
                                                                                                               echo form_input($organic)?> 	
												</div>
											</div>	
											<div class='col col-lg-3'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="update_customer">UPDATE</button>        
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
            <div class="modal-dialog" style="width: 60%">
								<div class="modal-content">
									<form id="parsley_reg" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="add_customer_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Customer</h4>
										</div>
										<div class="modal-body">
										<div class='row'>									
											<div class='col col-lg-3'>										
												<div class="form-group" class="req">
													<label for="firstname">First Name</label>
												 <?php $firstname=array('name'=>'firstname',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'firstname',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('firstname'));
                                                                                                            echo form_input($firstname)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="lastname" class="req">Last Name</label>
												 <?php $lastname=array('name'=>'lastname',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'lastname',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('lastname'));
                                                                                                            echo form_input($lastname)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="email" class="req">Email</label>
												 <?php $email=array('name'=>'email',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'email',
                                                                                                            'data-required'=>'true',
                                                                                                            'data-type'=>'email',
                                                                                                            'value'=>set_value('email'));
                                                                                                            echo form_input($email)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="phone" class="req">Phone</label>
												 <?php $phone=array('name'=>'phone',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'phone',
                                                                                                            'data-required'=>'true',
                                                                                                            'data-type'=>'number',
                                                                                                            'value'=>set_value('phone'));
                                                                                                            echo form_input($phone)?>          
													
												</div>	
											</div>	
										</div>
										<div class='row'>									
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="address" class="req">Address</label>
												                   <?php $address = array(
                                                                                                                        'name'        => 'address',
                                                                                                                        'id'          => 'address',
                                                                                                                        'value'       =>  set_value('address'),
                                                                                                                        'rows'        => '2',                                                                                                    
                                                                                                                        'cols'        => '30',
                                                                                                                        'class'       =>'form-control required'                                                                                                                        
                                                                                                                      );
                                                                                                                    echo form_textarea($address);   ?>       
												</div>	
											</div>	
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="country" class="req">Shipping Address</label>
                                                                                                <?php $shipping_address = array(
                                                                                                                        'name'        => 'shipping_address',
                                                                                                                        'id'          => 'shipping_address',
                                                                                                                        'value'       =>  set_value('shipping_address'),
                                                                                                                        'rows'        => '2',                                                                                                    
                                                                                                                        'cols'        => '30',
                                                                                                                        'class'       =>'form-control required'                                                                                                                        
                                                                                                                      );
                                                                                                                    echo form_textarea($shipping_address);   ?>    
												</div>	
											</div>	
										</div>
                                                                                     <div class='row'>									
											<div class='col col-lg-3'>										
												<div class="form-group" >
													<label for="city">City</label>
												 <?php $city=array('name'=>'city',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'city',
                                                                                                            'value'=>set_value('city'));
                                                                                                            echo form_input($city)?>          
                                                                                                       
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="state" >State</label>
												 <?php $state=array('name'=>'state',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'state',
                                                                                                            'value'=>set_value('state'));
                                                                                                            echo form_input($state)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="country" >Country</label>
												 <?php $country=array('name'=>'country',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'country',
                                                                                                            'value'=>set_value('country'));
                                                                                                            echo form_input($country)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="Zip" >Zip</label>
												 <?php $zip=array('name'=>'zip',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'zip',
                                                                                                            'value'=>set_value('zip'));
                                                                                                            echo form_input($zip)?>          
													
												</div>	
											</div>	
										</div>
										<div class='row'>									
											<div class='col col-lg-3'>										
												<div class="form-group">
                                                                                                  <label for="customer_type" class="req">Customer Type</label>												
                                                                                                 
                                                                                                  <select name="customer_type" class="form-control">
                                                                                                      <option value="None">None</option>
                                                                                                  <?php foreach ($row as $type) {
                                                                                                      ?>
                                                                                                  <option value="<?php  echo $type->type ?>"><?php  echo $type->type ?></option>
                                                                                                          <?php
                                                                                                      
                                                                                                  }
                                                                                                  ?>
                                                                                                </select>
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="finance_manager" class="req">Finance Manger</label>	
                                                                                                <?php $finance_manager=array('name'=>'finance_manager',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'finance_manager',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('finance_manager'));
                                                                                                               echo form_input($finance_manager)?> 	
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												     <div class="form-group">
                                                                                                    <label for="order_received_date">Order Received Date</label>
                                                                                                     <div class="input-group date ebro_datepicker" data-date-format="dd.mm.yyyy" data-date-autoclose="true" data-date-start-view="2">
                                                                                                    <input class="form-control" data-required='true' type="text" name="date_of_record" id="date_of_record">
                                                                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                                                                    </div>
                                                                                                    <span class="help-block">dd.mm.yyyy</span> 

                                                                                            </div>
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="web" >Web</label>	
                                                                                                                   <?php $web=array('name'=>'web',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'web',
                                                                                                                                    'value'=>set_value('web'));
                                                                                                               echo form_input($web)?> 	
												</div>	
											</div>	
										</div>
										<div class='row'>									
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="handed_of_day" class="req">Handed Of Day</label>	
                                                                                                                   <?php $handed_of_day=array('name'=>'handed_of_day',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'handed_of_day',
                                                                                                                                    'value'=>set_value('handed_of_day'));
                                                                                                               echo form_input($handed_of_day)?> 	
												</div>
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="organic" >Organic Certification </label>	
                                                                                                                   <?php $organic=array('name'=>'organic',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'organic',                                                                                                                                   
                                                                                                                                    'value'=>set_value('organic'));
                                                                                                               echo form_input($organic)?> 	
												</div>
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_new_customer">SAVE</button>        
												</div>	
											</div>	
										</div>
										</div>
									</form>
								 </div>
							</div>
						</div>
                                             