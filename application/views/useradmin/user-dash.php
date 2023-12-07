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
          <span class="info-box-icon bg-green" style="height: 90px !important;"><i class="fa fa-image"style="top: 13px"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">PEDIGREE</span>
            <!--<a href="<?php echo base_url();?>advertise" title="Advertise" class="<?php if($active == 'Advertise'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Create Ad</span></a>
            <a href="<?php echo base_url();?>downloaded-banner" title="Downloaded History" class="<?php if($active == 'History'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Ads</span></a>-->
             <a href="<?php echo base_url();?>pedigree" title="Pedigree" class="<?php if($active == 'Pedigree'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Pedigree</span></a>
               <a href="<?php echo base_url();?>literacy" title="" class="<?php if($active == 'LiteracyStructure'){ echo 'activeSubheading'; } ?>"><span class="info-box-text">Litter Ad</span></a>
          </div>           
        </div>         
      </div>          
    
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">AKC Links</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="">
               <ul style="list-style-type:circle;padding-left:inherit;">
                  <li><a href="https://webapps.akc.org/event-search/#/search" target="_blank">AKC Event Search</a></li>
                  <li><a href="https://www.akc.org/rules/" target="_blank">AKC Rules and Regulation</a></li>
                  <li><a href="https://www.akc.org/register/" target="_blank">AKC Registration</a></li>
                  <li><a href="https://www.akc.org/sports/titles-and-abbreviations/" target="_blank">AKC Titles and Abbreviations</a></li>
                  <li><a href="https://shop.akc.org/" target="_blank">AKC Shop</a></li>
                  <li><a href="https://www.apps.akc.org/apps/judges_directory/" target="_blank">AKC Judges Directory</a></li>
                  <li><a href="https://www.akc.org/sports/conformation/akc-registered-handlers/" target="_blank">AKC Registered Handlers Program</a></li>
                  <li><a href="https://www.akc.org/sports/juniors/" target="_blank">AKC Juniors Resources</a></li>
                  <li><a href="https://www.akc.org/breeder-programs/dna/dna-resource-center/" target="_blank">AKC DNA Resource Center</a></li>
                  <li><a href="https://www.akc.org/sports/conformation/dog-show-ring-stewards/" target="_blank">AKC Ring Stewarding Information and certification</a></li>
                </ul>
            </div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">AKC Licensed Superintendents</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="">
               <ul style="list-style-type:circle;padding-left:inherit;">
                  <li><a href="http://www.barayevents.com/" target="_blank">BaRay Event Services</a></li>
                  <li><a href="http://www.foytrentdogshows.com/" target="_blank">Foy Trent Dog Shows</a></li>
                  <li><a href="http://www.jbradshaw.com/" target="_blank">Jack Bradshaw Dog Shows</a></li>
                  <li><a href="http://www.onofrio.com/" target="_blank">Jack Onofrio Dog Shows, LLC</a></li>
                  <li><a href="http://www.infodog.com/" target="_blank">MB-F Inc. / Infodog</a></li>
                  <li><a href="http://www.raudogshows.com/" target="_blank">Rau Dog Shows, Ltd</a></li>                      
                </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Other Helpful links</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="">
               <ul style="list-style-type:circle;padding-left:inherit;">
                  <li><a href="https://phadoghandlers.com/" target="_blank">Professional Handlers Association ( America )</a></li>
                  <li><a href="https://www.canadianprohandlers.ca/" target="_blank">Canadian Professional Handlers Association</a></li>
                  <li><a href="https://ofa.org/chic-programs/" target="_blank">OFA/CHIC Main Page ( Canine Health Information Center - DNA and Health testing )</a></li>
                  <li><a href="https://www.akc.org/dog-breeds/" target="_blank">AKC Breed Standards</a></li>
                  <li><a href="https://fci.be/en/nomenclature/" target="_blank">FCI Breed Standards</a></li>
                  <li><a href="https://fci.be/en/search.aspx?q=Judges+Directory" target="_blank">FCI Judges Directory</a></li>
                  <li><a href="https://www.ckc.ca/en/Join-CKC/Canadian-Kennel-Gazette" target="_blank">Canadian Kennel Club</a></li>                                            
                </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">AKC Dog Show Trade Magazines</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="">
              <ul style="list-style-type:circle;padding-left:inherit;">
                  <li><a href="https://www.akc.org/products-services/magazines/akc-gazette" target="_blank">AKC Gazette</a></li>
                  <li><a href="https://bismagazineusa.com/" target="_blank">Best In Show Magazine</a></li>
                  <li><a href="https://caninechronicle.com/" target="_blank">Canine Chronicle</a></li>
                  <li><a href="https://www.dognews.com/" target="_blank">Dog News</a></li>
                  <li><a href="https://showsightmagazine.com/" target="_blank">Show Site Magazine</a></li>
                  <li><a href="https://www.canadiandogfancier.com/" target="_blank">Canadian Dog Fancier</a></li>                                                               
                </ul>
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
