<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_details Extends CI_Controller
{
    function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        session_start();
         if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']!='admin'){                
                redirect('admin');
         }
         }else{
              redirect('admin');
         }
    }
    function index(){
       if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('product_details/header');
		$this->load->view('nav/index');
                $this->load->model('products_details');
                $data['row']=  $this->products_details->get_category();
                $data['sale']=  $this->products_details->sales_chanel();
		$this->load->view('product_details/index',$data);
                $this->load->view('product_details/footer');
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
			$this->load->model('products_details');		
			$rResult1 = $this->products_details->products_details_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->products_details->count_grain();
		
		$iTotal =$this->products_details->count_grain();
		
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
    function product_meta_data_table($guid){
		$aColumns = array( 'id','id','key','value','url' );	
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
		$like =array();
				
			}
			$this->load->model('products_details');		
			$rResult1 = $this->products_details->products_meta_table($end,$start,$order,$like,$guid);
		   
		$iFilteredTotal =$this->products_details->count_meta($guid);
		
		$iTotal =$this->products_details->count_meta($guid);
		
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
        function product_images($guid){
            if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                 $data['product_id']=$guid;
                $this->load->view('product_details/image_header',$data);
		$this->load->view('nav/index');
                $this->load->model('products_details');
               
                $data['pro']=  $this->products_details->get_product($guid);
                $data['row']=  $this->products_details->get_product_images($guid);
                
                
		$this->load->view('product_details/images',$data);
                $this->load->view('product_details/footer');
              }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }
            
        }
        function product_certificate($guid){
            if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                 $data['product_id']=$guid;
                $this->load->view('product_details/image_header',$data);
		$this->load->view('nav/index');
                $this->load->model('products_details');
               
                $data['pro']=  $this->products_details->get_product($guid);
                $data['row']=  $this->products_details->get_product_certificate($guid);
                
                
		$this->load->view('product_details/certificate',$data);
                $this->load->view('product_details/footer');
              }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }
            
        }
        function change_product_image(){
            $config['upload_path'] = './uploads/product_images';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '202100';
		$config['max_width']  = '11024';
		$config['max_height']  = '3768';
                $config['file_name']=$this->input->post('image_name');
                $config['overwrite'] = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                        echo $this->upload->display_errors();
		}
		else
		{       $upload_data = $this->upload->data();
                     $file_name =$upload_data['file_name'];
                   echo  $id=  $this->input->post('meta_id');
                      $this->load->model('products_details');
                      $description=  $this->input->post('description');
                      $this->products_details->update_image($id,$file_name,$description);
		}
        }
        function change_product_certificate(){
            $config['upload_path'] = './uploads/product_certificate';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '202100';
		$config['max_width']  = '11024';
		$config['max_height']  = '3768';
                $config['file_name']=$this->input->post('image_name');
                $config['overwrite'] = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                        echo $this->upload->display_errors();
		}
		else
		{       $upload_data = $this->upload->data();
                     $file_name =$upload_data['file_name'];
                   echo  $id=  $this->input->post('meta_id');
                      $this->load->model('products_details');
                      $description=  $this->input->post('description');
                      $this->products_details->update_certificate($id,$file_name,$description);
		}
        }
        function add_product_image(){
             $config['upload_path'] = './uploads/product_images';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '202100';
		$config['max_width']  = '11024';
		$config['max_height']  = '3768';
            	$this->load->model('products_details');	
                $guid=  $this->input->post('product_id');
		$max=$this->products_details->max_id($guid);
               
                $config['file_name']="An_$max";
                $config['overwrite'] = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                        echo $this->upload->display_errors();
		}
		else
		{       $upload_data = $this->upload->data();
                     $file_name =$upload_data['file_name'];
                    
                      $this->load->model('grains');
                      $description=  $this->input->post('description');
                      $this->products_details->add_image($guid,$file_name,$description);
		}
        }
        function add_product_certificate(){
             $config['upload_path'] = './uploads/product_certificate';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '202100';
		$config['max_width']  = '11024';
		$config['max_height']  = '3768';
            	$this->load->model('products_details');	
                $guid=  $this->input->post('product_id');
		$max=$this->products_details->max_id($guid);
               
                $config['file_name']="An_$max";
                $config['overwrite'] = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                        echo $this->upload->display_errors();
		}
		else
		{       $upload_data = $this->upload->data();
                     $file_name =$upload_data['file_name'];
                    
                      $this->load->model('grains');
                      $description=  $this->input->post('description');
                      $this->products_details->add_certificate($guid,$file_name,$description);
		}
        }
        function remove_image(){
            $guid=  $this->input->post('guid');
            $file_name=  $this->input->post('image_name');
            $this->load->model('products_details');
            $this->products_details->remove_image($guid);
            unlink(base_url()."/uploads/product_images/".$file_name);
            return 'TRUE';
                    
        }
        function add_product_over_view(){
            $over=  $this->input->post('over_text');
            $product=  $this->input->post('product_id');
            $this->load->model('products_details');
            $this->products_details->add_product_over_view($product,$over);
            echo 'TRUE';       
        }
        function add_product_source(){
            $over=  $this->input->post('source_text');
            $product=  $this->input->post('product_id');
            $this->load->model('products_details');
            $this->products_details->add_product_source($product,$over);
            echo 'TRUE';       
        }
        function add_product_benefits(){
            $over=  $this->input->post('benefits_text');
            $product=  $this->input->post('product_id');
            $this->load->model('products_details');
            $this->products_details->add_product_benefits($product,$over);
            echo 'TRUE';       
        }
        function add_product_culinary(){
            $over=  $this->input->post('culinary_text');
            $product=  $this->input->post('product_id');
            $this->load->model('products_details');
            $this->products_details->add_product_culinary($product,$over);
            echo 'TRUE';       
        }
        function add_product_description(){
            $over=  $this->input->post('description_text');
            $product=  $this->input->post('product_id');
            $this->load->model('products_details');
            $this->products_details->add_product_description($product,$over);
            echo 'TRUE';       
        }
        function get_product_meta(){
          $guid=  $this->input->post('guid');
           $key=$this->input->post('key');
                    
            $this->load->model('products_details');
            $data=  $this->products_details->get_product_meta($guid,$key);
            echo json_encode($data);
                    
        }
}
?>
