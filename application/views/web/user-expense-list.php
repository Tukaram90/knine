<?php
if(!$this->session->userdata('is_user_logged_in')) {
  redirect(base_url().'user');
}
?>
<?php $this->load->view("web/header"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .userliinkactive{
        color:black !important;
    }
</style>
<section id="blog" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">            
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Expense List</h1>
        </div>
    </div>
        
    <div class="container"> 
        <?php
            if($this->session->flashdata('error')) { 
                ?>
                <script>                                          
                    setTimeout(function(){ 
                        toastr.error('<?php echo $this->session->flashdata('error'); ?>');
                    }, 1000);                        
                </script>
                <?php
            }
            if($this->session->flashdata('success')) {
                ?>
                <script>
                    setTimeout(function(){ 
                        toastr.success('<?php echo $this->session->flashdata('success'); ?>');
                    }, 1000);
                </script>
                <?php
            }
        ?>     
        <div class="sidebar col-md-3">
            <?php $this->load->view("web/usersidebar"); ?>  
        </div>
        <div id="" class="col-md-9 sidebar">
            
            
            <div class="well">    
            <a href="<?php echo base_url(); ?>user/add_expense" class="label default pull-right">Add Expense</a> <br>            
            <table class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Expense Title</th>
                              <th>Amount</th>
                              <th>Expense Date</th>
                              <th>Action</th>
                           </tr>
                           <?php if($expenseList): $i=1; ?>
                            <?php foreach($expenseList as $row){?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['expense'] ?></td>
                                    <td><?= $row['amount'] ?></td>
                                    <td><?= $row['expense_added_date'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url() ?>user/add_expense/<?php echo $row['expense_id']; ?>" class="label label-info"><i class="fa fa-edit" style="color:#fff"></i></a>
                                        <a href="<?php echo base_url()?>user/delete_expense/<?php echo $row['expense_id']; ?>" class="label label-danger" onClick="return confirm('Are you sure?');"><i class="fa fa-trash-o" style="color:#fff"></i></a>
                                    </td>
                                </tr>
                            <?php $i++; } ?>
                           <?php endif ?>
                        </thead>
                        <tbody>
                           
                        </tbody>
                     </table>
            </div>   
        </div>   
    </div>        
</section>
<?php $this->load->view("web/footer"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>