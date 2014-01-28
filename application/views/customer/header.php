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
            $('#add_customer').hide();
$('#parsley_ext').validate(
{
rules: {
firstname: {
required: true
},
lastname: {
required: true
},
phone: {
required: true
},
email: {
required: true
},
address: {
required: true
},
shipping_address: {
required: true
},
finance_manager: {
required: true
}
}
});
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
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/customer/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' >";
								},
								
								
							},
        
        null, null, null, null, null, null, 
                                        {	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                     return '<a data-toggle="modal"  href="#edit_customer" onclick=edit_customer("'+oObj.aData[8]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[8]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },	
							},
                                                    ]
		                         } );
                                   
			
		$("#add_new_customer").click(function() {
			 inputs = $('#parsley_reg').serialize();
				  $.ajax ({
					url: "<?php echo base_url('index.php/customer/add')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                            if(response['responseText']=='TRUE'){
                                                   bootbox.alert('New Customer Added ');
                                                        $("#parsley_reg").trigger('reset');     
                                                   document.getElementById('add_customer_close').click();                                      
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                      }
					}
				  });
				});            
			$("#update_customer").click(function() {
                        if($('#parsley_ext').valid()){
			 inputs = $('#parsley_ext').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/customer/update')?>",
					data: inputs,
                                        type:'POST',
					 complete: function(response) {
                                if(response['responseText']=='TRUE'){
                                                   bootbox.alert('Customer Updated ');
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                                   document.getElementById('update_close').click();                                      
                                            }
                                            else if(response['responseText']=='FALSE'){
                                                   bootbox.alert('Please Enter All Required Fields');
                                            }
					}
				  });
                                  }
				});   
	    
	    $("#dt_table_tools").dataTable().fnDraw();
            $('input.customer_type').typeahead({
					name: 'customer_type',
					remote : '<?php echo base_url() ?>index.php/customer/customer_type/%QUERY'
			});
   
		});
        function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Customer", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/customer/delete',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Customer Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}
					}
				});
                    }
                 });                       
		}                
    function edit_customer(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/customer/edit_customer/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {      
                                  
                                $('#parsley_ext #firstname').val(data[0]['name']);
                                $('#parsley_ext #lastname').val(data[0]['last_name']);
                                $('#parsley_ext #address').val(data[0]['address']);
                                $('#parsley_ext #shipping_address').val(data[0]['shipping_address']);
                                $('#parsley_ext #customer_type').val(data[0]['customer_type']);
                                $('#parsley_ext #finance_manager').val(data[0]['finance_manager']);
                                $('#parsley_ext #email').val(data[0]['email']);
                                $('#parsley_ext #phone').val(data[0]['phone']);
                                $('#parsley_ext #web').val(data[0]['web']);
                                $('#parsley_ext #date_of_record').val(data[0]['date_of_record']);
                                $('#parsley_ext #state').val(data[0]['state']);
                                $('#parsley_ext #country').val(data[0]['country']);
                                $('#parsley_ext #city').val(data[0]['city']);
                                $('#parsley_ext #zip').val(data[0]['zip']);
                                $('#parsley_ext #handed_of_day').val(data[0]['handed_off_day']);
                                $('#parsley_ext #organic').val(data[0]['organic_certi']);
                                $('#parsley_ext #customer_id').val(data[0]['id']);
			  } 
			});
    }   
</script>

   <style type="text/css">
                                                    #parsley_ext .error{
                                                        color: red;
                                                    }
                                                    </style>
</head>
<body class="sidebar_narrow boxed pattern_1">