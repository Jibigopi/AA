
			<nav id="mobile_navigation"></nav>
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						<h4>PRODUCT DETAILS</h4>
						<!-- main content -->
                                                <br>
                                                <?php   $form =array('name'=>'grains');
                                                echo form_open('grains/grains_list',$form) ?>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
                                                                    <a data-toggle="modal" href="#add_product" onclick="product_number()" class="btn btn-success"><i class="icon icon-plus"></i> ADD</a>
                                                                    <a href="javascript:delete_selected_grains()" class="btn btn-danger"><i class="icon icon-trash"></i> DELETE</a>
									<table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                        <tr>
                                                                          <th>Id</th>
                                                                          <th >Select</th>
                                                                          <th >Code</th>
                                                                          
                                                                          <th >Name</th>
                                                                          <th>Category Name</th>
                                                                         
                                                                          <th>SKU </th>
                                                                          <th>image</th>
                                                                          <th width="100px">Action</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody >



                                                                        </tbody>

                                                                  </table>
								</div>
							</div>
						</div>
						<?php  echo form_close()?>
						
						

					</div>
				</div>
		            


			</section>
			<div id="footer_space"></div>
		</div>

<div id="sales_channel" class="modal fade">
                           <div class="modal-dialog" >
				<div class="modal-content">
                                         <div class="modal-header">
						<button type="button" id="sales_channel_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                 <h4 class="modal-title" id="myModalLabel">Sales Channel</h4>
					</div>
                                        <form id="sales_channel_form" action="<?php echo base_url() ?>index.php/grain/sales_channel" method="post" enctype="multipart/form-data">
                                      <div class="modal-body">   
                                          <div class="row" >
                                              <div class="col col-lg-6">
                                                  <label>Product ID</label>
                                                  <input type="text" disabled="disabled" class="form-control" id='product_gcode'>
                                              </div>
                                              <div class="col col-lg-6">
                                                  <label>Product Name</label>
                                                   <input type="text" disabled="disabled" class="form-control" id='product_name'>
                                              </div>
                                          </div><br>
                                          <div class="row" >
                                              <input type="hidden" name="product_id" id='channel_product_id'>
                                             <div class="col col-lg-6">
                                                 <div id='parrent_channel_list'>
                                                 
                                                     </div>
                                             </div>
                                              <script type="text/javascript">
                                              function select_sales_channel(guid) {
                                                    var name=$('#selecting_channel #selecting_id_'+guid).val();
                                                  $('#selected_channel').append('<option id="selected_id_'+guid+'" onclick=remove_selected_channel("'+guid+'"); >'+name+"</option>");
                                                  $('#selecting_channel #selecting_id_'+guid).remove();
                                                  $('#selected_product_sales_channel').append('<input type="hidden" id="selected_id_'+guid+'" name="channel[]" value="'+guid+'" >');
                                              }
                                              function remove_selected_channel(guid) {
                                                var name=$('#selected_channel #selected_id_'+guid).val();
                                                  $('#selecting_channel').append("<option id='selecting_id_"+guid+"' value='"+name+"' onclick=select_sales_channel('"+guid+"')>"+name+"</option>");
                                                  $('#selected_channel #selected_id_'+guid).remove();
                                                  $('#selected_product_sales_channel #selected_id_'+guid).remove();
                                              }
                                             </script>
                                             <div id='parrent_channel'>
                                             <div id='selected_product_sales_channel'>
                                                 
                                             </div>
                                                 </div>
                                             <div class="col col-lg-6">
                                                 <div id='parrent_selected_channel_list'>
                                                 <select name="" class="form-control" multiple="multiple" id='selected_channel'  style="height:200px ">
                                                     
                                                 </select>
                                                     </div>
                                             </div>
                                         </div>
                                         <div class="row" ><br>
                                             <div class="col col-lg-4"></div>
                                             <div class="col col-lg-4">
                                                 <input type="submit" id='add_sales_channel' name='add_sales_channel' class="form-control btn btn-success" value="Save">
                                              </div>
                                          </div>
                                      </div>
                                        </form>
                                    <br>
                                      
                             
                        </div>
                             </div>
                  </div> 
                <div id="upload_image" class="modal fade">
                           <div class="modal-dialog" >
								<div class="modal-content">
                                                                    <div class="modal-header">
											<button type="button" id="image_upload_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
										</div>
                                                              <form id="myForm1" action="<?php echo base_url() ?>index.php/grain/add_new_product1" method="post" enctype="multipart/form-data">
                                                                     <div class="row" >
                                                                         <div class="col col-lg-1"></div>
                                                                      <div class="col col-lg-4"> <br>
                                                                          <input id="product_name" disabled="disabled" class="text-center form-control"  ></div>
                                                                         <input type="hidden" name="product_id" id="product_id" >
                                                                      <div class="col col-lg-4"> <br>
                                                                             <input type="file" size="60"  name="userfile">
                                                                             </div>
                                                                  <div class="col col-lg-2"><br>
                                                                      <input type="submit" class="form-control btn btn-success" value="Upload"></div>
                                                                      </div>
                                                                </form>
                                                                    <br>
