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
	         <link rel="stylesheet" href="<?php echo base_url() ?>select/select2.css">
	         <link rel="stylesheet" href="<?php echo base_url() ?>select/jquery-ui.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/DT_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>admin/js/typeahead.js"></script> 
                              <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.js')?>"></script>
                            <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.validate.js') ?>"></script>
	 <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>select/select2.js"></script>
	 <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>select/jquery-ui.js"></script> 
        <script type="text/javascript">
	$(document).ready(function() {
          parsley_reg.onsubmit=function()
            { 
              return false;
            }      
          update_supplier_form.onsubmit=function()
            { 
              return false;
            }      
             $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/supplier/data_table",
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
                                                                
                                                                     return '<a data-toggle="modal"  href="#edit_supplier" onclick=edit_supplier("'+oObj.aData[7]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[7]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },
								
								
							},

 							

 						]
		                         } );
                                   
			
		$("#add_supplier").click(function() {
                
			 
                                     inputs = $('#parsley_reg').serialize();
				  $.ajax ({
					url: "<?php echo base_url('index.php/supplier/add')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                    if(response['responseText']=='TRUE'){
                                                        bootbox.alert('New Supplier Added ');
                                                        document.getElementById('supplier_close').click();
                                                        $("#parsley_reg").trigger('reset');                                        
                                                        $("#dt_table_tools").dataTable().fnDraw();
                                            }else if(response['responseText']=='ALREADY'){
                                                     bootbox.alert(' This Supplier Already Added ');
                                            }else{
                                                 bootbox.alert('PLEASE ENTER ALL REQUIRED FIELDS ');
                                            }
					}
				  });
				});            
			$("#update_supplier").click(function() {
                        if($('#update_supplier_form').valid()){
			inputs = $('#update_supplier_form').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/supplier/update')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                    if(response['responseText']=='TRUE'){
                                                   bootbox.alert('Supplier Updated ');
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                                   document.getElementById('update_close').click();                                      
                                            }else if(response['responseText']=='ALREADY'){
                                                     bootbox.alert(' This Supplier Already Added ');
                                            }else{
                                                 bootbox.alert('PLEASE ENTER ALL REQUIRED FIELDS ');
                                            }
					}
				  });
                                  }
				});   
	    
	    $("#dt_table_tools").dataTable().fnDraw();
            $('input.typeahead-devs').typeahead({
					name: 'country',
					remote : '<?php echo base_url() ?>index.php/stock/stock_grains/%QUERY'
			});
   
		});
        function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Supplier", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/supplier/delete',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Supplier Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}
					}
				});
                    }
                 });                       
		}                
    function edit_supplier(sid){
       $('#loading').modal('show');
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/supplier/edit_supplier/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {           
                             
                                $('#edit_supplier #supplier').val(data[0][0]['name']);
                                $('#edit_supplier #company').val(data[0][0]['company']);                                        
                                $('#edit_supplier #contact').val(data[0][0]['address']);                                        
                                $('#edit_supplier #email').val(data[0][0]['email']);                                        
                                $('#edit_supplier #phone').val(data[0][0]['phone']);                                        
                                $('#edit_supplier #supplier_id').val(data[0][0]['id']);  
                                $('#edit_supplier #state').val(data[0][0]['state']);  
                                $('#edit_supplier #city').val(data[0][0]['city']);  
                                $('#edit_supplier #zip').val(data[0][0]['zip']);  
                                $('#edit_supplier #country').val(data[0][0]['country']); 
                                
                                 for(var j=0;j< data[2].length; j++){
                                    for(var i=0;i<= data[3].length; i++){
                                        if(data[3][i]==data[2][j]['guid']){
                                            var guid=data[2][j]['guid'];
                                            var name=data[2][j]['type'];
                                            $('#update_supplier_form #supplier_types').append("<option id='selecting_"+guid+"' value='"+name+"' onclick=edit_select_supplier_type('"+guid+"')>"+name+"</option>");
                                        }
                                    }
                                }
                                  for(var j=0;j< data[2].length; j++){
                                    for(var i=0;i< data[1].length; i++){
                                        if(data[1][i]['type']==data[2][j]['guid']){
                                            var guid=data[2][j]['guid'];
                                            var name=data[2][j]['type'];
                                             $('#update_supplier_form #selected_types').append('<option id="selected_'+guid+'" onclick=edit_remove_supplier_type("'+guid+'"); >'+name+"</option>");
                                                $('#update_supplier_form #selected_supplier_types').append('<input type="text" id="selected_type_'+guid+'" name="types[]" value="'+guid+'" >');
                                        }
                                    }
                                }
                                 $('#loading').modal('hide');
			  } 
			});
    }   
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">