<?php
class Suppliers extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
         $this->db->select()->from('supplier');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('supplier');;
    }
    function check($supplier){
        $this->db->select()->from('supplier')->where('name',$supplier);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($supplier,$email,$phone,$contact,$company,$country,$city,$state,$zip){
        $this->db->insert('supplier',array('country'=>$country,'state'=>$state,'city'=>$city,'zip'=>$zip,'name'=>$supplier,'email'=>$email,'phone'=>$phone,'company'=>$company,'address'=>$contact));
        return $this->db->insert_id();
    }
    function edit_supplier($id){
        $this->db->select()->from('supplier');
		$this->db->where('id',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($supplier,$supplier_id){
        $this->db->select()->from('supplier')->where('id <>',$supplier_id);
        $this->db->where('name',$supplier);
        $sql=  $this->db->get();
        
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($supplier_id,$supplier,$email,$company,$contact,$phone,$country,$city,$state,$zip){
        $this->db->where('id',$supplier_id);
        $this->db->update('supplier',array('country'=>$country,'state'=>$state,'city'=>$city,'zip'=>$zip,'name'=>$supplier,'email'=>$email,'phone'=>$phone,'company'=>$company,'address'=>$contact));
    }
    function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('supplier');
                
    }
    function get_suppliers_type(){
        $this->db->select()->from('supplier_type');
        $sql=  $this->db->get();
        return $sql->result();
    }
    function add_supplier_types($guid,$type){
        $this->db->insert('supplier_x_supplier_types',array('supplier'=>$guid,'type'=>$type));
    }
    function get_selected_suppliers_types($guid){
//          function get_sales_channel($guid){
        $this->db->select()->from('supplier')->where('id',$guid);
        $sql=  $this->db->get();
        $data=array();
        $product_id=array();
        $selected_product_id=array();
        $i=0;
        $o=0;
        $k=0;
        $data[0]= $sql->result();
        
        $this->db->select()->from('supplier_x_supplier_types')->where('supplier',$guid);
        $num=  $this->db->get();
        foreach ($num->result() as $row1){
        $data[1][$o++]=$row1;
        $selected_product_id[]=$row1->type;
        }
        
        
        $this->db->select()->from('supplier_type');
        $channel=  $this->db->get();
        foreach ($channel->result() as $row){
        $data[2][$k++]=$row;
        $product_id[]=$row->guid;
        }
        
        
        $arr=array_merge($product_id,$selected_product_id);
        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
        $temp = $arr[$i];
        $j = $i;
        for ($k = 0; $k < $len; $k++) {
            if ($k != $j) {
            if ($temp == $arr[$k]) {               
                $arr[$k]=" ";
                $arr[$i]=" ";
            }
            }
        }
        }
      $r=0;
      $new_depa=array();
        for ($i = 0; $i < $len; $i++) {
       if($arr[$i]==" "){
           
       }
       else{
           $new_depa[$r]=$arr[$i];
           $r++;
       }
        }
        for($m=0;$m<count($new_depa);$m++){
            $data[3][$m]=$new_depa[$m];
        }
        return $data;
    }
    function delete_supplier_types($guid){
        $this->db->where('supplier',$guid);
        $this->db->delete('supplier_x_supplier_types');
        
                
    }
    }

?>
