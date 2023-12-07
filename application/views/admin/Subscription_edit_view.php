<?php $this->load->view('admin/comman/header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<div class="content-wrapper">
    <section class="content-header">
      <h1> Add subscription plan</h1>     
    </section>
    
    <section class="content">
      <div class="row">
      
        <div class="col-md-12">             
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <a href="<?php echo base_url(); ?>subscription" class="btn btn-info  pull-right" >List</a> 
            </div>                       
            <form role="form" method="post" id="updatePlanForm" action="<?php echo base_url() ?>subscription/edit_subscription_plan/<?= $subplan['id'] ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Plan Name</label>                      
                      <select name="plan_name" id="plan_name" class="form-control">
                        <option value="">Select plan name</option>
                        <option value="light" <?= ($subplan['name']=='light')?'selected':'' ?>>Light</option>
                        <option value="standard" <?= ($subplan['name']=='standard')?'selected':'' ?>>Standard</option>
                        <option value="premimum" <?= ($subplan['name']=='premimum')?'selected':'' ?>>Premimum</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="form-group">
                      <label for="file">Plan price</label>
                      <input type="text" class="form-control" name="plan_price" id="plan_price" value="<?= ($subplan['price'])?$subplan['price']:'' ?>">
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="file">Plan Validity in month</label>
                      <input type="number" class="form-control" name="plan_validity" id="plan_validity" value="<?= ($subplan['plan_validity'])?$subplan['plan_validity']:'' ?>">
                    </div>
                </div>
                
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="file">Plan Features</label>
                      <textarea class="textarea" id="plan_features" name="plan_features" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                          <?= ($subplan['features'])?$subplan['features']:'' ?>
                        </textarea>
                    </div>
                </div>
                 <input type="hidden" name="id" value="<?= ($subplan['id'])?$subplan['id']:'' ?>">              
              </div>             
              <div class="box-footer">                
                <button type="submit" class="btn btn-primary" name="update-plan" >Submit</button>
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
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$(function () {   
    $('.textarea').wysihtml5();

    var base_url = "<?php echo base_url('subscription/check_unique_subscription_plan'); ?>";       
    $("#updatePlanForm").validate({

        rules: {      
           
            plan_price: {
                required: true                  
            },               
            plan_name: {
                required: true,                   
            },
            plan_validity: {
                required: true
            },
            plan_features: {
                required: true
            }
        },
        // Specify validation error messages
        messages: {           
            plan_price: {
                required: "Please provide a plan price",
            },
            plan_name: {
                required: "Please provide a plan name.",               
            },
            plan_validity: "Please provide a plan validity",
            plan_features: "Please provide a plan features",
           
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
})
</script>
<style>
.error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    font-size: 14px;
}
.form-control.error {
    border-color: red;
    padding: .375rem .75rem;
}
</style>