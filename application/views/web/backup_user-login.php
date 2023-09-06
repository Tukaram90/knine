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
                <h1>Login</h1>
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
                    <h3>Login with us</h3>                    
                    <div >
                        <?php echo form_open(base_url().'user',array('id' => 'login_form')); ?>
                        <div class="form-group">
                                            
                        <label>Email Adress <span class="required">*</span></label>
                        <input type="email" name="email" id="email" class="form-control input-field" required="">           
                        <label>Password</label>
                        <input type="password" name="password" id="password"  class="form-control input-field" required="">                            
                       
                        </div>
                        <button type="submit"  value="Submit"  name="form_login" class="btn center-block">Login</button>
                        <?php echo form_close(); ?>
                        <div class="row margintop">
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>forgot-password"> I Have Forgotten My Password </a>
                            </div>
                            <div class="col-md-6">
                            Don't have an account? <a href="<?php echo base_url(); ?>register-user"> Sign Up </a>
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
