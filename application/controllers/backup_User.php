<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    function __construct()
	{
		
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('home_model');
        $this->load->model('user_model');


    }

    
    public function index(){ 
        $error = '';
		$success = '';
        $data['active']  = 'user';
        $data['title']   = 'User Authentication'; 
        if(isset($_POST['form_login'])) {
            $email = $this->security->xss_clean($this->input->post('email', true));
            $password = $this->security->xss_clean($this->input->post('password', true));
            $chk = $this->user_model->check_access($email,$password);
            if(!$chk) {
				$error = 'Email address or password is wrong!';				
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'user');
            } else {
            	$array = array(
					'u_user_id'  => $chk['user_id'],
					'ufullname' => $chk['fullname'],
					'uemail'    => $chk['email'],
					'umobile'   => $chk['mobile'],
					'urole'     => $chk['role'],
					'ustatus'   => $chk['status'],
                    'is_user_logged_in' =>'yes'					
                );
                $this->session->set_userdata($array);
                redirect(base_url().'home');
            }
        }else{      
            $this->load->view('web/user-login',$data);
        }
    }

    public function register_user(){ 
        $data['active']  = 'userregister';
        $data['title']   = 'User Register';       
        $this->load->view('web/register',$data);
    }

    public function save_user(){ 
        $error = '';
		$success = '';

        $data['active']  = 'userRegister';
        $data['title']   = 'User Register';
        if(isset($_POST['form_registration'])) {
            $valid = 1;

            $email = $this->security->xss_clean($this->input->post('email', true));
            $password = $this->security->xss_clean($this->input->post('password', true));
            $kernal_name = $this->security->xss_clean($this->input->post('kernal_name', true));
            $mobile = $this->security->xss_clean($this->input->post('mobile', true));
            $address = $this->security->xss_clean($this->input->post('address', true));
           
            if( empty($email) ) {
            	$valid = 0;
			    $error .= 'Email can not be empty'.'<br>';
            }
            
            if( empty($password) ) {
            	$valid = 0;
			    $error .= 'Password can not be empty'.'<br>';
            }
            
            if( empty($kernal_name) ) {
            	$valid = 0;
			    $error .= 'Kernal Name can not be empty'.'<br>';
            }

            
            if( empty($mobile) ) {
            	$valid = 0;
			    $error .= 'Mobile can not be empty'.'<br>';
            }
            
            if( empty($address) ) {
            	$valid = 0;
			    $error .= 'Address can not be empty'.'<br>';
            }
            
            $chk = $this->user_model->check_duplicate_email($email);
            if($chk) {
            	$valid = 0;
            	$error .= 'This email already exist'.'<br>';
            }
           
            if($valid==1){
                
                $form_data = array(
					'fullname' => $kernal_name,
					'email'    => $email,
					'mobile'   => $mobile,
					'password' => md5($password),
					'role'    =>'user',
					'status'   => 'Active',
                    'address'  => $address,
                    'created_at'=>date('Y-m-d'),
	            );
                
	            $this->user_model->registration($form_data);

                $success = 'Registration successfully, Please login now !';
        		$this->session->set_flashdata('success',$success);
            }else{
               
                $this->session->set_flashdata('error',$error);
            }
            
            redirect($this->agent->referrer());
            
        }else{       
            $this->load->view('web/user-register',$data);
        }
        
    }

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success','Logout successfully!');
        redirect(base_url().'user');
    }

    public function user_dashboard()
    {
        $data['active']  = 'userdashboard';
        $data['title']   = 'User Dashboard';
        $data['profile'] = $this->user_model->get_user_profile($this->session->userdata('u_user_id'));
       
        $this->load->view('web/user-dashboard',$data);
        
    }

    public function update_profile($user_id)
    {
        $error = '';
		$success = '';

        $email = $this->security->xss_clean($this->input->post('email', true));           
        $kernal_name = $this->security->xss_clean($this->input->post('kernal_name', true));
        $mobile = $this->security->xss_clean($this->input->post('mobile', true));
        $address = $this->security->xss_clean($this->input->post('address', true));
        $form_data = array(
            'fullname' => $kernal_name,
            'email'    => $email,
            'mobile'   => $mobile,           
            'address'  => $address,           
        );
       // echo "<pre>";print_r($form_data);die;
        $res = $this->user_model->update_profile($user_id,$form_data);
        if($res){
            $success = 'Profile Data Update successfully!';
            $this->session->set_flashdata('success',$success);
        }else{           
            $this->session->set_flashdata('error','Something went wrong, Please try again!');    
        }
        redirect(base_url().'user-dashboard');

    } 
    
    public function forgot_password(){ 
        $error = '';
		$success = '';
        $data['active']  = 'forgotPassword';
        $data['title']   = 'Forgot Password'; 
        if(isset($_POST['forgotPassForm'])) {
            $valid = 1;
            $email = $this->security->xss_clean($this->input->post('email', true));
            if( empty($email) ) {
            	$valid = 0;
			    $error .= 'Empty email id'.'<br>';
            } else {
            	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            		$valid = 0;
			    	$error .= " $email is not a valid email address".'<br>';
            	} else {
            		$tot = $this->user_model->forget_password_check_email($email);
	                if(!$tot) {
	                    $valid = 0;
	                    $error .= "$email is not exist, Please enter correct email".'<br>';
	                }
            	}
            }

            if($valid == 1) {
                $forgotToken = md5(rand());

                // Update Database
                $form_data = array(
                    'reset_token' => $forgotToken
                );
                
                $this->user_model->update_token($email,$form_data);
                $msg = '<p>To reset your password, please <a href="'.base_url().'user/reset_password/'.$email.'/'.$forgotToken.'">click here</a> and enter a new password </p>';
                
               
               
                $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'emailID',
                'smtp_pass' => 'your email password',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                
                $this->email->from('emailID');
                $this->email->to($email);
                
                $subject = "Password reset";

                $this->email->subject($subject);
                $this->email->message($msg);
                $this->email->send();
                
                $success = "Successfully send link Check your email and reset your password";
               
                $this->session->set_flashdata('success',$success);
				redirect(base_url().'forgot-password');
            }else{
                $this->session->set_flashdata('error',$error);
				redirect(base_url().'forgot-password'); 
            }
           
        }else{      
            $this->load->view('web/forgot-password',$data);
        }
    }

    public function reset_password($email=0,$token=0)
    {   
        $data['active']  = 'Reset Password';
        $data['title']   = 'Reset Password'; 
        $tot = $this->user_model->reset_password_check_url($email,$token);
        
        if(!$tot) {
            redirect(base_url());
            exit;
        }
       
        $error = '';
        $success = '';      
       if(isset($_POST['resetPassForm'])) {

            $valid = 1;

            $new_password = $this->input->post('new_password',true);
            $re_password = $this->input->post('re_password',true);

            if( empty($new_password) || empty($re_password) ) {
		    	$valid = 0;
		        $error .= "Password or Confirm password are empty".'<br>';
		    }			
			else {
		        if($new_password != $re_password) {
			    	$valid = 0;
			        $error .= "Password and Confirm password should be same".'<br>';
		    	}
		    }

            if($valid == 1) 
            {
                 $form_data = array(
                    'password' => md5($new_password),
                    'reset_token'    => ''
                );
                $this->user_model->reset_password_update($email,$form_data);
                $success =  $success = "Password reset successfully!";
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'user/reset_password_success');
            }
            else
            {
                $this->session->set_flashdata('error',$error);
                $data['var1'] = $email;
                $data['var2'] = $token;
                $this->load->view('web/view-reset-password',$data); 
            }
        } else {
            $data['var1'] = $email;
            $data['var2'] = $token;           
            $this->load->view('web/view-reset-password',$data);           
        }          
    }

    public function reset_password_success(){
        
        $data['active']  = 'forgotPassword';
        $data['title']   = 'Forgot Password';        
        $this->load->view('web/view-reset-password-success',$data);
    }
    
    
    
}