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
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/supplier_type/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' >";
								},
								
								
							},
        
        null, 

 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                     return '<a data-toggle="modal"  href="#edit_supplier_type" onclick=edit_supplier_type("'+oObj.aData[3]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[3]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },
								
								
							},

 							

 						]
		                         } );
                                   
			
		$("#add_new_stock").click(function() {
			if(document.getElementById('supplier_type').value!="")
               		{  inputs = {
					"supplier_type" : $('input[name=supplier_type]').val()
				  };
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/supplier_type/add')?>",
					data: inputs,
                                        type:'POST',
					success: function(response) {
                                      if(response){
                                                   bootbox.alert('New Customer Type Added ');
                                                   document.getElementById('stock_close').click();
                                                   document.getElementById('supplier_type').value="";                                        
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                                   
                                      }
					}
				  });}
				});            
			$("#update_supplier_type").click(function() {
			console.log(document.getElementById('esupplier_type').value);
				if(document.getElementById('esupplier_type').value!="")
               		{  inputs = {

					"esupplier_type" : $('input[name=esupplier_type]').val(),
					"supplier_type_id" : $('input[name=supplier_type_id]').val()
				  };
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/supplier_type/update')?>",
					data: inputs,
                                        type:'POST',
					success: function(response) {
                                            if(response){
                                                   bootbox.alert('Customer Type Updated ');
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                                   document.getElementById('update_close').click();                                      
                                            }
					}
				  });}
				});   
	    
	    $("#dt_table_tools").dataTable().fnDraw();
            $('input.typeahead-devs').typeahead({
					name: 'country',
					remote : '<?php echo base_url() ?>index.php/stock/stock_grains/%QUERY'
			});
   
		});
        function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Customer Type", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/supplier_type/delete',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Customer Type Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}
					}
				});
                    }
                 });                       
		}                
    function edit_supplier_type(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/supplier_type/edit_supplier_type/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {            
				  document.getElementById('esupplier_type').value=data[0]['type'];
				  document.getElementById('supplier_type_id').value=data[0]['guid'];
			  } 
			});
    }   
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">