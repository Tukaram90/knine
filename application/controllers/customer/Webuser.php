<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Webuser extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('home_model');
        $this->load->model('user_model');
        $this->load->model('mastersetting_model');
        $this->load->model('subscription_model');
    }

    public function user_dashboard()
    {
        $data['active']  = 'userdashboard';
        $data['title']   = 'User Dashboard';
        $data['profile'] = $this->user_model->get_user_profile($this->session->userdata('u_user_id')); 
        $res = $this->user_model->get_total_expense_by_user($this->session->userdata('u_user_id'));  
        $data['totalExpense'] = $res[0]['total_amount']; 
        
        if(isset($_POST['filter-report-month'])){
			$filterArr['monthyear'] = $_POST['monthYear'];
			$data['srchMonthYear'] = $_POST['monthYear'];			
		}else{
			$filterArr['monthyear'] = '';
			$current = date('m').'-'.date('Y');
			$data['srchMonthYear'] = $current;
		}

		if(isset($_POST['filter-report-year'])){
			$filterArr['year'] = $_POST['year'];
			$data['srchYear'] =  $_POST['year'];			
		}else{
			$filterArr['year'] = '';
			$data['srchYear'] =  date('Y');
		}

        $data['counterData'] = $this->user_model->get_all_records_task_priority_by_current_month($this->session->userdata('u_user_id'),$filterArr);	
       	
		$data['expenseYearData'] = $this->user_model->get_all_expense_by_year($this->session->userdata('u_user_id'),$filterArr);
        $this->load->view('useradmin/user-dash',$data);        
    }

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success','Logout successfully!');
        redirect(base_url().'user');
    }

    public function profile()
    {
        $data['active']  = 'profile';
        $data['title']   = 'Profile';
        $data['profile'] = $this->user_model->get_user_profile($this->session->userdata('u_user_id'));
        if(isset($_POST['update-profile'])){           
            $data['tabactive'] = "profileTab";
            $email = $this->security->xss_clean($this->input->post('email', true));           
            $kernal_name = $this->security->xss_clean($this->input->post('kernal_name', true));
            $mobile = $this->security->xss_clean($this->input->post('mobile', true));
            $address = $this->security->xss_clean($this->input->post('address', true));
            $user_id = $this->security->xss_clean($this->input->post('user_id', true));
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
                $this->session->set_flashdata('error','Something went wrong OR You should not update field, Please try again!');    
            }
            redirect(base_url().'user-profile');
        } 
        
        if(isset($_POST['reset-password'])){
            $data['tabactive'] = "passwordTab";
            $old_password = $this->security->xss_clean($this->input->post('old_password', true));
            $new_password = $this->security->xss_clean($this->input->post('new_password', true));
            $user_id = $this->security->xss_clean($this->input->post('user_id', true));

            $res = $this->user_model->check_old_password_exist($old_password,$user_id);
            if($res){
                $result = $this->user_model->change_password($new_password,$user_id);
                $this->session->set_flashdata('success','Password changed successfully!');

            }else{
                $this->session->set_flashdata('error','Old Password does not matched!');    
            }
            redirect(base_url().'user-profile');
        }

        if(isset($_POST['update-profile-pic'])){
            $id = $this->security->xss_clean($this->input->post('user_id', true));
            
            $path = $_FILES['profilepic']['name'];
		    $path_tmp = $_FILES['profilepic']['tmp_name'];
            if($path!='') {
                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                unlink('uploads/userprofile/'.$data['profile']['profile_picture']);
                $final_name = 'user-'.$id.'.'.$ext;
                move_uploaded_file($path_tmp, 'uploads/userprofile/'.$final_name);
                $imgData = array(                   
                    'profile_picture' => $final_name,
                );                
                $res = $this->user_model->update_profile($id,$imgData);
                $success = 'Profile Picture is updated successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'user-profile');
            }

           
        }

        $this->load->view('useradmin/profile',$data);       
    }

    public function reports()
    {   
        if(empty($this->session->userdata('u_user_id'))){
            redirect(base_url().'user');
        }
        $data['active']  = 'reports';
        $data['title']   = 'Reports';
        $data['expenceCategory']   = $this->mastersetting_model->expense_category_list();
        $data['profile'] = $this->user_model->get_user_profile($this->session->userdata('u_user_id')); 
        $res = $this->user_model->get_total_expense_by_user($this->session->userdata('u_user_id'));  
        $data['totalExpense'] = $res[0]['total_amount']; 
        $weekData = $this->user_model->get_current_weekly_records_count($this->session->userdata('u_user_id')); 
        $data['weekCount'] = $weekData['total_weekly_amount'];
        
        if(isset($_POST['monthYear'])){
			$filterArr['monthyear'] = $_POST['monthYear'];
			$data['srchMonthYear'] = $_POST['monthYear'];			
		}else{
			$filterArr['monthyear'] = '';			
			$data['srchMonthYear'] = '';
		}

		if(isset($_POST['year'])){
			$filterArr['year'] = $_POST['year'];
			$data['srchYear'] =  $_POST['year'];			
		}else{
			$filterArr['year'] = '';
			$data['srchYear'] =  '';
		}

        if(isset($_POST['expense_cat'])){
			$filterArr['expense_cat'] = $_POST['expense_cat'];
			$data['srchexpense_cat'] =  $_POST['expense_cat'];			
		}else{
			$filterArr['expense_cat'] = '';
			$data['srchexpense_cat'] =  '';
		}

        $data['counterData'] = $this->user_model->get_all_records_task_priority_by_current_month($this->session->userdata('u_user_id'),$filterArr);	
       	
		$data['expenseYearData'] = $this->user_model->get_all_expense_by_year($this->session->userdata('u_user_id'),$filterArr);
        $user_id = $this->session->userdata('u_user_id');
        $expense = $this->user_model->get_expence($user_id,$filterArr);
        $expense_arr = array();
        //$expense_arr = array('main_title'=>"EXPENSE REPORT",'yAxisTitle'=>'TOTAL EXPENSE MONEY');
        $total = 0;
        if($expense){
           foreach($expense as $row){
               $expense_arr['expenseTitle'][] = $row['title'];
               $expense_arr['expenseAmount'][] = $row['total_amount'];
               $total  =  $total + $row['total_amount'];
           }
        }
        $data['totalAmount'] = $total;
        $data['expenceData'] = json_encode($expense_arr,JSON_NUMERIC_CHECK);
        $data['subscriptionPlan'] = $this->subscription_model->get_all_subscription_plan();
        $this->load->view('useradmin/report',$data);        
    }
    
    public function get_records_by_category(){
        $category = $this->security->sanitize_filename($this->input->post('selectedCat'));
        $monthYear = $this->security->sanitize_filename($this->input->post('monthYear'));
        $year = $this->security->sanitize_filename($this->input->post('year'));
        $user_id = $this->session->userdata('u_user_id');
        $filterData = array(
            'title'=>$category,
            'year'=> $year,
            'monthyear'=>$monthYear,
            'user_id'=>$user_id
        );
        $expense = $this->user_model->get_expence_by_category($filterData);
        if($expense){
           $srNo = 1;
            foreach ($expense as $row) {
                echo "<tr>";
                echo "<td>" . $srNo . "</td>";
                echo "<td>" . $row['amount'].' '.$row['currency'] . "</td>";
                echo "<td>" . $row['expense_added_date'] . "</td>";
                echo "<td>" . $row['expense_note'] . "</td>";
                echo "</tr>";
                $srNo++;
            }
        }       
    }
    
    public function get_week_detail_report(){        
        $weekData = $this->user_model->get_current_weekly_records($this->session->userdata('u_user_id'));
        if($weekData){
            $srNo = 1;
             foreach ($weekData as $row) {
                 echo "<tr>";
                 echo "<td>" . $srNo . "</td>";
                 echo "<td>" . $row['amount'].' '.$row['currency'] . "</td>";
                 echo "<td>" . $row['expense_added_date'] . "</td>";
                 echo "<td>" . $row['expense_note'] . "</td>";
                 echo "</tr>";
                 $srNo++;
             }
        }
    }
    
    public function landing_page()
    {
        if(empty($this->session->userdata('u_user_id'))){
            redirect(base_url().'user');
        }
        $data['active']  = 'Landing Page';
        $data['title']   = 'Landing Page';   
        $this->load->view('useradmin/landing-page',$data);        
    }
}