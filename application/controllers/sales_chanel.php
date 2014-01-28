<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_chanel Extends CI_Controller
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
                $this->load->view('sales_chanel/header');
		$this->load->view('nav/index');
		$this->load->view('sales_chanel/index');
                $this->load->view('sales_chanel/footer');
                }else{
                   redirect('ancientagro/dashboard');  
                }            
            }else{
                redirect('admin');
            }
    }
    function data_table(){
		$aColumns = array( 'id','name','name', 'id','web' );	
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
			 $this->load->model('sales_chanels');		   
			 $rResult1 = $this->sales_chanels->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->sales_chanels->count();
		
		$iTotal =$this->sales_chanels->count();
		
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
        if($this->input->post('esales_chanel')){
			$this->form_validation->set_rules('esales_chanel','esales_chanel', 'required');							
			$this->form_validation->set_rules('esales_chanel_id','esales_chanel_id', 'required');							
			if($this->form_validation->run()!=FALSE){
				echo $esales_chanel=  $this->input->post('esales_chanel');
				$sales_chanel_id=  $this->input->post('esales_chanel_id');
				$this->load->model('sales_chanels');
                                if($this->sales_chanels->check_update($esales_chanel,$sales_chanel_id)!=FALSE){
                                    echo 'false3';
                                     $this->sales_chanels->update($esales_chanel,$sales_chanel_id);
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
	    if($this->input->post('sales_chanel')){
					$this->form_validation->set_rules('sales_chanel','sales_chanel', 'required');							
					if($this->form_validation->run()!=FALSE){
						 $sales_chanel=  $this->input->post('sales_chanel');
						 $this->load->model('sales_chanels');
                                                 if($this->sales_chanels->check($sales_chanel)!=FALSE){
                                                   
                                                     $this->sales_chanels->add($sales_chanel);
                                                     echo 'TRUE';
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
			$this->load->model('sales_chanels');
			$this->sales_chanels->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_sales_chanel($id){
		  $this->load->model('sales_chanels');
		  $data=$this->sales_chanels->edit_sales_chanel($id);
		  echo json_encode($data);
	}
        
} 
?>
