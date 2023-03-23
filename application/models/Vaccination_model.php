<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaccination_model extends CI_Model 
{
    public function save_or_update_dose($data) {       

        if(isset($data['id']) && !empty($data['id'])){
            $this->db->where('id',$data['id']);
            $this->db->update('vaccination_tbl',$data);
            return $this->db->affected_rows();
        }else{
            $vaccinatedID =  $data['vaccinated_id'];
            $query = $this->db->query("SELECT vaccinated_id,next_appointment FROM vaccination_tbl WHERE vaccinated_id = '$vaccinatedID' ORDER BY id DESC LIMIT 1");
            $result = $query->first_row('array');
            
            if($result){
                $today = date('Y-m-d');
                $next_appointment = date("Y-m-d",strtotime($result['next_appointment']));
                if($today > $next_appointment){
                    $this->db->insert('vaccination_tbl',$data);
                    return $this->db->insert_id();
                }
            }else{
                $this->db->insert('vaccination_tbl',$data);
                return $this->db->insert_id();
            }           
            
        }   
    }

    public function save_next_appointment($data) {       
        $this->db->insert('schedule_list',$data);
        return $this->db->insert_id();           
    }

    public function get_all_vacination_details_withdogs_by_user()
    {
        $this->db->select('vaccination_tbl.*,tbl_dogs.dog_name,tbl_user.fullname,vaccination_title.vaccination_name');
		$this->db->from('vaccination_tbl');		
        $this->db->join('tbl_dogs','tbl_dogs.dog_id  = vaccination_tbl.dog_id','INNER');
        $this->db->join('tbl_user','tbl_user.user_id  = vaccination_tbl.user_id','INNER');
        $this->db->join('vaccination_title','vaccination_title.id  = vaccination_tbl.vaccinated_id','INNER');
        $this->db->where('vaccination_tbl.user_id',$this->session->userdata('u_user_id'));
        $this->db->order_by('vaccination_tbl.id',"DESC");
        $this->db->group_by('vaccination_tbl.dog_id');
        $query = $this->db->get();       
		$response =  $query->result_array();
        $result = array();
        foreach($response as $row){
            $doesInfo = $this->get_vaccinated_details_by_dog($row['dog_id']);
            $result[] = array(
                'id'=> $row['id'],
                'dog_id'=> $row['dog_id'],
                'vaccinated_id'=> $row['vaccinated_id'],
                'dog_name' => $row['dog_name'],
                'doctor_contact' => $row['doctor_contact'],
                'doctor_name' => $row['doctor_name'],
                'register_no' => $row['register_no'],
                'microchip_no' => $row['microchip_no'],
                'vaccineDetails'=>$doesInfo
            );
        }

        return $result;
    }

    public function get_vaccinated_details_by_dog($dogID){
        $this->db->select('vaccination_tbl.vaccination_date,vaccination_tbl.next_appointment,vaccination_title.vaccination_name');
		$this->db->from('vaccination_tbl');	
        $this->db->join('vaccination_title','vaccination_title.id  = vaccination_tbl.vaccinated_id','INNER');
        $this->db->where('vaccination_tbl.dog_id',$dogID);
        $query = $this->db->get();   
       
		return  $query->result_array();
    }

    function delete_dose($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('vaccination_tbl');
    }

    public function get_vaccine_row_byid($id)
    {
        $this->db->select('vaccination_tbl.*,vaccination_title.vaccination_name,tbl_dogs.gender');
		$this->db->from('vaccination_tbl');
        $this->db->join('vaccination_title','vaccination_title.id  = vaccination_tbl.vaccinated_id','INNER');
        $this->db->join('tbl_dogs','tbl_dogs.dog_id  = vaccination_tbl.dog_id','INNER');
		$this->db->where('vaccination_tbl.id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    public function get_vaccination_number()
    {
        $this->db->select('*');
		$this->db->from('vaccination_title');        
        $this->db->order_by('vaccination_name',"ASC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    

    function check_dogId_indogtbl_vaccinationtbl($dogID){
        $this->db->where('dog_id',$dogID);
        $query = $this->db->get('vaccination_tbl');
        if ($query->num_rows() > 0){
            $this->db->select('vaccination_tbl.*,tbl_dogs.dog_name,tbl_dogs.chip_number,tbl_dogs.registration_no,tbl_dogs.dog_img,tbl_dogs.gender,tbl_dogs.date_of_birth');
            $this->db->from('vaccination_tbl');		
            $this->db->join('tbl_dogs','tbl_dogs.dog_id  = vaccination_tbl.dog_id','INNER');
            // $this->db->join('tbl_user','tbl_user.user_id  = vaccination_tbl.user_id','INNER');           
            $this->db->where('vaccination_tbl.dog_id',$dogID);
            //$this->db->group_by('vaccination_tbl.dog_id');
            $query = $this->db->get();       
            //$response = $query->result_array();
            $response = $query->first_row('array');
            $vaccineDetails = $this->get_all_vaccine_details_by_id($dogID);
            $result = array(
                'doctor_name'      =>$response['doctor_name'],
                // 'doctor_email'     =>$response['doctor_email'],
                'doctor_contact'   =>$response['doctor_contact'],
                'dog_name'         =>$response['dog_name'],
                'chip_number'      =>$response['chip_number'],
                'registration_no'  =>$response['registration_no'],
                'gender'           =>$response['gender'],
                'dog_img'          =>$response['dog_img'],
                'date_of_birth'    =>$response['date_of_birth'],
                'isVaccinatedEntry'=>'yes',
                'vaccineDetails' => $vaccineDetails 
            );
           
            // $result= array();
           
            // foreach($response as $row){
            //     $result[] = array(
            //         'id'        =>  $row['id'],
            //         'user_id'   =>  $row['user_id'],
            //         'dog_id'    =>  $row['dog_id'],
            //         'vaccinated_id'=>  $row['vaccinated_id'],
            //         'doctor_name'      =>$row['doctor_name'],
            //         'doctor_email'     =>$row['doctor_email'],
            //         'doctor_contact'   =>$row['doctor_contact'],
            //         'vaccination_date' =>$row['vaccination_date'],
            //         'dog_birthdate'    =>$row['dog_birthdate'],                    
            //         'vaccination_date' =>$row['vaccination_date'],
            //         'dog_name'         =>$row['dog_name'],
            //         'chip_number'      =>$row['chip_number'],
            //         'registration_no'  =>$row['registration_no'],
            //         'gender'           =>$row['gender'],
            //         'dog_img'          =>$row['dog_img'],
            //         'date_of_birth'    =>$row['date_of_birth'],
            //         'isVaccinatedEntry'=>'yes'
            //     );
            // }
            

            return $result;

        }
        else{
            $this->db->select('dog_id,dog_name,chip_number,registration_no,gender,dog_img,date_of_birth');
            $this->db->from('tbl_dogs');                   
            $this->db->where('dog_id',$dogID);           
            $query = $this->db->get();       
            $res =  $query->first_row('array');            
            $result = array(  
                'dog_id'           =>$res['dog_id'],                 
                'dog_name'         =>$res['dog_name'],
                'chip_number'      =>$res['chip_number'],
                'registration_no'  =>$res['registration_no'],
                'gender'           =>$res['gender'],
                'dog_img'          =>$res['dog_img'],
                'date_of_birth'    =>$res['date_of_birth'],
                'isVaccinatedEntry'=>'no'
            );
            return $result;
        }
    }

    public function get_all_vaccine_details_by_id($dogID){
        $this->db->select('vaccination_tbl.*,vaccination_title.vaccination_name');
        $this->db->from('vaccination_tbl');		
        $this->db->join('tbl_dogs','tbl_dogs.dog_id  = vaccination_tbl.dog_id','INNER');
        $this->db->join('vaccination_title','vaccination_title.id  = vaccination_tbl.vaccinated_id','INNER');           
        $this->db->where('vaccination_tbl.dog_id',$dogID);       
        $query = $this->db->get();       
        $response = $query->result_array();
        $result = array();
        foreach($response as $row){
            $result[] = array(
                'id'        =>  $row['id'],
                'user_id'   =>  $row['user_id'],
                'dog_id'    =>  $row['dog_id'],
                'vaccinated_id'=>  $row['vaccinated_id'],
                'vaccination_name'=> $row['vaccination_name'],
                'vaccination_date' =>$row['vaccination_date'],
            );
        }

        return $result;
    }

    public function get_vaccine_with_dogdetails_byid($id){
        $this->db->select('vaccination_tbl.*,tbl_dogs.dog_name,tbl_dogs.chip_number,tbl_dogs.registration_no,tbl_dogs.dog_img,tbl_dogs.gender,tbl_dogs.date_of_birth');
            $this->db->from('vaccination_tbl');		
            $this->db->join('tbl_dogs','tbl_dogs.dog_id  = vaccination_tbl.dog_id','INNER');
            //$this->db->join('vaccination_title','vaccination_title.id  = vaccination_tbl.vaccinated_id','INNER');          
            $this->db->where('vaccination_tbl.id',$id);
            $this->db->group_by('vaccination_tbl.dog_id');
            $query = $this->db->get(); 
            //echo $this->db->last_query();die;      
            $response = $query->first_row('array');
            $result = array(
                'id'        =>  $response['id'],
                'user_id'   =>  $response['user_id'],
                'dog_id'    =>  $response['dog_id'],
                'vaccinated_id'=>  $response['vaccinated_id'],
                'doctor_name'      =>$response['doctor_name'],
                'doctor_contact'   =>$response['doctor_contact'],
                'vaccination_date' =>$response['vaccination_date'],
                'dog_birthdate'    =>$response['dog_birthdate'],                   
                'dog_name'         =>$response['dog_name'],
                'chip_number'      =>$response['chip_number'],
                'registration_no'  =>$response['registration_no'],
                'gender'           =>$response['gender'],
                'dog_img'          =>$response['dog_img'],
                'date_of_birth'    =>$response['date_of_birth'],
                'vaccineDetails'=> $this->get_all_vaccine_details_by_id( $response['dog_id'])
            );
            return $result;           
    }

    

    public function update_next_appointment($data) {       
        $this->db->where('vaccination_tblid',$data['vaccination_tblid']);
        $this->db->update('schedule_list',$data);
        
        return $this->db->affected_rows();
        
    }

    public function get_vaccine_with_dogdetails_by_dogID($dogID){
        $this->db->select('vaccination_tbl.*,tbl_dogs.dog_name,tbl_user.fullname,vaccination_title.vaccination_name');
		$this->db->from('vaccination_tbl');		
        $this->db->join('tbl_dogs','tbl_dogs.dog_id  = vaccination_tbl.dog_id','INNER');
        $this->db->join('tbl_user','tbl_user.user_id  = vaccination_tbl.user_id','INNER');
        $this->db->join('vaccination_title','vaccination_title.id  = vaccination_tbl.vaccinated_id','INNER');
        $this->db->where('vaccination_tbl.user_id',$this->session->userdata('u_user_id'));
        $this->db->order_by('vaccination_tbl.id',"DESC");
        $this->db->where('vaccination_tbl.dog_id',$dogID);
        $query = $this->db->get();       
		return  $query->result_array();
    }
}