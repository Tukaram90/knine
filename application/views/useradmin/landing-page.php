<?php $this->load->view('useradmin/comman/withoutSidebasrUserHeader'); ?>

<div class="content-wrapper " style="margin-left:2px; background-color:#fff">
    <section class="content-header">
      <h1>
        Landing Page
        <small>Landing Page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Landing Page</li>
      </ol>
    </section>   
    <section class="content dashscreenshowForMobile">          
      <div class="row">
          <div class="col-lg-4 col-xs-12">          
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 style="font-size:28px">Dog Details</h3>  
                    
                    <p>&emsp;</p>
                </div>
                <div class="icon">
                <i class="fa fa-hand-o-right"></i>
                </div>
                <a href="<?php echo base_url();?>kennel-list" class="small-box-footer"><strong>Click Here</strong> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
         <div class="col-lg-4 col-xs-12">          
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3 style="font-size:28px">Veterinary Care </h3>  
                    
                    <p>&emsp;</p>
                </div>
                <div class="icon">
                <i class="fa  fa-stethoscope"></i>
                </div>
                <a href="<?php echo base_url();?>vaccination-list" class="small-box-footer"><strong>Click Here</strong><i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-4 col-xs-12">          
              <div class="small-box bg-maroon">
                  <div class="inner">
                      <h3 style="font-size:28px">Expense Details</h3>

                      <p>&emsp;</p>
                  </div>
                  <div class="icon">
                  <i class="fa fa-rupee"></i>
                  </div>
                  <a href="<?php echo base_url();?>expense-list" class="small-box-footer "><strong>Click Here</strong> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
        
          <div class="col-lg-4 col-xs-12">          
            <div class="small-box bg-red">
                <div class="inner">
                    <h3 style="font-size:28px">Calendar</h3>
                    
                    <p>&emsp;</p>
                </div>
                <div class="icon">
                <i class="fa fa-calendar"></i>
                </div>
                <a href="<?php echo base_url();?>shows" class="small-box-footer"><strong>Click  Here</strong> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
            
          

          <div class="col-lg-4 col-xs-12">          
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3 style="font-size:28px">Show Records<sup style="font-size: 20px"></sup></h3>

                      <p>&emsp;</p>
                  </div>
                  <div class="icon">
                  <i class="fa fa-trophy"></i>
                  </div>
                  <a href="<?php echo base_url();?>award-list" class="small-box-footer"><b>Click Here </b> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-4 col-xs-12">          
              <div class="small-box bg-purple">
                  <div class="inner">
                      <h3 style="font-size:28px">Picture Pedigree<sup style="font-size: 20px"></sup></h3>

                      <p>&emsp;</p>
                  </div>
                  <div class="icon">
                  <i class="fa fa-image"></i>
                  </div>
                  <a href="<?php echo base_url();?>pedigree" class="small-box-footer"><strong>Click Here</strong> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-4 col-xs-12">          
              <div class="small-box bg-gray">
                  <div class="inner">
                      <h3 style="font-size:28px">Usefull Links<sup style="font-size: 20px"></sup></h3>

                      <p>&emsp;</p>
                  </div>
                  <div class="icon">
                  <i class="fa fa-link"></i>
                  </div>
                  <a href="<?php echo base_url();?>reports#AkcLink" class="small-box-footer"><strong>Click Here </strong> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
        </div>
   

    </section>   
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script>  
  $(document).ready(function(){
   var _url = "<?php echo base_url(); ?>customer/kennel/set_notification";
   $.ajax({
			url: _url,
			type: "POST",
			processData:false,
			success: function(data){
        var resp = JSON.parse(data)
        if(resp.success == 'true'){
          $("#countNotify").html(resp.count);					
          $("#notification-latest").show();
          $("#notification-latest").html(resp.list);
        }
			},
			error: function(){}           
		});
   
});
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
