
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
									<table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                        <tr>
                                                                          <th>Id</th>
                                                                          <th >Select</th>
                                                                          <th >Code</th>
                                                                          
                                                                          <th >Name</th>
                                                                          <th>Category Name</th>
                                                                         
                                                                          <th>SKU </th>
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
                        <div id="over_view" class="modal fade">
                           <div class="modal-dialog" >
				<div class="modal-content">
                                         <div class="modal-header">
						<button type="button" id="over_view_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                 <h4 class="modal-title" id="myModalLabel">Nutrition Image</h4>
					</div>
                                        <form id="over_view_form" action="" method="post" >
                                         <div class="row" >
                                                <div class="col col-lg-1"></div>
                                                 <div class="col col-lg-4"> <br>
                                                 <input id="product_name" disabled="disabled" class="text-center form-control"  ></div>
                                                <input type="hidden" name="product_id" id="product_id" >
                                                 <div class="col col-lg-4"> <br>
                                                    
                                                 </div>
                                                 <div class="col col-lg-2"><br>
                                                 <input type="submit" id='save_over_view' class="form-control btn btn-success" value="Save"></div>
                                          </div><br>
                                            <div class="row" >
                                                <div class="col col-lg-1"></div>
                                                <div class="col col-lg-10">
                                                    <textarea name="over_text" id='over_text' rows="6" class="form-control" ></textarea>
                                                </div>
                                            </div>
                                        </form>
                                       <br>
                       <br><br>      
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

	
	document.getElementById('nutrition_image_close').click(); 

                  
	},
	error: function()
	{
		$("#message").html("<font color='red'> ERROR: unable to upload files</font>");

	}
     
}; 

     $("#nutrition").ajaxForm(options);

});
</script>