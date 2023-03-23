<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();      
        $this->load->model('model_slider');
    }

    public function index(){
        $data['active']  = 'slider';
        $data['title']   = 'Slider List'; 
        $data['sliderList'] = $this->model_slider->slider_list();
        $this->load->view('admin/slider-list',$data);
    }

    public function add_slider(){
        $data['active']  = 'add_slider';
        $data['title']   = 'Add Slider';
        if(isset($_POST['slider-form'])){
            $boldText = $this->input->post('banner_bold_text');
            $smallText = $this->input->post('banner_small_text');
            $old_img = $this->input->post('old_img');


            $form_data = array(
                'bold_heading' => ($boldText)?$boldText:'',
                'small_text_msg' => ($smallText)?$smallText:'',
                'created_date' => date('Y-m-d'),
            );
            $insert_id = $this->model_slider->add_or_update_product($form_data);
           
            $path = $_FILES['banner_img']['name'];
		    $path_tmp = $_FILES['banner_img']['tmp_name'];
            if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
            
            $final_name = 'banner-'.$insert_id.'.'.$ext;
            move_uploaded_file($path_tmp, 'uploads/banner/'.$final_name);

            $saveImg=array(
                'banner'=> $final_name,
                'slider_id'=>$insert_id,               
            );
            $this->model_slider->add_or_update_product($saveImg);
           }
           
            
            $success = 'Banner is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'slider');
        }else{
            $this->load->view('admin/slider-add',$data);
        }		
    }

    public function edit_slider($id){

        $data['active']  = 'editSlider';
        $data['title']   = 'Edit Slider';
        $data['sliderRow'] = $this->model_slider->get_slider_row_by_id($id);
        
        if(isset($_POST['edit-slider-form'])){

            $old_img = $this->input->post('old_img');
            $path = $_FILES['banner_img']['name'];
            $path_tmp = $_FILES['banner_img']['tmp_name'];
            if(!empty($path) && isset($path)){
               

                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                unlink('uploads/banner/'.$data['sliderRow']['banner']);
                $final_name = 'product-'.$id.'.'.$ext;
                move_uploaded_file($path_tmp, 'uploads/banner/'.$final_name);

               
            }
            //echo $final_name;die;
            $boldText = $this->input->post('banner_bold_text');
            $smallText = $this->input->post('banner_small_text');

            $updateData=array(
                'banner'        => ($final_name)?$final_name:$old_img,
                'slider_id'     => $id, 
                'bold_heading' => ($boldText)?$boldText:'',
                'small_text_msg' => ($smallText)?$smallText:'',
                'updated_date'=>date('Y-m-d'),
            );
           
            $this->model_slider->add_or_update_product($updateData);
            $success = 'Banner is updated successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'slider');
        }else{
            $this->load->view('admin/slider-edit',$data);
        }
    }

    public function delete_slider($id){
        $data['sliderRow'] = $this->model_slider->get_slider_row_by_id($id);
        if($data['sliderRow']['banner']){
            unlink('uploads/banner/'.$data['sliderRow']['banner']);
        }
      
        $this->model_slider->delete_slider($id);
        $success = 'Product is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'slider');
    }
}