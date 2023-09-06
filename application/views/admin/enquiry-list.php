<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Enquiry List
        <small>Enquiry tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Enquiry List</li>
      </ol>
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
              <table id="example1" class="table table-bordered table-striped table-responsive tblScrollable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Username </th>
                                   
                  <th>Email</th> 
                  <th>Subject</th>                 
                  <th>Message</th>
                  <th>Date</th>                  
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($enquiry)): ?>
                      <?php $i=1; foreach($enquiry as $row): ?>
                        <tr> 
                          <td><?= $i ?></td>
                          <td>
                          <?= $row['fullname'] ?>
                          </td> 
                          
                          <td><?= $row['email'] ?></td>
                          <td><?= $row['subject'] ?></td>
                          <td><?= $row['message'] ?></td>
                          <td><?= date('d-m-Y',strtotime($row['created_date'])); ?></td>                
                         
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