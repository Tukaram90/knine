<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/imgmakerasset/imageMaker.min.css">

<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Gallery       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Gallery</li>
      </ol>
    </section>  

    <section class="content">
        <div class="box">
            <div class="timeline-body">
                <?php foreach($downlodedImgs as $imges){ ?>
                    <img src="<?php  echo base_url( $imges); ?>"  style="width:150px;height:100" class="margin">                
                <?php } ?>
            </div>
        </div>
    </section>
    
      
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>

