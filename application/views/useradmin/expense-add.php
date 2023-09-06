<?php $this->load->view('useradmin/comman/userheader'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Add New Expense      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Expense</li>
      </ol>
    </section>  
    <section class="content">
        <div class="row">
        <a href="<?php echo base_url(); ?>expense-list" class="btn btn-info pull-right" style="margin-bottom: 3px;margin-right: 15px;" title="Expense List"><i class="fa fa-list"></i></a>
        </div>
        <div class="box box-primary">            
            <form role="form" action="<?php echo base_url(); ?>add-expense"  method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Select Dog</label>                           
                                <select name="dog_id" id="dog_id" class="form-control" >
                                    <option value="">Select</option>
                                    <option value="all" <?php if(!empty($allopt) && isset($expense)){ if('yes'==$allopt){echo"selected";} } ?>>All</option>
                                    <?php foreach($dogListByUserDetails as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($expense['dog_id']) && isset($expense['dog_id'])){ if($dog['dog_id']==$expense['dog_id']){echo"selected";} } ?>><?= ucfirst($dog['dog_name']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <label for="expense">Expense Type</label>
                            <select name="expense_cat" id="expense_cat" class="form-control select2" required="required" style="width: 100%;">
                                <option value="">Select</option>
                                <?php foreach($expenceCategory as $cat ){  ?>
                                <option value="<?= $cat['id'] ?>" <?php if(!empty($expense['expense']) && isset($expense['expense'])){ if($cat['id']==$expense['expense']){echo"selected";} } ?>><?= ucfirst($cat['title']) ?></option>
                                <?php }?>
                            </select>
                        </div>
                       
                        <div class="col-md-4">
                            <label for="expense_note">Expense Note</label>
                            <input type="text" name="expense_note" class="form-control"  id="expense_note" value="<?= $expense['expense_note'] ?? '' ?>" Placeholder="Expense Note" required>
                        </div>
                    </div>   
                    

                    <div class="row">
                        <div class="col-md-4">
                            <label>Expense Amount</label>
                            <input type="text" name="expense_amount" id="expense_amount"  class="form-control" value="<?= $expense['amount'] ?? '' ?>" placeholder="Amount" required>                        
                        </div>
                        <div class="col-md-4">
                            <label>Currency</label>
                            <select name="currency" id="currency" class="form-control" required>
                                <option value="₹" <?php if(!empty($expense) && isset($expense)){ echo ($expense['currency']=="₹")?"selected":"" ;}?>>₹</option>
                                <option value="$" <?php if(!empty($expense) && isset($expense)){ echo ($expense['currency']=="$")?"selected":"" ;}?>>$</option>                                
                                <option value="€" <?php if(!empty($expense) && isset($expense)){ echo ($expense['currency']=="€")?"selected":"" ;}?>>€</option>                                                              
                            </select>                        
                        </div>
                        <div class="col-md-4">
                            <label for="date">Expense Added Date</label>
                            <input type="date" name="expense_date" class="form-control" value="<?= ($expense)?$expense['expense_added_date']:'' ?>" id="expense_date" required>
                        </div>
                    </div>            
                </div>  
                      

                <div class="box-footer">
                    <input type="hidden" name="expense_id" value="<?= $expense['expense_id'] ?? '' ?>">
                    <button type="submit" class="btn btn-primary"  name="add-expense-form">Submit</button>
                    <?php  if(isset($expense['expense_id']) && !empty($expense['expense_id'])){ ?>
                    <a href="<?php echo base_url()?>delete-expense/<?php echo $expense['expense_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                     <a href="<?php echo base_url()?>expense-list" class="btn btn-info">Return</a>
                    <?php } ?>
                    
                </div>
            </form>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new expense category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">                    
                         <div class="col-md-12 form-group">
                            <label for="expense_note">Add New Expense Category</label>
                            <input type="text" name="new_expence_cate" class="form-control"  id="new_expence_cate"  Placeholder="New Expense Category" required >
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-warning " id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary saveNewCat">Save</button>
                        </div>
                    </form>
                </div>
                
                </div>
            </div>
        </div>
    </section>       
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script>
$('select[name=expense_cat]').change(function(){
    var tmp = this.value;
    let selectedCategory = $( "#expense_cat option:selected" ).text();
    if(selectedCategory=="Other expenses") {
        let confirmMsg = confirm("Are you sure add new expence category?");
        if(confirmMsg==true){
            $('#exampleModal').modal('show'); 
            $("body").on("click",".saveNewCat", function(e){
                e.preventDefault()
                let newExpenceCategory = $("#new_expence_cate").val();
                if(newExpenceCategory){
                                   
                    $.ajax({
                        url: '<?php echo base_url(); ?>customer/kennel/add_new_user_expense_category',
                        type: "POST",
                        data: {newExpenceCategory: newExpenceCategory},
                        cache: false,
                        success: function(response){
                            let res = JSON.parse(response)                       
                            if(res.status == true){                                     
                                toastr.success(res.msg);                            
                                setTimeout(function(){ 
                                    window.location.reload()
                                }, 3000);
                            }else{
                                toastr.error(res.msg);
                                setTimeout(function(){ 
                                    window.location.reload()
                                }, 3000);	
                            }    
                        }
                    })
                }else{
                    toastr.error('Please enter the expense category name');
                }
            })
        }else{
            location.reload()
        }
    }

})
$("#close").click(function(){
    location.reload()
})
</script>