
	 <script type="text/javascript">
            function u_set_url(){
                 $("#parsley_ext #url").attr("disabled",false);
                 console.log();
                 $("#parsley_ext #page").attr("disabled",true);
            }
            function u_set_page(){
                 $("#parsley_ext #url").attr("disabled",true);
                 console.log();
                 $("#parsley_ext #page").attr("disabled",false);
            }
            </script>

			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
			
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
                                                <br>
					    <div class="row">
						<div class="col-sm-12">
								<div class="tabbable ">
										<h4>MENU DETAILS</h4>
										<div class="tab-content">
                                                                                    <a data-toggle="modal" href="#add_new" class="btn btn-success btn-sm"><i class="icon icon-plus"></i> ADD NEW</a>
										    <a href="javascript:delete_selected_menu()" class="btn btn-danger"><i class="icon icon-trash"></i> DELETE</a>
												<div id="tb3_a" class="tab-pane active">
													<div class="panel panel-default">
                                                                            <?php   $form =array('name'=>'grains');
                                                                             echo form_open('grains/grains_list',$form) ?>
									                                  <table id="dt_table_tools" class="table table-striped" style="width: 100%"><thead>
                                                                                                            <tr>
                                                                                                              <th>Id</th>
                                                                                                              <th>Select</th>
                                                                                                              <th >Menu Name</th>
                                                                                                              <th >Order Number</th>
                                                                                                              <th >Page</th>
                                                                                                             
                                                                                                              <th>Action</th>
                                                                                                              </tr>
                                                                                                            </thead>
                                                                                                            <tbody > </tbody>

                                                                                                          </table>
                                                                                                            <?php echo form_close(); ?>
                                                                                                    </div>
                                                                                                    </div>
                                                                                                    </div>
								</div>
						</div>
					</div>
					    
				</div>
		        </section>
			
			<div id="footer_space"></div>
		</div>
			
	<div id="add_new" class="modal fade">
            <div class="modal-dialog" style="width: 60%">
								<div class="modal-content">
									<form id="parsley_reg" action="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="add_menu_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">New Menu</h4>
										</div>
										<div class="modal-body">
										<div class='row'>									
											<div class='col col-lg-4'>										
												<div class="form-group" class="req">
													<label for="name">Menu Name</label>
												 <?php $name=array('name'=>'name',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'name',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('name'));
                                                                                                            echo form_input($name)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="order" class="req">Order Number</label>
												 <?php $order=array('name'=>'order',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'order',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('order'));
                                                                                                            echo form_input($order)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="email" class="req">Parent Menu</label>
                                                                                                        <select class="form-control"  name="primary" id='primary'>
                                                                                                            <?php foreach ($p_menu as $primary ) {?>
                                                                                                            <option value="<?php echo $primary->id ?>"><?php echo $primary->name ?></option>
                                                                                                            <?php } ?>
                                                                                                        </select>
													
												</div>	
											</div>	
											
										</div>
                                                                                    <div class="row"><br>
                                                                                        <div class="col col-lg-4">
                                                                                            <div class="pull-right" style="font-weight: bold"><input type="radio" onclick="set_page()" checked="checked"  name="link" value="1">Page</div><br>
                                                                                        </div>										
                                                                                        <div class="col col-lg-4">
                                                                                            <div  style="font-weight: bold"><input type="radio" name="link" onclick="set_url()" value="0">Direct URL</div> <br>

                                                                                        </div>										
                                                                                        </div>	
                                                                                    <script type="text/javascript">
                                                                                    function set_url(){
                                                                                         $("#url").attr("disabled",false);
                                                                                         console.log();
                                                                                         $("#page").attr("disabled",true);
                                                                                    }
                                                                                    function set_page(){
                                                                                         $("#url").attr("disabled",true);
                                                                                         console.log();
                                                                                         $("#page").attr("disabled",false);
                                                                                    }
                                                                                    </script>
                                                                                    <div class="row">
                                                                                        <div class="col col-lg-4">										
												<div class="form-group">
													<label for="page" class="req">Page</label>
                                                                                                        <select class="form-control"  name="page" id='page'>
                                                                                                            <?php foreach ($p_page as $page ) {?>
                                                                                                            <option value="<?php echo $page->id ?>"><?php echo $page->title ?></option>
                                                                                                            <?php } ?>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col col-lg-8">
                                                                                            <div class="form-group">
													<label for="url" class="req">Direct Url</label>
												 <?php $url=array('name'=>'url',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'url',
                                                                                                            'data-required'=>'true',
                                                                                                            'data-type'=>'url',
                                                                                                            'value'=>set_value('url'));
                                                                                                            echo form_input($url)?>          
													
												</div>
                                                                                        </div>
                                                                                    </div>
										<div class='row'>									
											<div class='col col-lg-4'>
											</div>
											<div class='col col-lg-3'>										
												<div class="form-group text-center">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="add_new_menu">SAVE</button>        
												</div>	
											</div>	
										</div>
										</div>
									</form>
								 </div>
							</div>
						</div>
     <div id="edit_menu" class="modal fade">
                            <div class="modal-dialog" style="width: 60%">
								<div class="modal-content">
                                                                    <form id="parsley_ext" action="post12" method="post" onsubmit="false">
										<div class="modal-header">
											<button type="button" id="menu_update_close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Update Menu</h4>
										</div>
										<div class="modal-body">
                                                                                  <div class='row'>	
                                                                                      <input type="hidden" name="menu_id" id='menu_id'>
                                                                                          
											<div class='col col-lg-4'>										
												<div class="form-group" class="req">
													<label for="name">Menu Name</label>
												 <?php $name=array('name'=>'name',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'name',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('name'));
                                                                                                            echo form_input($name)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="order" class="req">Order Number</label>
												 <?php $order=array('name'=>'order',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'order',
                                                                                                            'data-required'=>'true',
                                                                                                            'value'=>set_value('order'));
                                                                                                            echo form_input($order)?>          
													
												</div>	
											</div>	
											<div class='col col-lg-4'>										
												<div class="form-group">
													<label for="email" class="req">Parent Menu</label>
                                                                                                        <select class="form-control"  name="primary" id='primary'>
                                                                                                            <?php foreach ($p_menu as $primary ) {?>
                                                                                                            <option value="<?php echo $primary->id ?>"><?php echo $primary->name ?></option>
                                                                                                            <?php } ?>
                                                                                                        </select>
													
												</div>	
											</div>	
											
										</div>
                                                                                    <div class="row"><br>
                                                                                        <div class="col col-lg-4">
                                                                                            <div class="pull-right" style="font-weight: bold"><input type="radio" onclick="u_set_page()" checked="checked"  name="link" value="1">Page</div><br>
                                                                                        </div>										
                                                                                        <div class="col col-lg-4">
                                                                                            <div  style="font-weight: bold"><input type="radio" name="link" onclick="u_set_url()" value="0">Direct URL</div> <br>

                                                                                        </div>										
                                                                                        </div>	
                                                                                   
                                                                                    <div class="row">
                                                                                        <div class="col col-lg-4">										
												<div class="form-group">
													<label for="page" class="req">Page</label>
                                                                                                        <select class="form-control"  name="page" id='page'>
                                                                                                            <?php foreach ($p_page as $page ) {?>
                                                                                                            <option value="<?php echo $page->id ?>"><?php echo $page->title ?></option>
                                                                                                            <?php } ?>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col col-lg-8">
                                                                                            <div class="form-group">
													<label for="url" class="req">Direct Url</label>
												 <?php $url=array('name'=>'url',
                                                                                                            'class'=>'form-control',
                                                                                                            'id'=>'url',
                                                                                                            'data-required'=>'true',
                                                                                                            'data-type'=>'url',
                                                                                                            'value'=>set_value('url'));
                                                                                                            echo form_input($url)?>          
													
												</div>
                                                                                        </div>
                                                                                    </div>
										<div class='row'>									
											<div class='col col-lg-3'>
											</div>	
											<div class='col col-lg-3'>
											</div>	
											<div class='col col-lg-3'>									
												<div class="form-group">
												<label for="button">&nbsp</label>
													<button type="submit" class="btn btn-primary" id="update_menu">UPDATE</button>        
												</div>	
											</div>		
										</div>	
										
										</div>
									</form>
								 </div>
							</div>
						</div>