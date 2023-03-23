<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Category Form 
        <small>Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Add New Category</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">             
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <a href="<?php echo base_url(); ?>category/category_list" class="btn btn-info btn-xs pull-right" >List</a> 
            </div>                       
            <form role="form" method="post" action="<?php echo base_url() ?>category/add_category">
              <div class="box-body">
                <div class="form-group">
                  <label for="Category">Category</label>
                  <input type="text" class="form-control" name="category" id="category"id="category" value="<?php echo (isset($category['category_name']) && !empty($category['category_name']))?$category['category_name']:'' ?>" placeholder="Category" autocomplete="off" autofocus requird>
                </div>
                <div class="form-group">
                  <label for="Status">Status</label>
                  <select class="form-control" name="cat_status" id="cat_status">
                    <option value="">Select status</option>
                    <option value="1" <?php if(isset($category['active']) && $category['active']=="1") echo "selected";?> >Active</option>
                    <option value="0" <?php if(isset($category['active']) && $category['active']=="0") echo "selected";?>>Inactive</option>                   
                  </select>
                </div>                
              </div>             
              <div class="box-footer">
                <input type="hidden" name="catgory_id" value="<?php echo (isset($category['catgory_id']) && !empty($category['catgory_id']))?$category['catgory_id']:'' ?>">
                <button type="submit" class="btn btn-primary" name="catgory-form" onclick="return category_validation();">Submit</button>
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

  function category_validation(){

    $(".error").remove();
    var category = $('#category').val();
    if(category == ''){
        $('#category').after('<span class="error" style="color:red;">Enter Category</span>');
        return false;
    }
    var cat_status = $('#cat_status').val();
    
    if(cat_status == ''){
        $('#cat_status').after('<span class="error" style="color:red;">Select Category Status</span>');
        return false;
    }
    return true;
}
</script>