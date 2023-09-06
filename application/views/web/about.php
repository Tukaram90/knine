<?php $this->load->view("web/header"); ?>
<link href="<?php echo base_url(); ?>webasset/css/customweb.css" rel="stylesheet">
    <style>
        .missionAbout{
            text-align: justify;
        }
    </style>
    <section id="about" class="pages">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>About Us</h1>
        </div>
        </div>
       
        <div class="container">
        <div class="row missionAbout">
            <div class="col-lg-8 col-md-6">
                
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
           
            <div class="col-lg-2 col-md-3 res-margin">
                <img src="<?php echo base_url(); ?>webasset/img/odebtm_about.jpeg" class="img-rounded center-block img-responsive" alt="">
                <div class="info">
                    <p class="name">Mrs. Odebt Massey</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 res-margin">
                <img src="<?php echo base_url(); ?>webasset/img/amol_about.jpeg" class="img-rounded center-block img-responsive" alt="">
                <div class="info">
                    <p class="name">Mr. Amol Valimbe</p>
                </div>
            </div>
            <!-- /col-lg-5-->
        </div>
       
        <div class="margin1 text-center ">
            <div class="well lightcolor row">
                
                <div class="features col-lg-3 col-sm-6 col-xs-12">
                    <div class="col-xs-12 medium-icon">                    
                    <i class="flaticon-dog-and-pets-house"></i>
                    </div>
                    <div class="col-xs-12">
                    <h5>Dog Details</h5>
                    <p>You can add dog's general information like dog's name, microchip, registration no., Date of birth, dog's father - mother.</p>
                    <p id="dogDetails">
                        You can also add dog's title  earned along with the date when he has achieved this milestone.
                        Add  upload photo of the dog if any.
                        You can add show details such as club name, breed judged by, dog handled by, how many dogs participated, how many points earned by a dog, class and group details etc.
                        You can schedule your show calendar using this feature. &emsp;&emsp;
                        <?php if($this->session->userdata('is_user_logged_in')=='yes' || $this->session->userdata('is_google_user')=="yes"){?>
                        <a href="<?php echo base_url(); ?>kennel-list">Login</a>&emsp;
                        <?php }else{?>
                        <a href="<?php echo base_url() ?>user">Login</a>&emsp;
                        <?php } ?>
                        <span class="divider"></span> <a href="<?php echo base_url() ?>register-user">Sign up</a>
                    </p>
                    <a  class="btn dogbtnclk">Read More</a>
                    </div>
                </div>                
              
                <div class="features col-lg-3 col-sm-6 col-xs-12">
                    <div class="col-xs-12 medium-icon">                    
                    <i class="fa fa-rupee" ></i>
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
                    <div class="col-xs-12 medium-icon" style="margin-bottom:0px">
                    
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
                    <h5>ADVERTISE</h5>
                    <p>You can create your own add by adding available template, or you can use your own template...<br><br></p>
                    <p id="advertiseData">Use the text fields to add the details which needs to be updated, font colour can be selected appropriately,
                    font style selection options is also available. You can import images like kennel logo, dog photos to create your own advertising.
                    Sharing this add on WhatsApp, Facebook feature is available. &emsp;&emsp;
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
        <!-- <div class="row margin1">
            <div class="col-lg-7 col-sm-12 res-margin">
                <h3 class="text-center">How We Started</h3>
                <p>Ibu lum orci eget, viverra elit. Aliquam erat volut pat phas ellus ac
                    sodales felis tiam non Doloreiur qui commolu ptatemp dolupta orem retibusam 
                    andigen Ibu lum orci eget, viverra elit. Aliquam erat volut pat phas ellus ac sodales felis tiam non metus.
                    Placerat a ultricies a, posuere a nibh. Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies, vest ibulum orci eget,Fusce mollis imperdiet interdum donec eget metus auguen unc vel lorem ispuet Ibu lum orci eget, viverra elit liquam erat volut pat phas ellus ac sodales Lorem ipsum dolor sit amet, consectetur adipisicing elit uasi quidem minus id omnis.
                </p>
                <p>
                    Les felis tiam non metus ali quam eros Pellentesque turpis lectus, placerat a ultricies a, posuere a nibh. Fusce mollis imperdiet interdum. 
                </p>
            </div>
           
            <div class="col-lg-5 col-sm-12">
              
                <div class="panel-group" id="accordion">
                   
                    <div class="panel">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Social Responsability</a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <p>Patatemp dolupta orem retibusam qui commolu 
                                les felis tiam non metus ali quam eros Pellentesque turpis lectus, placerat a ultricies a, posuere a nibh. Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies, vest ibulum orci eget, viverra elit. 
                            </p>
                        </div>
                    </div>
                    </div>
                   
                    <div class="panel">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Mission Statement</a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Patatemp dolupta orem retibusam qui commolu 
                                les felis tiam non metus ali quam eros Pellentesque turpis lectus, placerat a ultricies a, posuere a nibh. Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies, vest ibulum orci eget, viverra elit. 
                            </p>
                        </div>
                    </div>
                    </div>
                   
                    <div class="panel">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Value Added Services</a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Patatemp dolupta orem retibusam qui commolu 
                                les felis tiam non metus ali quam eros Pellentesque turpis lectus, placerat a ultricies a, posuere a nibh. Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies, vest ibulum orci eget, viverra elit. 
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
               
            </div>
           
        </div> -->
        <div class="row margin1 missionAbout">
            <div class="col-lg-12 col-sm-12 res-margin ">
                <h3 class="text-center">Mission Statement</h3>
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
        <!-- /container-->
    </section>
<?php $this->load->view("web/footer"); ?>
<script src="<?php echo base_url(); ?>webasset/js/homeabout.js"></script>
