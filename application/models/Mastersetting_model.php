<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastersetting_model extends CI_Model 
{
    function kennel_type_list() {
        $this->db->select('*');
        $this->db->from('kennel_types');
        $this->db->order_by('kennel_type',"asc");  
        $query = $this->db->get();
        return $query->result_array();
    }

    function save_or_update_kennel_type($data)  {
        if(isset($data['id']) && !empty($data['id'])){           
            $this->db->where('id',$data['id']);
            $this->db->update('kennel_types',$data);
            return $this->db->affected_rows();
        }else{            
            $this->db->insert('kennel_types',$data);
            return $this->db->insert_id();
        }        
    }

    function get_kennel_type_by_id($id){
        $this->db->select('*');
        $this->db->from('kennel_types');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function delete_kennel_type($id)    {
      
        $this->db->where('id',$id);
        $this->db->delete('kennel_types');
    }

    public function get_all_dogs_with_owner()
    {
        $this->db->select('a.*,kennel_types.kennel_type,tbl_user.fullname');
		$this->db->from('tbl_dogs a');		
        $this->db->join('kennel_types','kennel_types.id = a.kennel_type_id','INNER');
        $this->db->join('tbl_user','tbl_user.user_id = a.user_id','INNER');
        $this->db->order_by('a.dog_id',"DESC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    function delete_dog_byadmin($id) {
            
        $this->db->where('dog_id',$id);
        $this->db->delete('tbl_dogs');
    }

    public function get_dogs_details_by_dog_id($id)
    {
        $this->db->select('a.*,kennel_types.kennel_type,tbl_user.fullname,tbl_user.mobile,tbl_user.email,tbl_user.address');
		$this->db->from('tbl_dogs a');		
        $this->db->join('kennel_types','kennel_types.id = a.kennel_type_id','INNER');
        $this->db->join('tbl_user','tbl_user.user_id = a.user_id','INNER');
        $this->db->where('dog_id', $id);
        $query = $this->db->get();       
        return $query->first_row('array');
    }

    public function get_all_vacination_details_withdogs()
    {
        $this->db->select('vaccination_tbl.*,tbl_dogs.dog_name,tbl_user.fullname,vaccination_title.vaccination_name');
		$this->db->from('vaccination_tbl');		
        $this->db->join('tbl_dogs','tbl_dogs.dog_id  = vaccination_tbl.dog_id','INNER');
        $this->db->join('tbl_user','tbl_user.user_id  = vaccination_tbl.user_id','INNER');
        $this->db->join('vaccination_title','vaccination_title.id  = vaccination_tbl.vaccinated_id','INNER');       
        $this->db->order_by('vaccination_tbl.id',"DESC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    public function get_all_web_subscriber()
    {
        $this->db->select('*');
		$this->db->from('subscriber');           
        $this->db->order_by('id',"DESC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    function expense_category_list() {
        $this->db->select('*');
        $this->db->from('expense_category');
        $this->db->order_by('title','ASC');  
        $query = $this->db->get();
        return $query->result_array();
    }

    function save_or_update_expence_category($data)  {
        if(isset($data['id']) && !empty($data['id'])){           
            $this->db->where('id',$data['id']);
            $this->db->update('expense_category',$data);
            return $this->db->affected_rows();
        }else{            
            $this->db->insert('expense_category',$data);
            return $this->db->insert_id();
        }        
    }

    function get_expence_catgory_by_id($id){
        $this->db->select('*');
        $this->db->from('expense_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function delete_expence_cat($id)    {
       $this->db->where('id',$id);
        $this->db->delete('expense_category');
    }
}