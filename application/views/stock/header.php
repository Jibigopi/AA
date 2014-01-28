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
		function get_stock(stage){
		document.getElementById('stage').value=stage;
		document.getElementById('dis_stage').value=stage;
		document.getElementById('estage').value=stage;
		document.getElementById('edis_stage').value=stage;
				 $('#dt_table_tools').dataTable({
									 "bServerSide": true,
									"bDestroy": true,
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/stock/stock_data_table/"+stage,
                                       aoColumns: [  
                                    
         { "bVisible": false} , {	"sName": "ID",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function (oObj) {
                   							return "<input type=checkbox value='"+oObj.aData[9]+"' >";
								},
								
								
							},
        
        null, null, null, null, null, null,null, 

 							{	"sName": "ID1",
                   						"bSearchable": false,
                   						"bSortable": false,
                                                                
                   						"fnRender": function(oObj) {
                                                                
//                                                                        return '<a data-toggle="modal" href="#inventory_location" class="label label-warning" onclick=inventory_location("'+oObj.aData[9]+'");><i class="icon icon-folder-open"></i></a> \n\
//                                                                <a data-toggle="modal" href="#inventory_transfers" class="label label-success" onclick=inventory_transfers("'+oObj.aData[9]+'");><i class="icon icon-resize-small"></i></a>\n\
//                                                                <a data-toggle="modal" href="#inventory_withdrawals" class="label label-primary" onclick=inventory_withdrawals("'+oObj.aData[9]+'");><i class="icon icon-shopping-cart"></i></a>\n\
//                                                                <a data-toggle="modal" href="#receiving_notes" class="label label-warning" onclick=receiving_notes("'+oObj.aData[9]+'");><i class="icon icon-keyboard"></i></a>\n\
//                                                                <a data-toggle="modal"  href="#edit_stock" onclick=edit_stock("'+oObj.aData[9]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"\
//                                                                <a href=javascript:user_function('"+oObj.aData[9]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                 return '<div class="btn-group"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="icon icon-cog"></i>  <span class="caret"></span>   </button>   <ul class="dropdown-menu" >   \n\
                                                                <li><a data-toggle="modal"  href="#inventory_location" onclick=inventory_location("'+oObj.aData[9]+'");>Warehouse Details </a></li>  \n\
                                                                <li><a data-toggle="modal"  href="#inventory_transfers" onclick=inventory_transfers("'+oObj.aData[9]+'");>Inventory Transfers</a></li>  \n\
                                                                <li><a data-toggle="modal"  href="#inventory_withdrawals" onclick=inventory_withdrawals("'+oObj.aData[9]+'");>Inventory Withdrawals </a></li>  \n\
                                                                <li><a data-toggle="modal"  href="#receiving_notes" onclick=receiving_notes("'+oObj.aData[9]+'");>Receiving Notes</a></li>  \n\
                                                                <li><a data-toggle="modal"  href="#edit_stock" onclick=edit_stock("'+oObj.aData[9]+'");>Edit</a></li>  \n\
                                                                <li><a href=javascript:user_function("'+oObj.aData[9]+'");>Delete</a></li>   </ul>  </div>';
                                                                },
								
								
							},

 							

 						]
		                         } );
				}
	$(document).ready(function() {
        
        
        $('#parsley_reg #supplier_name').change(function() {
                   var guid = $('#parsley_reg #supplier_name').select2('data').id;
                $('#parsley_reg #supplier_id').val(guid);
          });
      $('#parsley_reg #supplier_name').select2({
                placeholder: "Search Supplier",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_supplier_details') ?>',
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
                          id: item.id,
                          text: item.name
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
        
        $('#parsley_reg #location').change(function() {
                   var guid = $('#parsley_reg #location').select2('data').id;
                $('#parsley_reg #location_name_add').val(guid);
               
          });
      $('#parsley_reg #location').select2({
                placeholder: "Search Location",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_location_details') ?>',
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
                          id: item.id,
                          text: item.name
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
        
        $('#parsley_reg #grain').change(function() {
                   var guid = $('#parsley_reg #grain').select2('data').id;
                   var gcode = $('#parsley_reg #grain').select2('data').gcode;
                   var sku = $('#parsley_reg #grain').select2('data').sku;
                $('#parsley_reg #grain_id').val(guid);
                $('#parsley_reg #invid_add').val(gcode);
                $('#parsley_reg #add_sku').val(sku);
                $('#parsley_reg #invid').val(gcode);
                $('#parsley_reg #sku').val(sku);
          });
          function format_grain(sup) {
            if (!sup.id) return sup.text; // optgroup
          //  return "<img class='flag' src='images/flags/" + state.id.toLowerCase() + ".png'/>" + state.text;
          return  sup.text+" "+sup.gcode;
            }
      $('#parsley_reg #grain').select2({
                formatResult: format_grain,
                formatSelection: format_grain,
                escapeMarkup: function(m) { return m; },
      
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
            
        $('#update_stock_form #location').change(function() {
                   var guid = $('#update_stock_form #location').select2('data').id;
                $('#update_stock_form #location_name_add').val(guid);
          });
      $('#update_stock_form #location').select2({
                placeholder: "Search Location",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_location_details') ?>',
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
                          id: item.id,
                          text: item.name
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
        
        $('#destination').change(function() {
                   var guid = $('#destination').select2('data').id;
                $('#destination_id').val(guid);
          });
      $('#destination').select2({
                placeholder: "Search Location",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_location_details') ?>',
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
                          id: item.id,
                          text: item.name
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
        
        $('#update_stock_form #grain').change(function() {
                   var guid = $('#update_stock_form #grain').select2('data').id;
                   var gcode = $('#update_stock_form #grain').select2('data').gcode;
                   var sku = $('#parsley_reg #grain').select2('data').sku;
                $('#update_stock_form #grain_id').val(guid);
                $('#update_stock_form #invid_add').val(gcode);
                $('#update_stock_form #add_sku').val(sku);
          });
          function format_update_grain(sup) {
            if (!sup.id) return sup.text; // optgroup
          //  return "<img class='flag' src='images/flags/" + state.id.toLowerCase() + ".png'/>" + state.text;
          return  sup.text+" "+sup.gcode;
            }
      $('#update_stock_form #grain').select2({
                formatResult: format_update_grain,
                formatSelection: format_update_grain,
                escapeMarkup: function(m) { return m; },
      
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
        
        $("#parsley_reg1").validate(); 
        
       
        $('#update_stock_form #supplier_name').change(function() {
                   var guid = $('#update_stock_form #supplier_name').select2('data').id;
                $('#update_stock_form #supplier_id').val(guid);
          });
      $('#update_stock_form #supplier_name').select2({
                placeholder: "Search Supplier",
                ajax: {
                     url: '<?php echo base_url('index.php/stock/get_supplier_details') ?>',
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
                          id: item.id,
                          text: item.name
                        });
                      });
                      return {
                          results: results
                      };
                    }
                }
            });
      
 
   
       
        
       
                  
        
        console.log();
          parsley_reg.onsubmit=function()
            { 
              return false;
            }
          update_stock_form.onsubmit=function()
            { 
              return false;
            }        
          receiving_note_form.onsubmit=function()
            { 
              return false;
            }        
          inventory_withdrawals_form.onsubmit=function()
            { 
              return false;
            }        
          inventory_transfers_form.onsubmit=function()
            { 
              return false;
            }        
          inventory_location_form.onsubmit=function()
            { 
              return false;
            }        
			$("#add_new_stock").click(function() {
                            var inputs = $('#parsley_reg').serialize();
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/stock/add_new_stock')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Inventory Added');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('stock_close').click(); 
                                                     
                                                      $("#parsley_reg").trigger('reset');
                                                      $("#parsley_reg #invid").val('');
                                                      $("#parsley_reg #batch_id").val('');
                                                      $("#parsley_reg #pallet").val('');
                                                      $("#parsley_reg #sku").val('');
                                                      $("#parsley_reg #price").val('');
                                                      $("#parsley_reg").trigger('reset');
                                                      $("#parsley_reg").trigger('reset');
                                                      $("#parsley_reg").trigger('reset');
                                        }   
                                         if(response['responseText']=='alredy'){
                                              bootbox.alert('This Inventory is alredy Added'); 
                                         }
                                        
					}
				  });
				});            
			$("#add_receiving_note").click(function() {
                            var inputs = $('#receiving_note_form').serialize();				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/stock/receiving_note')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Receiving Note Added');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('receiving_notes_close').click(); 
                                                     $("#receiving_note_form").trigger('reset');
                                        } 
					}
				  });
				});            
			$("#add_inventory_withdrawals").click(function() {
                            var inputs = $('#inventory_withdrawals_form').serialize();				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/stock/inventory_withdrawals')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Inventory Withdrawals Added');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('get_inventory_withdrawals_close').click(); 
                                                     $("#inventory_withdrawals_form").trigger('reset');
                                        } 
					}
				  });
				});            
			$("#add_inventory_transfers").click(function() {
                            var inputs = $('#inventory_transfers_form').serialize();				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/stock/inventory_transfers')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Inventory Transfer Successfully');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('inventory_transfers_close').click(); 
                                                     $("#inventory_transfers_form").trigger('reset');
                                        } 
					}
				  });
				});            
			$("#add_inventory_location").click(function() {
                            var inputs = $('#inventory_location_form').serialize();				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/stock/inventory_location')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Inventory Loaction Updated');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('inventory_location_close').click(); 
                                                     $("#inventory_location_form").trigger('reset');
                                        } 
					}
				  });
				});            
			$("#update_stock").click(function() {
			 if($('#update_stock_form').valid()){
                            
                             var inputs =$('#update_stock_form').serialize();
                        
				 
				  $.ajax ({
					url: "<?php echo base_url('index.php/stock/update_stock')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {                                    
                                        if(response['responseText']=='TRUE'){
                                                    bootbox.alert('Stock Updated');   
                                                  $("#dt_table_tools").dataTable().fnDraw();
                                                      document.getElementById('update_close').click();                                      
                                        }else{
                                              bootbox.alert('Please Enter All Details');   
                                              var guid=$('#edit_id').val();
                                              edit_stock(guid);
                                        }
					}
				  });}else{
                                    bootbox.alert('Please Enter All Details'); 
                                  }
				});   
	    var stage1=document.getElementById('deafault_stage').value;
            get_stock(stage1);  
	    $("#dt_table_tools").dataTable().fnDraw();
            $('input.typeahead-devs').typeahead({
					name: 'country',
					remote : '<?php echo base_url() ?>index.php/stock/stock_grains/%QUERY'
			});
            $('input.destination').typeahead({
					name: 'destination',
					remote : '<?php echo base_url() ?>index.php/stock/location_destination/%QUERY'
			});
   
		
            $('input.typeahead-location').typeahead({
					name: 'destination',
					remote : '<?php echo base_url() ?>index.php/stock/location_destination/%QUERY'
			});
            $('input.typeahead-supplier').typeahead({
					name: 'supplier',
					remote : '<?php echo base_url() ?>index.php/stock/suppliers/%QUERY'
			});
   
		});
        function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Inventory", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/stock/delete_stock',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Stock Deleted');
							$("#dt_table_tools").dataTable().fnDraw();
						}
					}
				});
                    }
                 });                       
		}                
    function edit_stock(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/stock/edit_stock/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {
                                $('#edit_stock #edit_id').val(data[0]['guid']);
                                $('#edit_stock #invid_add').val(data[1]['gcode']);
                                $('#edit_stock #add_sku').val(data[1]['sku']);
                                $('#edit_stock #stock_id').val(data[0]['stock_id']);                          
                                $('#edit_stock #stock_id_o').val(data[0]['stock_id']);                          
                               // $('#edit_stock #location').val(data[2]['name']);
                                $('#edit_stock #grain_id').val(data[0]['grain_id']);
                                $('#edit_stock #location_name_add').val(data[2]['id']);
                               // $('#edit_stock #supplier_name').val(data[3]['name']);
                                $('#edit_stock #supplier_id').val(data[0]['supplier']);
                                
                               // $('#edit_stock #grain').val(data[1]['name']);                               
                                $('#edit_stock #case_label').val(data[0]['case_label']);
                                $('#edit_stock #add_pallet').val(data[0]['pallet_number']);
                                
                                $('#edit_stock #best_buy_date').val(data[0]['best_buy_date']);
                                
                                $('#edit_stock #no_of_unit').val(data[0]['no_of_unit']);
                                $('#edit_stock #unit_purchase_price').val(data[0]['unit_purchase_price']);
                                $('#edit_stock #unit_sales_price').val(data[0]['unit_sales_price']);
                                $('#edit_stock #amount_for_unit_o').val(data[0]['amount_for_unit']);
                                $('#edit_stock #amount_for_unit').val(data[0]['amount_for_unit']);
                                
                                $('#edit_stock #no_boxes').val(data[0]['no_case']);
                                $('#edit_stock #case_purchase_price').val(data[0]['case_purchase_price']);
                                $('#edit_stock #case_price').val(data[0]['case_sales_price']);
                                $('#edit_stock #amount_for_case_o').val(data[0]['amount_for_case']);
                                $('#edit_stock #amount_for_case').val(data[0]['amount_for_case']);
                                
                                $('#edit_stock #no_of_unit_each_case').val(data[0]['no_of_unit_each_case']);
                                $('#edit_stock #no_of_case_each_pallet').val(data[0]['no_of_case_each_pallet']);
                                
                                $('#edit_stock #no_of_pallet').val(data[0]['no_pallet']);
                                $('#edit_stock #pallet_purchase_price').val(data[0]['pallet_purchase_price']);
                                $('#edit_stock #pallet_sales_price').val(data[0]['pallet_sales_price']);
                                $('#edit_stock #amount_for_pallet_o').val(data[0]['amount_for_pallet']);
                                $('#edit_stock #amount_for_pallet').val(data[0]['amount_for_pallet']);
                                 
                                
                                    
                                $("#update_stock_form #supplier_name").select2('data', {id:data[0]['supplier'],text: data[3]['name']});
                                $('#update_stock_form #supplier_id').val(data[0]['supplier']);
                              
                               
                                $("#update_stock_form #grain").select2('data', {id:data[1]['guid'],text: data[1]['name'],sku:data[1]['sku'],gcode:data[1]['gcode']});
                                $('#update_stock_form #grain_id').val(data[1]['guid']);
                              
                              
                                $("#update_stock_form #location").select2('data', {id:data[2]['id'],text: data[2]['name']});
                                $('#update_stock_form #location_name_add').val(data[2]['id']);
                              
                              
                               
			  } 
			});
    }   
    function receiving_notes(sid){
       $("#receiving_note_form").trigger('reset');
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/stock/get_receiving_notes/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)     
			  {
                              
                                $('#receiving_notes #item_no').val(data[1]['gcode']);
                                $('#receiving_notes #product').val(data[1]['cat_name']);
                                $('#receiving_notes #supplier').val(data[0]['supplier']);
                                $('#receiving_notes #stock_guid').val(data[0]['guid']);
                                $('#receiving_notes #stock_id').val(data[0]['stock_id']);                                   
                                $('#receiving_notes #delivery_date').val(data[2]['delivery_date']);                               
                                $('#receiving_notes #delivery_status').val(data[2]['delivery_status']);                               
                                $('#receiving_notes #received_by').val(data[2]['received_by']);                               
                                $('#receiving_notes #received_date').val(data[2]['receiving_date']);                               
                                $('#receiving_notes #invoice_no').val(data[2]['invoice_no']);                               
                                $('#receiving_notes #invoice_status').val(data[2]['invoice_status']);                               
                                $('#receiving_notes #accounts').val(data[2]['accounts']);                                    
			  } 
			});
    }
    function inventory_withdrawals(sid){
                        $("#inventory_withdrawals_form").trigger('reset');
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/stock/get_inventory_withdrawals/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)     
			  {
                                $('#inventory_withdrawals #sku').val(data[1]['gcode']);
                                $('#inventory_withdrawals #grain_id').val(data[1]['gcode']);
                                $('#inventory_withdrawals #stock_guid').val(data[0]['guid']);
                                $('#inventory_withdrawals #stock_id').val(data[0]['stock_id']);                                   
                                $('#inventory_withdrawals #storage_location').val(data[3]['name']);                                   
                                $('#inventory_withdrawals #cost').val(data[0]['total']);                                   
                                $('#inventory_withdrawals #label').val(data[0]['case_label']);                                   
                                $('#inventory_withdrawals #label_add').val(data[0]['case_label']);                                   
                                $('#inventory_withdrawals #delivery_date').val(data[2]['delivery_date']);                               
                                $('#inventory_withdrawals #delivery_status').val(data[2]['delivery_status']);                               
                                $('#inventory_withdrawals #received_by').val(data[2]['received_by']);                               
                                $('#inventory_withdrawals #received_date').val(data[2]['receiving_date']);                               
                                $('#inventory_withdrawals #invoice_no').val(data[2]['invoice_no']);                               
                                $('#inventory_withdrawals #invoice_status').val(data[2]['invoice_status']);                               
                                $('#inventory_withdrawals #accounts').val(data[2]['accounts']);                                    
			  } 
			});
    }
    function inventory_transfers(sid){
                        $("#inventory_withdrawals_form").trigger('reset');
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/stock/get_inventory_transfers/"+sid,                      
			  data: "",     						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                                $('#inventory_transfers #sku').val(data[1]['sku']);
                                $('#inventory_transfers #product').val(data[1]['gcode']);
                                $('#inventory_transfers #stock_guid').val(data[0]['guid']);
                                $('#inventory_transfers #stock_id').val(data[0]['stock_id']);                                      
                            //    $('#inventory_transfers #unit').val(data[0]['used_sqr_ft']);                                      
                                $('#inventory_transfers #orign_storage').val(data[2]['name']);    
                          
			  } 
			});
    }
    function inventory_location(sid){
                        $("#inventory_location_form").trigger('reset');
                        $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/stock/get_loction/"+sid,                      
			  data: "",     						 
			  dataType: 'json',               
			  success: function(data)     
			  {
                                
                                $('#inventory_location #stock_guid').val(data[0]['guid']);
                                $('#inventory_location #stock_id').val(data[0]['stock_id']);                                      
                                $('#inventory_location #used').val(data[0]['used_sqr_ft']);                                      
                                $('#inventory_location #transport').val(data[0]['transport']);                                      
                                $('#inventory_location #temperature').val(data[0]['temp']);                                      
                                $('#inventory_location #location').val(data[2]['name']);                                      
                                $('#inventory_location #sqt').val(data[2]['avilable']);                                      
                                $('#inventory_location #price').val(data[2]['price']);                                      
                                $('#inventory_location #email').val(data[2]['email']);                                      
                                $('#inventory_location #phone').val(data[2]['phone']);                                      
                                $('#inventory_location #contact').val(data[2]['contact']);                                      
			  } 
			});
    }
    function total_amount(){
    
    var price=$('#newMail #unit_purchase_price').val();
    var no=$('#newMail #no_of_unit').val();
     if (!isNaN(no) && !isNaN(price)){
         $('#newMail #amount_for_unit').val(price*no);
         $('#newMail #amount_for_unit_o').val(price*no);
 
     }else{
         $('#newMail #amount_for_unit').val();
         $('#newMail #amount_for_unit_o').val();
     }
    }
    function total_for_case(){
    
    var price=$('#newMail #case_purchase_price').val();
    var no=$('#newMail #no_boxes').val();
     if (!isNaN(no) && !isNaN(price)){
         $('#newMail #amount_for_case').val(price*no);
         $('#newMail #amount_for_case_o').val(price*no);
 
     }else{
         $('#newMail #amount_for_case').val();
         $('#newMail #amount_for_case_o').val();
     }
    }
    function total_for_pallet(){
    
    var price=$('#newMail #pallet_purchase_price').val();
    var no=$('#newMail #no_of_pallet').val();
     if (!isNaN(no) && !isNaN(price)){
         $('#newMail #amount_for_pallet').val(price*no);
         $('#newMail #amount_for_pallet_o').val(price*no);
 
     }else{
         $('#newMail #amount_for_pallet').val();
         $('#newMail #amount_for_pallet_o').val();
     }
    }
    function edit_total_amount(){
    
    var price=$('#update_stock_form #unit_purchase_price').val();
    var no=$('#update_stock_form #no_of_unit').val();
     if (!isNaN(no) && !isNaN(price)){
         $('#update_stock_form #amount_for_unit').val(price*no);
         $('#update_stock_form #amount_for_unit_o').val(price*no);
 
     }else{
         $('#update_stock_form #amount_for_unit').val();
         $('#update_stock_form #amount_for_unit_o').val();
     }
    }
    function edit_total_for_case(){
    
    var price=$('#update_stock_form #case_purchase_price').val();
    var no=$('#update_stock_form #no_boxes').val();
     if (!isNaN(no) && !isNaN(price)){
         $('#update_stock_form #amount_for_case').val(price*no);
         $('#update_stock_form #amount_for_case_o').val(price*no);
 
     }else{
         $('#update_stock_form #amount_for_case').val();
         $('#update_stock_form #amount_for_case_o').val();
     }
    }
    function edit_total_for_pallet(){
    
    var price=$('#update_stock_form #pallet_purchase_price').val();
    var no=$('#update_stock_form #no_of_pallet').val();
     if (!isNaN(no) && !isNaN(price)){
         $('#update_stock_form #amount_for_pallet').val(price*no);
         $('#update_stock_form #amount_for_pallet_o').val(price*no);
 
     }else{
         $('#update_stock_form #amount_for_pallet').val();
         $('#update_stock_form #amount_for_pallet_o').val();
     }
    }
    function total_amount_for_update(){
    
    var price=$('#edit_stock #purchase_price').val();
    var no=$('#edit_stock #stock').val();
     if (!isNaN(no)){
    $('#edit_stock #purchase_total_amount').val(price*no);
    $('#edit_stock #stock_total').val(price*no);
     }else{
         $('#edit_stock #purchase_total_amount').val();
         $('#edit_stock #stock_total').val();
     }
    }
    
    function Sales_order_number(){
      $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/stock/generate_order_number/",                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {          
                             $('#parsley_reg #stock_id').val(data);
                             $('#parsley_reg #stock_id_o').val(data);
                          }});
}
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">