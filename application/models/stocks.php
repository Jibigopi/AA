<?php
class Stocks extends CI_model{
    function __construct() {
        parent::__construct();
        
         }
    function check_grain_is_valid($guid){
	 $this->db->select()->from('grains')->where('guid',$guid);
	 $sql=$this->db->get();
            if($sql->num_rows()>0){
                return TRUE;
            }else{
                return FALSE;
            }
	}
    function check_stock_is_valid($guid){
	 $this->db->select()->from('stock')->where('guid',$guid);
	 $sql=$this->db->get();
            if($sql->num_rows()>0){
                return TRUE;
            }else{
                return FALSE;
            }
	}
    function stock_check($grain,$stage){
		$this->db->select()->from('stock')->where('guid',$grain)->where('stage',$stage);
		$sql=$this->db->get();
		if($sql->num_rows()>0){
			return FALSE;
		}else{
			return TRUE;
		}
	}
   function add_stock($data,$unit,$unit_price,$case,$case_price,$pallet,$pallet_price,$product){
              $this->db->insert('stock',$data);
                $id=  $this->db->insert_id();
                $guid=array('guid'=>  md5('stock'.$id));
                $this->db->where('id',$id);
                $this->db->update('stock',$guid);
                $this->db->select()->from('inventory_stock')->where('inventory_id',$product);
                $sql=  $this->db->get();
                if($sql->num_rows()>0){
                    foreach ($sql->result() as $row){
                        $unit=$unit+$row->unit;
                        $case=$unit+$row->case;
                        $pallet=$pallet+$row->pallet;
                    }
                    $this->db->where('inventory_id',$product);
                     $this->db->update('inventory_stock',array('inventory_id'=>$product,'unit'=>$unit,'unit_price'=>$unit_price,'case'=>$case,'case_price'=>$case_price,'pallet'=>$pallet,'pallet_price'=>$pallet_price));
                    
                }else{
                    
                    $this->db->insert('inventory_stock',array('inventory_id'=>$product,'unit'=>$unit,'unit_price'=>$unit_price,'case'=>$case,'case_price'=>$case_price,'pallet'=>$pallet,'pallet_price'=>$pallet_price));
                }
      
         $this->db->select()->from('master')->where('name','inventory');
         $nu=  $this->db->get();
         $num=0;
         foreach ($nu->result() as $row){
         $num=$row->value;
         }
         $this->db->where('name','inventory');
         $num=$num+1;
         $this->db->update('master',array('value'=>$num));
                
                
	}  
   function edit_stock($id){
		$this->db->select()->from('stock');
		$this->db->where('guid',$id);
		$data=array();
		 $sql=$this->db->get();
                 $grain;
                 $location;
                 $supplier;
		 foreach($sql->result_array() as $row){
			$data[]=$row;
                        $grain=$row['grain_id'];
                        $location=$row['location'];
                        $supplier=$row['supplier'];
			}
                 $this->db->select()->from('grains');
		 $this->db->where('guid',$grain);
		 $g_sql=$this->db->get();
		 foreach($g_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                        
                        $this->db->select()->from('storage_location')->where('id',$location);
                        $l_sql=  $this->db->get();
                        foreach ($l_sql->result() as $row){
                            $data[]= $row;
                        }
                        $this->db->select()->from('supplier')->where('id',$supplier);
                        $s_sql=  $this->db->get();
                        foreach ($s_sql->result() as $row){
                            $data[]= $row;
                        }
                        
		 return $data;
	}
   function get_receiving_notes($id){
		$this->db->select()->from('stock');
		$this->db->where('guid',$id);
		$data=array();
		 $sql=$this->db->get();
                 $grain;
                 $stock;
		 foreach($sql->result_array() as $row){
			$data[]=$row;
                        $grain=$row['grain_id'];
                        $stock=$row['guid'];
			}
                 $this->db->select()->from('grains');
		 $this->db->where('guid',$grain);
		 $g_sql=$this->db->get();
		 foreach($g_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                 $this->db->select()->from('receiving_notes');
		 $this->db->where('stock_id',$stock);
		 $r_sql=$this->db->get();
                 if($r_sql->num_rows()>0){
		 foreach($r_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                 }else{
                     $data[]='none';
                 }
		 return $data;
	}
   function get_inventory_withdrawals($id){
		$this->db->select()->from('stock');
		$this->db->where('guid',$id);
		$data=array();
		 $sql=$this->db->get();
                 $grain;
                 $stock;
                 $location;
		 foreach($sql->result_array() as $row){
			$data[]=$row;
                        $grain=$row['grain_id'];
                        $stock=$row['guid'];
                        $location=$row['location'];
			}
                 $this->db->select()->from('grains');
		 $this->db->where('guid',$grain);
		 $g_sql=$this->db->get();
		 foreach($g_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                 $this->db->select()->from('inventory_withdrawals');
		 $this->db->where('stock_id',$stock);
		 $r_sql=$this->db->get();
                 if($r_sql->num_rows()>0){
		 foreach($r_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                 }else{
                     $data[]='none';
                 }
                 $this->db->select()->from('storage_location')->where('id',$location);
                 $l_sql=  $this->db->get();
                 foreach ($l_sql->result() as $row){
                     $data[]=$row;
                 }
		 return $data;
	}
   function get_inventory_transfers($id){
		$this->db->select()->from('stock');
		$this->db->where('guid',$id);
		$data=array();
		 $sql=$this->db->get();
                 $grain;
                 $stock;
                 $lid;
		 foreach($sql->result_array() as $row){
			$data[]=$row;
                        $grain=$row['grain_id'];
                        $stock=$row['guid'];
                        $lid=$row['location'];
			}
                 $this->db->select()->from('grains');
		 $this->db->where('guid',$grain);
		 $g_sql=$this->db->get();
		 foreach($g_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                 $this->db->select()->from('storage_location');
		 $this->db->where('id',$lid);
		 $r_sql=$this->db->get();
                 if($r_sql->num_rows()>0){
		 foreach($r_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                 }else{
                     $data[]='none';
                 }
		 return $data;
	}
   function get_loction($id){
		$this->db->select()->from('stock');
		$this->db->where('guid',$id);
		$data=array();
		 $sql=$this->db->get();
                 $grain;
                 $stock;
		 foreach($sql->result_array() as $row){
			$data[]=$row;
                        $grain=$row['grain_id'];
                        $stock=$row['location'];
			}
                 $this->db->select()->from('grains');
		 $this->db->where('guid',$grain);
		 $g_sql=$this->db->get();
		 foreach($g_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                 $this->db->select()->from('storage_location');
		 $this->db->where('id',$stock);
		 $r_sql=$this->db->get();
                 if($r_sql->num_rows()>0){
		 foreach($r_sql->result_array() as $row){
			$data[]=$row;                       
			} 
                 }else{
                     $data[]='none';
                 }
		 return $data;
	}
        function update_stocks($guid,$data,$unit,$unit_price,$case,$case_price,$pallet,$pallet_price,$product){
            $this->db->select()->from('stock')->where('guid',$guid);
            $ssql=  $this->db->get();
            $ou;
            $oc;
            $op;
            foreach ($ssql->result() as $row){
                $ou=$row->no_of_unit;
                $oc=$row->no_case;
                $op=$row->no_pallet;
            }
            $this->db->where('guid',$guid);           
            $this->db->update('stock',$data);
            
            $this->db->select()->from('inventory_stock')->where('inventory_id',$product);
                $sql=  $this->db->get();
                if($sql->num_rows()>0){
                    foreach ($sql->result() as $row){
                        $unit=$unit+$row->unit-$ou;
                        $case=$unit+$row->case-$oc;
                        $pallet=$pallet+$row->pallet-$op;
                    }
                    $this->db->where('inventory_id',$product);
                     $this->db->update('inventory_stock',array('inventory_id'=>$product,'unit'=>$unit,'unit_price'=>$unit_price,'case'=>$case,'case_price'=>$case_price,'pallet'=>$pallet,'pallet_price'=>$pallet_price));
                    
                }else{
                    
                    $this->db->insert('inventory_stock',array('inventory_id'=>$product,'unit'=>$unit,'unit_price'=>$unit_price,'case'=>$case,'case_price'=>$case_price,'pallet'=>$pallet,'pallet_price'=>$pallet_price));
                }
            
            
        }
        function already($stock_id){
                $this->db->select()->from('stock')->where('stock_id',$stock_id);
		$sql=$this->db->get();
		if($sql->num_rows()>0){
			return FALSE;
		}else{
			return TRUE;
		}
        }
        function get_stages(){
            $this->db->select()->from('stage');
            $sql=  $this->db->get();
            return $sql->result();
        }
        function delete_stock($id){
            $this->db->where('guid',$id);
	    $this->db->delete('stock');
        }
        function stock_data_table($end,$start,$order,$like,$stage){
	        $this->db->select('stock.id as id,stock.date as date,stock.guid as guid,grains.name as gname,grains.sku as sku,supplier.name as sname,storage_location.name as lname,stock.stock_id as stock_id,stock.best_buy_date as best_buy_date')->from('stock');
                $this->db->join('grains', 'stock.grain_id=grains.guid','left');
                $this->db->join('storage_location', 'stock.location=storage_location.id','left');
                $this->db->join('supplier', 'stock.supplier=supplier.id','left');
                $this->db->limit($end,$start); 
               //$this->db->order_by($order);
                $this->db->like('stage',$stage);
                $this->db->like($like);     
                $query=$this->db->get();
                return $query->result_array();        
	}
        function stock_level_data_table($end,$start,$order,$like,$product,$stage,$location){
	        $this->db->select('stock.*,')->from('stock');
                $this->db->join('grains', 'stock.grain_id=grains.guid','left');
                $this->db->join('storage_location', 'stock.location=storage_location.id','left');
                $this->db->join('supplier', 'stock.supplier=supplier.id','left');
                $this->db->limit($end,$start); 
               //$this->db->order_by($order);
                $this->db->like('stage',$stage);
                $this->db->like($like);     
                $query=$this->db->get();
                return $query->result_array();        
	}
         function count_stock($stage){
		$this->db->select()->from('stock')->where('stage',$stage);
		$sql=$this->db->get();
		$count=0;
		foreach($sql->result() as $row){
		++$count;
		}
            return $count;
    }
    function receiving_notes($stock_guid,$delivery_date,$received_by,$received_date,$accounts,$invoice_no,$invoice_status,$delivery_status){
        $this->db->select()->from('receiving_notes')->where('stock_id',$stock_guid);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            $this->db->where('stock_id',$stock_guid);
            $this->db->update('receiving_notes',array( 'accounts'=>$accounts,'invoice_stauts'=>$invoice_status,'invoice_no'=>$invoice_no, 'receiving_date'=>$received_date, 'received_by'=>$received_by, 'stock_id'=>$stock_guid,'delivery_date'=>$delivery_date,'delivery_status'=>$delivery_status));
        }else{ 

            $this->db->insert('receiving_notes',array( 'accounts'=>$accounts,'invoice_stauts'=>$invoice_status,'invoice_no'=>$invoice_no, 'receiving_date'=>$received_date, 'received_by'=>$received_by, 'stock_id'=>$stock_guid,'delivery_date'=>$delivery_date,'delivery_status'=>$delivery_status));
        }
    }
    function inventory_withdrawals($stock_guid,$issue_type,$date,$label,$pallet_serial_no){
        $this->db->select()->from('inventory_withdrawals')->where('stock_id',$stock_guid);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            $this->db->where('stock_id',$stock_guid);
            $this->db->update('inventory_withdrawals',array('stock_id'=>$stock_guid,'issue_type'=>$issue_type,'date'=>$date,'label'=>$label,'pallet_serial_no'=>$pallet_serial_no));
        }else{ 

            $this->db->insert('inventory_withdrawals',array('stock_id'=>$stock_guid,'issue_type'=>$issue_type,'date'=>$date,'label'=>$label,'pallet_serial_no'=>$pallet_serial_no));
        }
    }
    function inventory_transfers($stock_guid,$date,$destination,$authorized_by,$transport_vender,$reason_moved,$unit,$millage){
        $this->db->insert('inventory_transfers',array('stock_id'=>$stock_guid,'date'=>$date,'destination'=>$destination,'authorized_by'=>$authorized_by,'transport_vendor'=>$transport_vender,'unit'=>$unit,'reason'=>$reason_moved,'millage'=>$millage ));
//        $this->db->select()->from('stock')->where('guid',$stock_guid);
//        $sql=  $this->db->get();
//        $old;
//        $o_lid;
//        $old_used;
//        foreach ($sql->result() as $row){
//            $old=$row->stock;
//            $o_lid=$row->location;
//            $old_used=$row->used_sqr_ft;
//        }
//        $new_stock=$old-$unit;
     $this->db->where('guid',$stock_guid);
        $this->db->update('stock',array('location'=>$destination));
        
        
//        $this->db->select()->from('storage_location')->where('id',$o_lid);
//        $l_sql=  $this->db->get();
//        $old_avl;
//        foreach ($l_sql->result() as $row){
//            $old_avl=$row->avilable;
//        }
//        $old_avl=$old_avl+$old_used;
//        $this->db->where('id',$o_lid);
//        $this->db->update('storage_location',array('avilable'=>$old_avl));
//        
//        
//        $this->db->select()->from('storage_location')->where('id',$destination);
//        $n_sql=  $this->db->get();
//        $new_avl;
//        foreach ($n_sql->result() as $row){
//            $new_avl=$row->avilable;
//        }
//        $new_avl=$new_avl-$old_used;
//        $this->db->where('id',$o_lid);
//        $this->db->update('storage_location',array('avilable'=>$new_avl));
        
            }
    function inventory_location($stock_guid,$transport,$temperature,$used){
        
        $this->db->select()->from('stock')->where('guid',$stock_guid);
        $sql=  $this->db->get();
        $old;
        $lid;
        foreach ($sql->result() as $row){
            $old=$row->used_sqr_ft;
            $lid=$row->location;
        }
        
        
        $this->db->where('guid',$stock_guid);
        $this->db->update('stock',array('used_sqr_ft'=>$used,'transport'=>$transport,'temp'=>$temperature ));
        
        
        $this->db->select()->from('storage_location')->where('id',$lid);
        $lsql=  $this->db->get();
        
        $current;
        foreach ($lsql->result() as $row){
           $current=$row->avilable;
        }
        
       $new_stock=$current-$used;
       $new_stock=$new_stock+$old;
        $this->db->where('id',$lid);
        $this->db->update('storage_location',array('avilable'=>$new_stock));
            }
    function get_location_for_auto_complete($name){
            $this->db->select()->from('storage_location');
            $this->db->like('name',$name);
            $sql=$this->db->get();
            $data=array();
            foreach($sql->result() as $row){
            $data[]=$row->name;
            }
            return $data;
	}
    function get_suppliers_for_auto_complete($name){
            $this->db->select()->from('supplier');
            $this->db->like('name',$name);
            $sql=$this->db->get();
            $data=array();
            foreach($sql->result() as $row){
            $data[]=$row->name;
            }
            return $data;
	}
   function get_storage_location_id($name){
            $this->db->select()->from('storage_location')->where('name',$name);
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
    function get_supplier_details($name){
        $this->db->select()->from('supplier')->or_like('name',$name);
         $sql=$this->db->get();
        return $sql->result();
    }
    function get_customer_details($name){
        $this->db->select()->from('customer')->or_like('name',$name);
         $sql=$this->db->get();
        return $sql->result();
    }
    function get_sales_order_details($name){
        $this->db->select()->from('sales_order')->or_like('invoice',$name)->where('sales_status',0);
         $sql=$this->db->get();
        return $sql->result();
    }
    function get_grains_details($name){
        $this->db->select()->from('grains')->or_like('name',$name);
         $sql=$this->db->get();
        return $sql->result();
    }
    function get_location_details($name){
        $this->db->select()->from('storage_location')->or_like('name',$name);
         $sql=$this->db->get();
        return $sql->result();
    }
    function inventory_stage($name){
        $this->db->select()->from('stage')->or_like('name',$name);
         $sql=$this->db->get();
        return $sql->result();
    }
     function generate_number(){
        $this->db->select()->from('master')->where('name','inventory');
        $sql=  $this->db->get();
        foreach ($sql->result() as $row)
        {
            return $row->value;
        }
}}

         ?>