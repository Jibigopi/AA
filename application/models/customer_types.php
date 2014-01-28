<?php
class Customer_types extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function get_customer_types(){
        $this->db->select()->from('customer_type');
        $sql=  $this->db->get();
        return $sql->result();
             
         }
                 
   function data_table($end,$start,$order,$like){
         $this->db->select()->from('customer_type');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('customer_type');;
    }
    function check($customer_type){
        $this->db->select()->from('customer_type')->where('type',$customer_type);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($customer_type){
        
        $this->db->insert('customer_type',array('type'=>$customer_type));
        $id=  $this->db->insert_id();
        $guid=  md5($customer_type.'customer_type'.$id);
        $this->db->where('id',$id);
        $this->db->update('customer_type',array('guid'=>$guid));
    }
    function edit_customer_type($id){
        $this->db->select()->from('customer_type');
		$this->db->where('guid',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($customer_type,$customer_type_id){
        $this->db->select()->from('customer_type')->where('guid <>',$customer_type_id);
        $this->db->where('type',$customer_type);
        $sql=  $this->db->get();
        echo $sql->num_rows()."<br>";
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($ecustomer_type,$customer_type_id){
        $this->db->where('guid',$customer_type_id);
        $this->db->update('customer_type',array('type'=>$ecustomer_type));
    }
    function delete($id){
        $this->db->where('guid',$id);
        $this->db->delete('customer_type');
                
    }
}
?>
