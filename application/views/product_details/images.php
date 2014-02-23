<script type="text/javascript">
function change_image(id,value,url){
   var base_url =$('#base_url').val();
   
    document.getElementById('selected_productimage').src = base_url+url+value;
    $('#myForm1 #image_name').val(value);
    $('#myForm1 #meta_id').val(id);
    $('#myForm1 #description').val($('#image_table #'+id+'_description ').val());
    console.log($('#image_table #'+id+'_description ').val());
}

function add_new_image(){
    $('#add_image #add_product_id').val($('#main_content_outer #product_id').val());
    $('#add_image #image_name').val('none');
}
function delete_image(guid,name){
       bootbox.confirm("Are you Sure To Delete This Image", function(result) {
             if(result){
            $.ajax({
                url: '<?php echo base_url() ?>index.php/product_details/remove_image',
                type: "POST",
                data: {
                    guid: guid,
                    image_name:name
                    
                },
                success: function(response)
                {
                    if(response){
                       bootbox.alert("Product Deleted");
                       location.reload();
                    }}
            });
        }

                        
    });
}
</script>
<input type="hidden"  id="base_url" value="<?php echo base_url(); ?>">
		
			<nav id="mobile_navigation"></nav>
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
                                            <?php foreach ($pro as $product){ echo '<h4>'.$product->name.' Images   </h4>';
                                             echo "<input type='hidden' id='product_id' value='$product->guid' name='product_id'>"       ;
                                            }?>
						<!-- main content -->
                                                <br>
                                                <?php   $form =array('name'=>'grains');
                                                echo form_open('grains/grains_list',$form) ?>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
                                                                    <a  data-toggle="modal" href="#add_image"  onclick="add_new_image()" class="btn btn-success"><i class="icon icon-add "></i> ADD</a>
									<table id="image_table" class="table table-striped" style="width: 100%"><thead>
                                                                        <tr>
                                                                          <th>No</th>
                                                                          <th >Image</th>
                                                                          <th >Description </th>
                                                                          
                                                                          <th width="100px">Change</th>
                                                                          <th width="100px">Delete</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody >
                                                                                <?php $i=1;
                                                                             foreach ($row as $m_row){ ?>
                                                                            <tr>
                                                                                <td><?php echo $i++;?></td>
                                                                                <td><img width="100" height="75" src="<?php echo base_url(); ?><?php echo $m_row->url.$m_row->value ?>"/></td>
                                                                                <td><input type="hidden" id="<?php echo $m_row->id.'_description'; ?>" value="<?php echo $m_row->description  ?>"><?php echo $m_row->description  ?></td>
                                                                                <td><a  data-toggle="modal" href="#change_image" onclick="change_image(<?php echo $m_row->id.",'".$m_row->value."','".$m_row->url."'" ?> )"><i class="icon icon-edit"></i></a></td>
                                                                                <td><a href="javascript:delete_image(<?php echo $m_row->id; ?>,'<?php echo $m_row->value ?>')"><i class="icon icon-remove"></i></a></td>
                                                                            </tr>   
                                                                                 
                                                                             <?php }
                                                                                ?>
                                                                            


                                                                        </tbody>

                                                                  </table>
								</div>
							</div>
						</div>
						<?php  echo form_close()?>
						
						

					</div>
				</div>
		            


			</section>
                        <div id="add_image" class="modal fade">
                           <div class="modal-dialog" >
								<div class="modal-content">
                                                                    <div class="modal-header">
											<button type="button" id="image_upload_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
										</div>
                                                              <form id="myForm2" action="<?php echo base_url() ?>index.php/product_details/add_product_image" method="post" enctype="multipart/form-data">
                                                                     
                                                                     <div class="row" >
                                                                         <div class="col col-lg-1"></div>
                                                                     
                                                                         <input type="hidden" name="product_id" id="add_product_id" >
                                                                         <input type="hidden" name="image_name" id="add_image_name" >
                                                                      <div class="col col-lg-4"> <br>
                                                                             <input type="file" size="60"  name="userfile">
                                                                             </div>
                                                                  <div class="col col-lg-4"><br>
                                                                      <input type="submit" class="form-control btn btn-success" value="Upload /Save"></div>
                                                                      </div>
                                                                  <div class="row">
                                                                      <div class="col col-lg-1"></div>
                                                                      <div class="col col-lg-10">
                                                                          <label>Description</label>
                                                                          <textarea name="description" id='description' rows="4" class="form-control"></textarea>
                                                                      </div>
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
                        <div id="change_image" class="modal fade">
                           <div class="modal-dialog" >
								<div class="modal-content">
                                                                    <div class="modal-header">
											<button type="button" id="image_upload_close1" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
										</div>
                                                              <form id="myForm1" action="<?php echo base_url() ?>index.php/product_details/change_product_image" method="post" enctype="multipart/form-data">
                                                                     <div class="row" >
                                                                         <div class="col col-lg-1"></div>
                                                                         <div class="col col-lg-10">
                                                                             <img style="width:100%;height: 300px"  id="selected_productimage"  src=""/>
                                                                         </div>
                                                                     </div>
                                                                     <div class="row" >
                                                                         <div class="col col-lg-1"></div>
                                                                      <div class="col col-lg-4"> <br>
                                                                          <input type="hidden" id="product_name" disabled="disabled" class="text-center form-control"  ></div>
                                                                         <input type="hidden" name="product_id" id="product_id" >
                                                                         <input type="hidden" name="image_name" id="image_name" >
                                                                         <input type="text" name="meta_id" id="meta_id" >
                                                                      <div class="col col-lg-4"> <br>
                                                                             <input type="file" size="60"  name="userfile">
                                                                             </div>
                                                                  
                                                                      </div>
                                                                  <div class="row">
                                                                      <div class="col col-lg-1"></div>
                                                                      <div class="col col-lg-10">
                                                                          <label>Description</label>
                                                                          <textarea name="description" id='description' rows="4" class="form-control"></textarea>
                                                                      </div>
                                                                  </div>
                                                                  <div class="row">
                                                                      <div class="col col-lg-1"></div>
                                                                      <div class="col col-lg-10">
                                                                          <br>
                                                                      <input type="submit" class="form-control btn btn-success" value="Upload / Save"> </div>
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
			<div id="footer_space"></div>
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
	document.getElementById('image_upload_close1').click(); 
	location.reload();
                  
	},
	error: function()
	{
		$("#message").html("<font color='red'> ERROR: unable to upload files</font>");

	}
     
}; 

     $("#myForm1").ajaxForm(options);
     $("#myForm2").ajaxForm(options);

});
</script>