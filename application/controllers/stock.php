<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock Extends CI_Controller
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
                $this->load->model('stocks');
                $data['row']=  $this->stocks->get_stages();
                $this->load->view('stock/header');
		$this->load->view('nav/index');
		$this->load->view('stock/index',$data);
                $this->load->view('stock/footer');
             }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }
    }
    function stock_data_table($stage){
                $stage=urldecode($stage);
		$aColumns = array( 'id','sname','stock_id','sname','gname','sku','date','best_buy_date','lname', 'guid','guid' );	
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
		$like =array('grain_name'=>  $this->input->get_post('sSearch'));				
			}
			$this->load->model('stocks');		  
			$rResult1 = $this->stocks->stock_data_table($end,$start,$order,$like,$stage);		   
		$iFilteredTotal =$this->stocks->count_stock($stage);		
		$iTotal =$this->stocks->count_stock($stage);		
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
	function location_destination($name){
	if($name!=""){
	 
	$this->load->model('stocks');
	$data=$this->stocks->get_location_for_auto_complete($name);
		echo json_encode ($data);
	}
	}
	function suppliers($name){
	if($name!=""){
	 
	$this->load->model('stocks');
	$data=$this->stocks->get_suppliers_for_auto_complete($name);
		echo json_encode ($data);
	}
	}
	function update_stock(){
      
	    if($this->input->post('edit_id')){
               $guid= $this->input->post('edit_id');
					$this->form_validation->set_rules('supplier_id','supplier_id', 'required');	
					$this->form_validation->set_rules('grain_id','grain_id', 'required');	
					$this->form_validation->set_rules('stage','stage', 'required');							
				
					$this->form_validation->set_rules('no_of_unit','no_of_unit', 'required');							
					$this->form_validation->set_rules('unit_purchase_price','unit_purchase_price', 'required');							
					$this->form_validation->set_rules('unit_sales_price','unit_sales_price', 'required');							
					$this->form_validation->set_rules('amount_for_unit','amount_for_unit', 'required');							
					$this->form_validation->set_rules('no_boxes','no_boxes', 'required');							
					$this->form_validation->set_rules('case_purchase_price','case_purchase_price', 'required');							
					$this->form_validation->set_rules('case_sales_price','case_sales_price', 'required');							
					$this->form_validation->set_rules('amount_for_case','amount_for_case', 'required');							
					$this->form_validation->set_rules('no_of_unit_each_case','no_of_unit_each_case', 'required');							
					$this->form_validation->set_rules('no_of_pallet','no_of_pallet', 'required');							
					$this->form_validation->set_rules('pallet_purchase_price','pallet_purchase_price', 'required');							
					$this->form_validation->set_rules('pallet_sales_price','pallet_sales_price', 'required');							
					$this->form_validation->set_rules('amount_for_pallet','amount_for_pallet', 'required');									
					$this->form_validation->set_rules('location_name_add','location_name_add', 'required');							
					$this->form_validation->set_rules('no_of_unit_each_case','no_of_unit_each_case', 'required');							
					
				        if($this->form_validation->run()!=FALSE){
						 $data=array(
						 'grain_id'=>  $this->input->post('grain_id'),
						 'case_label'=>  $this->input->post('case_label'),
						 'best_buy_date'=>  $this->input->post('best_buy_date'),
						 'pallet_number'=>  $this->input->post('pallet'),
						 'supplier'=>  $this->input->post('supplier_id'),                                                 
						 'no_of_unit'=>  $this->input->post('no_of_unit'),
						 'unit_purchase_price'=>  $this->input->post('unit_purchase_price'),
						 'unit_sales_price'=>  $this->input->post('unit_sales_price'),
						 'amount_for_unit'=>  $this->input->post('amount_for_unit'),                                                 
						 'no_case'=>  $this->input->post('no_boxes'),
						 'case_purchase_price'=>  $this->input->post('case_purchase_price'),
						 'case_sales_price'=>  $this->input->post('case_sales_price'),
						 'amount_for_case'=>  $this->input->post('amount_for_case'),
						 'no_of_unit_each_case'=>  $this->input->post('no_of_unit_each_case'),                                                 
						 'no_pallet'=>  $this->input->post('no_of_pallet'),
						 'pallet_purchase_price'=>  $this->input->post('pallet_purchase_price'),
						 'pallet_sales_price'=>  $this->input->post('pallet_sales_price'),
						 'amount_for_pallet'=>  $this->input->post('amount_for_pallet'),
						 'no_of_case_each_pallet'=>  $this->input->post('no_of_case_each_pallet'),                                                 
						 'location'=>  $this->input->post('location_name_add'));
						  $unit=$this->input->post('no_of_unit');
                                               $case=$this->input->post('no_boxes');
                                               $pallet=$this->input->post('no_of_pallet');
                                               $unit_price=$this->input->post('unit_sales_price');
                                               $case_price=$this->input->post('case_sales_price');
                                               $pallet_price=$this->input->post('pallet_sales_price');
                                               $product=  $this->input->post('grain_id');
                                                 $this->load->model('stocks');
							$this->stocks->update_stocks($guid,$data,$unit,$unit_price,$case,$case_price,$pallet,$pallet_price,$product,$this->input->post('case_label'),$this->input->post('pallet'),$this->input->post('location_name_add'),$this->input->post('stage'));	
                                                        echo "TRUE";                                                       
                                        }else{							
							 echo 'FALSE';
					}
					}else{
          echo 'FALSE';
        }
	}
	function add_new_stock(){
        $stage=  $this->input->post('stage');
	    if($this->input->post('grain_id')){
					$this->form_validation->set_rules('supplier_id','supplier_id', 'required');	
					$this->form_validation->set_rules('grain_id','grain_id', 'required');	
					$this->form_validation->set_rules('case_label','case_label', 'required');	
					$this->form_validation->set_rules('pallet','pallet', 'required');	
					//$this->form_validation->set_rules('stage','stage', 'required');							
					$this->form_validation->set_rules('stock_id','stock_id', 'required');							
					$this->form_validation->set_rules('no_of_unit','no_of_unit', 'required');							
					$this->form_validation->set_rules('unit_purchase_price','unit_purchase_price', 'required');							
					$this->form_validation->set_rules('unit_sales_price','unit_sales_price', 'required');							
					//$this->form_validation->set_rules('amount_for_unit','amount_for_unit', 'required');							
					$this->form_validation->set_rules('no_boxes','no_boxes', 'required');							
					$this->form_validation->set_rules('case_purchase_price','case_purchase_price', 'required');							
					$this->form_validation->set_rules('case_sales_price','case_sales_price', 'required');							
					//$this->form_validation->set_rules('amount_for_case','amount_for_case', 'required');							
					$this->form_validation->set_rules('no_of_unit_each_case','no_of_unit_each_case', 'required');							
					$this->form_validation->set_rules('no_of_pallet','no_of_pallet', 'required');							
					$this->form_validation->set_rules('pallet_purchase_price','pallet_purchase_price', 'required');							
					$this->form_validation->set_rules('pallet_sales_price','pallet_sales_price', 'required');							
					//$this->form_validation->set_rules('amount_for_pallet','amount_for_pallet', 'required');									
					$this->form_validation->set_rules('location_name_add','location_name_add', 'required');							
					$this->form_validation->set_rules('no_of_unit_each_case','no_of_unit_each_case', 'required');							
					
				        if($this->form_validation->run()!=FALSE){
						 $data=array(
						 'grain_id'=>  $this->input->post('grain_id'),
						 'stage'=>  $this->input->post('stage'),
						 'stock_id'=>  $this->input->post('stock_id'),
						 'case_label'=>  $this->input->post('case_label'),
						 'best_buy_date'=>  $this->input->post('best_buy_date'),
						 'pallet_number'=>  $this->input->post('pallet'),
						 'supplier'=>  $this->input->post('supplier_id'),                                                 
						 'no_of_unit'=>  $this->input->post('no_of_unit'),
						 'unit_purchase_price'=>  $this->input->post('unit_purchase_price'),
						 'unit_sales_price'=>  $this->input->post('unit_sales_price'),
						 'amount_for_unit'=>  $this->input->post('amount_for_unit'),                                                 
						 'no_case'=>  $this->input->post('no_boxes'),
						 'case_purchase_price'=>  $this->input->post('case_purchase_price'),
						 'case_sales_price'=>  $this->input->post('case_sales_price'),
						 'amount_for_case'=>  $this->input->post('amount_for_case'),
						 'no_of_unit_each_case'=>  $this->input->post('no_of_unit_each_case'),                                                 
						 'no_pallet'=>  $this->input->post('no_of_pallet'),
						 'pallet_purchase_price'=>  $this->input->post('pallet_purchase_price'),
						 'pallet_sales_price'=>  $this->input->post('pallet_sales_price'),
						 'amount_for_pallet'=>  $this->input->post('amount_for_pallet'),
						 'no_of_case_each_pallet'=>  $this->input->post('no_of_case_each_pallet'),                                                 
                                                     'date'=> date("Y/m/d"),
						 'location'=>  $this->input->post('location_name_add'));					
						 
                                               $unit=$this->input->post('no_of_unit');
                                               $case=$this->input->post('no_boxes');
                                               $pallet=$this->input->post('no_of_pallet');
                                               $unit_price=$this->input->post('unit_sales_price');
                                               $case_price=$this->input->post('case_sales_price');
                                               $pallet_price=$this->input->post('pallet_sales_price');
                                               $product=  $this->input->post('grain_id');
                                               
						 $this->load->model('stocks');
                                                 if($this->stocks->already($this->input->post('stock_id'))!=FALSE){ 
                                                      echo "TRUE";
                                                     $this->stocks->add_stock($data,$unit,$unit_price,$case,$case_price,$pallet,$pallet_price,$product,$this->input->post('case_label'),$this->input->post('pallet'),$this->input->post('location_name_add'),$this->input->post('stage'));
                                                
                                                 }else{
                                                 echo "alredy";
                                                 }
                                                 
                                        }else{
                                             echo "False";
                                        }
        }  else {
        echo "jibi"    ;
        }
	}
	function receiving_note(){ 
	    if($this->input->post('stock_id')){
					$this->form_validation->set_rules('delivery_date','delivery_date', 'required');	
					$this->form_validation->set_rules('received_by','received_by', 'required');
					$this->form_validation->set_rules('received_date','received_date', 'required');							
					$this->form_validation->set_rules('invoice_no','invoice_no', 'required');							
				        $this->form_validation->set_rules('accounts','accounts', 'required');				
				  	if($this->form_validation->run()!=FALSE){
						 $delivery_date=  $this->input->post('delivery_date');
						 $received_by=  $this->input->post('received_by');
						 $received_date=  $this->input->post('received_date');
						 $invoice_no=  $this->input->post('invoice_no');
						 $accounts=$this->input->post('accounts');
						 $stock_guid=$this->input->post('stock_id');
						 $delivery_status=$this->input->post('delivery_status');
						 $invoice_status=$this->input->post('invoice_status');                                                 
						 $this->load->model('stocks');                                     
                                                 if($this->stocks->check_stock_is_valid($stock_guid)!=FALSE){ 
                                                     echo "TRUE";
                                                     $this->stocks->receiving_notes($stock_guid,$delivery_date,$received_by,$received_date,$accounts,$invoice_no,$invoice_status,$delivery_status);
                                                 }
                                        }else{
                                             echo "False";
                                        }
                    }else{
                         echo "False";
                    }
	}
	function inventory_withdrawals(){ 
	    if($this->input->post('stock_id')){
					$this->form_validation->set_rules('date','date', 'required');	
					$this->form_validation->set_rules('label','label', 'required');
					$this->form_validation->set_rules('pallet_serial_no','pallet_serial_no', 'required');				
				  	if($this->form_validation->run()!=FALSE){
						 $date=  $this->input->post('date');
						 $label=  $this->input->post('label');
						 $pallet_serial_no=  $this->input->post('pallet_serial_no');
						 $issue_type=  $this->input->post('issue_type');						 
						 $stock_guid=$this->input->post('stock_id');                                                 
						 $this->load->model('stocks');                                     
                                                 if($this->stocks->check_stock_is_valid($stock_guid)!=FALSE){ 
                                                     echo "TRUE";
                                                     $this->stocks->inventory_withdrawals($stock_guid,$issue_type,$date,$label,$pallet_serial_no);
                                                 }
                                        }else{
                                             echo "False";
                                        }
                    }else{
                         echo "False";
                    }
	}
	function inventory_location(){ 
	    if($this->input->post('stock_id')){
					$this->form_validation->set_rules('used','used', 'required');	
					$this->form_validation->set_rules('transport','transport', 'required');
					$this->form_validation->set_rules('temperature','temperature', 'required');				
				  	if($this->form_validation->run()!=FALSE){
						 $used=  $this->input->post('used');
						 $transport=  $this->input->post('transport');
						 $temperature=  $this->input->post('temperature');						 
						 $stock_guid=$this->input->post('stock_id');                                                 
						 $this->load->model('stocks');                                     
                                                 if($this->stocks->check_stock_is_valid($stock_guid)!=FALSE){ 
                                                     echo "TRUE";
                                                     $this->stocks->inventory_location($stock_guid,$transport,$temperature,$used);
                                                 }
                                        }else{
                                             echo "False";
                                        }
                    }else{
                         echo "False";
                    }
	}
	function inventory_transfers(){ 
	    if($this->input->post('stock_id')){
					$this->form_validation->set_rules('date','date', 'required');	
					$this->form_validation->set_rules('destination_id','destination_id', 'required');				
					$this->form_validation->set_rules('authorized_by','authorized_by', 'required');				
					$this->form_validation->set_rules('transport_vender','transport_vender', 'required');				
					$this->form_validation->set_rules('milage','milage', 'required');				
					$this->form_validation->set_rules('reason_moved','reason_moved', 'required');				
							
				  	if($this->form_validation->run()!=FALSE){
						 $date=  $this->input->post('date');						
						 $destination=  $this->input->post('destination_id');
						 $authorized_by=  $this->input->post('authorized_by');						 
						 $transport_vender=$this->input->post('transport_vender');                                                 
						 $milage=$this->input->post('milage');                                                 
						 $reason_moved=$this->input->post('reason_moved');                                                 
						 $unit='' ;                                                
						 $stock_guid=$this->input->post('stock_id');                                                 
						 $this->load->model('stocks');                                     
                                                 if($this->stocks->check_stock_is_valid($stock_guid)!=FALSE){ 
                                                     echo "TRUE";
                                                     $this->stocks->inventory_transfers($stock_guid,$date,$destination,$authorized_by,$transport_vender,$reason_moved,$unit,$milage);
                                                 }
                                        }else{
                                             echo "False";
                                        }
                    }else{
                         echo "False";
                    }
	}
	function delete_stock(){
			$id=$this->input->post('guid');
			$this->load->model('stocks');
			$this->stocks->delete_stock($id);
                          echo 'TRUE';
		
	}		
	function edit_stock($id){
		  $this->load->model('stocks');
		  $data=$this->stocks->edit_stock($id);
		  echo json_encode($data);
	}
	function get_receiving_notes($id){
		  $this->load->model('stocks');
		  $data=$this->stocks->get_receiving_notes($id);
		  echo json_encode($data);
	}
	function get_inventory_withdrawals($id){
		  $this->load->model('stocks');
		  $data=$this->stocks->get_inventory_withdrawals($id);
		  echo json_encode($data);
	}
	function get_inventory_transfers($id){
		  $this->load->model('stocks');
		  $data=$this->stocks->get_inventory_transfers($id);
		  echo json_encode($data);
	}
	function get_loction($id){
		  $this->load->model('stocks');
		  $data=$this->stocks->get_loction($id);
		  echo json_encode($data);
	}
        function get_grains_details(){
            $name= $this->input->post('term');
            if($name!=""){
               $this->load->model('stocks');
               $data=$this->stocks->get_grains_details($name);    
               echo json_encode($data);
           }
        }
        function get_location_details(){
            $name= $this->input->post('term');
            if($name!=""){
               $this->load->model('stocks');
               $data=$this->stocks->get_location_details($name);    
               echo json_encode($data);
           }
        }
        function get_supplier_details(){
            $name= $this->input->post('term');
            if($name!=""){
               $this->load->model('stocks');
               $data=$this->stocks->get_supplier_details($name);    
               echo json_encode($data);
           }
           
        }
        function get_customer_details(){
            $name= $this->input->post('term');
            if($name!=""){
               $this->load->model('stocks');
               $data=$this->stocks->get_customer_details($name);    
               echo json_encode($data);
           }
           
        }
        function get_storage_location_id(){
            $data=array();
              if($this->input->post('guid')){
                   $data['sataus']='TRUE'  ;
                    $name=  $this->input->post('guid');
                    $this->load->model('stocks');
                    $data[]= $this->stocks->get_storage_location_id($name);            
              }else{
                   $data['sataus']='FALSE'  ;
              }
               echo json_encode($data);
        }
         function generate_order_number(){
            $this->load->model('stocks');
            $data=  $this->stocks->generate_number();
              $data='AA-SO-110'.$data;
             echo json_encode($data);
        }
        
} 
?>
