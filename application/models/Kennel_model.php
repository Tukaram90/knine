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

    // 6/9/2022

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
}