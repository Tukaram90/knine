<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() 
	{
        parent::__construct();      
		$this->load->model('dashboard_model');
    } 

	public function index(){	
		$data['active']  = 'dashboard';
        $data['title']   = 'Dashboard';
		$data['activeUser'] =   $this->dashboard_model->get_active_users_count();
		$data['inactiveUser'] =   $this->dashboard_model->get_in_active_users_count();
		$data['kennelsCount'] =   $this->dashboard_model->get_count_kennels(); 
		$data['enquiryCount'] =   $this->dashboard_model->get_count_enquiry();
		$data['subscriberCount'] =   $this->dashboard_model->get_count_subscriber();
		$data['kennelTypesCount'] =   $this->dashboard_model->get_count_kennel_types();
		$this->load->view('admin/dashboard',$data);
	}
	
	
}
