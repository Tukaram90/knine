<?php $this->load->view('useradmin/comman/userheader'); ?>
<?php $selectedDogArr = explode(",",$handlerExpense['dog_id']); ?>  
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Edit Handler Expense      
      </h1>  
      
    </section>  
    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url(); ?>handler-expense" class="btn btn-info pull-right" style="margin-bottom: 3px;margin-right: 15px;" title="Expense List"><i class="fa fa-list"></i></a>
        </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="box box-primary">            
                    <form role="form" action="<?php echo base_url(); ?>edit-handler-expense/<?=  $handlerExpense['id'] ?>" name="EdithandlerForm" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="client_name">Client name</label>
                                    <input type="text" name="client_name" class="form-control"  id="client_name" value="<?=  $handlerExpense['client_name'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="client_name">Client Email</label>
                                    <input type="text" name="client_email" class="form-control"  id="client_email" value="<?=  $handlerExpense['client_email'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Dog name</label>
                                        <select name="dog_id[]" id="dog_id" class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                                style="width: 100%;">
                                                <option value="">Select</option>
                                                <?php foreach($dogListByUserDetails as $dog){ ?>
                                                        <option value="<?= $dog['dog_id'] ?>" <?php if(in_array($dog['dog_id'],$selectedDogArr)) {echo"selected";} ?>><?= ucfirst($dog['dog_name']) ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>                
                                <div class="col-md-12">
                                    <label for="show_detail">Show details</label>
                                <textarea name="show_details" class="form-control" cols="30" rows="3"><?=  $handlerExpense['show_details'] ?></textarea>
                                </div>
                            
                            </div>        
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="deposit">Deposit</label>
                                    <input type="text" name="deposit" value="<?=  $handlerExpense['deposit'] ?>" class="form-control calculate"   id="deposit">
                                </div>
                                <div class="col-md-6">
                                <label for="no_ofdogs">No.of.Dogs</label>
                                <input type="text" name="no_ofdogs" value="<?=  $handlerExpense['no_of_dogs'] ?>" class="form-control"  id="no_ofdogs">
                                </div>
                            </div>                        
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="entry_fee">Entry Fees</label>
                                    <input type="text" name="entry_fee" value="<?=  $handlerExpense['entry_fee'] ?>" class="form-control calculate"  id="entry_fee">
                                </div>
                                <div class="col-md-12">
                                    <label for="handling_fee">Handling Fees</label>
                                    <input type="text" name="handling_fee" value="<?=  $handlerExpense['handler_fee'] ?>" class="form-control calculate"  id="handling_fee">
                                </div>
                                <div class="col-md-12">
                                    <label for="grooming_fees">Grooming Fees</label>
                                    <input type="text" name="grooming_fees" value="<?=  $handlerExpense['grooming_fee'] ?>" class="form-control calculate"  id="grooming_fees">
                                </div>
                                <div class="col-md-12">
                                    <label for="boarding_fee">Boarding Fees</label>
                                    <input type="text" name="boarding_fee" value="<?=  $handlerExpense['boarding_fee'] ?>" class="form-control calculate"  id="boarding_fee">
                                </div>
                                <div class="col-md-12">
                                    <label for="camping_fees">Loding or RV Camping Fees</label>
                                    <input type="text" name="camping_fees" value="<?=  $handlerExpense['camping_fee'] ?>"  class="form-control calculate"  id="camping_fees">
                                </div> 
                                <div class="col-md-12">
                                    <label for="meals">Meals</label>
                                    <input type="text" name="meals" value="<?=  $handlerExpense['meals'] ?>"  class="form-control calculate"  id="meals">
                                </div> 
                                <div class="col-md-12">
                                    <label for="bonus_points_earned">Bonus for points earned</label>
                                    <input type="text" name="bonus_points_earned" value="<?=  $handlerExpense['bonus_points_earned'] ?>" class="form-control calculate"  id="bonus_points_earned">
                                </div> 
                                <div class="col-md-12">
                                    <label for="bonus_group_placement">Bonus for group placement</label>
                                    <input type="text" name="bonus_group_placement" value="<?=  $handlerExpense['bonus_group_placement'] ?>"  class="form-control calculate"  id="bonus_group_placement">
                                </div> 
                                <div class="col-md-12">
                                    <label for="bonus_best_show">Bonus for best in show</label>
                                    <input type="text" name="bonus_best_show" value="<?=  $handlerExpense['bonus_best_show'] ?>"  class="form-control calculate"  id="bonus_best_show">
                                </div> 
                                <div class="col-md-12">
                                    <label for="sweepstakes_fee">Sweepstakes Fees</label>
                                    <input type="text" name="sweepstakes_fee" value="<?=  $handlerExpense['sweepstakes_fee'] ?>"  class="form-control calculate"  id="sweepstakes_fee">
                                </div>
                                <div class="col-md-12">
                                    <label for="total_handling">Total Handling/ Grooming Expenses</label>
                                    <input type="text" name="total_handling" class="form-control total_handling"  id="" disabled>
                                    <input type="hidden" name="total_handling" class="form-control total_handling">
                                    <input type="hidden" name="handler_expense_id" value="<?=  $handlerExpense['id'] ?>" class="form-control" >
                                </div>                  
                            </div>          
                        </div>                       

                        <div class="box-footer">                            
                            <button type="submit" class="btn btn-primary"  name="edit-form-handler">Submit</button>
                        </div>
                    </form>
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
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?<?= time() ?>"></script>
<script>
    $(function () {
        $('.select2').select2();

        $("form[name='EdithandlerForm']").validate({
            rules: {
                client_name: "required",
                client_email: {                    
                    email: true
                },  
                dog_id: {required: true},
                deposit:{ 
                    required: true,
                    number: true
                },
                no_ofdogs:{
                    required: true,
                    number: true
                }, 
                entry_fee:{
                    required: true,
                    number: true
                }, 
                handling_fee:{
                    required: true,
                    number: true
                }, 
                grooming_fees:{
                    required: true,
                    number: true
                }, 
                boarding_fee:{
                    required: true,
                    number: true
                }, 
                camping_fees:{
                    required: true,
                    number: true
                }, 
                meals:{
                    required: true,
                    number: true
                }, 
                bonus_points_earned:{
                    required: true,
                    number: true
                }, 
                bonus_group_placement:{
                    required: true,
                    number: true
                },
                bonus_best_show:{
                    required: true,
                    number: true
                },
                sweepstakes_fee:{
                    required: true,
                    number: true
                },
                total_handling:{
                    required: true,
                    number: true
                },
                                            
            },
           // Specify validation error messages
           messages: {
            dog_id: "Please select a valid dog name.",
           
           },
           submitHandler: function (form) {
               form.submit();
           }
        }); 

        
        $('.calculate').keyup(function() {
            calculation_amoun();
        })

        calculation_amoun();
    })
    function calculation_amoun(){
        var total = 0;
            $('.calculate').each(function() {
              var inputNumber = $(this).val();
            total = total + parseInt(inputNumber);
            });
        
            $('.total_handling').val(total);
    }
</script>
<style>
.error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    /* font-size: 14px; */
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
       color:black;
}
</style>