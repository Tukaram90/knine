<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
<style>
    .stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
<?php
    if($dogInfo){
        $requiredField = 'required';
    }else{
        $requiredField = '';
    }
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Add New Dog        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Dog</li>
      </ol>
    </section>  
    <!-- <section class="content">
        <div class="box box-primary">            
            <form role="form" action="<?php echo base_url(); ?>customer/kennel/save_dog" method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dog's Father</label>
                                <select name="dog_father" id="" class="form-control" autofocus>
                                    <option value="">Select Dog</option>
                                    <?php foreach($dogListByUser as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($dogInfo) && isset($dogInfo)){ if($dog['dog_id']==$dogInfo['parent_id']){echo"selected";} } ?>><?= $dog['dog_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Dog Name</label>
                                <input type="text" name="dog_name" class="form-control" id="exampleInputName" placeholder="Kennel Name" value="<?php  echo(!empty($dogInfo))?$dogInfo['dog_name']:"" ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputType">Dog's Type</label>
                                <select name="dog_type" id="" class="form-control">
                                    <option value="">Select Dog Type</option>
                                    <?php foreach($dogType as $type ){  ?>
                                    <option value="<?= $type['id'] ?>" <?php if(!empty($dogInfo) && isset($dogInfo)){ if($type['id']==$dogInfo['kennel_type_id']){echo"selected";} } ?>><?= $type['kennel_type'] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Age</label>
                                        <input type="text" name="dog_age" class="form-control" id="exampleInputName" placeholder="Dog Name" value="<?php  echo(!empty($dogInfo))?$dogInfo['age']:"" ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Date_Of_Birth</label>
                                        <input type="Date" name="dog_dob" class="form-control" id="exampleInputName" placeholder="Dog Date Of Birth" value="<?php  echo(!empty($dogInfo))?$dogInfo['date_of_birth']:"" ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Dog Gender</label><br>                        
                                <input type="radio" name="dog_gender"  id="dog_gender" value="male" <?php  echo(!empty($dogInfo) && 'male'==$dogInfo['gender'])?'checked':"" ?>>Male 
                                <input type="radio" name="dog_gender"  id="dog_gender" value="female" <?php echo(!empty($dogInfo) && 'female'==$dogInfo['gender'])?'checked':""  ?>>Female 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Dog Color</label>
                                <input type="text" name="dog_color" class="form-control"  id="dog_color" placeholder="Dog Color" required="" value="<?php  echo(!empty($dogInfo))?$dogInfo['color']:"" ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dog Weight</label>
                                <input type="text" name="dog_weigth" id="dog_weigth" class="form-control" placeholder="Dog Weight" required="" value="<?php  echo(!empty($dogInfo))?$dogInfo['weight']:"" ?>"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img">Images</label>                        
                                <input type="file" name="img" id="img" class="form-control">
                            </div>
                        </div>
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
                    
                    
                                 
              </div>          

              <div class="box-footer">
                <input type="hidden" name="dog_id" value="<?php echo(!empty($dogInfo))?$dogInfo['dog_id']:"" ?>">
                <button type="submit" class="btn btn-primary" name="add-dog-form">Submit</button>
              </div>
            </form>
        </div>
    </section> -->
    
    <section class="content">
        <div class="box box-primary">
        <a href="<?php echo base_url(); ?>kennel-list" class="btn btn-warning pull-right" style="margin-top: 3px;margin-right: 15px;" title="Return To List Page"><i class="fa fa-list"> </i></a>
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                        <p>General Information</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p>Dog Details</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p>Image</p>
                    </div>
                   
                </div>
            </div>
            <form role="form" action="<?php echo base_url(); ?>customer/kennel/save_dog" method="post" enctype="multipart/form-data">
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> General Information</h3>
                            <div class="form-group">
                                <label class="control-label">Dog Name</label>
                                <input type="text" name="dogNameStep1" id="dogNameStep1" required="required" class="form-control" placeholder="Enter Dog Name" value="<?php  echo(!empty($dogInfo))?$dogInfo['dog_name']:"" ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Registration Number</label>
                                <input type="text" name="registration" id="registration" class="form-control" placeholder="Enter Registration No"  value="<?php  echo(!empty($dogInfo))?$dogInfo['registration_no']:"" ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">MicroChip Number</label>
                                <input type="text" name="microchip_step1" id="microchip_step1" class="form-control" placeholder="Enter Microchip Number" value="<?php  echo(!empty($dogInfo))?$dogInfo['chip_number']:"" ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputType">Dog Breed</label>
                                <select name="dog_type_step1" id="dog_type_step1" class="form-control select2" required="required" style="width: 100%;">
                                    <option value="">Dog Breed</option>
                                    <?php foreach($dogType as $type ){  ?>
                                    <option value="<?= $type['id'] ?>" <?php if(!empty($dogInfo) && isset($dogInfo)){ if($type['id']==$dogInfo['kennel_type_id']){echo"selected";} } ?>><?= $type['kennel_type'] ?></option>
                                    <?php }?>
                                </select>
                            </div>                           
                            <button class="btn btn-primary nextBtn btn-lg pull-right marginBottom" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Dog Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Dog's Father</label>                           
                                    <select name="dog_father_step2" id="dog_father_step2" class="form-control" >
                                            <option value="">Select Father</option>
                                            <?php foreach($FatherdogListByUser as $dog){ ?>
                                                <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($dogInfo) && isset($dogInfo)){ if($dog['dog_id']==$dogInfo['parent_id']){echo"selected";} } ?>><?= $dog['dog_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Dog's Mother</label>                           
                                        <select name="dog_mother_step2" id="dog_mother_step2" class="form-control" >
                                            <option value="">Select Mother</option>
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
                                        <label for="control-label">Date Of Death</label>
                                        <input type="Date" name="dog_dod_step2" class="form-control" id="dog_dod_step2" placeholder="Date Of Death" value="<?php  echo(!empty($dogInfo))?$dogInfo['date_of_birth']:"" ?>">
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
                                        <!-- <label for="gender">Dog Color</label>
                                        <input type="text" name="dog_color_step2" class="form-control"  id="dog_color_step2" placeholder="Dog Color" required="" value="<?php  echo(!empty($dogInfo))?$dogInfo['color']:"" ?>"> -->
                                        <label for="breeder">Breeder</label>
                                        <input type="text" name="breeder" class="form-control"  id="breeder" placeholder="Breeder"  value="<?php  echo(!empty($dogInfo))?$dogInfo['breeder']:"" ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dog Weight</label>
                                        <input type="text" name="dog_weigth" id="dog_weigth" class="form-control" placeholder="Dog Weight" required="" value="<?php  echo(!empty($dogInfo))?$dogInfo['weight']:"" ?>"> 
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sire">Sire</label>
                                    <input type="text" name="sire" class="form-control"  id="sire" placeholder="sire"  value="<?php  echo(!empty($dogInfo))?$dogInfo['sire']:"" ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="dam">Dam</label>
                                    <input type="text" name="dam" class="form-control"  id="dam" placeholder="Dam"  value="<?php  echo(!empty($dogInfo))?$dogInfo['dam']:"" ?>">
                                </div>
                            </div>                          
                            <div class="form-group">
                                <label for="gender">First Owner</label>                        
                                <input type="text" name="first_owner" class="form-control"  id="first_owner" placeholder="First Owner"  value="<?php  echo(!empty($dogInfo))?$dogInfo['first_owner']:"" ?>">
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right marginBottom" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Image</h3>
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
                            <input type="hidden" name="dog_id" value="<?php echo(!empty($dogInfo))?$dogInfo['dog_id']:"" ?>">
                            <button class="btn btn-success btn-lg pull-right marginBottom" type="submit" name="FinishForm">Finish!</button>
                            
                        </div>
                    </div>
                </div>               
            </form>
            
        </div>
    </section>
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
$(document).ready(function () {

   var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
    });
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    })
</script>