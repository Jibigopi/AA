<!doctype html>
<html lang="en">
	

<head>
		<meta charset="UTF-8">
		<title>Ancient Agro</title>
		
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/todc-bootstrap.min.css">       
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/font-awesome/css/font-awesome.min.css">
                <link rel="stylesheet" href="<?php echo base_url() ?>admin/img/flags/flags.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/retina.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/bootstrap-switch/stylesheets/bootstrap-switch.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/bootstrap-switch/stylesheets/ebro_bootstrapSwitch.css">	
                <link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/datepicker/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/fullcalendar/fullcalendar.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/linecons/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/theme/color_1.css" id="theme">
		<link  rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/dataTables/media/DT_bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/css/TableTools.css">
	
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/multi-select/css/multi-select.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/multi-select/css/ebro_multi-select.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/select2/select2.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/select2/ebro_select2.css">
                
                <!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/ie.css">
		<script src="<?php echo base_url() ?>admin/js/ie/html5shiv.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ie/respond.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ie/excanvas.min.js"></script>
	<![endif]-->

	<!-- custom fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		

       
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/DT_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>admin/js/typeahead.js"></script> 
        
        <script type="text/javascript" src="<?php echo base_url('upload_image/jquery.form.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.validate.js') ?>"></script>
        <script>
	$(document).ready(function() {
        over_view_form.onsubmit=function()
            { 
              return false;
            } 
        source_form.onsubmit=function()
            { 
              return false;
            } 
        benefits_form.onsubmit=function()
            { 
              return false;
            } 
           $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/dashboard/grains_data_table",
                                       aoColumns: [  
                                    
                                 { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' >";
								},
								
								
							},
        
        null, null, null, 

 							
 						,
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                   //     return '<a data-toggle="modal" href="#upload_image" onclick=upload_product_image("'+oObj.aData[0]+'");  ><span data-toggle="tooltip" class="label label-warning hint--top hint--error" data-hint="EDIT"><i class="icon-film"></i> </span> </a> &nbsp <a data-toggle="modal" href="#update_product"  onclick=update_product("'+oObj.aData[0]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                 return '<div class="btn-group"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="icon icon-cog"></i>  <span class="caret"></span>   </button>   <ul class="dropdown-menu" >  \n\
                                                                   <li ><a   href="<?php echo base_url() ?>index.php/product_details/product_images/'+oObj.aData[0]+'" >Product Images</a></li> \n\
                                                                   <li ><a data-toggle="modal"  href="#set_nutrition" onclick=set_nutrition("'+oObj.aData[0]+'");>Set Nutrition</a></li> \n\
                                                                   <li ><a data-toggle="modal" href="#over_view" onclick=over_view("'+oObj.aData[0]+'"); >Over View</a></li> \n\
                                                                   <li ><a data-toggle="modal" href="#source"  onclick=source("'+oObj.aData[0]+'");  >  source</a></li> \n\
                                                                   <li ><a data-toggle="modal" href="#benefits"  onclick=benefits("'+oObj.aData[0]+'");  >  Benefits</a></li> \n\
                                                                   <li ><a href=javascript:user_function("'+oObj.aData[0]+'"); >  Delete</a></li> \n\
                                                                    </ul>  </div>';
                                                                },
							},
 						]
		}                  
                 );
                   $("#save_over_view").click(function() {
                            var inputs = $('#over_view_form').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/product_details/add_product_over_view')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Product Over View Saved');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('over_view_close').click(); 
                                                     
                                                      $("#over_view_form").trigger('reset');
                                        }   
                                         
                                        
					}
				  });
				}); 
                   $("#save_source").click(function() {
                            var inputs = $('#source_form').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/product_details/add_product_source')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Product source Saved');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('source_close').click(); 
                                                     
                                                      $("#source_form").trigger('reset');
                                        }   
                                         
                                        
					}
				  });
				}); 
                   $("#save_benefits").click(function() {
                            var inputs = $('#benefits_form').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/product_details/add_product_benefits')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Product Benefits Saved');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('benefits_close').click(); 
                                                     
                                                      $("#source_form").trigger('reset');
                                        }   
                                         
                                        
					}
				  });
				}); 
               
		});
                function user_function(guid){
                     bootbox.confirm("Are you Sure To Delete This Product", function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>index.php/product_details/product_detailss_delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                       bootbox.alert("Product Deleted");
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        }

                        
    });
                }
                
                   
            function set_nutrition(guid){
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/grain/edit_grain/"+guid,                      
			  data: "",     						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                             
                                 $('#set_nutrition #nutrition_product_name').val(data[0]['gcode']);
                                 
                                         $('#set_nutrition #nutrition_product_id').val(guid);
                               
                             
                          }
			});
                    }
            function over_view(guid){
             $("#over_view_form").trigger('reset');
            var value='over_view';
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/product_details/get_product_meta",                     
			 type: "POST",
                            data: {
                                guid:guid,
                              key:value
                          }     ,						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                             
                                 $('#over_view #product_name').val(data[0]['gcode']);
                                 $('#over_view #over_text').val(data[0]['value']);
                                 
                                         $('#over_view #product_id').val(guid);
                               
                             
                          }
			});
                    }
            function source(guid){
              $("#source_form").trigger('reset');
                        var value='source';
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/product_details/get_product_meta",                     
			 type: "POST",
                            data: {
                                guid:guid,
                              key:value
                          }     ,						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                                 $('#source #product_name').val(data[0]['gcode']);
                                 $('#source #source_text').val(data[0]['value']);
                                 
                                         $('#source #product_id').val(guid);
                               
                             
                          }
			});
                    }
            function benefits(guid){
              $("#benefits_form").trigger('reset');
                        var value='benefits';
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/product_details/get_product_meta",                     
			 type: "POST",
                            data: {
                                guid:guid,
                              key:value
                          }     ,						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                                 $('#benefits #product_name').val(data[0]['gcode']);
                                 $('#benefits #benefits_text').val(data[0]['value']);
                                 
                                         $('#benefits #product_id').val(guid);
                               
                             
                          }
			});
                    }

	</script>	
	</head>
	<body class="sidebar_narrow boxed pattern_1">