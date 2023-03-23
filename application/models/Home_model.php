<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model 
{   

    public function save_contact_details($data) {
        $this->db->insert('contact',$data);
        return $this->db->insert_id();
    }

    public function get_all_dogs_with_owner_details()
    {
        $this->db->select('a.*,kennel_types.kennel_type,tbl_user.fullname,');
		$this->db->from('tbl_dogs a');		
        $this->db->join('kennel_types','kennel_types.id = a.kennel_type_id','INNER');
        $this->db->join('tbl_user','tbl_user.user_id = a.user_id','INNER');
        $this->db->where('tbl_user.status','Active');
        $this->db->order_by('a.dog_id',"DESC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    public function get_dog_details_by_web_id($id)
    {
        $this->db->select('a.*,kennel_types.kennel_type,tbl_user.fullname,');
		$this->db->from('tbl_dogs a');		
        $this->db->join('kennel_types','kennel_types.id = a.kennel_type_id','INNER');
        $this->db->join('tbl_user','tbl_user.user_id = a.user_id','INNER');
        $this->db->where('a.dog_id',$id);        ;
        $query = $this->db->get();       
		return $query->first_row('array');
    } 

    public function save_subscription_user($data) {
        $this->db->insert('subscriber',$data);
        return $this->db->insert_id();
    }



}