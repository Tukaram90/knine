<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header"><h1>Subscription Plan List </h1></section>

    <section class="content" style="min-height: 50px;">     
       
    </section>

    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div id="msgDiv">
            <?php
                  if($this->session->flashdata('error')) {
                      ?>
                      <div class="callout callout-danger">
                        <p><?php echo $this->session->flashdata('error'); ?></p>
                      </div>
                      <?php
                      unset($_SESSION['error']);
                  }
                  if($this->session->flashdata('success')) {
                      ?>
                      <div class="alert alert-success alert-dismissible">
                        <p><?php echo $this->session->flashdata('success'); ?></p>
                      </div>
                      <?php
                      unset($_SESSION['success']);
                  }
              ?> 
          </div>         
          <div class="box">
          <a href="<?php echo base_url(); ?>subscription/add_subscriptio_plan" class="btn bg-maroon margin btn-sm" style="float:right"> <i class="fa  fa-plus"></i> Add New</a>      
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Plan Name </th>
                  <th>Price</th> 
                  <th>Validity</th>                 
                  <th>Added Date</th>                  
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($subplan)): ?>
                      <?php $i=1; foreach($subplan as $plan): ?>
                        <tr> 
                          <td><?= $i ?></td>
                          <td><a href="<?php echo base_url() ?>subscription/edit_subscription_plan/<?php echo $plan['id']; ?>"><?php echo ($plan['name'])?$plan['name']:""?></a></td>
                          <td><a href="<?php echo base_url() ?>subscription/edit_subscription_plan/<?php echo $plan['id']; ?>"><?php echo ($plan['price'])?$plan['price']:""?></a></td>
                          <td><a href="<?php echo base_url() ?>subscription/edit_subscription_plan/<?php echo $plan['id']; ?>"><?= $plan['plan_validity']; ?></a></td>
                          <td><a href="<?php echo base_url() ?>subscription/edit_subscription_plan/<?php echo $plan['id']; ?>"><?= date('d-m-Y',strtotime($plan['created_date'])); ?></a></td>                
                          <td>
                          <a href="<?php echo base_url() ?>subscription/edit_subscription_plan/<?php echo $plan['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo base_url()?>subscription/delete_subscription_plan/<?php echo $plan['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a> 
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

  $(document).ready(function () {
    $('#msgDiv').delay(1500).fadeOut();
  });
</script>