<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_slider extends CI_Model 
{
    function add_or_update_product($data)  {
        if(isset($data['slider_id']) && !empty($data['slider_id'])){
           
            $this->db->where('slider_id',$data['slider_id']);
            $this->db->update('slider',$data);
            return $this->db->affected_rows();
        }else{ 
           
            $this->db->insert('slider',$data);
            return $this->db->insert_id();
        }        
    }

    function slider_list() {
        $this->db->select('*');
        $this->db->from('slider');       
        $this->db->order_by('slider_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function delete_slider($id)    {
        $this->db->where('slider_id',$id);
        $this->db->delete('slider');
    }

    function get_slider_row_by_id($id){
        $this->db->select('*');
        $this->db->from('slider');
        $this->db->where('slider_id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }
}