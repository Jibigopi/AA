<!doctype html>
<html lang="en">
	

<head>
		<meta charset="UTF-8">
		<title>Ancient Agro</title>
		
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
	<!-- bootstrap framework-->
		<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-itheme.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">
		<link rel="stylesheet" href="http://localhost/AncienArgo/admin/css/style.css">
 
	        <script type="text/javascript" language="javascript" src="http://localhost/pos/template/data_table/js/jquery.js"></script>

         <?php  if(!isset($_SESSION['user'])){ ?>
        <style type="text/css">
            .navbar-nav > li{
                padding-left: 10.5px  !important;
            }
        </style> 
<?php } ?>
	</head>
	<body >
		 <div class=" container main_container " style="background-image: url(<?php echo base_url() ?>images/8bg.jpg); width: 100%; height: 100% "  >
  
        <!-- Header-->
     
            <div class="row">
                <h1 class="text-center font">Ancient Agro</h1>
            </div>
              <!-- Navigation -->
              <nav class="navbar navbar-default" role="navigation" >
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                 
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" >
                      <?php foreach ($parents as $parent){
                            if($parent->order==$active){
                                if($parent->child_no!=0){
                            ?>
                                   <li class="dropdown active">
                                       <a href="#" style="color: #ffffff" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent->name ?> <b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                            <li><a <?php if($parent->link==0){ ?> href="<?php echo $parent->url; ?>" <?php }else{ ?> href="<?php echo base_url(); ?>index.php/ancientagro/page/<?php echo $parent->page ?>/<?php echo $parent->order ?>"<?php } ?>><?php echo $parent->name ?></a></li>
                                          <?php foreach ($childs as $child) {?>
                                          <li><a <?php if($child->link==0){ ?> href="<?php echo $child->url; ?>" <?php }else{ ?> href="<?php echo base_url(); ?>index.php/ancientagro/page/<?php echo $child->page ?>/<?php echo $parent->order ?>"<?php } ?>><?php echo $child->name ?></a></li>
                                         <?php } ?>
                                        
                                      </ul>
                                    </li>
                                <?php }else{?>
                                 <li class="active"><a href="#" style="color: #ffffff"><?php echo $parent->name ?></a></li>
                             <?php   }
                                }else{
                         if($parent->child_no!=0){
                            ?>
                       <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent->name ?> <b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                            <li><a <?php if($parent->link==0){ ?> href="<?php echo $parent->url; ?>" <?php }else{ ?> href="<?php echo base_url(); ?>index.php/ancientagro/page/<?php echo $parent->page ?>/<?php echo $parent->order ?>"<?php } ?>><?php echo $parent->name ?></a></li>
                                          <?php foreach ($childs as $child) {?>
                                        <li><a <?php if($child->link==0){ ?> href="<?php echo $child->url; ?>" <?php }else{ ?> href="<?php echo base_url(); ?>index.php/ancientagro/page/<?php echo $child->page ?>/<?php echo $parent->order ?>"<?php } ?>><?php echo $child->name ?></a></li>
                                         <?php } ?>
                                        
                                      </ul>
                                    </li>
                                <?php }else{?>
                <li><a <?php if($parent->link==0){ ?> href="<?php echo $parent->url; ?>" <?php }else{ ?> href="<?php echo base_url(); ?>index.php/ancientagro/page/<?php echo $parent->page ?>/<?php echo $parent->order ?>"<?php } ?>><?php echo $parent->name ?></a></li>
                             <?php   }  }?>
                        <li class="divider"><img src="<?php echo base_url() ?>images/Divider_Vertical.png"></li>
                        <?php }?>
                        
                         
                         
                        <?php  if(!isset($_SESSION['user'])){ ?>
                    <li><a href="<?php echo base_url() ?>index.php/ancientagro/login">LOGIN</a></li>
                     <?php }else{ ?>
                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">DASHBOARD <b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url() ?>index.php/ancientagro/dashboard">Dashboard</a></li>
                                        <li><a href="<?php echo base_url() ?>index.php/ancientagro/profile">Profile</a></li>
                                        <li><a href="<?php echo base_url() ?>index.php/ancientagro/logout">LOGOUT</a></li>
                                        
                                      </ul>
                                    </li>
                     <?php }?>
                        
                    
                   
                  </ul>
                </div>
              </nav>
              <div class="row col-lg-12 nav_fotter">
                
            </div>
           <!-- Navigation -->
       
         <!-- Header-->
         
         
         <div class="row home_contant " style="margin-top:15px; ">
             <div class="col col-lg-4">
                  <div class="col col-lg-12 tex-center">
                <div class="row">
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 20px;"> LOGIN <img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 20px;"></h2>
             </div>
                
	   <?php   $form =array('id'=>'parsley_reg'
                                     ); echo form_open('ancientagro/user_login',$form);?>
                                                                       <div class="row">
                                                                                    <div class="col col-lg-12">
											<div class="form_sep">
												<label for="name" class="req">User Name</label>                                                                                                
												
                                                                                                <?php $username=array('name'=>'username',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'username',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('username'));
                                                                                                               echo form_input($username)?> 
											</div>
											
                                                                                        </div>
                                                                                 
                                                                                    <div class="col col-lg-12">
												<div class="form_sep">
												<div class="form-group">
												<label for="description" class="req">Password</label>
                                                                                                        <?php $password=array('name'=>'password',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'password',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('password'));
                                                                                                               echo form_password($password)?> 
											</div>
                                                                                               </div></div>
									</div>
                 <div  class="row" style="margin-top: 0px !important;" ><div class="col col-lg-12 text-center">
											<div class="form_sep">
                                                                                            <input  class="btn " type="submit" name="login" value="LOGIN">
                                                                                        </div>
                     </div> </div>
                        <div class="row"><div class="col col-lg-8"><br> <a href="<?php  echo base_url('index.php/admin/forget_password')?>" class=" pull-right font" style="font-size:15px;color: #000  ">Forget password</a>
                             </div>
                             </div>
                                                                      
										</form><br>
                                                                                <div class="row">
                                                                                    <div class="font text-center" style="font-size:14px;color: red "><?php if(isset($log_msg)){ echo $log_msg; }  echo validation_errors(); ?></div>
                                                                                    </div>
	</div>
                 
             </div>
             <div class="col col-lg-8" > <div class="col col-lg-12 tex-center">
                <div class="col col-lg-12">
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 50px;"> SIGN UP <img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 50px;"></h2>
             </div>
                 <div class="font text-center" style="font-size:14px;color: red "><?php echo validation_errors(); ?></div>
	   <!-- Form itself -->
                                                        <?php   $form =array('id'=>'parsley_ext'
                                                                                              );
                                                                         echo form_open('ancientagro/save_customer',$form);?>
                                        <div class="row" style="margin-top:0px !important">    <div class="col col-lg-6">
											<div class="form_sep">
												<label for="first_name" class="req">First Name</label>                                                                                                
												
                                                                                                <?php $first_name=array('name'=>'first_name',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'code',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('first_name'));
                                                                                                               echo form_input($first_name)?> 
											</div>
                                              </div>  <div class="col col-lg-6">
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
                                          </div>  
                                                                                 
                                                             <div class="row" style="margin-top:0px !important">    <div class="col col-lg-6">                       
												<div class="form_sep">
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
                                                                 </div><div class="col col-lg-6">
                                                                                                    <div class="form_sep">
                                                                                                              <div class="form-group">
												<label for="country" class="req">Country</label>												
                                                                                                 <?php $country=array('name'=>'country1',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'country',
                                                                                                                                    'disabled'=>'disabled',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>'US');
                                                                                                               echo form_input($country)?> 
                                                                                                
                                                                                                <input type="hidden" name="country" value="us">
                                                                                               
													<label for="state" class="req">State</label>
													
                                                                                                        
                                                                                               <select class="form-control"  name="state" id="state">
                                                                                                            <option>Alabama</option><option>
                                                                                                            Alaska</option><option>
                                                                                                            Arizona</option><option>
                                                                                                            Arkansas</option><option>
                                                                                                            California</option><option>
                                                                                                            Colorado</option><option>
                                                                                                          
                                                                                                            Kentucky</option><option>
                                                                                                            Louisiana</option><option>
                                                                                                            Maine</option><option>
                                                                                                            Maryland</option><option>
                                                                                                            Massachusetts</option>
                                                                                                        </select>
                                                                                               
												</div>
                                                                                            </div>
                                                                 </div>
                                                                 
                                                             </div>
           <div class="row" style="margin-top:0px !important">	<div class="col col-lg-6">		  
											
                                                                              <div class="form_sep">
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
                                                            <div class="col col-lg-6">
											<div class="form_sep">
													<label for="zip" class="req">Zip</label>
													
                                                                                                        
                                                                                                <?php $zip=array('name'=>'zip',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                   
                                                                                                                                    'id'=>'zip',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('zip'));
                                                                                                               echo form_input($zip)?> 
                                                                                                        </div>
                                                                </div></div>
           <div class="row" style="margin-top:0px !important">	<div class="col col-lg-6">		  
											
                                                                              <div class="form_sep">
													<label for="username" class="req">Email</label>
													<?php $email=array('name'=>'email',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'email',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-type'=>'email',
                                                                                                                                    'value'=>set_value('email'));
                                                                                                               echo form_input($email)?> 
                                                                                                        
                                                                                                
												</div>
											</div>
                                                            <div class="col col-lg-6">
											<div class="form_sep">
													<label for="username" class="req">User Name</label>
													<?php $username=array('name'=>'username',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'username',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('username'));
                                                                                                               echo form_input($username)?> 
                                                                                                        
                                                                                                
                                                                                                        </div>
                                                                </div></div>
                                                        <div class="row" style="margin-top:0px !important">	<div class="col col-lg-6">
                                                                <div class="form_sep">
                                                                    <label for="password1" class="req">Password</label>
												 <?php $password=array('name'=>'password',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'type'=>'password',
                                                                                                                                    'id'=>'password1',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-minlength'=>'5'
                                                                                                                                    );
                                                                                                               echo form_input($password)?>
											</div>
                                                            </div>
                                                        	<div class="col col-lg-6">
                                                                                              
                                                                                                    <div class="form_sep">   
                                                                                                <label for="rpassword" class="req">Repeat Password</label>
                                                                                                <?php $repeatpassword=array('name'=>'rpassword',
                                                                                                                                    'type'=>'password',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'rpassword',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-minlength'=>'5',
                                                                                                                                    'data-required'=>'true', 
                                                                                                                                    'data-equalto'=>'#password1',
                                                                                                                                    );
                                                                                                               echo form_input($repeatpassword)?> 
												</div>
											</div>
                                                            </div>
                                                        <div class="row" style="margin-top:0px !important">	<div class="col col-lg-6">
                                                                <div class="form_sep">
												<label class="req">Terms And Condition </label>
                                                                                                <label for="reg_chbox_a" class="checkbox-inline"><input type="checkbox" name="reg_chbox" id="reg_chbox_a" value="chbox_a" data-required="true" data-mincheck="1" style="font-weight: bold">Agree</label>
												
											</div>
                                                            </div>
                                                        	<div class="col col-lg-6">
                                                                                              
                                                                                                    <div class="form_sep"><br>
                                                                                           <?php echo form_submit(array('name'=>'signup','value'=>'Sign Up','class'=>'btn')) ?>
											</div>
											</div>
                                                            </div>
                                                                       <?php echo validation_errors() ?>
										</form>
						   </div>
               </div>
			
                
               
               
              
     
	</div>
         
         <div class="fotter fancy_font" style="margin-top: 145px;height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
             <div class="row">
             <p style="margin-top: 130px">&nbsp;&nbsp;&nbsp;&nbsp; Copyright © 2013 Ancient Agro. All rights reserved.</p>
             </div>
         </div></div>
      
     
 
    <!-- Container-->
       
        <!-- Bootstrap js-->
        
      <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.8.1.min.js"></script>
         <script src="<?php echo base_url() ?>js/bootstrap.js"></script>
         <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.8.1.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>admin/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>admin/js/lib/jquery_ui/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="<?php echo base_url() ?>admin/js/lib/parsley/parsley.min.js"></script>
	<script src="<?php echo base_url() ?>admin/js/pages/ebro_form_validate.js"></script>
 

	
		
        
	</body>


</html>