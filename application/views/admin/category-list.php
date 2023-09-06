<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header"><h1> Category </h1></section>
    <section class="content" style="min-height: 50px;">     
        <a href="<?php echo base_url(); ?>category/add_category" class="btn bg-maroon margin btn-sm" style="float:right"> <i class="fa  fa-plus"></i> Add New</a>
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
              unset($_SESSION['error']);
	        }
	        if($this->session->flashdata('success')) {
	            ?>             
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><i class="icon fa fa-check"></i>  <?php echo $this->session->flashdata('success'); ?></p>               
              </div>
	            <?php
              unset($_SESSION['success']);
	        }
	        ?>           
          <div class="box">                   
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($cagoryInfo) && !empty($cagoryInfo)){
                    $i=0;							
                    foreach ($cagoryInfo as $row) {
                     
                      $i++;
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><a href="<?php echo base_url() ?>category/add_category/<?php echo $row['catgory_id']; ?>"><?php echo $row['category_name']; ?></a></td>
                        <td>
                          <?php if($row['active']==1){ ?>
                            <a href="<?php echo base_url() ?>category/add_category/<?php echo $row['catgory_id']; ?>">
                            <span class="label label-success">Active</span>
                          </a>
                          <?php }else{ ?>
                            <a href="<?php echo base_url() ?>category/add_category/<?php echo $row['catgory_id']; ?>">
                            <span class='label label-warning'>Inactive</span>
                          </a>
                          <?php } ?>
                       </td>
                        <td>
                          <a href="<?php echo base_url() ?>category/add_category/<?php echo $row['catgory_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
                          <a href="<?php echo base_url()?>category/delete_category/<?php echo $row['catgory_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Delete</a> 
                        </td>
                      </tr>
                      <?php
                    } 
                  }
                  ?>							
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