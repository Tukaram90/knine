<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Expense List        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Expense List</li>
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
                <button class="btn btn-primary filterBtn" style="margin-bottom: 3px;margin-left: 15px;" title="Filter Records"><i class="fa fa-filter"></i></button>
                <a href="<?php echo base_url(); ?>add-expense" class="btn btn-info pull-right" style="margin-bottom: 3px;margin-right: 15px;" title="Add new expense"><i class="fa fa-plus"></i></a>
              </div>
              <?php if($expenseList): ?>      
              <div class="row" style="display:none" id="filterDiv">
                <form action="" method="post">
                  <div class="col-md-3">
                    <label for="expense_note">Start Date</label>
                    <input type="date" name="start_date" class="form-control"  id="start_date" value="<?php echo ($selectedStartDate)?$selectedStartDate:'';?>">
                  </div>
                  <div class="col-md-3">
                    <label for="expense_note">End Date</label>
                    <input type="date" name="end_date" class="form-control"  id="end_date" value="<?php echo ($selectedEndDate)?$selectedEndDate:'';?>">
                  </div>
                  <div class="col-md-3">
                    <label for="expense">Expense Category</label>
                    <select name="expense_cat" id="expense_cat" class="form-control"  style="width: 100%;">
                        <option value="">Select</option>
                        <?php foreach($expenceCategory as $cat ){  ?>
                        <option value="<?= $cat['id'] ?>" <?php if(!empty($selectedExpence) && isset($selectedExpence)){ if($cat['id']==$selectedExpence){echo"selected";} } ?>><?= $cat['title'] ?></option>
                        <?php }?>
                    </select>
                  </div>
                <div class="col-md-3"><br>
                <input type="submit" name="filter-cost-form" class="btn btn-info"  value="Submit" >
                </div>
                </form>
              </div>
              <?php endif ?>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Expense Type</th>
                        <th>Amount</th>
                        <th>Expense Date</th>
                        <th>Note</th>
                        <th>Action</th>                 
                    </tr>
                </thead>
                <tbody>
                    <?php if($expenseList): $i=1; ?>
                        <?php foreach($expenseList as $row){?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['amount'].' '.$row['currency'] ?></td>
                                <td><?= $row['expense_added_date'] ?></td>
                                <td><?= $row['expense_note'] ?></td>
                                <td>
                                    <a href="<?php echo base_url() ?>add-expense/<?php echo $row['expense_id']; ?>" class="label label-info"><i class="fa fa-edit" style="color:#fff"></i></a>
                                    <a href="<?php echo base_url()?>delete-expense/<?php echo $row['expense_id']; ?>" class="label label-danger" onClick="return confirm('Are you sure?');"><i class="fa fa-trash-o" style="color:#fff"></i></a>
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

    $(".filterBtn").click(function() {
            $("#filterDiv").fadeToggle();
    });
  })
</script>