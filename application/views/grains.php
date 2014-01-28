
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
            <script type="text/javascript">
                 function get_stocks_detils(id,nid){
                     var now=$('#'+nid).val();
                     var no=$('#add_product #quty_'+id).val();
                     var stock=$('#add_product #'+id).val();
                   
                 if (!isNaN(no) && !isNaN(stock)){
                     
                     no1=+no + +now;
                if(parseFloat(no) <= parseFloat(stock) ){
             
                     
                 }else{
                     $('#add_product #quty_'+id).val()
                    alert('THIS GRAIN DONT HAVE THIS MUCH OF STOCK ');
                    $('#add_product #quty_'+id).val('1');
                 }
                
                
                }
            }
            </script>
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
                       <li><a href="<?php echo base_url() ?>" >HOME</a></li>
                      <li class="divider"><img src="<?php echo base_url() ?>images/Divider_Vertical.png"></li>
                      <li  ><a href="<?php echo base_url() ?>index.php/ancientagro/aboutus" >ABOUT US</a></li>                    
                      <li class="divider"><img src="<?php echo base_url() ?>images/Divider_Vertical.png"></li>
                      <li class="active"><a href="<?php echo base_url() ?>index.php/ancientagro/shopping" style="color: #ffffff">SHOPPING</a></li>                   
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
        <?php foreach ($row as $grain){ ?> 
         <div class="row" >
             <div class="col col-lg-12">
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 50px;"> <?php echo $grain->name ?> <img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 50px;"></h2>
             </div>
         </div>
         <div class="row home_contant" style="margin-top:15px; ">
            <div class="col col-lg-6" > 
                <div class="row">
                    <a href="<?php echo base_url('index.php/ancientagro/shopping') ?>" class="btn btn-default btn-sm pull-left" ><i class="icon icon-backward"></i> Back To Shopping</a><br>
                    
                </div>
                <div class="row" style="margin-top: 20px"> 
               <img src="<?php echo base_url() ?>/uploads/<?php echo $grain->image ?>" style="border: solid 2px #666666">
                 </div>
                 
         
	</div>
			 <div class="col col-lg-6">
                              <div class="row">
             <a class="font" style="color: #000;font-size: 18px">DESCRIPTION </a><a data-toggle="modal" href="#restore_data" class="btn btn-default btn-sm pull-right"><i class="icon icon-book"></i> View Nutrition</a><br>
                </div>  <div class="row" style="margin-top: 20px"> 
                                 
                        <p class="font" style="font-size: 14px ">
                                
                                 <?php echo $grain->dis; ?> 
                             </p>
                 
         
			</div>
			</div>
			
			
			
			
         </div>
         <div id="restore_data" class="modal fade">
            <div class="modal-dialog" style="width: 40%">
								<div class="modal-content">
                                                                   
										<div class="modal-header">
											<button type="button" id="nutrition_close_" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title text-center" id="myModalLabel">Nutrition</h4>
										</div>
										<div class="modal-body">
										<div class='row'>
                                                                                    <div class='text-center'>
											  <img src="<?php echo base_url() ?>/uploads/nutrition/<?php echo $grain->nutrition ?>">	
                                                                                    </div>	
										</div>
                                                                                    <div class='row'>
										<div class='col col-lg-8'></div>
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
                                                                                                <button type="button" onclick="close_nutrition()" name="grain" class="btn btn-primary" id="add_new_product">CLOSE</button>        
												</div>	
                                                                                        <script type="text/javascript">
                                                                                            function close_nutrition(){
                                                                                            $('#nutrition_close_').click();
                                                                                            }
                                                                                            </script>
										</div>
										</div>
										</div>
										</div>
									

								 </div>
							</div>
						</div>
        <?php }?> 
		 
         <div class="fotter fancy_font" style="margin-top: 30px;height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
             <div class="row">
             <p style="margin-top: 130px">&nbsp;&nbsp;&nbsp;&nbsp; Copyright © 2013 Ancient Agro. All rights reserved.</p>
             </div>
         </div>
         </div>
     
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
	
   <!-- Body-->
</body>
</html>
