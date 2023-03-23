<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mastersetting extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();      
        $this->load->model('mastersetting_model'); 
    }

    public function kennel_type_list(){
        $data['active']  = 'kennelType';
        $data['title']   = 'Kennel Type List'; 
        $data['kennelType'] = $this->mastersetting_model->kennel_type_list();        
        $this->load->view('admin/kennel-type-list',$data);
    }

    public function add_kennel_type($id=null)
    {
        $data['active']  = 'addKennelType';
        $data['title']   = 'Add New Kennel Type';
        if(isset($id) && !empty($id)){
          $data['KennelType'] = $this->mastersetting_model->get_kennel_type_by_id($id);            
        }
        if(isset($_POST['kennel-type-form'])){

            $kennel_type_id = $this->input->post('kennel_type_id', true);            
            $form_data = array(
                'id' => (isset($kennel_type_id)&& !empty($kennel_type_id))? $kennel_type_id:'',
                'kennel_type' => $this->input->post('kennel_type', true),                         
            );           
            $this->mastersetting_model->save_or_update_kennel_type($form_data);

            $success = 'Kennel Type is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'mastersetting/kennel_type_list');
        }else{
            $this->load->view('admin/kennel-type-add',$data);
        }
    }

    public function delete_kennel_type($id){
        $this->mastersetting_model->delete_kennel_type($id);
        $success = 'Kennel is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'mastersetting/kennel_type_list');
    }

    
    public function fetch_kennels_list(){
        
        $data['active']  = 'fetchDogs';
        $data['title']   = 'Kennels  List'; 
        $data['dogsList'] = $this->mastersetting_model->get_all_dogs_with_owner();  
             
        $this->load->view('admin/Kennels-feched-list',$data);
    } 

    public function delete_dog_byadmin($id){
        $this->mastersetting_model->delete_dog_byadmin($id);
        $success = 'Kennel is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'mastersetting/fetch_kennels_list');
    }

    public function kennel_details($DogId){
        $data['active']  = 'KennelsDetails';
        $data['title']   = 'Kennel Details'; 
        $data['dogDetails'] = $this->mastersetting_model->get_dogs_details_by_dog_id($DogId);        
        $this->load->view('admin/kennel-details-view',$data);
    }

    public function fetch_all_vacition()
    {
        $data['active']  = 'vaccination';
        $data['title']   = 'Vaccination List'; 
        $data['vaccinationList'] = $this->mastersetting_model->get_all_vacination_details_withdogs();        
        $this->load->view('admin/vaccination-list',$data);
    }

    public function get_all_subscriber()
    {
        $data['active']  = 'subscriber';
        $data['title']   = 'Subscriber List'; 
        $data['subscriberList'] = $this->mastersetting_model->get_all_web_subscriber();        
        $this->load->view('admin/subscriber-list',$data);
    }

    public function expence_category(){
        $data['active']  = 'expenceCategoryList';
        $data['title']   = 'Expence Category List'; 
        $data['ExpenceCatList'] = $this->mastersetting_model->expense_category_list();        
        $this->load->view('admin/expence-cat-list',$data);
    } 

    public function add_expence_category($id=null)
    {
        $data['active']  = 'addExpenceCategory';
        $data['title']   = 'Add New Expence Category';
        if(isset($id) && !empty($id)){
          $data['ExpenceCat'] = $this->mastersetting_model->get_expence_catgory_by_id($id);            
        }
        if(isset($_POST['expence-category-form'])){

            $expence_cat_id = $this->input->post('expence_cat_id', true);            
            $form_data = array(
                'id' => (isset($expence_cat_id)&& !empty($expence_cat_id))? $expence_cat_id:'',
                'title' => $this->input->post('expence_category_name', true),                                       
            );   
                   
            $this->mastersetting_model->save_or_update_expence_category($form_data);

            $success = 'Expence category is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'mastersetting/expence_category');
        }else{
            $data['ExpenceCatList'] = $this->mastersetting_model->expense_category_list();
            $this->load->view('admin/expence-cat-list',$data);
        }
    }

    public function delete_expence_cat($id){
        $this->mastersetting_model->delete_expence_cat($id);
        $success = 'Expence category is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'mastersetting/expence_category');
    }



    
}