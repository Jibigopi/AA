<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grain Extends CI_Controller
{
    function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        session_start();
        
    }
    function index(){
       if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('grain/header');
		$this->load->view('nav/index');
                $this->load->model('grains');
                $data['row']=  $this->grains->get_category();
                $data['sale']=  $this->grains->sales_chanel();
		$this->load->view('grain/index',$data);
                $this->load->view('grain/footer');
              }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }
    }
    function data_table(){
		$aColumns = array( 'guid','guid','gcode','name','cat_name','dis','sku','guid','guid' );	
		$start = "";
			$end="";
		if ( $this->input->get_post('iDisplayLength') != '-1' )	{
			$start = $this->input->get_post('iDisplayStart');
			$end=	 $this->input->get_post('iDisplayLength');              
		}	
		$order="";
		if ( isset( $_GET['iSortCol_0'] ) )
		{	
			for ( $i=0 ; $i<intval($this->input->get_post('iSortingCols') ) ; $i++ )
			{
				if ( $_GET[ 'bSortable_'.intval($this->input->get_post('iSortCol_'.$i)) ] == "true" )
				{
					$order.= $aColumns[ intval( $this->input->get_post('iSortCol_'.$i) ) ]." ".$this->input->get_post('sSortDir_'.$i ) .",";
				}
			}
			
					$order = substr_replace( $order, "", -1 );
					
		}
		
		$like = array();
		
			if ( $_GET['sSearch'] != "" )
		{
		$like =array('name'=>  $this->input->get_post('sSearch'),
				'gcode'=>  $this->input->get_post('sSearch'),
				'dis'=>  $this->input->get_post('sSearch'),
				'cat_name'=>  $this->input->get_post('sSearch'),
				
				);
				
			}
			$this->load->model('grains');		
			$rResult1 = $this->grains->grains_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->grains->count_grain();
		
		$iTotal =$this->grains->count_grain();
		
		$output1 = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
		foreach ($rResult1 as $aRow )
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if ( $aColumns[$i] == "id" )
				{
					$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
				}
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					$row[] = $aRow[$aColumns[$i]];
				}
				
			}
				
		$output1['aaData'][] = $row;
		}
		
		   echo json_encode($output1);
        }
	function stock_grains($name){
	if($name!=""){
	 
	$this->load->model('users');
	$data=$this->users->get_grains_for_auto_complete($name);
		echo json_encode ($data);
	}
	}
	function update(){
        if($this->input->post('egrain')){
			$this->form_validation->set_rules('egrain','egrain', 'required');							
			$this->form_validation->set_rules('grain_id','grain_id', 'required');							
			if($this->form_validation->run()!=FALSE){
				echo $egrain=  $this->input->post('egrain');
				$grain_id=  $this->input->post('grain_id');
				$this->load->model('grains');
                                if($this->grains->check_update($egrain,$grain_id)!=FALSE){
                                    echo 'false3';
                                     $this->grains->update($egrain,$grain_id);
                                }else{
                                    echo 'false3';
                                   return FALSE;
                                }
                                                
                              }else{
                           return FALSE;   
                            }
        }else{
            return FALSE;
        }
       
	}
 function add_new_product1(){
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '22100';
		$config['max_width']  = '11024';
		$config['max_height']  = '3768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                        echo $this->upload->display_errors();
		}
		else
		{       $upload_data = $this->upload->data();
                      echo  $file_name =$upload_data['file_name'];
                      echo  $guid=  $this->input->post('product_id');
                      $this->load->model('grains');
                      $this->grains->add_image($guid,$file_name);
		}
	}
 function add_new_nutrition(){
        $config['upload_path'] = './uploads/nutrition';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '30000';
		$config['max_width']  = '1024';
		$config['max_height']  = '5768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                        echo $this->upload->display_errors();
		}
		else
		{       $upload_data = $this->upload->data();
                      echo  $file_name =$upload_data['file_name'];
                      echo  $guid=  $this->input->post('product_id');
                      $this->load->model('grains');
                      $this->grains->nutrition_image($guid,$file_name);
		}
	}
   
        
