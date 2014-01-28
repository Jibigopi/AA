   <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        &copy; 2013 Ancient Agro
                    </div>
                    
                    <div class="col-sm-1 text-right">
                        <small class="text-muted">v1.2</small>
                    </div>
                </div>
            </div>
        </footer>
        
	<script src="<?php echo base_url() ?>admin/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/jquery.ba-resize.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/jquery_cookie.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/retina.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/lib/typeahead.js/typeahead.min.js"></script>
		<script src="<?php echo base_url() ?>admin/js/lib/typeahead.js/hogan-2.0.0.js"></script>
		<script src="<?php echo base_url() ?>admin/js/tinynav.js"></script>
		<script src="<?php echo base_url() ?>admin/js/jquery.sticky.js"></script>
		<script src="<?php echo base_url() ?>admin/js/lib/jMenu/js/jMenu.jquery.js"></script>
		<script src="<?php echo base_url() ?>admin/js/ebro_common.js"></script>
                <script src="<?php echo base_url() ?>admin/js/lib/datepicker/js/bootstrap-datepicker.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/jquery_ui/jquery-ui-1.10.3.custom.min.js"></script>
                        <script src="<?php echo base_url() ?>admin/js/pages/ebro_dashboard2.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/ColReorder/media/js/ColReorder.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/FixedColumns/media/js/FixedColumns.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/ColVis/media/js/ColVis.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/js/TableTools.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/dataTables/media/DT_bootstrap.js"></script>
			<script src="<?php echo base_url() ?>admin/data_table/js/bootstrap-alert.js"></script>
                        <script src="<?php echo base_url() ?>admin/data_table/js/jquery.bootstrap-growl.js"></script>
                        <script src="<?php echo base_url() ?>admin/data_table/bootbox.min.js"></script>
			<script src="<?php echo base_url() ?>admin/js/lib/parsley/parsley.min.js"></script>			
			<script src="<?php echo base_url() ?>admin/js/pages/ebro_form_validate.js"></script>
		<!--[if lte IE 9]>
		<script src="<?php echo base_url() ?>admin/js/ie/jquery.placeholder.js"></script>
		<script>
			$(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
    <!-- style switcher -->
		<div id="style_switcher" class="switcher_open" style="display: none">
            
			<div class="style_items">
				<p class="style_title">Theme</p>
				
			</div>
			
                    <div class="style_items" id="layout_switch" >
				<p class="style_title">Layout</p>
				<select name="layout_style" id="layout_style" class="form-control">
					<option value="fixed">Fixed</option>
					<option value="full_width" class="hidden-sm hidden-md">Full Width</option>
					<option value="boxed" class="hidden-sm hidden-md">Boxed</option>
				</select>
			</div>
			
			
        </div>
        <script type="text/javascript">
                    function delete_selected_customer(){
                      var flag_d=0;
                    
                     var flag=0;
                     var field=document.forms.grains;
                      for (i = 0; i < field.length; i++){
                          if(field[i].checked==true){
                              flag=flag+1;

                          }

                      }
                      if (flag<1) {
                         bootbox.alert("Please Select Stage To Delete");
                      
                      }else{
                         bootbox.confirm("Are you Sure To Delete This Stage", function(result) {
             if(result){
                 
            
                            var agro=document.forms.grains;        
                      for (i = 0; i < agro.length; i++){
                          if(agro[i].checked==true){                             
                              $.ajax({
                url: '<?php echo base_url() ?>index.php/sales_order/delete',
                type: "POST",
                data: {
                    guid:agro[i].value
                    
                },
                success: function(response)
                {
                    if(response){
                          $("#dt_table_tools").dataTable().fnDraw();
                      
                    }
                }
            });
                          }
                          

                      }}
                      });
                 
                      }  
                    
                       if(flag_d >0){
                    
                       
                         bootbox.alert("Customer Deleted");
                  }
                  console.log(flag_d)
                      }</script>
	</body>


</html>