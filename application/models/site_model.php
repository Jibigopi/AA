<?php

class Site_model extends CI_Model {

	function get_records()
	{
		$query = $this->db->get('pages');
		return $query->result();
	}

	function add_record($data)
	{
		$this->db->insert('pages', $data);
		return;
	}

	function update_page($id,$data)
	{
            echo $id;
            $this->db->where('id', $id);
            $this->db->update('pages', $data);

	}
        function data_table($end,$start,$order,$like){
                $this->db->select()->from('pages');  
                $this->db->limit($end,$start); 
                $this->db->order_by($order);
                $this->db->or_like($like);     
                $query=$this->db->get();
                return $query->result_array();
        }
        function count(){
               return $this->db->count_all('pages');
        }
        function add_new_page($data){
            $this->db->insert('pages',$data);
        }
        function check_page($name){
            $this->db->select()->from('pages')->where('title',$name);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
                return FALSE;
            } 
            return TRUE;
        }
        function delete_row()
	{


		$this->db->where('id', $this->uri->segment(3));
		$this->db->delete('pages');

	}
    function update_row(){
        $qu=$this->db->where('id', $this->uri->segment(3))->get('pages');
       return $qu->result();


        }
   function edit_page($id){
        $this->db->select()->from('pages');
		$this->db->where('id',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function delete_page($guid){
        $this->db->where('id',$guid);
        $this->db->delete('pages');
    }
    function get_page_data($guid){
        $this->db->select()->from('pages')->where('id',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }

}