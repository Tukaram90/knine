<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kennel extends CI_Controller {

    function __construct(){
		parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('mastersetting_model');
        $this->load->model('kennel_model');
    }

    public function kennel_list(){
        $data['active']  = 'kennellist';
        $data['title']   = 'kennel List'; 
        $data['dogListByUserDetails'] = $this->kennel_model->get_all_dogs_by_user_id();             
        $this->load->view('useradmin/kennel-list',$data);       
    }


    public function add_kennel()
    {
        $data['active']  = 'addkennel'; 
        $data['title']   = 'Add kennel'; 
        $data['dogType']   = $this->mastersetting_model->kennel_type_list();
        $data['FatherdogListByUser'] = $this->kennel_model->father_dog_list_by_userID();
        $data['MotherdogListByUser'] = $this->kennel_model->mother_dog_list_by_userID();
        $data['dogInfo'] = '';                    
        //$this->load->view('useradmin/kennel-add',$data);
        $this->load->view('useradmin/dog-add',$data);       
    }
    
    public function save_dog()
    {   
        
        if(isset($_POST['FinishForm'])){ 
            
            $dog_id = $this->input->post('dog_id', true);
            $parent_id = $this->input->post('dog_father_step2', true); 
            $enterdDOB = $this->security->xss_clean($this->input->post('dog_dob_step2', true));
            if(isset($enterdDOB) && !empty($enterdDOB)){
                $age =  date_diff(date_create($enterdDOB), date_create('today'))->y;
            }else{
                $age = '';
            }
           
            $form_data = array( 
                'dog_id'            => $dog_id ?? '', 
                'parent_id'         => $parent_id ?? '',  
                'mother_id'         => $this->security->xss_clean($this->input->post('dog_mother_step2', true)),  
                'title'             => $this->security->xss_clean($this->input->post('title_step1', true)),                
                'chip_number'       => $this->security->xss_clean($this->input->post('microchip_step1', true)),  
                'dog_name'          => $this->security->xss_clean($this->input->post('dogNameStep1', true)),
                'kennel_type_id'    => $this->security->xss_clean($this->input->post('dog_type_step1', true)),
                // 'color'             => $this->security->xss_clean($this->input->post('dog_color_step2', true)),
                // 'weight'            => $this->security->xss_clean($this->input->post('dog_weigth', true)),
                'gender'            => $this->security->xss_clean($this->input->post('dog_gender_step2', true)),
                'age'               => $age,
                'feature'           => $this->security->xss_clean($this->input->post('feature', true)),
                'description'       => $this->security->xss_clean($this->input->post('description', true)),
                'user_id'           => $this->session->userdata("u_user_id"),  
                'created_at'        => ($dog_id)?'':date('Y-m-d'),
                'update_at'        => ($dog_id)?date('Y-m-d'):"", 
                'date_of_birth'    => $this->security->xss_clean($this->input->post('dog_dob_step2', true)), 
                'date_of_death'    => $this->security->xss_clean($this->input->post('dog_dod_step2', true)),
                'breeder'             => $this->security->xss_clean($this->input->post('breeder', true)),
                'sire'            => $this->security->xss_clean($this->input->post('sire', true)), 
                'dam'             => $this->security->xss_clean($this->input->post('dam', true)),
                'first_owner'     => $this->security->xss_clean($this->input->post('first_owner', true)),
                'registration_no' => $this->security->xss_clean($this->input->post('registration', true)),             
            );   
            
           
            $response = $this->kennel_model->save_or_update_dog($form_data);
            if($dog_id){
            
                $data['dogInfo'] = $this->kennel_model->get_dog_info_by_dog_id($dog_id);
                $path = $_FILES['img']['name'];
                $path_tmp = $_FILES['img']['tmp_name'];
                if($path!='') {
                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                unlink('uploads/dogs/'.$data['dogInfo']['dog_img']);
                $final_name = 'DOGS-'.$dog_id.'.'.$ext;
                move_uploaded_file($path_tmp, 'uploads/dogs/'.$final_name);
                $saveImg=array(
                    'dog_img'    => $final_name,
                    'dog_id'     => $dog_id, 
                    'update_at'  => date('Y-m-d'),
                );
                $this->kennel_model->save_or_update_dog($saveImg);
                }
            
            }else{
                $path = $_FILES['img']['name'];
                $path_tmp = $_FILES['img']['tmp_name'];
                if($path!='') {
                    $ext = pathinfo( $path, PATHINFO_EXTENSION );
                    $file_name = basename( $path, '.' . $ext );
                
                    $final_name = 'DOGS-'.$response.'.'.$ext;
                    move_uploaded_file($path_tmp, 'uploads/dogs/'.$final_name);
                    $saveImg=array(
                        'dog_img'=> $final_name,
                        'dog_id'=>$response
                    );
                    $this->kennel_model->save_or_update_dog($saveImg);
                }
            }
           
            if($dog_id){               
        		$this->session->set_flashdata('success','Dog information updated successfully!');
            }else{
                $this->session->set_flashdata('success','Dog information saved successfully!');
            }
            redirect(base_url().'kennel-list');
        }
    }

    public function edit_dog($id)
    {  
        $data['active']  = 'EditDog'; 
        $data['title']   = 'Edit Dog'; 
        $data['dogType']   = $this->mastersetting_model->kennel_type_list();
        $data['FatherdogListByUser'] = $this->kennel_model->father_dog_list_by_userID();
        $data['MotherdogListByUser'] = $this->kennel_model->mother_dog_list_by_userID();
        $data['dogInfo'] = $this->kennel_model->get_dog_info_by_dog_id($id);
        $this->load->view('useradmin/dog-edit',$data);         
        // $this->load->view('useradmin/kennel-add',$data); 
    }

    public function delete_dog($id){
        $data['dogrow'] = $this->kennel_model->get_dog_info_by_dog_id($id);
        unlink('uploads/dogs/'.$data['dogrow']['dog_img']);
        $this->kennel_model->delete_dog($id);
        $success = 'Dog is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'kennel-list');
    }

    public function delete_temparay_dog($id){       
        $this->kennel_model->delete_temparay_dog($id);
        $success = 'Dog is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'kennel-list');
    }

    public function dog_tree_view($dog_id)
    {    
        $data = [];
        $data['active']  = 'Hierarchical'; 
        $data['title']   = 'Hierarchical Inheritance Dogs';        
        $data['dogInfo'] = $this->kennel_model->get_parent_dog_details_byID($dog_id);
       
        //$this->load->view('useradmin/kennel-details',$data);    
        $this->load->view('useradmin/kennel-highrarcy-structure',$data); 
    } 

    public function see_all_dog_details()
    {
        $data['active']  = 'treestructure'; 
        $data['title']   = 'Hierarchical Inheritance Dogs';
        $user_id = $this->session->userdata("u_user_id");
        $result = $this->kennel_model->get_dog_details_for_tree_strcuture($user_id);
        $menus = array(
            'items' => array(),
            'parents' => array()
        );
        foreach($result as $row){
            $menus['items'][$row['dog_id']] = $row;
            $menus['parents'][$row['parent_id']][] = $row['dog_id'];
        }
        $data['menu'] = $this->createTreeView(0, $menus);
       //$data['menu'] = $menus; 
        
        $this->load->view('useradmin/kennel-tree-strucutre',$data);
    }

    function createTreeView($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
           $html .= "
           <ol class='tree' >";
            foreach ($menu['parents'][$parent] as $itemId) {
               if(!isset($menu['parents'][$itemId])) {
                  $html .= "<li><label for='subfolder2' data-id='".$menu['items'][$itemId]['dog_id']."' class='getDetails'><a href='#'>".$menu['items'][$itemId]['dog_name']."</a></label> <input type='checkbox'  name='subfolder2'/></li>";
               }
               if(isset($menu['parents'][$itemId])) {
                  $html .= "
                  <li><label for='subfolder2' data-id='".$menu['items'][$itemId]['dog_id']."' class='getDetails'><a href='#'>".$menu['items'][$itemId]['dog_name']."</a></label> <input type='checkbox' name='subfolder2'/>";
                  $html .= $this->createTreeView($itemId, $menu);
                  $html .= "</li>";
               }
            }
            $html .= "</ol>";
        }
        return $html;
    }

    public function get_dog_details()
    {
        $dog_id =  $this->security->xss_clean($this->input->post('dog_id'));
        $result = $this->kennel_model->get_dog_info_by_dog_id($dog_id);
        if($result){
            $array = array(
                'status'=>true,
                'msg'=>"Data Found",
                'data'=>$result
            );           
         
        }else{
         $array = array(
             'status'=>false,
             'msg'=>"Please somthing went wrong,Please try again!",
             'data'=>'not found'
         );
        
        }
        echo json_encode($array);
    }

    public function expense_list() {
        $data['active']  = 'expense';
        $data['title']   = 'Expense List';
        $user_id = $this->session->userdata("u_user_id");
        $data['expenceCategory']   = $this->mastersetting_model->expense_category_list();
        $filterArr = array(
            'startDate'=>'',
            'end_date'=>'',
            'expense_cat'=>'',
        );
        
        if(isset($_POST['filter-cost-form'])){
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $ExpenseCat = $_POST['expense_cat'];
            $filterArr = array(
                'startDate'=>$startDate,
                'end_date'=>$endDate,
                'expense_cat'=>$ExpenseCat,
            );
            if($startDate){
                $data['selectedStartDate'] =  $startDate;
            }else{
                $data['selectedStartDate'] =  '';
            }

            if($endDate){
                $data['selectedEndDate'] =  $endDate;
            }else{
                $data['selectedEndDate'] =  '';
            }

            if($ExpenseCat){
                $data['selectedExpence'] =  $ExpenseCat;
            }else{
                $data['selectedExpence'] =  '';
            }

            
            $data['expenseList'] = $this->kennel_model->get_expense_list_by_user_id($user_id, $filterArr); 
        }else{  
            $data['selectedStartDate'] = '';     
            $data['selectedEndDate'] =  '';
            $data['selectedExpence'] =  '';
            $data['expenseList'] = $this->kennel_model->get_expense_list_by_user_id($user_id, $filterArr);      
        }   
        $this->load->view('useradmin/expense-list',$data);   
    }

    public function add_expense($id=null)
    {
        $data['active']  = 'addexpense';
        $data['title']   = 'Add Expense';
        $data['expenceCategory']   = $this->mastersetting_model->expense_category_list();
        $data['dogListByUserDetails'] =  $this->kennel_model->get_all_dogs_by_user_id();
        
        if($id){
          $response =  $this->kennel_model->get_expense_by_expense_id($id);
          
        
          if (is_numeric($response['dog_id'])) {
            $data['allopt'] =  '';
          }else{
            $data['allopt'] =  'yes';
          }
          $data['expense'] =  $response;
        }else{
            $data['expense'] ='';
            $data['allopt'] =  '';
        }
       
        if(isset($_POST['add-expense-form'])){
            $expense_id = $this->input->post('expense_id');
            $dogId = $this->input->post("dog_id");
            if($dogId=='all'){
               $res = $this->kennel_model->get_all_dogs_by_user_id();
               $dogID = array();
                foreach($res as $row){
                
                    $dogID []= array(
                        $row['dog_id'],                
                    );
                }
                $result = [];
                array_walk_recursive($dogID, function($v) use (&$result) {
                    $result[] = $v;
                });
                $dogId =  implode(',', $result);
            }
            $expenseData = array(
                'expense_id' => $expense_id ?? '',
                'user_id' => $this->session->userdata("u_user_id"), 
                'expense' => $this->input->post("expense_cat"),
                'expense_note' => $this->input->post("expense_note"),
                'dog_id' => $dogId,
                'amount' => $this->input->post("expense_amount"),
                'currency' => $this->input->post("currency"),
                'expense_added_date' => $this->input->post("expense_date"),
                'created_at' => ($expense_id)?'':date('Y-m-d'),
                'updated_at' => ($expense_id)?date('Y-m-d'):'',
            );
           
            $this->kennel_model->add_or_update_expense($expenseData);
            $success = 'Expense is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'expense-list');
        }
       
        $this->load->view('useradmin/expense-add',$data); 
    }

    public function delete_expense($id){
        $this->kennel_model->delete_expense($id);
        $success = 'Expense is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'expense-list');
    }

    public function add_new_user_expense_category()
    {
        $newExpenceCategory =  $_POST['newExpenceCategory'];        
        $result = $this->kennel_model->save_new_expence_category($newExpenceCategory);
        if($result){
            $array = array(
                'status'=>true,
                'msg'=>"Your expense category submited successfully!",
                'data'=>$result
            );           
         
        }else{
         $array = array(
             'status'=>false,
             'msg'=>"Duplicate entry,Please try again!",
             
         );        
        }
        echo json_encode($array);
    }
   
    public function calendar(){
       
        $data['active']  = 'Calendar';
        $data['title']   = 'Calendar';          
        $this->load->view('useradmin/calendar-view',$data);
    }

    public function add_event(){
        $title = $this->input->post('title');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $formData=array(
            'title'=>$title,
            'start'=>$start,
            'end'=>$end,
            'user_id' => $this->session->userdata("u_user_id"),
        );
        $this->kennel_model->save_event($formData);       
    }

    public function fetch_event(){        
        $user_id = $this->session->userdata("u_user_id");
        $response = $this->kennel_model->fetch_event_byuserid($user_id);       
        echo json_encode($response);
    }

    public function edit_event(){
        $title = $this->input->post('title');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $id = $this->input->post('id');
        $updatedData=array(
            'title'=>$title,
            'start'=>$start,
            'end'=>$end,            
        );
        $this->kennel_model->update_event($updatedData,$id);       
    }

    public function delete_event(){
        $id = $_POST['id'];
        $this->kennel_model->delete_event($id);        
    }

    public function shows(){
       
        $data['active']  = 'Show';
        $data['title']   = 'Show';
        $user_id = $this->session->userdata("u_user_id");
        $res = $this->kennel_model->fetch_all_schedule($user_id);
        $sched_res = [];
        foreach($res as $row){
            $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
            $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
            $sched_res[$row['id']] = $row;
        }  
        $data['sched_res'] =  $sched_res;         
        $this->load->view('useradmin/event-view',$data);
    }

    public function add_shows(){
       
        $showForm = array(
            'user_id' => $this->session->userdata("u_user_id"),
            'title' => trim($this->input->post('title')),
            'description' => trim($this->input->post('description')),
            'start_datetime' => trim($this->input->post('start_datetime')),
            'end_datetime' => trim($this->input->post('end_datetime')),
        );
        $result = $this->kennel_model->save_time_booking($showForm);

        if($result){
            die(json_encode(array("success"=>"true","msg"=>"Added Succeffully.")));
		}
		else{
            die(json_encode(array("success"=>"false","msg"=>"Please try again.")));
		}
    }

   
    public function delete_schedule(){
		$id = $_POST["id"];
		$response   = $this->kennel_model->delete_schedule($id);
		if($response>0){
			die(json_encode(array("success"=>"true","msg"=>"Deleted Succeffully.")));
		}
		else{
			die(json_encode(array("success"=>"false","msg"=>"Please try again.")));
		}
	} 

    public function award_list() {
        $data['active']  = 'AwardList';
        $data['title']   = 'Award List';
        $user_id = $this->session->userdata("u_user_id");
        $data['awardList'] = $this->kennel_model->get_award_list_by_user($user_id);
        $this->load->view('useradmin/award-list',$data);      
    }  
    
    public function add_award(){
        $data['active']  = 'addAward';
        $data['title']   = 'Add Award';
        $data['dogListByUserDetails'] = $this->kennel_model->get_all_dogs_by_user_id();
        if(isset($_POST['add-award-form'])){ 

            $awardData = array(
                'user_id' => $this->session->userdata("u_user_id"),
                'dog_id' => trim($this->input->post('dog_id')),
                'created_at' => date('Y-m-d'),
            );
            $award_id = $this->kennel_model->save_award($awardData);

            $awardTitle = $this->input->post('awardTitle');
            $awardForm = [];       

            for($i = 0; $i < count($awardTitle); $i++) {
                $awardDetails[] = array(
                    // 'user_id' => $this->session->userdata("u_user_id"),
                    // 'dog_id' => trim($this->input->post('dog_id')),
                    'award_id' =>$award_id,
                    'award_title' => $awardTitle[$i],
                    'award_achived_date' => $this->input->post('award_date')[$i],
                    'registration_no' => $this->input->post('registration')[$i],
                    'club_name' => $this->input->post('club_name')[$i],
                    'location' => $this->input->post('location')[$i],
                    'photographer' => $this->input->post('photographer')[$i],
                    'mobile_no' => $this->input->post('mobile')[$i],
                    'breed_judge' => $this->input->post('breed_judge')[$i],
                    'groop_judge' => $this->input->post('group_judge')[$i],
                    'provisional' => $this->input->post('provisional')[$i],

                    'dog_handled_by' => $this->input->post('dog_handeled_by')[$i],
                    'entry_of_dogs' => $this->input->post('entry_of_dogs')[$i],
                    'entry_of_bitches' => $this->input->post('entry_of_bitches')[$i],
                    'entry_of_bob' => $this->input->post('entry_of_bob')[$i],
                    'entry_nonregular' => $this->input->post('entry_of_non_regular')[$i],
                    'entry_major' => $this->input->post('entry_of_major')[$i],
                    'class_enterd' => $this->input->post('class_enterd')[$i],
                    'no_in_class' => $this->input->post('no_in_class')[$i],
                    'awards' => $this->input->post('awards')[$i],
                    'points' => $this->input->post('points')[$i],
                    'groups' => $this->input->post('group')[$i],
                    'comments_judging' => $this->input->post('comments_judging')[$i],
                    'created_at' => date('Y-m-d'),                    
                );
            }
            $this->kennel_model->save_award_dtails($awardDetails);
            $success = 'Award Details is saved successfully!';
            $this->session->set_flashdata('success',$success);
            redirect(base_url().'award-list');
        }
        $this->load->view('useradmin/award-add',$data); 
    } 

    public function delete_award($id){
        $this->kennel_model->delete_award($id);
        $success = 'Award Data is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'award-list');
    }

    public function edit_award($id){
        $data['active']  = 'EditAward';
        $data['title']   = 'Edit Award';
        $data['dogListByUserDetails'] = $this->kennel_model->get_all_dogs_by_user_id();
        $data['AwardDetail'] = $this->kennel_model->get_award_detail_by_awardId($id);

        if(isset($_POST['edit-award-form'])){
           
            $awardId = trim($this->input->post('awardId'));
            $updateAwardData = array(               
                'user_id' => $this->session->userdata("u_user_id"),
                'dog_id' => trim($this->input->post('dog_id')),
                'updated_at' => date('Y-m-d'),
            );
           
            $this->kennel_model->update_award($updateAwardData, $awardId);
           
               
                $awardTitle = $this->input->post('awardTitle');
                $awardDetails = []; 
                for($i = 0; $i < count($awardTitle); $i++) {
                    $awardDetails[] = array(
                        // 'user_id' => $this->session->userdata("u_user_id"),
                        // 'dog_id' => trim($this->input->post('dog_id')),
                        'id'        => $this->input->post('awardDetailsId')[$i],
                        'award_id'  =>$awardId,
                        'award_title' => $awardTitle[$i],
                        'award_achived_date' => $this->input->post('award_date')[$i],
                        'registration_no' => $this->input->post('registration')[$i],
                        'club_name' => $this->input->post('club_name')[$i],
                        'location' => $this->input->post('location')[$i],
                        'photographer' => $this->input->post('photographer')[$i],
                        'mobile_no' => $this->input->post('mobile')[$i],
                        'breed_judge' => $this->input->post('breed_judge')[$i],
                        'groop_judge' => $this->input->post('group_judge')[$i],
                        'provisional' => $this->input->post('provisional')[$i],

                        'dog_handled_by' => $this->input->post('dog_handeled_by')[$i],
                        'entry_of_dogs' => $this->input->post('entry_of_dogs')[$i],
                        'entry_of_bitches' => $this->input->post('entry_of_bitches')[$i],
                        'entry_of_bob' => $this->input->post('entry_of_bob')[$i],
                        'entry_nonregular' => $this->input->post('entry_of_non_regular')[$i],
                        'entry_major' => $this->input->post('entry_of_major')[$i],
                        'class_enterd' => $this->input->post('class_enterd')[$i],
                        'no_in_class' => $this->input->post('no_in_class')[$i],
                        'awards' => $this->input->post('awards')[$i],
                        'points' => $this->input->post('points')[$i],
                        'groups' => $this->input->post('group')[$i],
                        'comments_judging' => $this->input->post('comments_judging')[$i],
                        'updated_at' => date('Y-m-d'),                    
                    );                  
                    
                }
               
                $this->kennel_model->update_award_details($awardDetails);
                $success = 'Award Details is updated successfully!';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'award-list');
            
        }
        $this->load->view('useradmin/award-edit',$data);
    }

    public function delete_award_details(){
        $id = $_POST['id'];       
        $this->kennel_model->delete_award_details_by_id($id);        
    }
    
    public function set_notification(){
        $userID = $this->session->userdata("u_user_id");
        $result = $this->kennel_model->before_three_days_notify_schedule($userID); 
        $response='';
        $totalNotification = count($result);
        foreach($result as $row){
            $response = $response . "<li>" .
            "<a href='#'>".                          
                "<h4> <i class='fa fa-eye text-yellow'></i> " . ucfirst($row["title"])  . "</h4>" .
                "<h6>" . ucfirst($row["description"])  . "</h6>" .
            "</a>" .            
            "</li>";
        }        

        if(!empty($response)){
			die(json_encode(array("success"=>"true","msg"=>"Data Found","list"=>$response,"count"=>$totalNotification)));
		}
		else{
			die(json_encode(array("success"=>"false","msg"=>"Please try again.","list"=>"No data","count"=>'')));
		}
    }

    public function tree_structure(){
        $data['active']  = 'structure';
        $data['title']   = 'structure List';
        $user_id = $this->session->userdata("u_user_id");
        $result = $this->kennel_model->get_parent_with_child_data($user_id);        
        //$data['family'] = $this->createNode($parentArr);       
        //$this->load->view('useradmin/family-tree-structure',$data);
        $family_tree = $this->getFamilyTree();
      
        $this->load->view('useradmin/tree-structure',$data);        
    }

    public function getFamilyTree($parent_id = 0,$level = 0) {
        $result = array();
        $this->db->where('parent_id', $parent_id);
        //$this->db->where('mother_id', $mother_id);
        $query = $this->db->get('tbl_dogs');
       if($level == 2){
        return false;
       }
       //echo"<pre>";print_r($query->result());die;
        foreach($query->result() as $row) {                      
            $result[] = $row;
            $result = array_merge($result, $this->getFamilyTree($row->dog_id, $level + 1));
        }
       
        return $result;
    }

    function membersTree($parentID){
        $response = $this->kennel_model->get_child_data_by_parent_id($parentID);
        $dataRow= array();
        $childArr = array();
        foreach($response as $row){
            $id = $row['dog_id'];
            $dataRow[$id]['dog_id'] = $row['dog_id'];
            $dataRow[$id]['dog_name'] = $row['dog_name'];
            $dataRow[$id]['dog_img'] = $row['dog_img'];
            $dataRow[$id]['children'] = array_values($this->membersTree($row['dog_id']));
           
        }
        return $dataRow;
    }

    public function createNode($arrPedigree)
    {   
        if (is_array($arrPedigree)) {
            $heredoc = '';
            foreach ($arrPedigree as $nodeKey => $nodeValue) {
                $baseURL = trim(base_url().'uploads/dogs/'.$arrPedigree[$nodeKey]['dog_img']);
                $cntChild = @count($arrPedigree[$nodeKey]['children']);
               
                $heredoc.= "<td valign='top' align='center'>
                                <table width='100' border='0' align='center' cellpadding='0' cellspacing='2' >
                                    <tr valign='top'  align='center'>
                                        <td align='center' width='100%' colspan='{$cntChild}' valign='top'>
                                            <table style='cursor:pointer' width='150' height='100%' border='0' align='center' cellpadding='0' cellspacing='5' class='pedigree_node'>
                                                <tr>
                                                    <td align='center' valign='middle' width='100%' >
                                                      <img src='$baseURL' alt='{$arrPedigree[$nodeKey]['dog_name']}' style='width:50px'/>
                                                        <strong>{$arrPedigree[$nodeKey]['dog_name']}</strong>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>";
                
                if ($cntChild != 0) {
                    if ($cntChild == 1) {
                        $heredoc.= "<tr><td class='tree_vertical_line' height='20'>&nbsp;</td></tr>";
                    } else {
                        $heredoc.= "<tr><td class='tree_vertical_line' height='20' colspan='{$cntChild}'>&nbsp;</td></tr><tr>";
                        for ($i = 1; $i <= $cntChild; $i++) {
                            if ($i == 1) {
                                $className1 = '';
                            } else {
                                $className1 = 'tree_right_top_line';
                            }

                            if ($i == $cntChild) {
                                $className2 = '';
                            } else {
                                $className2 = 'tree_left_top_line';
                            }
                            $heredoc.= "<td height='20'>
                                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                <tr>
                                                    <td width='50%' class='{$className1}'>&nbsp;</td>
                                                    <td width='50%' class='{$className2}'>&nbsp;</td>
                                                </tr>
                                            </table>
                                            </td>";
                        }
                        $heredoc.= '</tr>';
                    }
                    $heredoc.= $this->createNode($arrPedigree[$nodeKey]['children']);
                }
                $heredoc.= '</table></td>';
            }
            return $heredoc;
        }
    }

    public function check_unique_microchip(){
        if(isset($_POST['microchip_step1']) && !empty($_POST['microchip_step1'])){
            $microchip =  $_POST['microchip_step1'];
        }else{
            $microchip =  $_POST['microChipDamSire'];
        }
       
        $response = $this->kennel_model->check_microchip_exist($microchip);
        if($response){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    public function entry_dog()
    {   
        
        if(isset($_POST['add-dog-form'])){ 
            
            $dog_id = $this->input->post('dog_id', true);
            $parent_id = $this->input->post('dog_father_step2', true); 
            $enterdDOB = $this->security->xss_clean($this->input->post('dog_dob_step2', true));
            if(isset($enterdDOB) && !empty($enterdDOB)){
                $age =  date_diff(date_create($enterdDOB), date_create('today'))->y;
            }else{
                $age = '';
            }
           
            $form_data = array( 
                'dog_id'            => $dog_id ?? '', 
                // 'parent_id'         => $parent_id ?? '',  
                // 'mother_id'         => $this->security->xss_clean($this->input->post('dog_mother_step2', true)),  
                //'title'             => $this->security->xss_clean($this->input->post('title_step1', true)),                
                'chip_number'       => $this->security->xss_clean($this->input->post('microchip_step1', true)),  
                'dog_name'          => $this->security->xss_clean($this->input->post('dogNameStep1', true)),
                'kennel_type_id'    => $this->security->xss_clean($this->input->post('dog_type_step1', true)),
                // 'color'             => $this->security->xss_clean($this->input->post('dog_color_step2', true)),
                // 'weight'            => $this->security->xss_clean($this->input->post('dog_weigth', true)),
                'gender'            => $this->security->xss_clean($this->input->post('dog_gender_step2', true)),
                'age'               => $age,
                'feature'           => $this->security->xss_clean($this->input->post('feature', true)),
                'description'       => $this->security->xss_clean($this->input->post('description', true)),
                'user_id'           => $this->session->userdata("u_user_id"),  
                'created_at'        => ($dog_id)?'':date('Y-m-d'),
                'update_at'        => ($dog_id)?date('Y-m-d'):"", 
                'date_of_birth'    => $this->security->xss_clean($this->input->post('dog_dob_step2', true)), 
                'date_of_death'    => $this->security->xss_clean($this->input->post('dog_dod_step2', true)),
                'breeder'             => $this->security->xss_clean($this->input->post('breeder', true)),
                'parent_id'            => $parent_id ?? '', 
                'mother_id'             => $this->security->xss_clean($this->input->post('dog_mother_step2', true)),
                'first_owner'     => $this->security->xss_clean($this->input->post('first_owner', true)),
                'registration_no' => $this->security->xss_clean($this->input->post('registration', true)),             
            );   
            
           
            $response = $this->kennel_model->save_or_update_dog($form_data);
            if($dog_id){
            
                $data['dogInfo'] = $this->kennel_model->get_dog_info_by_dog_id($dog_id);
                $path = $_FILES['img']['name'];
                $path_tmp = $_FILES['img']['tmp_name'];
                if($path!='') {
                $ext = pathinfo( $path, PATHINFO_EXTENSION );
                $file_name = basename( $path, '.' . $ext );
                unlink('uploads/dogs/'.$data['dogInfo']['dog_img']);
                $final_name = 'DOGS-'.$dog_id.'.'.$ext;
                move_uploaded_file($path_tmp, 'uploads/dogs/'.$final_name);
                $saveImg=array(
                    'dog_img'    => $final_name,
                    'dog_id'     => $dog_id, 
                    'update_at'  => date('Y-m-d'),
                );
                $this->kennel_model->save_or_update_dog($saveImg);
                }
            
            }else{
                $path = $_FILES['img']['name'];
                $path_tmp = $_FILES['img']['tmp_name'];
                if($path!='') {
                    $ext = pathinfo( $path, PATHINFO_EXTENSION );
                    $file_name = basename( $path, '.' . $ext );
                
                    $final_name = 'DOGS-'.$response.'.'.$ext;
                    move_uploaded_file($path_tmp, 'uploads/dogs/'.$final_name);
                    $saveImg=array(
                        'dog_img'=> $final_name,
                        'dog_id'=>$response
                    );
                    $this->kennel_model->save_or_update_dog($saveImg);
                }
            }
           
            if($dog_id){               
        		$this->session->set_flashdata('success','Dog information updated successfully!');
            }else{
                $this->session->set_flashdata('success','Dog information saved successfully!');
            }
            redirect(base_url().'kennel-list');
        }
    }

    public function save_sire_dam(){
        $dogName = $this->input->post('sireDamName');
        $microChipDamSire = $this->input->post('dogMicrochip');
        $isItSireDam = $this->input->post('sireDam');
        $gender = ($isItSireDam=='Sire')?'male':'female'; 
        $formData = array(
            'chip_number'=>$microChipDamSire,
            'dog_name'=>$dogName,
            'gender'=> $gender,
            'user_id' => $this->session->userdata("u_user_id"),   
        );       
        $result = $this->kennel_model->save_sire_dam($formData);
        if($result){
			die(json_encode(array("success"=>"true","msg"=>"$isItSireDam Added Succeffully.",'status'=>true)));
		}else{
			die(json_encode(array("success"=>"false","msg"=>"Please try again.",'status'=>false,)));
		}

    }

}