<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Gallery 
        <small>Gallery</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Add New Gallery</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">             
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <a href="<?php echo base_url(); ?>gallery/gallery_list" class="btn btn-info btn-xs pull-right" >List</a> 
            </div>                       
            <form role="form" method="post" action="<?php echo base_url() ?>gallery/add_gallery" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Photo Image</label>(Only jpg, jpeg, gif and png are allowed)
                      <input type="file" class="form-control" name="photo" id="photo" id="photo"   >
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Category</label>                     
                      <select name="category" id="category"  class="form-control">
                        <option value="">Select Category</option>
                         <?php if(isset($categoryList) && !empty($categoryList)): ?>
                            <?php foreach($categoryList as $category){ ?>
                              <option value="<?= $category['catgory_id'] ?>"><?= $category['category_name'] ?></option>
                            <?php } ?>
                         <?php endif;?>
                      </select>
                    </div>
                </div>
                               
              </div>             
              <div class="box-footer">                
                <button type="submit" class="btn btn-primary" name="gallery-form" onclick="return gallery_validation();">Submit</button>
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
<script>
  function gallery_validation(){

    $(".error").remove();
    var file =  $('#photo').val(); category
    if(file == ''){
        $('#photo').after('<span class="error" style="color:red;">Upload Product Image</span>');
        return false;
    } 
    var allowedExtensions =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(file)) {
      $('#photo').after('<span class="error" style="color:red;">Invalid Image Type</span>');
       
        return false;
    }
    var category =  $('#category').val(); 
    
    if(category == ''){
        $('#category').after('<span class="error" style="color:red;">Select category</span>');
        return false;
    } 
    return true;
}
</script>