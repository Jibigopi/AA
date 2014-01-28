<?php
class Grains_categorys extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
         $this->db->select()->from('grains_category');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('grains_category');;
    }
    function check($grains_category){
        $this->db->select()->from('grains_category')->where('name',$grains_category);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($grains_category){
        $this->db->insert('grains_category',array('name'=>$grains_category));
    }
    function edit_grains_category($id){
        $this->db->select()->from('grains_category');
		$this->db->where('id',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($grains_category,$grains_category_id){
        $this->db->select()->from('grains_category')->where('id <>',$grains_category_id);
        $this->db->where('name',$grains_category);
        $sql=  $this->db->get();
        echo $sql->num_rows()."<br>";
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($egrains_category,$grains_category_id){
        $this->db->where('id',$grains_category_id);
        $this->db->update('grains_category',array('name'=>$egrains_category));
    }
    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('grains_category');
                
    }
}
?>
