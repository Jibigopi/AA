<?php
class Sales_receipts_m extends CI_model{
    function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
                $this->db->select('sales_order.id as id,sales_order.invoice as invoice,sales_order.sales_status as sales_status,sales_order.grand_total as total,sales_order.guid as guid,sales_order.status as status ,sales_order.number as number,sales_order.receipient as receipient,sales_order.address as address,sales_order.no_of_unit as no_of_unit,customer.name as cname,grains.name as gname')->from('sales_order');
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
        $query = $this->db->where('status',1)->get('sales_order');
        return $query->num_rows();
 }
 function add_new_sale($id){
      $customer;
        $product;
        $this->db->select()->from('sales_order')->where('status',1);
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
 function get_invoice_details($id){
      $customer;
        $product;
        $this->db->select()->from('sales_order')->where('status',1)->where('sales_status',0);
		$this->db->where('invoice',$id);
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
 function check_sales($data){
     $this->db->select()->from('sales_receipts')->where('invoice_number',$data);
     $sql=  $this->db->get();
     if($sql->num_rows()>0){
         return 'FALSE';
     }else{
         return 'TRUE';
     }
 }
 function add_sales($data,$order){
     $this->db->insert('sales_receipts',$data);
     $this->db->where('guid',$order);
     $this->db->update('sales_order',array('sales_status'=>1));
 }
 function invoice_number($name){
       $this->db->select()->from('sales_order')->where('status',1)->where('sales_status',0);
        $this->db->like('invoice',$name);
	$sql=$this->db->get();
	$data=array();
	foreach($sql->result() as $row){
	$data[]=$row->invoice;
        }
        return $data;
 }
 function get_invoice($name){
        $customer;
        $product;
        $this->db->select()->from('sales_order');
		$this->db->where('invoice',$name);
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
    
}
?>
