<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Slider Form 
        <small>Slider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Add New Slider</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">             
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <a href="<?php echo base_url(); ?>slider" class="btn btn-info btn-xs pull-right" >List</a> 
            </div>                       
            <form role="form" method="post" action="<?php echo base_url() ?>slider/add_slider" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Banner Image</label>(Only jpg, jpeg, gif and png are allowed)
                      <input type="file" class="form-control" name="banner_img" id="banner_img" id="banner_img"   >
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Bold Text</label>(Give Only Limited words)
                      <input type="text" class="form-control" name="banner_bold_text" id="banner_bold_text">
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="file">Small Text</label>(Give Only Limited words)
                      <input type="text" class="form-control" name="banner_small_text" id="banner_small_text">
                    </div>
                </div>
                               
              </div>             
              <div class="box-footer">                
                <button type="submit" class="btn btn-primary" name="slider-form" onclick="return slider_validation();">Submit</button>
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
    if(file == ''){
        $('#banner_img').after('<span class="error" style="color:red;">Upload Product Image</span>');
        return false;
    }
    var allowedExtensions =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(file)) {
      $('#banner_img').after('<span class="error" style="color:red;">Invalid Image Type</span>');
       
        return false;
    }
    return true;
}
</script>