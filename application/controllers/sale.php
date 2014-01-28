<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale Extends CI_Controller
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
                $this->load->view('sale/header');
                $this->load->view('nav/index');
                $this->load->view('sale/index');
                $this->load->view('sale/footer');
             }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }
    }
    function data_table(){
		$aColumns = array( 'guid','invoice','invoice','customer','product','total','no_of_unit','provider', 'guid', 'guid');	
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
			 $this->load->model('sales');		   
			 $rResult1 = $this->sales->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->sales->count();
		
		$iTotal =$this->sales->count();
		
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
    
	function sale_grains($name){
	if($name!=""){
	 
	$this->load->model('users');
	$data=$this->users->get_grains_for_auto_complete($name);
		echo json_encode ($data);
	}
	}
	function update_sale(){
        
	    if($this->input->post('esale_id')){
					$this->form_validation->set_rules('estage','estage', 'required');	
					$this->form_validation->set_rules('etemp','etemp', 'required');							
					$this->form_validation->set_rules('eprice','eprice', 'required|max_length[12]|regex_match[/^[0-9]+$/]|xss_clean');	
					$this->form_validation->set_rules('esale','esale', 'required|max_length[12]|regex_match[/^[0-9]+$/]|xss_clean');	
					if($this->form_validation->run()!=FALSE){
						 $stage=  $this->input->post('estage');
						 $price=  $this->input->post('eprice');
						 $sale=  $this->input->post('esale');
						 $temp=$this->input->post('etemp');
						 $quty=$this->input->post('equty');	
						 $id=$this->input->post('esale_id');
						 $this->load->model('users');
							$this->users->update_sales($id,$quty,$price,$temp,$sale);							
							}else{
							
							return FALSE;
							}
							
							
						}else{
          return FALSE;
        }
	}
	function add_new_sale(){
      
	    if($this->input->post('add_sale')){
					$this->form_validation->set_rules('invoice','invoice', 'required');	
					$this->form_validation->set_rules('customer','customer', 'required');
					$this->form_validation->set_rules('product','product', 'required');							
					$this->form_validation->set_rules('pallet','pallet', 'required|xss_clean');	
					$this->form_validation->set_rules('price','price', 'required');	
					$this->form_validation->set_rules('no_of_unit','no_of_unit', 'required');	
					$this->form_validation->set_rules('shipping','shipping', 'required');	
					$this->form_validation->set_rules('tax','tax', 'required');	
					$this->form_validation->set_rules('total','total', 'required');	
					$this->form_validation->set_rules('order_received_date','order_received_date', 'required');	
					$this->form_validation->set_rules('processed_date','processed_date', 'required');	
					$this->form_validation->set_rules('shipping_date','shipping_date', 'required');	
					$this->form_validation->set_rules('delivery_date','delivery_date', 'required');	
                                        
					$this->form_validation->set_rules('provider','provider', 'required');	
					$this->form_validation->set_rules('received_by','received_by', 'required');	
					$this->form_validation->set_rules('customer_received','customer_received', 'required');	
					$this->form_validation->set_rules('payment','payment', 'required');	
					$this->form_validation->set_rules('invoice_paid_date','invoice_paid_date', 'required');	
					$this->form_validation->set_rules('returns','returns', 'required');	
					$this->form_validation->set_rules('notes','notes', 'required');	                                        
                                        if($this->form_validation->run()!=FALSE){
                                     $data=array('invoice'=>$this->input->post('invoice'),
						 'customer'=>  $this->input->post('customer'),
						 'product'=>  $this->input->post('product'),
						 'pallet'=>$this->input->post('pallet'),
						 'price'=>$this->input->post('price'),	
						 'no_of_unit'=>$this->input->post('no_of_unit'),
						 'shipping'=>$this->input->post('shipping'),
						 'tax'=>$this->input->post('tax'),
						 'total'=>$this->input->post('total'),
						 'order_received_date'=>$this->input->post('order_received_date'),
						 'processed_date'=>$this->input->post('processed_date'),
						 'delivery_date'=>$this->input->post('delivery_date'),
						 'shipping_date'=>$this->input->post('shipping_date'),
						 'no_of_unit'=>$this->input->post('no_of_unit'),
                                                 'provider'=>  $this->input->post('provider'),
						 'received_by'=>  $this->input->post('received_by'),
						 'customer_received'=>  $this->input->post('customer_received'),
						 'payment'=>  $this->input->post('payment'),
						 'invoice_paid_date'=>  $this->input->post('invoice_paid_date'),
						 'returns'=>  $this->input->post('returns'),
						 'notes'=>  $this->input->post('notes'));
						 $this->load->model('sales');
                                                 if($this->sales->check($this->input->post('invoice'))!=FALSE){
                                                 $this->sales->add_sales($data)   ;
                                                 redirect('sale');
                                                 }else{
                                                    $this->load->view('sale/header');
                                                    $this->load->view('nav/index');
                                                    $this->load->view('sale/add_sale');
                                                    $this->load->view('sale/footer');
                                                 }
                                        }else{
                                            $this->load->view('sale/header');
                                            $this->load->view('nav/index');
                                            $this->load->view('sale/add_sale');
                                            $this->load->view('sale/footer');
                                             
                                        }
        }
       
	}
	function update(){
      
	    if($this->input->post('update')){
                $guid=  $this->input->post('guid');
					
					$this->form_validation->set_rules('customer','customer', 'required');
					$this->form_validation->set_rules('product','product', 'required');							
					$this->form_validation->set_rules('pallet','pallet', 'required|xss_clean');	
					$this->form_validation->set_rules('price','price', 'required');	
					$this->form_validation->set_rules('no_of_unit','no_of_unit', 'required');	
					$this->form_validation->set_rules('shipping','shipping', 'required');	
					$this->form_validation->set_rules('tax','tax', 'required');	
					$this->form_validation->set_rules('total','total', 'required');	
					$this->form_validation->set_rules('order_received_date','order_received_date', 'required');	
					$this->form_validation->set_rules('processed_date','processed_date', 'required');	
					$this->form_validation->set_rules('shipping_date','shipping_date', 'required');	
					$this->form_validation->set_rules('delivery_date','delivery_date', 'required');	
                                        
					$this->form_validation->set_rules('provider','provider', 'required');	
					$this->form_validation->set_rules('received_by','received_by', 'required');	
					$this->form_validation->set_rules('customer_received','customer_received', 'required');	
					$this->form_validation->set_rules('payment','payment', 'required');	
					$this->form_validation->set_rules('invoice_paid_date','invoice_paid_date', 'required');	
					$this->form_validation->set_rules('returns','returns', 'required');	
					$this->form_validation->set_rules('notes','notes', 'required');	                                        
                                        if($this->form_validation->run()!=FALSE){
                                     $data=array(
						 'customer'=>  $this->input->post('customer'),
						 'product'=>  $this->input->post('product'),
						 'pallet'=>$this->input->post('pallet'),
						 'price'=>$this->input->post('price'),	
						 'no_of_unit'=>$this->input->post('no_of_unit'),
						 'shipping'=>$this->input->post('shipping'),
						 'tax'=>$this->input->post('tax'),
						 'total'=>$this->input->post('total'),
						 'order_received_date'=>$this->input->post('order_received_date'),
						 'processed_date'=>$this->input->post('processed_date'),
						 'delivery_date'=>$this->input->post('delivery_date'),
						 'shipping_date'=>$this->input->post('shipping_date'),
						 'no_of_unit'=>$this->input->post('no_of_unit'),
                                                 'provider'=>  $this->input->post('provider'),
						 'received_by'=>  $this->input->post('received_by'),
						 'customer_received'=>  $this->input->post('customer_received'),
						 'payment'=>  $this->input->post('payment'),
						 'invoice_paid_date'=>  $this->input->post('invoice_paid_date'),
						 'returns'=>  $this->input->post('returns'),
						 'notes'=>  $this->input->post('notes'));
						 $this->load->model('sales');
                                                       $this->sales->update_sale($data,$guid)   ;
                                                       redirect('sale');
                                              
                                        }else{
                                            $this->edit_sale($guid);
                                             
                                        }
        }else{
            redirect('sale');
        }
       
	}
	function delete_sale(){
			$id=$this->input->post('guid');
			$this->load->model('sales');
			$this->sales->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_sale($id){
		  $this->load->model('sales');
		  $data['sale']=$this->sales->edit_sale($id);
		  $this->load->view('sale/header');
                  $this->load->view('nav/index');
                  $this->load->view('sale/edit',$data);
                  $this->load->view('sale/footer');
                  
	}
        function add_sale(){
                $this->load->view('sale/header');
                $this->load->view('nav/index');
                $this->load->view('sale/add_sale');
                $this->load->view('sale/footer');
        }
        function customer($name){
                if($name!=""){	 
                    $this->load->model('sales');
                    $data=$this->sales->customer($name);
                    echo json_encode ($data);
                }
        }
        function grains($name){
                if($name!=""){	 
                    $this->load->model('sales');
                    $data=$this->sales->grains($name);
                    echo json_encode ($data);
                }
        }
        function get_customer($name){
                if($name!=""){	 
                    $this->load->model('sales');
                    $data=$this->sales->customer($name);
                    echo json_encode ($data);
                }
        }
        function get_product_details(){
            
        }
       
       
} 
?>
