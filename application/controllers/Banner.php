<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();       
        $this->load->model('model_slider');
        $this->load->model('banner_model');
    }

    public function index(){
        $data['active']  = 'banner';
        $data['title']   = 'Banner List'; 
        $data['bannerList'] = $this->banner_model->branding_list();
        $this->load->view('admin/banner-list',$data);
    }

    public function add_banner(){
        $data['active']  = 'add-banner';
        $data['title']   = 'Add Banner';
        if(isset($_POST['banner-form'])){       
            $form_data = array(
                'title'=> $this->input->post('title'),
                'created_by' => $this->session->userdata('user_id'),                
                'created_at' => date('Y-m-d'),
            );           
            $insert_id = $this->banner_model->add_or_update_banner($form_data);
           
            $path = $_FILES['banner_img']['name'];
		    $path_tmp = $_FILES['banner_img']['tmp_name'];
            if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );            
                $final_name = 'banner-'.$insert_id.'.'.$ext;
                move_uploaded_file($path_tmp, 'uploads/addvertisementbanner/'.$final_name);
                $saveImg=array(
                    'banner'=> $final_name,
                    'id'=>$insert_id,               
                );
                $this->banner_model->add_or_update_banner($saveImg);
           }           
            $success = 'Advertisement Banner is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'banner');
        }else{
            $this->load->view('admin/banner-add',$data);
        }		
    }

    public function edit_banner($id){

        $data['active']  = 'editbanner';
        $data['title']   = 'Edit banner';
        $data['bannerRow'] = $this->banner_model->get_banner_row_by_id($id);
        
        if(isset($_POST['edit-banner-form'])){

            $old_img = $this->input->post('old_img');
            $path = $_FILES['banner_img']['name'];
            $path_tmp = $_FILES['banner_img']['tmp_name'];
            if(!empty($path) && isset($path)){        

                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                unlink('uploads/addvertisementbanner/'.$data['bannerRow']['banner']);
                $final_name = 'banner-'.$id.'.'.$ext;
                move_uploaded_file($path_tmp, 'uploads/addvertisementbanner/'.$final_name);               
            }
            
            $updateData=array(
                'title'=> $this->input->post('title'),
                'banner' => ($final_name)?$final_name:$old_img,
                'id'     => $id,                
                'updated_at'=>date('Y-m-d'),
            );
           
            $this->banner_model->add_or_update_banner($updateData);
            $success = 'Advertisement Banner is updated successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'banner');
        }else{
            $this->load->view('admin/banner-edit',$data);
        }
    }

    public function delete_banner($id){
        $data['bannerRow'] = $this->banner_model->get_banner_row_by_id($id);
        unlink('uploads/addvertisementbanner/'.$data['bannerRow']['banner']);
        $this->banner_model->delete_banner($id);
        $success = 'Advertisement Banner is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'banner');
    }
}