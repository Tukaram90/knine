<?php $this->load->view("web/header"); ?>
   <section id="services" class="pages">
      <div class="jumbotron" data-stellar-background-ratio="0.5">           
         <div class="jumbo-heading" data-stellar-background-ratio="1.2">                
            <h1><?php echo ucfirst($dogDetails['dog_name']).' Details'; ?></h1>
         </div>
      </div>

      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <h3>Pic</h3>
               <img src="<?php if(isset($dogDetails['dog_img']) && !empty($dogDetails['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $dogDetails['dog_img'];}?>" class="img-rounded img-responsive" alt="">
            </div>
            
            <div class="col-md-6 res-margin">
               <h4><Details></Details></h4>
               <ul class="custom no-margin">
                  <li><span><b>Name </b></span><?php echo ucfirst($dogDetails['dog_name']); ?> </li>
                  <li><span><b>Age </b></span><?php echo ucfirst($dogDetails['age']); ?> </li>
                  <li><span><b>Weight </b></span><?php echo ucfirst($dogDetails['weight']); ?> </li>
                  <li><span><b>Date Of Birth </b></span><?php echo ucfirst($dogDetails['date_of_birth']); ?> </li>
                  <li><span><b>Color </b></span><?php echo ucfirst($dogDetails['color']); ?> </li>
                  <li><span><b>Gender </b></span><?php echo ucfirst($dogDetails['gender']); ?> </li>
                  <li><span><b>Type </b></span><?php echo ucfirst($dogDetails['kennel_type']); ?> </li>                  
               </ul>                 
            </div>              
         </div>           
      </div>
      
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <h3>Description</h3>
               <p>
                  <?php echo ucfirst($dogDetails['description']); ?>
               </p>
               
               <a class="btn" href="<?php echo base_url(); ?>home">
               <i class="fa fa-angle-double-left"></i> Home 
               </a>
            </div>
            
            <div class="col-md-6 res-margin">
               <h4>Key Features</h4>
               <ul class="custom no-margin">
                  <p>  <?php echo ucfirst($dogDetails['feature']); ?> </p>
                  
               </ul>                 
            </div>              
         </div>           
      </div>        
      <div class="container-fluid margin1">
         <div id="owl-featured" class="owl-carousel no-padding margin1">              
            <?php if(isset($imgDogslider) && !empty($imgDogslider)): ?>
               <?php foreach ($imgDogslider as $dog) { ?>
                  <div class="col-md-12">
                     <a href="<?php if(isset($dog['dog_img']) && !empty($dog['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $dog['dog_img'];}?>" data-gal="prettyPhoto[gallery]" title="">
                     <img src="<?php if(isset($dog['dog_img']) && !empty($dog['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $dog['dog_img'];}?>" class="img-rounded img-responsive" alt="">
                     </a>
                  </div>
               <?php } ?>
            <?php endif ?>  
            
         </div>            
      </div>        
   </section>
<?php $this->load->view("web/footer"); ?>
