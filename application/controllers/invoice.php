<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller{
     function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
         $this->load->helper('form');      
    }
     function index(){
        
    }
    function sales_order_invoice($guid){
    
        $this->load->model('sales_orders');
        $data['row']= $this->sales_orders->get_invoice($guid);   
        $this->load->view('sales_invoice/invoice',$data);
    }
        
} 
?>
