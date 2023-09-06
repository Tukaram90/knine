<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shows extends CI_Controller {

    function __construct(){
		parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('mastersetting_model');
        $this->load->model('kennel_model');
    }

    public function index(){
        $data['active']  = 'showList';
        $data['title']   = 'Show List'; 
        $user_id = $this->session->userdata("u_user_id");
        $data['showList'] = $this->kennel_model->get_show_list_by_user($user_id);             
        $this->load->view('useradmin/showlist',$data);       
    }

    public function add_show(){
        $data['active']  = 'addShow';
        $data['title']   = 'Add Show';
        $data['dogListByUserDetails'] = $this->kennel_model->get_all_dogs_by_user_id();
        if(isset($_POST['save-show-form'])){
            $showData = array(
                'user_id' => $this->session->userdata("u_user_id"),
                'dog_id' => trim($this->input->post('dog_id')),
                'created_date' => date('Y-m-d'),
            );
            $show_id = $this->kennel_model->insert_show_data($showData);
           
            $showlocation = $this->input->post('showlocation');
            $awardDetails = [];  
            for($i = 0; $i < count($showlocation); $i++) {
                $awardDetails[] = array(
                    'show_dog_id' =>$show_id,
                    'show_location' => $showlocation[$i],
                    'club_name' => $this->input->post('clubname')[$i],
                    'show_date' => $this->input->post('show_date')[$i],
                    'entry_fee' => $this->input->post('fee')[$i],
                    'photographer' => $this->input->post('photographer')[$i],
                    'photographer_contact' => $this->input->post('photographer_contact')[$i],
                    'superintendent' => $this->input->post('show_superintendent')[$i],
                    'show_chair' => $this->input->post('show_chair')[$i],
                    'show_chair_contact' => $this->input->post('chair_contact_info')[$i],
                    'breed_judge' => $this->input->post('breed_judge')[$i],
                    'breed_judge_provisinal' => $this->input->post('breed_judge_provisional')[$i],
                    'group_judge' => $this->input->post('group_judge')[$i],
                    'group_judge_provosional' => $this->input->post('group_judge_provisional')[$i],
                    'nohs_group_judge' => $this->input->post('nohs_judge')[$i],
                    'nohs_group_judge_provosinal' => $this->input->post('nohs_judge_provisional')[$i],
                    'best_show_judge' => $this->input->post('best_judge')[$i],
                    'nohs_best_show_judge' => $this->input->post('nohs_best_judge')[$i],
                    'comments_show_grounds' => $this->input->post('comments_grounds')[$i],
                    'dog_handledby' => $this->input->post('dog_handled')[$i],

                    'class_entered' => $this->input->post('class_entered')[$i],

                    'entry_fee2section' => $this->input->post('handled_entry_fee')[$i],
                    'number_ofclass_dog' => $this->input->post('nmbr_class_dog')[$i],
                    'number_of_class_bitches' => $this->input->post('nmbr_class_bitches')[$i],
                    'non_regular_entry' => $this->input->post('non_regular_entry')[$i],
                    'bob_entries' => $this->input->post('number_bob_entry')[$i],
                    'total_entry_showing_breed' => $this->input->post('total_entry')[$i],
                    'major_entry' => $this->input->post('major_entry')[$i],
                    'first_award_received' => $this->input->post('first_award')[$i],
                    'second_award_recived' => $this->input->post('second_award')[$i],
                    'third_award_recived' => $this->input->post('third_award')[$i],
                    'fourth_award_recived' => $this->input->post('fourth_award')[$i],
                    'comments_judging' => $this->input->post('comments_judging')[$i],
                    'group_placement' => $this->input->post('group_placement')[$i],
                    'group_points' => $this->input->post('group_plcement_points')[$i],
                    'nohs_group_placement' => $this->input->post('nohs_group_placement')[$i],
                    'nohs_group_points' => $this->input->post('nohs_group_points')[$i],
                    'best_show_in3section' => $this->input->post('best_in_show')[$i],
                    'best_show_entry' => $this->input->post('bst_show_entry')[$i],
                    'reserved_best_show' => $this->input->post('reserve_bst_show')[$i],
                    'nohs_best_show_3section' => $this->input->post('nohs_best_in_show')[$i],
                    'nohs_show_entry_3section' => $this->input->post('nohs_show_entry')[$i],
                    'nohs_reserved_bst_show' => $this->input->post('nohs_reserve_bst_show')[$i],
                    'non_regular_group_3section' => $this->input->post('non_regular_group')[$i],
                    'group_judge_3section' => $this->input->post('group_judge')[$i],
                    'group_placement_3section' => $this->input->post('group_placement_3section')[$i],
                    'non_regular_best_show_3section' => $this->input->post('non_regular_best_in_show_3sec')[$i],
                    'non_regular_best_show_judge_3section' => $this->input->post('non_regular_best_show_judge_3sec')[$i],
                    'commenst_show_grounds_judging' => $this->input->post('comments_show_grounds_judging3section')[$i],
                    'is_junior_showship'=> $this->input->post('junior_shownship')[$i],
                    'is_best_junior_show'=> $this->input->post('best_junior_inshow')[$i],
                    'is_reserver_best_junior_inshow'=> $this->input->post('reserve_best_junior')[$i],
                );
            }  
            $this->kennel_model->insert_show_details($awardDetails);
            $success = 'Show Details is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'shows-list');   
        }
        $this->load->view('useradmin/show-add',$data);
    }

    public function delete_show($id){
        $this->kennel_model->delete_show($id);
        $success = 'Award Data is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'shows-list');
    }

    public function edit_show($id){
        $data['active']  = 'editShow';
        $data['title']   = 'Edit Show';
        $data['dogListByUserDetails'] = $this->kennel_model->get_all_dogs_by_user_id();
        $data['showInfo'] = $this->kennel_model->get_show_with_details_by_id($id);
        if(isset($_POST['edit-show-form'])){
            

            $showID = trim($this->input->post('showId'));
            $updatedFormData = array(               
                'user_id' => $this->session->userdata("u_user_id"),
                'dog_id' => trim($this->input->post('dog_id')),
                'updated_at' => date('Y-m-d'),
            );
           
            $this->kennel_model->update_show($updatedFormData, $showID);
            $showlocation = $this->input->post('showlocation');
            $thirdAward = $this->input->post('third_award');
            $fourthAward = $this->input->post('fourth_award');
            $showDetails = [];  
            for($i = 0; $i < count($showlocation); $i++) {
                $showDetails[] = array(
                    'id'        => $this->input->post('showDetailsId')[$i],
                    'show_dog_id' =>$showID,
                    'show_location' => $showlocation[$i],
                    'club_name' => $this->input->post('clubname')[$i],
                    'show_date' => $this->input->post('show_date')[$i],
                    'entry_fee' => $this->input->post('fee')[$i],
                    'photographer' => $this->input->post('photographer')[$i],
                    'photographer_contact' => $this->input->post('photographer_contact')[$i],
                    'superintendent' => $this->input->post('show_superintendent')[$i],
                    'show_chair' => $this->input->post('show_chair')[$i],
                    'show_chair_contact' => $this->input->post('chair_contact_info')[$i],
                    'breed_judge' => $this->input->post('breed_judge')[$i],
                    'breed_judge_provisinal' => $this->input->post('breed_judge_provisional')[$i],
                    'group_judge' => $this->input->post('group_judge')[$i],
                    'group_judge_provosional' => $this->input->post('group_judge_provisional')[$i],
                    'nohs_group_judge' => $this->input->post('nohs_judge')[$i],
                    'nohs_group_judge_provosinal' => $this->input->post('nohs_judge_provisional')[$i],
                    'best_show_judge' => $this->input->post('best_judge')[$i],
                    'nohs_best_show_judge' => $this->input->post('nohs_best_judge')[$i],
                    'comments_show_grounds' => $this->input->post('comments_grounds')[$i],
                    'dog_handledby' => $this->input->post('dog_handled')[$i],

                    'class_entered' => $this->input->post('class_entered')[$i],

                    'entry_fee2section' => $this->input->post('handled_entry_fee')[$i],
                    'number_ofclass_dog' => $this->input->post('nmbr_class_dog')[$i],
                    'number_of_class_bitches' => $this->input->post('nmbr_class_bitches')[$i],
                    'non_regular_entry' => $this->input->post('non_regular_entry')[$i],
                    'bob_entries' => $this->input->post('number_bob_entry')[$i],
                    'total_entry_showing_breed' => $this->input->post('total_entry')[$i],
                    'major_entry' => $this->input->post('major_entry')[$i],
                    'first_award_received' => $this->input->post('first_award')[$i],
                    'second_award_recived' => $this->input->post('second_award')[$i],
                    'third_award_recived' =>  $this->input->post('third_award')[$i],
                    'fourth_award_recived' => $this->input->post('fourth_award')[$i],
                    'comments_judging' => $this->input->post('comments_judging')[$i],
                    'group_placement' => $this->input->post('group_placement')[$i],
                    'group_points' => $this->input->post('group_plcement_points')[$i],
                    'nohs_group_placement' => $this->input->post('nohs_group_placement')[$i],
                    'nohs_group_points' => $this->input->post('nohs_group_points')[$i],
                    'best_show_in3section' => $this->input->post('best_in_show')[$i],
                    'best_show_entry' => $this->input->post('bst_show_entry')[$i],
                    'reserved_best_show' => $this->input->post('reserve_bst_show')[$i],
                    'nohs_best_show_3section' => $this->input->post('nohs_best_in_show')[$i],
                    'nohs_show_entry_3section' => $this->input->post('nohs_show_entry')[$i],
                    'nohs_reserved_bst_show' => $this->input->post('nohs_reserve_bst_show')[$i],
                    'non_regular_group_3section' => $this->input->post('non_regular_group')[$i],
                    'group_judge_3section' => $this->input->post('group_judge')[$i],
                    'group_placement_3section' => $this->input->post('group_placement_3section')[$i],
                    'non_regular_best_show_3section' => $this->input->post('non_regular_best_in_show_3sec')[$i],
                    'non_regular_best_show_judge_3section' => $this->input->post('non_regular_best_show_judge_3sec')[$i],
                    'commenst_show_grounds_judging' => $this->input->post('comments_show_grounds_judging3section')[$i],
                    'is_junior_showship'=> $this->input->post('junior_shownship')[$i],
                    'is_best_junior_show'=> $this->input->post('best_junior_inshow')[$i],
                    'is_reserver_best_junior_inshow'=> $this->input->post('reserve_best_junior')[$i],
                );
            }  
            $this->kennel_model->update_show_details($showDetails);
            $success = 'Show Details is updated successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'shows-list'); 
        }       
        $this->load->view('useradmin/show-edit',$data);
    }
    
    public function handler_expense_list(){
        $data['active']  = 'HandlerExpenseList';
        $data['title']   = 'Handler Expense List'; 
        $user_id = $this->session->userdata("u_user_id");
        $data['handlerExpense'] = $this->kennel_model->fetch_handler_expense_by_user($user_id);             
        $this->load->view('useradmin/hadler-expense-list',$data);       
    }

    public function save_handler_expense(){
        $data['active']  = 'addHandlerExpense';
        $data['title']   = 'Add Handler Expense'; 
        $data['dogListByUserDetails'] =  $this->kennel_model->get_all_dogs_by_user_id(); 
        if(isset($_POST['save-form-handler'])){
            
            $formData = array(                
                'user_id' => $this->session->userdata("u_user_id"),
                'dog_id' => implode(",",$this->input->post("dog_id")),
                'client_name' => $this->input->post("client_name"),
                'show_details' => $this->input->post("show_details"),
                'no_of_dogs' => $this->input->post("no_ofdogs"),
                'deposit' => $this->input->post("deposit"),
                'entry_fee' => $this->input->post("entry_fee"),
                'handler_fee' => $this->input->post("handling_fee"),
                'grooming_fee' => $this->input->post("grooming_fees"),
                'boarding_fee' => $this->input->post("boarding_fee"),
                'camping_fee' => $this->input->post("camping_fees"),
                'meals' => $this->input->post("meals"),
                'bonus_points_earned' => $this->input->post("bonus_points_earned"),
                'bonus_group_placement' => $this->input->post("bonus_group_placement"),
                'bonus_best_show' => $this->input->post("bonus_best_show"),
                'sweepstakes_fee' => $this->input->post("sweepstakes_fee"),
                'total_handling' => $this->input->post("total_handling"),
                'created_at' => date('Y-m-d'),
                'client_email' => $this->input->post("client_email"),
                'currency' => $this->input->post("currency"),
            );
           
            $this->kennel_model->insert_handler_expense($formData);
            $success = 'Handler Expense is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'handler-expense');
        }                   
        $this->load->view('useradmin/handler-form',$data); 
    }

    public function delete_handler_expense($id){
        $this->kennel_model->delete_handler_expense($id);
        $success = 'Award Data is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'handler-expense');
    }

    public function edit_handler_expense($id){
        $data['active']  = 'EditHandlerExpense';
        $data['title']   = 'Edit Handler Expense'; 
        $data['dogListByUserDetails'] =  $this->kennel_model->get_all_dogs_by_user_id(); 
        $data['handlerExpense'] = $this->kennel_model->get_handler_expense_by_id($id);
        if(isset($_POST['edit-form-handler'])){
            $id = $this->input->post("handler_expense_id");
            $formData = array(                
                // 'user_id' => $this->session->userdata("u_user_id"),
                'dog_id' => implode(",",$this->input->post("dog_id")),
                'client_name' => $this->input->post("client_name"),
                'show_details' => $this->input->post("show_details"),
                'no_of_dogs' => $this->input->post("no_ofdogs"),
                'deposit' => $this->input->post("deposit"),
                'entry_fee' => $this->input->post("entry_fee"),
                'handler_fee' => $this->input->post("handling_fee"),
                'grooming_fee' => $this->input->post("grooming_fees"),
                'boarding_fee' => $this->input->post("boarding_fee"),
                'camping_fee' => $this->input->post("camping_fees"),
                'meals' => $this->input->post("meals"),
                'bonus_points_earned' => $this->input->post("bonus_points_earned"),
                'bonus_group_placement' => $this->input->post("bonus_group_placement"),
                'bonus_best_show' => $this->input->post("bonus_best_show"),
                'sweepstakes_fee' => $this->input->post("sweepstakes_fee"),
                'total_handling' => $this->input->post("total_handling"),
                'client_email' => $this->input->post("client_email"),
                'updated_at' => date('Y-m-d'),                
            );
            $this->kennel_model->update_handler_expense($formData, $id);
            $success = 'Handler Expense is updated successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'handler-expense');
        }
        $this->load->view('useradmin/handler-form-edit',$data);
    }

    public function handler_invoice($id){
        $data['active']  = 'EditHandlerExpense';
        $data['title']   = 'Handler Expense invoice'; 
        $data['dogListByUserDetails'] =  $this->kennel_model->get_all_dogs_by_user_id(); 
        $data['invoiceData'] = $this->kennel_model->get_handler_expense_invoice_id($id);
        $dodidArr = $data['invoiceData']['dog_id'];
        $data['dognamearr'] = $this->kennel_model->get_dog_name_by_id_arr($dodidArr);   
            
        $this->load->view('useradmin/handler-invoice',$data);
    }
    
    public function create_pdf($id){
        require 'vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        
        $data['active']  = 'pdf';
        $data['title']   = 'Invoice pdf generation'; 
        $data['dogListByUserDetails'] =  $this->kennel_model->get_all_dogs_by_user_id(); 
        $data['invoiceData'] = $this->kennel_model->get_handler_expense_invoice_id($id);
        $dodidArr = $data['invoiceData']['dog_id'];
        $data['dognamearr'] = $this->kennel_model->get_dog_name_by_id_arr($dodidArr);   
            
        $this->load->view('useradmin/pdf-invoice',$data);

        $html = $this->output->get_output();
        $mpdf->WriteHTML($html);
        //$mpdf->Output('my_file.pdf', 'D');
        
        $pdfData = $mpdf->Output('', 'S');
        $filename = 'K9Widget Invoice';
        $recieverEmail = $data['invoiceData']['client_email'];
        $clientName = $data['invoiceData']['client_name'];
        $genNumber =  str_pad($data['invoiceData']['id'],5,"0",STR_PAD_LEFT);
        $invoiceNumber = 'K9W-'.$genNumber;
        $total = $data['invoiceData']['total_handling'];
        if(isset($data['invoiceData']['client_email']) && !empty($data['invoiceData']['client_email'])){
            $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'k9widget@gmail.com',
            'smtp_pass' => 'k9widget@1234',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            
            $message = "Dear $clientName,\r\n\r\n";
            $message .= "Thank you for your handling dog. We are pleased to inform you that your invoice has been processed.\r\n\r\n";
            $message .= "Invoice details:\r\n";
            $message .= "- Invoice number:  $invoiceNumber \r\n";
            $message .= "- Date: " . date('Y-m-d') . "\r\n";
            $message .= "- Total amount:  $total \r\n\r\n";
            $message .= "If you have any questions or concerns, please feel free to contact our customer support.\r\n\r\n";
            $message .= "Best regards,\r\n";
            $message .= "K9 Widget";
            
            $this->email->from('k9widget@gmail.com');
            $this->email->to($recieverEmail);
            $subject = "PDF Attachment";
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->attach($pdfData,  'attachment',$filename, 'application/pdf');
            $is_email_sent = $this->email->send();
            if ($is_email_sent) {
                $this->session->set_flashdata('alert', 'Email sent successfully!');
            } else {
                $this->session->set_flashdata('alert', 'Email sending failed.');
            }
        } else{
            $mpdf->Output('my_file.pdf', 'D');
        }   
        redirect(base_url().'handler-invoice/'.$id);
    }
}

?>