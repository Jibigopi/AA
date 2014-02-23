
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
            html, body {
                width: 100% !important;
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;

            }

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
        	<link rel="stylesheet" href="<?php echo base_url()?>website/gallery/css/galleriffic-2.css" type="text/css" />
		<script type="text/javascript" src="<?php echo base_url()?>website/gallery/js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>website/gallery/js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>website/gallery/js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>
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
         <?php 
         $over_view="";
             $source="";
             $benefits="";
             $culinary="";
             $image="";
             $nutrition="";
             $product_name="";
             $Product_profile_image="";
         foreach ($row as $data){
             $product_name =$data->name; 
             $Product_profile_image=$data->image;
             $nutrition=$data->nutrition;
             if($data->key=='source'){
                  $source=$data->value;
             }
             if($data->key=='over_view'){
                  $over_view=$data->value;
             }
             if($data->key=='benefits'){
                  $benefits=$data->value;
             }
             if($data->key=='culinary'){
                  $culinary=$data->value;
             }
         }?>
        
        
         <div class="row home_contant " style="margin-top:15px; ">
             <h2 class="font text-center" style="color: #b8682b"><?php echo $product_name ?></h2> 
<ul class="nav nav-tabs">
<li class="active"><a href="#over_view" data-toggle="tab">Over View</a></li>
<li><a href="#source" data-toggle="tab">Source</a></li>
<li><a href="#Nutrition" data-toggle="tab">Nutrition</a></li>

<li><a href="#benefits" data-toggle="tab">Benefits</a></li>
<li><a href="#Culinary" data-toggle="tab">Culinary</a></li>
<li><a href="#media" data-toggle="tab">Media</a></li>
</ul>
<div class="tab-content">
<div id="over_view" class="tab-pane active " style='border-radius:10px; border-top: solid #b8682b; border-bottom: solid #b8682b;'>
<div class="row">
<div class="col col-lg-5" >
    <div class=" home_border">
                 <img src="<?php echo base_url('uploads/profile/').'/'.$Product_profile_image ?>" style=" margin: 31px auto;width: 250px;height: 149px;border: solid 3px #b8682b;border-radius: 10px">
 </div>
    </div>
<div class="col col-lg-7">
    <p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $over_view ?></p>
</div>
</div>
</div>
<div id="Nutrition" class="tab-pane " style='border-radius:10px; border-top: solid #b8682b; border-bottom: solid #b8682b;'>
    
    <div class="col-lg-12 text-center"><div class=" home_border" style=" padding: 35px 43px !important"><img src="<?php echo base_url('uploads/nutrition/')."/".$nutrition ;?>" alt="" style="border-radius:10px; border-top: solid #b8682b; border-bottom: solid #b8682b;" /></div>
</div></div>
<div id="source" class="tab-pane" style='border-radius:10px; border-top: solid #b8682b; border-bottom: solid #b8682b;'>
<div class="row">

<div class="col col-lg-7">
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $source ?></p>;
</div>
   <div class="col col-lg-5" >
    <div class=" home_border">
                 <img src="<?php echo base_url('uploads/profile/').'/'.$Product_profile_image ?>" style=" margin: 31px auto;width: 250px;height: 149px;border: solid 3px #b8682b;border-radius: 10px">
 </div>
    </div>
</div>
</div>
<div id="media" class="tab-pane" style='border-radius:10px; border-top: solid #b8682b; border-bottom: solid #b8682b;'>
<div class="row">

    <div class="col col-lg-1" ></div>
    <div class="col col-lg-6" >
    
    
    <!-- Start Advanced Gallery Html Containers -->
					<!-- Start Advanced Gallery Html Containers -->
				<div id="gallery" class="content">
					<div id="controls" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
					<div id="caption" class="caption-container">
                                            
                                        </div>
				</div>
                                         </div>
    <div class="col col-lg-4">
    <div id="thumbs" class="navigation" style="margin-right: 18px">
					<ul class="thumbs noscript">
						
