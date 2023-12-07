<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {
    function __construct() 
	{
        parent::__construct();      
        $this->load->model('subscription_model');
    }
    
    public function index(){
        $data['active']  = 'subscription_plan';
        $data['title']   = 'Subscription plan List';
        $data['subplan'] = $this->subscription_model->get_all_subscription_plan();       
        $this->load->view('admin/subscription-list',$data);
    }

    public function add_subscriptio_plan(){
        $data['active']  = 'add_subscription';
        $data['title']   = 'Add subcription plan'; 
        if(isset($_POST['save-plan'])){
            $planForm_arr = array(
                'name' => $this->input->post("plan_name"), 
                'features' => $this->input->post("plan_features"), 
                'price' => $this->input->post("plan_price"), 
                'plan_validity' => $this->input->post("plan_validity"), 
                // 'plan_start_from' => date('Y-m-d') , 
                'created_date' => date('Y-m-d') 
                 
            );
            $res = $this->subscription_model->save_subscription_plan($planForm_arr);
           
            if($res){
               
                $success = 'Subsription plan saved successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'subscription');
            }else{
                $success = 'Something went wrong, please try once again!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'subscription/add_subscriptio_plan');
            }
           
        }        
        $this->load->view('admin/subscription_view',$data);
    }

    public function check_unique_subscription_plan(){
       
        $plan_name =  $_POST['plan_name'];       
        $response = $this->subscription_model->check_subscription_plan_exist($plan_name);
        if($response){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    public function delete_subscription_plan($id){       
        $this->subscription_model->delete_subscription_plan($id);
        $success = 'Plan deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'subscription');
    }

    public function edit_subscription_plan($id){       
        $data['active']  = 'edit-subscription';
        $data['title']   = 'Edit subscription plan';
        $data['subplan'] = $this->subscription_model->get_subscription_plan_by_id($id); 
        if(isset($_POST['update-plan'])){
            $planForm_arr = array(
                'name' => $this->input->post("plan_name"), 
                'features' => $this->input->post("plan_features"), 
                'price' => $this->input->post("plan_price"), 
                'plan_validity' => $this->input->post("plan_validity"),      
            );
            $res = $this->subscription_model->update_subscription_plan($planForm_arr,$id);           
            if($res){               
                $success = 'Subsription plan updated successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'subscription');
            }else{
                $success = 'Something went wrong, please try once again!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'subscription/edit_subscription_plan');
            }
           
        }           
        $this->load->view('admin/Subscription_edit_view',$data);        
    }

}