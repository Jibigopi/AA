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
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/style.css">
 
	        <script type="text/javascript" language="javascript" src="http://localhost/pos/template/data_table/js/jquery.js"></script>

         <?php  if(!isset($_SESSION['user'])){ ?>
        <style type="text/css">
            .navbar-nav > li{
                padding-left: 10.5px  !important;
            }
        </style> 
<?php } ?>
        <script type="text/javascript">
        function shipping_yes(){
            document.getElementById('shipping').style.display='none';
            document.getElementById('sfirst_name').value=document.getElementById('first_name').value;
            document.getElementById('slast_name').value=document.getElementById('last_name').value;
            document.getElementById('saddress').value=document.getElementById('address').value;
            document.getElementById('sphone').value=document.getElementById('phone').value;
            document.getElementById('semail').value=document.getElementById('email').value;
            document.getElementById('scountry').value=document.getElementById('country').value;
            document.getElementById('sstate').value=document.getElementById('state').value;
            document.getElementById('szip').value=document.getElementById('zip').value;
        }console.log();
        function shipping_no(){
            document.getElementById('shipping').style.display='inline';
                      
            document.getElementById('sfirst_name').value='';
            document.getElementById('slast_name').value='';
            document.getElementById('saddress').value='';
            document.getElementById('sphone').value='';
            document.getElementById('semail').value='';
            document.getElementById('scountry').value='';
            document.getElementById('sstate').value='';
            document.getElementById('szip').value='';
     
        }
        </script>
	</head>
	<body >
		 <div class=" container main_container " style=" background-image: url(<?php echo base_url() ?>images/8bg.jpg); width: 100%; height: 100% "  >
  
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
         
         <?php foreach ($row as $user) {?>
           <?php   $form =array('id'=>'parsley_reg');
echo form_open('ancientagro/user_check_out',$form);?>
         <div class="row home_contant " style="margin-top:15px; ">
             <div class="row"> <a href="<?php echo base_url() ?>index.php/ancientagro/shopping" class="a_btn pull-left" style="width: auto" >Back To shopping</a>
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 20px;"> Welcome <strong style="font-size:35px"><?php echo $user->name ?>  </strong><img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 20px;"></h2>
                 <div class="col col-lg-2"><h2 class="font pull-left"> Order summary</h2>
                 
                    </div><div class="col col-lg-8">
					

                            <table class="table table-striped "  >
                                                    
						<tr>
						  <th>QTY</th>
						  <th>Item Description</th>
						  <th style="text-align:right">Item Price</th>
						  <th style="text-align:right">Sub-Total</th>
						</tr>

						<?php $i = 1; ?>

						<?php foreach ($this->cart->contents() as $items): ?>

							<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

							<tr>
							  <td><?php echo $items['qty'];?></td>
							  <td>
								<?php echo $items['name']; ?>

									<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

										<p>
											<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

												<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

											<?php endforeach; ?>
										</p>

									<?php endif; ?>

							  </td>
							  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
							  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
							</tr>

						<?php $i++; ?>

						<?php endforeach; ?>

						

						</table>
                            <div class="row"><div class="col col-lg-4">
                                    
						
                                    </div>
                                <div class="col col-lg-4" style="margin-left: 50px">
						
						</div>
                            </div></div> <div class="col col-lg-2"><strong style="font-weight: bold;font-size:25px;" class="font">Total</strong>
                            <h2 class="font pull-left"> $<?php echo $this->cart->format_number($this->cart->total()); ?></h2></div>
             </div>
             <div class="col col-lg-6">
                  <div class="col col-lg-12 tex-center">
                <div class="row">
                 <h2 class="font text-center">Billing address  </h2>
             </div>
                 <div class="font text-center" style="font-size:14px;color: red "><?php echo validation_errors(); ?></div>

	   <!-- Form itself -->
                                                      
                                        <div class="row" style="margin-top:0px !important">    <div class="col col-lg-6">
											<div class="form_sep">
												<label for="first_name" class="req">First Name</label>                                                                                                
												
                                                                                                <?php $first_name=array('name'=>'first_name',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'first_name',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>$user->name);
                                                                                                               echo form_input($first_name)?> 
											</div>
                                              </div>  <div class="col col-lg-6">
											<div class="form_sep">
												<label for="last_name" class="req">Last Name</label>
												
                                                                                                <?php $last_name=array('name'=>'last_name',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'last_name',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>$user->last_name);
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
                                                                                                                        'value'       =>  $user->address,
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
												<label for="phone" class="req">Phone</label>												
                                                                                                       
                                                                                                <?php $phone=array('name'=>'phone',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'phone',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-type'=>'number',
                                                                                                                                    'value'=>$user->phone);
                                                                                                               echo form_input($phone)?> 
                                                                                               
													<label for="email" class="req">Email</label>
													
                                                                                                        
                                                                                                <?php $email=array('name'=>'email',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'email',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-type'=>'email',
                                                                                                                                    'value'=>$user->email);
                                                                                                               echo form_input($email)?> 
												</div>
                                                                                            </div>
                                                                 </div>
                                                                 
                                                             </div>
           <div class="row" style="margin-top:0px !important">	<div class="col col-lg-6">		  
											
                                                                              <div class="form_sep">
													<label for="country" class="req">Country</label>
													
                                                                                                        
                                                                                                <?php $country=array('name'=>'country1',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'country',
                                                                                                                                    'disabled'=>'disabled',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>'US');
                                                                                                               echo form_input($country)?> 
                                                                                                   <input type="hidden" name="country" id="country" value="us">
												</div>
											</div>
                                                            <div class="col col-lg-6">
											<div class="form_sep">
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
                                                                </div></div>
                                                        <div class="row" style="margin-top:0px !important">	<div class="col col-lg-6">
                                                                <div class="form_sep">
												<label class="req">Zip/postal code </label>
                                                                                                       
                                                                                                <?php $zip=array('name'=>'zip',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'zip',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-minlength'=>'6',
                                                                                                                                    'value'=>$user->zip);
                                                                                                               echo form_input($zip)?> 
												
											</div>
                                                            </div>
                                                        	<div class="col col-lg-6"></div></div>
                                                                <div class="row" style="margin-top:0px !important">	<div class="col col-lg-12">
                                                                                              
                                                                                                    <div class="form_sep">   
                                                                                                <label for="rpassword" class="req">Shipping and billing address the same?Yes No</label>
                                                                                                <div class="pull-right">  <input type="radio" name="shipping" value="1" onclick="shipping_yes()"><strong>Yes</strong>
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                <input type="radio" name="shipping" value="0" checked="checked" onclick="shipping_no()" ><strong>No</strong>
												</div>
                                                                                                    </div>
											</div>
                                                            </div>
                                                 
                                                                     
	</div>
                 
             </div>
             <div class="col col-lg-6" > 
                 <div class="col col-lg-12 tex-center" >
                 
                      
                         <div class="col col-lg-12 tex-center" id="shipping">
                <div class="col col-lg-12">
                 <h2 class="font text-center"> Shipping Address</h2>
             </div>

	   <!-- Form itself -->
                                                       
                                        <div class="row" style="margin-top:0px !important">    <div class="col col-lg-6">
											<div class="form_sep">
												<label for="sfirst_name" class="req">First Name</label>                                                                                                
												
                                                                                                <?php $sfirst_name=array('name'=>'sfirst_name',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'sfirst_name',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('sfirst_name'));
                                                                                                               echo form_input($sfirst_name)?> 
											</div>
                                              </div>  <div class="col col-lg-6">
											<div class="form_sep">
												<label for="lsast_name" class="req">Last Name</label>
												
                                                                                                <?php $slast_name=array('name'=>'slast_name',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'slast_name',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('slast_name'));
                                                                                                               echo form_input($slast_name)?> 
											</div>
                                                                                        </div>
                                          </div>  
                                                                                 
                                                             <div class="row" style="margin-top:0px !important">    <div class="col col-lg-6">                       
												<div class="form_sep">
												<label for="saddress" class="req">Address</label>
												
                                                                                                <?php $saddress = array(
                                                                                                                        'name'        => 'saddress',
                                                                                                                        'id'          => 'saddress',
                                                                                                                        'value'       =>  set_value('saddress'),
                                                                                                                        'rows'        => '3',                                                                                                    
                                                                                                                        'cols'        => '30',
                                                                                                                        'class'       =>'form-control required'
                                                                                                                        
                                                                                                                      );

                                                                                                                    echo form_textarea($saddress);
                                                                                                        ?>
                                                                                                </div>
                                                                 </div><div class="col col-lg-6">
                                                                                                    <div class="form_sep">
                                                                                                              <div class="form-group">
												<label for="sphone" class="req">Phone</label>												
                                                                                                       
                                                                                                <?php $sphone=array('name'=>'sphone',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'sphone',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-type'=>'number',
                                                                                                                                    'value'=>set_value('sphone'));
                                                                                                               echo form_input($sphone)?> 
                                                                                               
													<label for="email" class="req">Email</label>
													
                                                                                                        
                                                                                                <?php $semail=array('name'=>'semail',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'semail',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'data-type'=>'email',
                                                                                                                                    'value'=>set_value('semail'));
                                                                                                               echo form_input($semail)?> 
												</div>
                                                                                            </div>
                                                                 </div>
                                                                 
                                                             </div>
           <div class="row" style="margin-top:0px !important">	<div class="col col-lg-6">		  
											
                                                                              <div class="form_sep">
													<label for="country" class="req">Country</label>
													<?php $scountry=array('name'=>'country1',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'country',
                                                                                                                                    'disabled'=>'disabled',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>'US');
                                                                                                               echo form_input($scountry)?> 
                                                                                                   <input type="hidden" id="scountry" name="scountry" value="us">
												</div>
											</div>
                                                            <div class="col col-lg-6">
											<div class="form_sep">
													<label for="state" class="req">State</label>
													
                                                                                                        
                                                                                                <select class="form-control"  name="sstate" id="sstate">
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
                                                                </div></div>
                                                        <div class="row" style="margin-top:0px !important">	<div class="col col-lg-6">
                                                                <div class="form_sep">
												<label for="szip" class="req">Zip/postal code </label>
                                                                                                       
                                                                                                                <?php $szip=array('name'=>'szip',
                                                                                                                                    'class'=>'form-control',
                                                                                                                                    'id'=>'szip',
                                                                                                                                    'data-required'=>'true',
                                                                                                                                    'value'=>set_value('szip'));
                                                                                                               echo form_input($szip)?> 
												
											</div>
                                                            </div>
                                                        	<div class="col col-lg-6"></div></div>
                                                               
                                                
						   </div>
                    
                 </div>
                 
               
               </div>
			
                
               
               
              
     
         </div> <div class="row" ><div class="col col-lg-12 text-center">
											<div class="form_sep">
                                                                                           <?php echo form_submit(array('name'=>'checkout','value'=>'Check Out With Paypal','class'=>'btn')) ?>
											</div></div></div>
                                                                     	</form>
         <?php }?>
                
         
         <div class="fotter fancy_font" style="margin-top: 15px;height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
             <div class="row">
             <p style="margin-top: 130px">&nbsp;&nbsp;&nbsp;&nbsp; Copyright © 2013 Ancient Agro. All rights reserved.</p>
             </div>
         </div>
       </div>
     
 
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