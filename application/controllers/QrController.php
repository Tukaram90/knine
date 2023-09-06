<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QrController extends CI_Controller {
    function __construct ()
	{	
		parent::__construct(); 
        $this->load->library('ciqrcode');
        $this->load->model('qr_model');
	}

    public function index()
	{	
        $data['active']  = 'qr';
        $data['title']   = 'Generate Qr Code';
        $this->load->view('admin/qr/qr-form',$data);
	}

    public function qrcodeGenerator ( )
	{
		$qrtext = $this->input->post('qrcode_text');
        
		if(!empty($qrtext)){
            
            $text = $qrtext;
            $tillOnly2wo0rds = substr($text, 0,20);
            $qr_image=rand().'.png';
            $enterdText = array(
                'user_typed_text' => $text,
                'changed_typed_text' => $qr_image
            );
            $res = $this->qr_model->save_text($enterdText);
            if($res){
               
               
                $params['data'] = $text; //filename
				$params['level'] = 'H';
				$params['size'] = 4;
				$params['savename'] = "uploads/qrimages/".$qr_image;
                $this->ciqrcode->generate($params);

                $success = 'Qr code gerenrated successfully';
                $this->session->set_flashdata('success',$success);
                redirect(base_url().'QrController/qrlist');
			
            }else{
               
                $this->session->set_flashdata('error','Something went wrong, Please try again!');
                redirect(base_url().'QrController');
            }
        }else{
               
                $this->session->set_flashdata('error','Please enter text!');
                redirect(base_url().'QrController');
        }
			
	}

    public function qrlist()
    { 
        
        $data['active']  = 'qrlist';
        $data['title']   = 'Qr Code List';
        $data['qrList']   = $this->qr_model->qr_list();      
		$this->load->view('admin/qr/qr-list',$data);
    }
    
    public function delete_qr($id){
        $data['rqRow'] = $this->qr_model->get_qr_by_id($id);       
        unlink('uploads/qrimages/'.$data['rqRow']['changed_typed_text']);
        $this->qr_model->delete_qr($id);
        $success = 'Qr code is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'QrController/qrlist');
    }

}