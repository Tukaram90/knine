<?php $this->load->view('useradmin/comman/userheader'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>   
    <section class="content">          
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="info-box">                
          <span class="info-box-icon bg-yellow"><i class="fa fa-hand-o-right"></i></span>                
          <div class="info-box-content" style="padding: 2px 10px !important;">
            <span class="info-box-text">Dog Details</span>
            <a href="<?php echo base_url();?>kennel-list" title="Dog Details" class="<?php if($active == 'kennellist' || $active == 'addkennel' || $active == 'Hierarchical' || $active == 'treestructure' || $active == 'EditDog'){ echo 'activeSubheading'; }?>"><span class="info-box-text">Add Dog</span></a>
            <a href="<?php echo base_url();?>shows" title="Book Event" class="<?php if($active == 'Show'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Shows</span></a>
            <a href="<?php echo base_url();?>award-list" title="Award" class="<?php if($active == 'AwardList' || $active == 'addAward' || $active == 'EditAward' ){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Award</span></a>
            
          </div>           
        </div>         
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><i class="fa fa-rupee"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Cost</span>                  
            <a href="<?php echo base_url();?>expense-list" title="Cost Operation" class="<?php if($active == 'expense' ||  $active=='addexpense'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Cost</span></a>
          </div>           
        </div>         
      </div>     
            
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-maroon"><i class="fa  fa-stethoscope"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Vaccination</span>
            <a href="<?php echo base_url();?>vaccination-list" title="Vaccination History" class="<?php if($active == 'GettingVaccination' || $active == 'vaccinationList' || $active == 'newVaccination' || $active =='EditVaccination' || $active == 'DetailsVaccination'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Vaccination</span></a>
          </div>           
        </div>         
      </div>          
       
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-image"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Advertise</span>
            <a href="<?php echo base_url();?>advertise" title="Advertise" class="<?php if($active == 'Advertise'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Advertise</span></a>
          </div>           
        </div>         
      </div>          
   

    </section>   
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
  // calendor for only month and year
  var dp=$("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
 });

 $("#datepickerforyear").datepicker({
     format: "yyyy",
     viewMode: "years", 
     minViewMode: "years",
     autoclose:true
  });   
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
