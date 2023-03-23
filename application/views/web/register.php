<?php $this->load->view("web/header"); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.7.95/css/materialdesignicons.css" rel="stylesheet"/>
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
                        <?php echo form_open_multipart(base_url().'user/save_user',array('id' => 'register_form')); ?>
                        <div class="form-group">
                        <label>Kennel Name</label>
                        <input type="text" name="kernal_name" id="kernal_name"  class="form-control input-field" >
                        <label>Kennel Logo <span class="required"></span></label>
                        <input type="file" name="kennel_logo" id="kennel_logo"  class="form-control input-field" >                  
                        <label>Email Adress <span class="required text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control input-field" required="">           

                        <label>Password <span class="required text-danger">*</span></label>                     
                        <div class="input-group">
                            <span class="input-group-addon toggle-password" style="border: 2px solid #F19F1F;"><i class="fa fa-eye-slash"></i></span>     
                            <input type="password" name="password" id="password"  class="form-control input-field" required="">                               
                        </div>                       
                        <label>Confirm Password <span class="required text-danger">*</span></label>
                        <input type="password" name="conf_password" id="conf_password"  class="form-control input-field" required="">                        
                        <label>Mobile</label>
                        <input type="text" name="mobile" id="mobile"  class="form-control input-field allowOnlyNumber" minlength="10" maxlength="12" >
                        <label>Dog Breed <span class="required text-danger">*</span></label>
                        <select name="dog_breed" id="dog_breed" class="form-control input-field" required="">
                            <option value="">Select Dog Breed</option>
                            <?php foreach($dogBreeds as $type ){  ?>
                                <option value="<?= $type['id'] ?>"><?= $type['kennel_type'] ?></option>
                            <?php }?>
                        </select>
                        <label>Address<span class="required text-danger">*</span></label>
                        <textarea name="address" id="address" class="textarea-field form-control" rows="2" required=""></textarea>                          
                       
                        </div>
                        <button type="submit"  value="Submit" id="sbmit" onclick="return validationUser();" name="form_registration" class="btn center-block">Register</button>
                       
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
<script>
$(document).ready(function() {
    $("#register_form").validate({
        rules: {
            email: "required",
            address: "required",
            dog_breed: "required",
            password: "required",
            conf_password: "required"
        },
        messages: {
            email: "Enter your email ",
            address: "Enter your address ",
            dog_breed: "Select your dog breed ",
            password: "Enter your password ",
            conf_password: "Enter confirm password ",

        }
    })

    $('#sbmit').click(function() {
        $("#register_form").valid();
    });
});
$('.toggle-password').click(function(){
    $(this).children().toggleClass('fa-eye fa-eye-slash');    
    var input = $("#password");   
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
</script>