function add_new_product(){
	    if($this->input->post('stock_id')){
					$this->form_validation->set_rules('stock_id','stock_id', 'required');							
					$this->form_validation->set_rules('sku','sku', 'required');							
					//$this->form_validation->set_rules('nutrition','nutrition', 'required');							
					$this->form_validation->set_rules('name','name', 'required');							
					$this->form_validation->set_rules('category','category', 'required');							
											
					$this->form_validation->set_rules('description','description', 'required');							
					if($this->form_validation->run()!=FALSE){
						 $grain=  $this->input->post('stock_id');
						 $sku=  $this->input->post('sku');
						 $nutrition=  $this->input->post('nutrition');
						 $name=  $this->input->post('name');
						 $category=  $this->input->post('category');
					
						 $description=  $this->input->post('description');
						 $this->load->model('grains');
                                                 if($this->grains->check($grain)!=FALSE){
                                                        echo "TRUE";
                                                  $guid= $this->grains->add($grain,$sku,$name,$category,$description);
                                                   
                                                 }else{                                                     
                                                     echo "FALSE";
                                                 }
                                                
                                        }else{
                                             echo "FALSE"; 
                                        }
        }else{
              echo "FALSE1";
        }
       
	}
	function update_product(){
	    if($this->input->post('product_id')){
					$this->form_validation->set_rules('product_id','product_id', 'required');							
					$this->form_validation->set_rules('sku','sku', 'required');							
					$this->form_validation->set_rules('name','name', 'required');							
					$this->form_validation->set_rules('category','category', 'required');						
					$this->form_validation->set_rules('description','description', 'required');							
					//$this->form_validation->set_rules('nutrition','nutrition', 'required');	
                                        if($this->form_validation->run()!=FALSE){
						 $grain=  $this->input->post('product_id');
						 $sku=  $this->input->post('sku');
						 $name=  $this->input->post('name');
						 $category=  $this->input->post('category');
						 $description=  $this->input->post('description');
						
						 $this->load->model('grains');
                                                      echo "TRUE";
                                                     $this->grains->update($grain,$sku,$name,$category,$description);
                                                     $this->grains->delete_nut($grain);
                                                  
                                                     $index=  $this->input->post('index');
                                                     $value=  $this->input->post('value');
                                                    for($i=0;$i<count($index);$i++){
                                                        if($index[$i]!="" && $value[$i]!="")
                                                        $this->grains->add_Nutrition($grain,$index[$i],$value[$i]);
                                                    }
                                                
                                        }else{
                                             echo "FALSE"; 
                                        }
        }else{
              echo "FALSE1";
        }
       
	}
	function delete(){
			$id=$this->input->post('guid');
			$this->load->model('grains');
			$this->grains->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_grain($id){
		  $this->load->model('grains');
		  $data=$this->grains->edit_grain($id);
		  echo json_encode($data);
	}
        function grains_delete(){
		   $id=  $this->input->post('guid');
		   $this->load->model('grains');
		   $this->grains->delete($id);
		   echo 'TRUE';
		   
	   }
        function product_category($name){
             if($name!=""){	 
                $this->load->model('grains');
                $data=$this->grains->get_product_category($name);
		echo json_encode ($data);
	}
	}
          function generate_number(){
            $this->load->model('grains');
            $data=  $this->grains->generate_number();
              $data='AA-PT-20'.$data;
             echo json_encode($data);
        }
        function sales_channel(){
            if($this->input->post('product_id')){
                $guid=  $this->input->post('product_id');
                $channel=  $this->input->post('channel');
                $this->load->model('grains');
                $this->grains->delete_sales_channel($guid);
                foreach ($this->input->post('channel') as $row){
                   
                   $this->grains->add_sales_channel($guid,$row);
                }
                echo 'TRUE';
            }
        }
        function get_sales_channel($guid){
             $this->load->model('grains');
             $data=$this->grains->get_sales_channel($guid);
             echo json_encode($data);
        }
        
} 
?>
