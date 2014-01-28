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
        <script>
	$(document).ready(function() {
             $("#product_form").trigger('reset');
             $("#product_update_form").trigger('reset');
        
	 product_form.onsubmit=function()
            { 
              return false;
            }  
	 product_update_form.onsubmit=function()
            { 
              return false;
            }  
	 sales_channel_form.onsubmit=function()
            { 
              return false;
            }  
            
            $('input.destination').typeahead({
					name: 'destination',
					remote : '<?php echo base_url() ?>index.php/grain/product_category/%QUERY'
			});
            $('input.update_destination').typeahead({
					name: 'destination',
					remote : '<?php echo base_url() ?>index.php/grain/product_category/%QUERY'
			});
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
        
        null, null, null, null, 

 							
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                        return  '<img src="<?php  echo base_url()?>uploads/'+oObj.aData[9]+'" width="80px;" height="50px">';
                                                                
                                                                },
								
								
							},
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                   //     return '<a data-toggle="modal" href="#upload_image" onclick=upload_product_image("'+oObj.aData[0]+'");  ><span data-toggle="tooltip" class="label label-warning hint--top hint--error" data-hint="EDIT"><i class="icon-film"></i> </span> </a> &nbsp <a data-toggle="modal" href="#update_product"  onclick=update_product("'+oObj.aData[0]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                 return '<div class="btn-group"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="icon icon-cog"></i>  <span class="caret"></span>   </button>   <ul class="dropdown-menu" >  \n\
                                                                   <li ><a data-toggle="modal"  href="#sales_channel" onclick=set_sales_chanel("'+oObj.aData[0]+'");>Set Sales Channel</a></li> \n\
                                                                   <li ><a data-toggle="modal"  href="#set_nutrition" onclick=set_nutrition("'+oObj.aData[0]+'");>Set Nutrition</a></li> \n\
                                                                   <li ><a data-toggle="modal" href="#upload_image" onclick=upload_product_image("'+oObj.aData[0]+'"); >Set Product Image</a></li> \n\
                                                                   <li ><a data-toggle="modal" href="#update_product"  onclick=update_product("'+oObj.aData[0]+'");  >  Edit</a></li> \n\
                                                                   <li ><a href=javascript:user_function("'+oObj.aData[0]+'"); >  Delete</a></li> \n\
                                                                    </ul>  </div>';
                                                                },
							},
 						]
		}                  
                 );
                 
                 $("#add_new_product").click(function() {
                            var inputs = $('#product_form').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/grain/add_new_product')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Product Added');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('product_close').click(); 
                                                     
                                                      $("#product_form").trigger('reset');
                                        }   
                                         if(response['responseText']=='alredy'){
                                              bootbox.alert('This Product is alredy Added'); 
                                         }
                                        
					}
				  });
				}); 
                 
                 $("#add_product_update").click(function() {
                            var inputs = $('#product_update_form').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/grain/update_product')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Product Updated');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('product_update_close').click(); 
                                                      $("#product_update_form").trigger('reset');
                                        }   
                                         if(response['responseText']=='alredy'){
                                              bootbox.alert('This Product is alredy Added'); 
                                         }
                                        
					}
				  });
				}); 
                 $("#add_sales_channel").click(function() {
                           var inputs = $('#sales_channel_form').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/grain/sales_channel')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Sales Channel Saved');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('sales_channel_close').click(); 
                                                      $("#sales_channel_form").trigger('reset');
                                        }   
                                        
                                        
					}
				  });
				}); 
		});
                function user_function(guid){
                     bootbox.confirm("Are you Sure To Delete This Product", function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>index.php/grain/grains_delete',
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
                function update_product(sid){
                        $("#product_update_form").trigger('reset');
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/grain/edit_grain/"+sid,                      
			  data: "",     						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                              $("#add_row1").remove();
                              $("#cover_div").append('<div id="add_row1" class="col col-lg-6"><div class="row " ><div class="col col-lg-6"><input type="text"  class="form-control" name="index[]" id="index"></div><div class="col col-lg-4"> <input type="text" class="form-control" name="value[]" id="value">  </div><div class="col col-lg-1"><a class=" btn btn-success" onclick="add_new_nutt()"><i class="icon icon-plus"></i></a></div></div> </div>');
                                $('#update_product #sku').val(data[0]['sku']);
                                $('#update_product #stock_id').val(data[0]['gcode']);
                                                                      
                                $('#update_product #description').val(data[0]['dis']);                                        
                                $('#update_product #name').val(data[0]['name']);                                        
                                $('#update_product #category').val(data[0]['cat_name']);                                        
                                $('#update_product #product_id').val(data[0]['guid']);                                        
//                                $('#update_product #nutrition').val(data[0]['nutrition']); 
//                                
//                                for(i=1;i<= data.length-1;i++){
//                                   var div_id=i;
//                                console.log(data[i]);
//                                    $("#add_row1").append('<div class="row" id="AA_'+div_id+'" style="margin-top: 5px;" ><div class="col col-lg-6"><input type="text"  class="form-control" name="index[]" value="'+data[i]['index']+'" id="index_'+div_id+'" ></div><div class="col col-lg-4"><input type="text" class="form-control" id="value_'+div_id+'" name="value[]" value="'+data[i]['value']+'" id="index[]"></div><div class="col col-lg-1"><a class=" btn btn-success" onclick=remove_new_nut("AA_'+div_id+'")><i class="icon icon-minus"></i></a></div></div>');
//                                }
                          }
			});
                    }
                    function upload_product_image(guid){
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/grain/edit_grain/"+guid,                      
			  data: "",     						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                             
                                 $('#upload_image #product_name').val(data[0]['gcode']);
                                 
                                         $('#upload_image #product_id').val(guid);
                                
                             
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
               function set_sales_chanel(guid){
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/grain/get_sales_channel/"+guid,                      
			  data: "",     						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                              $('#sales_channel #product_name').val(data[0][0]['name']);
                              $('#sales_channel #product_gcode').val(data[0][0]['gcode']);
                              $('#channel_product_id').val(data[0][0]['guid']);
                                
                                $('#selecting_channel').remove();
                                $('#parrent_channel_list').append('<select name="" class="form-control" multiple="multiple" id="selecting_channel"  style="height:200px "></select>');
                           
                                for(var j=0;j< data[2].length; j++){
                                    for(var i=0;i<= data[3].length; i++){
                                        if(data[3][i]==data[2][j]['id']){
                                            var guid=data[2][j]['id'];
                                            var name=data[2][j]['name'];
                                            $('#selecting_channel').append("<option id='selecting_id_"+guid+"' value='"+name+"' onclick=select_sales_channel('"+guid+"')>"+name+"</option>");
                                        }
                                    }
                                }
                                $('#selected_product_sales_channel').remove();
                                $('#parrent_channel').append('<div id="selected_product_sales_channel">');
                                $('#selected_channel').remove();                               
                                $('#parrent_selected_channel_list').append('<select name="" class="form-control" multiple="multiple" id="selected_channel"  style="height:200px ">');
              
                              for(var j=0;j< data[2].length; j++){
                                    for(var i=0;i< data[1].length; i++){
                                        if(data[1][i]['channel_id']==data[2][j]['id']){
                                            var guid=data[2][j]['id'];
                                            var name=data[2][j]['name'];
                                             $('#selected_channel').append('<option id="selected_id_'+guid+'" onclick=remove_selected_channel("'+guid+'"); >'+name+"</option>");
                                                $('#selected_product_sales_channel').append('<input type="hidden" id="selected_id_'+guid+'" name="channel[]" value="'+guid+'" >');
                                        }
                                    }
                                }
                              
                          }
			});
                    }
            function product_number(){
                     $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/grain/generate_number/",                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {          
                             $('#product_form #stock_id').val(data);
                             $('#product_form #stock_id_o').val(data);
                          }});
}
	</script>	
	</head>
	<body class="sidebar_narrow boxed pattern_1">