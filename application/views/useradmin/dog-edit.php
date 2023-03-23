<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

<?php
    if($dogInfo){
        $requiredField = 'required';
    }else{
        $requiredField = '';
    }
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1> Edit Dog</h1>     
    </section>  
    <section class="content">
        <div class="box box-primary">            
            <form role="form" name="addDog" id="addDog" action="<?php echo base_url(); ?>customer/kennel/entry_dog" method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dog Name</label>
                                <input type="text" name="dogNameStep1" id="dogNameStep1" class="form-control" placeholder="Enter Dog Name" value="<?php  echo(!empty($dogInfo))?$dogInfo['dog_name']:"" ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Registration Number</label>
                                <input type="text" name="registration" id="registration" class="form-control" placeholder="Enter Registration No"  value="<?php  echo(!empty($dogInfo))?$dogInfo['registration_no']:"" ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">MicroChip Number</label>
                                <input type="text" name="microchip_step1" id="microchip_step" class="form-control" placeholder="Enter Microchip Number" value="<?php  echo(!empty($dogInfo))?$dogInfo['chip_number']:"" ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputType">Dog Breed</label>
                            <select name="dog_type_step1" id="dog_type_step1" class="form-control select2"  style="width: 100%;">
                                <option value="">Dog Breed</option>
                                <?php foreach($dogType as $type ){  ?>
                                <option value="<?= $type['id'] ?>" <?php if(!empty($dogInfo) && isset($dogInfo)){ if($type['id']==$dogInfo['kennel_type_id']){echo"selected";} } ?>><?= $type['kennel_type'] ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Sire</label>                           
                                <select name="dog_father_step2" id="dog_father_step2" class="form-control" >
                                    <option value="">Select Sire</option>
                                    <option value="">Add New</option>
                                    <?php foreach($FatherdogListByUser as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($dogInfo) && isset($dogInfo)){ if($dog['dog_id']==$dogInfo['parent_id']){echo"selected";} } ?>><?= $dog['dog_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dam</label>                           
                                <select name="dog_mother_step2" id="dog_mother_step2" class="form-control" >
                                    <option value="">Select Dam</option>
                                    <?php foreach($MotherdogListByUser as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($dogInfo) && isset($dogInfo)){ if($dog['dog_id']==$dogInfo['mother_id']){echo"selected";} } ?>><?= $dog['dog_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="control-label">Date Of Birth</label>
                                <input type="Date" name="dog_dob_step2" class="form-control" id="dog_dob_step2" placeholder="Date Of Birth" value="<?php  echo(!empty($dogInfo))?$dogInfo['date_of_birth']:"" ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="control-label">Date Of Death/Transfer</label>
                                <input type="Date" name="dog_dod_step2" class="form-control" id="dog_dod_step2" placeholder="Date Of Death" value="<?php  echo(!empty($dogInfo))?$dogInfo['date_of_death']:"" ?>">
                            </div>                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Dog Gender</label><br>                        
                                <input type="radio" name="dog_gender_step2"  id="dog_gender_step2" value="male" <?php  echo(!empty($dogInfo) && 'male'==$dogInfo['gender'])?'checked':"" ?>>Male 
                                <input type="radio" name="dog_gender_step2"  id="dog_gender_step2" value="female" <?php echo(!empty($dogInfo) && 'female'==$dogInfo['gender'])?'checked':""  ?>>Female 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">                              
                                <label for="breeder">Breeder</label>
                                <input type="text" name="breeder" class="form-control"  id="breeder" placeholder="Breeder"  value="<?php  echo(!empty($dogInfo))?$dogInfo['breeder']:"" ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">First Owner</label>                        
                        <input type="text" name="first_owner" class="form-control"  id="first_owner" placeholder="First Owner"  value="<?php  echo(!empty($dogInfo))?$dogInfo['first_owner']:"" ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Features</label>                        
                                <textarea name="feature" id="feature" cols="30" rows="3" class="form-control" ><?php  echo(!empty($dogInfo))?$dogInfo['feature']:"" ?></textarea>
                            </div>         
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control"><?php  echo(!empty($dogInfo))?$dogInfo['description']:"" ?></textarea>
                            </div>           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img">Images</label>                        
                        <input type="file" name="img" id="img" class="form-control" $requiredField="required">
                    </div>            
                    <?php if($dogInfo){ ?>
                        <div class="form-group">
                            <img src="<?php if(isset($dogInfo['dog_img']) && !empty($dogInfo['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $dogInfo['dog_img'];}?>" alt="Dogs Image" style="width:200px">
                        </div>
                    <?php } ?>     
                </div>          

              <div class="box-footer">
                <input type="hidden" name="dog_id" value="<?php echo(!empty($dogInfo))?$dogInfo['dog_id']:"" ?>">
                <button type="submit" class="btn btn-primary" name="add-dog-form">Submit</button>
              </div>
            </form>
        </div>
    </section>
    
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- jquery validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(function () {
      
        $("form[name='addDog']").validate({

            rules: {
                dogNameStep1: "required",
                registration: "required",
                phone: "required",
                subject: "required",
                message: "required",
                microchip_step1: "required",
                dogNameStep1: {
                    required: true
                },
                registration: {
                    required: true                  
                },               
                microchip_step1: {
                    required: true,                        
                },

                dog_gender_step2: {
                    required: true
                },
                img: {
                    required: false
                },
                dog_type_step1:{
                    required: true
                }
            },
            // Specify validation error messages
            messages: {
                dogNameStep1: "Please provide a valid dog name.",
                registration: {
                    required: "Please provide a registration number",
                },
                microchip_step1: {
                    required: "Please provide a microchip number",                   
                },
                dog_gender_step2: "Please select dog gender",               
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    }); 
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