<div class="row" >
                                                                      <div class="col col-lg-4"> </div>
                                                                      <div class="col col-lg-4 "> 
                                                                          <div id="progress" class="text-center">
                                                                       <div id="bar"></div>
                                                                       <div id="percent">0%</div >
                                                                       <div id="message"></div>
                                                               </div>      
                                                               </div>      
                                                               </div><br><br>      
                                                                </div>
                             </div>
                  </div>
                <div id="set_nutrition" class="modal fade">
                           <div class="modal-dialog" >
				<div class="modal-content">
                                         <div class="modal-header">
						<button type="button" id="nutrition_image_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                 <h4 class="modal-title" id="myModalLabel">Nutrition Image</h4>
					</div>
                                        <form id="nutrition" action="<?php echo base_url() ?>index.php/grain/add_new_nutrition" method="post" enctype="multipart/form-data">
                                         <div class="row" >
                                                <div class="col col-lg-1"></div>
                                                 <div class="col col-lg-4"> <br>
                                                 <input id="nutrition_product_name" disabled="disabled" class="text-center form-control"  ></div>
                                                 <input type="hidden" name="product_id" id="nutrition_product_id" >
                                                 <div class="col col-lg-4"> <br>
                                                 <input type="file" size="60"  name="userfile">
                                                 </div>
                                                 <div class="col col-lg-2"><br>
                                                 <input type="submit" class="form-control btn btn-success" value="Upload"></div>
                                          </div>
                                        </form>
                                       <br>
                        <div class="row" >
                              <div class="col col-lg-4"> </div>
                              <div class="col col-lg-4 "> 
                                  <div id="progress" class="text-center">
                               <div id="bar"></div>
                               <div id="percent">0%</div >
                               <div id="message"></div>
                       </div>      
                       </div>      
                       </div><br><br>      
                        </div>
                             </div>
                  </div>
                                                                
                <div id="add_product" class="modal fade">
            <div class="modal-dialog" style="width: 60%">
								<div class="modal-content">
                                                                    <form id="product_form" action="<?php echo base_url() ?>index.php/grain/add_new_product" method="post" enctype="multipart/form-data">
										<div class="modal-header">
											<button type="button" id="product_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Product</h4>
										</div>
										<div class="modal-body">
                                                                                    <div class='row'>
                                                                                    
                                                                                    <div class='col col-lg-3 '><h4 class="pull-right">Product ID</h4></div>
											<div class='col col-lg-3 '>
                                                                                             <?php $stock_id=array('name'=>'stock_id_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'stock_id',
                                                                                                 'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('stock_id'));
                                                                                                            echo form_input($stock_id)?>
                                                                                        </div>
                                                                                    <input type="hidden" name="stock_id" id="stock_id_o">
                                                                                   
                                                                                    
                                                                                </div>
										<div class='row'>
                                                                                    
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="name">Product Name</label>
                                                                                                      <?php $name=array('name'=>'name',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'name',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('name'));
                                                                                                            echo form_input($name)?>
								</div>				</div>
                                                                                           
                                                                                    
                                                                                    <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="sku">SKU</label>
													 <?php $sku=array('name'=>'sku',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'sku',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sku'));
                                                                                                            echo form_input($sku)?>
												</div>
												</div>
                                                                                         <div class='col col-lg-4'>   
                                                                                            <div class="form-group">
													
                                                                                                <label for="category">Product Category </label>
                                                                                                    <select name='category' id='category_id' class="form-control">
                                                                                                        <?php foreach ($row as $cat) {?>
                                                                                                        <option value="<?php  echo $cat->name;?>"><?php  echo $cat->name;?></option>
                                                                                                        <?php }?>

                                                                                                    </select>
                                                                                          
                                                                                        </div>
                                                                                        
                                                                                        </div>
                                                                                   	
                                                                                   
                                                                                   
                                                                                </div>
                                                                                    
                                                                                    
                                                                                    
											
										<div class='row'>
                                                                                  
												  <div class='col col-lg-5'>
                                                                                            <div class="form-group">
													<label for="description">Description</label>
													 <?php $description=array('name'=>'description',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'description',
                                                                                                             'rows'=>3,
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('description'));
                                                                                                            echo form_textarea($description)?>
												</div>
												
											</div>
                                                                                    	
											
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" name="grain" class="btn btn-primary" id="add_new_product">SAVE</button>        
												</div>	
												
										</div>
										</div>
										</div>
										</div>
									</form>

								 </div>
							</div>
						</div>
                <div id="update_product" class="modal fade">
            <div class="modal-dialog" style="width: 70%">
								<div class="modal-content">
                                                                    <form id="product_update_form" action="<?php echo base_url('index.php/stock/receiving_note')?>" method="post">
										<div class="modal-header">
											<button type="button" id="product_update_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Update Product</h4>
										</div>
										<div class="modal-body">
                                                                                    
                                                                                            <input type="hidden" name="product_id" id="product_id">
                                                                                         <div class='row'>
                                                                                    
                                                                                    <div class='col col-lg-3 '><h4 class="pull-right">Product ID</h4></div>
											<div class='col col-lg-3 '>
                                                                                             <?php $stock_id=array('name'=>'stock_id',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'stock_id',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('stock_id'));
                                                                                                            echo form_input($stock_id)?>
                                                                                        </div>
                                                                                    <div class="col col-lg-3">
                                                                                        <label for="sku">Nutrition</label>
                                                                                    </div>
                                                                                    
                                                                                </div>
											<div class='row'>
                                                                                    
											<div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="name">Product Name</label>
                                                                                                      <?php $name=array('name'=>'name',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'name',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('name'));
                                                                                                            echo form_input($name)?>
								</div>				</div>
                                                                                           
                                                                                    
                                                                                    <div class='col col-lg-4'>
                                                                                            <div class="form-group">
													<label for="sku">SKU</label>
													 <?php $sku=array('name'=>'sku',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'sku',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sku'));
                                                                                                            echo form_input($sku)?>
												</div>
												</div>
                                                                                         <div class='col col-lg-4'>   
                                                                                            <div class="form-group">
													
                                                                                                <label for="category">Product Category </label>
                                                                                                    <select name='category' id='category_id' class="form-control">
                                                                                                         <option value="none">None</option>
                                                                                                        <?php foreach ($row as $cat) {?>
                                                                                                        <option value="<?php  echo $cat->name;?>"><?php  echo $cat->name;?></option>
                                                                                                        <?php }?>

                                                                                                    </select>
                                                                                          
                                                                                        </div>
                                                                                        
                                                                                        </div>
                                                                                   	
                                                                                   
                                                                                   
                                                                                </div>
                                                                                    
                                                                                    
                                                                                    
											
										<div class='row'>
                                                                                  
												  <div class='col col-lg-5'>
                                                                                            <div class="form-group">
													<label for="description">Description</label>
													 <?php $description=array('name'=>'description',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'description',
                                                                                                             'rows'=>3,
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('description'));
                                                                                                            echo form_textarea($description)?>
												</div>
												
											</div>
											
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" name="grain" class="btn btn-primary" id="add_product_update">UPDATE</button>        
												</div>	
												
										</div>
										</div>
										</div>
										</div>
									</form>

								 </div>
							</div>
						</div>
                <div id="restore data" class="modal fade">
            <div class="modal-dialog" style="width: 90%">
								<div class="modal-content">
                                                                    <form id="product_form" action="<?php echo base_url() ?>index.php/grain/add_new_product" method="post" enctype="multipart/form-data">
										<div class="modal-header">
											<button type="button" id="product_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Product</h4>
										</div>
										<div class="modal-body">
                                                                                    <div class='row'>
                                                                                    
                                                                                    <div class='col col-lg-3 '><h4 class="pull-right">Product ID</h4></div>
											<div class='col col-lg-3 '>
                                                                                             <?php $stock_id=array('name'=>'stock_id_o',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'stock_id',
                                                                                                 'disabled'=>'disabled',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('stock_id'));
                                                                                                            echo form_input($stock_id)?>
                                                                                        </div>
                                                                                    <input type="hidden" name="stock_id" id="stock_id_o">
                                                                                   
                                                                                    
                                                                                </div>
										<div class='row'>
                                                                                    
											<div class='col col-lg-3'>
                                                                                            <div class="form-group">
													<label for="name">Product Name</label>
                                                                                                      <?php $name=array('name'=>'name',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'name',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('name'));
                                                                                                            echo form_input($name)?>
								</div>				</div>
                                                                                           
                                                                                    
                                                                                    <div class='col col-lg-2'>
                                                                                            <div class="form-group">
													<label for="sku">SKU</label>
													 <?php $sku=array('name'=>'sku',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'sku',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('sku'));
                                                                                                            echo form_input($sku)?>
												</div>
												</div>
                                                                                         <div class='col col-lg-2'>   
                                                                                            <div class="form-group">
													
                                                                                                <label for="category">Product Category </label>
                                                                                                    <select name='category' id='category_id' class="form-control">
                                                                                                        <option value="none">None</option>
                                                                                                        <?php foreach ($row as $cat) {?>
                                                                                                        <option value="<?php  echo $cat->name;?>"><?php  echo $cat->name;?></option>
                                                                                                        <?php }?>

                                                                                                    </select>
                                                                                          
                                                                                        </div>
                                                                                        
                                                                                        </div>
                                                                                     <div class='col col-lg-5'>
                                                                                            <div class="form-group">
													<label for="description">Description</label>
													 <?php $description=array('name'=>'description',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'description',
                                                                                                             'rows'=>2,
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('description'));
                                                                                                            echo form_textarea($description)?>
												</div>
												
											</div>	
                                                                                   
                                                                                   
                                                                                </div>
                                                                                    <div class="row" id="add_row">
                                                                                        <div class="col col-lg-2">
                                                                                            <input type="text" disabled="=disabled" value="Serving Size" class="form-control" name="index[]" >
                                                                                            <input type="hidden" value="Serving Size" class="form-control" name="index[]" >
                                                                                        </div>
                                                                                        <div class="col col-lg-2">
                                                                                            <input type="text" class="form-control" name="value[]" >
                                                                                        </div>
                                                                                        <div class="col col-lg-2">
                                                                                              <input type="text" disabled="=disabled" value="Servings Per" class="form-control" name="index[]" >
                                                                                            <input type="hidden" value="Servings Per" class="form-control" name="index[]" >
                                                                                        </div>
                                                                                        <div class="col col-lg-2">
                                                                                            <input type="text" class="form-control" name="value[]" >
                                                                                        </div>
                                                                                        <div class="col col-lg-2">
                                                                                              <input type="text" disabled="=disabled" value="Account Per" class="form-control" name="index[]" >
                                                                                              <input type="hidden" value="Account Per"  class="form-control" name="index[]" >
                                                                                        </div>
                                                                                        <div class="col col-lg-2">
                                                                                            <input type="text" class="form-control" name="value[]" >
                                                                                        </div>
                                                                                       
                                                                                    
                                                                                    </div>
                                                                                    <input type="hidden" value="1" id="div_id">
                                                                                    <script type="text/javascript"   >
                                                                                    function add_new_nut(){
                                                                                        var div_id=$('#div_id').val();
                                                                                        $("#add_row").append('<div class="row" id="AA_'+div_id+'" style="margin-top: 5px;" ><div class="col col-lg-6"><input type="text"  class="form-control" name="index[]" id="index_'+div_id+'" ></div><div class="col col-lg-4"><input type="text" class="form-control" id="value_'+div_id+'" name="value[]" id="index[]"></div><div class="col col-lg-1"><a class=" btn btn-success" onclick=remove_new_nut("AA_'+div_id+'")><i class="icon icon-minus"></i></a></div></div>');
                                                                                         $('#product_form #index_'+div_id).val($('#product_form #index').val());
                                                                                         $('#product_form #value_'+div_id).val($('#product_form #value').val());
                                                                                         $('#product_form #index').val('');
                                                                                         $('#product_form #value').val('');
                                                                                         $('#product_form #index').focus();
                                                                                        $('#div_id').val(+div_id+1);
                                                                                    }
                                                                                    function remove_new_nut(id){
                                                                                        
                                                                                        $('#'+id).remove();
                                                                                    }
                                                                                    </script>
                                                                                    
											
										<div class='row'>
                                                                                    <div class='col col-lg-4'>
												
                                                                                    </div>	
											
										<div class='col col-lg-4'>	
                                                                                    <div class='row text-center'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" name="grain" class="btn btn-primary" id="add_new_product">SAVE</button>        
												</div>	
												
										</div>
										</div>
										</div>
										</div>
									</form>

								 </div>
							</div>
						</div>
<script type="text/javascript">
    
$(document).ready(function()
{

	var options = { 
    beforeSend: function() 
    {
    	$("#progress").show();
    	//clear everything
    	$("#bar").width('0%');
    	$("#message").html("");
		$("#percent").html("0%");
    },
    uploadProgress: function(event, position, total, percentComplete) 
    {
    	$("#bar").width(percentComplete+'%');
    	$("#percent").html(percentComplete+'%');

    
    },
    success: function() 
    {
        $("#bar").width('100%');
    	$("#percent").html('100%');

    },
	complete: function(response) { 

	document.getElementById('image_upload_close').click(); 
	document.getElementById('nutrition_image_close').click(); 
		   $("#dt_table_tools").dataTable().fnDraw();
                  
	},
	error: function()
	{
		$("#message").html("<font color='red'> ERROR: unable to upload files</font>");

	}
     
}; 

     $("#myForm1").ajaxForm(options);
     $("#nutrition").ajaxForm(options);

});
</script>

                <script type="text/javascript">
                    
                    $(document).ready(function() {
$('#product_form').validate(
{
rules: {
sku: {
minlength: 2,
required: true
},
batch: {
minlength: 2,
required: true
},
name: {
minlength: 2,
required: true
},
category: {
required: true
},
price: {
minlength: 2,
required: true
},
description: {
minlength: 2,
required: true
},
stock_id: {
minlength: 2,
required: true
},
pallet_number: {
minlength: 2,
required: true
}
,buy_date: {
minlength: 2,
required: true
}
}
});});
                        </script>
                        <style type="text/css">
    #product_form .error{
        color: #990000 !important;
    }
    #product_form .form-group input.error {
        border: 1px solid #CC0000 
    }</style>