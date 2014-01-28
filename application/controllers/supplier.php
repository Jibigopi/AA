<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier Extends CI_Controller
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
                $this->load->view('supplier/header');
		$this->load->view('nav/index');
                $this->load->model('suppliers');
                $data['type']=  $this->suppliers->get_suppliers_type();
		$this->load->view('supplier/index',$data);
                $this->load->view('supplier/footer');
           }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }  
    }
    function data_table(){
		$aColumns = array( 'id','name','name','company','address','email','phone', 'id' );	
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
			 $this->load->model('suppliers');		   
			 $rResult1 = $this->suppliers->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->suppliers->count();
		
		$iTotal =$this->suppliers->count();
		
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
        if($this->input->post('supplier_id')){
			                $this->form_validation->set_rules('supplier','supplier', 'required');							
					$this->form_validation->set_rules('company','company', 'required');						
					$this->form_validation->set_rules('contact','contact', 'required');							
					$this->form_validation->set_rules('phone','phone', 'required');							
					$this->form_validation->set_rules('email','email', 'required');							
					$this->form_validation->set_rules('supplier_id','supplier_id', 'required');							
					if($this->form_validation->run()!=FALSE){
						 $supplier=  $this->input->post('supplier');
						 $email=  $this->input->post('email');
						 $contact=  $this->input->post('contact');
						 $phone=  $this->input->post('phone');
						 $company=  $this->input->post('company');
						 $supplier_id=  $this->input->post('supplier_id');
                                                 $city=  $this->input->post('city');
                                                 $state=  $this->input->post('state');
                                                 $zip=  $this->input->post('zip');
                                                 $country=  $this->input->post('country');
				$this->load->model('suppliers');
                                if($this->suppliers->check_update($supplier,$supplier_id)!=FALSE){
                                     echo 'TRUE';
                                     $this->suppliers->update($supplier_id,$supplier,$email,$company,$contact,$phone,$country,$city,$state,$zip);
                                     $this->suppliers->delete_supplier_types($supplier_id);
                                     $types=$this->input->post('types');
                                     foreach ($types as $row){
                                         $this->suppliers->add_supplier_types($supplier_id,$row);
                                     }
                                     
                                }else{
                                  echo 'FALSE';
                                }
                                                
                              }else{
                            echo 'FALSE';
                            }
        }else{
            echo  "FALSE";
        }
       
	}
	function add(){
	    if($this->input->post('supplier')){
					$this->form_validation->set_rules('supplier','supplier', 'required');							
					$this->form_validation->set_rules('company','company', 'required');						
					$this->form_validation->set_rules('contact','contact', 'required');							
					$this->form_validation->set_rules('phone','phone', 'required');							
					$this->form_validation->set_rules('email','email', 'valid_email|required');							
					if($this->form_validation->run()!=FALSE){
						 $supplier=  $this->input->post('supplier');
						 $email=  $this->input->post('email');
						 $contact=  $this->input->post('contact');
						 $phone=  $this->input->post('phone');
						 $company=  $this->input->post('company');
                                                 $city=  $this->input->post('city');
                                                 $state=  $this->input->post('state');
                                                 $zip=  $this->input->post('zip');
                                                 $country=  $this->input->post('country');
						 $this->load->model('suppliers');
                                                 if($this->suppliers->check($supplier)!=FALSE){
                                                       echo 'TRUE';
                                                    $id= $this->suppliers->add($supplier,$email,$phone,$contact,$company,$country,$city,$state,$zip);
                                                     $types=$this->input->post('types');
                                                     foreach ($types as $row){
                                                         $this->suppliers->add_supplier_types($id,$row);
                                                     }
                                                     
                                                 }else{                                                     
                                                      echo 'ALREADY';
                                                 }
                                                
                                        }else{
                                             echo 'FALSE';  
                                        }
        }else{
              echo 'FALSE';
        }
       
	}
	function delete(){
			$id=$this->input->post('guid');
			$this->load->model('suppliers');
			$this->suppliers->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_supplier($id){
                $this->load->model('suppliers');
                $data=$this->suppliers->get_selected_suppliers_types($id);
                 echo json_encode($data);
        }
        
} 
?>
