<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_type Extends CI_Controller
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
                $this->load->view('customer_type/header');
		$this->load->view('nav/index');
		$this->load->view('customer_type/index');
                $this->load->view('customer_type/footer');
            }else{
              redirect('ancientagro/dashboard');  
            }
            
            }else{
                redirect('admin');
            }
        }    
    
    function data_table(){
		$aColumns = array( 'guid','type','type', 'guid', );	
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
		$like =array('type'=>  $this->input->get_post('sSearch'));
				
			}
			 $this->load->model('customer_types');		   
			 $rResult1 = $this->customer_types->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->customer_types->count();
		
		$iTotal =$this->customer_types->count();
		
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
        if($this->input->post('ecustomer_type')){
			$this->form_validation->set_rules('ecustomer_type','ecustomer_type', 'required');							
			$this->form_validation->set_rules('customer_type_id','customer_type_id', 'required');							
			if($this->form_validation->run()!=FALSE){
				echo $ecustomer_type=  $this->input->post('ecustomer_type');
				$customer_type_id=  $this->input->post('customer_type_id');
				$this->load->model('customer_types');
                                if($this->customer_types->check_update($ecustomer_type,$customer_type_id)!=FALSE){
                                   
                                     $this->customer_types->update($ecustomer_type,$customer_type_id);
                                     echo "TRUE";
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
	function add(){
	    if($this->input->post('customer_type')){
					$this->form_validation->set_rules('customer_type','customer_type', 'required');							
					if($this->form_validation->run()!=FALSE){
						 $customer_type=  $this->input->post('customer_type');
						 $this->load->model('customer_types');
                                                 if($this->customer_types->check($customer_type)!=FALSE){
                                                     $this->customer_types->add($customer_type);
                                                     echo "TRUE";
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
			$this->load->model('customer_types');
			$this->customer_types->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_customer_type($id){
		  $this->load->model('customer_types');
		  $data=$this->customer_types->edit_customer_type($id);
		  echo json_encode($data);
	}
        
} 
?>
