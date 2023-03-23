<?php $this->load->view('useradmin/comman/userheader'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Profile        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>  
    <section class="content">

      <div class="row">
        <div class="col-md-3">         
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if($profile['profile_picture']){ ?>
                  <img src="<?php echo base_url(); ?>uploads/userprofile/<?php echo $profile['profile_picture']; ?>" alt="User Photo" class="profile-user-img img-responsive img-circle" alt="User profile picture">
              <?php }else{ ?>
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>uploads/userprofile/placeholder.jpg" alt="User profile picture">
              <?php } ?>  

              <p class="text-muted text-center"><?= $profile['fullname'] ?></p>

              <ul class="list-group list-group-unbordered">
                <form  method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>user-profile">
                <li class="list-group-item">
                <input type="hidden" name="user_id" value="<?php  echo $profile['user_id'] ?> ">
                </li>
                <li class="list-group-item">
                  <input type="file"  name="profilepic" id="profilepic" class="form-control" required>
                </li>
                <li class="list-group-item">
                  <button type="submit"  class="btn btn-info btn-block" name="update-profile-pic">Update Profile Pic</button>
                </li>
                </form>
              </ul>             
            </div>           
          </div>
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
            <?php
              if($this->session->flashdata('error')) {
                  ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    
                    <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?></p>
                  </div>
                  <?php
              }
              if($this->session->flashdata('success')) {
                  ?>
                  
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    
                    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('success'); ?></p>
                  </div>
                  <?php
              }
	        ?>        
            </div>
          </div>          
          <div class="nav-tabs-custom">            
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>             
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">            
                <form class="form-horizontal" action="<?php echo base_url(); ?>user-profile" method="post"> 
                 
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="<?php  echo $profile['email'] ?>"  id="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Kennel Name</label>

                    <div class="col-sm-10">
                    <input type="text" name="kernal_name" id="kernal_name"  class="form-control input-field"  value="<?php  echo $profile['fullname'] ?>" required="">                        
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Mobile </label>

                    <div class="col-sm-10">
                    <input type="tel" name="mobile" class="form-control" value="<?php  echo $profile['mobile'] ?>" id="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                    <textarea name="address" id="address" class="textarea-field form-control" rows="2" required=""><?php echo $profile['address']??''  ?></textarea> 
                    </div>
                  </div>
                 
                  <input type="hidden" name="user_id" value="<?php  echo $profile['user_id'] ?> ">
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" name="update-profile">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              
              <div class="tab-pane" id="settings">
                <form class="form-horizontal " action="<?php echo base_url(); ?>user-profile" method="post">
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Old Password</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputPassword" name="old_password" placeholder="Enter old password" required>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                    </div>
                  </div>
                  <input type="hidden" name="user_id" value="<?php  echo $profile['user_id'] ?> ">
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit"  class="btn btn-info" name="reset-password">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section> 
      
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>