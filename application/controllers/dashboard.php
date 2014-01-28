<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard Extends CI_Controller
{
    function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        session_start();
       
            if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
                if($_SESSION['user_type']!='admin'){
                    redirect('ancientagro');
                }
            }else{
                redirect('ancientagro');
            }
            
       
    }
    function index()
    {
        
        if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('dashboard/header');
		$this->load->view('nav/index');
		$this->load->view('dashboard/index');
                $this->load->view('dashboard/footer');
            }
        }else{
            redirect('ancientagro');
        }
        
    }
	   function customers(){        
			$this->load->view('dashboard/customers');
		}
	   function users_data_table(){     
		$aColumns = array( 'id','guid','username','email','first_name','last_name','phone', 'id','id', );	
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
		$like =array('first_name'=>  $this->input->get_post('sSearch'),
				'username'=>  $this->input->get_post('sSearch'),
				'email'=>  $this->input->get_post('sSearch'),
				'phone'=>  $this->input->get_post('sSearch'),
				'last_name'=>$this->input->get_post('sSearch'));
				
			}
			$this->load->model('users');
		   // $rResult1 = $this->core_model->user_fetch_array($sWhere1,$end,$start,$sOrder11);

		  
			 $rResult1 = $this->users->posnic_data_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->users->count_customer();
		
		$iTotal =$this->users->count_customer();
		
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
	   function grains_data_table(){     
		$aColumns = array( 'guid','id','gcode','name','cat_name','sku','sku','id','image','image' );	
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
			$this->load->model('users');
		   // $rResult1 = $this->core_model->user_fetch_array($sWhere1,$end,$start,$sOrder11);

		  
			 $rResult1 = $this->users->grains_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->users->count_grain();
		
		$iTotal =$this->users->count_grain();
		
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
	   function category_data_table(){     
		$aColumns = array( 'id','id','name','description','name','name','name','id','id' );	
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
				'name'=>  $this->input->get_post('sSearch')
				);
				
			}
			$this->load->model('users');
		   // $rResult1 = $this->core_model->user_fetch_array($sWhere1,$end,$start,$sOrder11);

		  
			 $rResult1 = $this->users->category_table($end,$start,$order,$like);
		   
		$iFilteredTotal =$this->users->count_category();
		
		$iTotal =$this->users->count_category();
		
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
	   function edit_user($guid){
			$this->load->model('users');
			$data['row']=  $this->users->get_user($guid);
			$this->load->view('dashboard/update_user',$data);
		}
	   function edit_grain($guid){
			$this->load->model('users');
			$data['row']=  $this->users->get_grain($guid);
			$data['cat']=  $this->users->get_category();
			$this->load->view('dashboard/update_grain',$data);
		}    
	   function grains(){
			  $this->load->view('dashboard/grains');
		}
	   function logout(){
		   session_destroy();
		   redirect('ancientagro');
	   }
	   function update_grain(){
		   if($this->input->post('save')){
			   $this->load->library('form_validation');

					$this->form_validation->set_rules('name','name', 'required');
					$this->form_validation->set_rules('code','code','required');
					$this->form_validation->set_rules('price','price','required');
					$this->form_validation->set_rules('category','category','required');
					$this->form_validation->set_rules('description','description','required');
					  $id=$this->input->post('guid');
					if($this->form_validation->run()!=FALSE){
						 $name=  $this->input->post('name');
						 $code=$this->input->post('code');
						 $price=$this->input->post('price');
						 $dis=$this->input->post('description');
						 $category=$this->input->post('category');
					   
						$this->load->model('users');

						if($this->users->already_grain($id,$code,$category)!=FALSE){
							$this->users->users_update_grain($id,$name,$category,$code,$price,$dis);
							redirect('dashboard/grains');
						}else{
				   $this->edit_grain($id);
							   // $this->load->view('login');
						}

					
				}else{
					$this->edit_grain($id);
				}
		   }else{
			   redirect('dashboard');
		   }
	   }
	   function update_customers(){
		   if($this->input->post('save')){
			   $this->load->library('form_validation');

					$this->form_validation->set_rules('username','username', 'required');
					$this->form_validation->set_rules('first_name','first_name','required');
					$this->form_validation->set_rules('last_name','last_name','required');
					$this->form_validation->set_rules('email','eamil','required');
					$this->form_validation->set_rules('phone','phone','required');
					$this->form_validation->set_rules('address','address','required');
					  $id=$this->input->post('guid');
					if($this->form_validation->run()!=FALSE){
						 $first_name=  $this->input->post('first_name');
						 $last_name=$this->input->post('last_name');
						 $address=$this->input->post('address');
						 $phone=$this->input->post('phone');
						 $email=$this->input->post('email');
						 $password=$this->input->post('rpassword');
						 $username=$this->input->post('username');
					   
						$this->load->model('users');

						if($this->users->already_exit_customer_for_update($id,$username,$phone,$email)!=FALSE){
							$this->users->update_customer($id,$phone,$first_name,$last_name,$email,$address,$password,$address,$username);
							redirect('dashboard/customers');
						}else{
							   $this->edit_grain($id);
							   $this->edit($guid);
						}

					
				}else{
					$this->edit_customer($id);
				}
		   }else{
			   redirect('dashboard');
		   }
	   }
	   function update_category(){
		   if($this->input->post('save')){
			   $this->load->library('form_validation');

					$this->form_validation->set_rules('name','name', 'required');
					  $id=$this->input->post('guid');
					if($this->form_validation->run()!=FALSE){
						 $name=  $this->input->post('name');
						 $description=$this->input->post('description');
					   
						$this->load->model('users');

						if($this->users->already_exit_category_for_update($id,$name)!=FALSE){
							$this->users->update_category($id,$name,$description);
							redirect('dashboard/category');
						}else{
							   $this->edit_category($id);
						}

					
				}else{
					$this->edit_category($id);
				}
		   }else{
			   redirect('dashboard');
		   }
	   }
	   function add_grain(){
			$this->load->model('users');      
			
			$data['cat']=  $this->users->get_category();
			$this->load->view('dashboard/add_grain',$data);
	   }
	   function save_grain(){
		   if($this->input->post('save')){
			   $this->load->library('form_validation');

					$this->form_validation->set_rules('name','name', 'required');
					$this->form_validation->set_rules('code','code','required');
					$this->form_validation->set_rules('price','price','required');
					$this->form_validation->set_rules('category','category','required');
					$this->form_validation->set_rules('description','description','required');
					 
					if($this->form_validation->run()!=FALSE){
						 $name=  $this->input->post('name');
						 $code=$this->input->post('code');
						 $price=$this->input->post('price');
						 $dis=$this->input->post('description');
						 $category=$this->input->post('category');
					   
						$this->load->model('users');

						if($this->users->grain_alread_exit_for_add($code,$category)!=FALSE){
							$this->users->add_new_grain($name,$category,$code,$price,$dis);
						   redirect('dashboard/grains');
						}else{
	 
								 $this->load->model('users');       
								 $data['cat']=  $this->users->get_category();
								 $this->load->view('dashboard/add_grain',$data);
						}

					
				}else{ 
					 $this->load->model('users');       
								 $data['cat']=  $this->users->get_category();
								 $this->load->view('dashboard/add_grain',$data);
				}
			   
		   }else{
			
			  redirect('dashboard');
		   }
	   }
	   function save_customer(){
		   if($this->input->post('save')){
			   $this->load->library('form_validation');

					$this->form_validation->set_rules('first_name','first_name', 'required');
					$this->form_validation->set_rules('last_name','last_name','required');
					$this->form_validation->set_rules('address','address','required');
					$this->form_validation->set_rules('email','email','required');
					$this->form_validation->set_rules('phone','phone','required');
					$this->form_validation->set_rules('rpassword','rpassword','required');
					 
					if($this->form_validation->run()!=FALSE){
						 $first_name=  $this->input->post('first_name');
						 $last_name=$this->input->post('last_name');
						 $address=$this->input->post('address');
						 $phone=$this->input->post('phone');
						 $email=$this->input->post('email');
						 $password=$this->input->post('rpassword');
						 $username=$this->input->post('username');
					   
						$this->load->model('users');

						if($this->users->customer_already_exit_for_add($email,$phone,$username)!=FALSE){
							$this->users->add_new_customer($phone,$first_name,$last_name,$email,$address,$password,$address,$username);
						   redirect('dashboard/customers');
						}else{
	 
								 $this->load->model('users');       
								 $data['cat']=  $this->users->get_category();
								 $this->load->view('dashboard/add_grain',$data);
						}

					
				}else{ 
					 $this->load->model('users');       
								 $data['cat']=  $this->users->get_category();
								 $this->load->view('dashboard/add_grain',$data);
				}
			   
		   }else{
			
			  redirect('dashboard');
		   }
	   }
	   function grains_delete(){
		   $id=  $this->input->post('guid');
		   $this->load->model('users');
		   $this->users->delete_grains($id);
		   echo 'TRUE';
		   
	   }
	   function add_customer(){
		   $this->load->view('dashboard/add_customer');
	   }
	   function customer_delete(){
		   $id=  $this->input->post('guid');
		   $this->load->model('users');
		   $this->users->customer_delete($id);
		   echo 'TRUE';
		   
	   }
	   function category_delete(){
		   $id=  $this->input->post('guid');
		   $this->load->model('users');
		   $this->users->category_delete($id);
		   echo 'TRUE';
		   
	   }
	   function edit_customer($guid){
		   $this->load->model('users');   
		   $data['row']=$this->users->get_customer_for_update($guid);
		   $this->load->view('dashboard/update_customer',$data);
		   
	   }
	   function edit_category($guid){
		   $this->load->model('users');   
		   $data['row']=$this->users->get_category_for_update($guid);
		   $this->load->view('dashboard/update_category',$data);
		   
	   }
	   function category(){
		   $this->load->view('dashboard/category');
	   }
	   function add_category(){
			$this->load->view('dashboard/add_category'); 
	   }
	   function save_category(){
			  if($this->input->post('save')){
			   $this->load->library('form_validation');

					$this->form_validation->set_rules('name','name', 'required');
					
					 
					if($this->form_validation->run()!=FALSE){
						 $name=  $this->input->post('name');
						 $description=$this->input->post('description');
					   
						$this->load->model('users');

						if($this->users->category_already_exit_for_add($name)!=FALSE){
							$this->users->add_new_category($name,$description);
						   redirect('dashboard/category');
						}else{
	 
							$this->load->view('dashboard/add_category');
						}

					
				}else{ 
					  $this->load->view('dashboard/add_category');
				}
			   
		   }else{
			
			  redirect('dashboard');
		   }
	   }
	 function stock(){
			$this->load->view('stock/header');
			$this->load->view('nav/index');
			$this->load->view('dashboard/stock');
                        $this->load->view('stock/footer');
		}
         function profile_password_checking(){
              if($_SESSION['user_type']=='admin'){
                    if($this->input->post('password')){
                        $this->load->model('users');
                        if($this->users->check_current_user_password($_SESSION['user'],$this->input->post('password'))!=FALSE){
                            echo $this->users->get_user_name($_SESSION['user']);
                        }else{
                            echo 'FALSE';
                        }
                    }
                }
         }
         function update_admin_profile(){
               if($_SESSION['user_type']=='admin'){
                   $this->load->library('form_validation');
                        $this->form_validation->set_rules('username','username', 'required');
                        $this->form_validation->set_rules('password','passwrod','required');
                        $this->form_validation->set_rules('cpassword','cpassword','required');
                        
                        $this->load->model('users');
                       if($this->form_validation->run()!=FALSE){
                           $username=  $this->input->post('username');
                           $password=  $this->input->post('cpassword');
                           $this->users->update_admin_profile($_SESSION['user'],$username,$password);
                           echo 'TRUE';
                        }else{
                            echo 'FALSE';
                        }
                    }
               }
         
	}
    
?>
