<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() 
	{
        parent::__construct();      
        $this->load->model('admin_model');
    } 

    public function user_list()
    {
        $data['active']  = 'userlist';
        $data['title']   = 'User List';
        $data['usersData'] = $this->admin_model->get_all_users();       
        $this->load->view('admin/user-list',$data);
    }

    public function delete_user($id){
        $this->admin_model->delete_user($id);
        $success = 'User is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'user-list');
    }

    public function change_status($user_id,$status)
    {      
        $this->admin_model->change_status($user_id,$status);
        $success = 'User status updated successfully!';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'user-list');
    } 

    public function enquiry_list()
    {
        $data['active']  = 'enquiry';
        $data['title']   = 'Enquiry List';
        $data['enquiry'] = $this->admin_model->get_all_enquiry();       
        $this->load->view('admin/enquiry-list',$data);
    }
}