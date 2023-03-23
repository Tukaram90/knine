<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function chk_user_login_with_multiple_system(){
    $CI = get_instance();
    $CI->load->model('user_model');   
    $res = $CI->user_model->get_user_profile($CI->session->userdata('u_user_id'));  
   
    if (!empty($res) && $res['is_login_session_id'] != $CI->session->userdata('session_id')) {
        $error = 'OOPS Logged another system!';				
        $CI->session->set_flashdata('error',$error);
        redirect(base_url().'user');
    }
}

function set_currency(){
    $ci =& get_instance();
    $ci->load->database();
    if($ci->session->userdata('currencySymbol')){
        $currency = $ci->session->userdata('currencySymbol');        
        $query = $ci->db->query("SELECT * FROM tbl_currency WHERE currency_symbol= '$currency' ");
        $result = $query->first_row('array');
         
        $currencyIcon = '<i class="'. $result['currency_icon'].'  collapseIcon "></i>';
    }else{
        $currencyIcon = '<i class="fa fa-rupee  collapseIcon " style="font-size:30px"></i><i class="fa fa-dollar" style="font-size:30px"></i><i class="fa fa-eur" style="font-size:30px"></i>';
    }

    return  $currencyIcon;
}

function total_expence_cost(){
    $CI = get_instance();
    $CI->load->model('user_model');   
    $res = $CI->user_model->get_total_expense_by_user($CI->session->userdata('u_user_id'));  
    $totalExpense = $res[0]['total_amount'];
    return  $totalExpense;
}

function save_user_adevrtise_files($file=null){
    $link= $file;
    $destdir = 'uploads/advertise'; 
    if( $link){
    $img=  file_get_contents($link);
    echo file_put_contents($destdir.substr($link, strrpos($link,'/')), $link);
    }
   
}

