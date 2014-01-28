<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storage_location Extends CI_Controller
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
                $this->load->view('storage_location/header');
		$this->load->view('nav/index');
		$this->load->view('storage_location/index');
                $this->load->view('storage_location/footer');
           }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }  
    }
    function data_table(){
		$aColumns = array( 'id','name','name','contact','email','price','total_sqr_ft', 'id' );	
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
		$like =array('name'=>  $this->input->get_post('sSearch'));
				
			}
			 $this->load->model('storage_locations');		   
			 $rResult1 = $this->storage_locations->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->storage_locations->count();
		
		$iTotal =$this->storage_locations->count();
		
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
        if($this->input->post('storage_location_id')){									
			$this->form_validation->set_rules('storage_location_id','storage_location_id', 'required');							
			$this->form_validation->set_rules('storage_location','storage_location', 'required');							
                        $this->form_validation->set_rules('available','available', 'required');							
                        $this->form_validation->set_rules('price','price', 'required');							
                        $this->form_validation->set_rules('contact','contact', 'required');							
                        $this->form_validation->set_rules('phone','phone', 'required');							
                        $this->form_validation->set_rules('email','email', 'required');							
					if($this->form_validation->run()!=FALSE){
						 $storage_location=  $this->input->post('storage_location');
						 $email=  $this->input->post('email');
						 $price=  $this->input->post('price');
						 $contact=  $this->input->post('contact');
						 $phone=  $this->input->post('phone');
						 $available=  $this->input->post('available');
                                                 $storage_location_id=  $this->input->post('storage_location_id');
				$this->load->model('storage_locations');
                                if($this->storage_locations->check_update($storage_location,$storage_location_id)!=FALSE){
                                    echo 'false3';
                                     $this->storage_locations->update($storage_location,$storage_location_id,$phone,$email,$contact,$available,$price);
                                }else{
                                    echo 'false3';
                                   return FALSE;
                                }
                                                
                              }else{
                          echo "FALSE";
                            }
        }else{
            return FALSE;
        }
       
	}
	function add(){
	    if($this->input->post('storage_location')){
					$this->form_validation->set_rules('storage_location','storage_location', 'required');							
					$this->form_validation->set_rules('available','available', 'required');							
					$this->form_validation->set_rules('price','price', 'required');							
					$this->form_validation->set_rules('contact','contact', 'required');							
					$this->form_validation->set_rules('phone','phone', 'required');							
					$this->form_validation->set_rules('email','email', 'required');							
					if($this->form_validation->run()!=FALSE){
						 $storage_location=  $this->input->post('storage_location');
						 $email=  $this->input->post('email');
						 $price=  $this->input->post('price');
						 $contact=  $this->input->post('contact');
						 $phone=  $this->input->post('phone');
						 $available=  $this->input->post('available');
						 $this->load->model('storage_locations');
                                                 if($this->storage_locations->check($storage_location)!=FALSE){
                                                     $this->storage_locations->add($storage_location,$email,$phone,$price,$contact,$available);
                                                 }else{                                                     
                                                     return FALSE;
                                                 }
                                                
                                        }else{
                                            return FALSE;   
                                        }
        }else{
            return FALSE;
        }
       
	}
	function delete(){
			$id=$this->input->post('guid');
			$this->load->model('storage_locations');
			$this->storage_locations->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_storage_location($id){
		  $this->load->model('storage_locations');
		  $data=$this->storage_locations->edit_storage_location($id);
		  echo json_encode($data);
	}
        
} 
?>
