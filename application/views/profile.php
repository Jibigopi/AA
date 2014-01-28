
<!DOCTYPE html>
<html>
    <head>
        <title>Ancient Agro</title> 
       
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
        <!-- Bootstrap css-->
            <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-itheme.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">
          		
	<!-- font awesome -->        
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/font-awesome/css/font-awesome.min.css">
	<!-- flag icon set -->        
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/img/flags/flags.css">
	<!-- retina ready -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/retina.css">
	<!-- bootstrap switch -->
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/bootstrap-switch/stylesheets/bootstrap-switch.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/bootstrap-switch/stylesheets/ebro_bootstrapSwitch.css">	
                <link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/datepicker/css/datepicker.css">
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
        <script type="text/javascript" src="<?php echo base_url() ?>admin/js/typeahead.js"></script> 
        
        <script type="text/javascript" src="<?php echo base_url('upload_image/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('upload_image/jquery.form.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.validate.js') ?>"></script>
        <!-- Bootstrap css-->
        <script type="text/javascript">
            function add_to_cart(){
           
            price=document.getElementById('add').value;
                $.ajax({
                    
               
                url: '<?php echo base_url() ?>/index.php/ancientagro/add',
                type: "POST",
                data: {
                    price: price
                    
                },
                success: function(response)
                {
                    if(response){
                          
                        
                    }}
            });
             console.log();
            }
            
        </script>
      
        <style type="text/css">
            #wrapper {
    position: relative;
}
        </style>
        <?php  if(!isset($_SESSION['user'])){ ?>
        <style type="text/css">
            .navbar-nav > li{
                padding-left: 10.5px  !important;
            }
        </style> 
<?php } ?>
</head>
<body >
    
   <!-- Container-->
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
       
        
         
        <?php foreach ($row as $user) {?>
            <?php   $form =array('id'=>'parsley_reg');
echo form_open('ancientagro/update_customer',$form);?>
           <input type="hidden" name="customer_id" value="<?php echo $user->guid?>">
         <div class="row" style="margin-top:15px; ">
             <div class="col col-lg-12">
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 50px;"> WELCOME <?php  echo $user->name?> <img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 50px;"></h2>
             </div>
         </div>
          
         <div class="row home_contant " style="margin-top:15px; ">
             
             <div class="col col-lg-1"></div>
             <div class="col col-lg-6">
               
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
                                                        	</div>
                                                                
                                                 
                                                                     
           <br>
               
             </div>
              <div class="col col-lg-3">
                  <div class="form_sep">
                    <label for="password1" class="req">Password</label>
                         <?php $password=array('name'=>'password',
                                                'class'=>'form-control',
                                                'type'=>'password',
                                                'id'=>'password1',
                                                'data-minlength'=>'5'
                                                            );
                                       echo form_input($password)?>
                   </div>
                    <div class="form_sep">   
                    <label for="rpassword" class="req">Repeat Password</label>
                    <?php $repeatpassword=array('name'=>'rpassword',
                                                        'type'=>'password',
                                                        'class'=>'form-control',
                                                        'id'=>'rpassword',
                                                        'data-minlength'=>'5', 
                                                        'data-equalto'=>'#password1',
                                                        );
                                   echo form_input($repeatpassword)?> 
                    </div><br><br><br>
                
                <div class="form_sep text-center">
                   <?php echo form_submit(array('name'=>'update','value'=>'UPDATE','class'=>'btn')) ?>
                </div> 
              </div>
                   
                 
         </div> </form>
         <?php }?>
             </div>
            
         </div>
         <div class="fotter fancy_font" style="margin-top: 145px;height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
             <div class="row">
             <p style="margin-top: 130px">&nbsp;&nbsp;&nbsp;&nbsp; Copyright © 2013 Ancient Agro. All rights reserved.</p>
             </div>
         </div>
         </div>
     
 
    <!-- Container-->
       
    <script src="<?php echo base_url() ?>admin/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/jquery.ba-resize.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/jquery_cookie.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/retina.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/lib/typeahead.js/typeahead.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/lib/typeahead.js/hogan-2.0.0.js"></script>
		<script src="<?php echo base_url() ?>admin/js/tinynav.js"></script>
		<script src="<?php echo base_url() ?>admin/js/jquery.sticky.js"></script>
		<script src="<?php echo base_url() ?>admin/js/lib/jMenu/js/jMenu.jquery.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ebro_common.js"></script>
                <script src="<?php echo base_url() ?>admin/js/lib/datepicker/js/bootstrap-datepicker.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/jquery_ui/jquery-ui-1.10.3.custom.min.js"></script>
                        <script src="<?php echo base_url() ?>admin/js/pages/ebro_dashboard2.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/ColReorder/media/js/ColReorder.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/FixedColumns/media/js/FixedColumns.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/ColVis/media/js/ColVis.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/js/TableTools.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/media/DT_bootstrap.js"></script>
			<script src="<?php echo base_url() ?>admin/data_table/js/bootstrap-alert.js"></script>
                        <script src="<?php echo base_url() ?>admin/data_table/js/jquery.bootstrap-growl.js"></script>
                        <script src="<?php echo base_url() ?>admin/data_table/bootbox.min.js"></script>
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
        <!-- Bootstrap js-->
       
   <!-- Body-->
     <?php
        if(isset($msg)){
            ?><script type="text/javascript">
            alert("Profile<?php  echo $msg?>");
               
            </script>
                <?php
        }
        ?>
</body>
</html>
