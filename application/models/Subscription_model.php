<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_model extends CI_Model 
{
    function get_all_subscription_plan() {
        $this->db->select('*');
        $this->db->from('subscription_plan');       
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function save_subscription_plan($data){
        $this->db->insert('subscription_plan',$data);
        return $this->db->insert_id();
    }

    public function check_subscription_plan_exist($plan_name){
        $this->db->where('name',$plan_name);
        $query = $this->db->get('subscription_plan');
        if ($query->num_rows() > 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function delete_subscription_plan($id){ 
        $this->db->where('id',$id);
        $this->db->delete('subscription_plan');        
    }

    public function get_subscription_plan_by_id($id){
        $this->db->select('*');
        $this->db->from('subscription_plan');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    public function update_subscription_plan($data,$id) { 
        
        $this->db->where('id',$id);
        $query=  $this->db->update('subscription_plan',$data);       
        return $this->db->affected_rows();       
    }
}