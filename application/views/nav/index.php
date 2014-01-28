		<div id="wrapper_all">
			<header id="top_header">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-2">
							
						</div>
						<div class="col-sm-push-4 col-sm-3 text-right hidden-xs">
							
							
                                                    
						</div>
						<div class="col-xs-6 col-sm-push-4 col-sm-3">
							<div class="pull-right dropdown">ADMIN
								<a href="#" class="user_info dropdown-toggle"  data-toggle="dropdown">
									
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a data-toggle="modal" href="#profile_password_for_update">Profile</a></li>
									
									<li><a href="<?php  echo base_url()?>index.php/dashboard/logout">Log Out</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-pull-6 col-sm-4">
							<form class="main_search">
								<input type="text" id="search_query" name="search_query" class="typeahead form-control">
								<button type="submit" class="btn btn-primary btn-xs"><i class="icon-search icon-white"></i></button>
							</form> 
						</div>
					</div>
				</div>
			</header>
                    <script type="text/javascript">
                        $(document).ready(function() { 
                            profile_password_for_update_form.onsubmit=function()
                                { 
                                  return false;
                                }      
                            update_password_window_form.onsubmit=function()
                                { 
                                  return false;
                                }      
                                        
                    $("#SUBMIT_password_window").click(function() {
			 inputs = $('#profile_password_for_update_form').serialize();
				  $.ajax ({
					url: "<?php echo base_url('index.php/dashboard/profile_password_checking')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                            if(response['responseText']!='FALSE'){
                                                    
                                                     $('#update_password_window_form #username').val(response['responseText'])
                                                    document.getElementById('profile_pasword_close').click(); 
                                                   $('#profile_password_username').modal('show');
                                            }else{
                                                       bootbox.alert('Please Enter Current Password');
                                                  }
					}
				  });
				}); 
                    $("#update_password_window").click(function() {
			 inputs = $('#update_password_window_form').serialize();
                         if($('#update_password_window_form #username').val()!="" && $('#update_password_window_form #password').val()!="" && $('#update_password_window_form #password').val()!="")
				{ 
                                 
                                 if($('#update_password_window_form #password').val()===$('#update_password_window_form #cpassword').val())     
            {
                                $.ajax ({
					url: "<?php echo base_url('index.php/dashboard/update_admin_profile')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                            if(response['responseText']=='TRUE'){
                                                   bootbox.alert('Profile Updated ');     
                                                      document.getElementById('porofile_update_window_close').click(); 
                                            }else{
                                                      bootbox.alert('Please Enter Current Password');
                                                  }
					}
				  });
                                  }else{
                                    bootbox.alert(' Cofirm Password IS Wrong');
                                  }
                                  }else{
                                    bootbox.alert('Please Enter All Required Fields');
                                  }
				}); 
                        });
                    </script>
                    <div id="profile_password_for_update" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
                                                                    <form id="profile_password_for_update_form" action="" method="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="profile_pasword_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Enter Your Password</h4>
										</div>
										<div class="modal-body">
										<div class='row'>
											<div class='col col-lg-3'></div>										
											<div class='col col-lg-6'>										
												<div class="form-group">
													<label for="password">Current Password</label>
												 <?php $password=array('name'=>'password',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'password',
                                                                                                     'type'=>'password',
                                                                                                             'autocomplete'=>'off',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('password'));
                                                                                                            echo form_input($password)?>          
                                                                                                       
												</div>	
											</div>	
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="SUBMIT_password_window">SUBMIT</button>        
												</div>	
											</div>		
										</div>	
										
										</div>
									</form>
								 </div>
							</div>
							</div>
                    <div >
                       
                    </div>
                    <div id="profile_password_username" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
                                                                    <form id="update_password_window_form" action="" method="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="porofile_update_window_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Profile</h4>
										</div>
										<div class="modal-body">
										<div class='row'>
																					
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="username">User Name</label>
												 <?php $username=array('name'=>'username',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'username',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('username'));
                                                                                                            echo form_input($username)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="password">New Password</label>
												 <?php $password=array('name'=>'password',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'password',
                                                                                                            'type'=>'password',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('password'));
                                                                                                            echo form_input($password)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="cpassword">Confirm Password</label>
												 <?php $cpassword=array('name'=>'cpassword',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'cpassword',
                                                                                                            'type'=>'password',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('cpassword'));
                                                                                                            echo form_input($cpassword)?>          
													
												</div>	
											</div>	
											</div>	
                                                                                    <div class='row'>
											<div class='col col-lg-3'></div>										
											<div class='col col-lg-3'>										
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="update_password_window">SUBMIT</button>        
												</div>	
											</div>		
										</div>	
										
										</div>
									</form>
								 </div>
							</div>
							</div>
			<nav id="top_navigation" class="text_nav">
				<div class="container">
						<ul id="text_nav_h" class="clearfix j_menu top_text_nav">
					<li >
						<a href="<?php  echo base_url()?>index.php/dashboard/index">Dashboard</a>
						
					</li>
					<li>
						<a href="javascript:void(0)">Master Data</a>
						<ul>  
                                                    <li>  <a href="<?php  echo base_url()?>index.php/grain">Product</a></li>
                                                    <li>  <a href="<?php  echo base_url()?>index.php/grains_category">Product Category</a></li>
                                                    <li>  <a href="<?php  echo base_url()?>index.php/customer">Customer</a></li>
                                                    <li>  <a href="<?php  echo base_url()?>index.php/customer_type">Customer Type</a></li>                                                 
                                                    <li>  <a href="<?php  echo base_url('index.php/stage')?>">Inventory Stage</a></li>
                                                    <li> <a href="<?php  echo base_url('index.php/sales_chanel')?>">Sales Channel</a></li>
                                                    <li> <a href="<?php  echo base_url('index.php/storage_location')?>">Storage Location</a></li>
                                                    <li> <a href="<?php  echo base_url('index.php/supplier')?>">Supplier</a></li>
                                                    <li> <a href="<?php  echo base_url('index.php/supplier_type')?>">Supplier Type</a></li>
						</ul>
					</li>
					<li>
						<a href="<?php  echo base_url('index.php/stock')?>">Inventory</a>
					</li>
					<li>
						<a href="<?php  echo base_url('index.php/stock_level')?>">Stock Level</a>
					</li>
					
                                        
                                        <li>
                                            <a href="javascript:void(0)">Sales</a>
						<ul>  
                                                     <li>  <a href="<?php  echo base_url()?>index.php/sales_order">Sales Orders</a></li>
                                                     <li>  <a href="<?php  echo base_url('index.php/sales_invoice')?>">Invoice</a></li>
                                                     <li>  <a href="<?php  echo base_url('index.php/sales_receipts')?>">Receipts</a></li>
                                                     
                                                     
						</ul>
                                            
                                        </li>
                                        <li>
						<a href="<?php  echo base_url('index.php/web_sale')?>">Web Sales</a>
					</li>
                                        <li>
						<a href="<?php  echo base_url('index.php/contact')?>">Contact</a>
					</li>
                                        <li>
						<a href="javascript:void(0)">cms</a>
                                                <ul>  
                                                     <li>  <a href="<?php  echo base_url()?>index.php/menu">Menus</a></li>
                                                     <li>  <a href="<?php  echo base_url()?>index.php/cms/pages">Pages</a></li>
                                                     
                                                     
						</ul>
					</li>
                                        </ul>
				</div>
			</nav>