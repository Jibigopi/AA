<?php
class Storage_locations extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
         $this->db->select()->from('storage_location');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('storage_location');;
    }
    function check($storage_location){
        $this->db->select()->from('storage_location')->where('name',$storage_location);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($storage_location,$email,$phone,$price,$contact,$available){
        $this->db->insert('storage_location',array('name'=>$storage_location,'email'=>$email,'phone'=>$phone,'price'=>$price,'contact'=>$contact,'total_sqr_ft'=>$available));
    }
    function edit_storage_location($id){
        $this->db->select()->from('storage_location');
		$this->db->where('id',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($storage_location,$storage_location_id){
        $this->db->select()->from('storage_location')->where('id <>',$storage_location_id);
        $this->db->where('name',$storage_location);
        $sql=  $this->db->get();
        echo $sql->num_rows()."<br>";
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($storage_location,$storage_location_id,$phone,$email,$contact,$available,$price){
        $this->db->where('id',$storage_location_id);
        $this->db->update('storage_location',array('name'=>$storage_location,'email'=>$email,'contact'=>$contact,'price'=>$price,'phone'=>$phone,'total_sqr_ft'=>$available));
    }
    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('storage_location');
                
    }
}
?>
