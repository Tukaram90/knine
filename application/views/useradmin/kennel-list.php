<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Dog List        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dog List</li>
      </ol>
    </section>  
    <section class="content">     
       
        <div class="row">
            <div class="col-md-12">
                <?php
                    if($this->session->flashdata('error')) {
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    
                        <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?></p>
                        </div>
                        <?php
                    }
                    if($this->session->flashdata('success')) {
                        ?>
                        
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        
                        <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                        <?php
                    }
                ?>        
            </div>
        </div>
          
        <div class="row">
            <div class="col-xs-12">
           
          <div class="box">
                  
            <div class="box-body">
              <div class="row">
              <a href="<?php echo base_url(); ?>customer/kennel/see_all_dog_details" class="btn btn-success pull-right" style="margin-bottom: 3px;margin-right: 15px;" title="Pic Pedigree"><i class="fa fa-paw"></i></a>
                <a href="<?php echo base_url(); ?>add-kennel" class="btn btn-info pull-right" style="margin-bottom: 3px;margin-right: 15px;" title="Add Dog"><i class="fa fa-plus"></i></a>
              </div> 
              <table id="example1" class="table table-bordered table-striped" style="overflow: scroll;">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Dog Name </th>
                  <th>Registration</th>
                  <th>Microchip No</th>                  
                  <th>Breed</th>
                  <th>Have Child</th>                  
                  <th>Sex</th> 
                  <th>Birthdate</th>                 
                  <th>Image</th>
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($dogListByUserDetails)): ?>
                      <?php $i=1; foreach($dogListByUserDetails as $row): ?>
                        <tr> 
                          <td><?= $i ?></td>
                          <td><?= $row['dog_name'] ?></td> 
                          <td><?= $row['registration_no'] ?></td>
                          <td><?= $row['chip_number'] ?></td>                          
                          <td><?= $row['kennel_type'] ?></td>
                          <td>
                            <?php 
                               $this->db->select('dog_name');
                               $this->db->from('tbl_dogs');
                               $this->db->where('parent_id',$row['dog_id']);
                               $query = $this->db->get();
                               
                               $result = $query->result_array();
                              
                               foreach($result as $res){
                            ?>
                              <p><?php echo $res['dog_name']; ?></p>
                            <?php } ?>
                          </td>
                          <td><?= $row['gender'] ?></td>
                          <td><?= $row['date_of_birth'] ?></td>
                          <td>
                            <img src="<?php if(isset($row['dog_img']) && !empty($row['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $row['dog_img'];}else{ echo "https://via.placeholder.com/50";}?>" alt="Dogs Image" style="width:50px">
                          </td>
                          <td>
                          <a href="<?php echo base_url() ?>edit-dog/<?php echo $row['dog_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <!-- <a href="<?php echo base_url()?>delete-dog/<?php echo $row['dog_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>  -->
                          <a href="<?php echo base_url()?>remove-dog-tem/<?php echo $row['dog_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-close"></i></a> 
                          <a href="<?php echo base_url()?>dog-tree-view/<?php echo $row['dog_id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a> 
                          <!-- <a href="<?php echo base_url()?>img-operation/<?php echo $row['dog_id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-image"></i></a>  -->
                          </td>              
                         
                        </tr>
                      <?php $i++; endforeach ?>
                    <?php endif ?>				
				        </tbody>               
              </table>
            </div>           
          </div>         
        </div>       
      </div>          
        
    </section> 
      
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>