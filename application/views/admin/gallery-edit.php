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
        <li class="active">Edit Gallery</li>
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
            <form role="form" method="post" action="<?php echo base_url() ?>gallery/edit_gallery/<?php echo $galleryRow['gallery_id'];  ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="form-group">
                    <label for="" class="control-label">Existing Photo</label>
                    <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $galleryRow['photo_name']; ?>" alt="Slider Photo" class="img-responsive" style="hight:200px">
                  </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="file">Product Image</label>(Only jpg, jpeg, gif and png are allowed)
                      <input type="file" class="form-control" name="photo" id="photo" id="photo"   >
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="file">Category</label>                     
                      <select name="category" id="category"  class="form-control">
                        <option value="">Select Category</option>
                         <?php if(isset($categoryList) && !empty($categoryList)): ?>
                            <?php foreach($categoryList as $category){ ?>
                              <option value="<?= $category['catgory_id'] ?>" <?= ($category['catgory_id']==$galleryRow['catgory_id'])?"selected":"" ?>><?= $category['category_name'] ?></option>
                            <?php } ?>
                         <?php endif;?>
                      </select>
                    </div>
                </div>
                   <input type="hidden" name="gallery_id" value="<?php echo $galleryRow['gallery_id'];  ?>">            
              </div>             
              <div class="box-footer">                
                <button type="submit" class="btn btn-primary" name="edit-galery-form" onclick="return slider_validation();">Submit</button>
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
  function slider_validation(){

    $(".error").remove();
    var file =  $('#photo').val();
    if(file == ''){
        $('#photo').after('<span class="error" style="color:red;">Upload Product Image</span>');
        return false;
    }
    var allowedExtensions =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(file)) {
      $('#photo').after('<span class="error" style="color:red;">Invalid Image Type</span>');
       
        return false;
    }
    return true;
}
</script>