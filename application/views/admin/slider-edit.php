<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>Slider</h1>     
    </section>    
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">             
          <div class="box box-primary">                                  
            <form role="form" method="post" action="<?php echo base_url() ?>slider/edit_slider/<?php echo $sliderRow['slider_id'];  ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="form-group">
                    <label for="" class="control-label">Existing Banner</label>
                    <img src="<?php echo base_url(); ?>uploads/banner/<?php echo $sliderRow['banner']; ?>" alt="Slider Photo" class="img-responsive" style="hight:200px">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Image</label>(Only jpg, jpeg, gif and png are allowed)
                      <input type="file" class="form-control" name="banner_img" id="banner_img" id="banner_img"   >
                      <input type="hidden" name="old_img" value="<?php  echo $sliderRow['banner']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Bold Text</label>(Give Only Limited words)
                      <input type="text" class="form-control" name="banner_bold_text" value="<?php echo ($sliderRow['bold_heading'])?$sliderRow['bold_heading']:'';  ?>" id="banner_bold_text">
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="file">Small Text</label>(Give Only Limited words)
                      <input type="text" class="form-control" name="banner_small_text" value="<?php echo ($sliderRow['small_text_msg'])?$sliderRow['small_text_msg']:'';  ?>" id="banner_small_text">
                    </div>
                </div>
                   <input type="hidden" name="slider_id" value="<?php echo $sliderRow['slider_id'];  ?>">            
              </div>             
              <div class="box-footer">                
                <button type="submit" class="btn btn-primary" name="edit-slider-form" >Submit</button>
                <a href="<?php echo base_url(); ?>slider" class="btn btn-info pull-right" >Return</a>
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
    var file =  $('#banner_img').val();
    // if(file == ''){
    //     $('#banner_img').after('<span class="error" style="color:red;">Upload Product Image</span>');
    //     return false;
    // }
    var allowedExtensions =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(file)) {
      $('#banner_img').after('<span class="error" style="color:red;">Invalid Image Type</span>');
       
        return false;
    }
    return true;
}
</script>