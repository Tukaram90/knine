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
            <h1>Dog Info</h1>
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
            <?php  $this->load->view("web/usersidebar"); ?> 
        </div>
        <div id="" class="col-md-9 sidebar">
            <h4>Edit Dog Info</h4>
            <div class="well">
                <a href="<?php echo base_url(); ?>user/doglist" class="label default pull-right">Dog List</a> <br>
                <form action="<?php echo base_url(); ?>user/save_dog" method="post">
                <?php 
                  //echo "<pre>";print_r($dogDetails);  
                ?>
                <div class="row">
                   <div class="col-md-6">
                        <label for="doggrandpha">Dog's Grand Father</label>
                        <input type="text" name="dog_grandpha" class="form-control" value="<?= $dogDetails['dogs_grand_father'] ?? '' ?>" id="dog_grandpha" Placeholder="Dogs Grand Father">
                   </div>
                   <div class="col-md-6">
                        <label>Dog's Father</label>
                        <input type="text" name="dog_father" id="dog_father" value="<?= $dogDetails['dogs_father'] ?? '' ?>" class="form-control" placeholder="Dog's Father">                        
                   </div>
                </div>
                
              
                <div class="row">
                   <div class="col-md-6">
                        <label for="mobile">Dog Name</label>
                        <input type="text" name="dog_name" class="form-control" value="<?= $dogDetails['dog_name'] ?? '' ?>" id="dog_name" placeholder="Dog Name" required="">
                   </div>
                   <div class="col-md-6">
                        <label>Dog Type</label>
                        <input type="text" name="dog_type" id="dog_type" class="form-control"  value="<?= $dogDetails['dog_type'] ?? '' ?>" placeholder="Dog Type"  required="">                          
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-6">
                        <label for="gender">Dog Gender</label>                        
                        <input type="radio" name="dog_gender" id="dog_gender" value="male" <?php if($dogDetails['gender'] == 'male'){echo "checked"; } ?>>Male 
                        <input type="radio" name="dog_gender" id="dog_gender" value="female" <?php if($dogDetails['gender'] == 'female'){echo "checked";} ?>>Female 
                   </div>
                   <div class="col-md-6">
                        <label>Dog Age</label>
                        <input type="text" name="dog_age" id="dog_age" class="form-control" placeholder="Dog Age"  value="<?= $dogDetails['age'] ?? '' ?>" required="">                          
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-6">
                        <label for="gender">Dog Color</label>
                        <input type="text" name="dog_color" class="form-control"  id="dog_color" placeholder="Dog Color"  value="<?= $dogDetails['color'] ?? '' ?>" required="">
                   </div>
                   <div class="col-md-6">
                        <label>Dog Weight</label>
                        <input type="text" name="dog_weigth" id="dog_weigth" class="form-control" placeholder="Dog Weight"  value="<?= $dogDetails['weight'] ?? '' ?>" required="">                          
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-6">
                        <label for="gender">Features</label>                        
                        <textarea name="feature" id="feature" cols="30" rows="4" class="form-control" ><?= $dogDetails['feature'] ?? '' ?></textarea>
                   </div>
                   <div class="col-md-6">
                        <label>Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control"><?= $dogDetails['description'] ?? '' ?></textarea>
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-12">
                        <label for="img">Images</label>                        
                        <input type="file" name="img" id="img" class="form-control">
                   </div>
                   
                </div>
                <input type="hidden" name="dog_id" value="<?= $dogDetails['dog_id'] ?? '' ?>">
                <button type="submit"  value="Submit" name="add-dog-form" class="btn center-block">Update</button>
                </form>
            </div>   
        </div>   
    </div>        
</section>
<?php $this->load->view("web/footer"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>