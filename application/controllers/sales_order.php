<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_order extends CI_Controller{
     function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->helper('form');
         session_start();       
    }
     function index(){
        if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('sales_order/header');
		$this->load->view('nav/index');
		$this->load->view('sales_order/index');
                $this->load->view('sales_order/footer');
           }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }  
    }
    function data_table(){
		$aColumns = array( 'id','guid','number','receipient','cname','gname','address','address','no_of_unit','status', 'guid','guid' );	
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
		$like =array('number'=>  $this->input->get_post('sSearch'),'invoice'=>  $this->input->get_post('sSearch'));
				
			}
			 $this->load->model('sales_orders');		   
			 $rResult1 = $this->sales_orders->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->sales_orders->count();
		
		$iTotal =$this->sales_orders->count();
		
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
        if($this->input->post('sales_order_guid')){									
										
											
					$this->form_validation->set_rules('order_received_date','order_received_date', 'required');							
					$this->form_validation->set_rules('customer_id','customer_id', 'required');							
					$this->form_validation->set_rules('recipient','recipient', 'required');							
					$this->form_validation->set_rules('address','address', 'required');							
					$this->form_validation->set_rules('product_id','product_id', 'required');																		
					$this->form_validation->set_rules('tax','tax', 'required');							
					$this->form_validation->set_rules('grand_total','grand_total', 'required');							
					$this->form_validation->set_rules('discount','discount', 'required');							
					$this->form_validation->set_rules('payment','payment', 'required');							
					$this->form_validation->set_rules('description','description', 'required');							
					$this->form_validation->set_rules('total_price','total_price', 'required');							
					$this->form_validation->set_rules('grand_total','grand_total', 'required');							
					if($this->form_validation->run()!=FALSE){
						$data=array(
						 'date_created'=> $this->input->post('order_received_date'),
						 'customer'=> $this->input->post('customer_id'),
						 'receipient'=> $this->input->post('recipient'),
						 'address'=> $this->input->post('address'),
						 'product'=> $this->input->post('product_id'),						
						 'tax'=> $this->input->post('tax'),
						 'discount'=> $this->input->post('discount'),
						 'payment_term'=> $this->input->post('payment'),
						 'description'=> $this->input->post('description'),
                                                 'no_of_unit'=>  $this->input->post('no_of_unit'),
                                                 'price'=>  $this->input->post('unit_price'),
                                                 'amount_for_unit'=>  $this->input->post('total_price_for_unit'),                                                    
                                                'case_unit'=>  $this->input->post('no_of_case'),
                                                'case_price'=>  $this->input->post('case_price'),
                                                'case_amount'=>  $this->input->post('total_price_for_case'),                                                    
                                                'pallet_price'=>  $this->input->post('pallet_price'),
                                                'pallet_unit'=>  $this->input->post('no_of_pallet'),
                                                'pallet_amount'=>  $this->input->post('total_price_for_pallet'),                                                  
                                                'total_price'=>  $this->input->post('total_price'),                                                  
                                                'grand_total'=>  $this->input->post('grand_total')                                              
                                                    
                                                    );
                                                 
				$this->load->model('sales_orders');                                
                                $this->sales_orders->update($this->input->post('sales_order_guid'),$data);
                                     echo "TRUE";            
                              }else{
                          echo "FALSE";
                            }
        }else{
           echo " FALSE";
        }
       
	}
	function add(){
	    if($this->input->post('sales_order')){
					$this->form_validation->set_rules('sales_order','sales_order', 'required');							
					$this->form_validation->set_rules('order_received_date','order_received_date', 'required');							
					$this->form_validation->set_rules('customer_id','customer_id', 'required');							
					$this->form_validation->set_rules('recipient','recipient', 'required');							
					$this->form_validation->set_rules('address','address', 'required');							
					$this->form_validation->set_rules('product_id','product_id', 'required');																		
					$this->form_validation->set_rules('tax','tax', 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');							
					//$this->form_validation->set_rules('grand_total','grand_total', 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');							
					$this->form_validation->set_rules('discount','discount', 'required');							
					$this->form_validation->set_rules('payment','payment', 'required');							
					$this->form_validation->set_rules('stage_id','stage_id', 'required');							
					$this->form_validation->set_rules('description','description', 'required');							
					$this->form_validation->set_rules('total_price','total_price', 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');							
					$this->form_validation->set_rules('grand_total','grand_total', 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');							
					if($this->form_validation->run()!=FALSE){
						$data=array('number'=> $this->input->post('sales_order'),
						 'date_created'=> $this->input->post('order_received_date'),
						 'customer'=> $this->input->post('customer_id'),
						 'receipient'=> $this->input->post('recipient'),
						 'address'=> $this->input->post('address'),
						 'product'=> $this->input->post('product_id'),						
						 'stage'=> $this->input->post('stage_id'),						
						 'tax'=> $this->input->post('tax'),
						 'discount'=> $this->input->post('discount'),
						 'payment_term'=> $this->input->post('payment'),
						 'description'=> $this->input->post('description'),
                                                 'no_of_unit'=>  $this->input->post('no_of_unit'),
                                                 'price'=>  $this->input->post('unit_price'),
                                                 'amount_for_unit'=>  $this->input->post('total_price_for_unit'),                                                    
                                                'case_unit'=>  $this->input->post('no_of_case'),
                                                'case_price'=>  $this->input->post('case_price'),
                                                'case_amount'=>  $this->input->post('total_price_for_case'),                                                    
                                                'pallet_price'=>  $this->input->post('pallet_price'),
                                                'pallet_unit'=>  $this->input->post('no_of_pallet'),
                                                'pallet_amount'=>  $this->input->post('total_price_for_pallet'),                                                  
                                                'total_price'=>  $this->input->post('total_price'),                                                  
                                                'grand_total'=>  $this->input->post('grand_total')                                              
                                                    
                                                    );
                                                
                                                
						 $this->load->model('sales_orders');
                                                 
                                                 if($this->sales_orders->check($this->input->post('sales_order'))!=FALSE){
                                                    echo "TRUE";
                                                     $this->sales_orders->add($data);
                                                 }else{                                                     
                                                    echo "FALSE";
                                                 }
                                                
                                        }else{
                                           echo "FALSE";
                                        }
        }else{
            echo "FALSE";
        }
       
	}
	function delete(){
			$id=$this->input->post('guid');
			$this->load->model('sales_orders');
			$this->sales_orders->delete($id);
                          echo 'TRUE';
		
	}		
	function approve(){
			$id=$this->input->post('guid');
			$this->load->model('sales_orders');
			$this->sales_orders->approve($id);
                          echo 'TRUE';
		
	}		
	function edit_sales_order($id){
		  $this->load->model('sales_orders');
		  $data=$this->sales_orders->edit_sales_order($id);
		  echo json_encode($data);
	}
        
        function customer() {
              $data=array();
              if($this->input->post('guid')){
                    $data['sataus']='TRUE'  ;
                    $name=  $this->input->post('guid');
                    $this->load->model('sales_orders');
                    $data[]= $this->sales_orders->customer($name);            
              }else{
                  // $data['sataus']='FALSE'  ;
              }
               echo json_encode($data);
            
        }
        function get_grain_details(){
            $data=array();
              if($this->input->post('guid')&&$this->input->post('stage')){
                    $data['sataus']='TRUE'  ;
                    $name=  $this->input->post('guid');
                    $stage=  $this->input->post('stage');
                    $this->load->model('sales_orders');
                    $data[]= $this->sales_orders->get_grains_details($name,$stage);            
              }else{
                  // $data['sataus']='FALSE'  ;
              }
               echo json_encode($data);
        }
        function generate_order_number(){
            $this->load->model('sales_orders');
        $data=  $this->sales_orders->generate_number();
          $data='AA-SO-110'.$data;
         echo json_encode($data);
        }
} 
?>
