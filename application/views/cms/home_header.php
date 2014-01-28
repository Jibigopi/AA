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
	<script type="text/javascript" src="<?php echo base_url(); ?>/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
tinymce.init({
    selector: "textarea",theme: "modern",width:800,height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager",
         "code",

   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
relative_urls:false,
   external_filemanager_path:"<?php echo base_url(); ?>filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "<?php echo base_url(); ?>/filemanager/plugin.min.js"}
 });
</script>
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
             $('#dt_table_tools').dataTable({
                                      "bProcessing": true,
				      "bServerSide": true,
                                      "sAjaxSource": "<?php echo base_url() ?>index.php/cms/data_table",
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
                                                                
                                                                     //return '<a data-toggle="modal"  href="#edit_page" onclick=edit_page("'+oObj.aData[6]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[6]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                     return '<a data-toggle="modal"  href="<?php echo base_url('index.php/cms/update/') ?>/'+oObj.aData[6]+'" onclick=edit_page("'+oObj.aData[6]+'"); ><span data-toggle="tooltip" class="label label-success hint--top hint--error" data-hint="EDIT"><i class="icon-edit"></i></span> </a>'+"&nbsp&nbsp;<a href=javascript:user_function('"+oObj.aData[6]+"'); ><span data-toggle='tooltip' class='label label-danger hint--top hint--error' data-hint='DELETE'><i class='icon-trash'></i></span> </a>";
                                                                
                                                                },	
							},
                                                    ]
		                         } );
                                         
                                         //save_new_page
                                         $("#save_new_page").click(function() {
			 inputs = $('#parsley_reg').serialize();
				  $.ajax ({
					url: "<?php echo base_url('index.php/cms/add_new_page')?>",
					data: inputs,
                                        type:'POST',
					complete: function(response) {
                                            if(response['responseText']=='TRUE'){
                                                   bootbox.alert('New Page Added ');
                                                        $("#parsley_reg").trigger('reset');     
                                                   document.getElementById('add_page_close').click();                                      
                                                   $("#dt_table_tools").dataTable().fnDraw();
                                      }else if(response['responseText']=='ALREADY'){
                                                bootbox.alert('This Menu Already Added ');
                                            }else{
                                                 bootbox.alert('Please Enter All Required Fields');
                                            }
					}
				  });
				});  
                                         
                                         
                                         });
           function edit_page(sid){
		   $.ajax({                                      
			  url: "<?php echo base_url() ?>index.php/cms/edit_page/"+sid,                      
			  data: "",                       
											 
			  dataType: 'json',               
			  success: function(data)        
			  {      
                                  //console.log(data[0]['body']);
                                $('#edit_page #title').val(data[0]['title']);
                               // $('#edit_page #update_page_body').val("<p>jibi</p>");
                                console.log($('#update_page_body').val("<p>jibi</p>"));
			  } 
			});
    }         
     function user_function(guid){
             bootbox.confirm("Are you Sure To Delete This Page", function(result) {
             if(result){
				 $.ajax({
					url: '<?php echo base_url() ?>index.php/cms/delete_page',
					type: "POST",
					data: {
						guid: guid
						
					},
					success: function(response)
					{
						if(response){
						  bootbox.alert('Page Deleted');
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