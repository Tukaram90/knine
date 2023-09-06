<?php $this->load->view('admin/comman/header'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
         Dog Details        
      </h1>
    </section>
    
    <section class="invoice">
      
        <div class="row">
            <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Details Page
            </h2>
            </div>        
        </div>
      
       <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">          
                <address>
                    <strong>Owner Name</strong><br>
                    <?= $dogDetails['fullname'] ?>
                </address>
            </div>
        
            <div class="col-sm-2 invoice-col">          
                <address>
                    <strong>Mobile Number</strong><br>
                    <?= $dogDetails['mobile'] ?>
                </address>
            </div>
        
            <div class="col-sm-4 invoice-col">
             <b>Email</b><br>
             <?= $dogDetails['email'] ?>
            </div>        
       </div>
      
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            
            <tbody>
            <tr>
              <th>Dog Name</th>
              
              <td><?= strtoupper($dogDetails['dog_name']); ?></td>
              
            </tr>
            <tr>
              <th>Dog Type</th>
              
              <td><?= strtoupper($dogDetails['kennel_type']); ?></td>
              
            </tr>
            <tr>
              <th>Weight</th>
              
              <td><?= strtoupper($dogDetails['weight']); ?></td>
            </tr>
            <tr>
              <th>Color</th>
              
              <td><?= strtoupper($dogDetails['color']); ?></td>
            </tr>
            <tr>
              <th>Gender</th>
              
              <td><?= strtoupper($dogDetails['gender']); ?></td>
            </tr>
            <tr>
              <th>Image</th>
              
              <td>
              <img src="<?php if(isset($dogDetails['dog_img']) && !empty($dogDetails['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $dogDetails['dog_img'];}else{ echo "https://via.placeholder.com/50";}?>" alt="Dogs Image" style="width:50px">
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <a href="<?php echo base_url(); ?>mastersetting/fetch_kennels_list" class="pull-right btn btn-info">
        <i class="fa fa-list"></i> Back </a>
      </div>   
      
    </section>   
    <div class="clearfix"></div>
  
</div>  
<?php $this->load->view('admin/comman/footer'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('admin/comman/js'); ?>
