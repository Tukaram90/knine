<?php
if(empty($this->session->userdata('is_user_logged_in'))) {
  redirect(base_url().'user');
}

echo chk_user_login_with_multiple_system();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo strtoupper($title); ?>| K9-WIDGET</title>  
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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom.css">

  <link href="<?php echo base_url(); ?>webasset/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
 
</head>
<body class="hold-transition lockscreen">
<div class="">

  <header class="main-header">   
    <a href="" class="logo colorChangeBg" >     
      <span class="logo-mini"><b>K</b>9</span>     
      <span class="logo-lg"><img src="<?php echo base_url(); ?>webasset/img/logo.jpg" class="img-responsive pull-left" id="weblogo" alt="k9 widget"></span>
      
    </a>

    <nav class="navbar navbar-static-top colorChangeBg" >     
     
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 

         <li class="messages-menu">
            <a href="<?php echo base_url() ?>home"   title="Website">
              <i class="fa fa-home"></i>             
            </a>            
          </li>
          <li class="messages-menu">
            <a href="<?php echo base_url() ?>home" class="dropdown-toggle"  title="Own Template">
              <i class="fa fa-tv"></i>             
            </a>            
          </li>

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="countNotify"></span>
            </a>
            <ul class="dropdown-menu">             
              <li>                
                <ul class="menu" id="notification-latest"></ul>
              </li>              
            </ul>
          </li>

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Welcome1</span> -->
              <i class="fa fa-sign-out" style="font-size:17px"></i> 
            </a>
            <ul class="dropdown-menu">             
              <li class="user-header colorChangeBg">
                <!-- <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                <?php if($this->session->userdata('is_google_user')=='yes'){ ?>
                  <img src="<?= $this->session->userdata('uprofilePicture') ?>" class="img-circle" alt="User Image" onerror="this.style.display='none'">
                <?php }elseif($this->session->userdata('is_google_user')=='no'){ ?>
                  <img src="<?php echo base_url(); ?>uploads/userprofile/<?= $this->session->userdata('uprofilePicture') ?>" class="img-circle" alt="User Image">
                <?php }elseif($this->session->userdata('ukennelLogo')){ ?>
                  <img src="<?php echo base_url(); ?>uploads/kennellogo/<?= $this->session->userdata('ukennelLogo') ?>" class="img-circle" alt="User Image">
                <?php }else{?>
                  <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <?php } ?>
                <p> 
                  <?php echo $this->session->userdata('ufullname'); ?>
                  <small><?php echo $this->session->userdata('uemail'); ?></small>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>user-profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
              
            </ul>
          </li>
                
        </ul>
      </div>
    </nav>
  </header>
  <style>
    .nav>li>a {
        color:#fff;
    }
  </style>
  