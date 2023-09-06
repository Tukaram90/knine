<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
     
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Page title -->
      <title><?php echo $title .' | '.'K9-WIDGET' ?></title>     
      <link href="<?php echo base_url(); ?>webasset/css/bootstrap.css?<?= time() ?>" rel="stylesheet" type="text/css">
      <!-- Icon fonts -->
      <link href="<?php echo base_url(); ?>webasset/fonts/font-awesome/css/font-awesome.min.css?<?= time() ?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>webasset/fonts/flaticons/flaticon.css?<?= time() ?>" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url(); ?>webasset/fonts/glyphicons/bootstrap-glyphicons.css?<?= time() ?>" rel="stylesheet" type="text/css">
     
      <link href="https://fonts.googleapis.com/css?family=Lato:400,800" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
      <!-- Style CSS -->
      <link href="<?php echo base_url(); ?>webasset/css/style.css?<?= time() ?>" rel="stylesheet">
      <!-- Plugins CSS -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>webasset/css/plugins.css?<?= time() ?>">
      <!-- Color Style CSS -->
      <link href="<?php echo base_url(); ?>webasset/styles/maincolors.css?<?= time() ?>" rel="stylesheet">
	    <!-- LayerSlider CSS -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>webasset/vendor/layerslider/css/layerslider.css?<?= time() ?>">
      <link rel="stylesheet" href="<?php echo base_url(); ?>webasset/vendor/layerslider/skins/outline/skin.css?<?= time() ?>">
      <!-- Favicons-->      
      <link rel="shortcut icon" href="webasset/img/favicon.jpg" type="image/x-icon">
      <link rel="manifest" href="manifest.json">
      <style>
         @media only screen and (max-width: 768px) {
            #weblogo {
               width: 50%;
            }
         }
      </style>
   </head>
   <body id="page-top">
      <!-- Preloader -->
      <div id="preloader">
         <div class="spinner">
            <div class="bounce1"></div>
         </div>
      </div>
      <!-- Preloader ends -->
      <nav class="navbar navbar-custom navbar-fixed-top">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
               <i class="fa fa-bars"></i>
               </button>
               <div class="navbar-brand navbar-brand-centered page-scroll">
                  <a href="#page-top">
                     <!-- logo  -->
                     <img src="<?php echo base_url(); ?>webasset/img/logo.jpg" class="img-responsive" id="weblogo" alt="">
                  </a>
               </div>
            </div>
            
            <div class="collapse navbar-collapse" id="navbar-brand-centered">
               <ul class="nav navbar-nav">
                  <li class="<?php echo ($active=='home')?'active':''; ?>"><a href="<?php echo base_url(); ?>home">Home</a></li>
                  <li class="<?php echo ($active=='about')?'active':''; ?>"><a href="<?php echo base_url(); ?>about-us">About</a></li>                  
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="<?php echo ($active=='gallery')?'active':''; ?>"><a href="<?php echo base_url(); ?>gallery">Gallery</a></li>                 
                  <li class="<?php echo ($active=='contact')?'active':''; ?>"><a href="<?php echo base_url(); ?>contact-us">Contact</a></li>
                  <li class="dropdown <?php echo ($active=='user')?'active':''; ?>">
                     <?php if($this->session->userdata('is_user_logged_in')=='yes'){?>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user" style="color:white"></i><?php echo $this->session->userdata('ufullname'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                           <li ><a href="<?php echo base_url(); ?>logout">Logout</a></li>
                           <li ><a href="<?php echo base_url(); ?>user-dashboard">Dashboard</a></li>
                        </ul>
                     <?php }else{ ?>
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user" style="color:white"></i>Login<b class="caret"></b></a>
                     <ul class="dropdown-menu">                   
                           <li class="<?php echo ($active=='user')?'active':''; ?>"><a href="<?php echo base_url(); ?>user">Login</a></li>
                           <li class="<?php echo ($active=='userregister')?'active':''; ?>"><a href="<?php echo base_url(); ?>register-user">Register</a></li>
                        <?php } ?>
                     </ul>
                  </li>

               </ul>
            </div>            
         </div>        
      </nav>    