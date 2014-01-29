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

                              <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.js')?>"></script>
                            <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.validate.js') ?>"></script>
	 <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>select/select2.js"></script>
	 <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>select/jquery-ui.js"></script> 
        <script type="text/javascript">
            function data_table(){
                var product=$('#product_id').val();
                var stage=$('#stage_id').val();
                var location=$('#location_id').val();
               if(product==""){
                    $("#product").select2('data', {id:0,text:'None' });
                    $('#product_id').val(0);       
                    product=0;
                }
                if(stage==""){
                    $("#stage").select2('data', {id:0,text:'None' });
                    $('#stage_id').val(0);              
                    stage=0;
                    
                }
                if(location==""){
                    $("#location").select2('data', {id:0,text:'None' });
                    $('#location_id').val(0);
                    location=0;
                }
                
               get_data_table(location,stage,product);
            }
            function clear_search(){
                    $("#product").select2('data', {id:0,text:'None' });
                    $('#product_id').val(0); 
                    $("#stage").select2('data', {id:0,text:'None' });
                    $('#stage_id').val(0);
                    $("#location").select2('data', {id:0,text:'None' });
                    $('#location_id').val(0);
                    data_table();
            }
           function get_data_table(location,stage,product){
                  $('#dt_table_tools').dataTable({
                                      "bServerSide": true,
				      "bDestroy": true,
                                      "bProcessing": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/stock_level/data_table/"+location+"/"+stage+'/'+product,
                                       aoColumns: [  
                                    
         { "bVisible": false} , 
        
        null,  null,  null,  null,  null,null,null, null, null

 							

 							

 						]
		                         } );
                 
            }
            
            
	$(document).ready(function() {
                                
                 clear_search();
                                   
                                   // inventory stage
                                     
        $('#stage').change(function() {
                   var guid = $('#stage').select2('data').text;
                $('#stage_id').val(guid);
              data_table();
          });
      $('#stage').select2({
                placeholder: "Search Location",
                ajax: {
                     url: '<?php echo base_url('index.php/stock_level/get_stage_details') ?>',
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
                                   // ware hosuse
                                     
        $('#location').change(function() {
                   var guid = $('#location').select2('data').id;
                $('#location_id').val(guid);
                data_table();
               
          });
      $('#location').select2({
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
                     // products
           $('#product').change(function() {
                   var guid = $('#product').select2('data').id;
                $('#product_id').val(guid);
                data_table();
               
          });
          function format_grain(sup) {
            if (!sup.id) return sup.text; // optgroup        
          return  sup.text+" "+sup.gcode;
            }
      $('#product').select2({
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
                     
                     
                     
                     
		});
</script>	
</head>
<body class="sidebar_narrow boxed pattern_1">