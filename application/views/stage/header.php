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
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/stage/data_table",
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
                                                                
                                                                     return '<a data-toggle="modal"  href="#edit_stage" onclick=edit_stage("'+oObj.aData[3]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[3]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },
								
								
							},

 							

 						]
		                         } );
                                   
			
		$("#add_new_stock").click(function() {
			if(document.getElementById('stage').value!="")
               		{  inputs = {
					"stage" : $('input[name=stage]').val()
				  };
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/stage/add')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                      if(response){
                                                   bootbox.alert('New Inventory Stage Added ');
                                                   document.getElementById('stock_close').click();
                                                   document.getElementById('stage').value="";                                        
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                      }
					}
				  });}
				});            
			$("#update_stage").click(function() {
			console.log(document.getElementById('estage').value);
				if(document.getElementById('estage').value!="")
               		{  inputs = {

					"estage" : $('input[name=estage]').val(),
					"stage_id" : $('input[name=stage_id]').val()
				  };
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/stage/update')?>",
					data: inputs,
                                        type:'POST',
					success: function(response) {
                                            if(response){
                                                   bootbox.alert('Inventory Stage Updated ');
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
             bootbox.confirm("Are you Sure To Delete This Inventory Stage", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/stage/delete',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Inventory Stage Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}
					}
				});
                    }
                 });                       
		}                
    function edit_stage(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/stage/edit_stage/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {            
				  document.getElementById('estage').value=data[0]['name'];
				  document.getElementById('stage_id').value=data[0]['id'];
			  } 
			});
    }   
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">