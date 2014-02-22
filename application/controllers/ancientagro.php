<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ancientagro Extends CI_Controller
{
    function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        $this->load->library('cart');
        session_start();
        
    }
    function index()
    {
      
      $this->load->model('site_model');
      $this->load->model('menus');
      $data['parents'] =$this->menus->get_parent_menus();
      $data['childs'] =$this->menus->get_child_menus();
      $data['active']='1';
       $data['row']=  $this->site_model->get_page_data(16);
      $this->load->view('demo_index',$data);
     //redirect('pdf/index');
    }
    function registration(){
         $this->load->model('site_model');
      $this->load->model('menus');
      $data['parents'] =$this->menus->get_parent_menus();
      $data['childs'] =$this->menus->get_child_menus();
      $data['active']='1';
       $data['row']=  $this->site_model->get_page_data(16);
      $this->load->view('registration',$data);
    }
    function shopping(){
        if($this->input->post("add_cart")) {
                       $data = $this->input->post();
                       $this->cart->insert($data);
               }
               $this->load->model('users') ;
                $this->load->model('menus');
                $data1['parents'] =$this->menus->get_parent_menus();
                $data1['childs'] =$this->menus->get_child_menus();
                $data1['active']='3';
                $data1['row']=  $this->users->shopping();
                $this->load->view('shopping',$data1);
       
    }
    function payment_config(){

        $PayPalMode         = $this->config->item('PayPalMode'); // sandbox or live
        $PayPalApiUsername  = $this->config->item('PayPalApiUsername'); //PayPal API Username
        $PayPalApiPassword  = $this->config->item('PayPalApiPassword'); //Paypal API password
        $PayPalApiSignature     = $this->config->item('PayPalApiSignature'); //Paypal API Signature
        $PayPalCurrencyCode     = $this->config->item('PayPalCurrencyCode'); //Paypal Currency Code
        $PayPalReturnURL    = $this->config->item('PayPalReturnURL'); //Point to process.php page
        $PayPalCancelURL    = $this->config->item('PayPalCancelURL'); //Cancel URL if user clicks cancel
    }
   
   function PPHttpPost($methodName_, $nvpStr_, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode) {
                // Set up your API credentials, PayPal end point, and API version.
                $API_UserName = urlencode($PayPalApiUsername);
                $API_Password = urlencode($PayPalApiPassword);
                $API_Signature = urlencode($PayPalApiSignature);

                if($PayPalMode=='sandbox')
                {
                    $paypalmode     =   '.sandbox';
                }
                else
                {
                    $paypalmode     =   '';
                }

                $API_Endpoint = "https://api-3t".$paypalmode.".paypal.com/nvp";
                $version = urlencode('76.0');

                // Set the curl parameters.
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
                curl_setopt($ch, CURLOPT_VERBOSE, 1);

                // Turn off the server and peer verification (TrustManager Concept).
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);

                // Set the API operation, version, and API signature in the request.
                $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

                // Set the request as a POST FIELD for curl.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

                // Get response from the server.
                $httpResponse = curl_exec($ch);

                if(!$httpResponse) {
                    exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
                }

                // Extract the response details.
                $httpResponseAr = explode("&", $httpResponse);

                $httpParsedResponseAr = array();
                foreach ($httpResponseAr as $i => $value) {
                    $tmpAr = explode("=", $value);
                    if(sizeof($tmpAr) > 1) {
                        $httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
                    }
                }

                if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
                    exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
                }

            return $httpParsedResponseAr;
        }

    
    function payment_check_out(){
        
        $PayPalMode         = $this->config->item('PayPalMode'); // sandbox or live
        $PayPalApiUsername  = $this->config->item('PayPalApiUsername'); //PayPal API Username
        $PayPalApiPassword  = $this->config->item('PayPalApiPassword'); //Paypal API password
        $PayPalApiSignature     = $this->config->item('PayPalApiSignature'); //Paypal API Signature
        $PayPalCurrencyCode     = $this->config->item('PayPalCurrencyCode'); //Paypal Currency Code
        $PayPalReturnURL    = $this->config->item('PayPalReturnURL'); //Point to process.php page
        $PayPalCancelURL    = $this->config->item('PayPalCancelURL'); 
      
if($_POST) //Post Data received from product list page.
{
    //Mainly we need 4 variables from an item, Item Name, Item Price, Item Number and Item Quantity.
    
       $paypal_data = '';
    $ItemTotalPrice = 0;

    //loop through POST array$key
    $key=0;
   foreach ($this->cart->contents() as  $item)
    {
        $paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($item['qty']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($item['price']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($item['name']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($item['id']);
       
        // item price X quantity
        $subtotal = ($item['price']*$item['qty']);
       
        //total price
        $ItemTotalPrice = ($ItemTotalPrice + $subtotal);
        $key++;
    }

    //Data to be sent to paypal
    
    $padata =   '&CURRENCYCODE='.urlencode($PayPalCurrencyCode).
                '&PAYMENTACTION=Sale'.
                '&ALLOWNOTE=1'.
                '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
                '&PAYMENTREQUEST_0_AMT='.urlencode($ItemTotalPrice).
                '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
                $paypal_data.
                '&AMT='.urlencode($ItemTotalPrice).            
                '&RETURNURL='.urlencode($PayPalReturnURL).
                
                '&CANCELURL='.urlencode($PayPalCancelURL); 
    
        $httpParsedResponseAr = $this->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

        //Respond according to message we receive from Paypal
        if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
        {

                // If successful set some session variable we need later when user is redirected back to page from paypal.
               

                if($PayPalMode=='sandbox')
                {
                    $paypalmode     =   '.sandbox';
                }
                else
                {
                    $paypalmode     =   '';
                }
                //Redirect user to PayPal store with Token received.
                $paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
                header('Location: '.$paypalurl);

        }else{
           
        }

}

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if(isset($_GET["token"]) && isset($_GET["PayerID"]))
{
    //we will be using these two variables to execute the "DoExpressCheckoutPayment"
    //Note: we haven't received any payment yet.

    $token = $_GET["token"];
    $playerid = $_GET["PayerID"];

    //get session variables
    
    $ItemTotalPrice = $this->cart->total();
    

    $padata =   '&TOKEN='.urlencode($token).
                        '&PAYERID='.urlencode($playerid).
                        '&PAYMENTACTION='.urlencode("SALE").
                        '&AMT='.urlencode($ItemTotalPrice).
                        '&CURRENCYCODE='.urlencode($PayPalCurrencyCode);

    //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
 
    $httpParsedResponseAr = $this->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

    //Check if everything went ok..
    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
    {
        


                $transactionID = urlencode($httpParsedResponseAr["TRANSACTIONID"]);
                $nvpStr = "&TRANSACTIONID=".$transactionID;
                
                $httpParsedResponseAr = $this->PPHttpPost('GetTransactionDetails', $nvpStr, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

                if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

//                    /*
//                   
//
 }
 
                    $this->load->model('users');
                    $i=0;
foreach ($httpParsedResponseAr as $key=>$value){
    
    $this->users->payment_transaction($_SESSION['order_id'],$key,$value);
}
$this->users->update_order_payment($_SESSION['order_id'],'success');
 foreach ($this->cart->contents() as $item) {
                          $this->users->stock_merging($item['id'],$item['name'],$item['price'],$item['qty']);
 }
$this->cart->destroy();
 redirect('ancientagro/get_invoice/'.$_SESSION['order_id']);
    }else{
            $this->load->model('users');
            $this->users->update_order_payment($_SESSION['order_id'],'failure');
            redirect('ancientagro/dashboard');
    }
}


}
    
   function udpate_cart() {
               if($this->input->post("update_cart")) {
                       $data = $this->input->post();
                       $this->cart->update($data);
               }
      
               $this->load->model('users') ;
                $this->load->model('menus');
                $data1['parents'] =$this->menus->get_parent_menus();
                $data1['childs'] =$this->menus->get_child_menus();
                $data1['active']='3';
               $data1['row']=  $this->users->shopping();
         $this->load->view('shopping',$data1);
       }
       function save_customer(){
           if($this->input->post('signup')){
           $this->load->library('form_validation');

                $this->form_validation->set_rules('first_name','first_name', 'required');
                $this->form_validation->set_rules('last_name','last_name','required');
                $this->form_validation->set_rules('address','address','required');
                $this->form_validation->set_rules('email','email','required');
                $this->form_validation->set_rules('phone','phone','required');
                $this->form_validation->set_rules('rpassword','rpassword','required');
                $this->form_validation->set_rules('country','country','required');
                $this->form_validation->set_rules('state','satate','required');
                $this->form_validation->set_rules('zip','zip','required');
                
                 
                if($this->form_validation->run()!=FALSE){
                     $first_name=  $this->input->post('first_name');
                     $last_name=$this->input->post('last_name');
                     $address=$this->input->post('address');
                     $phone=$this->input->post('phone');
                     $email=$this->input->post('email');
                     $password=$this->input->post('rpassword');
                     $username=$this->input->post('username');
                     $country=$this->input->post('country');
                     $state=$this->input->post('state');
                     $zip=$this->input->post('zip');
                   
                    $this->load->model('users');

                    if($this->users->customer_already_exit_for_add($email,$phone,$username)!=FALSE){
                       $id= $this->users->sign_up($phone,$first_name,$last_name,$email,$address,$password,$address,$username,$country,$state,$zip);
                       $_SESSION['user']=$id;
                       $_SESSION['user_type']='user';
                       redirect('ancientagro/checkout');
                    }else{ 
                        // customer is already registered
                              $this->load->model('site_model');
                            $this->load->model('menus');
                            $data['parents'] =$this->menus->get_parent_menus();
                            $data['childs'] =$this->menus->get_child_menus();
                            $data['active']='1';
                             $data['row']=  $this->site_model->get_page_data(16);
                            $this->load->view('registration',$data);
                    }

                
            }else{   $this->load->model('site_model');
                            $this->load->model('menus');
                            $data['parents'] =$this->menus->get_parent_menus();
                            $data['childs'] =$this->menus->get_child_menus();
                            $data['active']='1';
                             $data['row']=  $this->site_model->get_page_data(16);
                            $this->load->view('registration',$data);
            }
           
       }else{
        
          redirect('ancientagro');
       }
       }
       function customer_registration(){
           if($this->input->post('signup')){
           $this->load->library('form_validation');

                $this->form_validation->set_rules('first_name','first_name', 'required');
                $this->form_validation->set_rules('last_name','last_name','required');
                $this->form_validation->set_rules('address','address','required');
                $this->form_validation->set_rules('email','email','required');
                $this->form_validation->set_rules('phone','phone','required');
                $this->form_validation->set_rules('rpassword','rpassword','required');
                $this->form_validation->set_rules('country','country','required');
                $this->form_validation->set_rules('state','satate','required');
                $this->form_validation->set_rules('zip','zip','required');
                
                 
                if($this->form_validation->run()!=FALSE){
                     $first_name=  $this->input->post('first_name');
                     $last_name=$this->input->post('last_name');
                     $address=$this->input->post('address');
                     $phone=$this->input->post('phone');
                     $email=$this->input->post('email');
                     $password=$this->input->post('rpassword');
                     $username=$this->input->post('username');
                     $country=$this->input->post('country');
                     $state=$this->input->post('state');
                     $zip=$this->input->post('zip');
                   
                    $this->load->model('users');

                    if($this->users->customer_already_exit_for_add($email,$phone,$username)!=FALSE){
                       $id= $this->users->sign_up($phone,$first_name,$last_name,$email,$address,$password,$address,$username,$country,$state,$zip);
                       $_SESSION['user']=$id;
                       $_SESSION['user_type']='user';
                       redirect('ancientagro/profile');
                    }else{ 
                           $this->load->model('site_model');
                           $data['msg']='Already Register This User';
                            $this->load->model('menus');
                            $data['parents'] =$this->menus->get_parent_menus();
                            $data['childs'] =$this->menus->get_child_menus();
                            $data['active']='1';
                             $data['row']=  $this->site_model->get_page_data(16);
                            $this->load->view('registration',$data);
                    }

                
            }else{ 
                  $this->load->model('site_model');
                            $this->load->model('menus');
                            $data['parents'] =$this->menus->get_parent_menus();
                            $data['childs'] =$this->menus->get_child_menus();
                            $data['active']='1';
                             $data['row']=  $this->site_model->get_page_data(16);
                            $this->load->view('registration',$data);
            }
           
       }else{
        
          redirect('ancientagro');
       }
       }
       function checkout() {
           
                if(isset($_SESSION['user'])){
               $data['login']=TRUE;
               $this->load->model('users');
                $this->load->model('menus');
                $data['parents'] =$this->menus->get_parent_menus();
                $data['childs'] =$this->menus->get_child_menus();
                $data['active']='3';
               $data['row']=$this->users->get_customer_for_update($_SESSION['user']);
           $this->load->view('check_out',$data);
           }else{
                $this->load->model('menus');
                $data['parents'] =$this->menus->get_parent_menus();
                $data['childs'] =$this->menus->get_child_menus();
                $data['active']='3';
               $this->load->view('user_login',$data);
           }
           //echo $_SESSION['user'];
       }
       
       function user_check_out(){
            if($this->input->post('checkout')){
           $this->load->library('form_validation');

                $this->form_validation->set_rules('first_name','first_name', 'required');
                $this->form_validation->set_rules('last_name','last_name','required');
                $this->form_validation->set_rules('address','address','required');
                $this->form_validation->set_rules('email','email','required');
                $this->form_validation->set_rules('phone','phone','required');
                $this->form_validation->set_rules('country','country','required');
                $this->form_validation->set_rules('state','state','required');
                $this->form_validation->set_rules('zip','zip','required');
                $this->form_validation->set_rules('sfirst_name','sfirst_name', 'required');
                $this->form_validation->set_rules('slast_name','slast_name','required');
                $this->form_validation->set_rules('saddress','saddress','required');
                $this->form_validation->set_rules('semail','semail','required');
                $this->form_validation->set_rules('sphone','sphone','required');
                $this->form_validation->set_rules('scountry','scountry','required');
                $this->form_validation->set_rules('sstate','sstate','required');
                $this->form_validation->set_rules('szip','szip','required');
                 
                if($this->form_validation->run()!=FALSE){
                     $first_name=  $this->input->post('first_name');
                     $last_name=$this->input->post('last_name');
                     $address=$this->input->post('address');
                     $phone=$this->input->post('phone');
                     $email=$this->input->post('email');
                     $country=$this->input->post('country');
                     $state=$this->input->post('state');
                     $zip=$this->input->post('zip');
                     $sfirst_name=  $this->input->post('sfirst_name');
                     $slast_name=$this->input->post('slast_name');
                     $saddress=$this->input->post('saddress');
                     $sphone=$this->input->post('sphone');
                     $semail=$this->input->post('semail');
                     $scountry=$this->input->post('scountry');
                     $sstate=$this->input->post('sstate');
                     $szip=$this->input->post('szip');
                    
                     $date=date("Y/m/d");
                     $this->cart->format_number($this->cart->total());
                     $this->load->model('users');
                     $orderid=$this->users->add_new_order($_SESSION['user'],$this->cart->format_number($this->cart->total()),$first_name,$last_name,$address,$phone,$email,$country,$state,$zip,$sfirst_name,$slast_name,$saddress,$sphone,$semail,$scountry,$sstate,$szip,$date);
                   
                     $_SESSION['order_id']=$orderid;
                     foreach ($this->cart->contents() as $item) {
                          $this->users->order_items($orderid,$item['id'],$item['name'],$item['price'],$item['qty']);
                       
               
                          
                     }
                    
                     
                     $this->payment_check_out();
                     $this->dashboard();
               

                    

                
            }else{ 
                $this->load->model('users');
                $data['row']=$this->users->get_customer_for_update($_SESSION['user']);
                
                $this->load->view('check_out',$data);
            }
           
       }else{
        
          redirect('dashboard');
       }
       }
      function user_login(){
           $this->load->library('form_validation');
   
    if($this->input->post('login')){
        
        $this->form_validation->set_rules('username',$this->lang->line('user_name'), 'required');
        $this->form_validation->set_rules('password',$this->lang->line('password'),'required');
        if($this->form_validation->run()!=FALSE){
            $username=  $this->input->post('username');
            $password=$this->input->post('password');
            $this->load->model('users');
            
            if($this->users->login($username,$password)){
                $_SESSION['user']=$this->users->login($username,$password);
                $type= 'user';
                echo $_SESSION['user'];
                $_SESSION['user_type']=$type;
               redirect('ancientagro/checkout');
                
            }else{
                
                      $this->load->model('site_model');
                      $data['log_msg']='Invaid Username And Password';
                            $this->load->model('menus');
                            $data['parents'] =$this->menus->get_parent_menus();
                            $data['childs'] =$this->menus->get_child_menus();
                            $data['active']='1';
                             $data['row']=  $this->site_model->get_page_data(16);
                            $this->load->view('user_login',$data);
            }
            
        }else{
                 $this->load->model('site_model');
                            $this->load->model('menus');
                            $data['parents'] =$this->menus->get_parent_menus();
                            $data['childs'] =$this->menus->get_child_menus();
                            $data['active']='1';
                             $data['row']=  $this->site_model->get_page_data(16);
                            $this->load->view('user_login',$data);
        }
    }else{
          $this->load->model('site_model');
                            $this->load->model('menus');
                            $data['parents'] =$this->menus->get_parent_menus();
                            $data['childs'] =$this->menus->get_child_menus();
                            $data['active']='1';
                             $data['row']=  $this->site_model->get_page_data(16);
                            $this->load->view('user_login',$data);
    }
       }
       
       function checkout_trasfer() {
       
                       // Paypal count starts at one instead of zero
               $count = 1;
               
               // Build the query string
               $queryString  = "?cmd=_cart";
               $queryString .= "&upload=1";
               $queryString .= "&charset=utf-8";
               $queryString .= "&currency_code=" . urlencode($this->config->item('currencyCode'));
               $queryString .= "&business=" . urlencode($this->config->item('paypal_id'));
               $queryString .= "&return=" . urlencode($this->config->item('paypal_returnUrl'));
               $queryString .= '&notify_url=' . urlencode($this->config->item('paypal_notifyUrl'));
               
               foreach ($this->cart->contents() as $item) {

                       $queryString .= '&item_number_' . $count . '=' . urlencode($item['id']);
                       $queryString .= '&item_name_' . $count . '=' . urlencode($item['name']);
                       $queryString .= '&amount_' . $count . '=' . urlencode($item['price']);
                       $queryString .= '&quantity_' . $count . '=' . urlencode($item['qty']);

                       // Increment the counter
                       ++$count;
               }

               // Empty the cart
               $this->cart->destroy();

                 $settings = array(
    'username' => 'deccanshopping_api1.gmail.com ',
    'password' => 'YPXW7SUL2HSV9QNM',
    'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AUlljL0C3aQdvOQtcHSmWw1S7xAM',
    'test_mode' => true);

        $this->merchant->initialize($settings);
        $params = array(
            'amount' => 100.00,
            'currency' => 'USD',
            'return_url' => 'http://localhost/AncienArgo/index.php/ancientagro/dashboard',
            'cancel_url' => 'http://localhost/AncienArgo/index.php/ancientagro/shopping');

        $response = $this->merchant->purchase($queryString);
        $this->load->library('merchant');
        $this->merchant->load('paypal_express');
        $this->merchant->initialize($settings);
       // $response = $this->merchant->purchase_return($queryString);
               
       }
 

    
    function aboutus(){
        $this->load->view('aboutus');
    }
    function contactus(){
        $this->load->view('contactus');
    }
    function login(){
         $this->load->model('menus');
                $data['parents'] =$this->menus->get_parent_menus();
                $data['childs'] =$this->menus->get_child_menus();
                $data['active']='5';
          $this->load->view('login',$data);
    }
    function dashboard(){
        if(isset($_SESSION['user'])){
           if($_SESSION['user_type']=='admin'){
                 redirect('dashboard');
            }else{
        $this->load->model('users');
        $this->load->model('menus');
        $data['parents'] =$this->menus->get_parent_menus();
        $data['childs'] =$this->menus->get_child_menus();
        $data['active']='';
        $data['row']=  $this->users->get_orders($_SESSION['user']);
         $this->load->view('dashboard',$data);
            }
        }else{
            redirect('ancientagro');
        }
    }
    function sonorawheat(){
        $this->load->view('sonorawheat');
    }
    function ethopianbluetinge(){
        $this->load->view('ethopianbluetinge');
    }
    function durumiraq(){
        $this->load->view('durumiraq');
    }
   function logout(){
       session_destroy();
       $this->cart->destroy();
       redirect('ancientagro');
   }
    function get_invoice($id){
        if(isset($_SESSION['user'])){
        $this->load->model('users');
        $data['row']=  $this->users->get_invoice($id);
        $data['items']=  $this->users->get_items($id);
       $this->load->view('dashboard',$data);
        }else{
            redirect('ancientagro');
        }
    }
 
    function payment_pending($id){
        
                       // Paypal count starts at one instead of zero
               $count = 1;
               
               // Build the query string
               $queryString  = "?cmd=_cart";
               $queryString .= "&upload=1";
               $queryString .= "&charset=utf-8";
               $queryString .= "&currency_code=" . urlencode($this->config->item('currencyCode'));
               $queryString .= "&business=" . urlencode($this->config->item('paypal_id'));
               $queryString .= "&return=" . urlencode($this->config->item('paypal_returnUrl'));
               $queryString .= '&notify_url=' . urlencode($this->config->item('paypal_notifyUrl'));
               $this->load->model('users');
               $data=  $this->users->get_items($id);
               foreach ($data as $item) {

                       $queryString .= '&item_number_' . $count . '=' . urlencode($item->grain);
                       $queryString .= '&item_name_' . $count . '=' . urlencode($item->grain_name);
                       $queryString .= '&amount_' . $count . '=' . urlencode($item->price);
                       $queryString .= '&quantity_' . $count . '=' . urlencode($item->quty);

                       // Increment the counter
                       ++$count;
               }

               // Empty the cart
               $this->cart->destroy();

               // Confirm that a PayPal id is set in config.php
               if ($this->config->item('paypal_id')) {

                       // Add the sandbox subdomain if necessary
                       $sandbox = '';
                       if ($this->config->item('paypal_sandbox') === true) {
                               $sandbox = '.sandbox';
                       }

                       // Use HTTPS by default
                       $protocol = 'https://';
                       if ($this->config->item('paypal_https') == false) {
                               $protocol = 'http://';
                       }

                       // Send the visitor to PayPal
                       @header('Location: ' . $protocol . 'www' . $sandbox . '.paypal.com/cgi-bin/webscr' . $queryString);
               }
               else {
                       die('Couldn&rsquo;t find a PayPal ID in <strong>config.php</strong>.');
               }
    }
    function profile(){
        $this->load->model('users');
        $this->load->model('menus');
        $data['parents'] =$this->menus->get_parent_menus();
        $data['childs'] =$this->menus->get_child_menus();
        $data['active']='';
        $data['row']=  $this->users->get_user($_SESSION['user']);
        $this->load->view('profile',$data);
    }
    function invoice(){
        
    }
    function product_details($guid){
        $this->load->model('users');
        $data['row']=  $this->users->get_product_details($guid);
        $data['nutri']=  $this->users->get_nutrition_details($guid);
        $this->load->view('grains',$data);
    }
    function update_customer(){
        if($this->input->post('update')){
              $this->load->library('form_validation');

                $this->form_validation->set_rules('first_name','first_name', 'required');
                $this->form_validation->set_rules('last_name','last_name','required');
                $this->form_validation->set_rules('address','address','required');
                $this->form_validation->set_rules('email','email','required');
                $this->form_validation->set_rules('phone','phone','required');
                $this->form_validation->set_rules('country','country','required');
                $this->form_validation->set_rules('state','satate','required');
                $this->form_validation->set_rules('zip','zip','required');
                $guid=$this->input->post('customer_id');
                 
                if($this->form_validation->run()!=FALSE){
                     $first_name=  $this->input->post('first_name');
                     $last_name=$this->input->post('last_name');
                     $address=$this->input->post('address');
                     $phone=$this->input->post('phone');
                     $email=$this->input->post('email');
                     $password=$this->input->post('rpassword');
                     $username=$this->input->post('username');
                     $country=$this->input->post('country');
                     $state=$this->input->post('state');
                     $zip=$this->input->post('zip');
                     
                   
                    $this->load->model('users');
                    $this->users->update_customer($guid,$phone,$first_name,$last_name,$email,$address,$password,$address,$username,$country,$state,$zip);
                     $this->load->model('users');
                    $data['row']=  $this->users->get_user($_SESSION['user']);
                    $data['msg']='Updated';
                    $this->load->model('menus');
                    $data['parents'] =$this->menus->get_parent_menus();
                    $data['childs'] =$this->menus->get_child_menus();
                    $data['active']='';
                    $this->load->view('profile',$data);
                }  else {
                    $this->load->model('users');
                     $this->load->model('menus');
                    $data['parents'] =$this->menus->get_parent_menus();
                    $data['childs'] =$this->menus->get_child_menus();
                    $data['active']='';
                    $data['row']=  $this->users->get_user($_SESSION['user']);
                    $this->load->view('profile',$data);
                }

        }else{
            redirect('ancientagro');
        }
    }
    function photo(){
        $this->load->view('photo');
    }
    function page(){
        $this->load->model('menus');
        $data['parents'] =$this->menus->get_parent_menus();
        $data['childs'] =$this->menus->get_child_menus();
        $data['active']= $this->uri->segment(4);
        $guid=  $this->uri->segment(3);
        $this->load->model('site_model');
        $data['row']=  $this->site_model->get_page_data($guid);
        $this->load->view('page',$data);
       
    }
    function view_product($guid){
       $this->load->model('menus');
        $data['parents'] =$this->menus->get_parent_menus();
        $data['childs'] =$this->menus->get_child_menus();
        $data['active']= $this->uri->segment(4);
        $guid=  $this->uri->segment(3);
        $this->load->model('site_model');
        $data['row']=  $this->site_model->get_page_data($guid);
        $this->load->view('product',$data);
    }
     function view_product_details($guid){
       $this->load->model('menus');
        $data['parents'] =$this->menus->get_parent_menus();
        $data['childs'] =$this->menus->get_child_menus();
        $data['active']= $this->uri->segment(4);
        $guid=  $this->uri->segment(3);
        $this->load->model('site_model');
        $data['row']=  $this->site_model->get_product_data($guid);
        $this->load->view('product',$data);
    }
}
    
?>
