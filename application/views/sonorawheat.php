
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
.home_contant .active{
    background: #ffffff !important;
}
.tab{
    color: #000!important;
}
.nav-tabs a{
    color: #666666!important;
    font-size: 18px !important;
    font-family: DesdemonaBlack;
}
.tab-content p{
    padding: 25px 0px;
    color: #000 !important;
    text-justify: auto !important;
    font-family: verdana;
    font-size: 15px;
    text-align: justify;
    line-height: 20px;
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
                      <li><a href="<?php echo base_url() ?>" >HOME</a></li>
                      <li class="divider"><img src="<?php echo base_url() ?>images/Divider_Vertical.png"></li>
                      <li ><a href="<?php echo base_url() ?>index.php/ancientagro/aboutus" >ABOUT US</a></li>                    
                      <li class="divider"><img src="<?php echo base_url() ?>images/Divider_Vertical.png"></li>
                      <li ><a href="<?php echo base_url() ?>index.php/ancientagro/shopping" >SHOPPING</a></li>                   
                      <li class="divider"><img src="<?php echo base_url() ?>images/Divider_Vertical.png"></li>
                      <li><a href="<?php echo base_url() ?>index.php/ancientagro/contactus">CONTACT US</a></li>
                      <li class="divider"><img src="<?php echo base_url() ?>images/Divider_Vertical.png"></li>
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
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 50px;"> Sonora wheat <img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 50px;"></h2>
             </div>
         </div>
         <div class="row home_contant" style="margin-top:15px; ">
             <div class="col col-lg-12">
               <ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
  <li><a href="#Nutrition" data-toggle="tab">Nutrition</a></li>
  <li><a href="#media" data-toggle="tab">Media</a></li>
  <li><a href="#backers" data-toggle="tab">Bakers</a></li>
  <li><a href="#kitchen" data-toggle="tab">Home kitchen</a></li>
  <li><a href="#settings" data-toggle="tab">Shop</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active " id="home">
      <div class="row">
          <div class="col col-lg-4"></div>
          <div class="col col-lg-8"><p>Sonora (CItr 3036) is a common wheat (Triticum aestivum ssp aestivum). It was selected from a landrace in Durango, Mexico. Sonora wheat might be the very first wheat successfully introduced onto the American continent soon after Columbus’s journey in 1492.The agricultural Native Americans</p></div>
      </div>
      
      
  </div>
    <div class="tab-pane " id="Nutrition">
        <div class="col-lg-12 text-center">
        <img src="<?php echo base_url('uploads/nutrition/AA-GN-102.png'); ?>  ">
        </div>
    </div>
  <div class="tab-pane" id="media">
      
  </div>
  <div class="tab-pane" id="backers">...</div>
  <div class="tab-pane" id="kitchen">...</div>
  <div class="tab-pane" id="shop">...</div>
</div>
             </div>
            
         </div>
         <div class="fotter fancy_font" style="margin-top: 79px;height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
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
