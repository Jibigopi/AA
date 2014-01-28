<?php
class Menus extends CI_model{
      function __construct() {
        parent::__construct();
         }
    function data_table($end,$start,$order,$like){
         $this->db->select()->from('menus');  
         $this->db->limit($end,$start); 
         $this->db->order_by($order);
         $this->db->or_like($like);     
         $query=$this->db->get();
         return $query->result_array();
    }
    function count(){
        return $this->db->count_all('menus');;
    }
    function check($menus){
        $this->db->select()->from('menus')->where('name',$menus);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return FALSE;
        }  else {
            return TRUE;
        }    
    }
    function add($link,$name,$primary,$order,$url,$page){
        $this->db->select()->from('menus')->where('id',$primary);
            $sql=  $this->db->get();
            $parent;
            $child;
            foreach ($sql->result() as $row){
                $parent=$row->name;
                $child=$row->child_no;
            }
        if($link==1){
            $this->db->select()->from('pages')->where('id',$page);
            $sql=  $this->db->get();
            $page_name;
            foreach ($sql->result() as $row){
                $page_name=$row->title;
            }
            
              $this->db->insert('menus',array('link'=>1,'parent_name'=>$parent,'page_name'=>$page_name,'name'=>$name,'order'=>$order,'parent'=>$primary,'page'=>$page)); 
        }  else {
              $this->db->insert('menus',array('link'=>0,'parent_name'=>$parent,'name'=>$name,'order'=>$order,'parent'=>$primary,'url'=>$url));
        }
        
        $this->db->where('id',$primary);
        $this->db->update('menus',array('child_no'=>$child+1));
    }
    function edit_menu($id){
        $this->db->select()->from('menus');
		$this->db->where('id',$id);
		$data=array();
		 $sql=$this->db->get();
		 foreach($sql->result_array() as $row){
			$data[]=$row;
			}
		 return $data;
    }
    function check_update($menus,$menus_id){
        $this->db->select()->from('menus')->where('id <>',$menus_id);
        $this->db->where('name',$menus);
        $sql=  $this->db->get();
            if($sql->num_rows()>0){
                return FALSE;
            }  else {
                return TRUE;
            }   
    }
    function update($id,$link,$name,$primary,$order,$url,$page){
         $this->db->select()->from('menus')->where('id',$id);
        $sql1=  $this->db->get();
        $child_no;
        $parent;
        foreach ($sql1->result() as $row){
            $parent=$row->parent;
        }
        
        $this->db->select()->from('menus')->where('id',$parent);
        $sql11=  $this->db->get();
        $child_no;
        foreach ($sql11->result() as $row){
            $child_no=$row->child_no;
        }
        
        $this->db->where('id',$parent);
        $this->db->update('menus',array('child_no'=>$child_no-1));
        
        
        
        $this->db->select()->from('menus')->where('id',$primary);
            $sql=  $this->db->get();
            $parent;
            $new_child_no;
            foreach ($sql->result() as $row){
                $parent=$row->name;
                $new_child_no=$row->child_no;
            }
        if($link==1){
            $this->db->select()->from('pages')->where('id',$page);
            $sql=  $this->db->get();
            $page_name;
            foreach ($sql->result() as $row){
                $page_name=$row->title;
            }
            $this->db->where('id',$id);
              $this->db->update('menus',array('link'=>1,'parent_name'=>$parent,'page_name'=>$page_name,'name'=>$name,'order'=>$order,'parent'=>$primary,'url'=>'','page'=>$page)); 
        }  else {
             $this->db->where('id',$id);
              $this->db->update('menus',array('link'=>0,'parent_name'=>$parent,'name'=>$name,'order'=>$order,'parent'=>$primary,'url'=>$url,'page'=>'','page_name'=>""));
        }
        
        
          $this->db->where('id',$primary);
        $this->db->update('menus',array('child_no'=>$new_child_no+1));
    }
    function delete($id){
        $this->db->select()->from('menus')->where('id',$id);
        $sql=  $this->db->get();
        $child_no;
        $parent;
        foreach ($sql->result() as $row){
            $parent=$row->parent;
        }
        
        $this->db->select()->from('menus')->where('id',$parent);
        $sql1=  $this->db->get();
        $child_no;
        foreach ($sql1->result() as $row){
            $child_no=$row->child_no;
        }
        
        $this->db->where('id',$parent);
        $this->db->update('menus',array('child_no'=>$child_no-1));
        
        $this->db->where('id',$id)->where('primary <>',1);
     $this->db->delete('menus');
     $this->db->select()->from('menus')->where('id',$id);
     $sql=  $this->db->get();
     if($sql->num_rows()>0){
         return FALSE;
     }else{
         return TRUE;
     }
                
    }
    function menus_type($name){
        $this->db->select()->from('menus_type');
            $this->db->like('type',$name);
            $sql=$this->db->get();
            $data=array();
            foreach($sql->result() as $row){
            $data[]=$row->type;
            }
            return $data;
    }
    function get_primary_menus(){
        $this->db->select()->from('menus')->where('primary',1);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_pages(){
        $this->db->select()->from('pages');
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_parent_menus(){
        $this->db->select()->from('menus')->order_by('order')->where('primary',1);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_child_menus(){
        $this->db->select()->from('menus')->order_by('order')->where('primary',0);
        $sql=  $this->db->get();
        return $sql->result();
    }
}
?>
