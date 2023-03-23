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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/socialbutton/sharerbox.js"></script>
<script>
     $( document ).ready(function() {
       
        $('#memegenerator').imageMaker( {templates:[
            <?php foreach ($bannerList as $row){ ?>
                {url: '<?php echo base_url(); ?>uploads/addvertisementbanner/<?= $row['banner']?>', title:'<?= $row['title']?>'},
            <?php } ?>
            // {url: '<?php echo base_url(); ?>assets/dist/template/sky.jpg', title:'Sky Background'},
            // {url: '<?php echo base_url(); ?>assets/dist/template/goldensunset.jpg', title:'Golden Sunset background'},
            // {url: '<?php echo base_url(); ?>assets/dist/template/green.jpg', title:'Green Background'},
            // {url: '<?php echo base_url(); ?>assets/dist/template/skyblue.jpg', title:'Skyblue Background'},
            // {url: '<?php echo base_url(); ?>assets/dist/template/sunset.jpg', title:'Skyblue Background'},
            // {url: '<?php echo base_url(); ?>assets/dist/template/smokesky.jpg', title:'Variant Skyblue Background'},
            
        ],});        
      
        $('#image-maker').imageMaker();
       //The following code is for animate scrolling when open the page
      
      
     
    //   var canvas =  document.querySelector('.amm_canvas').toDataURL();     
    //   console.log(canvas)
       jQuery([document.documentElement, document.body]).animate({
        scrollTop: jQuery("#"+jQuery(":target").attr('id')).offset().top

       
    }, 1000);
    
    });
  </script>


  <script>
  sharerbox({
  socialNetworks: 'facebook twitter whatsapp linkedin reddit',
  behavior: 'popup',
  position: 'right',
  color: 'black',
  visibility: true,
 });
</script>