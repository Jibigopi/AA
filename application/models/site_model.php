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
    function get_product_data($guid){
        $this->db->select('product_meta.*,grains.name,grains.gcode,grains.image,grains.nutrition ')->from('product_meta')->where('product_meta.product_id',$guid);
        $this->db->join('grains','grains.guid=product_meta.product_id','left' );
        $sql=$this->db->get();;
        return $sql->result();
    }
    function get_items_price($guid){
        $this->db->select('inventory_stock.*,grains.*,grains_x_sales_channel.*,sales_chanel.name as sname,sales_chanel.id as sid')->from('inventory_stock');
        $this->db->join('grains', 'grains.guid=inventory_stock.inventory_id ','left');
        $this->db->join('grains_x_sales_channel', 'grains.guid=grains_x_sales_channel.product_id ','left');
        $this->db->join('sales_chanel', 'sales_chanel.id=grains_x_sales_channel.channel_id ','left');
        $this->db->where('sales_chanel.id',9);
        $this->db->limit(1);
        $this->db->where('inventory_stock.inventory_id',$guid);
        $sql=  $this->db->get();
        return $sql->result();
                
                
    }
    function get_page_data($guid){
        $this->db->select()->from('pages')->where('id',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }
}