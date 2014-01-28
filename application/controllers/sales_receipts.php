<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_receipts extends CI_Controller{
     function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->helper('form');
         session_start();       
    }
     function index(){
        if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('sales_receipts/header');
		$this->load->view('nav/index');
		$this->load->view('sales_receipts/index');
                $this->load->view('sales_receipts/footer');
           }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }  
    }
    function data_table(){
		$aColumns = array( 'id','guid','invoice','receipient','cname','gname','address','address','no_of_unit','status', 'guid','guid' ,'sales_status');	
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
		$like =array('sales_order.number'=>  $this->input->get_post('sSearch'),'sales_order.invoice'=>  $this->input->get_post('sSearch'));
				
			}
			 $this->load->model('sales_receipts_m');		   
			 $rResult1 = $this->sales_receipts_m->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->sales_receipts_m->count();
		
		$iTotal =$this->sales_receipts_m->count();
		
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
   function add_new_sale($guid){
        $this->load->model('sales_receipts_m');
        $data=$this->sales_receipts_m->add_new_sale($guid);
        echo json_encode($data);
   }
   function get_invoice_details($guid){
        $this->load->model('sales_receipts_m');
        $data=$this->sales_receipts_m->get_invoice_details($guid);
        echo json_encode($data);
   }
   function add_sale() {
     
        if($this->input->post('sales_order_guid')){
					$this->form_validation->set_rules('invoice_number','invoice_number', 'required');							
					$this->form_validation->set_rules('sales_order_guid','sales_order_guid', 'required');							
					$this->form_validation->set_rules('shipping_provider','shipping_provider', 'required');							
					$this->form_validation->set_rules('shipping_date','shipping_date', 'required');							
					$this->form_validation->set_rules('delivery_date','delivery_date', 'required');							
					$this->form_validation->set_rules('customer_received_date','customer_received_date', 'required');							
                                        $this->form_validation->set_rules('invoice_paid_date','invoice_paid_date', 'required');																		
																					
					$this->form_validation->set_rules('received_by','received_by', 'required');							
					$this->form_validation->set_rules('grand_total','grand_total', 'required');							
					$this->form_validation->set_rules('shipping_cost','shipping_cost', 'shipping_cost');							
					$this->form_validation->set_rules('returns','returns', 'required');							
					$this->form_validation->set_rules('notes','notes', 'required');									
					if($this->form_validation->run()!=FALSE){
						$data=array('invoice_number'=> $this->input->post('invoice_number'),
						 'sales_order'=> $this->input->post('sales_order_guid'),
						 'shipping_provider'=> $this->input->post('shipping_provider'),
						 'shipping_date'=> $this->input->post('shipping_date'),
						 'delivery_date'=> $this->input->post('delivery_date'),
						 'customer_received_date'=> $this->input->post('customer_received_date'),						
						 'invoice_paid_date'=> $this->input->post('invoice_paid_date'),
						 'received_by'=> $this->input->post('received_by'),
						 'grand_total'=> $this->input->post('grand_total'),
						 'shipping_cost'=> $this->input->post('shipping_cost'),
                                                 'returns'=>  $this->input->post('returns'),
                                                 'cdph'=>  $this->input->post('cdph'),
                                                 'ccof'=>  $this->input->post('ccof'),
                                                 'notes'=>  $this->input->post('notes'));
                                             $this->load->model('sales_receipts_m');
                                             if($this->sales_receipts_m->check_sales($this->input->post('invoice_number'))!="FALSE"){
                                             $this->sales_receipts_m->add_sales($data,$this->input->post('sales_order_guid'));
                                             echo 'TRUE';
                                             }
                                              //echo 'TRUE';
                         }else{
                             echo "FALSE";
                         }


        } else{
            echo 'FALSE';
        }
   }
   function invoice_number($name){
                if($name!=""){	 
                    $this->load->model('sales_receipts_m');
                    $data=$this->sales_receipts_m->invoice_number($name);
                    echo json_encode ($data);
                }
   }
   function get_invoice(){
         $data=array();
              if($this->input->post('guid')){
                    $data['sataus']='TRUE'  ;
                    $name=  $this->input->post('guid');
                    $this->load->model('sales_receipts_m');
                    $data[]= $this->sales_receipts_m->get_invoice($name);            
              }else{
                 $data['sataus']='FALSE'  ;
              }
               echo json_encode($data);
   }
   function get_sales_order_details(){
         $name= $this->input->post('term');
            if($name!=""){
               $this->load->model('stocks');
               $data=$this->stocks->get_sales_order_details($name);    
               echo json_encode($data);
           }
           
   }
   
}
?>
