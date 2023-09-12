<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kennel_model extends CI_Model 
{
    public function save_or_update_dog($data) {       

        if($data['dog_id'] && !empty($data['dog_id'])){
            $this->db->where('dog_id',$data['dog_id']);
            $this->db->update('tbl_dogs',$data);
            return $this->db->affected_rows();
        }else{
            $this->db->insert('tbl_dogs',$data);
            return $this->db->insert_id();
        }   
    } 

    public function dog_list_by_userID()
    {
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('user_id',$this->session->userdata('u_user_id'));       
		$query = $this->db->get();
		return $query->result_array();
    }

    public function father_dog_list_by_userID(){
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('user_id',$this->session->userdata('u_user_id'));
        $this->db->where('gender','male');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function mother_dog_list_by_userID(){
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('user_id',$this->session->userdata('u_user_id'));
        $this->db->where('gender','female');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_all_dogs_by_user_id()
    {
        $this->db->select('a.*,kennel_types.kennel_type');
		$this->db->from('tbl_dogs a');		
        $this->db->join('kennel_types','kennel_types.id = a.kennel_type_id','INNER');
        $this->db->where('a.user_id',$this->session->userdata('u_user_id'));
        $this->db->where('a.display','Y');
        $this->db->order_by('a.dog_id',"DESC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    public function get_dog_info_by_dog_id($dog_id)
    {
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('dog_id',$dog_id);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    function delete_dog($id){
        $this->db->where('dog_id',$id);
        $this->db->delete('tbl_dogs');
    } 

    function delete_temparay_dog($dog_id){
        $data['display'] = 'N';
        $this->db->where('dog_id',$dog_id);
        $this->db->update('tbl_dogs',$data);
        return $this->db->affected_rows();
    }
    

    public function get_parent_dog_details_byID($dog_id)
    {
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('dog_id',$dog_id);
		$query = $this->db->get();
		$result =  $query->first_row('array');
       
        $response = array(
            'clicked_dog_id' => $result['dog_id'],
            'clicked_dogName' => $result['dog_name'],
            'clicked_dogImg' => $result['dog_img'],
            'treeStructure' => $this->membersTree($result['dog_id'])
            
        );
        //echo"<pre>";print_r($response);die;
        return $response;
    }

    public function membersTree($parent_key)
    {
        $row1 = [];
        $row = $this->db->query('SELECT dog_id, dog_name,dog_img from tbl_dogs WHERE parent_id="'.$parent_key.'"')->result_array();
       
        foreach($row as $key => $value)
        {           
           $row1[$key]['dog_id'] = $value['dog_id'];
           $row1[$key]['dog_name'] = $value['dog_name']; 
           $row1[$key]['dog_img'] = $value['dog_img'];          
           $row1[$key]['nodes'] = array_values($this->membersTree($value['dog_id']));
        }
  
        return $row1;
    }
    
    public function get_male_dog_list_by_user()
    {
        $this->db->select('a.*');
		$this->db->from('tbl_dogs a');        
        $this->db->where('a.user_id',$this->session->userdata('u_user_id'));
        $this->db->where('a.display','Y');       
        $this->db->where('a.gender', 'male');
        $this->db->order_by('a.dog_id',"DESC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    public function get_spause_dog($male_dog) {
        $this->db->where('parent_id', $male_dog);
        $query = $this->db->get('tbl_dogs');
        $result = $query->result_array();
       // echo"<pre>";print_r($result);die;
        $femaleDog = array();
        
        if($result){
            if($result['0']['mother_id']!= null || $result['0']['mother_id']!= 0){
            foreach ($result as $dogRow) {
                $this->db->where('dog_id', $dogRow['mother_id']);
                $query = $this->db->get('tbl_dogs');
                foreach ($query->result() as $dog) {
                    $femaleDog[] = "<option value='" . $dog->dog_id . "'>" . $dog->dog_name . "</option>";
                }
            }
            }
        }else{
            $femaleDog[] = "<option value=''>Spause not avialable</option>";
        }      
        return implode('', $femaleDog);
    }

    public function get_dog_literacy_male_or_female_parent_data($dog_id){
        $this->db->where('dog_id', $dog_id);
        $query = $this->db->get('tbl_dogs');
        return $query->first_row('array');
    }

    public function get_dog_childerns_data_by_parent($mdog_id,$fdog_id){
        $this->db->select('a.*');
		$this->db->from('tbl_dogs a');        
        // $this->db->where('a.user_id',$this->session->userdata('u_user_id'));
        // $this->db->where('a.display','Y');       
        $this->db->where('a.parent_id', $mdog_id);
        $this->db->where('a.mother_id', $fdog_id);
        $this->db->order_by('a.dog_id',"DESC");
        $query = $this->db->get();       
		return $query->result_array();
    }

    // END DOG RELATED FUNCTION

    public function get_dog_details_for_tree_strcuture($user_id)
    {
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('user_id',$user_id);
        $this->db->order_by('parent_id','asc');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_expense_list_by_user_id($user_id,$filterArr)
    {   //print_r($filterArr);die;
        if($filterArr['expense_cat']){
            $this->db->where('de.expense',$filterArr['expense_cat']);
        }

        if($filterArr['startDate'] && empty($filterArr['end_date'])){
            $this->db->where('de.expense_added_date',$filterArr['startDate']);
        }

        if($filterArr['startDate'] && $filterArr['end_date']){
           
            $this->db->where('de.expense_added_date >=', $filterArr['startDate']);
            $this->db->where('de.expense_added_date <=', $filterArr['end_date']);
        }

        if($filterArr['end_date'] && empty($filterArr['startDate'])){
            $this->db->where('de.expense_added_date',$filterArr['end_date']);
        }
        $this->db->select('de.*,ec.title');
		$this->db->from('dog_expense de');		
        $this->db->join('expense_category ec','ec.id = de.expense','INNER');
        $this->db->where('de.user_id',$this->session->userdata('u_user_id'));
        $this->db->order_by('de.expense_id',"DESC");
		$query = $this->db->get();       
		return $query->result_array();
    }

    public function add_or_update_expense($data) {       

        if($data['expense_id'] && !empty($data['expense_id'])){
            $this->db->where('expense_id',$data['expense_id']);
            $this->db->update('dog_expense',$data);
            return $this->db->affected_rows();
        }else{
            $this->db->insert('dog_expense',$data);
            return $this->db->insert_id();
        }   
    }      

    public function delete_expense($id){ 
        $this->db->where('expense_id',$id);
        $this->db->delete('dog_expense');
    }  

    public function get_expense_by_expense_id($expense_id)
    {
        $this->db->select('*');
		$this->db->from('dog_expense');
		$this->db->where('expense_id',$expense_id);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    public function save_new_expence_category($newExpensecat){
        $data = array(
            'title'=>$newExpensecat,
            'created_by'=>$this->session->userdata('u_user_id'),
            'created_date'=>date('Y-m-d')
        );
       
        $this->db->where('title',$newExpensecat);
        $query = $this->db->get('expense_category');       
        if ($query->num_rows() > 0){
            return false;
        }
        else{           
            $this->db->insert('expense_category',$data);          
            return $this->db->insert_id();
        }
    }

    /*
    EVENT CALENDAR 
    */

    public function save_event($data){
        $this->db->insert('tbl_events',$data);
        return $this->db->insert_id(); 
    }

    public function fetch_event_byuserid($user_id){
        $this->db->select('*');
		$this->db->from('tbl_events');
		$this->db->where('user_id',$user_id);
        $this->db->order_by('id','desc');        
		$query = $this->db->get();
       
		return $query->result_array();
    }

    public function update_event($updatedData,$id) {  

        $this->db->where('id',$id);
        $this->db->update('tbl_events',$updatedData);
        return $this->db->affected_rows();      
    } 

    public function delete_event($id){ 
        $this->db->where('id',$id);
        $this->db->delete('tbl_events');
    } 

    public function fetch_all_schedule($user_id){
        $this->db->select('*');
		$this->db->from('schedule_list');
		$this->db->where('user_id',$user_id);
        $this->db->order_by('id','desc');        
		$query = $this->db->get();       
		return $query->result_array();
    } 

    public function save_time_booking($data){
        $this->db->insert('schedule_list',$data);
        return $this->db->insert_id(); 
    }
    
    public function delete_schedule($id){
        $query = $this->db->query("DELETE FROM schedule_list WHERE id= '".$id."'");
        return $this->db->affected_rows();
	}

    public function save_award($data){        
        $this->db->insert('award',$data);
        return $this->db->insert_id(); 
    }

    public function save_award_dtails($data){
        $this->db->insert_batch('award_details',$data);
        return $this->db->insert_id();
    }

    public function get_award_list_by_user($user_id){
        
        $this->db->select('aw.*,tbl_dogs.dog_name');
		$this->db->from('award aw');
        $this->db->join('tbl_dogs','tbl_dogs.dog_id = aw.dog_id','INNER');
		$this->db->where('aw.user_id',$user_id);
        $this->db->order_by('id','desc');
            
		$query = $this->db->get();       
		$response =  $query->result_array();       
        $result = [];
        foreach ($response as $row){
            $awardDetails = $this->get_award_details_by_awardId($row['id']);
            $result[] = array(
                'id'=>$row['id'],
                'user_id'=>$row['user_id'],
                'dog_id'=>$row['dog_id'],
                'dog_name'=>$row['dog_name'],
                'created_at'=>$row['created_at'],
                'awardDetails'=>$awardDetails
            );
        }

        return $result;       
    } 

    public function get_award_details_by_awardId($awardId){
        
        $this->db->select('*');
		$this->db->from('award_details');       
		$this->db->where('award_id',$awardId);
        $this->db->order_by('id','desc');               
		$query = $this->db->get();       
		return  $query->result_array();
    } 

    public function get_award_detail_by_awardId($id){
        $this->db->select('aw.*,tbl_dogs.dog_name');
		$this->db->from('award aw');
        $this->db->join('tbl_dogs','tbl_dogs.dog_id = aw.dog_id','INNER');
		$this->db->where('aw.id',$id);            
		$query = $this->db->get();       
		$response =  $query->row_array();   
        $awardDetails = $this->get_award_details_by_awardId($response['id']);
        $result = array(
            'id'=>$response['id'],
            'user_id'=>$response['user_id'],
            'dog_id'=>$response['dog_id'],
            'dog_name'=>$response['dog_name'],
            'created_at'=>$response['created_at'],
            'awardDetails'=>$awardDetails
        );
        

        return $result;  
    }

    public function delete_award($id){ 
        $this->delete_award_details($id);
        $this->db->where('id',$id);
        $this->db->delete('award');        
    }

    public function delete_award_details($award_id){
        $this->db->where('award_id',$award_id);
        $this->db->delete('award_details');
    }
    
    public function update_award($data,$id) { 
        
        $this->db->where('id',$id);
        $query=  $this->db->update('award',$data);       
        return $this->db->affected_rows();       
    } 

    public function update_award_details($data){

       
        foreach($data as $row){
           
            $rowData = array(
                'award_id'    =>$row['award_id'],
                'award_title' => $row['award_title'],
                'award_achived_date'=> $row['award_achived_date'],
                'registration_no' => $row['registration_no'],
                'club_name'   => $row['club_name'],
                'location'    => $row['location'],
                'photographer' => $row['photographer'],
                'mobile_no'   => $row['mobile_no'],
                'breed_judge' => $row['breed_judge'],
                'groop_judge' => $row['groop_judge'],
                'provisional' => $row['provisional'],
                'show_judges_name' => $row['show_judges_name'],
                'dog_handled_by' => $row['dog_handled_by'],
                'entry_of_dogs' => $row['entry_of_dogs'],
                'entry_of_bitches' => $row['entry_of_bitches'],
                'entry_of_bob' => $row['entry_of_bob'],
                'entry_nonregular' => $row['entry_nonregular'],
                'entry_major' => $row['entry_major'],
                'class_enterd' => $row['class_enterd'],
                'no_in_class' => $row['no_in_class'],
                'awards' => $row['awards'],
                'points' => $row['points'],
                'groups' => $row['groups'],
                'comments_judging' => $row['comments_judging'],
                'updated_at'  => $row['updated_at'],
            );
            $this->db->where('id',$row['id']);
            $this->db->where('award_id',$row['award_id']);
            $q = $this->db->get('award_details');

            if ( $q->num_rows() > 0 ) 
            {
                $this->db->where('id',$row['id']);
                $this->db->where('award_id',$row['award_id']);
                $this->db->update('award_details',$rowData);
            } else {
                $this->db->insert('award_details',$rowData);
                return $this->db->insert_id(); 
                
            }
        }
    }

    public function delete_award_details_by_id($id){ 
        $this->db->where('id',$id);
        $this->db->delete('award_details');
    } 
    
    public function before_three_days_notify_schedule($userID){       
        $query = $this->db->query("SELECT * FROM schedule_list 
        WHERE user_id = '$userID' 
        AND date(end_datetime) = CURDATE() + interval 7 day 
        OR date(end_datetime) = CURDATE() + interval 3 day 
        OR date(end_datetime) = CURDATE() + interval 1 day");         
		return  $query->result_array();       
    } 
    
    // not uses
    public function get_parent_with_child_data($user_id)
    {
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('user_id',$user_id);
        $this->db->where('parent_id','0');
        $this->db->where('mother_id','0');
        // $this->db->order_by('parent_id','asc');
		// $query = $this->db->query("SELECT main.*, (select dog_id from `tbl_dogs` as tbl1 where tbl1.dog_id=main.parent_id) as father_id, (select dog_id from `tbl_dogs` as tbl2 where tbl2.dog_id=main.mother_id) as MOTHERID 
        // FROM `tbl_dogs` as main WHERE main.user_id ='$user_id' ");
        //echo $this->db->last_query();die;
        $query = $this->db->get();  
		return $query->result_array();
    }

    public function get_child_data_by_parent_id($fatherId='',$motherId='')
    {   
        $this->db->select('dog_id,parent_id,mother_id,dog_name,gender,dog_img');
		$this->db->from('tbl_dogs');		
        $this->db->or_where('parent_id',$fatherId);
        $this->db->or_where('mother_id',$motherId);       
        $query = $this->db->get();  
       // echo $this->db->last_query();die;
		//return $query->result_array();
        return $query->first_row('array');
    }

    public function check_microchip_exist($microchip){
        $this->db->where('chip_number',$microchip);
        $query = $this->db->get('tbl_dogs');
        if ($query->num_rows() > 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function save_sire_dam($data){
        $this->db->insert('tbl_dogs',$data);
        return $this->db->insert_id(); 
    }

    function tesss(){
        echo "test";
    }

    /*
        Show module 
    */ 
    public function insert_show_data($data){        
        $this->db->where('user_id',$data['user_id']);
        $this->db->where('dog_id',$data['dog_id']);
        $q = $this->db->get('show_dog');
       
        if ($q->num_rows() > 0){           
            $result = $q->first_row('array'); 
            return $result['id'];
        }else{
            $this->db->insert('show_dog',$data);
            return $this->db->insert_id(); 
        }
    }

    public function insert_show_details($data){
        $this->db->insert_batch('show_dogdetails',$data);
        return $this->db->insert_id();
    }

    public function get_show_list_by_user($user_id){
        
        $this->db->select('sd.*,tbl_dogs.dog_name');
		$this->db->from('show_dog sd');
        $this->db->join('tbl_dogs','tbl_dogs.dog_id = sd.dog_id','INNER');
		$this->db->where('sd.user_id',$user_id);
        $this->db->order_by('id','desc');
            
		$query = $this->db->get();       
		$response =  $query->result_array();       
        $result = [];
        foreach ($response as $row){
            $showDetails = $this->get_show_details_by_show_id($row['id']);
            $result[] = array(
                'id'=>$row['id'],
                'user_id'=>$row['user_id'],
                'dog_id'=>$row['dog_id'],
                'dog_name'=>$row['dog_name'],
                'created_at'=>$row['created_date'],
                'showDetails'=>$showDetails
            );
        }
       
        return $result;       
    }
    
    public function get_show_details_by_show_id($show_id){
        $this->db->select('*');
        $this->db->from('show_dogdetails');       
        $this->db->where('show_dog_id',$show_id);
        $this->db->order_by('id','desc');               
        $query = $this->db->get();       
        return  $query->result_array();         
    }

    public function delete_show($id){ 
        $this->delete_show_details($id);
        $this->db->where('id',$id);
        $this->db->delete('show_dog');        
    }

    public function delete_show_details($show_id){
        $this->db->where('show_dog_id',$show_id);
        $this->db->delete('show_dogdetails');
    }

    public function get_show_with_details_by_id($id){
        $this->db->select('sd.*,tbl_dogs.dog_name');
		$this->db->from('show_dog sd');
        $this->db->join('tbl_dogs','tbl_dogs.dog_id = sd.dog_id','INNER');
		$this->db->where('sd.id',$id);            
		$query = $this->db->get();       
		$response =  $query->row_array();   
        $showDetails = $this->get_show_details_by_show_id($response['id']);
        $result = array(
            'id'=>$response['id'],
            'user_id'=>$response['user_id'],
            'dog_id'=>$response['dog_id'],
            'dog_name'=>$response['dog_name'],
            'created_at'=>$response['created_date'],
            'showDetails'=>$showDetails
        );
        return $result;  
    }

    public function update_show($data,$id) { 
        
        $this->db->where('id',$id);
        $query=  $this->db->update('show_dog',$data);       
        return $this->db->affected_rows();       
    } 

    public function update_show_details($data){
       
        foreach($data as $row){
           
            $rowData = array(
              
                    'show_dog_id' =>$row['show_dog_id'],
                    'show_location' =>$row['show_location'],
                    'club_name' => $row['club_name'],
                    'show_date' => $row['show_date'],
                    'entry_fee' => $row['entry_fee'],
                    'photographer' =>$row['photographer'],
                    'photographer_contact' => $row['photographer_contact'],
                    'superintendent' => $row['superintendent'],
                    'show_chair' => $row['show_chair'],
                    'show_chair_contact' => $row['show_chair_contact'],
                    'breed_judge' => $row['breed_judge'],
                    'breed_judge_provisinal' => $row['breed_judge_provisinal'],
                    'group_judge' => $row['group_judge'],
                    'group_judge_provosional' => $row['group_judge_provosional'],
                    'nohs_group_judge' => $row['nohs_group_judge'],
                    'nohs_group_judge_provosinal' => $row['nohs_group_judge_provosinal'],
                    'best_show_judge' => $row['best_show_judge'],
                    'nohs_best_show_judge' => $row['nohs_best_show_judge'],
                    'comments_show_grounds' => $row['comments_show_grounds'],
                    'dog_handledby' => $row['dog_handledby'],

                    'class_entered' => $row['class_entered'],

                    'entry_fee2section' => $row['entry_fee2section'],
                    'number_ofclass_dog' => $row['number_ofclass_dog'],
                    'number_of_class_bitches' => $row['number_of_class_bitches'],
                    'non_regular_entry' => $row['non_regular_entry'],
                    'bob_entries' => $row['bob_entries'],
                    'total_entry_showing_breed' => $row['total_entry_showing_breed'],
                    'major_entry' =>$row['major_entry'],
                    'first_award_received' => $row['first_award_received'],
                    'second_award_recived' => $row['second_award_recived'],
                    'third_award_recived' => $row['third_award_recived'],
                    'fourth_award_recived' =>$row['fourth_award_recived'],
                    'comments_judging' =>$row['comments_judging'],
                    'group_placement' => $row['group_placement'],
                    'group_points' => $row['group_points'],
                    'nohs_group_placement' => $row['nohs_group_placement'],
                    'nohs_group_points' => $row['nohs_group_points'],
                    'best_show_in3section' =>$row['best_show_in3section'],
                    'best_show_entry' => $row['best_show_entry'],
                    'reserved_best_show' =>$row['reserved_best_show'],
                    'nohs_best_show_3section' =>$row['nohs_best_show_3section'],
                    'nohs_show_entry_3section' =>$row['nohs_show_entry_3section'],
                    'nohs_reserved_bst_show' => $row['nohs_reserved_bst_show'],
                    'non_regular_group_3section' => $row['non_regular_group_3section'],
                    'group_judge_3section' => $row['group_judge_3section'],
                    'group_placement_3section' => $row['group_placement_3section'],
                    'non_regular_best_show_3section' => $row['non_regular_best_show_3section'],
                    'non_regular_best_show_judge_3section' =>$row['non_regular_best_show_judge_3section'],
                    'commenst_show_grounds_judging' =>$row['commenst_show_grounds_judging'],
            );
            $this->db->where('id',$row['id']);
            $this->db->where('show_dog_id',$row['show_dog_id']);
            $q = $this->db->get('show_dogdetails');

            if ( $q->num_rows() > 0 ) 
            {
                $this->db->where('id',$row['id']);
                $this->db->where('show_dog_id',$row['show_dog_id']);
                $this->db->update('show_dogdetails',$rowData);
            } else {
                $this->db->insert('show_dogdetails',$rowData);
                return $this->db->insert_id(); 
                
            }
        }
    }



    /*
    END SHOW MODULE FUNCTION 
    */ 
    
     /*
       START  HANDLERS MODULE
    */ 
    public function fetch_handler_expense_by_user($user_id){
        $this->db->select('*');
		$this->db->from('handlers_expense');
		$this->db->where('user_id',$user_id);
        $this->db->order_by('id','desc');        
		$query = $this->db->get();       
		return $query->result_array();
    } 

    public function insert_handler_expense($data){
        $this->db->insert('handlers_expense',$data);
        return $this->db->insert_id();
    } 

    public function delete_handler_expense($id){       
        $this->db->where('id',$id);
        $this->db->delete('handlers_expense');        
    }

    public function get_handler_expense_by_id($id){
        $this->db->select('*');
		$this->db->from('handlers_expense');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    public function update_handler_expense($data,$id) { 
        
        $this->db->where('id',$id);
        $query=  $this->db->update('handlers_expense',$data);       
        return $this->db->affected_rows();       
    } 

    public function get_handler_expense_invoice_id($id){
        $this->db->select('he.*,u.firstname,u.lastname,u.email,u.address,u.mobile,u.fullname');
		$this->db->from('handlers_expense he');
        $this->db->join('tbl_user u','u.user_id = he.user_id','LEFT');
		$this->db->where('he.id',$id);
		$query = $this->db->get();
       // echo $this->db->get();die;
		return $query->first_row('array');        
    }

    public function get_dog_name_by_id_arr($dodidArr){
        $dogs = explode(",",$dodidArr);
        //$dognamearr = array();
        foreach($dogs as $dog){
            $this->db->select('dog_name');
            $this->db->from('tbl_dogs');
            $this->db->where('dog_id',$dog);
            $query = $this->db->get();
            $dognamearr[] =  $query->first_row('array');
        }

       return  $dognamearr;
    }
    /*
    END HANDLERS MODULE
    */ 

    public function get_backgroud_banner_structure($bannerID) {
        $this->db->select('banner,id');
        $this->db->from('addvertisementbanner');		
        $this->db->where('id', $bannerID);
		$query = $this->db->get();      
		return $query->first_row('array');     
    }
}