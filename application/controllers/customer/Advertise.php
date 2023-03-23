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
        /*
        
        $image1="assets/dist/img/banner1.png";   // background img 
        $image2="assets/dist/img/123.jpg";   // source img
        
        list($width,$height) = getimagesize($image2);
       
        $image1 = imagecreatefromstring(file_get_contents($image1));
        $image2 = imagecreatefromstring(file_get_contents($image2));

        imagecopymerge($image1, $image2, 360, 360, 0, 0, $width, $height, 100);

        // first positon of => background img
        // second positiion => source img
        // source img from left side alignment which value is 100 or first value
        // second value from top position 
        // 3rd posiotin value taret to source img content so that value as 0 
        // 4 th value of bottom to top target of img content 0
        // $width = actual width size
        // $height = actual height of img 
        // last value img blur(dark,light dark,fent)

        header('content-type: image/png');
        imagepng($image1);  
        */
        
        
        /*
        $filename = 'assets/dist/img/fancy_name.png';
 
        $im_php = imagecreatefrompng($filename);
         
        $origin_color = imagecolorsforindex($im_php, imagecolorat($im_php, 0, 0));
         
        $dark_red = imagecolorallocate($im_php, 100, 0, 30);
         
        list($width, $height, $type, $attr) = getimagesize($filename);
         
         
        for($x = 0; $x <= $width - 1; $x++) {
            for($y = 0; $y <= $height - 1; $y++) {
         
                $index_color = imagecolorsforindex($im_php, imagecolorat($im_php, $x, $y));
         
                if($origin_color == $index_color) {
                    imagesetpixel($im_php, $x, $y, $dark_red);
                }
            }
        }
         
        imagepng($im_php,'assets/dist/img/fancy_name_changed.png');
        */

       


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
