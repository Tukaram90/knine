<?php $this->load->view("web/header"); ?>
    <style>
       .map-responsive{
        overflow:hidden;
        padding-bottom:50.25%;
        position:relative;
        height:0;
        }
        .map-responsive iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
        }
    </style>
    <section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">        
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
                <h1>Contact Us</h1>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
            
                <div class="col-lg-2 col-md-2">
                    <!--<h3>Information </h3>-->
                    <!-- <p>Elit uasi quidem minus id omnis a nibh fusce mollis imperdie tlorem ipuset phas ellus ac sodales Lorem ipsum dolor Phas ellus -->
                    <!--adipisicing elit uasi quidem minus id omnis a nibh fusce mollis imperdie tlorem ipuset campas fincas-->
                    <!--</p>-->
                    <!--<img src="<?php echo base_url(); ?>webasset/img/contactpage1.png" alt="" class="img-rounded center-block img-responsive">-->
                                
                </div>
            
                <div class="col-lg-6 col-md-6 col-lg-offset-1 col-md-offset-1 res-margin">
                    <h3>Write us</h3>                    
                    <div >
                        <form action="" id="contact_form1">
                        <div class="form-group">
                        <label>Name<span class="required">*</span></label>
                        <input type="text" name="name" id="name" class="form-control input-field" required="">                    
                        <label>Email Address <span class="required">*</span></label>
                        <input type="email" name="email" id="email" class="form-control input-field" required="">           
                        <label>Subject</label>
                        <input type="text" name="subject" id="subject"  class="form-control input-field" required="">                            
                        <label>Message<span class="required">*</span></label>
                        <textarea name="message" id="message" class="textarea-field form-control" rows="3"  ></textarea>
                        </div>
                        <button type="submit"  value="Submit" class="btn center-block">Send message</button>
                        </form>
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
            </div>        
        </div>        
        <div class="container-fluid margin1">
            <!-- map-->
            <!-- <div id="map-canvas"></div> -->
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242117.6810172457!2d73.72287834853691!3d18.52489042244042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1663399774875!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>        
    </section>
<?php $this->load->view("web/footer"); ?>
<script>
    $(document).ready(function() {
        $("#contact_form1").on('submit', function(e){
			e.preventDefault();
            
			var name = $('#name').val();
			var email = $('#email').val();
			var subject = $('#subject').val();
			var message = $('#message').val();

			let _URL = '<?php echo base_url(); ?>home/save_contact';

            $.ajax({
				url: _URL,
				type: "POST",
				data: {
					name: name,
					email: email,
					subject: subject,					
					message:message,									
				},
				cache: false,
				success: function(dataResult){
					var data = JSON.parse(dataResult);
				
					if(data.status ==true){ 
                       
						$("#contact_results").show();
						//$('#contact_results').text(data.msg);
						$('#name').val('');
						$('#email').val('');
						$('#subject').val('');					
						$('#message').val('');
						setTimeout(function(){
							$("#contact_results").hide();
						}, 5000);
					}
					else {
						$("#fail").show();
						//$('#fail').text(dataResult.msg);
					}
					
				}
			});


        })
    })
</script>