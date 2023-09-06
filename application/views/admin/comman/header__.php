<?php
if(!$this->session->userdata('user_id')) {
  redirect(base_url().'administrator');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo strtoupper($title); ?>| Dashboard</title>  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">   
    <a href="index2.html" class="logo">     
      <span class="logo-mini"><b>K</b>9</span>     
      <span class="logo-lg"><b>K</b>Nine</span>
    </a>

    <nav class="navbar navbar-static-top">     
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Welcome Admin</span>
            </a>
            <ul class="dropdown-menu">             
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  Admin
                  <small>Admin@gmail.com</small>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">   
    <section class="sidebar">
      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Welcome Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if($active == 'dashboard'){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="treeview <?php if($active == 'kennelType' || $active == 'addKennelType'){ echo 'active'; }else{echo"";}?> menu-open" >
          <a href="#">
            <i class="fa fa-edit"></i> <span>Master Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="">
            <li class="<?php if($active == 'kennelType'){ echo 'active'; }?>">
              <a href="<?php echo base_url();?>mastersetting/kennel_type_list"><i class="fa fa-circle-o"></i> Kennel Type</a>
            </li>            
          </ul>
        </li>

        <li class="<?php if($active == 'userlist'){ echo 'active'; }?>">
          <a  href="<?php echo base_url();?>user-list">
            <i class="fa fa-users"></i> <span>User List</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'fetchDogs' || $active == "KennelsDetails"){ echo 'active'; }?>">
          <a  href="<?php echo base_url();?>mastersetting/fetch_kennels_list">
            <i class="fa fa-paw"></i> <span>Kennel List</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'enquiry'){ echo 'active'; }?>">
          <a  href="<?php echo base_url();?>admin/enquiry_list">
            <i class="fa fa-user"></i> <span>Enquiry List</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'vaccination' || $active == "vaccination"){ echo 'active'; }?>">
          <a  href="<?php echo base_url();?>mastersetting/fetch_all_vacition">
            <i class="fa  fa-stethoscope"></i> <span>Vaccination List</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'subscriber' ){ echo 'active'; }?>">
          <a  href="<?php echo base_url();?>mastersetting/get_all_subscriber">
            <i class="fa  far fa-bell"></i> <span>Subscriber List</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'slider' || $active == 'add_slider' ){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>slider">
            <i class="fa fa-image"></i> <span>Slider</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'catgoryList' || $active == 'catadd'  || $active == 'edit_slider'  ){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>category/category_list">
            <i class="fa fa-image"></i> <span>Category Gallery</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'gallerylist' || $active == 'add_gallery'  || $active == 'edit_gallery'  ){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>gallery/gallery_list">
            <i class="fa fa-camera"></i> <span>Gallery</span>
            <span class="pull-right-container"></span>
          </a>
        </li> 
        
        <li class="<?php if($active == 'banner' || $active == 'add-banner' || $active == 'editbanner' ){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>banner">
            <i class="fa fa-image"></i> <span>Branding Banner</span> 
            <span class="pull-right-container"></span>
          </a>
        </li>
       </ul>
    </section>   
  </aside>