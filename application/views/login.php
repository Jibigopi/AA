
<!DOCTYPE html>
<html>
    <head>
        <title>Ancient Agro</title> 
       
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
        <!-- Bootstrap css-->
        <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap-itheme.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.css">
            <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">
         
        <link href="<?php echo base_url() ?>assets/css/video-default.css" rel="stylesheet">
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
       
         <!-- Header-->
         
         <div class="row" style="margin-top:15px; ">
             <div class="col col-lg-12">
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 50px;"> LOGIN <img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 50px;"></h2>
             </div>
         </div>
         <div class="row home_contant" style="margin-top:15px; ">
             <div class="col col-lg-3">
                 
             </div>
             <div class="col col-lg-6 tex-center" style="margin-left: 12px">
                 <div class="font text-center" style="font-size:14px;color: red "> <?php if(isset($msg)){ echo $msg; } echo validation_errors(); ?></div>
	   <!-- Form itself -->
           <form name="sentMessage" action="<?php echo base_url() ?>index.php/admin/login" id="contactForm" method="post"  novalidate>
             
		 <div class="control-group">
                    <div class="controls">
			<input type="text" name="username" class="form-control" 
			   	   placeholder="USER NAME" id="username" required
			           data-validation-required-message="Please enter your name" />
			  <p class="help-block"></p>
		   </div>
	         </div> 	
                <div class="control-group">
                  <div class="controls">
			<input type="password" name="password" class="form-control" placeholder="PASSWORD" 
			   	            id="password" required
			   		   data-validation-required-message="Please enter your email" />
		</div>
	    </div> 
               
               
               <br>
	     <div id="success"> </div> <!-- For success/fail messages -->
             <input type="submit" name="login" class="btn   font " value="login"> <a href="<?php  echo base_url('index.php/admin/forget_password')?>" class=" pull-right font" style="font-size:15px;color: #000  ">Forget password</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php  echo base_url('index.php/ancientagro/registration')?>" class="btn btn-default  font" style="font-size:15px;color: #000  ">Sign Up</a><br />
          </form>
	</div>
            
         </div>
         <div class="fotter fancy_font" style="margin-top: 145px;height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
             <div class="row">
             <p style="margin-top: 130px">&nbsp;&nbsp;&nbsp;&nbsp; Copyright © 2013 Ancient Agro. All rights reserved.</p>
             </div>
         </div>
         </div>
     
 
    <!-- Container-->
       
        <!-- Bootstrap js-->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.8.1.min.js"></script>
         <script src="<?php echo base_url() ?>js/bootstrap.js"></script>
        <!-- Bootstrap js-->
       
   <!-- Body-->
</body>
</html>
