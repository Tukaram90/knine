<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vaccination extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('vaccination_model');
        $this->load->model('kennel_model');
    }

    public function vaccination_list(){
        $data['active']  = 'vaccinationList';
        $data['title']   = 'Vaccination List'; 
        $data['vaccinatedDaetails'] = $this->vaccination_model->get_all_vacination_details_withdogs_by_user();                   
        $this->load->view('useradmin/vaccination-list',$data);    
    } 

    public function add_vaccination($id=null)
    {
        $data['active']  = 'newVaccination';
        $data['title']   = 'New Vaccination';
        $data['dogListByUser'] = $this->kennel_model->dog_list_by_userID();
       
        if(isset($_POST['save-dose-form'])){  
                   
            $id = $this->input->post('id');
            $next_appointment = $this->input->post("next_appointment");
            $vaccinatedIDTotal = $this->input->post("vaccination_id");
            for($i = 0; $i < count($vaccinatedIDTotal); $i++) {
                $vaccineForm = array(                   
                    'user_id' => $this->session->userdata("u_user_id"),
                    'doctor_name' => trim($this->input->post("doctor")),
                    'register_no' => $this->input->post("register_no"),
                    'microchip_no' => $this->input->post("microchip_no"),
                    'doctor_contact' => $this->input->post("doctor_phone"),                
                    'dog_id'        => $this->input->post("dog_id"),
                    'dog_birthdate' => $this->input->post("dog_birth_date"),               
                    'vaccinated_id' => $vaccinatedIDTotal[$i],                
                    'vaccination_date' => $this->input->post("vaccinated_date")[$i], 
                    'next_appointment' =>$next_appointment[$i],      
                    'created_at' => date('Y-m-d'),                   
                );   

                $vaccineDetails_id = $this->vaccination_model->save_or_update_dose($vaccineForm);
                if(isset($next_appointment) && !empty($next_appointment) && $vaccineDetails_id){
                    $appointment = array(
                        'user_id' => $this->session->userdata("u_user_id"),
                        'title'   =>'Next appointment',
                        'description' =>'You have an upcoming appointment with Dr for vaccine',
                        'start_datetime'=> $next_appointment[$i],
                        'end_datetime'=>  $next_appointment[$i],
                        'vaccination_tblid'=>$vaccineDetails_id
                    );    
                    $this->vaccination_model->save_next_appointment($appointment);
                }
            }                         
          
            $success = 'Vaccinated form data is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'vaccination-list');
        }       
        $this->load->view('useradmin/vaccination-form',$data); 
    }

    public function delete_dose($id){
        $this->vaccination_model->delete_dose($id);        
        $success = 'Dose is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'vaccination-list');
    }

    // public function getVaccinationName(){
       
    //     $postData = $this->input->post();             
    //     $data = $this->vaccination_model->getVaccinationName($postData);
    //     echo json_encode($data); 
    // }

    public function get_dog_with_vaccination_details(){
        $dog_id =  $this->security->xss_clean($this->input->post('dog_id')); 
        $data['DoseInfo'] = $this->vaccination_model->check_dogId_indogtbl_vaccinationtbl($dog_id);
        $gender = strtolower($data['DoseInfo']['gender']); 
         
        $res = $this->vaccination_model->get_vaccination_number();      
        foreach ($res as $thisArrIndex=>$row) {
            
            if(!empty($gender) && isset($gender) && $gender=='male'){
            if ( $row['vaccination_name'] == "Bitch-on season/heat" ){
                unset($res[$thisArrIndex]);
            }
            } 
        } 
              
        $vaccineInfo = array_values($res);
        $data['vaccineList'] = $vaccineInfo;
        // $vaccineInfo = $res;
        $view=$this->load->view('useradmin/vaccination-append-view',$data,true);
        $response = array('valid'=>true, 'view'=>$view,'vaccineInfo'=>$vaccineInfo);
        
        echo json_encode( $response );
    }

    public function edit_vaccination($id){
        $data['active']  = 'EditVaccination';
        $data['title']   = 'Edit Vaccination';
        $data['dogListByUser'] = $this->kennel_model->dog_list_by_userID();
        $data['DoseInfo'] =  $this->vaccination_model->get_vaccine_row_byid($id);
        $gender = strtolower($data['DoseInfo']['gender']);
        $res = $this->vaccination_model->get_vaccination_number();      
        foreach ($res as $thisArrIndex=>$row) {
            if(!empty($gender) && isset($gender) && $gender=='male'){
            if ( $row['vaccination_name'] == "Bitch-on season/heat" ){
                unset($res[$thisArrIndex]);
            }
            } 
        }        
        $data['vaccineList'] = $res;

        if(isset($_POST['edit-dose-form'])){   
            $id = $this->input->post('id');
            $next_appointment = $this->input->post("next_appointment");
            $updatedForm = array(
                'id' => $id ?? '',
                'user_id' => $this->session->userdata("u_user_id"),
                'doctor_name' => trim($this->input->post("doctor")),
                'register_no' => $this->input->post("register_no"),
                'microchip_no' => $this->input->post("microchip_no"),
                'doctor_contact' => $this->input->post("doctor_phone"),                
                'dog_id'        => $this->input->post("dog_id"),
                'dog_birthdate' => $this->input->post("dog_birth_date"),               
                'vaccinated_id' => $this->input->post("vaccination_id"),                
                'vaccination_date' => $this->input->post("vaccinated_date"), 
                'next_appointment' => $next_appointment,    
                'updated_at' => date('Y-m-d'),
            );                   
            $updatedID = $this->vaccination_model->save_or_update_dose($updatedForm);
           
            if(isset($next_appointment) && !empty($next_appointment) && $id){
                $appointment = array(
                    'user_id' => $this->session->userdata("u_user_id"),
                    'title'   =>'Next appointment',
                    'description' =>'You have an upcoming appointment with Dr for vaccine',
                    'start_datetime'=> $next_appointment,
                    'end_datetime'=>  $next_appointment,
                    'vaccination_tblid'=>$id
                );
                
                $this->vaccination_model->update_next_appointment($appointment);
            }
            
            $success = 'Vaccinated data is updated successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'vaccination-list');
        }        
        $this->load->view('useradmin/edit-vaccination',$data);         
    }

    public function vaccination_details($id){
        $data['active']  = 'DetailsVaccination';
        $data['title']   = 'Vaccination Details';
        $data['DoseInfo'] =  $this->vaccination_model->get_vaccine_with_dogdetails_byid($id);       
        $this->load->view('useradmin/vaccination-dog-details',$data);
    }

    public function getting_vaccinated_list($dog_id){  
        $data['active']  = 'GettingVaccination';
        $data['title']   = 'Getting Vaccination Details';
        $data['vaccinationDetails'] =  $this->vaccination_model->get_vaccine_with_dogdetails_by_dogID($dog_id);
        $this->load->view('useradmin/vaccinanited-dog-list-view',$data);
    }

}
