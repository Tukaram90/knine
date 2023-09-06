<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       QR Form 
        <small>QR Generate</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Add New Text For Qr Code</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"> 
        <?php
	        if($this->session->flashdata('error')) {
	            ?>
              <div class="alert alert-danger alert-dismissible">
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
          <div class="box box-primary"> 
            <!-- <div class="box-header with-border">
              <a href="<?php echo base_url(); ?>category/category_list" class="btn btn-info btn-xs pull-right" >List</a> 
            </div>                        -->
            <form role="form" method="post" action="<?php echo base_url() ?>QrController/qrcodeGenerator">
              <div class="box-body">
                <div class="form-group">
                  <label for="Category">Enter Text For Qr Code Generation:</label>
                  <input type="text" class="form-control" name="qrcode_text" id="qrcode_text"id="qrcode_text"  autocomplete="off" autofocus requird>
                </div>
                         
              </div>             
              <div class="box-footer">
               
                <button type="submit" class="btn btn-primary" name="catgory-form">Submit</button>
              </div>
            </form>
          </div> 
        </div>
        <div class="col-md-2"></div>        
      </div>     
    </section></div>  
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