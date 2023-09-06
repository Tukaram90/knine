<?php
if(!$this->session->userdata('is_user_logged_in')) {
  redirect(base_url().'user');
}
?>
<?php $this->load->view("web/header"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .userliinkactive{
        color:black !important;
    }
</style>
<section id="blog" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">            
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>User Dashboard</h1>
        </div>
    </div>
        
    <div class="container"> 
        <?php
            if($this->session->flashdata('error')) { 
                ?>
                <script>                                          
                    setTimeout(function(){ 
                        toastr.error('<?php echo $this->session->flashdata('error'); ?>');
                    }, 1000);                        
                </script>
                <?php
            }
            if($this->session->flashdata('success')) {
                ?>
                <script>
                    setTimeout(function(){ 
                        toastr.success('<?php echo $this->session->flashdata('success'); ?>');
                    }, 1000);
                </script>
                <?php
            }
        ?>     
        <div class="sidebar col-md-3">
            <?php $this->load->view("web/usersidebar"); ?>  
        </div>
        <div id="" class="col-md-9 sidebar">
            <h4>Profile</h4>
            <div class="well">
                
                <form method="post" action="<?php echo base_url(); ?>user/update_profile/<?php echo $profile['user_id']; ?>">
                <div class="row">
                   <div class="col-md-6">
                        <label for="Email">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php  echo $profile['email'] ?>"  id="">
                   </div>
                   <div class="col-md-6">
                        <label>Kernal Name</label>
                        <input type="text" name="kernal_name" id="kernal_name"  class="form-control input-field"  value="<?php  echo $profile['fullname'] ?>" required="">                        
                   </div>
                </div>
                
              
                <div class="row">
                   <div class="col-md-6">
                        <label for="mobile">Mobile</label>
                        <input type="tel" name="mobile" class="form-control" value="<?php  echo $profile['mobile'] ?>" id="">
                   </div>
                   <div class="col-md-6">
                        <label>Address</label>
                        <textarea name="address" id="address" class="textarea-field form-control" rows="2" required=""><?php echo $profile['address']??''  ?></textarea>                          
                   </div>
                </div>
                
                <button type="submit"  value="Submit" name="form_registration" class="btn center-block">Update</button>
                </form>
            </div>   
        </div>   
    </div>        
</section>
<?php $this->load->view("web/footer"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>