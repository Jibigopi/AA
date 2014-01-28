<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stage Extends CI_Controller
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
                $this->load->view('stage/header');
		$this->load->view('nav/index');
		$this->load->view('stage/index');
                $this->load->view('stage/footer');
           }else{
                redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
         }  
    }
    function data_table(){
		$aColumns = array( 'id','name','name', 'id', );	
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
			 $this->load->model('stages');		   
			 $rResult1 = $this->stages->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->stages->count();
		
		$iTotal =$this->stages->count();
		
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
        if($this->input->post('estage')){
			$this->form_validation->set_rules('estage','estage', 'required');							
			$this->form_validation->set_rules('stage_id','stage_id', 'required');							
			if($this->form_validation->run()!=FALSE){
				echo $estage=  $this->input->post('estage');
				$stage_id=  $this->input->post('stage_id');
				$this->load->model('stages');
                                if($this->stages->check_update($estage,$stage_id)!=FALSE){
                                    echo 'TRUE';
                                     $this->stages->update($estage,$stage_id);
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
	    if($this->input->post('stage')){
					$this->form_validation->set_rules('stage','stage', 'required');							
					if($this->form_validation->run()!=FALSE){
						 $stage=  $this->input->post('stage');
						 $this->load->model('stages');
                                                 if($this->stages->check($stage)!=FALSE){
                                                     $this->stages->add($stage);
                                                      echo 'TRUE';
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
	function delete(){
			$id=$this->input->post('guid');
			$this->load->model('stages');
			$this->stages->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_stage($id){
		  $this->load->model('stages');
		  $data=$this->stages->edit_stage($id);
		  echo json_encode($data);
	}
        
} 
?>
