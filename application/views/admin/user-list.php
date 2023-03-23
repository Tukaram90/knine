<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       User List        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">User List</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
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
                <p><i class="icon fa fa-check"></i>  <?php echo $this->session->flashdata('success'); ?></p>               
              </div>
	            <?php
	        }
	        ?>          
          <div class="box">
                   
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Kernal Name </th>
                  <th>Mobile</th>                  
                  <th>Email</th> 
                  <th>Address</th>                 
                  <th>Date</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($usersData)): ?>
                      <?php $i=1; foreach($usersData as $row): ?>
                        <tr> 
                          <td><?= $i ?></td>
                          <td>
                          <?= $row['fullname'] ?>
                          </td> 
                          <td><?= $row['mobile'] ?></td>
                          <td><?= $row['email'] ?></td>
                          <td><?= $row['address'] ?></td>                          
                          <td><?= date('d-m-Y',strtotime($row['created_at'])); ?></td>                
                          <td>
                            <?php if($row['status']=="Active"){ ?>
                              <a href="<?php echo base_url()?>admin/change_status/<?php echo $row['user_id']; ?>/Inactive" title="Change Status" class="btn btn-success btn-xs" onClick="return confirm('Are you sure want to Inactive user?');">Active</i></a> 

                              <?php }else{ ?>
                              <a href="<?php echo base_url()?>admin/change_status/<?php echo $row['user_id']; ?>/Active" title="Change Status" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to Active user?');">Inactive</i></a> 

                            <?php } ?>
                            <a href="<?php echo base_url()?>admin/delete_user/<?php echo $row['user_id']; ?>" title="Delete User" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i></a> 

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
<?php $this->load->view('admin/comman/footer'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('admin/comman/js'); ?>
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