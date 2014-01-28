
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
         <div class="row baner" style="margin-top:50px; background-image: url(images/baner_back.png)">
             <div class="col col-lg-5">
                 <div class="videoUiWrapper thumbnail" style="max-width: 117% !important;margin: 30px;padding-top: 0px;">
                        <video width="329" height="198"  id="demo1">
                            <source src="http://ia700305.us.archive.org/18/items/CopyingIsNotTheft/CINT_Nik_H264_720.ogv" type="video/ogg"> 
                            <source src="http://ia700305.us.archive.org/18/items/CopyingIsNotTheft/CINT_Nik_H264_720_512kb.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
             </div>
             <div class="col col-lg-6" style="margin-left: 53px;width: 46.8% !important;padding:23px 0px 25px 0px">
                 
                 <div class="font" style="text-align: justify">
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker.
                     <br><a href="" style="float: right;color: #000000;" class="font">READ MORE</a>
                 </div>
             </div>
         </div>
         <div class="row" style="margin-top:15px; ">
             <div class="col col-lg-12">
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 50px;"> PRODUCTS <img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 50px;"></h2>
             </div>
         </div>
         <div class="row home_contant" style="margin-top:15px; ">
             <div class="col col-lg-4 ">
                 <h2 class="font"><i class="icon icon-cart-out" ></i>Sonora Wheat</h2>
                  <div class="home_grain" style="text-align: justify; padding-left: 20px; padding-right: 20px">
                     Sonora (CItr 3036) is a common wheat (Triticum aestivum ssp
aestivum). It was selected from a landrace in Durango, Mexico.
Sonora wheat might be the very first wheat successfully introduced
onto the American continent soon after Columbus’s journey in 1492.The agricultural Native Americans
</div>
                   <a href="<?php echo base_url() ?>index.php/ancientagro/sonorawheat" style="float: right;color: #000000;padding-right: 20px;" class="font">read More</a>
             </div>
             <div class="col col-lg-4">
                 <h2 class="font"><i class="icon icon-cart-out" ></i>Ethopian Blue Tinge:</h2>
                  <div class="home_grain" style="text-align: justify;padding-left: 20px; padding-right: 20px">
                 Ethiopian Blue Tinge is an Abyssinian emmer wheat (Triticum
turgidum ssp. dicoccum). It is a cultivar from Ethiopia selected by
Dan Jason (Salt Spring Seeds, BC, Canada). It threshes easily when
combine harvested (most emmer wheats do not thresh out of their
husks during combine harvesting). </div>
                <a href="<?php echo base_url() ?>index.php/ancientagro/ethopianbluetinge" style="float: right;color: #000000;padding-right: 20px;" class="font">read More</a>
             </div>
             
             <div class="col col-lg-4">
                 <h2 class="font"><i class="icon icon-cart-out" ></i>Durum Iraq</h2>
                  <div class="home_grain" style="text-align: justify;padding-left: 20px; padding-right: 20px">
                  Durum-Iraq (PI 481581) is a durum wheat. It is a landrace from Iraq.
It is a spring type and has long black awns and pale yellow seed color.
It grows well in the Sacramento Valley and offers the possibility of a
supply for whole wheat pasta makers as well as bakers who know how
to make pleasing whole   </div>
                 <a href="<?php echo base_url() ?>index.php/ancientagro/durumiraq" style="float: right;color: #000000;padding-right: 20px;" class="font">Read More</a></div>
             </div>
         <div class="fotter fancy_font" style="margin-top: 50px;height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
             <div class="row">
             <p style="margin-top: 130px">&nbsp;&nbsp;&nbsp;&nbsp; Copyright © 2013 Ancient Agro. All rights reserved.</p>
             </div>
         </div>
         </div>
     
   
    <!-- Container-->
       
        <!-- Bootstrap js-->
         <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.8.1.min.js"></script>
         <script src="<?php echo base_url() ?>js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.video-ui.js"></script>
        <script type="text/javascript" >
            $('#demo1').videoUI();
        </script>
        <!-- Bootstrap js-->
       
   <!-- Body-->
</body>
</html>
