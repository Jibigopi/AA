
			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
                        <div class="modal fade" id="loading" style=" z-index: 2147483647 !important;">
    <div class="modal-dialog" style="width: 146px;margin-top: 20%;z-index: 9999999">
                
        <img src="<?php echo base_url('loader.gif') ?>" style="margin: auto">
                    
        </div>
</div>
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->
                                                <br>
						
						 
					<div class="row">
						<div class="col-sm-12">
								<div class="tabbable ">
                                                                    <h4>SUPPLIER DETAILS</h4>
										<div class="tab-content">	<a data-toggle="modal" href="#add_new" class="btn btn-success btn-sm"><i class="icon icon-plus"></i> ADD NEW</a>
										 
                                                                    <a href="javascript:delete_selected_customer()" class="btn btn-danger"><i class="icon icon-trash"></i> DELETE</a>
												<div id="tb3_a" class="tab-pane active">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>Id</th>
                                                                                                              <th>Select</th>
                                                                                                              <th>Suppler</th>                                                                                                             
                                                                                                              <th>Company</th>                                                                                                             
                                                                                                              <th>Contact</th>                                                                                                             
                                                                                                              <th>Email</th>                                                                                                             
                                                                                                              <th>Phone</th>                                                                                                             
                                                                                                            
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
			<div id="edit_supplier" class="modal fade">
							<div class="modal-dialog" style="width: 70%">
								<div class="modal-content">
                                                                    <form id="update_supplier_form" action="" method="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="update_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Update Supplier</h4>
										</div>
										<div class="modal-body">
											
                                                                                    <div class="row">
																					
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="supplier">Name</label>
												 <?php $supplier=array('name'=>'supplier',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'supplier',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('supplier'));
                                                                                                            echo form_input($supplier)?>          
													
												</div>	
                                                                                            <input type="hidden" name="supplier_id" id="supplier_id">
										</div>
                                                                                        <div class='col col-lg-3'>
                                                                                            <div class="form-group">
													<label for="company">Company</label>
												 <?php $company=array('name'=>'company',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'company',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('company'));
                                                                                                            echo form_input($company)?>          
													
												</div>	
                                                                                        </div>
                                                                                        <div class='col col-lg-3'>										
												<div class="form-group">
													<label for="email">Email</label>
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
													<label for="phone">Phone</label>
												 <?php $phone=array('name'=>'phone',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'phone',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('phone'));
                                                                                                            echo form_input($phone)?>          
													
												</div>	
                                                                                        </div>
                                                                                        
                                                                                        </div>
                                                                                    <div class="row">
											<div class='col col-lg-3'>
                                                                                            <div class="form-group">
													<label for="contact">Address</label>
												 <?php $contact=array('name'=>'contact',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'contact',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('contact'));
                                                                                                            echo form_input($contact)?>          
													
												</div>	
                                                                                        </div>										
																			
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
                                                                                        	
                                                                                    </div>
                                                                                     <div class='row'>
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
                                                                                         <script type="text/javascript">
                                                                                            function edit_select_supplier_type(guid) {
                                                                                                  var name=$('#update_supplier_form #selecting_'+guid).val();
                                                                                                $('#update_supplier_form #selected_types').append('<option id="selected_'+guid+'" onclick=edit_remove_supplier_type("'+guid+'"); >'+name+"</option>");
                                                                                                $('#update_supplier_form #selecting_'+guid).remove();
                                                                                                $('#update_supplier_form #selected_supplier_types').append('<input type="hidden" id="selected_type_'+guid+'" name="types[]" value="'+guid+'" >');
                                                                                            }
                                                                                            function edit_remove_supplier_type(guid) {
                                                                                              var name=$('#update_supplier_form #selected_'+guid).val();
                                                                                                $('#update_supplier_form #supplier_types').append("<option id='selecting_"+guid+"' value='"+name+"' onclick=edit_select_supplier_type('"+guid+"')>"+name+"</option>");
                                                                                                $('#update_supplier_form #selected_'+guid).remove();
                                                                                                $('#update_supplier_form #selected_supplier_types #selected_type_'+guid).remove();
                                                                                            }
                                                                                           </script>
                                                                                           <div id="selected_supplier_types">
                                                                                               
                                                                                           </div>
                                                                                        <div class='col col-lg-9'>										
                                                                                            <div class="row">
                                                                                                 <div class="col col-lg-6"><label for="supplier_types" >Supplier Types</label>
                                                                                                    <select name="" class="form-control" multiple="multiple" id='supplier_types'  style="height:200px ">
                                                                                                        
                                                                                                    </select>
                                                                                                </div>
                                                                                                 <div class="col col-lg-6"><label for="supplier_types" >Selected Supplier Types</label>
                                                                                                    <div id='parent_div'>
                                                                                                    <select name="" class="form-control" multiple="multiple" id='selected_types'  style="height:200px ">

                                                                                                    </select>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>	
											</div>
										</div>
                                                                                    <div class="row">    
											<div class='col col-lg-4'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="update_supplier">UPDATE</button>        
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
							<div class="modal-dialog" style="width: 70%">
								<div class="modal-content">
									<form id="parsley_reg" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="supplier_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Supplier</h4>
										</div>
										<div class="modal-body">
											
                                                                                    <div class="row">
																					
											<div class='col col-lg-3'>										
												<div class="form-group">
													<label for="supplier">Name</label>
												 <?php $supplier=array('name'=>'supplier',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'supplier',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('supplier'));
                                                                                                            echo form_input($supplier)?>          
													
												</div>	
											</div>
                                                                                        <div class='col col-lg-3'>
                                                                                            <div class="form-group">
													<label for="company">Company</label>
												 <?php $company=array('name'=>'company',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'company',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('company'));
                                                                                                            echo form_input($company)?>          
													
												</div>	
                                                                                        </div>
                                                                                       
                                                                                        <div class='col col-lg-3'>										
												<div class="form-group">
													<label for="email">Email</label>
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
													<label for="phone">Phone</label>
												 <?php $phone=array('name'=>'phone',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'phone',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('phone'));
                                                                                                            echo form_input($phone)?>          
													
												</div>	
                                                                                        </div>
                                                                                        </div>
                                                                                    <div class="row">
                                                                                         <div class='col col-lg-3'>
                                                                                            <div class="form-group">
													<label for="contact">Address</label>
												 <?php $contact=array('name'=>'contact',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'contact',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('contact'));
                                                                                                            echo form_input($contact)?>          
													
												</div>	
                                                                                        </div>
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
												
                                                                                    </div>
                                                                                    <div class="row">
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
                                                                                        <script type="text/javascript">
                                                                                            function select_supplier_type(guid) {
                                                                                                  var name=$('#parsley_reg #selecting_'+guid).val();
                                                                                                $('#parsley_reg #selected_types').append('<option id="selected_'+guid+'" onclick=remove_supplier_type("'+guid+'"); >'+name+"</option>");
                                                                                                $('#parsley_reg #selecting_'+guid).remove();
                                                                                                $('#parsley_reg #selected_supplier_types').append('<input type="hidden" id="selected_type_'+guid+'" name="types[]" value="'+guid+'" >');
                                                                                            }
                                                                                            function remove_supplier_type(guid) {
                                                                                              var name=$('#parsley_reg #selected_'+guid).val();
                                                                                                $('#parsley_reg #supplier_types').append("<option id='selecting_"+guid+"' value='"+name+"' onclick=select_supplier_type('"+guid+"')>"+name+"</option>");
                                                                                                $('#parsley_reg #selected_'+guid).remove();
                                                                                                $('#parsley_reg #selected_supplier_types #selected_type_'+guid).remove();
                                                                                            }
                                                                                           </script>
                                                                                           <div id="selected_supplier_types">
                                                                                               
                                                                                           </div>
                                                                                        <div class='col col-lg-9'>										
                                                                                            <div class="row">
                                                                                                 <div class="col col-lg-6"><label for="supplier_types" >Supplier Types</label>
                                                                                                    <select name="" class="form-control" multiple="multiple" id='supplier_types'  style="height:200px ">
                                                                                                        <?php foreach ($type as $rows){ ?>
                                                                                                        <option id='<?php echo 'selecting_'.$rows->guid; ?>' onclick="select_supplier_type('<?php echo $rows->guid ?>')" value="<?php  echo $rows->type?>"><?php  echo $rows->type ?></option>
                                                                                                        <?php } ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                                 <div class="col col-lg-6"><label for="supplier_types" >Selected Supplier Types</label>
                                                                                                    <div id='parent_div'>
                                                                                                    <select name="" class="form-control" multiple="multiple" id='selected_types'  style="height:200px ">

                                                                                                    </select>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>	
											</div>
                                                                                    </div>
                                                                                    <div class="row">
																					
											
                                                                                     										
											<div class='col col-lg-4'>										
												<div class="form-group text-center">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_supplier">SAVE</button>        
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
$('#update_supplier_form').validate(
{
rules: {
supplier: {
minlength: 2,
required: true
},
company: {
minlength: 2,
required: true
},
contact: {
minlength: 2,
required: true
},
email: {

required: true
},
phone: {
minlength: 10,

required: true
}

}
});});
                        </script>
                        <style type="text/css">
    #edit_supplier .error{
        color: #990000 !important;
    }
    #edit_supplier .form-group input.error {
        border: 1px solid #CC0000 
    }</style>