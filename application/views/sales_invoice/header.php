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
              
          parsley_ext.onsubmit=function()
            { 
              return false;
            } 
          
             $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/sales_invoice/data_table",
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[0]+"' >";
								},
								
								
							},
        
        null, null, null, null, null,   

 						{	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							if(oObj.aData[9]==0){
                                                                            return '<span data-toggle="tooltip" class="label label-warning hint--top hint--success" >Waiting</span>';
                                                                        }else{
                                                                            return '<span data-toggle="tooltip" class="label label-success hint--top data-hint="" >Approved</span>';
                                                                        }
								},
								
								
							},
 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                                                               
                                                                        if(oObj.aData[12]==0){
                                                                        return '<div class="btn-group"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="icon icon-cog"></i>  <span class="caret"></span>   </button>   <ul class="dropdown-menu" >   <li ><a href="#" onclick=get_receipts("'+oObj.aData[11]+'");>Invoice </a></li>    <li ><a data-toggle="modal"  href="#add_sales" onclick=add_new_sale("'+oObj.aData[11]+'");>ADD SALE</a></li>    </ul>  </div>';
                                                                }else{
                                                                   return '<div class="btn-group"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="icon icon-cog"></i>  <span class="caret"></span>   </button>   <ul class="dropdown-menu" >  <li ><a href="#" onclick=get_receipts("'+oObj.aData[11]+'");>Invoice</a></li>       </ul>  </div>';
                                                                }
                                                                },
								
								
							},

 							

 						]
		                         } );
                         
                         $("#add_sales").click(function() {
                      
			inputs = $('#parsley_ext').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/sales_receipts/add_sale')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                    console.log(response['responseText']);
                                            if(response['responseText']=='TRUE'){
                                               bootbox.alert('Sales Added');
                                              $("#dt_table_tools").dataTable().fnDraw();
                                                document.getElementById('add_new_sales_close').click(); 
                                                 window.open("<?php  echo base_url('index.php/invoice/sales_order_invoice')?>/"+$('#parsley_ext #sales_order_guid').val());
                                            }
					}
				  });
				});   
			
		});
                function invoice(guid){
                 $.ajax({
					url: '<?php echo base_url() ?>index.php/sales_order/approve',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						
							$("#dt_table_tools").dataTable().fnDraw();
						
					}
				});
                window.open("<?php  echo base_url('index.php/invoice/sales_order_invoice')?>/"+guid);
                }
                 function add_new_sale(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/sales_receipts/add_new_sale/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {            
                                  $('#parsley_ext #sales_order_guid').val(data[0]['guid']);
                                  $('#parsley_ext #sales_order').val(data[0]['number']);
                                  $('#parsley_ext #order_received_date').val(data[0]['date_created']);
                                  $('#parsley_ext #recipient').val(data[0]['receipient']);
                                  $('#parsley_ext #address').val(data[0]['address']);
                                  $('#parsley_ext #customer').val(data[1]['name']);
                                  $('#parsley_ext #product').val(data[2]['name']);
                                  $('#parsley_ext #order_id').val(data[0]['guid']);
                                 
                                  $('#parsley_ext #unit_price').val(data[0]['price']);
                                  $('#parsley_ext #unit_price_o').val(data[0]['price']);
                                  $('#parsley_ext #no_of_unit').val(data[0]['no_of_unit']);
                                  $('#parsley_ext #total_price_for_unit').val(data[0]['amount_for_unit']);
                                  $('#parsley_ext #total_price_for_unit_o').val(data[0]['amount_for_unit']);
                                 
                                  $('#parsley_ext #case_price').val(data[0]['case_price']);
                                  $('#parsley_ext #case_price_o').val(data[0]['case_price']);
                                  $('#parsley_ext #no_of_case').val(data[0]['case_unit']);
                                  $('#parsley_ext #total_price_for_case').val(data[0]['case_amount']);
                                  $('#parsley_ext #total_price_for_case_o').val(data[0]['case_amount']);
                                  
                                  $('#parsley_ext #pallet_price').val(data[0]['pallet_price']);
                                  $('#parsley_ext #pallet_price_o').val(data[0]['pallet_price']);
                                  $('#parsley_ext #no_of_pallet').val(data[0]['pallet_unit']);
                                  $('#parsley_ext #total_price_for_pallet').val(data[0]['pallet_amount']);
                                  $('#parsley_ext #total_price_for_pallet_o').val(data[0]['pallet_amount']);
                                  
                                  $('#parsley_ext #total_price_o').val(data[0]['total_price']);
                                  $('#parsley_ext #total_price').val(data[0]['total_price']);
                                  $('#parsley_ext #grand_total').val(data[0]['grand_total']);
                                  $('#parsley_ext #grand_total_o').val(data[0]['grand_total']);
                                  $('#parsley_ext #tax').val(data[0]['tax']);
                                  $('#parsley_ext #discount').val(data[0]['discount']);
                                  $('#parsley_ext #payment').val(data[0]['payment_term']);
                                  $('#parsley_ext #description').val(data[0]['description']);
                                  $('#parsley_ext #product_id').val(data[0]['product']);
                                  $('#parsley_ext #customer_id').val(data[0]['customer']);
                                  
                                  
                                  $('#parsley_ext #unit_stock').val(data[3]['unit']);
                                  $('#parsley_ext #case_stock').val(data[3]['case']);
                                  $('#parsley_ext #pallet_stock').val(data[3]['pallet']);
                                  var invoice='AA-INV-10'+data[0]['id'];
                                  $('#parsley_ext #invoice_number').val(invoice);
                                  
                                  $('#parsley_ext #invoice_number_o').val(invoice);
                                 
			  } 
			});
    } 
     function get_receipts(guid){
                 $.ajax({
					url: '<?php echo base_url() ?>index.php/sales_order/approve',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						
							$("#dt_table_tools").dataTable().fnDraw();
						
					}
				});
                window.open("<?php  echo base_url('index.php/invoice/sales_order_invoice')?>/"+guid);
                }
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">