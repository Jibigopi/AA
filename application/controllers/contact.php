<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller{
     function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->helper('form');
         session_start();       
    }
     function index(){
        if(isset($_SESSION['user']) && isset($_SESSION['user_type'])){
            if($_SESSION['user_type']=='admin'){
                $this->load->view('contact/header');
		$this->load->view('nav/index');
                 $this->load->model('contacts');
                 $data=  $this->contacts->get_all_contacts();
		$this->load->view('contact/index',$data);
                $this->load->view('contact/footer');
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
        
} 
?>
