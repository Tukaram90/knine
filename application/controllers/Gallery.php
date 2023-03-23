<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();      
        $this->load->model('model_gallery');
    }

    public function gallery_list(){
        $data['active']  = 'gallerylist';
        $data['title']   = 'Gallery List'; 
        $data['galleryData'] = $this->model_gallery->gallery_list();
        $this->load->view('admin/gallery-list',$data);
    }

    public function add_gallery(){
        $data['active']  = 'add_gallery';
        $data['title']   = 'Add Gallery';
        if(isset($_POST['gallery-form'])){
            $form_data = array(
                'created_date' => date('Y-m-d'),
                'catgory_id'   => $this->input->post('category'),
            );
            $insert_id = $this->model_gallery->add_or_update_gallery($form_data);
           
            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
            if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
            
            $final_name = 'photo-'.$insert_id.'.'.$ext;
            move_uploaded_file($path_tmp, 'uploads/gallery/'.$final_name);
            $saveImg=array(
                'photo_name'=> $final_name,
                'gallery_id'=>$insert_id
            );
            $this->model_gallery->add_or_update_gallery($saveImg);
            }
           
            
            $success = 'Photo is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'gallery/gallery_list');
        }else{
            $data['categoryList'] =  $this->model_gallery->get_all_activeCategory();
            $this->load->view('admin/gallery-add',$data);
        }		
    }

    public function edit_gallery($id){

        $data['active']  = 'edit_gallery';
        $data['title']   = 'Edit Gallery';
        $data['galleryRow'] = $this->model_gallery->get_gallery_row_by_id($id);
        
        if(isset($_POST['edit-galery-form'])){
            
            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

            $ext = pathinfo( $path, PATHINFO_EXTENSION );
            $file_name = basename( $path, '.' . $ext );
            unlink('uploads/gallery/'.$data['galleryRow']['photo_name']);
            $final_name = 'product-'.$id.'.'.$ext;
            move_uploaded_file($path_tmp, 'uploads/gallery/'.$final_name);
            $updateData=array(
                'photo_name'        => $final_name,
                'gallery_id'     => $id, 
                'updated_date'  => date('Y-m-d'),
                'catgory_id'   => $this->input->post('category'),
            );
            $this->model_gallery->add_or_update_gallery($updateData);
            $success = 'Photo is updated successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'gallery/gallery_list');
        }else{
            $data['categoryList'] =  $this->model_gallery->get_all_activeCategory();
            $this->load->view('admin/gallery-edit',$data);
        }
    }

    public function delete_gallery($id){
        $data['galleryRow'] = $this->model_gallery->get_gallery_row_by_id($id);       
        if($data['galleryRow']['photo_name']){
            unlink('uploads/gallery/'.$data['galleryRow']['photo_name']);
        }
        $this->model_gallery->delete_gallery($id);
        $success = 'Photo is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'gallery/gallery_list');
    }
}