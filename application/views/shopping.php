
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
       
               
        <style type="text/css">
            .zoomWindow{
                margin-top: -260%!important;
                width: 600px !important;
            }
            .shopping_font{
                font-family: verdana;
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
        	<script src="<?php echo base_url('website/hover/jquery-1.8.3.min.js')?>"></script>
	<script src="<?php echo base_url('website/hover/jquery.elevatezoom.js')?>"></script>
      
</head>
<body >
   
   <!-- Container-->
  
   <div class=" container main_container " style="width: 100%;"  >
  
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
         <script type="text/javascript">
         function get_image_for_selected_product(data,guid){
             var p_name=$('#image_'+guid).val();
             console.log(p_name);
             document.getElementById('myModalLabel').innerHTML=p_name;
             document.getElementById('product_image_url').src="<?php echo base_url() ?>uploads/"+data;
         }
         </script>
         <div class="row" style="margin-top:15px; ">
             <div class="col col-lg-12">
                 <h2 class="font text-center"><img src="<?php echo base_url() ?>images/divider_left_h.png" style="padding-right: 50px;"> SHOPPING <img src="<?php echo base_url() ?>images/divider_right_h.png" style="padding-left: 50px;"></h2>
             </div>
         </div>
   </div>
         <div class="row home_contant shopping_font">
             
			 <div class="col col-lg-1"></div>
			 <div class="col col-lg-7">
                             <table class="table table-striped shopping_table" id="add_product" >
                                 <thead></thead><tr><th>Image</th><th  style="width: 130px">Product Name</th><th>Price</th><th  style="width: 100px">Quty</th><th>Add</th></tr>
                                <tbody>
                         <?php $i=0; foreach ($row as $grain) { ++$i; ?>
                                  
                                    <tr style="background: none !important"> <?php echo form_open('ancientagro/shopping'); ?>  
                                        <td style="background: none !important;width: 221px">
                                            <img id="image_oo<?php echo $i; ?>"  src='<?php echo base_url('uploads');echo '/'.$grain->image; ?>' data-zoom-image="<?php echo base_url('uploads');echo '/'.$grain->image; ?>" style="width: 100px;height: 50px;border:solid 2px #a75327"/>
                                        	   <script>
 
   $("#image_oo<?php echo $i; ?>").elevateZoom({scrollZoom : true});
     
</script><a href="<?php echo base_url('index.php/ancientagro/product_details/').'/'.$grain->inventory_id ?>"class="btn btn-default btn-sm pull-right shopping_input agro_button">View More</a>  <input type="hidden" id="<?php echo $grain->inventory_id; ?>" name="stock_product" value="<?php echo $grain->unit;?> ">
                                        </td>
                                        
                                        <td style="background: none !important" ><br><?php echo $grain->name; ?></td><td style="background: none !important"><br><?php echo $grain->unit_price; ?></td>
                                                                        <td style="background: none !important"> <?php $quty=array(
                                                                            'name'=>'qty',
                                                                            'id'=>"quty_$grain->inventory_id",
                                                                            'class'=>'form-control shopping_quty shopping_input ',
                                                                            'onkeyup'=>"get_stocks_detils('".$grain->inventory_id."','".md5($i)."')",
                                                                            'value'=>1
                                                                            
                                                                            );
                                                                            echo form_input($quty)?> </td>
                                                                        <td style="background: none !important">
                                                                            <input type="hidden" name="id" id="<?php echo 'p_'.$grain->inventory_id ?>" value="<?php echo md5($grain->inventory_id) ?>" />
                                                                            <input type="hidden" name="id" value="<?php echo $grain->id ?>" />
                                                                            <input type="hidden" name="name" value="<?php echo $grain->name ?>" />
                                                                            <input type="hidden" name="price" value="<?php echo $grain->unit_price ?>" />
                                                                            
                                                                            
                                                                            <?php $add=array('name'=>'add_cart',
                                                                            'class'=>'btn shopping_input agro_button',
                                                                            'value'=>'Add');
                                                                            echo form_submit($add)?>                                                         
                                                                            
                                                                        </td>
                              
                                                  <?php echo form_close(); } ?> 
                                    </tr>
          
                                </tbody>
                             </table>
			
                 
         
			</div>
			
			   <script>
 
   $("#image_oo1").elevateZoom({scrollZoom : true});
   $("#image_oo2").elevateZoom({scrollZoom : true});
   $("#image_oo3").elevateZoom({scrollZoom : true});
     
</script>
			
			
                         <div class="col col-lg-3" style="width: 28% !important">
					<?php echo form_open('ancientagro/udpate_cart'); ?>

                            <table class="table table-striped " id="selected_product"  style="width:100%" border="0">
                                                    
						<tr>
						  <th>QTY</th>
						  <th>Name</th>
						  <th style="text-align:right">Item Price</th>
						  <th style="text-align:right">Sub-Total</th>
						</tr>

						<?php $i = 1; ?>

						<?php foreach ($this->cart->contents() as $items): ?>

							<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                                <input type="hidden" id="<?php echo $items['rowid'] ?>" value="<?php echo  $items['qty'] ?>">

							<tr>
							  <td><?php echo form_input(array('name' => $i.'[qty]','class'=>'shopping_quty form-control cart_quty', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
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

						<tr>
						  <td colspan="2"> </td>
                                                  <td class="right"><strong style="font-weight: bold">Total</strong></td>
						  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
						</tr>

						</table><br>
                            <div class="row"><div class="col col-lg-4">
                                    <?php $update_cart=array('name'=>'update_cart','value'=>'Update your Cart','class'=>'btn agro_button') ?>
						<?php echo form_submit($update_cart); ?>
						<?php echo form_close(); ?>
                                    </div>
                                <div class="col col-lg-4" style="margin-left: 50px">
						<?php echo form_open('ancientagro/checkout'); ?>
                                                    <?php 
                                                    $check_out=array('name'=>'checkout',
                                                        'value'=>'Checkout',
                                                        'class'=>'btn agro_button');
                                                    echo form_submit($check_out); ?><?php echo form_close(); ?>
						</div>
			</div></div></div>
    <div class=" container main_container " >
	<!-- Wrapper for media data-->
  <div id="restore_data" class="modal fade">
            <div class="modal-dialog" style="width: 40%">
								<div class="modal-content">
                                                                   
										<div class="modal-header">
											<button type="button" id="nutrition_close_" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title text-center" id="myModalLabel"></h4>
										</div>
										<div class="modal-body">
										<div class='row'>
                                                                                    <div class='text-center'>
											  <img src="" id='product_image_url'>	
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
		 
         <div class="fotter fancy_font" style="margin-top: 130px;height: 160px;background:url(<?php echo base_url() ?>images/Footer_Img.png) ;color: #ffffff; ">
             <div class="row">
             <p style="margin-top: 130px">&nbsp;&nbsp;&nbsp;&nbsp; Copyright © 2013 Ancient Agro. All rights reserved.</p>
             </div>
         </div>
         </div>







</body>
</html>
