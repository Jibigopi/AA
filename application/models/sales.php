<?php
class Sales extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
         $this->db->select()->from('sale');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('sale');;
    }
    function check($sale){
        $this->db->select()->from('sale')->where('invoice',$sale);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add_sales($data){
        $this->db->insert('sale',$data);
        $id=  $this->db->insert_id();
        $this->db->where('id',$id);
        $this->db->update('sale',array('guid'=>  md5('sale'.$id)));
    }
    function edit_sale($id){
        $this->db->select()->from('sale');
        $this->db->where('guid',$id);		
        $sql=$this->db->get();		
        return $sql->result();
    }
    function check_update($sale,$sale_id){
        $this->db->select()->from('sale')->where('id <>',$sale_id);
        $this->db->where('name',$sale);
        $sql=  $this->db->get();
        echo $sql->num_rows()."<br>";
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update_sale($data,$guid){
        $this->db->where('guid',$guid);
        $this->db->update('sale',$data);
    }
    function delete($id){
        $this->db->where('guid',$id);
        $this->db->delete('sale');                
    }
    function customer($name){
        $this->db->select()->from('customer');
        $this->db->like('name',$name);
	$sql=$this->db->get();
	$data=array();
	foreach($sql->result() as $row){
	$data[]=$row->name;
        }
        return $data;
    }
    function grains($name){
        $this->db->select()->from('grains');
        $this->db->like('name',$name);
	$sql=$this->db->get();
	$data=array();
	foreach($sql->result() as $row){
	$data[]=$row->name;
        }
        return $data;
    }
}
?>
