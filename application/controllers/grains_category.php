<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grains_category Extends CI_Controller
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
                $this->load->view('grains_category/header');
		$this->load->view('nav/index');
		$this->load->view('grains_category/index');
                $this->load->view('grains_category/footer');
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
			 $this->load->model('grains_categorys');		   
			 $rResult1 = $this->grains_categorys->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->grains_categorys->count();
		
		$iTotal =$this->grains_categorys->count();
		
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
        if($this->input->post('egrains_category')){
			$this->form_validation->set_rules('egrains_category','egrains_category', 'required');							
			$this->form_validation->set_rules('egrains_category_id','egrains_category_id', 'required');							
			if($this->form_validation->run()!=FALSE){
				echo $egrains_category=  $this->input->post('egrains_category');
				$grains_category_id=  $this->input->post('egrains_category_id');
				$this->load->model('grains_categorys');
                                if($this->grains_categorys->check_update($egrains_category,$grains_category_id)!=FALSE){
                                    echo 'false3';
                                     $this->grains_categorys->update($egrains_category,$grains_category_id);
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
	    if($this->input->post('grains_category')){
					$this->form_validation->set_rules('grains_category','grains_category', 'required');							
					if($this->form_validation->run()!=FALSE){
						 $grains_category=  $this->input->post('grains_category');
						 $this->load->model('grains_categorys');
                                                 if($this->grains_categorys->check($grains_category)!=FALSE){
                                                   
                                                     $this->grains_categorys->add($grains_category);
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
			$this->load->model('grains_categorys');
			$this->grains_categorys->delete($id);
                          echo 'TRUE';
		
	}		
	function edit_grains_category($id){
		  $this->load->model('grains_categorys');
		  $data=$this->grains_categorys->edit_grains_category($id);
		  echo json_encode($data);
	}
        
} 
?>
