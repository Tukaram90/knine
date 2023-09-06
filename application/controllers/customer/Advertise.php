<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advertise extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->library('user_agent');   
        $this->load->model('banner_model');
    }

    public function index()
    {
        $data['active']  = 'Advertise';
        $data['title']   = 'Advertise'; 
        $data['bannerList'] = $this->banner_model->branding_list(); 
        $this->load->view('useradmin/advertise-view',$data);
    }

    public function checkaddress()
    {
        $localIP = getHostByName(getHostName());
      
        // Your code here!
        $address = 'pune'; // Address
        $apiKey = 'AIzaSyAnJJwT2xyo9R1vU-b6dE4Jlcv8zR2EbjY'; // Google maps now requires an API key.
        // Get JSON results from this request
        $geo = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey;
       
        $geo = json_decode($geo, true); // Convert the JSON to an array
        print_r($geo);die;
        if (isset($geo['status']) && ($geo['status'] == 'OK')) {
        $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
        $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
            echo "ok";
        }else{
            echo "some problem";
        }

    }
    
    public function save_advertise_files_in_folder(){
       
        $img = $_POST['img'];
        if($img){
        $userID = $this->session->userdata("u_user_id");
        $userDirectory = $this->createNewDirectoryForUser($userID);
        $folderPath = "uploads/advertise/".$userID."/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.png';
        // $file = $folderPath . uniqid() . $image_type;    
        file_put_contents($file, $image_base64);
        }
    }

    private function createNewDirectoryForUser($userID){
        $sDirPath ='uploads/advertise/'.$userID.'/';        
        if (!file_exists ($sDirPath)) {
            mkdir($sDirPath,0777,true);  
        }
    }

    public function downloaded_banner(){
        $data['active']  = 'History';
        $data['title']   = 'Downloded History'; 
        $userID = $this->session->userdata("u_user_id");
        $folderPath = "uploads/advertise/".$userID;       
        $images = glob($folderPath . "/*.png");
        $data['downlodedImgs'] = $images;        
        $this->load->view('useradmin/advertise-downloaded',$data);
    }

    
}
