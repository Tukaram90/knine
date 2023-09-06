<?php $this->load->view('useradmin/comman/userheader'); ?>
<div class="content-wrapper">
    <section class="content-header dashscreenshowForMobile">
      <h1>
        Dashboard
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>   
    <section class="content dashscreenshowForMobile">          
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="info-box">                
          <span class="info-box-icon bg-yellow"><i class="fa fa-hand-o-right"></i></span>                
          <div class="info-box-content" style="padding: 2px 10px !important;">
            <span class="info-box-text">Dog Details</span>
            <a href="<?php echo base_url();?>kennel-list" title="Dog Details" class="<?php if($active == 'kennellist' || $active == 'addkennel' || $active == 'Hierarchical' || $active == 'treestructure' || $active == 'EditDog'){ echo 'activeSubheading'; }?>"><span class="info-box-text">Add Dog</span></a>
            <a href="<?php echo base_url();?>shows" title="Book Event" class="<?php if($active == 'Show'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">CALENDAR</span></a>
            <!--<a href="<?php echo base_url();?>award-list" title="Award" class="<?php if($active == 'AwardList' || $active == 'addAward' || $active == 'EditAward' ){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Show Records</span></a>-->
            <a href="<?php echo base_url();?>shows-list" title="Show" class="<?php if($active == 'showList' || $active == 'addShow' || $active == 'editShow' ){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Show RECORDS</span></a>
            
          </div>           
        </div>         
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><?= set_currency() ?></span>
          <div class="info-box-content">
            <span class="info-box-text">EXPENSE</span>                  
            <a href="<?php echo base_url();?>expense-list" title="Expense Operation" class="<?php if($active=='addexpense' || $active == 'expense'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Add Expense</span></a>
           <a href="<?php echo base_url();?>handler-expense" title="Handler Operation" class="<?php if($active=='addHandlerExpense' || $active == 'HandlerExpenseList' || $active == 'EditHandlerExpense'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Handler Expense</span></a>
            <a href="<?php echo base_url();?>reports" ><span class="info-box-text">summary</span></a>
            
          </div>           
        </div>         
      </div>     
            
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-maroon"><i class="fa  fa-stethoscope"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Vaccination</span>
             <a href="<?php echo base_url();?>vaccination-list" title="Vaccination History" class="<?php if($active == 'GettingVaccination' || $active == 'newVaccination' || $active =='EditVaccination' || $active == 'DetailsVaccination' ||  $active == 'vaccinationList'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Add Vaccination</span></a>
            <!--<a href="<?php echo base_url();?>vaccination-list" title="Vaccination History" class="<?php if($active == 'GettingVaccination' || $active == 'vaccinationList' ){ echo 'activeSubheading'; } ?>"><span class="info-box-text">List</span></a>-->
          </div>           
        </div>         
      </div>          
       
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-image"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Advertise</span>
            <a href="<?php echo base_url();?>advertise" title="Advertise" class="<?php if($active == 'Advertise'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Create Ad</span></a>
            <a href="<?php echo base_url();?>downloaded-banner" title="Downloaded History" class="<?php if($active == 'History'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Ads</span></a>
             <a href="<?php echo base_url();?>pedigree" title="Pedigree" class="<?php if($active == 'Pedigree'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Pedigree</span></a>
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
