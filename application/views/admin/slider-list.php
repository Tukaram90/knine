<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Slider List
        <small>Slider tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Slider List</li>
      </ol>
    </section>
    <section class="content" style="min-height: 50px;">
     
        <a href="<?php echo base_url(); ?>slider/add_slider" class="btn bg-maroon margin btn-sm" style="float:right"> <i class="fa  fa-plus"></i> Add New</a>
       
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
                  <th>Banner Bold Text</th> 
                  <th>Small Text</th>                 
                  <th>Added Date</th>                  
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($sliderList)): ?>
                      <?php $i=1; foreach($sliderList as $slider): ?>
                        <tr> 
                          <td><?= $i ?></td>
                          <td>
                            <img src="<?php if(isset($slider['banner']) && !empty($slider['banner'])){ echo base_url(); ?>uploads/banner/<?= $slider['banner'];}?>" alt="Banner Image" style="width:50px">
                          </td> 
                          <td><?php echo ($slider['bold_heading'])?$slider['bold_heading']:""?></td>
                          <td><?php echo ($slider['small_text_msg'])?$slider['small_text_msg']:""?></td>

                          <td><?= date('d-m-Y',strtotime($slider['created_date'])); ?></td>                
                          <td>
                          <a href="<?php echo base_url() ?>slider/edit_slider/<?php echo $slider['slider_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo base_url()?>slider/delete_slider/<?php echo $slider['slider_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a> 
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