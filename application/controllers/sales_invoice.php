<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_invoice extends CI_Controller{
     function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->helper('form');
         session_start();       
    }
     function index(){
        if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('sales_invoice/header');
		$this->load->view('nav/index');
		$this->load->view('sales_invoice/index');
                $this->load->view('sales_invoice/footer');
           }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }  
    }
    function invoice($guid){
    
        $this->load->model('sales_orders');
        $data['row']= $this->sales_orders->get_invoice($guid);   
        $this->load->view('sales_invoice/invoice',$data);
    }
     function data_table(){
		$aColumns = array( 'id','guid','invoice','receipient','cname','gname','address','address','no_of_unit','status', 'guid','guid','sales_status' );	
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
			 $rResult1 = $this->sales_orders->invoice_data_table($end,$start,$order,$like);
		   
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
        
} 
?>
