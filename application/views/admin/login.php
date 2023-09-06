<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in | KNine </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
      .error{
          color:#d33724;
      }
      .success{
        color:#00a65a;
      }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>home" target="_blank"><b>K9</b>Widget</a>
  </div> 
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php
        if($this->session->flashdata('error')) {
            echo '<div class="error">'.$this->session->flashdata('error').'</div>';
        }
        if($this->session->flashdata('success')) {
            echo '<div class="success">'.$this->session->flashdata('success').'</div>';
        }
    ?>
    <?php echo form_open(base_url().'login'); ?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email"  autocomplete="off" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password"  autocomplete="off" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       <div class="col-xs-4">
          <button type="submit" name="login-form" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
       
      </div>
     <?php echo form_close(); ?>
  </div> 
</div>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>