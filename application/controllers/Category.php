<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');      
    }

	public function category_list()
	{
		$data['active']  = 'catgoryList';
        $data['title']   = 'Category-list';
        $data['cagoryInfo']   = $this->category_model->catgory_list();
      
		$this->load->view('admin/category-list',$data);
	}
    
    public function add_category($id=NULL){
        //print_r($this->session->userdata('user_id'));die;
        $data['active']  = 'catadd';
        $data['title']   = 'Category-add';
        if(isset($id) && !empty($id)){
            $check = $this->category_model->check_category($id);
           
            if(!$check) {
                redirect(base_url().'category/add_category');
                exit;
            }else{
                $data['category'] = $this->category_model->getCategory($id);
            }
        }
        if(isset($_POST['catgory-form'])){

            $catgory_id = $this->input->post('catgory_id', true);
            if(empty($catgory_id)){
                $createDate =  date('Y-m-d');
            }
            $form_data = array(
                'catgory_id' => (isset($catgory_id)&& !empty($catgory_id))? $catgory_id:'',
                'category_name' => $this->input->post('category', true),
                'active' => $this->input->post('cat_status', true),
                'created_date'=> (isset($createDate)&& !empty($createDate))? $createDate:'',          
            );           
            $this->category_model->add_category($form_data);

            $success = 'Category is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'category/category_list');
        }else{
            $this->load->view('admin/category-add',$data);
        }
    }
    
    public function delete_category($id){
        $this->category_model->delete_category($id);
        $success = 'Category is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'category/category_list');
    }
}
