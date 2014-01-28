<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cms extends CI_Controller{
     function __construct() {
        parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->helper('form');
         $this->load->model('site_model');
         $this->load->model('page_model');
         session_start();
         if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
                if($_SESSION['user_type']!='admin'){
                    redirect('ancientagro');
                }
            }else{
                redirect('ancientagro');
            }
            
    }
     function index(){
        if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){

                $this->load->view('cms/header');
		$this->load->view('nav/index');
                $this->load->view('cms/index');
                $this->load->view('cms/footer');


           }else{
                redirect('ancientagro/dashboard');
            }
            }else{
                redirect('admin');
         }
    }



  function pages()
  {
     if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){

    $this->load->view('cms/home_header');
    $this->load->view('nav/index');
    $data = array();

        $this->load->model('site_model');
    if($query = $this->site_model->get_records())
    {
      $data['records'] = $query;
    }

        $this->load->view('cms/pages',$data);
                $this->load->view('cms/footer');
           }else{
                redirect('ancientagro/dashboard');
            }
            }else{
                redirect('ancientagro');
         }
    }

  function add()
   {

  $this->load->view('cms/header');
    $this->load->view('nav/index');

$this->load->view("cms/addpage");
    $this->load->view('cms/footer');

   }
   function add_new_page()
   {
 if($this->input->post('title')){
		$this->load->library('form_validation');
                $this->form_validation->set_rules('title','title', 'required');
                $this->form_validation->set_rules('body','body','required');
                 
                if($this->form_validation->run()!=FALSE){
                    $data = array(
                    'title'=>$this->input->post('title'),
                    'body'=>$this->input->post('body'));
                    $this->load->model('site_model');
                    if($this->site_model->check_page($this->input->post('title'))!=FALSE){
                    $this->site_model->add_new_page($data);
                     echo "TRUE";
                    }else{
                         echo "ALREADY";
                    }
                   
                }else{
                    echo "FALSE";
                }
                
 }

   }
     function data_table(){
		$aColumns = array( 'id','title','title','id', 'id','id','id','id', );	
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
		$like =array('title'=>  $this->input->get_post('sSearch'));
				
			}
			 $this->load->model('site_model');		   
			 $rResult1 = $this->site_model->data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->site_model->count();
		
		$iTotal =$this->site_model->count();
		
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
function delete_page()
  {
    $guid=  $this->input->post('guid');
     $this->load->model('site_model');
    $this->site_model->delete_page($guid);
   echo "TRUE";
  }
function update_page()
  {
    if($this->input->post('submit')){
		$this->load->library('form_validation');
                $this->form_validation->set_rules('title','title', 'required');
                $this->form_validation->set_rules('body','body','required');
                $this->form_validation->set_rules('guid','guid','required');
                 $id=$this->input->post('guid');
                if($this->form_validation->run()!=FALSE){
                    $data = array(
                    'title'=>$this->input->post('title'),
                    'body'=>$this->input->post('body'));
 
                  $this->load->model('site_model');
                  $this->site_model->update_page($id,$data);
                redirect('cms/pages');
                }else{
                    
                }

  }}
  function update()
  {
    $this->load->view('cms/header');
    $this->load->view('nav/index');
    $this->load->model('site_model');
    $data['record'] = $this->site_model->update_row();
    $this->load->view('cms/update', $data);
    $this->load->view('cms/footer');

  }
  function edit_page($guid){
   	 $this->load->model('site_model');
		  $data=$this->site_model->edit_page($guid);
		  echo json_encode($data);
	}
}

?>
