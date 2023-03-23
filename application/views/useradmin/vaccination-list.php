<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Vaccination History        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vaccination List</li>
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
                <a href="<?php echo base_url(); ?>add-vaccination" class="btn btn-info pull-right" style="margin-bottom: 3px;margin-right: 15px;" title="Add New Vaccination"><i class="fa fa-plus"></i></a>
              </div> 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Dog Name</th>
                  <th>Vaccine</th>                 
                  <th>Vaccinated Date</th>
                  <th>Next Appointment Date</th>                           
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                    <?php if(!empty($vaccinatedDaetails)): ?>
                      <?php $i=1; foreach($vaccinatedDaetails as $row): ?>
                        <tr> 
                          <td><?= $i ?></td>
                          
                          <td><a href="<?php echo base_url()?>vaccination-details/<?php echo $row['id']; ?>"><?= ucfirst($row['dog_name']) ?></a></td>
                          <td>
                            <ul>
                              <?php foreach($row['vaccineDetails'] as $vaccine){ ?>
                                <li><?= $vaccine['vaccination_name'] ?></li>                              
                              <?php } ?>
                            </ul>
                          </td>
                          <td>
                            <?php foreach($row['vaccineDetails'] as $vaccine){ ?>
                              <li><?= $vaccine['vaccination_date'] ?></li>                              
                            <?php } ?>
                          </td> 
                          <td>
                            <?php foreach($row['vaccineDetails'] as $vaccine){ ?>
                              <li><?= date("Y-m-d",strtotime($vaccine['next_appointment']));  ?></li>                              
                            <?php } ?>
                          </td>                          
                          <td>
                            <a href="<?php echo base_url(); ?>getting-vaccinated-list/<?php echo $row['dog_id']; ?>" class="btn btn-primary btn-xs" ><i class="fa fa-list"></i></a>
                            <!-- <a href="<?php echo base_url() ?>edit-vaccination/<?php echo $row['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url()?>delete-dose/<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>  -->
                            <a href="<?php echo base_url()?>vaccination-details/<?php echo $row['id']; ?>" class="btn btn-info btn-xs" ><i class="fa fa-eye"></i></a> 

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