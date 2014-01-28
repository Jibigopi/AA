<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin Extends CI_Controller
{
    function __construct() { 
        parent::__construct();
         $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        session_start();
        
        
    }
    function index()
    {
        if(!isset($_SESSION['user'])){
     redirect('ancientagro');
        }else{
            redirect('dashboard');
        }
    }
    function login(){
       
        $this->load->library('form_validation');
   
    if($this->input->post('login')){
       
        $this->form_validation->set_rules('username',$this->lang->line('user_name'), 'required');
        $this->form_validation->set_rules('password',$this->lang->line('password'),'required');
        if($this->form_validation->run()!=FALSE){
            $username=  $this->input->post('username');
            $password=$this->input->post('password');
            $this->load->model('users');
            
            if($this->users->login($username,$password)!=FALSE){
                    $_SESSION['user']=$this->users->login($username,$password);
                    $_SESSION['user_type']='user';
                    redirect('ancientagro/dashboard');
                }  else{
                            if($this->users->admin_login($username,$password)!=FALSE){
                             $_SESSION['user']=$this->users->admin_login($username,$password);
                             $_SESSION['user_type']='admin';
                             redirect('dashboard');
                         }  else{
                            $data['msg']='Please Enter Valid Username And Password';
                       $this->load->model('menus');
                $data['parents'] =$this->menus->get_parent_menus();
                $data['childs'] =$this->menus->get_child_menus();
                $data['active']='5';
          $this->load->view('login',$data);

                         
                }
                }
            }else{
                $this->load->model('menus');
                $data['parents'] =$this->menus->get_parent_menus();
                $data['childs'] =$this->menus->get_child_menus();
                $data['active']='5';
                $this->load->view('login',$data);
            }
            
        }else{
                $this->load->model('menus');
                $data['parents'] =$this->menus->get_parent_menus();
                $data['childs'] =$this->menus->get_child_menus();
                $data['active']='5';
                $this->load->view('login',$data);
        }
    }
    
   function logout(){
       session_destroy();
   }
   function forget_password(){
        $data['msg']="";
        $this->load->model('menus');
        $data['parents'] =$this->menus->get_parent_menus();
        $data['childs'] =$this->menus->get_child_menus();
        $data['active']='';
       $this->load->view('forget',$data);
   }
   function get_forget_password(){
      $this->load->library('form_validation');   
          if($this->input->post('submit')){       
            $this->form_validation->set_rules('email','email', 'valid_email|required');
            if($this->form_validation->run()!=FALSE){
                $emil=  $this->input->post('email');               
                $this->load->model('users');
                if($this->users->check_customer_email_id_valid($emil)){
                    $id=$this->users->get_customer_id($emil);
                    $this->load->library('email');

                    $this->load->library('email');

                    $this->email->from('your@example.com', 'Your Name');
                    $this->email->to($emil);
                    $this->email->cc('another@another-example.com');
                    $this->email->bcc('them@their-example.com');

                    $this->email->subject('Temporary Password');
                    $this->email->message("T34UD".$id."Y954SW");

                    $this->email->send();

                   // echo $this->email->print_debugger();
                        $this->users->update_password($emil,$id);
                       // redirect('admin/login');
                       $this->login();
                }else{
                    $data['msg']="";
                     $this->load->model('menus');
                    $data['parents'] =$this->menus->get_parent_menus();
                    $data['childs'] =$this->menus->get_child_menus();
                    $data['active']='';
                    $this->load->view('forget',$data);
                }
            }else{
                $data['msg']="This Email Id Is Not Registered";
                 $this->load->model('menus');
                    $data['parents'] =$this->menus->get_parent_menus();
                    $data['childs'] =$this->menus->get_child_menus();
                    $data['active']='';
                 $this->load->view('forget',$data);
            }
            }
   
     }
    
}
    
?>
