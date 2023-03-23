<?php $this->load->view('admin/comman/header'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>   
    <section class="content">     
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">All Active User</span>
              <span class="info-box-number"><?= $activeUser ?></span>
            </div>           
          </div>         
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">All Inactive User</span>
              <span class="info-box-number"><?= $inactiveUser ?></span>
            </div>           
          </div>         
        </div>  
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Kennels</span>
              <span class="info-box-number"><?= $kennelsCount ?><small></small></span>
            </div>           
          </div>         
        </div> 
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Enquirys</span>
              <span class="info-box-number"><?= $enquiryCount ?></span>
            </div>           
          </div>         
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa  far fa-bell"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Subscribers</span>
              <span class="info-box-number"><?= $subscriberCount ?></span>
            </div>           
          </div>         
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="fa fa-list-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">All Kennels Type</span>
              <span class="info-box-number"><?= $kennelTypesCount ?></span>
            </div>           
          </div>         
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">All Active User</span>
              <span class="info-box-number"><?= 0 ?></span>
            </div>           
          </div>         
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">All Active User</span>
              <span class="info-box-number"><?= 0 ?></span>
            </div>           
          </div>         
        </div>      
              
             
      </div>     
    </section>   
</div>  
<?php $this->load->view('admin/comman/footer'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('admin/comman/js'); ?>