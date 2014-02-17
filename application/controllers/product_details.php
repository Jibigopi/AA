<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_details Extends CI_Controller
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
                $this->load->view('grain/header');
		$this->load->view('nav/index');
                $this->load->model('products_details');
                $data['row']=  $this->products_details->get_category();
                $data['sale']=  $this->products_details->sales_chanel();
		$this->load->view('grain/index',$data);
                $this->load->view('grain/footer');
              }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }
    }
    function data_table(){
		$aColumns = array( 'guid','guid','gcode','name','cat_name','dis','sku','guid','guid' );	
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
		$like =array('name'=>  $this->input->get_post('sSearch'),
				'gcode'=>  $this->input->get_post('sSearch'),
				'dis'=>  $this->input->get_post('sSearch'),
				'cat_name'=>  $this->input->get_post('sSearch'),
				
				);
				
			}
			$this->load->model('products_details');		
			$rResult1 = $this->products_details->products_details_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->products_details->count_grain();
		
		$iTotal =$this->products_details->count_grain();
		
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
