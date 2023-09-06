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
  <link rel="stylesheet" href="https://unpkg.com/balloon-css/balloon.min.css"> <!-- for tooltips-->
  <style>
    .activeSubheading{
      color:#D81B60  !important;
      
    }
    
    /*.collapseIcon{*/
    /*   // margin-left:-25px !important;*/
    /*    font-size:30px;*/
    /*}*/
    .skin-blue .sidebar a {
      color: #3c8dbc;
    }

    @media screen and (min-width: 768px) {
      .dashscreenshowForMobile{
        display:none;
      }
    }
  </style> 
</head>
 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" >   
    <a href="" class="logo colorChangeBg" >     
      <span class="logo-mini"><b>K</b>9</span>     
      <span class="logo-lg"><img src="<?php echo base_url(); ?>webasset/img/logo.jpg" class="img-responsive pull-left"  alt="k9 Widget"></span>
    </a>

    <nav class="navbar navbar-static-top colorChangeBg" >     
      <a href="#" class="sidebar-toggle colorChangeBg" data-toggle="push-menu" role="button" >
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 

         <li class="messages-menu">
            <a href="<?php echo base_url() ?>home"   title="Website">
              <i class="fa fa-home"></i>             
            </a>            
          </li>
          <!--<li class="messages-menu">
            <a href="<?php echo base_url() ?>home" class="dropdown-toggle" target="_blank" title="Own Template">
              <i class="fa fa-tv"></i>             
            </a>            
          </li>-->

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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">   
    <section class="sidebar">
      
      <div class="user-panel">
        <div class="pull-left image">         
          <?php if($this->session->userdata('is_google_user')=='yes'){ ?>
            <img src="<?= $this->session->userdata('uprofilePicture') ?>" class="img-circle" alt="User Image" onerror="this.style.display='none'">
          <?php }elseif($this->session->userdata('is_google_user')=='no'){ ?>
            <img src="<?php echo base_url(); ?>uploads/userprofile/<?= $this->session->userdata('uprofilePicture') ?>" class="img-circle" alt="User Image">
          <?php }elseif($this->session->userdata('ukennelLogo')){ ?>
            <img src="<?php echo base_url(); ?>uploads/kennellogo/<?= $this->session->userdata('ukennelLogo') ?>" class="img-circle" alt="User Image">
          <?php }else{?>
            <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p>Welcome </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <ul class="sidebar-menu" data-widget="tree">
        <!--<li class="<?php if($active == 'userdashboard'){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>user-dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        
        <li class="<?php if($active == 'kennellist' || $active == 'addkennel' || $active == 'Hierarchical' || $active == 'treestructure'){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>kennel-list">
            <i class="fa fa-hand-o-right"></i> <span>Dog Details</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'expense' || $active=='addexpense'){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>expense-list">
            <i class="fa fa-rupee"></i> <span>Cost Management</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        
        <li class="<?php if($active == 'vaccinationList' || $active=='newVaccination'){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>vaccination-list">
            <i class="fa  fa-stethoscope"></i> <span>Vaccination Management</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php if($active == 'Advertise' ){ echo 'active'; }?>">
          <a href="<?php echo base_url();?>advertise">
            <i class="fa fa-image"></i> <span>Advertise Management</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        -->

        <div class="row">
          
        <li class="<?php if($active == 'userdashboard'){ echo 'active'; }?>">
         
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-dashboard collapseIcon"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Dashboard</span>
                  <a href="<?php echo base_url();?>user-dashboard" title="Dashboard" class="<?php if($active == 'userdashboard'){ echo 'activeSubheading'; } ?> dashscreenshowForMobile"><span class="info-box-text">Info</span></a>
                  <a href="<?php echo base_url();?>reports" title="Reports" class="<?php if($active == 'reports'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Reports</span></a>
                </div>           
              </div>         
            </div>
         
        </li> 
        
        <li class="<?php if($active == 'kennellist' || $active == 'addkennel' || $active == 'Hierarchical' || $active == 'treestructure'){ echo 'active'; }?>">
          
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="info-box">                
                <span class="info-box-icon bg-yellow"><i class="fa fa-hand-o-right collapseIcon"></i></span>                
                <div class="info-box-content" style="padding: 2px 10px !important;">
                  <span class="info-box-text">Dog Details</span>
                  <a href="<?php echo base_url();?>kennel-list" title="Dog Details" class="<?php if($active == 'kennellist' || $active == 'addkennel' || $active == 'Hierarchical' || $active == 'treestructure' || $active == 'EditDog'){ echo 'activeSubheading'; }?>"><span class="info-box-text">Add Dog</span></a>
                  <!--<a href="<?php echo base_url();?>kennel-list" title="Dog List" class="<?php if($active == 'kennellist'){echo 'activeSubheading'; }?>"><span class="info-box-text">List</span></a>-->
                  <a href="<?php echo base_url();?>shows" title="Book Event" class="<?php if($active == 'Show'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">CALENDAR</span></a>
                  <!--<a href="<?php echo base_url();?>award-list" title="SHOW RECORDS" class="<?php if($active == 'AwardList' || $active == 'addAward' || $active == 'EditAward' ){ echo 'activeSubheading'; } ?>"><span class="info-box-text">SHOW RECORDS</span></a>-->
                  <a href="<?php echo base_url();?>shows-list" title="Show" class="<?php if($active == 'showList' || $active == 'addShow' || $active == 'editShow' ){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Show RECORDS</span></a>
                  
                </div>           
              </div>         
            </div>
          
        </li>

        <li class="<?php if($active == 'expense' || $active=='addexpense'){ echo 'active'; }?>">          
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-purple"><?= set_currency() ?></span>
                <div class="info-box-content">
                  <span class="info-box-text">EXPENSE</span>                  
                   <a href="<?php echo base_url();?>expense-list" title="Expense Operation" class="<?php if($active=='addexpense' || $active == 'expense'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Add Expense</span></a>
                  <a href="<?php echo base_url();?>handler-expense" title="Handler Operation" class="<?php if($active=='addHandlerExpense' || $active == 'HandlerExpenseList' || $active == 'EditHandlerExpense'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Handler Expense</span></a>
                  <a href="<?php echo base_url();?>reports" ><span class="info-box-text">summary</span></a>
                  
                </div>           
              </div>         
            </div>        
        </li>
        
        <li class="<?php if($active == 'vaccinationList' || $active=='newVaccination'){ echo 'active'; }?>">          
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-maroon"><i class="fa  fa-stethoscope collapseIcon"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Vaccination</span>
                  <a href="<?php echo base_url();?>vaccination-list" title="Vaccination History" class="<?php if($active == 'GettingVaccination' || $active == 'newVaccination' || $active =='EditVaccination' || $active == 'DetailsVaccination' || $active == 'vaccinationList'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Add Vaccination</span></a>
                  <!--<a href="<?php echo base_url();?>vaccination-list" title="Vaccination History" class="<?php if($active == 'GettingVaccination' || $active == 'vaccinationList' ){ echo 'activeSubheading'; } ?>"><span class="info-box-text">List</span></a>-->
                </div>           
              </div>         
            </div>          
        </li>
        
        <li class="<?php if($active == 'Advertise' || $active == 'Pedigree' ){ echo 'active'; }?>">          
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green" style="height: 111px !important;"><i class="glyphicon glyphicon-picture collapseIcon" style="top: 13px"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Advertise</span>
                  <a href="<?php echo base_url();?>advertise" title="Advertise" class="<?php if($active == 'Advertise'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">create Ad</span></a>
                  <a href="<?php echo base_url();?>downloaded-banner" title="Downloaded History" class="<?php if($active == 'History'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Ads</span></a>
                   <a href="<?php echo base_url();?>pedigree" title="Pedigree" class="<?php if($active == 'Pedigree'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Pedigree</span></a>
                   <a href="<?php echo base_url();?>literacy" title="" class="<?php if($active == 'LiteracyStructure'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Litter Ad</span></a>
                </div>           
              </div>         
            </div>          
        </li>  
             
      </div>

       </ul>
    </section>   
  </aside>