<?php foreach ($row as $image){
    if($image->key=='image'){
    ?>
        <li>
            <a class="thumb" href="<?php echo base_url().$image->url.$image->value; ?>" title="Title #4" style="width: 100% !important;height: 75% !important;" >
                <img src="<?php echo base_url().$image->url.$image->value; ?>" alt="Title #4" style="width: 75px !important;height: 75px !important;" />
            </a>
            <div class="caption pull-right">

                   
                    <div class="image-desc" style="color: #000"><?php echo $image->description  ?></div>
            </div>
    </li>
    
    <?php }
} ?>
				
    
					</ul>
				</div>
        
    </div>
   
    </div>
</div>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '274px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 9,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					//playLinkText:              'Play Slideshow',
					//pauseLinkText:             'Pause Slideshow',
					//prevLinkText:              '&lsaquo; Previous Photo',
					//nextLinkText:              'Next Photo &rsaquo;',
					//nextPageLinkText:          'Next &rsaquo;',
					//prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});
			});
		</script>
    
    
    
    
    
    
    
    
    
    
    
    
    

<div id="benefits" class="tab-pane" style='border-radius:10px; border-top: solid #b8682b; border-bottom: solid #b8682b;'>
<div class="row">
<div class="col col-lg-5" >
    <div class=" home_border">
                 <img src="<?php echo base_url('uploads/profile/').'/'.$Product_profile_image ?>" style=" margin: 31px auto;width: 250px;height: 149px;border: solid 3px #b8682b;border-radius: 10px">
 </div>
    </div>
<div class="col col-lg-7">
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $benefits ?></p>;
</div>
</div>
</div>
<div id="Culinary"  class="tab-pane" style='border-radius:10px; border-top: solid #b8682b; border-bottom: solid #b8682b;'>
<div class="row">
<div class="col col-lg-5" >
    <div class=" home_border">
                 <img src="<?php echo base_url('uploads/profile/').'/'.$Product_profile_image ?>" style=" margin: 31px auto;width: 250px;height: 149px;border: solid 3px #b8682b;border-radius: 10px">
 </div>
    </div>
<div class="col col-lg-7">  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $culinary ?></p></div>
</div>
   

         </div></div>
         </div>
          <div class="row home_contant" style="margin-top:0px; ">
             <h2 class="font" style="color: #b8682b"><?php echo $product_name ?></h2> 
             <div class="col col-lg-7 home_contant home_panel"  style='border-radius: 10px;  color: #ffffff'><p style="font-size: 15px;text-align: justify;color: #ffffff;font-weight: bold;font-family: verdana;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <?php               foreach ($row as $data){
                     if($data->key=='description'){
                         echo $data->value;
                     }
                 }?></p>
             </div>
             <div class="col col-lg-2"></div>
             <div class="col col-lg-3 home_panel" style='border-radius: 10px;'>
                 <br>
                 <?php echo form_open('ancientagro/shopping'); 
 foreach ($stock as $product){
                 ?>  
                                        
                 <div><label class="text-center" style="width: 100%;color: #ffffff">Price</label><br>
                     <input type="text" disabled="disabled" value="<?php echo $product->unit_price ?>" class="form-control"><br>
                     <input type="hidden" name="id" value="<?php echo $product->id ?>" class="form-control">
                     <input type="hidden" name="name" value="<?php echo $product->name ?>" class="form-control">
                     <input type="hidden" name="price"  value="<?php echo $product->unit_price ?>" class="form-control">
                       <label class="text-center" style="width: 100%;color: #ffffff">Category</label>
                       <select class="form-control" name="category">
                           <option value="1">1 Pound</option>
                           <option value="5">5 Pound</option>
                           <option value="bulk">Bulk</option>
                       </select>
                       <input type="button" value="Add To Shopping" class="form-control shopping_input agro_button">
                       <br>
                   </div>
 <?php } echo form_close(); ?>  
                                        
               </div>
         </div>
         <br><br><div class="fotter fancy_font" style="height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
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
