<?php

class Users extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function login($username,$password){
        $password=  md5($password);
        $this->db->select()->from('customer');
        $this->db->where('username',$username)->where('password',$password);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
           foreach ($sql->result() as $row){
               return $row->guid   ;
    }
            
        }else{
           return FALSE;         
        }
    }
    function check_current_user_password($guid,$password){
        $pass=md5($password);
        $this->db->select()->from('user')->where('guid',$guid)->where('password',$pass);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return TRUE;
        }  else {
            return FALSE;    
        }
    }
            function admin_login($username,$password){
        $password=  md5($password);
        $this->db->select()->from('user');
        $this->db->where('username',$username)->where('password',$password);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
           foreach ($sql->result() as $row){
               return $row->guid   ;
    }
            
        }else{
           return FALSE;         
        }
    }
    function user_type($id){
        $this->db->select()->from('customer');
        $this->db->where('guid',$id);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
           foreach ($sql->result() as $row){
               return $row->user   ;
          }
            
        }
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
    function already_customer($id,$email,$phone){        
        $this->db->select()->from('users');
        $this->db->where('email',$email);
        $this->db->where('id <>',$id);
        $this->db->where('phone',$phone);
        
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
          
        }else{
             return TRUE;         
        }
    }
    function grain_alread_exit_for_add($code,$category){        
        $this->db->select()->from('grains');
        $this->db->where('gcode',$code);
        $this->db->where('cat_name',$category);
        
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
          
        }else{
             return TRUE;         
        }
    }
    function customer_already_exit_for_add($email,$phone,$username){        
        $this->db->select()->from('user');
        $this->db->where('email',$email);
        $this->db->where('phone',$phone);
        $this->db->where('username',$username);
        
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
          
        }else{
             return TRUE;         
        }
    }
    function already_exit_customer_for_update($id,$username,$phone,$email){        
        $this->db->select()->from('user');
        $this->db->where('email',$email);
        $this->db->where('id <>',$id);
        $this->db->where('phone',$phone);
        $this->db->where('username',$username);
        
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
          
        }else{
             return TRUE;         
        }
    }
    function already_exit_category_for_update($id,$name){        
        $this->db->select()->from('category');
        $this->db->where('name',$name);
        $this->db->where('id <>',$id);
        
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
          
        }else{
             return TRUE;         
        }
    }
    function category_already_exit_for_add($name){        
        $this->db->select()->from('grains_category');
        $this->db->where('name',$name);       
        
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
          
        }else{
             return TRUE;         
        }
    }
    function add_new_grain($name,$category,$code,$price,$dis){
        $data=array('name'=>$name,'cat_name'=>$category,'gcode'=>$code,'price'=>$price,'dis'=>$dis);
        $this->db->insert('grains',$data);
    }
    function add_new_customer($phone,$first_name,$last_name,$email,$address,$password,$address,$username){
        $data=array('phone'=>$phone,'username'=>$username,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'address'=>$address,'password'=>  md5($password));
        $this->db->insert('user',$data);
    }
    function update_customer($id,$phone,$first_name,$last_name,$email,$address,$password,$address,$username,$country,$state,$zip){
     
          $data=array('phone'=>$phone,
             'username'=>$username,
             'name'=>$first_name,
             'last_name'=>$last_name,
             'customer_type'=>'Websales',
             'email'=>$email,
             'address'=>$address,
             'password'=>  md5($password),
             'country'=>$country,'state'=>$state,'zip'=>$zip);
        $this->db->where('guid',$id);
        $this->db->update('customer',$data);
    }
    function update_category($id,$name,$description){
        $data=array('name'=>$name,'description'=>$description);
        $this->db->where('id',$id);
        $this->db->update('grains_category',$data);
    }
   function users_update_grain($id,$name,$category,$code,$price,$dis){
        $data=array('name'=>$name,
            'cat_name'=>$category,'gcode'=>$code,'price'=>$price,'dis'=>$dis);
        $this->db->where('id',$id);
        $this->db->update('grains',$data);
    }
    function posnic_data_table($end,$start,$order,$like){
         $this->db->select()->from('user');  
         $this->db->where('user <>',1);
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);        
         $query=$this->db->get();
         return $query->result_array();
        
    }
    function grains_table($end,$start,$order,$like){
         $this->db->select()->from('grains');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
        
    }
    function category_table($end,$start,$order,$like){
         $this->db->select()->from('grains_category');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
        
    }
    function count_grain(){
            return $this->db->count_all('grains');
    }
    function count_customer(){
            return $this->db->count_all('user')-1;
    }
    function count_category(){
            return $this->db->count_all('grains_category');
    }
   
    function get_user($guid){
        $this->db->select()->from('customer')->where('guid',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_grain($guid){
        $this->db->select()->from('grains')->where('id',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_category(){
        $this->db->select()->from('grains_category');
        $sql=  $this->db->get();
        return $sql->result();
    }
    function delete_grains($id){
        $this->db->where('id',$id);
        $this->db->delete('grains');
    }
    function customer_delete($id){
        
        $this->db->where('id',$id);
        $this->db->delete('user');
    }
    function category_delete($id){
        
        $this->db->where('id',$id);
        $this->db->delete('grains_category');
    }
    
    function get_customer_for_update($guid){
        $this->db->select()->from('customer')->where('guid',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_category_for_update($guid){
        $this->db->select()->from('grains_category')->where('id',$guid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function add_new_category($name,$description){
        $data=array('name'=>$name,'description'=>$description);
        $this->db->insert('grains_category',$data);
    }
    function shopping(){
        $this->db->select('inventory_stock.*,grains.*,grains_x_sales_channel.*,sales_chanel.name as sname,sales_chanel.id as sid')->from('inventory_stock');
        $this->db->join('grains', 'grains.guid=inventory_stock.inventory_id ','left');
        $this->db->join('grains_x_sales_channel', 'grains.guid=grains_x_sales_channel.product_id ','left');
        $this->db->join('sales_chanel', 'sales_chanel.id=grains_x_sales_channel.channel_id ','left');
        $this->db->where('sales_chanel.id',9);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function add_new_order($uid,$total,$first_name,$last_name,$address,$phone,$email,$country,$state,$zip,$sfirst_name,$slast_name,$saddress,$sphone,$semail,$scountry,$sstate,$szip,$date){
        $data=array('total_amount'=>$total,
                    'customer'=>$uid,
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'address'=>$address,
                    'phone'=>$phone,
                    'email'=>$email,
                    'country'=>$country,
                    'state'=>$state,
                    'zip'=>$zip,
                    'sfirst_name'=>$sfirst_name,
                    'slast_name'=>$slast_name,
                    'saddress'=>$saddress,
                    'sphone'=>$sphone,
                    'semail'=>$semail,
                    'scountry'=>$scountry,
                    'sstate'=>$sstate,
                    'szip'=>$szip,
                    'status'=>1,
            'payment_status'=>'Failure',
                    
                    'date'=>$date
            );
            $this->db->insert('orders',$data);
            $id=$this->db->insert_id();
            $guid=  md5($id.$date.$first_name.$sfirst_name);
             $orderid='AA-WS-10'.$id;
            $value=array('order_id'=>$orderid,'guid'=>$guid);
            $this->db->where('id',$id);
            $this->db->update('orders',$value);
            
            return $guid;
                
    }
    function order_items($orderid,$id,$name,$price,$qty){
        $data=array('order_id'=>$orderid,'grain'=>$id,'grain_name'=>$name,'price'=>$price,'quty'=>$qty);
        $this->db->insert('order_items',$data);
    }
    function sign_up($phone,$first_name,$last_name,$email,$address,$password,$address,$username,$country,$state,$zip){
         $data=array('phone'=>$phone,
             'username'=>$username,
             'name'=>$first_name,
             'last_name'=>$last_name,
             'customer_type'=>'Websales',
             'email'=>$email,
             'address'=>$address,
             'password'=>  md5($password),
             'country'=>$country,'state'=>$state,'zip'=>$zip);
         $this->db->insert('customer',$data);
         $id=$this->db->insert_id();
         $this->db->where('id',$id);
         $this->db->update('customer',array('guid'=>md5($id.'Customer')));
         return md5($id.'Customer');
         
    }
    function get_orders($id){
        $this->db->select()->from('orders')->where('customer',$id);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_invoice($id){
         $this->db->select()->from('orders')->where('guid',$id);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_items($id){
        $this->db->select()->from('order_items')->where('order_id',$id);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function payment_transaction($order,$key,$value){
        $data=array('order_id'=>$order,'key'=>$key,'value'=>$value);
        $this->db->insert('payment_transaction',$data);
    }
    function update_order_payment($order,$status){
        $data=array('payment_status'=>$status);
        $this->db->where('guid',$order);
        $this->db->update('orders',$data);
               
    }
    function get_all_orders(){
        $this->db->select()->from('orders');
        $sql=  $this->db->get();
        return $sql->result();
    }
	
    function get_grains_for_auto_complete($name){
	$this->db->select()->from('grains');
	$this->db->like('name',$name);
	$sql=$this->db->get();
	$data=array();
	foreach($sql->result() as $row){
	$data[]=$row->name;
	}
	return $data;
	}
	
	
	function update_stock($quty,$grain,$grain_name,$stage,$price,$temp,$stock){
	  $this->db->select()->from('stock')->where('stage',$stage)->where('grain_name',$grain_name);
	  $sql=$this->db->get();
	  $old_stock=0;
	  $id;
	  foreach($sql->result() as $row){
	  $old_stock=$row->stock;
	 echo  $id=$row->id;
	 
	  }
         $stock=$old_stock+$stock;
	 $data=array('quty'=>$quty,'date'=>date("Y/m/d"),'grain'=>$grain,'grain_name'=>$grain_name,'stage'=>$stage,'price'=>$price,'temp'=>$temp,'stock'=>$stock);
	 $this->db->where('id',$id);
	 $this->db->update('stock',$data);
	 
	}
	function update_stocks($id,$quty,$price,$temp,$stock){
		$data=array('quty'=>$quty,'date'=>date("Y/m/d"),'price'=>$price,'temp'=>$temp,'stock'=>$stock);
		$this->db->where('id',$id);
		$this->db->update('stock',$data);
	}
	
	function delete_stock($id){
		$this->db->where('id',$id);
		$this->db->delete('stock');
	}
	function stock_merging($id,$name,$price,$qty){
            $this->db->select()->from('grains')->where('name',$name);
            $grain=  $this->db->get();
            $guid;
            foreach ($grain->result() as $row){
                $guid=$row->guid;
            }
            $this->db->select()->from('inventory_stock')->where('inventory_id',$guid);
            $quntity;
            $stock=  $this->db->get();
            foreach ($stock->result() as $row){
                $quntity=$row->unit;
            }
            $this->db->where('inventory_id',$guid);
            $this->db->update('inventory_stock',array('unit'=>$quntity-$qty));
        }
	
        function check_customer_email_id_valid($emil){
            $this->db->select()->from('customer')->where('email',$emil);
            $sql=  $this->db->get();
            if($sql->num_rows()>0){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        function get_customer_id($emil){
            $this->db->select()->from('customer')->where('email',$emil);
            $sql=  $this->db->get();
            foreach ($sql->result() as $row){
                return $row->id;;
            }
        }
        function update_password($emil,$id){
            $this->db->where('id',$id);
            $this->db->update('customer',array('password'=>md5("T34UD".$id."Y954SW")));
        }
        function get_product_details($guid){
            $this->db->select()->from('grains')->where('guid',$guid);
            $sql=  $this->db->get();
            return $sql->result();
        }
        function get_nutrition_details($guid){
            $this->db->select()->from('nutrition')->where('product_id',$guid);
            $sql=  $this->db->get();
            return $sql->result();
        }
        function update_admin_profile($guid,$username,$password){
        $this->db->where('guid',$guid);
        $this->db->update('user',array('username'=>$username,'password'=>  md5($password)));
        }
        function get_user_name($guid){
            $this->db->select()->from('user')->where('guid',$guid);
            $sql=  $this->db->get();
            foreach ($sql->result() as $row){
                return $row->username;
            }
        }
      
}
?>
