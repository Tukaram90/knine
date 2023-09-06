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
            <h1>Add Expense</h1>
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
            <?php  $this->load->view("web/usersidebar"); ?> 
        </div>
        <div id="" class="col-md-9 sidebar">
            <h4>Add Dog Info</h4>
            <div class="well">
                <form action="<?php echo base_url(); ?>user/add_expense" method="post">
                <div class="row">
                   <div class="col-md-12">
                        <label for="expense_title">Expense Title</label>
                        <input type="text" name="expense_title" class="form-control"  id="expense_title" value="<?= $expense['expense'] ?? '' ?>" Placeholder="Expense Title" required>
                   </div>
                  
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Expense Amount</label>
                        <input type="text" name="expense_amount" id="expense_amount"  class="form-control" value="<?= $expense['amount'] ?? '' ?>" placeholder="Amount" required>                        
                   </div>
                    <div class="col-md-6">
                        <label for="date">Expense Added Date</label>
                        <input type="date" name="expense_date" class="form-control" value="<?= ($expense)?$expense['expense_added_date']:'' ?>" id="expense_date" required>
                    </div>
                </div>
                
              
                <input type="hidden" name="expense_id" value="<?= $expense['expense_id'] ?? '' ?>">
                <button type="submit"  value="Submit" name="add-expense-form" class="btn center-block">Save</button>
                </form>
            </div>   
        </div>   
    </div>        
</section>
<?php $this->load->view("web/footer"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>