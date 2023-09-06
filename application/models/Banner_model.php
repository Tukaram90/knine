<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model 
{
    function add_or_update_banner($data)  {
        if(isset($data['id']) && !empty($data['id'])){
           
            $this->db->where('id',$data['id']);
            $this->db->update('addvertisementbanner',$data);
            return $this->db->affected_rows();
        }else{ 
           
            $this->db->insert('addvertisementbanner',$data);
            return $this->db->insert_id();
        }        
    }

    function branding_list() {        
        $this->db->select('a.*,tbl_user.firstname');
		$this->db->from('addvertisementbanner a');		
        $this->db->join('tbl_user','tbl_user.user_id = a.created_by','LEFT');       
        $this->db->order_by('a.id',"DESC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    function delete_banner($id)    {
        $this->db->where('id',$id);
        $this->db->delete('addvertisementbanner');
    }

    function get_banner_row_by_id($id){
        $this->db->select('*');
        $this->db->from('addvertisementbanner');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }
    
    public function image_entry($data){
		$this->db->insert('dog_gallery',$data);
        return $this->db->insert_id();
	}

    public function get_gallery_photo_by_dog_id_user_id($dog_id,$user_id){
        $this->db->select('id,image_url,img_name');
		$this->db->from('dog_gallery');
		$this->db->where('user_id',$user_id);
        $this->db->where('dog_id',$dog_id);
		$query = $this->db->get();
		return $query->result_array();
    }
}