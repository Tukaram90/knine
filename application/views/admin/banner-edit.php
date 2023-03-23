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
        <li class="active">Edit Banner</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">             
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <a href="<?php echo base_url(); ?>banner" class="btn btn-info btn-xs pull-right"><i class="fa fa-list"></i> List</a> 
            </div>                       
            <form role="form" method="post" action="<?php echo base_url() ?>banner/edit_banner/<?php echo $bannerRow['id'];  ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="form-group">
                    <label for="" class="control-label">Existing Banner</label>
                    <img src="<?php echo base_url(); ?>uploads/addvertisementbanner/<?php echo $bannerRow['banner']; ?>" alt="Banner Photo" class="img-responsive" style="hight:200px">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Image</label>(Only jpg, jpeg,and png are allowed)
                      <input type="file" class="form-control" name="banner_img" id="banner_img" id="banner_img"   >
                      <input type="hidden" name="old_img" value="<?php  echo $bannerRow['banner']; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Banner Title</label>
                      <input type="text" class="form-control" name="title" id="title" value="<?php  echo $bannerRow['title']; ?>">
                    </div>
                </div>
                
                <input type="hidden" name="id" value="<?php echo $bannerRow['id'];  ?>">            
              </div>             
              <div class="box-footer">                
                <button type="submit" class="btn btn-primary" name="edit-banner-form" >Submit</button>
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