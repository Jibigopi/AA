<?php
class Sales_orders extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
                $this->db->select('sales_order.id as id,sales_order.grand_total as total,sales_order.guid as guid,sales_order.status as status ,sales_order.number as number,,sales_order.invoice as invoice,sales_order.receipient as receipient,sales_order.address as address,sales_order.no_of_unit as no_of_unit,customer.name as cname,grains.name as gname')->from('sales_order');
                $this->db->join('grains', 'sales_order.product=grains.guid','left');
                $this->db->join('customer', 'sales_order.customer=customer.guid','left');
                $this->db->limit($end,$start); 
               //$this->db->order_by($order);
                $this->db->like($like);     
                $query=$this->db->get();
                return $query->result_array();    
    }
    function invoice_data_table($end,$start,$order,$like){
                $this->db->select('sales_order.id as id,sales_order.grand_total as total,sales_order.guid as guid,sales_order.status as status ,sales_order.sales_status as sales_status ,sales_order.number as number,,sales_order.invoice as invoice,sales_order.receipient as receipient,sales_order.address as address,sales_order.no_of_unit as no_of_unit,customer.name as cname,grains.name as gname')->from('sales_order');
                $this->db->join('grains', 'sales_order.product=grains.guid','left');
                $this->db->join('customer', 'sales_order.customer=customer.guid','left');
                $this->db->limit($end,$start); 
                $this->db->where('sales_order.status',1);
               //$this->db->order_by($order);
                $this->db->like($like);     
                $query=$this->db->get();
                return $query->result_array();    
    }
    function count(){
        return $this->db->count_all('sales_order');;
    }
    function check($sales_order){
        $this->db->select()->from('sales_order')->where('number',$sales_order);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($data){
        $this->db->insert('sales_order',$data);
        $id=  $this->db->insert_id();
        $this->db->where('id',$id);
        $this->db->update('sales_order',array('guid'=>  md5('sales_order'.$id)));
        
         $this->db->select()->from('master')->where('name','sales_order');
         $nu=  $this->db->get();
         $num;
         foreach ($nu->result() as $row){
         $num=$row->value;
         }
         $this->db->where('name','sales_order');
         $num=$num+1;
         $this->db->update('master',array('value'=>$num));
    }
    function edit_sales_order($id){
        $customer;
        $product;
        $this->db->select()->from('sales_order');
		$this->db->where('guid',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
                        $customer=$row['customer'];
                        $product=$row['product'];
			}
                        
                        
                        $this->db->select()->from('customer')->where('guid',$customer)        ;
                        $cust=$this->db->get();
                        foreach ($cust->result() as $crow){
                            $data[]=$crow;
                        }
                        
                        $this->db->select()->from('grains')->where('guid',$product)        ;
                        $pro=$this->db->get();
                        foreach ($pro->result() as $crow){
                            $data[]=$crow;
                        }
                        $this->db->select()->from('inventory_stock')->where('inventory_id',$product);
                        $ssql=  $this->db->get();
                         foreach ($ssql->result() as $row){
                          $data[]= $row;
                        }   
                        
                        
                        
		 return $data;
    }
    function check_update($sales_order,$sales_order_id){
        $this->db->select()->from('sales_order')->where('id <>',$sales_order_id);
        $this->db->where('name',$sales_order);
        $sql=  $this->db->get();
        echo $sql->num_rows()."<br>";
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($guid,$data){
        $this->db->where('guid',$guid);
        $this->db->update('sales_order',$data);
    }
    function delete($id){
        $this->db->where('guid',$id);
        $this->db->delete('sales_order');
                
    }
    function approve($guid){
        $this->db->select()->from('sales_order')->where('guid',$guid);
        $sql=  $this->db->get();
        $id;
        foreach ($sql->result() as $row){
            $id=$row->id;
        }        
        $invoice='AA-INV-20'.$id;        
        $this->db->where('guid',$guid);
        $this->db->update('sales_order',array('status'=>1,'invoice'=>$invoice));                
    }
    function customer($name){
          $this->db->select()->from('customer')->where('name',$name);
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
     function get_grains_details($name){
        $this->db->select()->from('grains')->where('name',$name);
        $sql=  $this->db->get();
        $pr_id;
        if($sql->num_rows()>0){
            $data['invalid']='TRUE';
            foreach ($sql->result() as $row){
                $pr_id=$row->guid;
            $data[]= $row;
            }   
              $this->db->select()->from('inventory_stock')->where('inventory_id',$pr_id);
            $ssql=  $this->db->get();
             if($ssql->num_rows()>0){
                 $data['stock']='TRUE';
             foreach ($ssql->result() as $row){
              $data[]= $row;
             }   }else{
                   $data['stock']='FALSE';
                 
             }
            
            
        }else{
            $data['invalid']='FALSE';
        }
        return $data;
    }
    function get_invoice($guid){
        $this->db->select('sales_order.*, customer.name as cname,grains.name as gname')->from('sales_order')->where('sales_order.guid',$guid);
        $this->db->join('grains', 'sales_order.product=grains.guid','left');
        $this->db->join('customer', 'sales_order.customer=customer.guid','left');
        $sql=  $this->db->get();
        
        
        return $sql->result();
    }
    function generate_number(){
        $this->db->select()->from('master')->where('name','sales_order');
        $sql=  $this->db->get();
        foreach ($sql->result() as $row)
        {
            return $row->value;
        }
       
                 
    }
}
?>
