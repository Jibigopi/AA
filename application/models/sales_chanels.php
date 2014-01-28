<?php
class Sales_chanels extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
         $this->db->select()->from('sales_chanel');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('sales_chanel');;
    }
    function check($sales_chanel){
        $this->db->select()->from('sales_chanel')->where('name',$sales_chanel);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($sales_chanel){
        $this->db->insert('sales_chanel',array('name'=>$sales_chanel));
    }
    function edit_sales_chanel($id){
        $this->db->select()->from('sales_chanel');
		$this->db->where('id',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($sales_chanel,$sales_chanel_id){
        $this->db->select()->from('sales_chanel')->where('id <>',$sales_chanel_id);
        $this->db->where('name',$sales_chanel);
        $sql=  $this->db->get();
        echo $sql->num_rows()."<br>";
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($esales_chanel,$sales_chanel_id){
        $this->db->where('id',$sales_chanel_id);
        $this->db->update('sales_chanel',array('name'=>$esales_chanel));
    }
    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('sales_chanel');
                
    }
}
?>
