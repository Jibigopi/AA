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
	         <link rel="stylesheet" href="<?php echo base_url() ?>template/select/select2.css">
	         <link rel="stylesheet" href="<?php echo base_url() ?>template/select/jquery-ui.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/DT_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>admin/js/typeahead.js"></script> 
                              <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.js')?>"></script>
                            <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.validate.js') ?>"></script>
	 <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>template/select/select2.js"></script>
	 <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>template/select/jquery-ui.js"></script> 
                            
         <script type="text/javascript">
	$(document).ready(function() {
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
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/storage_location/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' >";
								},
								
								
							},
        
        null, null, null, null,  null, 

 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                     return '<a data-toggle="modal"  href="#edit_storage_location" onclick=edit_storage_location("'+oObj.aData[7]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[7]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },
								
								
							},

 							

 						]
		                         } );
                                   
			
		$("#add_location").click(function() {
			if($('#parsley_reg #storage_location').val()!="")
               		{  inputs = $('#parsley_reg').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/storage_location/add')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                            if(response){
                                                        bootbox.alert('New Storage Location Added ');
                                                        document.getElementById('location_close').click();
                                                        $("#parsley_reg").trigger('reset');                                        
                                                        $("#dt_table_tools").dataTable().fnDraw();
                                            }
					}
				  });}
				});            
			$("#update_storage_location").click(function() {
			inputs = $('#parsley_ext').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/storage_location/update')?>",
					data: inputs,
                                        type:'POST',
					success: function(response) {
                                            if(response){
                                                   bootbox.alert('Stage Updated ');
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                                   document.getElementById('update_close').click();                                      
                                            }
					}
				  });
				});   
	    
	    $("#dt_table_tools").dataTable().fnDraw();
            $('input.typeahead-devs').typeahead({
					name: 'country',
					remote : '<?php echo base_url() ?>index.php/stock/stock_grains/%QUERY'
			});
   
		});
        function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Storage Location", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/storage_location/delete',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Storage Location Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}
					}
				});
                    }
                 });                       
		}                
    function edit_storage_location(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/storage_location/edit_storage_location/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {            
				  
                                  $('#parsley_ext #storage_location').val(data[0]['name']);
                                  $('#parsley_ext #phone').val(data[0]['phone']);
                                  $('#parsley_ext #email').val(data[0]['email']);
                                  $('#parsley_ext #contact').val(data[0]['contact']);
                                  $('#parsley_ext #price').val(data[0]['price']);
                                  $('#parsley_ext #available').val(data[0]['total_sqr_ft']);
                                  $('#parsley_ext #storage_location_id').val(data[0]['id']);
			  } 
			});
    }   
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">