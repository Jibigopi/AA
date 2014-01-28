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
            
            
               $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/sale/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' >";
								},
								
								
							},
        
        null,  null,  null,  null,  null,  null, 

 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
                                                                     return '<a  href="<?php echo base_url('index.php/sale/edit_sale') ?>/'+oObj.aData[8]+'"  ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[8]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },
								
								
							},

 							

 						]
		                         } );
                                   
        
            $('input.customer').typeahead({
					name: 'country',
					remote : '<?php echo base_url() ?>index.php/sale/get_customer/%QUERY'
            });
            $('input.product').typeahead({
					name: 'grain',
					remote : '<?php echo base_url() ?>index.php/sale/grains/%QUERY'
            });
   
        $("#product").blur(function()
			{                            
            var guid=$('#product').val();
            $.ajax({                                      
            url: "<?php echo base_url('index.php/stock/get_grain_details') ?>",                      
            data:{
                guid: guid
            },	
            type:'POST',
            dataType: 'json',               
            success: function(data)        
              {
              console.log(data[0][0]['name']);
              $('#pallet').val(data[0][0]['pallet_number'])
              $('#price').val(data[0][0]['sales_price'])
              $('#o_pallet').val(data[0][0]['pallet_number'])
              $('#o_price').val(data[0][0]['sales_price'])
          } 
        });

        });
   
   
   
	});
  function total_amount(){
    
    var price=$('#price').val();
    var no=$('#no_of_unit').val();
    if (isNaN(no) || no==""){
         no='0';
     }
    var cost=$('#shipping').val();
     if (isNaN(cost) || cost==""){
         cost='0';
     }
    var tax=$('#tax').val();
     if (isNaN(tax) || tax==""){
         tax='0';
     }
    tax=parseFloat(tax)+parseFloat(cost);
     if (!isNaN(no)){
    $('#total').val(price*no+parseFloat(tax));
    $('#o_total').val(price*no+parseFloat(tax));
   // $('#newMail #stock_total').val(price*no);
     }else{
         $('#total').val();
        // $('#newMail #stock_total').val();
     }
    }
      function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Sale", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/sale/delete_sale',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Sale Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}
					}
				});
                    }
                 });                       
		}      
        </script>
</head>
<body class="sidebar_narrow boxed pattern_1">