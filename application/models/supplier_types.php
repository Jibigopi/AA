<?php
class Supplier_types extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function get_supplier_types(){
        $this->db->select()->from('supplier_type');
        $sql=  $this->db->get();
        return $sql->result();
             
         }
                 
   function data_table($end,$start,$order,$like){
         $this->db->select()->from('supplier_type');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('supplier_type');;
    }
    function check($supplier_type){
        $this->db->select()->from('supplier_type')->where('type',$supplier_type);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($supplier_type){
        
        $this->db->insert('supplier_type',array('type'=>$supplier_type));
        $id=  $this->db->insert_id();
        $guid=  md5($supplier_type.'supplier_type'.$id);
        $this->db->where('id',$id);
        $this->db->update('supplier_type',array('guid'=>$guid));
    }
    function edit_supplier_type($id){
        $this->db->select()->from('supplier_type');
		$this->db->where('guid',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($supplier_type,$supplier_type_id){
        $this->db->select()->from('supplier_type')->where('guid <>',$supplier_type_id);
        $this->db->where('type',$supplier_type);
        $sql=  $this->db->get();
        echo $sql->num_rows()."<br>";
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($esupplier_type,$supplier_type_id){
        $this->db->where('guid',$supplier_type_id);
        $this->db->update('supplier_type',array('type'=>$esupplier_type));
    }
    function delete($id){
        $this->db->where('guid',$id);
        $this->db->delete('supplier_type');
                
    }
}
?>
