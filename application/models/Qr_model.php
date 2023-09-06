<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_model extends CI_Model 
{
    function save_text($data){
        $this->db->insert('qr',$data);
        return $this->db->insert_id();
    } 


    public function qr_list()
    {
        $this->db->select('*');
        $this->db->from('qr');
        $this->db->order_by('id','DESC');
        $query=$this->db->get();
        return $query->result_array();
    }
    
    function get_qr_by_id($id){
        $this->db->select('*');
        $this->db->from('qr');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function delete_qr($id)    {
        $this->db->where('id',$id);
        $this->db->delete('qr');
    }
}