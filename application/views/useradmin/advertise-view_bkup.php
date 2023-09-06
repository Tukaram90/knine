<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/imgmakerasset/imageMaker.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Advertise        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Advertise</li>
      </ol>
    </section>  

    <section class="content">
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div id="memegenerator"></div>
        </div>
       
        
        
        </div>
    </section>
    
      
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/imgmakerasset/imageMaker.min.js"></script>
<script>
     $( document ).ready(function() {
       
        $('#memegenerator').imageMaker( {templates:[
            {url: '<?php echo base_url(); ?>assets/dist/template/sky.JPG', title:'Sky Background'},
            {url: '<?php echo base_url(); ?>assets/dist/template/goldensunset.JPG', title:'Golden Sunset background'},
            {url: '<?php echo base_url(); ?>assets/dist/template/green.JPG', title:'Green Background'},
            {url: '<?php echo base_url(); ?>assets/dist/template/skyblue.JPG', title:'Skyblue Background'},
            {url: '<?php echo base_url(); ?>assets/dist/template/sunset.JPG', title:'Skyblue Background'},
            {url: '<?php echo base_url(); ?>assets/dist/template/smokesky.JPG', title:'Variant Skyblue Background'},
            
        ],});        

        $('#image-maker').imageMaker();
       //The following code is for animate scrolling when open the page
       jQuery([document.documentElement, document.body]).animate({
        scrollTop: jQuery("#"+jQuery(":target").attr('id')).offset().top
    }, 1000);
    });
  </script>