<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu Extends CI_Controller
{
    function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        session_start();
        
            if($_SESSION['user_type']!='admin'){
                redirect('ancientagro');
            }
       
    }
    function index(){
      if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('menu/header');
		$this->load->view('nav/index');
                $this->load->model('menus');
                $data['p_menu']=$this->menus->get_primary_menus();
                $data['p_page']=$this->menus->get_pages();
		$this->load->view('menu/index',$data);
                $this->load->view('menu/footer');
             }else{
              redirect('ancientagro/dashboard');  
            }            
            }else{
                redirect('admin');
            }
    }
    function data_table(){
		$aColumns = array( 'id','name','name','order','page_name', 'url','guid','guid','id', );	
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
                             'parent_name'=>  $this->input->get_post('sSearch'),
                             'page_name'=>  $this->input->get_post('sSearch'));
				
			}
			 $this->load->model('menus');		   
			 $rResult1 = $this->menus->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->menus->count();
		
		$iTotal =$this->menus->count();
		
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
       if($this->input->post('menu_id')){
           $id=$this->input->post('menu_id');
					if($this->input->post('name')){
					$this->form_validation->set_rules('name','name', 'required');							
					$this->form_validation->set_rules('order','order', 'required');								
					$this->form_validation->set_rules('primary','primary', 'required');
                                        if($this->input->post('link')==0){
                                          $this->form_validation->set_rules('url','url', 'required');
                                        }else{
                                              $this->form_validation->set_rules('page','page', 'required');
                                        }
					if($this->form_validation->run()!=FALSE){
						 $name=  $this->input->post('name');
						 $order=  $this->input->post('order');
						 $primary=  $this->input->post('primary');
						 $url=  $this->input->post('url');
						 $page=  $this->input->post('page');
                                                 $link=$this->input->post('link');
						
						 $this->load->model('menus');
                                if($this->menus->check_update($id,$name)!=FALSE){
                                     $this->menus->update($id,$link,$name,$primary,$order,$url,$page);
                                       echo 'TRUE';
                                }else{
                                 echo 'ALREADY';
                                }
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
	    if($this->input->post('name')){
					$this->form_validation->set_rules('name','name', 'required');							
					$this->form_validation->set_rules('order','order', 'required');								
					$this->form_validation->set_rules('primary','primary', 'required');
                                        if($this->input->post('link')==0){
                                          $this->form_validation->set_rules('url','url', 'required');
                                        }else{
                                              $this->form_validation->set_rules('page','page', 'required');
                                        }
					if($this->form_validation->run()!=FALSE){
						 $name=  $this->input->post('name');
						 $order=  $this->input->post('order');
						 $primary=  $this->input->post('primary');
						 $url=  $this->input->post('url');
						 $page=  $this->input->post('page');
                                                 $link=$this->input->post('link');
						
						 $this->load->model('menus');
                                                 if($this->menus->check($name)!=FALSE){
                                                     $this->menus->add($link,$name,$primary,$order,$url,$page);
                                                     echo 'TRUE';
                                                 }else{                                                     
                                                    echo 'ALREADY';
                                                 }
                                                
                                        }else{
                                            echo'FALSE';
                                        }
        }else{
           echo'FALSE';
        }
       
	}
	function delete(){
			$id=$this->input->post('guid');
			$this->load->model('menus');
			if($this->menus->delete($id)!=FALSE){
                        echo 'TRUE';
                        
                        }else{
                            echo "PARENT";
                        }
		
	}		
	function edit_menu($id){
		  $this->load->model('menus');
		  $data=$this->menus->edit_menu($id);
		  echo json_encode($data);
	}
        function menu_type($name){
	if($name!=""){
	 
	$this->load->model('menus');
	$data=$this->menus->menus_type($name);
		echo json_encode ($data);
	}
        }
        
} 
?>
