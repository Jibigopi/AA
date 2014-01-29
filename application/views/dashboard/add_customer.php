<!doctype html>
<html lang="en">
	

<head>
		<meta charset="UTF-8">
		<title>Ancient Agro</title>
		
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
	<!-- bootstrap framework-->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/bootstrap/css/bootstrap.min.css">
	<!-- todc-bootstrap -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/todc-bootstrap.min.css">
	<!-- font awesome -->        
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/font-awesome/css/font-awesome.min.css">
	<!-- flag icon set -->        
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/img/flags/flags.css">
	<!-- retina ready -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/retina.css">
	<!-- bootstrap switch -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/bootstrap-switch/stylesheets/bootstrap-switch.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/bootstrap-switch/stylesheets/ebro_bootstrapSwitch.css">	
	
	<!-- aditional stylesheets -->
        <!-- fullcalendar -->
			<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/fullcalendar/fullcalendar.css">
		<!-- linecons -->        
			<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/linecons/style.css">

	<!-- ebro styles -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/style.css">
	<!-- ebro theme -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/theme/color_1.css" id="theme">
		<link  rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/dataTables/media/DT_bootstrap.css">
			<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/css/TableTools.css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/ie.css">
		<script src="<?php echo base_url() ?>admin/js/ie/html5shiv.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ie/respond.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ie/excanvas.min.js"></script>
	<![endif]-->

	<!-- custom fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
        <script src="<?php echo base_url() ?>admin/data_table/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>admin/data_table/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/DT_bootstrap.js"></script>

       
	</head>
	<body class="sidebar_narrow boxed pattern_1">
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
									<li><a href="<?php  echo base_url()?>index.php/dashboard/profile">Profile</a></li>
									
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
			<nav id="top_navigation" class="text_nav">
				<div class="container">
						<ul id="text_nav_h" class="clearfix j_menu top_text_nav">
					<li >
						<a href="<?php  echo base_url()?>index.php/dashboard/index">Dashboard</a>
						
					</li>
                                        <li class="active">
						<a href="javascript:void(0)">Master Data</a>
						<ul>  
                                                    <li class="active">  <a href="<?php  echo base_url()?>index.php/dashboard/customers">Customer</a></li>
                                                    <li>  <a href="<?php  echo base_url()?>index.php/customer_type">Customer Type</a></li>
                                                    <li>  <a href="<?php  echo base_url()?>index.php/grains_category">Product Category</a></li>
                                                    <li>  <a href="<?php  echo base_url('index.php/stage')?>">Inventory Stage</a></li>
                                                    <li> <a href="<?php  echo base_url('index.php/sales_chanel')?>">Sales Chanel</a></li>
                                                    <li> <a href="<?php  echo base_url('index.php/storage_location')?>">Storage Location</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0)">Inventory</a>
						<ul>  
                                                     <li>  <a href="<?php  echo base_url()?>index.php/grain">Product</a></li>
                                                     <li>  <a href="<?php  echo base_url('index.php/stock')?>">Inventory</a></li>
                                                     
                                                     
						</ul>
					</li>
					
                                        
                                        <li >   <a href="<?php  echo base_url('index.php/sale')?>">Sales</a></li>
                                        <li >
						<a href="<?php  echo base_url()?>index.php/sale/add_sale">Add Sales</a>
						
					</li>
					
                                        
                                        </ul>
				</div>
			</nav>
			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
                      
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
                                            <h5 class="btn btn-success">ADD NEW CUSTOMER</h5>
                                            <a href="<?php  echo base_url('index.php/dashboard/customers');?>"><h5 class="btn btn-warning">CUSTOMER LIST</h5></a>
						<!-- main content -->
                                                <br>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
                                                                   <div class="panel-body">
										
                                                                                    <?php   $form =array('id'=>'parsley_reg'
                                                                                              );
                                                                         echo form_open('dashboard/save_customer',$form);?>
                                                                                    <div class="col col-lg-3">
											<div class="form_sep">
												<label for="first_name" class="req">First Name</label>                                                                                                
												
                                                                                                <?php $first_name=array('name'=>'first_name',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'code',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('first_name'));
                                                                                                               echo form_input($first_name)?> 
											</div>
											<div class="form_sep">
												<label for="last_name" class="req">Last Name</label>
												
                                                                                                <?php $last_name=array('name'=>'last_name',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'last_name',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('last_name'));
                                                                                                               echo form_input($last_name)?> 
											</div>
                                                                                        </div>
                                                                                 
                                                                                    <div class="col col-lg-3">
												<div class="form_sep">
												<div class="form-group">
												<label for="address" class="req">Address</label>
												
                                                                                                <?php $address = array(
                                                                                                                        'name'        => 'address',
                                                                                                                        'id'          => 'address',
                                                                                                                        'value'       =>  set_value('address'),
                                                                                                                        'rows'        => '3',                                                                                                    
                                                                                                                        'cols'        => '30',
                                                                                                                        'class'       =>'form-control required'
                                                                                                                        
                                                                                                                      );

                                                                                                                    echo form_textarea($address);
                                                                                                        ?>
											</div>
                                                                                                    <div class="form_sep">
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
											</div></div></div>
											   <div class="col col-lg-3">
											<div class="form_sep">
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
                                                                              <div class="form_sep">
                                                                        <div class="form-group">
													<label for="username" class="req">Username</label>
													
                                                                                                        
                                                                                                <?php $username=array('name'=>'username',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'username',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('username'));
                                                                                                               echo form_input($username)?> 
												</div>
											</div>
											</div>
                                                                          <div class="col col-lg-3">
											<div class="form_sep">
												<div class="form-group">
													<label for="password" class="req">Password</label>
													
                                                                                                        
                                                                                                <?php $password=array('name'=>'password',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'type'=>'password',
                                                                                                                                    'id'=>'password',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-minlength'=>'6',
                                                                                                                                    'value'=>set_value('password'));
                                                                                                               echo form_input($password)?> 
                                                                                                        </div>
												</div>
                                                                                                    <div class="form_sep">
												<div class="form-group">    
                                                                                                <label for="rpassword" class="req">Repeat Password</label>
                                                                                                <?php $repeatpassword=array('name'=>'rpassword',
                                                                                                                                    'type'=>'password',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'rpassword',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-minlength'=>'6',
                                                                                                                                    'data-required'=>'true', 
                                                                                                                                    'data-equalto'=>'#password',
                                                                                                                                    'value'=>set_value('rpassword'));
                                                                                                               echo form_input($repeatpassword)?> 
												</div>
												</div>
                                                                            	
											</div>
											
											<div class="form_sep">
                                                                                            <input  class="btn btn-success" type="submit" name="save" value="SAVE">
											</div>
                                                                       <?php echo validation_errors() ?>
										</form>
									</div>
								
								</div>
							</div>
						</div>
						
						
						

					</div>
				</div>
		
			</section>
			<div id="footer_space"></div>
		</div>
	
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        &copy; 2013 Ancient Agro
                    </div>
                    <div class="col-sm-8">
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Grains</a></li>
                            <li>&middot;</li>
                            <li><a href="#">About Us</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-1 text-right">
                        <small class="text-muted">v1.2</small>
                    </div>
                </div>
            </div>
        </footer>
        	


	<!--[[ common plugins ]]-->
	
	<!-- jQuery -->
		
	<!-- bootstrap framework -->
		<script src="<?php echo base_url() ?>admin/bootstrap/js/bootstrap.min.js"></script>
	<!-- jQuery resize event -->
		<script src="<?php echo base_url() ?>admin/js/jquery.ba-resize.min.js"></script>
	<!-- jquery cookie -->
		<script src="<?php echo base_url() ?>admin/js/jquery_cookie.min.js"></script>
	<!-- retina ready -->
		<script src="<?php echo base_url() ?>admin/js/retina.min.js"></script>
	<!-- typeahead -->
		<script src="<?php echo base_url() ?>admin/js/lib/typeahead.js/typeahead.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/lib/typeahead.js/hogan-2.0.0.js"></script>

	<!-- tinyNav -->
		<script src="<?php echo base_url() ?>admin/js/tinynav.js"></script>
	<!-- sticky sidebar -->
		<script src="<?php echo base_url() ?>admin/js/jquery.sticky.js"></script>
		
	
	<!-- jMenu -->
		<script src="<?php echo base_url() ?>admin/js/lib/jMenu/js/jMenu.jquery.js"></script>
		
	<!-- ebro common scripts/functions -->
		<script src="<?php echo base_url() ?>admin/js/ebro_common.js"></script>
	
	
	<!--[[ page specific plugins ]]-->

		<!-- jQueryUi -->
			<script src="<?php echo base_url() ?>admin/js/lib/jquery_ui/jquery-ui-1.10.3.custom.min.js"></script>
		
			
			
			<script src="<?php echo base_url() ?>admin/js/pages/ebro_dashboard2.js"></script>
