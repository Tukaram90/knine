<?php $this->load->view('useradmin/comman/userheader'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Vaccine with Dog Details  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Vaccine with Dog Details </li>
      </ol>
    </section>  
   
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa  fa-stethoscope"></i>
            <small class="pull-right"></small>
          </h2>
        </div>       
      </div>
      
      <div class="row invoice-info">
        <div class="col-md-4 col-sm-4 invoice-col">
           <p class="lead">Image</p>
           <img src="<?php if(isset($DoseInfo['dog_img']) && !empty($DoseInfo['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $DoseInfo['dog_img'];}else{ echo "https://via.placeholder.com/50";}?>" alt="Dogs Image" style="width:200px">
         </div>
         <div class="col-md-8 col-sm-8 invoice-col">
         <table class="table table-striped">
            <thead>
                
            </thead>
            <tbody>
                <tr>
                    <th>Dog Name</th>
                    <td><?= ucfirst($DoseInfo['dog_name']) ?></td>              
                </tr>
                <tr>
                    <th>Date Of Birth</th>
                    <td><?= ucfirst($DoseInfo['dog_birthdate']) ?></td>              
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?= ucfirst($DoseInfo['gender']) ?></td>              
                </tr>
                <tr>
                    <th>Register Number</th>
                    <td><?= $DoseInfo['registration_no'] ?></td>              
                </tr>
                <tr>
                    <th>Microchip Number</th>
                    <td><?= $DoseInfo['chip_number'] ?></td>              
                </tr>
            </tbody>
           
          </table>
         </div>
      </div>
      
      <hr>
      <div class="row">
        
        <div class="col-xs-12">
            Doctor Details
          <address>
            <strong><?= $DoseInfo['doctor_name'] ?></strong><br>            
            Phone: <?= $DoseInfo['doctor_contact'] ?><br>           
          </address>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <p class="lead">Vaccination Details</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Vaccine Name:</th>
                <th style="width:25%">Vaccinated Date:</th>
                               
              </tr>
              <?php foreach($DoseInfo['vaccineDetails'] as $row){?>
              <tr>                
                <td><?= $row['vaccination_name'] ?></td>
                <td><?= $row['vaccination_date'] ?></td>
               
              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
       
      </div>
     
      <div class="row no-print">
        <div class="col-xs-12">
          
          <a href="<?= base_url(); ?>vaccination-list" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-list"></i> List
          </a>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
