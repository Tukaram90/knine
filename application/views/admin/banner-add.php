<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Banner Form 
        <small>Banner</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Add New Banner</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">             
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <a href="<?php echo base_url(); ?>banner" class="btn btn-info btn-xs pull-right" ><i class="fa fa-list"></i> List</a> 
            </div>                       
            <form role="form" method="post" action="<?php echo base_url() ?>banner/add_banner" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="file">Banner Title</label>
                      <input type="text" class="form-control" name="title" id="title" >
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="file">Banner Image</label>(Only jpg, png are allowed)
                      <input type="file" class="form-control" name="banner_img" id="banner_img" >
                    </div>
                </div>
                        
              </div>             
              <div class="box-footer">                
                <button type="submit" class="btn btn-primary" name="banner-form" onclick="return banner_validation();">Submit</button>
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
  function banner_validation(){

    $(".error").remove();

    var file =  $('#title').val();
    if(file == ''){
        $('#title').after('<span class="error" style="color:red;">Title should not empty</span>');
        return false;
    }

    var file =  $('#banner_img').val();
    if(file == ''){
        $('#banner_img').after('<span class="error" style="color:red;">Upload Banner Image</span>');
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