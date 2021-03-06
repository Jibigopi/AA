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

        <script>
	$(document).ready(function() {
			
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/dashboard/users_data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' >";
								},
								
								
							},
        
        null, null, null, null, null, 

 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                        return '<a href="<?php echo base_url() ?>index.php/dashboard/edit_customer/'+oObj.aData[8]+'" ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[8]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },
								
								
							},

 							

 						]
		                         } );
                                   
			
   
   
            						// CLOSE ALL OPEN PROMPTS
		});
                function user_function(guid){
                      bootbox.confirm("Are you Sure To Delete This Grain", function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>index.php/dashboard/customer_delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                      bootbox.alert('Customer Deleted');
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        
}
           });
                       
    }
                
	</script>	
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
									<li><a href="#">Profile</a></li>
									
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
						
						<!-- main content -->
                                                <br>
						 <?php   $form =array('name'=>'grains');
                                                echo form_open('grains/grains_list',$form) ?>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
                                                                    <a href="<?php echo base_url() ?>index.php/dashboard/add_customer" class="btn btn-success"><i class="icon icon-plus"></i> ADD</a>
                                                                    <a href="javascript:delete_selected_customer()" class="btn btn-danger"><i class="icon icon-trash"></i> DELETE</a>
									<table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                        <tr>
                                                                          <th>Id</th>
                                                                          <th >Select</th>
                                                                          <th >User Name</th>
                                                                          <th>Email </th>
                                                                          <th >First Name</th>
                                                                          <th>Last Name</th>
                                                                          <th>Phone</th>
                                                                        
                                                                          <th>Action</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody >



                                                                        </tbody>

                                                                  </table>
								</div>
							</div>
						</div>
                                                	<?php  echo form_close()?>
						
						
						

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
<!-- datatables -->
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/media/js/jquery.dataTables.min.js"></script>
		<!-- datatables column reorder -->
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/ColReorder/media/js/ColReorder.min.js"></script>
		<!-- datatable fixed columns -->
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/FixedColumns/media/js/FixedColumns.min.js"></script>
		<!-- datatables column toggle visibility -->
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/ColVis/media/js/ColVis.min.js"></script>
		<!-- datatable table tools -->
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/js/TableTools.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
		<!-- datatable bootstrap style -->
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/media/DT_bootstrap.js"></script>
			
			<script src="<?php echo base_url() ?>admin/data_table/js/bootstrap-alert.js"></script>
                        <script src="<?php echo base_url() ?>admin/data_table/js/jquery.bootstrap-growl.js"></script>
                        <script src="<?php echo base_url() ?>admin/data_table/bootbox.min.js"></script>
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
        <script type="text/javascript">
                    function delete_selected_customer(){
                      var flag_d=0;
                    
                     var flag=0;
                     var field=document.forms.grains;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                         bootbox.alert("Please Select Customer To Delete");
                      
                      }else{
                         bootbox.confirm("Are you Sure To Delete This Customer", function(result) {
             if(result){
                 
            
                            var agro=document.forms.grains;        
                      for (i = 0; i < agro.length; i++){
                          if(agro[i].checked==true){                             
                              $.ajax({
                url: '<?php echo base_url() ?>index.php/dashboard/customer_delete',
                type: "POST",
                data: {
                    guid:agro[i].value
                    
                },
                success: function(response)
                {
                    if(response){
                          $("#dt_table_tools").dataTable().fnDraw();
                      
                    }
                }
            });
                          }
                          

                      }}
                      });
                 
                      }  
                    
                       if(flag_d >0){
                    
                       
                         bootbox.alert("Customer Deleted");
                  }
                  console.log(flag_d)
                      }</script>
	</body>


</html>