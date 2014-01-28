<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer Extends CI_Controller
{
    function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        session_start();
        
            if($_SESSION['user_type']!='admin'){
                redirect('ancientagro');
            }
       
    }
    function index(){
      if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('customer/header');
		$this->load->view('nav/index');
                $this->load->model('customer_types');
                $data['row']=  $this->customer_types->get_customer_types();
		$this->load->view('customer/index',$data);
                $this->load->view('customer/footer');
             }else{
              redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
            }
    }
    function data_table(){
		$aColumns = array( 'id','customer_type','name','customer_type','phone', 'email','address','shipping_address','id', );	
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
		$like =array('customer_type'=>  $this->input->get_post('sSearch'),
                             'shipping_address'=>  $this->input->get_post('sSearch'),
                             'phone'=>  $this->input->get_post('sSearch'),
                             'email'=>  $this->input->get_post('sSearch'));
				
			}
			 $this->load->model('customers');		   
			 $rResult1 = $this->customers->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->customers->count();
		
		$iTotal =$this->customers->count();
		
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
       if($this->input->post('customer_id')){
           $id=$this->input->post('customer_id');
					$this->form_validation->set_rules('firstname','firstname', 'required');							
					$this->form_validation->set_rules('lastname','lastname', 'required');							
					$this->form_validation->set_rules('address','address', 'required');							
					$this->form_validation->set_rules('shipping_address','shipping_address', 'required');							
					$this->form_validation->set_rules('finance_manager','finance_manager', 'required');							
					$this->form_validation->set_rules('email','email', 'valid_email|required');							
					$this->form_validation->set_rules('phone','phone', 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');					
					if($this->form_validation->run()!=FALSE){
						 $firstname=  $this->input->post('firstname');
						 $lastname=  $this->input->post('lastname');
						 $address=  $this->input->post('address');
						 $shipping_address=  $this->input->post('shipping_address');
						 $finance_manager=  $this->input->post('finance_manager');
						 $email=  $this->input->post('email');
						 $phone=  $this->input->post('phone');
						 $customer_type=  $this->input->post('customer_type');
						 $date_of_record=  $this->input->post('date_of_record');
						 $web=  $this->input->post('web');
						 $handed_of_day=  $this->input->post('handed_of_day');
						 $organic=  $this->input->post('organic');
						 $country=  $this->input->post('country');
						 $state=  $this->input->post('state');
						 $city=  $this->input->post('city');
						 $zip=  $this->input->post('zip');
						 $this->load->model('customers');
                                if($this->customers->check_update($id,$firstname)!=FALSE){
                                    echo 'TRUE';
                                     $this->customers->update($id,$firstname,$lastname,$address,$email,$phone,$shipping_address,$finance_manager,$date_of_record,$web,$handed_of_day,$customer_type,$organic,$country,$state,$city,$zip);
                                }else{
                                 echo 'FALSE';
                                }
                                                
                              }else{
                             echo 'FALSE';
                            }
        }else{
             echo 'FALSE';
        }
       
	}
	function add(){
	    if($this->input->post('firstname')){
					$this->form_validation->set_rules('firstname','firstname', 'required');							
					$this->form_validation->set_rules('lastname','lastname', 'required');							
					$this->form_validation->set_rules('address','address', 'required');							
					$this->form_validation->set_rules('shipping_address','shipping_address', 'required');							
					$this->form_validation->set_rules('finance_manager','finance_manager', 'required');							
					$this->form_validation->set_rules('email','email', 'valid_email|required');							
					$this->form_validation->set_rules('phone','phone', 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');					
					if($this->form_validation->run()!=FALSE){
						 $firstname=  $this->input->post('firstname');
						 $lastname=  $this->input->post('lastname');
						 $address=  $this->input->post('address');
						 $shipping_address=  $this->input->post('shipping_address');
						 $finance_manager=  $this->input->post('finance_manager');
						 $email=  $this->input->post('email');
						 $phone=  $this->input->post('phone');
						 $customer_type=  $this->input->post('customer_type');
						 $date_of_record=  $this->input->post('date_of_record');
						 $web=  $this->input->post('web');
						 $handed_of_day=  $this->input->post('handed_of_day');
						 $organic=  $this->input->post('organic');
                                                 $country=  $this->input->post('country');
						 $state=  $this->input->post('state');
						 $city=  $this->input->post('city');
						 $zip=  $this->input->post('zip');
						 $this->load->model('customers');
                                                 if($this->customers->check($firstname)!=FALSE){
                                                     $this->customers->add($firstname,$lastname,$address,$email,$phone,$shipping_address,$finance_manager,$date_of_record,$web,$handed_of_day,$customer_type,$organic,$country,$state,$city,$zip);
                                                     echo 'TRUE';
                                                 }else{                                                     
                                                   echo'FALSE';
                                                 }
                                                
                                        }else{
                                            echo'FALSE';
                                        }
        }else{
           echo'FALSE';
        }
       
	}
	function delete(){
			$id=$this->input->post('guid');
			$this->load->model('customers');
			$this->customers->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_customer($id){
		  $this->load->model('customers');
		  $data=$this->customers->edit_customer($id);
		  echo json_encode($data);
	}
        function customer_type($name){
	if($name!=""){
	 
	$this->load->model('customers');
	$data=$this->customers->customers_type($name);
		echo json_encode ($data);
	}
        }
        
} 
?>
