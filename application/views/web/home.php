<?php $this->load->view("web/header"); ?>
<link href="<?php echo base_url(); ?>webasset/css/customweb.css" rel="stylesheet">
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
            <h2>My Kennel</h2>
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
                  <li><a href="#B" data-toggle="tab">Our Guidence</a></li>
                  <li><a href="#C" data-toggle="tab">Our Mission</a></li>
               </ul>                
               <div class="tabbable">
                  <div class="tab-content">
                     <div class="tab-pane active in fade" id="A">
                        <div class="row">
                           <!-- <div class="col-md-4 text-center">
                              <img src="<?php echo base_url(); ?>webasset/img/about1.jpg" class="img-rounded img-responsive" alt="">
                           </div>                             -->
                           <div class="col-md-12">
                              <h4>About Us</h4>
                              <p>
                              As two breeder/exhibitors of AKC recognized breeds we found that other than keeping paper records of the
                                 shows that we participated in there was no convenient nor modern way to keep and put all of those records in
                                 one place other than a big bulky file cabinet. While a file cabinet is a useful tool you can not carry it with you and
                                 you can not update it on your ohone or computer.
                              </p>
                              <p>
                              We know there are places to keep your dogs vaccination and health records online and even some apps for
                              breeders to keep track of pedigrees but nothing to keep track of information about the AKC conformation shows
                              we attended. Things like what hotel we stayed at and how much it cost, if there was bathing on the show
                              grounds, what was the exact entry, how many dogs and bitches, what restaurants we’ve eaten at and if they were
                              any good, who were the judges that we showed to and our impression of them. All important items that tend to
                              blur together over time. And also important things to be able to document should one of us decides to go for
                              licensing as a dog show judge in the future.
                              </p>
                              <p>
                              So, in a desire to help other show dog exhibitors everywhere we got together and worked on this website which
                              we hope to turn into a mobile application should it become popular. It is accessible with your mobile device
                              already but an app may be in the future. We hope you find our website helpful on your dog show journey and for
                              many years in the future as you breed your next generation of show dogs!

                              </p>
                           </div>                            
                        </div>
                     
                        <div class="row margin1 text-center">                             
                           <div class="features col-lg-3 col-sm-6 col-xs-12">
                              <div class="col-xs-12 medium-icon">                                 
                                 <i class="flaticon-dog-and-pets-house" style="margin-bottom:0px"></i>
                              </div>
                              <div class="col-xs-12">
                                 <h5>Dog Details</h5>
                                 <p>You can add dog's general information like dog's name, microchip, registration no., Date of birth, dog's father - mother.</p>
                                 <p id="dogDetails">
                                 You can also add dog's title  earned along with the date when he has achieved this milestone.
                                 Add  upload photo of the dog if any.
                                 You can add show details such as club name, breed judged by, dog handled by, how many dogs participated, how many points earned by a dog, class and group details etc.
                                 You can schedule your show calendar using this feature.
                                 <?php if($this->session->userdata('is_user_logged_in')=='yes' || $this->session->userdata('is_google_user')=="yes"){?>
                                    <a href="<?php echo base_url(); ?>kennel-list">Login</a>
                                 <?php }else{?>
                                    <a href="<?php echo base_url() ?>user">Login</a>
                                 <?php } ?>
                                  <span class="divider"></span> <a href="<?php echo base_url() ?>register-user">Sign up</a>
                                 </p>
                                 
                                 <a  class="btn dogbtnclk">Read More</a>
                              </div>
                           </div>                              
                           <div class="features col-lg-3 col-sm-6 col-xs-12">
                              <div class="col-xs-12 medium-icon">                                   
                                 <i class="fa fa-rupee"></i>
                              </div>
                              <div class="col-xs-12">
                                 <h5>Expense</h5>
                                 <p> You can maintain expenses incurred during dog shows like dog show entry fees, hotel expenses, fuel, handling charges...</P>
                                 <P id="moreExpenseData"> grooming expenses, food etc. and any other expenses using this feature.
                                 <?php if($this->session->userdata('is_user_logged_in')=='yes' || $this->session->userdata('is_google_user')=="yes"){?>
                                    <a href="<?php echo base_url(); ?>expense-list">Login</a>
                                 <?php }else{?>
                                    <a href="<?php echo base_url() ?>user">Login</a>
                                 <?php } ?>
                                  <span class="divider"></span> <a href="<?php echo base_url() ?>register-user">Sign up</a>
                                 </p>
                                 <a class="btn morexpenseclk"> Read More</a>
                              </div>
                           </div>
                           
                           <div class="features col-lg-3 col-sm-6 col-xs-12">
                              <div class="col-xs-12 medium-icon">
                                 
                                 <i class="fa fa-stethoscope"></i>
                              </div>
                              <div class="col-xs-12">
                                 <h5>Vaccination</h5>
                                 <p>You can maintain vaccination record for your dog or dogs. Maintain history when the dog has been given de-worming...</p>
                                 <p id="vaccinationData">tablet and also set reminder for next de-worming.In case any bitch is in season/heat, you can keep a record of it,
                                    Maintaining this record will help you planning breeding program.
                                 <?php if($this->session->userdata('is_user_logged_in')=='yes' || $this->session->userdata('is_google_user')=="yes"){?>
                                    <a href="<?php echo base_url(); ?>vaccination-list">Login</a>
                                 <?php }else{?>
                                    <a href="<?php echo base_url() ?>user">Login</a>
                                 <?php } ?>
                                  <span class="divider"></span> <a href="<?php echo base_url() ?>register-user">Sign up</a>
                                 </P>
                                 <a class="btn vaccinationclk">Read More</a>
                              </div>
                           </div>                              
                           <div class="features col-lg-3 col-sm-6 col-xs-12">
                              <div class="col-xs-12 medium-icon">                                    
                                 <i class="fa fa-image"></i>
                              </div>
                              <div class="col-xs-12">
                                 <h5>Advertise</h5> 
                                 <p>You can create your own add by adding available template, or you can use your own template...<br><br></p>
                                 <p id="advertiseData">Use the text fields to add the details which needs to be updated, font colour can be selected appropriately,
                                    font style selection options is also available. You can import images like kennel logo, dog photos to create your own advertising.
                                    Sharing this add on WhatsApp, Facebook feature is available.
                                    <?php if($this->session->userdata('is_user_logged_in')=='yes' || $this->session->userdata('is_google_user')=="yes"){?>
                                    <a href="<?php echo base_url(); ?>advertise">Login</a>
                                    <?php }else{?>
                                       <a href="<?php echo base_url() ?>user">Login</a>
                                    <?php } ?>
                                    <span class="divider"></span> <a href="<?php echo base_url() ?>register-user">Sign up</a>
                                 
                                 </p>
                                 <a class="btn advertiseclk">Read More</a>
                              </div>
                           </div>                             
                        </div>
                        
                     </div>
                     
                     <div class="tab-pane fade" id="B">
                        <div class="row">
                           <div class="col-md-6 text-center">
                              <p class="name">Mrs. Odebt Massey</p>
                              <img src="<?php echo base_url(); ?>webasset/img/odebtmm.jpeg" class="img-responsive" alt="">
                           </div>
                           
                           <div class="col-md-6 text-center">
                              <p class="name">Mr. Amol Valimbe</p>
                              <img src="<?php echo base_url(); ?>webasset/img/amolss.jpeg" class="img-responsive" alt="">
                           </div>                            
                        </div>                        
                     </div>
                  
                     <div class="tab-pane fade" id="C">
                        <div class="row">
                           <div class="col-md-12">
                              <h4>Our Mission</h4>
                              <p>
                              In the American Kennel Club dog show world keeping accurate and complete records is very important. AKC
                              requires accurate records of each of your dogs, their pedigrees and their breeding history and where and when
                              your AKC championship points were earned. And if you show your dogs it is important to keep an accurate
                              history of your dogs show career for your own purposes. So we have built this website to help AKC
                              conformation show dog exhibitors and breeders keep track of all of this and even more in one easy to access
                              location.
                              </p>
                              <p>
                              But we also want to go beyond the basics. We suggest and offer you a place to keep track of as much as you
                              can, things like the names of the Kennel Clubs and locations of the shows you attend, the exact entry counts,
                              information about the show site, the local hotels and restaurants. Details like if the show grounds have bathing on
                              site, who were the judges in the breed and in the group and even in Best in Show and what your impression of
                              them was. Information you can use to streamline your future entries and how your dog did at each and every
                              event. You can keep track of the mileage and other helpful information that will help you make decisions in the
                              future. Then we want to provide you one location to keep your dogs health, breeding, health testing and
                              vaccination information. Plus we want you to have a place to keep records on the foods you feed, boarding or
                              handling expenses and veterinary expenses. We want you to be able to keep the most complete, comprehensive
                              records around!
                              </p>
                              <p>
                              In addition to all of this you can keep the financial records of all of the expenses in owning, breeding and
                              showing your dogs. We know most hobbyists don’t really want to know that particular information ( $ ) but in
                              reality, don’t you actually wonder? Well, you can keep track but not look if you want! And if you keep accurate
                              records of the expenses of keeping, breeding and showing your dogs it does come in handy when it comes to tax
                              time if you claim your activities as a small business or even as a hobby.
                              As we grow we plan to offer more add on value to this website and maybe even turn it into an app in the future.
                              So in conclusion, we hope you will find this website useful in all aspects of keeping your records concerning your
                              dogs and their lifetime of accomplishments.
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

   <section id="about-index">
      <div class="container">
         <div class="section-heading text-center">
            <h2>FAQ'S</h2>
         </div> 
         <div class="row margin1">
            <div class="col-lg-12 col-sm-12">            
               <div class="panel-group" id="accordion">               
                     <div class="panel">
                        <div class="panel-heading">
                           <h5 class="panel-title">
                                 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">what is in there for me?</a>
                           </h5>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                           <div class="panel-body">
                                 <p> With this application/ website you as a owner of a dog can store all your dog details including date of birth, vaccination,
                                 titles earned, dog expenses etc..along with this you can create Pic- pedigree and litter advertisement using this website / app.
                                 </p>
                           </div>
                        </div>
                     </div>
               
                     <div class="panel">
                        <div class="panel-heading">
                           <h5 class="panel-title">
                                 <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Who is this website for?</a>
                           </h5>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                           <div class="panel-body">
                                 <p>This website is for dog Owners, breeders, handlers and entire dog show world.
                                 </p>
                           </div>
                        </div>
                     </div>
               
                     <div class="panel">
                        <div class="panel-heading">
                           <h5 class="panel-title">
                                 <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">If i am a dog owner, which feature is useful for me?</a>
                           </h5>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                           <div class="panel-body">
                                 <p> As a dog owner you can use dog details and dog titles, vaccination details and food expenses details,
                                    also there is a dog advertisement feature available where you can create add of your dog on your own.
                                 </p>
                           </div>
                        </div>
                     </div>

                     <div class="panel">
                        <div class="panel-heading">
                           <h5 class="panel-title">
                                 <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">If i am dog breeder what is it there for me?</a>
                           </h5>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                           <div class="panel-body">
                                 <p> As a dog breeder you can use dog details and dog titles, vaccination details and food expenses details, also there is a dog advertisement feature available where you can create add of your dog on your own,
                                    litter advertisement, picture pedigree etc.
                                 </p>
                           </div>
                        </div>
                     </div>

                     <div class="panel">
                        <div class="panel-heading">
                           <h5 class="panel-title">
                                 <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How can I track my kennel food expenses?</a>
                           </h5>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                           <div class="panel-body">
                                 <p> There is a seperate section for adding dog food expenses, where you can enter all the dog food details and you can get month wise / quarter wise or yearly summary.
                                 </p>
                           </div>
                        </div>
                     </div>

                     <div class="panel">
                        <div class="panel-heading">
                           <h5 class="panel-title">
                                 <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why should I use this?</a>
                           </h5>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                           <div class="panel-body">
                                 <p>  This is the only K9-Widget available which has clubbed dog details, titles earned, food expenses, advertising and picture pedigree feature.
                                 </p>
                           </div>
                        </div>
                     </div>

                     <div class="panel">
                        <div class="panel-heading">
                           <h5 class="panel-title">
                                 <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">How to start using this application?</a>
                           </h5>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                           <div class="panel-body">
                                 <p> Register your kennel details along with mobile number, after authentication you can start using this application.
                                 </p>
                           </div>
                        </div>
                     </div>

                     <div class="panel">
                        <div class="panel-heading">
                           <h5 class="panel-title">
                                 <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Do i need to use desktop for this application?</a>
                           </h5>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">
                           <div class="panel-body">
                                 <p> This application has been designed for both desktop as well as mobile using auto responsive UI.
                                 </p>
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
<script src="<?php echo base_url(); ?>webasset/js/homeabout.js"></script>