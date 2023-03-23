<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
    function check_duplicate_email($email) 
    {
       
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email',$email);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    public function registration($data) {
        $this->db->insert('tbl_user',$data);
        return $this->db->insert_id();
    }

    public function update_registration($data) { 
        $this->db->where('user_id',$data['user_id']);
        $this->db->update('tbl_user',$data);
        return $this->db->affected_rows();         
    } 

    function check_access($email, $password) 
	{
        $where = array(
            'email' => $email,
            'password' => md5($password),
            'status' => 'Active'
        );
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    public function get_user_profile($user_id)
    {
        $this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    public function update_profile($user_id, $data)
    {    $userID = trim($user_id);
        $this->db->where('user_id',$userID);
        $this->db->update('tbl_user',$data);       
        return $this->db->affected_rows();
    }


    public function google_user_exist($id){
        $this->db->where('login_oauth_uid',$id);
        $this->db->from('tbl_user');
        $query= $this->db->get();
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }         
    }

    public function updateGoogleUser($data,$id){
        $this->db->where('login_oauth_uid',$id);
        $this->db->update('tbl_user',$data);
        return $this->db->affected_rows();
    }

    public function createGoogleUser($userdata)
    {
        $this->db->insert('tbl_user',$userdata);
        return $this->db->insert_id();
    }

    public function getGoogleUserDetailsByOuthId($outhId)
    {
        $this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('login_oauth_uid',$outhId);
		$query = $this->db->get();
		return $query->first_row('array');
    }

   

    public function get_dog_info_by_user_id($user_id)
    {
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_dod_details_by_id($dog_id)
    {
        $this->db->select('*');
		$this->db->from('tbl_dogs');
		$this->db->where('dog_id',$dog_id);
		$query = $this->db->get();
		return $query->first_row('array');
    }

   

    public function check_old_password_exist($old_password,$user_id)
    {
        $this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('user_id',$user_id);
        $this->db->where('password',md5($old_password));
		$query = $this->db->get();
		return $query->first_row('array');
    }

    public function change_password($new_password,$user_id){
        $newPassword['password'] = md5($new_password);       
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user', $newPassword); 
        return $this->db->affected_rows();
    }

    function forget_password_check_email($email) 
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function update_token($email,$data) {
        $this->db->where('email',$email);
        $this->db->update('tbl_user',$data);
    }

    function reset_password_check_url($email,$token) 
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email', $email);
        $this->db->where('reset_token', $token);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function reset_password_update($email,$data) 
    {
        $this->db->where('email',$email);
        $this->db->update('tbl_user',$data);
    }

    function get_total_expense_by_user($user_id) {  
                
        $this->db->select('sum(amount) as total_amount');
		$this->db->from('dog_expense de');		
        $this->db->join('expense_category ec','ec.id = de.expense','INNER');
        $this->db->where('de.user_id',$user_id);       
		$query = $this->db->get();       
		return $query->result_array();
    }  
    
    public function get_all_records_task_priority_by_current_month($user_id,$data=null)
    {
        if(isset($data['monthyear']) && !empty($data['monthyear'])){
            
            $monthYearData = explode("-",$data['monthyear']);
            $this->db->select('sum(amount) as total_amount,title');        
            $this->db->where('MONTH(expense_added_date)', date($monthYearData['0']));
            $this->db->where('YEAR(expense_added_date)', date($monthYearData['1']));        
            $this->db->group_by('month(expense_added_date)');
            $this->db->group_by('year(expense_added_date)');
            $this->db->group_by('expense');
           
        }else{

            $this->db->select('sum(amount) as total_amount,title');        
            $this->db->where('MONTH(expense_added_date)', date('m'));
            $this->db->where('YEAR(expense_added_date)', date('Y'));
            $this->db->where('user_id',$user_id);         
            $this->db->group_by('month(expense_added_date)');
            $this->db->group_by('year(expense_added_date)');
            $this->db->group_by('expense');
        }
        $this->db->join('expense_category ec','ec.id = dog_expense.expense','INNER');
        $query = $this->db->get('dog_expense');
             
        return $query->result_array();            
    }

    public function get_all_expense_by_year($user_id,$data=null)
    {
        if(isset($data['year']) && !empty($data['year'])){
            $this->db->select('sum(amount) as total_amount,title');    
            $this->db->where('YEAR(expense_added_date)', date($data['year']));        
             $this->db->where('user_id',$user_id);         
            $this->db->group_by('month(expense_added_date)');
            $this->db->group_by('year(expense_added_date)');
            $this->db->group_by('expense');
        }else{
            $this->db->select('sum(amount) as total_amount,title');    
            $this->db->where('YEAR(expense_added_date)', date('Y'));        
             $this->db->where('user_id',$user_id);         
            $this->db->group_by('month(expense_added_date)');
            $this->db->group_by('year(expense_added_date)');
            $this->db->group_by('expense');
        }
        $this->db->join('expense_category ec','ec.id = dog_expense.expense','INNER');
        $query = $this->db->get('dog_expense');
        
        return $query->result_array();    
    }

    public function get_expence($user_id,$data=null){
       
        $this->db->select('sum(amount) as total_amount,title');

        if(isset($data['expense_cat']) && !empty($data['expense_cat'])){
            $this->db->where('expense', $data['expense_cat']); 
        } 
        if(isset($data['year']) && !empty($data['year'])){
            $this->db->where('YEAR(expense_added_date)', date($data['year'])); 
        } 
        if(isset($data['monthyear']) && !empty($data['monthyear'])){
            $monthYearData = explode("-",$data['monthyear']);           
            $this->db->where('MONTH(expense_added_date)', date($monthYearData['0']));
            $this->db->where('YEAR(expense_added_date)', date($monthYearData['1'])); 
        } 
        //$this->db->where('YEAR(expense_added_date)', date('Y'));        
        $this->db->where('user_id',$user_id);         
        //$this->db->group_by('month(expense_added_date)');
        //$this->db->group_by('year(expense_added_date)');
        $this->db->group_by('expense');
        $this->db->join('expense_category ec','ec.id = dog_expense.expense','INNER');
        $query = $this->db->get('dog_expense');
        //echo $this->db->last_query();die;
        return $query->result_array();
    }

    public function get_expence_by_category($filterData){
        $this->db->select('id as expence_cat_id,title as expenese_category');
		$this->db->from('expense_category');      
        $this->db->where('title',$filterData['title']);       
		$query = $this->db->get();             
		$result =  $query->first_row('array');
       
        if($result){
            $expence_cat_id = $result['expence_cat_id'];

            $this->db->select('expense_id,expense,amount,currency,expense_note,expense_added_date');
            $this->db->from('dog_expense');      
            $this->db->where('user_id',$filterData['user_id']);
            $this->db->where('expense',$expence_cat_id);
            if(isset($filterData['year']) && !empty($filterData['year'])){
                $this->db->where('YEAR(expense_added_date)', date($filterData['year'])); 
            } 
            if(isset($filterData['monthyear']) && !empty($filterData['monthyear'])){
                $monthYearData = explode("-",$filterData['monthyear']);           
                $this->db->where('MONTH(expense_added_date)', date($monthYearData['0']));
                $this->db->where('YEAR(expense_added_date)', date($monthYearData['1'])); 
            }          
            $query = $this->db->get();             
            return $query->result_array();            
        }
    }

    public function update_user_session_id($user_id,$sessionID){
        $data['is_login_session_id'] = $sessionID;
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user',$data);
        return $this->db->affected_rows();      
    }

    public function get_current_weekly_records_count($user_id){
        // $current_week = date('W');
        // $current_year = date('Y');
        // $this->db->select('sum(amount) as total_weekly_amount');
		// $this->db->from('dog_expense');	
        // $this->db->where('user_id',$user_id);   
        // $this->db->where("YEARWEEK(`expense_added_date`) = $current_year$current_week");    
		// $query = $this->db->get();     
        // echo $this->db->last_query();die;  
		// return $query->result_array();

        $sql = "SELECT sum(amount) as total_weekly_amount FROM dog_expense WHERE user_id = $user_id AND expense_added_date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
        $query = $this->db->query($sql);
       
       return $query->first_row('array');
    }

   

    
}