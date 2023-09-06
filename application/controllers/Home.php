<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    function __construct()
	{	
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('home_model');
        $this->load->model('model_slider');
        $this->load->model('model_gallery');

    }

    public function index(){ 
        $data['active']  = 'home';
        $data['title']   = 'Home';
        $data['sliderList'] = $this->model_slider->slider_list(); 
        $data['dogDetailsSliderData'] = $this->home_model->get_all_dogs_with_owner_details();  
        $this->load->view('web/home',$data);
    } 

    public function contact_us(){
        $data['active']  = 'contact';
        $data['title']   = 'Contact Us';       
        $this->load->view('web/contact',$data);
    }  

    public function about_us(){
        $data['active']  = 'about';
        $data['title']   = 'About Us';              
        $this->load->view('web/about',$data);
    } 

    public function gallery(){
        $data['active']  = 'gallery';
        $data['title']   = 'Gallery';
        $data['galleryList'] = $this->model_gallery->gallery_list_by_category();
               
        $this->load->view('web/gallery',$data);
    }   

    

    public function forget_password(){
        $data['active']  = 'forget';
        $data['title']   = 'Forget Password';       
        $this->load->view('web/user-forget-password',$data);
    }

    public function save_contact(){
        $name =  $this->security->xss_clean($this->input->post('name'));
        $email =  $this->security->xss_clean($this->input->post('email'));        
        $subject =  $this->security->xss_clean($this->input->post('subject'));
        $message =  $this->security->xss_clean($this->input->post('message'));
        $data = array(
         'fullname'=> $name,
         'email'=> $email,
         'subject'=> $subject,         
         'message'=> ($message)?$message:'',
         'created_date'=> date('Y-m-d'),
        );
       
        $result = $this->home_model->save_contact_details($data);
        if($result){
            $array = array(
                'status'=>true,
                'msg'=>"Your Enquiry Submited Successfully,Thank You.Our team give feedback soon!"
            );
            echo json_encode($array);
         
        }else{
         $array = array(
             'status'=>false,
             'msg'=>"Please somthing went wrong,Please try again!"
         );
         echo json_encode($array);
        }
    }

    public function kennel_details($id)
    {  
        $data['active']  = 'Dog Details';
        $data['title']   = 'Dog Details'; 
        $data['dogDetails'] = $this->home_model->get_dog_details_by_web_id($id);  
        $data['imgDogslider'] = $this->home_model->get_all_dogs_with_owner_details();     
        $this->load->view('web/kennel-details',$data);
    }

    public function save_subscriber(){
       
        $email =  $this->security->xss_clean($this->input->post('email'));        
        
        $data = array(      
         'subscriber_email'=> $email,        
         'subcriber_date'=> date('Y-m-d'),
        );
       
        $result = $this->home_model->save_subscription_user($data);
        if($result){
            $array = array(
                'status'=>true,
                'msg'=>"Your Enquiry Submited Successfully,Thank You.Our team give feedback soon!"
            );
            echo json_encode($array);
         
        }else{
         $array = array(
             'status'=>false,
             'msg'=>"Please somthing went wrong,Please try again!"
         );
         echo json_encode($array);
        }
    }

    
}