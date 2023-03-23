<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gallery extends CI_Model 
{
    function add_or_update_gallery($data)  {
        if(isset($data['gallery_id']) && !empty($data['gallery_id'])){
           
            $this->db->where('gallery_id',$data['gallery_id']);
            $this->db->update('tbl_gallery',$data);
            return $this->db->affected_rows();
        }else{ 
           
            $this->db->insert('tbl_gallery',$data);
            return $this->db->insert_id();
        }        
    }

    function gallery_list() {
        $this->db->select('g.*,c.category_name');
        $this->db->from('tbl_gallery g');  
        //$this->db->join("categories  categories.catgory_id = tbl_gallery.catgory_id","left"); 
        $this->db->join('categories c', 'c.catgory_id=g.catgory_id','inner');
        $this->db->order_by('gallery_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function delete_gallery($id)    {
      
       $sql = $this->db->get_where('tbl_gallery', array('gallery_id' => $id));
       $res = $sql->result_array();
       
       unlink('uploads/gallery/'.$res['0']['photo_name']);
        $this->db->where('gallery_id',$id);
        $this->db->delete('tbl_gallery');
    }

    function get_gallery_row_by_id($id){
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('gallery_id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    public function get_all_activeCategory(){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('active','1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gallery_list_by_category(){
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('active','1');
        $query = $this->db->get();
        $result =  $query->result_array();
        $finalResp = array();
        foreach($result as $res){
            $finalResp[] = array(
                'catgory_id'=>$res['catgory_id'],
                'category_name'=>$res['category_name'],
                'photos' => $this->getphotos($res['catgory_id']),
            );

            //$finalResp[] =  $row;
        }
       return  $finalResp;
    }

    public function getphotos($catgory_id){
        $this->db->select('*');
        $this->db->from('tbl_gallery');  
        $this->db->where('catgory_id',$catgory_id);
        $this->db->order_by('gallery_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
}