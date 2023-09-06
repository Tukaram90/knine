<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Add Handler Expense      
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
                    <form role="form" action="<?php echo base_url(); ?>save-handler-expense" name="handlerForm" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="client_name">Client name</label>
                                    <input type="text" name="client_name" class="form-control"  id="client_name">
                                </div>
                                <div class="col-md-12">
                                    <label for="client_name">Client Email</label>
                                    <input type="text" name="client_email" class="form-control"  id="client_email">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Dog name</label>
                                        <select name="dog_id[]" id="dog_id" class="form-control select2" multiple="multiple" data-placeholder="Select a dog"
                                                style="width: 100%;" required >
                                                <option value="">Select</option>
                                                <?php foreach($dogListByUserDetails as $dog){ ?>
                                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($expense['dog_id']) && isset($expense['dog_id'])){ if($dog['dog_id']==$expense['dog_id']){echo"selected";} } ?>><?= ucfirst($dog['dog_name']) ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>                
                                <div class="col-md-12">
                                    <label for="show_detail">Show details</label>
                                <textarea name="show_details" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                            
                            </div>        
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="deposit">Deposit</label>
                                    <input type="text" name="deposit" class="form-control calculate"  id="deposit" value="0">
                                </div>
                                <div class="col-md-6">
                                <label for="no_ofdogs">No.of.Dogs</label>
                                <input type="text" name="no_ofdogs" class="form-control"  id="no_ofdogs" value="">
                                </div>
                            </div>                        
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="entry_fee">Entry Fees</label>
                                    <input type="text" name="entry_fee" class="form-control calculate"  id="entry_fee" value="0">
                                </div>
                                <div class="col-md-12">
                                    <label for="handling_fee">Handling Fees</label>
                                    <input type="text" name="handling_fee" class="form-control calculate"  id="handling_fee" value="0">
                                </div>
                                <div class="col-md-12">
                                    <label for="grooming_fees">Grooming Fees</label>
                                    <input type="text" name="grooming_fees" class="form-control calculate"  id="grooming_fees" value="0">
                                </div>
                                <div class="col-md-12">
                                    <label for="boarding_fee">Boarding Fees</label>
                                    <input type="text" name="boarding_fee" class="form-control calculate"  id="boarding_fee" value="0">
                                </div>
                                <div class="col-md-12">
                                    <label for="camping_fees">Loding or RV Camping Fees</label>
                                    <input type="text" name="camping_fees" class="form-control calculate"  id="camping_fees" value="0">
                                </div> 
                                <div class="col-md-12">
                                    <label for="meals">Meals</label>
                                    <input type="text" name="meals" class="form-control calculate"  id="meals" value="0">
                                </div> 
                                <div class="col-md-12">
                                    <label for="bonus_points_earned">Bonus for points earned</label>
                                    <input type="text" name="bonus_points_earned" class="form-control calculate"  id="bonus_points_earned" value="0">
                                </div> 
                                <div class="col-md-12">
                                    <label for="bonus_group_placement">Bonus for group placement</label>
                                    <input type="text" name="bonus_group_placement" class="form-control calculate"  id="bonus_group_placement" value="0">
                                </div> 
                                <div class="col-md-12">
                                    <label for="bonus_best_show">Bonus for best in show</label>
                                    <input type="text" name="bonus_best_show" class="form-control calculate"  id="bonus_best_show" value="0">
                                </div> 
                                <div class="col-md-12">
                                    <label for="sweepstakes_fee">Sweepstakes Fees</label>
                                    <input type="text" name="sweepstakes_fee" class="form-control calculate"  id="sweepstakes_fee" value="0">
                                </div>
                                <div class="col-md-12">
                                    <label for="total_handling">Total Handling/ Grooming Expenses</label>
                                    <input type="text" name="total_handling" class="form-control total_handling"  id="" disabled>
                                    <input type="hidden" name="total_handling" class="form-control total_handling">
                                     <?php 
                                        $currency = set_currency();
                                        $symbol = '';
                                        if($currency == '<i class="fa fa-rupee   collapseIcon "></i>'){
                                            $symbol = '₹';
                                        }elseif($currency == '<i class="fa fa-dollar   collapseIcon "></i>'){
                                            $symbol = '$';
                                        }
                                    ?>
                                    <input type="hidden" name="currency" id="currency"  value='<?= $symbol ?>'>
                                </div>                  
                            </div>          
                        </div>                       

                        <div class="box-footer">                            
                            <button type="submit" class="btn btn-primary"  name="save-form-handler">Submit</button>
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

        $("form[name='handlerForm']").validate({
            rules: {
                client_name: "required",   
                client_email: {                    
                    email: true
                },
                dog_id: {required: true},
                deposit:{                    
                    number: true
                },
                no_ofdogs:{                   
                    number: true,
                    required: true
                }, 
                entry_fee:{                   
                    number: true
                }, 
                handling_fee:{                   
                    number: true
                }, 
                grooming_fees:{                   
                    number: true
                }, 
                boarding_fee:{                   
                    number: true
                }, 
                camping_fees:{                   
                    number: true
                }, 
                meals:{                   
                    number: true
                }, 
                bonus_points_earned:{                   
                    number: true
                }, 
                bonus_group_placement:{                   
                    number: true
                },
                bonus_best_show:{                   
                    number: true
                },
                sweepstakes_fee:{                   
                    number: true
                },
                total_handling:{                   
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
            var total = 0;
            $('.calculate').each(function() {
              var inputNumber = $(this).val();
            total = total + parseInt(inputNumber);
            });
        
            $('.total_handling').val(total);
        })
    })

</script>
<style>
.error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    /* font-size: 14px; */
}
/* .form-control.error {
    border-color: red;
    padding: .375rem .75rem;
} */
</style>