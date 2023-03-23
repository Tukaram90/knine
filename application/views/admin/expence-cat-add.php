<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Expence category 
        <small>Expence category </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Add New Expence category </li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">             
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <a href="<?php echo base_url(); ?>mastersetting/expence_category" class="btn btn-warning pull-right" title="Back to List"><i class="fa fa-list"></i></a> 
            </div>                       
            <form role="form" method="post" action="<?php echo base_url() ?>mastersetting/add_kennel_type">
              <div class="box-body">
                <div class="form-group">
                  <label for="kennel_type">Expence Category Title</label>
                  <input type="text" class="form-control" name="expence_category_name" id="expence_category_name" id="expence_category_name" value="<?php echo (isset($KennelType['kennel_type']) && !empty($KennelType['kennel_type']))?$KennelType['kennel_type']:'' ?>" placeholder="Expence category" autocomplete="off" autofocus requird>
                </div>
                               
              </div>             
              <div class="box-footer">
                <input type="hidden" name="kennel_type_id" value="<?php echo (isset($KennelType['id']) && !empty($KennelType['id']))?$KennelType['id']:'' ?>">
                <button type="submit" class="btn btn-primary" name="expence-category-form">Submit</button>
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