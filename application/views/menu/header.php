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
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/retina.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/linecons/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/style.css">
                <link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/datepicker/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/theme/color_1.css" id="theme">
		<link  rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/dataTables/media/DT_bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/css/TableTools.css">
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/ie.css">
		<script src="<?php echo base_url() ?>admin/js/ie/html5shiv.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ie/respond.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ie/excanvas.min.js"></script>
	<![endif]-->
	
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/DT_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>admin/js/typeahead.js"></script> 
        <script type="text/javascript">
	$(document).ready(function() {
            $('#add_menu').hide();
         $("#url").attr("disabled",true);
         $("#page").attr("disabled",false)
          parsley_reg.onsubmit=function()
            { 
              return false;
            }      
          parsley_ext.onsubmit=function()
            { 
              return false;
            }      
             $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/menu/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' >";
								},
								
								
							},
        
        null, null, null, 
                                        {	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                     return '<a data-toggle="modal"  href="#edit_menu" onclick=edit_menu("'+oObj.aData[8]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[8]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },	
							},
                                                    ]
		                         } );
                                   
			
		$("#add_new_menu").click(function() {
			 inputs = $('#parsley_reg').serialize();
				  $.ajax ({
					url: "<?php echo base_url('index.php/menu/add')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                            if(response['responseText']=='TRUE'){
                                                   bootbox.alert('New Menu Added ');
                                                        $("#parsley_reg").trigger('reset');     
                                                   document.getElementById('add_menu_close').click();                                      
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                      }else if(response['responseText']=='ALREADY'){
                                                bootbox.alert('This Menu Already Added ');
                                            }else{
                                                 bootbox.alert('Please Enter All Required Fields');
                                            }
					}
				  });
				});            
			$("#update_menu").click(function() {
                         
			 inputs = $('#parsley_ext').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/menu/update')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                            if(response['responseText']=='TRUE'){
                                                 document.getElementById('menu_update_close').click(); 
                                                    document.getElementById('menu_update_close').click(); 
                                                   bootbox.alert('Menu Updated ');
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                                                                        
                                            }else if(response['responseText']=='ALREADY'){
                                                bootbox.alert('This Menu Already Added ');
                                            }else{
                                                 bootbox.alert('Please Enter All Required Fields');
                                            }
                                            
					}
				  });
				});   
	    
	    $("#dt_table_tools").dataTable().fnDraw();
            $('input.menu_type').typeahead({
					name: 'menu_type',
					remote : '<?php echo base_url() ?>index.php/menu/menu_type/%QUERY'
			});
   
		});
        function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Menu", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/menu/delete',
					type: "POST",
					data: {
						guid: guid
						
					},
					complete: function(response) {
                                            if(response['responseText']=='TRUE'){
						  bootbox.alert('Menu Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}else{
                                                      bootbox.alert('You Cant Delete Parent Menu');
                                                }
					}
				});
                    }
                 });                       
		}                
    function edit_menu(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/menu/edit_menu/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {      
                                  
                                $('#parsley_ext #name').val(data[0]['name']);
                                $('#parsley_ext #order').val(data[0]['order']);
                                $('#parsley_ext #primary').val(data[0]['parent']);
                                $('#parsley_ext #page').val(data[0]['page']);
                                $('#parsley_ext #url').val(data[0]['url']);
                                $('#parsley_ext #menu_id').val(data[0]['id']);
                                if(data[0]['link']==1){
                                       $("#parsley_ext #url").attr("disabled",true);
                                       $("#parsley_ext #page").attr("disabled",false);
                                }else{
                                      $("#parsley_ext #url").attr("disabled",false);
                                       $("#parsley_ext #page").attr("disabled",true);
                                }
			  } 
			});
    }   
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">