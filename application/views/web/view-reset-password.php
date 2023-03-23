<?php $this->load->view("web/header"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .margintop{
            margin-top:2%;
        }
    </style>
    <section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">        
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
                <h1>Reset Password</h1>
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
            <div class="row">              
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-lg-6 col-md-6 col-lg-offset-1 col-md-offset-1 res-margin">
                    <h3>Reset Password</h3>                    
                    <div >
                        <?php echo form_open(base_url().'user/reset_password/'.$var1.'/'.$var2 ,array('id' => 'resetPassword_Form')); ?>
                        <div class="form-group">                                            
                            <label>New Password <span class="required">*</span></label>                           
                            <input class="form-control" placeholder="<?php echo 'New Password'; ?>" name="new_password" type="password" autocomplete="off" required>        
                        </div>
                        <div class="form-group">                                            
                            <label>Confirm Password <span class="required">*</span></label>                           
                            <input class="form-control" placeholder="<?php echo 'Confirm Password'; ?>" name="re_password" type="password" autocomplete="off" required>        
                        </div>
                        <button type="submit"  value="Submit"  name="resetPassForm" class="btn center-block">Submit</button>
                        <?php echo form_close(); ?>
                        <div class="row margintop">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>user"> Back to previous </a>
                            </div>
                        </div>
                    </div>                 
                    
                </div> 
                <div class="col-md-2 col-lg-2"></div>                      
            </div>        
        </div>        
          <div class="row margin1"></div>     
    </section>
<?php $this->load->view("web/footer"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>