<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_level Extends CI_Controller
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
                $this->load->view('stock_level/header');
		$this->load->view('nav/index');
		$this->load->view('stock_level/index');
                $this->load->view('stock_level/footer');
           }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }  
    }
    function data_table($location,$stage,$product){
      
		$aColumns = array( 'stage','stage','lname','product_name','sku','pallet_number','case_label','unit','case','pallet', 'id', );	
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
			 $this->load->model('stocks');		   
			 $rResult1 = $this->stocks->stock_level_data_table($end,$start,$order,$like,$product,$stage,$location);
		   
		$iFilteredTotal =$this->stocks->stock_level_count($end,$start,$order,$like,$product,$stage,$location);
		
		$iTotal =$this->stocks->stock_level_count($end,$start,$order,$like,$product,$stage,$location);
		
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
   function get_stage_details(){
        $name= $this->input->post('term');
            if($name!=""){
               $this->load->model('stocks');
               $data=$this->stocks->inventory_stage($name);    
              
           }
        
            echo json_encode($data);
   }
    
    
}
?>
