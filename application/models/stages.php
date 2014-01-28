<?php
class Stages extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
         $this->db->select()->from('stage');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('stage');;
    }
    function check($stage){
        $this->db->select()->from('stage')->where('name',$stage);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($stage){
        $this->db->insert('stage',array('name'=>$stage));
    }
    function edit_stage($id){
        $this->db->select()->from('stage');
		$this->db->where('id',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($stage,$stage_id){
        $this->db->select()->from('stage')->where('id <>',$stage_id);
        $this->db->where('name',$stage);
        $sql=  $this->db->get();
        echo $sql->num_rows()."<br>";
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($estage,$stage_id){
        $this->db->where('id',$stage_id);
        $this->db->update('stage',array('name'=>$estage));
    }
    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('stage');
                
    }
}
?>
