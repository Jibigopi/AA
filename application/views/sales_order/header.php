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
        <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>select/select2.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>select/jquery-ui.js"></script> 
                    
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
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/sales_order/data_table",
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
                                                               
                                                                       // return '<a href=javascript:posnic_active("'+oObj.aData[0]+'") ><span data-toggle="tooltip" class="label label-success hint--top hint--success" data-hint=""><i class="icon-play"></i></span></a>&nbsp<a data-toggle="modal"  href="#edit_sales_order" onclick=edit_sales_order("'+oObj.aData[0]+'");  ><span data-toggle="tooltip" class="label label-info hint--top hint--info" data-hint="EDIT"><i class="icon-edit"></i></span></a>'+"&nbsp;<a href=javascript:user_function('"+oObj.aData[0]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                        return '<div class="btn-group"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="icon icon-cog"></i>  <span class="caret"></span>   </button>   <ul class="dropdown-menu" >  <li><a href="#" onclick=approve_order("'+oObj.aData[11]+'");>Approve</a></li>  <li ><a data-toggle="modal"  href="#edit_sales_order" onclick=edit_sales_order("'+oObj.aData[11]+'");>Edit</a></li>     <li><a href=javascript:user_function("'+oObj.aData[11]+'");>Delete</a></li>   </ul>  </div>';
                                                                
                                                                },
								
								
							},

 							

 						]
		                         } );
                                   
			
		$("#add_sales_order").click(function() {
			 inputs = $('#parsley_reg').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/sales_order/add')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                    console.log(response['responseText']);
                                            if(response['responseText']=='TRUE'){
                                                     bootbox.alert('New Sales Order Added ');
                                                    document.getElementById('add_order_close').click();
                                                        $("#parsley_reg").trigger('reset');                                        
                                                        $("#dt_table_tools").dataTable().fnDraw();
                                            }
					}
				  });
                                  });            
			$("#update_sales_order").click(function() {
			inputs = $('#parsley_ext').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/sales_order/update')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                    console.log(response['responseText']);
                                            if(response['responseText']=='TRUE'){
                                               bootbox.alert('Stage Updated ');
                                              $("#dt_table_tools").dataTable().fnDraw();
                                                document.getElementById('update_order_close').click();                                      
                                            }
					}
				  });
				});   
	    
	    $("#dt_table_tools").dataTable().fnDraw();
            $('input.typeahead-devs').typeahead({
					name: 'country',
					remote : '<?php echo base_url() ?>index.php/stock/stock_grains/%QUERY'
			});
             $('input.customer').typeahead({
					name: 'customer',
					remote : '<?php echo base_url() ?>index.php/sale/get_customer/%QUERY'
            });            
                        
           $('input.product').typeahead({
					name: 'product',
					remote : '<?php echo base_url() ?>index.php/sale/grains/%QUERY'
            });                 
                 $("#parsley_reg #customer").blur(function()
			{                            
                        var guid=$('#parsley_reg #customer').val();
                        $.ajax({                                      
                        url: "<?php echo base_url('index.php/sales_order/customer') ?>",                      
                        data:{
                            guid: guid
                        },	
                        type:'POST',
                        dataType: 'json',               
                        success: function(data)        
                          {
  $('#parsley_reg #customer_id').val(data[0][0]['guid'])
                      } 
                    });       
   
		});
                
                
                 $('#parsley_reg #product').change(function() {
                   var guid = $('#parsley_reg #product').select2('data').text;
                  
                        $.ajax({                                      
                        url: "<?php echo base_url('index.php/sales_order/get_grain_details') ?>",                      
                        data:{
                            guid: guid
                        },	
                        type:'POST',
                        dataType: 'json',               
                        success: function(data)        
                          {
                          $('#parsley_reg #h_price').val(data[0][0]['sales_price']);
                          $('#parsley_reg #price').val(data[0][0]['sales_price']);
                          $('#parsley_reg #product_id').val(data[0][0]['guid']);
                          
                   if(data[0]['stock']==='TRUE'){
                          $('#parsley_reg #unit_price').val(data[0][1]['unit_price']);
                          $('#parsley_reg #unit_price_o').val(data[0][1]['unit_price']);
                          $('#parsley_reg #unit_stock').val(data[0][1]['unit']);
                          
                          $('#parsley_reg #case_price').val(data[0][1]['case_price']);
                          $('#parsley_reg #case_price_o').val(data[0][1]['case_price']);
                          $('#parsley_reg #case_stock').val(data[0][1]['case']);
                          
                          $('#parsley_reg #pallet_price').val(data[0][1]['pallet_price']);
                          $('#parsley_reg #pallet_price_o').val(data[0][1]['pallet_price']);
                          $('#parsley_reg #pallet_stock').val(data[0][1]['pallet']);
                          }else{
                          $('#parsley_reg #unit_stock').val('');
                       
                          $('#parsley_reg #case_stock').val('');
                          
                          $('#parsley_reg #pallet_stock').val('');
                          
                          
                                  $('#parsley_reg #unit_price').val('');
                                  $('#parsley_reg #unit_price_o').val('');
                                  $('#parsley_reg #no_of_unit').val('');
                                  $('#parsley_reg #total_price_for_unit').val('');
                                  $('#parsley_reg #total_price_for_unit_o').val('');
                                 
                                  $('#parsley_reg #case_price').val('');
                                  $('#parsley_reg #case_price_o').val('');
                                  $('#parsley_reg #no_of_case').val('');
                                  $('#parsley_reg #total_price_for_case').val('');
                                  $('#parsley_reg #total_price_for_case_o').val('');
                                  
                                  $('#parsley_reg #pallet_price').val('');
                                  $('#parsley_reg #pallet_price_o').val('');
                                  $('#parsley_reg #no_of_pallet').val('');
                                  $('#parsley_reg #total_price_for_pallet').val('');
                                  $('#parsley_reg #total_price_for_pallet_o').val('');
                                  
                                  $('#parsley_reg #total_price_o').val('');
                                  $('#parsley_reg #total_price').val('');
                                  $('#parsley_reg #grand_total').val('');
                                  $('#parsley_reg #grand_total_o').val('');
                          
                               bootbox.alert('This Product Out Stock');
                          }
                          
                        
                      } 
                    });   
          });
        
      $('#parsley_reg #product').select2({
      
                placeholder: "Search Product",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_grains_details') ?>',
                     data: function(term, page) {
                            return {types: ["exercise"],
                                limit: -1,
                                term: term
                            };
                     },
                    type:'POST',
                    dataType: 'json',
                    quietMillis: 100,
                    data: function (term) {
                        return {
                            term: term
                        };
                    },
                    results: function (data) {
                      var results = [];
                      $.each(data, function(index, item){
                        results.push({
                          id: item.guid,
                          text: item.name,
                          sku: item.sku,
                          gcode: item.gcode
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });  
              
               $('#parsley_reg #customer').change(function() {
                   var guid = $('#parsley_reg #customer').select2('data').id;
                   var address = $('#parsley_reg #customer').select2('data').address;
                $('#parsley_reg #customer_id').val(guid);
                $('#parsley_reg #address').val(address);
          });
      $('#parsley_reg #customer').select2({
                placeholder: "Search Customer",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_customer_details') ?>',
                     data: function(term, page) {
                            return {types: ["exercise"],
                                limit: -1,
                                term: term
                            };
                     },
                    type:'POST',
                    dataType: 'json',
                    quietMillis: 100,
                    data: function (term) {
                        return {
                            term: term
                        };
                    },
                    results: function (data) {
                      var results = [];
                      $.each(data, function(index, item){
                        results.push({
                          id: item.guid,
                          text: item.name,
                          address: item.address
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
     $('#parsley_ext #customer').change(function() {
                   var guid = $('#parsley_ext #customer').select2('data').id;
                $('#parsley_ext #customer_id').val(guid);
          });
      $('#parsley_ext #customer').select2({
                placeholder: "Search Customer",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_customer_details') ?>',
                     data: function(term, page) {
                            return {types: ["exercise"],
                                limit: -1,
                                term: term
                            };
                     },
                    type:'POST',
                    dataType: 'json',
                    quietMillis: 100,
                    data: function (term) {
                        return {
                            term: term
                        };
                    },
                    results: function (data) {
                      var results = [];
                      $.each(data, function(index, item){
                        results.push({
                          id: item.guid,
                          text: item.name
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
            
                 $("#parsley_ext #product").blur(function()
			{                            
                            
   
		});
		
                  
                 $('#parsley_ext #product').change(function() {
                   var guid = $('#parsley_ext #product').select2('data').text;
                  
                        $.ajax({                                      
                        url: "<?php echo base_url('index.php/sales_order/get_grain_details') ?>",                      
                        data:{
                            guid: guid
                        },	
                        type:'POST',
                        dataType: 'json',               
                        success: function(data)        
                          {
                          $('#parsley_ext #h_price').val(data[0][0]['sales_price']);
                          $('#parsley_ext #price').val(data[0][0]['sales_price']);
                          $('#parsley_ext #product_id').val(data[0][0]['guid']);
                          console.log(data[0]['stock']);
                          if(data[0]['stock']==='TRUE'){
                          $('#parsley_ext #unit_price').val(data[0][1]['unit_price']);
                          $('#parsley_ext #unit_price_o').val(data[0][1]['unit_price']);
                          $('#parsley_ext #unit_stock').val(data[0][1]['unit']);
                          
                          $('#parsley_ext #case_price').val(data[0][1]['case_price']);
                          $('#parsley_ext #case_price_o').val(data[0][1]['case_price']);
                          $('#parsley_ext #case_stock').val(data[0][1]['case']);
                          
                          $('#parsley_ext #pallet_price').val(data[0][1]['pallet_price']);
                          $('#parsley_ext #pallet_price_o').val(data[0][1]['pallet_price']);
                          $('#parsley_ext #pallet_stock').val(data[0][1]['pallet']);
                          }else{
                          $('#parsley_ext #unit_stock').val('');
                       
                          $('#parsley_ext #case_stock').val('');
                          
                          $('#parsley_ext #pallet_stock').val('');
                          
                          
                                  $('#parsley_ext #unit_price').val('');
                                  $('#parsley_ext #unit_price_o').val('');
                                  $('#parsley_ext #no_of_unit').val('');
                                  $('#parsley_ext #total_price_for_unit').val('');
                                  $('#parsley_ext #total_price_for_unit_o').val('');
                                 
                                  $('#parsley_ext #case_price').val('');
                                  $('#parsley_ext #case_price_o').val('');
                                  $('#parsley_ext #no_of_case').val('');
                                  $('#parsley_ext #total_price_for_case').val('');
                                  $('#parsley_ext #total_price_for_case_o').val('');
                                  
                                  $('#parsley_ext #pallet_price').val('');
                                  $('#parsley_ext #pallet_price_o').val('');
                                  $('#parsley_ext #no_of_pallet').val('');
                                  $('#parsley_ext #total_price_for_pallet').val('');
                                  $('#parsley_ext #total_price_for_pallet_o').val('');
                                  
                                  $('#parsley_ext #total_price_o').val('');
                                  $('#parsley_ext #total_price').val('');
                                  $('#parsley_ext #grand_total').val('');
                                  $('#parsley_ext #grand_total_o').val('');
                          
                               bootbox.alert('This Product Out Stock');
                          }
                        
                      } 
                    });  
          });
          
                
                
                  $('#parsley_ext #product').select2({
      
                placeholder: "Search Product",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_grains_details') ?>',
                     data: function(term, page) {
                            return {types: ["exercise"],
                                limit: -1,
                                term: term
                            };
                     },
                    type:'POST',
                    dataType: 'json',
                    quietMillis: 100,
                    data: function (term) {
                        return {
                            term: term
                        };
                    },
                    results: function (data) {
                      var results = [];
                      $.each(data, function(index, item){
                        results.push({
                          id: item.guid,
                          text: item.name,
                          sku: item.sku,
                          gcode: item.gcode
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });  
            });
        function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Sales Order", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/sales_order/delete',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Order Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}
					}
				});
                    }
                 });                       
		}                
        function approve_order(guid){
             bootbox.confirm("Are you Sure To Approve This Order", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/sales_order/approve',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Order Approved');
							$("#dt_table_tools").dataTable().fnDraw();
                                                         window.open("<?php  echo base_url('index.php/invoice/sales_order_invoice')?>/"+guid);
						}
					}
				});
                    }
                 });     
                 
		}                
    function edit_sales_order(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/sales_order/edit_sales_order/"+sid,                      
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
                                  $('#parsley_ext #case_stock').val(data[3]['unit']);
                                  $('#parsley_ext #pallet_stock').val(data[3]['pallet']);
                                  
                                  
                                  
                                $("#parsley_ext #product").select2('data', {id:data[0]['product'],text: data[2]['name']});
                                $('#parsley_ext #product_id').val(data[0]['product']);
                                  
                                  
                                $("#parsley_ext #customer").select2('data', {id:data[0]['customer'],text: data[1]['name']});
                                $('#parsley_ext #customer_id').val(data[0]['customer']);
                              
                                 
			  } 
			});
    }   
function total_amount(){   
    var price=$('#parsley_reg #price').val();
    var no=$('#parsley_reg #no_of_unit').val();
    if (isNaN(no) || no==""){
         no='0';
     }
   
     if (!isNaN(no)){
    $('#parsley_reg #total').val(price*no);
    $('#parsley_reg #h_total').val(price*no);
 
     }else{
         $('#parsley_reg #total').val();
        
     }
}
function total_unit_amount(){
    var price=$('#parsley_reg #unit_price_o').val();
    var no=$('#parsley_reg #no_of_unit').val();
    var stock=$('#parsley_reg #unit_stock').val();
    if(price){
    if(no){
    if(parseFloat(no) <= parseFloat(stock) ){
     if (!isNaN(no) && !isNaN(price)){
         $('#parsley_reg #total_price_for_unit').val(price*no);
         $('#parsley_reg #total_price_for_unit_o').val(price*no);
         var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
         $('#parsley_reg #total_price').val(grand);
         $('#parsley_reg #total_price_o').val(grand); 
     }else{
          bootbox.alert('Please Enter The Quantity Correct Format');
          $('#parsley_reg #no_of_unit').val('');
          $('#parsley_reg #total_price_for_unit').val('');
          $('#parsley_reg #total_price_for_unit_o').val('');
          var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
          $('#parsley_reg #total_price').val(grand);
          $('#parsley_reg #total_price_o').val(grand);
     }
    } else{ bootbox.alert('Unit Is Out Of Stock');
         $('#parsley_reg #no_of_unit').val('');
         $('#parsley_reg #total_price_for_unit').val('');
         $('#parsley_reg #total_price_for_unit_o').val('');
         var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
         $('#parsley_reg #total_price').val(grand);
         $('#parsley_reg #total_price_o').val(grand);
    }
    }
    }
    grand_totals();
}
function total_case_amount(){
    var price=$('#parsley_reg #case_price_o').val();
    var no=$('#parsley_reg #no_of_case').val();
    var stock=$('#parsley_reg #case_stock').val();
    if(price){
    if(no){
    if(parseFloat(no) <= parseFloat(stock) ){
     if (!isNaN(no) && !isNaN(price)){
         $('#parsley_reg #total_price_for_case').val(price*no);
         $('#parsley_reg #total_price_for_case_o').val(price*no);
         var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
         $('#parsley_reg #total_price').val(grand);
         $('#parsley_reg #total_price_o').val(grand); 
     }else{
          bootbox.alert('Please Enter The Quantity Correct Format');
          $('#parsley_reg #no_of_case').val('');
          $('#parsley_reg #total_price_for_case').val('');
          $('#parsley_reg #total_price_for_case_o').val('');
          var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
         $('#parsley_reg #total_price').val(grand);
         $('#parsley_reg #total_price_o').val(grand);
     }
    } else{ bootbox.alert('Case Is Out Of Stock');
         $('#parsley_reg #no_of_case').val('');
         $('#parsley_reg #total_price_for_case').val('');
         $('#parsley_reg #total_price_for_case_o').val('');
         var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
         $('#parsley_reg #total_price').val(grand);
         $('#parsley_reg #total_price_o').val(grand);
    }
    }
    }
    grand_totals();
}
function total_pallet_amount(){
    var price=$('#parsley_reg #pallet_price_o').val();
    var no=$('#parsley_reg #no_of_pallet').val();
    var stock=$('#parsley_reg #pallet_stock').val();
    if(price){
    if(no){
    if(parseFloat(no) <= parseFloat(stock) ){
     if (!isNaN(no) && !isNaN(price)){
         $('#parsley_reg #total_price_for_pallet').val(price*no);
         $('#parsley_reg #total_price_for_pallet_o').val(price*no);
         var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
          $('#parsley_reg #total_price').val(grand);
         $('#parsley_reg #total_price_o').val(grand);
     }else{
          bootbox.alert('Please Enter The Quantity Correct Format');
          $('#parsley_reg #no_of_pallet').val('');
          $('#parsley_reg #total_price_for_pallet').val('');
          $('#parsley_reg #total_price_for_pallet_o').val('');
          var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
         $('#parsley_reg #total_price').val(grand);
         $('#parsley_reg #total_price_o').val(grand);
        
     }
    } else{ bootbox.alert('Case Is Out Of Stock');
         $('#parsley_reg #no_of_pallet').val('');
         $('#parsley_reg #total_price_for_pallet').val('');
         $('#parsley_reg #total_price_for_pallet_o').val('');
         var grand= +$('#parsley_reg #total_price_for_unit_o').val()+ +$('#parsley_reg #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
         $('#parsley_reg #total_price').val(grand);
         $('#parsley_reg #total_price_o').val(grand);
        
    }
    }
    }
    grand_totals();
}
function update_total_unit_amount(){
    var price=$('#parsley_ext #unit_price_o').val();
    var no=$('#parsley_ext #no_of_unit').val();
    var stock=$('#parsley_ext #unit_stock').val();
    if(price){
    if(no){
    if(parseFloat(no) <= parseFloat(stock) ){
     if (!isNaN(no) && !isNaN(price)){
         $('#parsley_ext #total_price_for_unit').val(price*no);
         $('#parsley_ext #total_price_for_unit_o').val(price*no);
         var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_ext #total_price_for_pallet_o').val();
         $('#parsley_ext #total_price').val(grand);
         $('#parsley_ext #total_price_o').val(grand); 
     }else{
          bootbox.alert('Please Enter The Quantity Correct Format');
          $('#parsley_ext #no_of_unit').val('');
          $('#parsley_ext #total_price_for_unit').val('');
          $('#parsley_ext #total_price_for_unit_o').val('');
          var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_ext #total_price_for_pallet_o').val();
          $('#parsley_ext #total_price').val(grand);
          $('#parsley_ext #total_price_o').val(grand);
     }
    } else{ bootbox.alert('Unit Is Out Of Stock');
         $('#parsley_ext #no_of_unit').val('');
         $('#parsley_ext #total_price_for_unit').val('');
         $('#parsley_ext #total_price_for_unit_o').val('');
         var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_ext #total_price_for_pallet_o').val();
         $('#parsley_ext #total_price').val(grand);
         $('#parsley_ext #total_price_o').val(grand);
    }
    }
    }
    update_grand_totals();
}
function update_total_case_amount(){
    var price=$('#parsley_ext #case_price_o').val();
    var no=$('#parsley_ext #no_of_case').val();
    var stock=$('#parsley_ext #case_stock').val();
    if(price){
    if(no){
    if(parseFloat(no) <= parseFloat(stock) ){
     if (!isNaN(no) && !isNaN(price)){
         $('#parsley_ext #total_price_for_case').val(price*no);
         $('#parsley_ext #total_price_for_case_o').val(price*no);
         var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_ext #total_price_for_pallet_o').val();
         $('#parsley_ext #total_price').val(grand);
         $('#parsley_ext #total_price_o').val(grand); 
     }else{
          bootbox.alert('Please Enter The Quantity Correct Format');
          $('#parsley_ext #no_of_case').val('');
          $('#parsley_ext #total_price_for_case').val('');
          $('#parsley_ext #total_price_for_case_o').val('');
          var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_ext #total_price_for_pallet_o').val();
         $('#parsley_ext #total_price').val(grand);
         $('#parsley_ext #total_price_o').val(grand);
     }
    } else{ bootbox.alert('Case Is Out Of Stock');
         $('#parsley_ext #no_of_case').val('');
         $('#parsley_ext #total_price_for_case').val('');
         $('#parsley_ext #total_price_for_case_o').val('');
         var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_reg #total_price_for_pallet_o').val();
         $('#parsley_ext #total_price').val(grand);
         $('#parsley_ext #total_price_o').val(grand);
    }
    }
    }
    update_grand_totals();
}
function update_total_pallet_amount(){
    var price=$('#parsley_ext #pallet_price_o').val();
    var no=$('#parsley_ext #no_of_pallet').val();
    var stock=$('#parsley_ext #pallet_stock').val();
    if(price){
    if(no){
    if(parseFloat(no) <= parseFloat(stock) ){
     if (!isNaN(no) && !isNaN(price)){
         $('#parsley_ext #total_price_for_pallet').val(price*no);
         $('#parsley_ext #total_price_for_pallet_o').val(price*no);
         var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_ext #total_price_for_pallet_o').val();
          $('#parsley_ext #total_price').val(grand);
         $('#parsley_ext #total_price_o').val(grand);
     }else{
          bootbox.alert('Please Enter The Quantity Correct Format');
          $('#parsley_ext #no_of_pallet').val('');
          $('#parsley_ext #total_price_for_pallet').val('');
          $('#parsley_ext #total_price_for_pallet_o').val('');
          var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_ext #total_price_for_pallet_o').val();
         $('#parsley_ext #total_price').val(grand);
         $('#parsley_ext #total_price_o').val(grand);
        
     }
    } else{ bootbox.alert('Case Is Out Of Stock');
         $('#parsley_ext #no_of_pallet').val('');
         $('#parsley_ext #total_price_for_pallet').val('');
         $('#parsley_ext #total_price_for_pallet_o').val('');
         var grand= +$('#parsley_ext #total_price_for_unit_o').val()+ +$('#parsley_ext #total_price_for_case_o').val()+ +$('#parsley_ext #total_price_for_pallet_o').val();
         $('#parsley_ext #total_price').val(grand);
         $('#parsley_ext #total_price_o').val(grand);
        
    }
    }
    }
    grand_totals();
}

function update_total_amount(){   
    var price=$('#parsley_ext #price').val();
    var no=$('#parsley_ext #no_of_unit').val();
    if (isNaN(no) || no==""){
         no='0';
     }
   
     if (!isNaN(no)){
    $('#parsley_ext #total').val(price*no);
    $('#parsley_ext #h_total').val(price*no);
 
     }else{
         $('#parsley_ext #total').val();
        
     }
}
function grand_totals(){
    var price=$('#parsley_reg #total_price').val();
    var tax=$('#parsley_reg #tax').val();
    var dis=$('#parsley_reg #discount').val();
    if(price){
        if(!isNaN(tax)){
            if(!isNaN(dis)){
                var grand= +price+ -dis+ +tax;
                $('#parsley_reg #grand_total').val(grand);
                $('#parsley_reg #grand_total_o').val(grand);
            }else{
                  var grand= +price+ -dis;
                $('#parsley_reg #grand_total').val(grand);
                $('#parsley_reg #grand_total_o').val(grand);
                   $('#parsley_reg #discount').val('');
                   bootbox.alert('Please Enter The Discount In Correct Format');
            }
        }else{
               $('#parsley_reg #tax').val('');
               bootbox.alert('Please Enter The Tax In Correct Format');
        }
    }
    
}
function update_grand_totals(){
    var price=$('#parsley_reg #total_price').val();
    var tax=$('#parsley_reg #tax').val();
    var dis=$('#parsley_reg #discount').val();
    if(price){
        if(!isNaN(tax)){
            if(!isNaN(dis)){
                var grand= +price+ -dis+ +tax;
                $('#parsley_reg #grand_total').val(grand);
                $('#parsley_reg #grand_total_o').val(grand);
            }else{
                  var grand= +price+ -dis;
                $('#parsley_reg #grand_total').val(grand);
                $('#parsley_reg #grand_total_o').val(grand);
                   $('#parsley_reg #discount').val('');
                   bootbox.alert('Please Enter The Discount In Correct Format');
            }
        }else{
               $('#parsley_reg #tax').val('');
               bootbox.alert('Please Enter The Tax In Correct Format');
        }
    }
    
}
function Sales_order_number(){
      $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/sales_order/generate_order_number/",                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {          
                             $('#parsley_reg #sales_order').val(data);
                             $('#parsley_reg #sales_order_o').val(data);
                          }});
}
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">