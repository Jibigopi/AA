<?php
class Products_details extends CI_model{
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
    function products_meta_table($end,$start,$order,$like,$guid){
         $this->db->select()->from('product_meta')->where('product_id',$guid);  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
     function count_meta($guid){
        $this->db->select()->from('product_meta')->where('id',$guid);
        $sql=  $this->db->get();
        return $sql->num_rows();
    }
    function max_id($guid){
        $this->db->select();
        $this->db->where('product_id',$guid);
        $this->db->order_by('id', 'DESC'); 
        $this->db->limit(1);
        $sql= $this->db->get('product_meta');
        $id;
        foreach ($sql->result() as $row){
            $id=$row->id;
        }
        return $id;
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
    function get_product($guid){
        $this->db->select()->from('grains')->where('guid',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_product_images($guid){
        $this->db->select()->from('product_meta')->where('key','image')->where('product_id',$guid);
        $sql=  $this->db->get();
        return $sql->result();
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
        $this->db->insert('product_meta',array('product_id'=>$guid,'key'=>'image','url'=>'/uploads/product_images/','value'=>$file_name));
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
    function remove_image($guid){
        $this->db->where('id',$guid);
        
        $this->db->delete('product_meta');
      
    }
    function add_product_over_view($product,$over){
        $this->db->select()->from('product_meta')->where('product_id',$product)->where('key','over_view');
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            $this->db->where('product_id',$product)->where('key','over_view');
            $this->db->update('product_meta',array('value'=>$over));
        }else{
            $this->db->insert('product_meta',array('key'=>'over_view','value'=>$over,'product_id'=>$product));
                    
        }
    }
    function add_product_source($product,$over){
        $this->db->select()->from('product_meta')->where('product_id',$product)->where('key','source');
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            $this->db->where('product_id',$product)->where('key','source');
            $this->db->update('product_meta',array('value'=>$over));
        }else{
            $this->db->insert('product_meta',array('key'=>'source','value'=>$over,'product_id'=>$product));
                    
        }
    }
    function add_product_benefits($product,$over){
        $this->db->select()->from('product_meta')->where('product_id',$product)->where('key','benefits');
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            $this->db->where('product_id',$product)->where('key','benefits');
            $this->db->update('product_meta',array('value'=>$over));
        }else{
            $this->db->insert('product_meta',array('key'=>'benefits','value'=>$over,'product_id'=>$product));
                    
        }
    }
    function add_product_culinary($product,$over){
        $this->db->select()->from('product_meta')->where('product_id',$product)->where('key','culinary');
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            $this->db->where('product_id',$product)->where('key','culinary');
            $this->db->update('product_meta',array('value'=>$over));
        }else{
            $this->db->insert('product_meta',array('key'=>'culinary','value'=>$over,'product_id'=>$product));
                    
        }
    }
    function add_product_description($product,$over){
        $this->db->select()->from('product_meta')->where('product_id',$product)->where('key','description');
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            $this->db->where('product_id',$product)->where('key','description');
            $this->db->update('product_meta',array('value'=>$over));
        }else{
            $this->db->insert('product_meta',array('key'=>'description','value'=>$over,'product_id'=>$product));
                    
        }
    }
    function get_product_meta($guid,$key){
        $this->db->select('product_meta.*,grains.name,grains.gcode')->from('product_meta')->where('product_meta.product_id',$guid)->where('product_meta.key',$key);
        $this->db->join('grains','grains.guid=product_meta.product_id','left' );
        $sql=$this->db->get();
        if($sql->num_rows()>0){
          return $sql->result();
        }else{
            $this->db->select()->from('grains')->where('guid',$guid);
            $pro=$this->db->get();
            return $pro->result();     
                    
        }
        }
    
}
?>
