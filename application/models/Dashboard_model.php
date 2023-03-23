<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model  
{
    public function get_active_users_count() {       
        $query = $this->db->get_where('tbl_user', array('status'=>'Active'));
        return  $query->num_rows();
    } 

    public function get_in_active_users_count() {       
        $query = $this->db->get_where('tbl_user', array('status'=>'Inactive'));
        return  $query->num_rows();
    } 

    public function get_count_kennels() {       
        return $this->db->count_all("tbl_dogs");
    } 

    public function get_count_enquiry() {       
        return $this->db->count_all("contact");
    }

    public function get_count_subscriber() {       
        return $this->db->count_all("subscriber");
    }

    public function get_count_kennel_types() {       
        return $this->db->count_all("kennel_types");
    }
}