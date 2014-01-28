<?php
class Customers extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
         $this->db->select()->from('customer');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('customer');;
    }
    function check($customer){
        $this->db->select()->from('customer')->where('name',$customer);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($firstname,$lastname,$address,$email,$phone,$shipping_address,$finance_manager,$date_of_record,$web,$handed_of_day,$customer_type,$organic,$country,$state,$city,$zip){
        $this->db->insert('customer',array('country'=>$country,'state'=>$state,'city'=>$city,'zip'=>$zip,'name'=>$firstname,'last_name'=>$lastname,'phone'=>$phone,'address'=>$address,'web'=>$web,'customer_type'=>$customer_type, 'finance_manager'=>$finance_manager,'shipping_address'=>$shipping_address,'date_of_record'=>$date_of_record, 'handed_off_day'=>$handed_of_day,'organic_certi'=>$organic,'email'=>$email));
    }
    function edit_customer($id){
        $this->db->select()->from('customer');
		$this->db->where('id',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($customer,$customer_id){
        $this->db->select()->from('customer')->where('id <>',$customer_id);
        $this->db->where('name',$customer);
        $sql=  $this->db->get();
     
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($id,$firstname,$lastname,$address,$email,$phone,$shipping_address,$finance_manager,$date_of_record,$web,$handed_of_day,$customer_type,$organic,$country,$state,$city,$zip){
        $this->db->where('id',$id);
        $this->db->update('customer',array('country'=>$country,'state'=>$state,'city'=>$city,'zip'=>$zip,'name'=>$firstname,'last_name'=>$lastname,'phone'=>$phone,'address'=>$address,'web'=>$web,'customer_type'=>$customer_type, 'finance_manager'=>$finance_manager,'shipping_address'=>$shipping_address,'date_of_record'=>$date_of_record, 'handed_off_day'=>$handed_of_day,'organic_certi'=>$organic,'email'=>$email));
    }
    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('customer');
                
    }
    function customers_type($name){
        $this->db->select()->from('customer_type');
            $this->db->like('type',$name);
            $sql=$this->db->get();
            $data=array();
            foreach($sql->result() as $row){
            $data[]=$row->type;
            }
            return $data;
    }
}
?>
