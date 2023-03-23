<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $error = '';       

        $logged_in_admin = $this->session->userdata('logged_in_admin');
        if($logged_in_admin)
        {
            redirect(base_url().'dashboard');
        }

        if(isset($_POST['login-form'])) {

            // Getting the form data
            $email = $this->input->post('email',true);
            $password = $this->input->post('password',true);

            // Checking the email address
            $un = $this->Login_model->check_email($email);
           
            if(!$un) {
                $error = 'Email address is wrong!';
                $this->session->set_flashdata('error',$error);
                redirect(base_url().'administrator');

            } else {

                // When email found, checking the password
                $pw = $this->Login_model->check_password($email,$password);

                if(!$pw) {

                    $error = 'Password is wrong!';
                    $this->session->set_flashdata('error',$error);
                    redirect(base_url().'login');

                } else {

                    // When email and password both are correct
                    $array = array(
                        'user_id' => $pw['user_id'],
                        'email' => $pw['email'],
                        'password' => $pw['password'],
                        'name' => $pw['fullname'],
                        'role' => $pw['role'],
                        'status' => $pw['status'],
                        'logged_in_admin' => true,                        
                    );
                    $this->session->set_userdata($array);
                    
                    redirect(base_url().'dashboard');
                }
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url().'administrator');
    }
}
