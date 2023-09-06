<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Show List        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Show List</li>
      </ol>
    </section>  
    <section class="content">     
       
        <div class="row">
            <div class="col-md-12">
                <?php
                    if($this->session->flashdata('error')) {
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    
                        <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?></p>
                        </div>
                        <?php
                    }
                    if($this->session->flashdata('success')) {
                        ?>
                        
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        
                        <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                        <?php
                    }
                ?>        
            </div>
        </div>
          
        <div class="row">
            <div class="col-xs-12">
           
          <div class="box">
                  
            <div class="box-body">
              <div class="row">
                <a href="<?php echo base_url(); ?>shows-add" class="btn btn-info pull-right" style="margin-bottom: 3px;margin-right: 15px;" title="Add new show"><i class="fa  fa-plus"></i></a>
              </div> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Dog Name</th>
                        <th>Club with Date</th>
                                               
                        <th>Action</th>                 
                    </tr>
                </thead>
                <tbody>
                    <?php if($showList): $i=1; ?>
                        <?php foreach($showList as $row){?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><a href="<?php echo base_url() ?>edit-show/<?php echo $row['id']; ?>"><?= $row['dog_name'] ?></a></td>
                                <td>
                                    <a href="<?php echo base_url() ?>edit-show/<?php echo $row['id']; ?>">
                                 <?php
                                  foreach($row['showDetails'] as $showDetails){
                                    echo $showDetails['club_name'].' '.date("d-m-Y", strtotime($showDetails['show_date'])).', ';
                                  }
                                  ?> 
                                  </a>
                                </td>
                                
                                <td>
                                    <a href="<?php echo base_url() ?>edit-show/<?php echo $row['id']; ?>" class="label label-info"><i class="fa fa-edit" style="color:#fff"></i></a>
                                    <a href="<?php echo base_url()?>delete-show/<?php echo $row['id']; ?>" class="label label-danger" onClick="return confirm('Are you sure?');"><i class="fa fa-trash-o" style="color:#fff"></i></a>
                                </td>
                            </tr>
                        <?php $i++; } ?>
                    <?php endif ?>		
				</tbody>               
              </table>
            </div>           
          </div>         
        </div>       
      </div>          
        
    </section> 
      
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
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