<?php
class Grains extends CI_model{
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
    function get_grains_details($name){
        $this->db->select()->from('grains')->where('name',$name);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            $data['invalid']='TRUE';
            foreach ($sql->result() as $row){
            $data[]= $row;
            }            
        }else{
            $data['invalid']='FALSE';
        }
        return $data;
    }
    function already_grain($id,$code,$category){        
        $this->db->select()->from('grains');
        $this->db->where('gcode',$code);
        $this->db->where('id <>',$id);
        $this->db->where('cat_name',$category);
        
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
          
        }else{
             return TRUE;         
        }
    }
    function add($grain,$sku,$name,$category,$description){
        $data=array('name'=>$name,'sku'=>$sku,'cat_name'=>$category,'gcode'=>$grain,'dis'=>$description);
        $this->db->insert('grains',$data);
        $id=  $this->db->insert_id();
        $this->db->where('id',$id);
        $this->db->update('grains',array('guid'=>  md5($id.'grains'.$name)));
       
        $this->db->select()->from('master')->where('name','product');
        $nu=  $this->db->get();
        $num;
        foreach ($nu->result() as $row){
       $num=$row->value;
        }
        $this->db->where('name','product');
        $num=$num+1;
        $this->db->update('master',array('value'=>$num));
         return md5($id.'grains'.$name); 
        
    }
    function update($grain,$sku,$name,$category,$description){
        $this->db->where('guid',$grain);
        $data=array('name'=>$name,'sku'=>$sku,'cat_name'=>$category,'dis'=>$description);
        $this->db->update('grains',$data);      
        
    }
    function users_update_grain($id,$name,$category,$code,$price,$dis){
        $data=array('name'=>$name,
            'cat_name'=>$category,'gcode'=>$code,'price'=>$price,'dis'=>$dis);
        $this->db->where('id',$id);
        $this->db->update('grains',$data);
    }
    function grains_table($end,$start,$order,$like){
         $this->db->select()->from('grains');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
        
    }
    function count_grain(){
            return $this->db->count_all('grains');
    }
    function get_grain($guid){
        $this->db->select()->from('grains')->where('id',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function check($grain){
        $this->db->select()->from('grains')->where('gcode',$grain);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    function edit_grain($guid){
        $this->db->select()->from('grains')->where('guid',$guid);
        $sql=  $this->db->get();
        $data=array();
        foreach ($sql->result() as $row){
            $data[]=$row;
        }
        $this->db->select()->from('nutrition')->where('product_id',$guid);
        $num=  $this->db->get();
        foreach ($num->result() as $row){
        $data[]=$row;
        }
          
        return $data;
    }
    function get_sales_channel($guid){
        $this->db->select()->from('grains')->where('guid',$guid);
        $sql=  $this->db->get();
        $data=array();
        $product_id=array();
        $selected_product_id=array();
        $i=0;
        $o=0;
        $k=0;
        foreach ($sql->result() as $row){
            $data[0][$i++]=$row;
        }
        $this->db->select()->from('grains_x_sales_channel')->where('product_id',$guid);
        $num=  $this->db->get();
        foreach ($num->result() as $row1){
        $data[1][$o++]=$row1;
        $selected_product_id[]=$row1->channel_id;
        }
        
        
        $this->db->select()->from('sales_chanel');
        $channel=  $this->db->get();
        foreach ($channel->result() as $row){
        $data[2][$k++]=$row;
        $product_id[]=$row->id;
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
    function delete_nut($guid){
        $this->db->where('product_id',$guid);
        $this->db->delete('nutrition');
    }
    function delete($guid){
         $this->db->where('guid',$guid);
        $this->db->delete('grains');
    }
    function get_product_category($name){
        $this->db->select()->from('grains_category');
            $this->db->like('name',$name);
            $sql=$this->db->get();
            $data=array();
            foreach($sql->result() as $row){
            $data[]=$row->name;
            }
            return $data;
    }
    function add_Nutrition($guid,$index,$value){
        $data=array('product_id'=>$guid,'index'=>$index,'value'=>$value);
        $this->db->insert('nutrition',$data);
    }
    function add_image($guid,$file_name){
        $this->db->where('guid',$guid);
        $this->db->update('grains',array('image'=>$file_name));
    }
    function nutrition_image($guid,$file_name){
        $this->db->where('guid',$guid);
        $this->db->update('grains',array('nutrition'=>$file_name));
    }
    function get_category(){
        $this->db->select()->from('grains_category');
         $sql=$this->db->get();
         return $sql->result();
    }
       function generate_number(){
        $this->db->select()->from('master')->where('name','product');
        $sql=  $this->db->get();
        foreach ($sql->result() as $row)
        {
            return $row->value;
        }
}
    function sales_chanel(){
        $this->db->select()->from('sales_chanel');
        $sql=  $this->db->get();
        return $sql->result();
    }
    function delete_sales_channel($guid){
        $this->db->where('product_id',$guid);
        $this->db->delete('grains_x_sales_channel');
    }
    function add_sales_channel($guid,$channel){
        $this->db->insert('grains_x_sales_channel',array('channel_id'=>$channel,'product_id'=>$guid));
    }
}
?>
