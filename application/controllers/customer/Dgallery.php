<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dgallery extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->library('user_agent');  
        // img related  
        $this->load->model('banner_model');
    }

    public function dog_gallery($id){
        $data['active']  = 'dogGallery';
        $data['title']   = 'Dog Gallery';
        $data['dog_id'] = $id; 
        $user_id = $this->session->userdata("u_user_id");
        $data['galleryData'] = $this->banner_model->get_gallery_photo_by_dog_id_user_id($id,$user_id);        
        $this->load->view('useradmin/gallery-dog',$data);
    }

    public function save_photo(){
        if(isset($_POST['add-gallery'])){
            $dataInfo = [];
            $this->load->library('upload');
            $files = $_FILES;
            if (!empty($_FILES['imageUpload']['name'][0])) {
                $cpt = count($_FILES['imageUpload']['name']);
                $dog_id = $this->input->post('dog_id');
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['imageUpload']['name'] = $files['imageUpload']['name'][$i];
                    $_FILES['imageUpload']['type'] = $files['imageUpload']['type'][$i];
                    $_FILES['imageUpload']['tmp_name'] = $files['imageUpload']['tmp_name'][$i];
                    $_FILES['imageUpload']['error'] = $files['imageUpload']['error'][$i];
                    $_FILES['imageUpload']['size'] = $files['imageUpload']['size'][$i];
                    $_FILES['encrypt_name'] = TRUE;
                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload('imageUpload');
                    $dataInfo[] = $this->upload->data();
                    $image_url = "uploads/doggallery/" . $dataInfo[$i]['file_name'];
                    $imgName = $dataInfo[$i]['file_name'];
                    $imagedata = [
                       
                        'dog_id' => $dog_id,
                        'user_id' => $this->session->userdata("u_user_id"),
                        'image_url' => $image_url,
                        'img_name' => $imgName,                       
                    ];
                    $result2 = $this->banner_model->image_entry($imagedata);
                }
               
                $this->session->set_userdata(array('message' => 'successfully added'));
                redirect(base_url().'dog-gallery/'.$dog_id);   
            }
            
        }
    }

    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'uploads/doggallery/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = TRUE;

        return $config;
    }
}