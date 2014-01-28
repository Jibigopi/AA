<?php
class Contacts extends CI_model{
    function __construct() {
        parent::__construct();
         }
         
         function get_all_contacts(){
             $this->db->select()->from('supplier');
             $ssql=  $this->db->get();
             $data['supplier']=$ssql->result();
             
             $this->db->select()->from('storage_location');
             $lsql=  $this->db->get();
             $data['location']=$lsql->result();
             
             $this->db->select()->from('customer');
             $csql=  $this->db->get();
             $data['customer']=$csql->result();
             return $data;
             
         }
}
?>
