<?php $this->load->view("web/header"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <div class="container-fluid p-0">
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
                  <div class="alert alert-success mt-5">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                  </div> 
               <?php
         }
      ?>                   
    
      <div id="slider" class="overlay-left" style="width:1200px;height:700px;margin:0 auto;margin-bottom: 0px;">         
           
         <?php 
          $counter = 1;
          foreach ($sliderList as $slider) { ?>
         <div class="ls-slide" data-ls="duration:8000; transition2d:3;kenburnszoom:<?php (!($counter % 2) ? 'in' : 'out') ?>out; kenburnsscale:1.2;">
            
            <img src="<?php if(isset($slider['banner']) && !empty($slider['banner'])){ echo base_url(); ?>uploads/banner/<?= $slider['banner'];}?>" class="ls-bg" alt="" />
            
            <div class="ls-l header-wrapper" data-ls="durationin:2400;durationout:1400;scalexin:1.5; scaleyin:1.5; scalexout:.7; scaleyout:.7;">
               <div class="header-text text-light text-left">
                  <h1><?php echo ($slider['bold_heading'])?$slider['bold_heading']:'' ?></h1>                    
                  <div class="hidden-xs">
                     <p class="header-p"><?php echo ($slider['small_text_msg'])?$slider['small_text_msg']:'' ?></p>
                     <a class="btn btn-primary " href="<?php echo base_url();?>contact-us">Contact us</a>
                  </div>                    
               </div>                  
            </div>               
         </div>
         <?php } ?>          
      </div>         
   </div>
     
   <section id="services-index">        
      <div class="container">
         <div class="section-heading">
            <h2>Our Kennels</h2>
         </div>        
   
         <div class="col-md-10 col-md-offset-1 text-center">
            <p>Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus vi tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
         </div>		
      </div>
      
      <div class="container-fluid bg-pattern margin1"  data-bottom-top="background-position: 0px 70%,99% 70%;"
         data-top-bottom="background-position: 0px -50%,99% -50%;">
         <div class="row">
            <div class="col-md-10 col-md-offset-1">			  
               <div id="owl-services" class="owl-carousel">
                  <?php if(isset($dogDetailsSliderData) && !empty($dogDetailsSliderData)): ?>
                     <?php foreach ($dogDetailsSliderData as $dog) { ?>
                        <div class="col-xs-12">
                           <div class="box_icon">
                              <div class="icon">                                   
                                 <div class="image">
                                    <img src="<?php if(isset($dog['dog_img']) && !empty($dog['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $dog['dog_img'];}?>" class="img-responsive" alt="">
                                 </div>
                                 <div class="info">
                                    <h4><?= ucfirst($dog['dog_name']) ?></h4>
                                    <p><?php echo ucfirst($dog['description']) ?></p>                                      
                                    <a class="btn" href="<?php echo base_url(); ?>home/kennel_details/<?= $dog['dog_id'] ?>">Read More</a>
                                 </div>
                              </div>
                           </div>                             
                        </div>
                     <?php } ?>
                  <?php endif ?>
               </div>                 
            </div>              
         </div>            
      </div>		 
   </section>
	  		   
   <section id="callout2" class="container-fluid bg-darkcolor small-section">
      <div class="container">          
         <div class="row">
            <div class="col-md-3">                
               <img src="<?php echo base_url(); ?>webasset/img/callout.png" class="img-responsive callout-img" alt="" >
            </div>             
            <div class="col-md-7 col-md-offset-1">
               <div class="page-scroll">
                  <h3>Join us Today</h3>
                  <p class="mb-4">Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate attempus vi tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                  <a href="<?php echo base_url(); ?>contact-us" class="btn btn-secondary">Contact us</a>
               </div>                 
            </div>              
         </div>           
      </div>        
   </section>
     
   <section id="about-index" >
      <div class="container">
         <div class="section-heading text-center">
            <h2>About Us</h2>
         </div>          
         <div class="row">
            <div class="col-md-12">                
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#A" data-toggle="tab">Our Company</a></li>
                  <li><a href="#B" data-toggle="tab">Our Philosophy</a></li>
                  <li><a href="#C" data-toggle="tab">Our Mission</a></li>
               </ul>                
               <div class="tabbable">
                  <div class="tab-content">
                     <div class="tab-pane active in fade" id="A">
                        <div class="row">
                           <div class="col-md-4 text-center">
                              <img src="<?php echo base_url(); ?>webasset/img/about1.jpg" class="img-rounded img-responsive" alt="">
                           </div>                            
                           <div class="col-md-7">
                              <h4>About our Company</h4>
                              <p><strong>Felis tiam non metus Placerat a ultricies a, posuere lorem ipseut lincas psuiem t volut pat phas ellus ac </strong></p>
                              <p>
                                 sodales Lorem ipsum dolor sit amet, consectetur adipisicing elit uasi quidem minus id omnis a nibh fusce mollis 
                                 imperdie tlorem ipuset campas fincas interdum donec eget metus auguen unc vel mauris ultricies.
                              </p>
                           </div>                            
                        </div>
                     
                        <div class="row margin1 text-center">                             
                           <div class="features col-lg-3 col-sm-6 col-xs-12">
                              <div class="col-xs-12 medium-icon">                                 
                                 <i class="flaticon-dog-and-pets-house"></i>
                              </div>
                              <div class="col-xs-12">
                                 <h5>Housing</h5>
                                 <p>Consectetur purus sit amet fermentum sociis natoque penatibus et magnis.</p>
                              </div>
                           </div>                              
                           <div class="features col-lg-3 col-sm-6 col-xs-12">
                              <div class="col-xs-12 medium-icon">                                   
                                 <i class="flaticon-dog-in-front-of-a-man"></i>
                              </div>
                              <div class="col-xs-12">
                                 <h5>High Quality</h5>
                                 <p>Consectetur purus sit amet fermentum sociis natoque penatibus et magnis.</p>
                              </div>
                           </div>
                           
                           <div class="features col-lg-3 col-sm-6 col-xs-12">
                              <div class="col-xs-12 medium-icon">
                                 
                                 <i class="flaticon-veterinarian-hospital"></i>
                              </div>
                              <div class="col-xs-12">
                                 <h5>Vet Services</h5>
                                 <p>Consectetur purus sit amet fermentum sociis natoque penatibus et magnis.</p>
                              </div>
                           </div>                              
                           <div class="features col-lg-3 col-sm-6 col-xs-12">
                              <div class="col-xs-12 medium-icon">                                    
                                 <i class="flaticon-animals-3"></i>
                              </div>
                              <div class="col-xs-12">
                                 <h5>Special Care</h5>
                                 <p>Consectetur purus sit amet fermentum sociis natoque penatibus et magnis.</p>
                              </div>
                           </div>                             
                        </div>
                        
                     </div>
                     
                     <div class="tab-pane fade" id="B">
                        <div class="row">
                           <div class="col-md-6">
                              <h4>Our Philosophy</h4>
                              <p><strong>Felis tiam non metus Placerat a ultricies a, posuere lorem ipseut lincas psuiem t volut pat phas ellus ac </strong></p>
                              <p>
                                 sodales Lorem ipsum dolor sit amet, consectetur adipisicing elit uasi quidem minus id omnis a nibh fusce mollis 
                                 imperdie tlorem ipuset campas fincas interdum donec eget metus auguen unc vel mauris ultricies.
                              </p>
                           </div>
                           
                           <div class="col-md-6 text-center">
                              <img src="<?php echo base_url(); ?>webasset/img/contact1.png" class="img-responsive" alt="">
                           </div>                            
                        </div>                        
                     </div>
                  
                     <div class="tab-pane fade" id="C">
                        <div class="row">
                           <div class="col-md-12">
                              <h4>Our Mission</h4>
                              <p><strong>Felis tiam non metus Placerat a ultricies a, posuere lorem ipseut lincas psuiem t volut pat phas ellus ac </strong></p>
                              <p>
                                 sodales Lorem ipsum dolor sit amet, consectetur adipisicing elit uasi quidem minus id omnis a nibh fusce mollis 
                                 imperdie tlorem ipuset campas fincas interdum donec eget metus auguen unc vel mauris ultricies.
                              </p>
                              <p>
                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam aliquam dui, nec blandit massa euismod ut. Nunc sed congue sapien, eu dignissim turpis. Ut vitae pretium erat. Sed quis enim id felis vehicula laoreet. Integer porttitor vestibulum metus, nec dapibus arcu eleifend eu. Maecenas imperdiet sagittis enim eu molestie. Donec quis diam condimentum, venenatis arcu a, ullamcorper elit. Nam vehicula libero nec sem feugiat, a convallis tellus commodo.									
                              </p>
                           </div>
                        </div>
                     </div>                      
                  </div>                   
               </div>                
            </div>             
         </div>          
      </div>      
   </section>
     
   <section class="container-fluid small-section bg-darkcolor bg-pattern" data-bottom-top="background-position: 0px 10%,99% 10%;"
      data-top-bottom="background-position: 0px 50%,99% 50%;" >
      <div class="container">          
         <div class="col-md-7">
            <h4>Subscribe to our system</h4>
            <p>Fusce mollis imperdiet interdum donec eget metus auguen unc vel lorem.</p>
         </div>
         <div class="col-md-4">             	
            <div id="mc_embed_signup" class="margin1">
               
               <form action="" method="post" id="subscribe-form" name="subscribe-form" class="validate"  novalidate>
                  <div id="mc_embed_signup_scroll">
                     <div class="mc-field-group">
                        <div class="input-group">
                           <input class="form-control input-lg required email" type="email" value="" name="EMAIL" placeholder="Your email here" id="EMAIL" required="">
                           <span class="input-group-btn">
                           <button class="btn" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">Subscribe</button>
                           </span>
                        </div>                           
                        <div id="mce-responses" class="mailchimp">
                           <div class="alert alert-danger response" id="mce-error-response">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                              <strong>Danger!</strong> Please somthing went wrong,Please try again!
                           </div>
                           <div class="alert alert-success response" id="mce-success-response">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                              <strong>Success!</strong> Thank you for subscription, we will contact you soon
                           </div>
                        </div>
                     </div>                       								
                  </div>                    
               </form>                 						
            </div>              
         </div>           
      </div>        
   </section>
      
   <section class="callout container-fluid no-padding">
      
      <div class="row-fluid">
         <div class="col-lg-8 col-md-12 no-padding" data-start="right: 20%;" 
            data-center="right:0%;">             
            <img src="<?php echo base_url(); ?>webasset/img/call1.jpg" class="img-responsive img-rounded" alt="">
         </div>            
         <div class="callout-box col-lg-6 col-lg-offset-6 bg-darkcolor"  data-start="left: 20%;" 
            data-center="left:0%;">
            <h3>We Love Pets</h3>
            <p>Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus vi tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            <a href="<?php echo base_url(); ?>contact-us" class="btn">Contact us</a>
         </div>           
      </div>       
   </section>
   
   <section id="stats" class="bg-lightcolor2" style="margin:5px 0px 5px 0px">
      <div class="section-heading text-center">
            <h2>Our Stats</h2>
         </div>
      <div class="container">
         <div class="col-lg-9 col-md-8 col-sm-8">
            <div class="text-center">
               <div class="col-lg-3 col-md-6 col-sm-6">
                  
                  <div class="numscroller" data-slno='1' data-min='0' data-max='180' data-delay='20' data-increment="19">0</div>
                  <h5>Users</h5>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  
                  <div class="numscroller" data-slno='1' data-min='0' data-max='16' data-delay='10' data-increment="9">0</div>
                  <h5>Kennels</h5>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  
                  <div class="numscroller" data-slno='1' data-min='0' data-max='67' data-delay='20' data-increment="19">0</div>
                  <h5>Pets Hosted</h5>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  
                  <div class="numscroller" data-slno='1' data-min='0' data-max='50' data-delay='10' data-increment="9">0</div>
                  <h5>Subscriptions</h5>
               </div>
            </div>
         </div>
      </div>
   </section>  
   <!-- Section Ends-->
    
   <!-- Section Contact 
   <section id="contact-index">
      <div class="container">
         <div class="section-heading">
            <h2>Contact Us</h2>
         </div>
         <div class="col-lg-7 col-lg-offset-5 col-md-8 col-md-offset-2">
            
            <h4>Information </h4>
            <ul class="list-inline">
               <li><i class="fa fa-envelope"></i><a href="mailto:youremailaddress">youremail@site.com</a></li>
               <li><i class="fa fa-phone margin-icon"></i>Call Us +1 456 7890</li>
               <li><i class="fa fa-map-marker margin-icon"></i>Lorem Ipsum 505</li>
            </ul>
            
            <p>Elit uasi quidem minus id omnis a nibh fusce mollis imperdie tlorem ipuset phas ellus ac sodales Lorem ipsum dolor Phas ellus 
            </p>
            <h4 class="margin1">Send us a Message</h4>
            
            <div id="contact_form">
               <div class="form-group">
                  <label>Name<span class="required">*</span></label>
                  <input type="text" name="name" class="form-control input-field" required="">                    
                  <label>Email Adress <span class="required">*</span></label>
                  <input type="email" name="email" class="form-control input-field" required="">           
                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control input-field" required="">                            
                  <label>Message<span class="required">*</span></label>
                  <textarea name="message" id="message" class="textarea-field form-control" rows="3"  required=""></textarea>
               </div>
               <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Send message</button>
            </div>
            
            <div id="contact_results"></div>
         </div>
         
      </div>
      
   </section>
   /Section ends -->	
   <div class="container-fluid">
      <!-- map-->
      <!-- <div id="map-canvas"></div> -->
   </div>
<?php $this->load->view("web/footer"); ?>
<script>
    $(document).ready(function() {
        $("#subscribe-form").on('submit', function(e){
			e.preventDefault();
            
			
			var email = $('#EMAIL').val();
         if(email == '')
         {
            return false;
         }			

			let _URL = '<?php echo base_url(); ?>home/save_subscriber';

            $.ajax({
				url: _URL,
				type: "POST",
				data: {				
					email: email,												
				},
				cache: false,
				success: function(dataResult){
					var data = JSON.parse(dataResult);
				
					if(data.status ==true){ 
                       
						$("#mce-success-response").show();
						
						$('#EMAIL').val('');
						
						setTimeout(function(){
							$("#mce-success-response").hide();
						}, 5000);
					}
					else {
						$("#mce-error-response").show();
						//$('#fail').text(dataResult.msg);
					}
					
				}
			});


        })
    })
</script>