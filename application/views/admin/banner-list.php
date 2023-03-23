<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Banner List
        <small>Banner tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Banner List</li>
      </ol>
    </section>
    <section class="content" style="min-height: 50px;">
     
        <a href="<?php echo base_url(); ?>banner/add_banner" class="btn bg-maroon margin btn-sm" style="float:right"> <i class="fa  fa-plus"></i> Add New</a>
       
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <?php
	        if($this->session->flashdata('error')) {
	            ?>
              <div class="callout callout-danger">
                <p><?php echo $this->session->flashdata('error'); ?></p>
              </div>
	            <?php
	        }
	        if($this->session->flashdata('success')) {
	            ?>
              <div class="alert alert-success alert-dismissible">
                <p><?php echo $this->session->flashdata('success'); ?></p>
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
                  <th>Banner </th>
                  <th>Title</th>
                   <th>Created By</th>             
                  <th>Added Date</th>                  
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($bannerList)): ?>
                      <?php $i=1; foreach($bannerList as $addbaner): ?>
                        <tr> 
                          <td><?= $i ?></td>
                          <td>
                            <img src="<?php if(isset($addbaner['banner']) && !empty($addbaner['banner'])){ echo base_url(); ?>uploads/addvertisementbanner/<?= $addbaner['banner'];}?>" alt="Banner Image" style="width:50px">
                          </td>  
                          <td><?= $addbaner['title']; ?></td>                       
                          <td><?= $addbaner['firstname']; ?></td>
                          <td><?= date('d-m-Y',strtotime($addbaner['created_at'])); ?></td>   
                                     
                          <td>
                          <a href="<?php echo base_url() ?>banner/edit_banner/<?php echo $addbaner['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo base_url()?>banner/delete_banner/<?php echo $addbaner['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a> 
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