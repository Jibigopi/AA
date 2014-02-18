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
                <link rel="stylesheet" href="<?php echo base_url() ?>admin/img/flags/flags.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/retina.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/bootstrap-switch/stylesheets/bootstrap-switch.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/bootstrap-switch/stylesheets/ebro_bootstrapSwitch.css">	
                <link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/datepicker/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/fullcalendar/fullcalendar.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/linecons/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/theme/color_1.css" id="theme">
		<link  rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/dataTables/media/DT_bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/css/TableTools.css">
	
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/multi-select/css/multi-select.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/multi-select/css/ebro_multi-select.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/select2/select2.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/js/lib/select2/ebro_select2.css">
                
                <!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo base_url() ?>admin/css/ie.css">
		<script src="<?php echo base_url() ?>admin/js/ie/html5shiv.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ie/respond.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ie/excanvas.min.js"></script>
	<![endif]-->

	<!-- custom fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
        <script src="<?php echo base_url() ?>admin/data_table/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>admin/data_table/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo base_url() ?>admin/data_table/js/DT_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>admin/js/typeahead.js"></script> 
        
        <script type="text/javascript" src="<?php echo base_url('upload_image/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('upload_image/jquery.form.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('admin/val/jquery.validate.js') ?>"></script>
        <script>
	$(document).ready(function() {
       
                 
                   
               
		});
                function user_function(guid){
                     bootbox.confirm("Are you Sure To Delete This Product", function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>index.php/product_details/product_detailss_delete',
                type: "POST",
                data: {
                    guid: guid
                    
                },
                success: function(response)
                {
                    if(response){
                       bootbox.alert("Product Deleted");
                        $("#dt_table_tools").dataTable().fnDraw();
                    }}
            });
        }

                        
    });
                }
                
                   
           

	</script>	
	</head>
	<body class="sidebar_narrow boxed pattern_1">