<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Expence Category List
        <small>Expence Category List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>       
        <li class="active">Expence Category List</li>
      </ol>
    </section>
   
    <section class="content">
      <div class="row">
        <div class="col-xs-4">
            <div class="box box-primary"> 
                                    
                <form role="form" method="post" action="<?php echo base_url() ?>mastersetting/add_expence_category">
                <div class="box-body">
                    <div class="form-group">
                    <label for="kennel_type">Expence Category Title</label>
                    <input type="text" class="form-control" name="expence_category_name" id="expence_category_name" id="expence_category_name" value="<?php echo (isset($ExpenceCat['title']) && !empty($ExpenceCat['title']))?$ExpenceCat['title']:'' ?>" placeholder="Expence category"  requird>
                    </div>
                                
                </div>             
                <div class="box-footer">
                    <input type="hidden" name="expence_cat_id" value="<?php echo (isset($ExpenceCat['id']) && !empty($ExpenceCat['id']))?$ExpenceCat['id']:'' ?>">
                    <button type="submit" class="btn btn-primary" name="expence-category-form">Submit</button>
                </div>
                </form>
            </div> 
        </div>
        <div class="col-xs-8">
           <?php
	        if($this->session->flashdata('error')) {
	            ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    
                <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?></p>
              </div>
	            <?php
	            unset($_SESSION['error']);
	        }
	        if($this->session->flashdata('success')) {
	            ?>
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    
                  <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('success'); ?></p>
              </div>
	            <?php
	            unset($_SESSION['success']);
	        }
	        ?> 
                   
          <div class="box">                   
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped tblScrollable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title </th>                                  
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($ExpenceCatList)): ?>
                      <?php $i=1; foreach($ExpenceCatList as $row): ?>
                        <tr> 
                          <td><a href="<?php echo base_url() ?>mastersetting/add_expence_category/<?php echo $row['id']; ?>"><?= $i ?></a></td>
                          
                          <td><a href="<?php echo base_url() ?>mastersetting/add_expence_category/<?php echo $row['id']; ?>"><?= $row['title'] ?></a></td>
                                        
                          <td>
                          <a href="<?php echo base_url() ?>mastersetting/add_expence_category/<?php echo $row['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo base_url()?>mastersetting/delete_expence_cat/<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a> 
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