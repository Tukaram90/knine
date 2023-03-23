<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
    public function get_all_users()
    {
        $this->db->select("*");
        $this->db->from('tbl_user');
        $this->db->order_by('user_id','desc');
        $qry = $this->db->get();
        return $qry->result_array();
    }

    function delete_user($id)
    {
        $this->db->where('user_id',$id);
        $this->db->delete('tbl_user');
    }

    public function change_status($user_id,$status)
    {   
        $data['status'] = $status;
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user',$data);
        return $this->db->affected_rows();
    } 

    public function get_all_enquiry()
    {
        $this->db->select("*");
        $this->db->from('contact');
        $this->db->order_by('id','desc');
        $qry = $this->db->get();
        return $qry->result_array();
    }
}