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
                <h1>Register</h1>
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
                    <h3>Sign up</h3>                    
                    <div >
                        <!-- <form action="" id="login_form"> -->
                        <?php echo form_open(base_url().'user/save_user',array('id' => 'register_form')); ?>
                        <div class="form-group">
                                            
                        <label>Email Adress <span class="required">*</span></label>
                        <input type="email" name="email" id="email" class="form-control input-field" required="">           
                        <label>Password</label>
                        <input type="password" name="password" id="password"  class="form-control input-field" required="">
                        <label>Kernal Name</label>
                        <input type="text" name="kernal_name" id="kernal_name"  class="form-control input-field" required="">
                        <label>Mobile</label>
                        <input type="text" name="mobile" id="mobile"  class="form-control input-field" required="">
                        <label>Address</label>
                        <textarea name="address" id="address" class="textarea-field form-control" rows="2" required=""></textarea>                          
                       
                        </div>
                        <button type="submit"  value="Submit" name="form_registration" class="btn center-block">Register</button>
                       
                        <?php echo form_close(); ?>
                        <div class="row margintop">
                            <div class="col-md-6">  Already Member ? <a href="<?php echo base_url(); ?>user"> Login </a></div>                            
                        </div>
                    </div>
                    
                    <div id="contact_results" style="display:none">
                        <div class="alert alert-success">
                           <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                           <strong>Success!</strong> Thank you for your message, we will contact you soon
                        </div>
                    </div>
                    <div id="contact_results_fail" style="display:none">
                        <div class="alert alert-danger">
                           <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                           <strong>Danger!</strong> Please somthing went wrong,Please try again!
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