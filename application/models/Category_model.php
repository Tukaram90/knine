<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model 
{
    function add_category($data)  {
        if($data['catgory_id'] && !empty($data['catgory_id'])){
            $this->db->where('catgory_id',$data['catgory_id']);
            $this->db->update('categories',$data);
            return $this->db->affected_rows();
        }else{
            $this->db->insert('categories',$data);
            return $this->db->insert_id();
        }        
    }

    function catgory_list() {
        $this->db->select('*');
        $this->db->from('categories');
        //$this->db->where('active','1');
        $this->db->order_by('catgory_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function check_category($id) {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('catgory_id ', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function getCategory($id){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('catgory_id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function delete_category($id)
    {
        $this->db->where('catgory_id',$id);
        $this->db->delete('categories');
    }
}