<?php

class page_model extends CI_Model {



  function __construct()
    {
        parent::__construct();
    }
    function gete()
    {
        $this->load->database();
        $query = $this->db->get('pages');
        return $query->result();
    }

    function add_record($data)
    {
        $this->db->insert('pages', $data);
        return;
    }

    function update_record($data)
    {
        $this->db->where('id',12);
        $this->db->update('pages', $data);
    return ;
    }
    function delete_row()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('pages');
    }


}