<!-- 2col multiselect -->
			<script src="<?php echo base_url() ?>admin/js/lib/multi-select/js/jquery.multi-select.js"></script>
		<!-- select2 -->
			<script src="<?php echo base_url() ?>admin/js/lib/select2/select2.min.js"></script>
		<!-- datepicker -->
			<script src="<?php echo base_url() ?>admin/js/lib/datepicker/js/bootstrap-datepicker.js"></script>
		<!-- iCheck -->
			<script src="<?php echo base_url() ?>admin/js/lib/iCheck/jquery.icheck.min.js"></script>
		<!-- parsley -->
			<script src="<?php echo base_url() ?>admin/js/lib/parsley/parsley.min.js"></script>
			
			<script src="<?php echo base_url() ?>admin/js/pages/ebro_form_validate.js"></script>

	<!--[if lte IE 9]>
		<script src="<?php echo base_url() ?>admin/js/ie/jquery.placeholder.js"></script>
		<script>
			$(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
    <!-- style switcher -->
		<div id="style_switcher" class="switcher_open" style="display: none">
            
			<div class="style_items">
				<p class="style_title">Theme</p>
				
			</div>
			
                    <div class="style_items" id="layout_switch" >
				<p class="style_title">Layout</p>
				<select name="layout_style" id="layout_style" class="form-control">
					<option value="fixed">Fixed</option>
					<option value="full_width" class="hidden-sm hidden-md">Full Width</option>
					<option value="boxed" class="hidden-sm hidden-md">Boxed</option>
				</select>
			</div>
			
			
        </div>
	</body>


</html>