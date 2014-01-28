
	<input type="hidden" name="deafault_storage_location" id="deafault_storage_location" value="Organic Farm">

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
										<h4>WAREHOUSE DETAILS</h4>
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
                                                                                                              <th>Location Name</th>                                                                                                             
                                                                                                              <th>Contact</th>                                                                                                             
                                                                                                              <th>Email</th>                                                                                                             
                                                                                                              <th>Sq Ft Unit Price</th>                                                                                                             
                                                                                                              <th>Total Sq Ft </th>
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
			<div id="edit_storage_location" class="modal fade">
                            <div class="modal-dialog" style="width: 70%">
								<div class="modal-content">
									<form id="parsley_ext" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="update_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Update Storage Location</h4>
										</div>
										<div class="modal-body">
                                                                                     <div class="row">
																					
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="storage_location">Location</label>
												 <?php $storage_location=array('name'=>'storage_location',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'storage_location',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('storage_location'));
                                                                                                            echo form_input($storage_location)?>          
													
												</div>	
											</div>
                                                                                        <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="available">Total Sq ft</label>
												 <?php $available=array('name'=>'available',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'available',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('available'));
                                                                                                            echo form_input($available)?>          
													
												</div>	
                                                                                        </div>
                                                                                        <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="price">Sq ft Unit Price</label>
												 <?php $price=array('name'=>'price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'price',
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
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('phone'));
                                                                                                            echo form_input($phone)?>          
													
												</div>	
                                                                                        </div>
                                                                                        <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="email">Email</label>
												 <?php $email=array('name'=>'email',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'email',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('email'));
                                                                                                            echo form_input($email)?>          
													
												</div>	
                                                                                        </div>
                                                                                        </div>
										<div class='row'>
																				
											<div class='col col-lg-4'>										
												<div class="form-group">
													       
                                                                                                        <input type="hidden" name="storage_location_id" id="storage_location_id">
													
												</div>	
											</div>	
											<div class='col col-lg-4'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="update_storage_location">UPDATE</button>        
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
											<button type="button" id="location_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Storage Location</h4>
										</div>
										<div class="modal-body">
											
                                                                                    <div class="row">
																					
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="storage_location">Location</label>
												 <?php $storage_location=array('name'=>'storage_location',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'storage_location',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('storage_location'));
                                                                                                            echo form_input($storage_location)?>          
													
												</div>	
											</div>
                                                                                        <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="available">Sq ft Available</label>
												 <?php $available=array('name'=>'available',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'available',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('available'));
                                                                                                            echo form_input($available)?>          
													
												</div>	
                                                                                        </div>
                                                                                        <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="price">Sq ft Unit Price</label>
												 <?php $price=array('name'=>'price',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'price',
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
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('phone'));
                                                                                                            echo form_input($phone)?>          
													
												</div>	
                                                                                        </div>
                                                                                        <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="email">Email</label>
												 <?php $email=array('name'=>'email',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'email',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('email'));
                                                                                                            echo form_input($email)?>          
													
												</div>	
                                                                                        </div>
                                                                                        </div>
                                                                                        <div class="row"> 
											<div class='col col-lg-4'></div>										
											<div class='col col-lg-4'>										
												<div class="form-group text-center">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_location">SAVE</button>        
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
$('#parsley_ext').validate(
{
rules: {
storage_location: {
minlength: 2,
required: true
},
available: {
minlength: 2,
required: true
},
price: {
minlength: 2,
number:true,
required: true
},
contact: {
minlength: 2,
required: true
},
phone: {
minlength: 2,
number:true,
required: true
},
email: {
    email:true,
minlength: 2,
required: true
}
}
});});
</script>
<style type="text/css">
    #parsley_ext .error{
        color: #990000 !important;
    }
    #parsley_ext .form-group input.error {
        border: 1px solid #CC0000 
    }</style>