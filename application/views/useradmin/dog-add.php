<?php $this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

<div class="content-wrapper">
    <section class="content-header">
      <h1> Add New Dog </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Dog</li>
      </ol> -->
    </section>  
    <section class="content">
        <div class="box box-primary">            
            <form role="form" name="addDog" id="addDog" action="<?php echo base_url(); ?>customer/kennel/entry_dog" method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dog Name</label>
                                <input type="text" name="dogNameStep1" id="dogNameStep1" class="form-control" placeholder="Enter Dog Name" value="<?php  echo(!empty($dogInfo))?$dogInfo['dog_name']:"" ?>" />
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
                                <select name="dog_father_step2" id="dog_father_step2" class="form-control isSelect" data-for="addNewSire">
                                    <option value="">Select Sire</option>
                                    <option class="addNew" value="">Add New</option>
                                    <?php foreach($FatherdogListByUser as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($dogInfo) && isset($dogInfo)){ if($dog['dog_id']==$dogInfo['parent_id']){echo"selected";} } ?>><?= $dog['dog_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Dam</label>                           
                                <select name="dog_mother_step2" id="dog_mother_step2" class="form-control isSelect" data-for="addNewDam">
                                    <option value="">Select Dam</option>
                                    <option class="addNew" value="">Add New</option>
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
                        <label for="gender">Owner</label>                        
                        <input type="text" name="first_owner" class="form-control"  id="first_owner" placeholder="Owner"  value="<?php  echo(!empty($dogInfo))?$dogInfo['first_owner']:"" ?>">
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
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="img">Image</label>                        
                                <input type="file" name="img" id="img" class="form-control" $requiredField="required">
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="img">Reset Image</label> 
                                <input type="button" id="file-reset" class="btn btn-block btn-default btn-sm" value="Reset Image"> 
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

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">            
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="FormTitle"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="saveSireDamForm"  name="saveSireDamForm" action="" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                <label for="dogName" class="col-sm-3 control-label">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="dogName" id="dogName">
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="microChipDamSire" class="col-sm-3 control-label">MicroChip Number</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="microChipDamSire" id="microChipDamSire" placeholder="Microchip number">
                                </div>
                                </div>
                                <input type="hidden" name="isItSireDam" id="isItSireDam">
                            </div>                    
                            <div class="box-footer">
                                <button type="button" class="btn btn-default" id="cnclBtn" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Add</button>
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
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- jquery validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script>
    $(function () {
       
        var base_url = "<?php echo base_url('customer/kennel/check_unique_microchip'); ?>";       
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
                    remote: {
                        url: base_url,
                        type: 'post',                           
                    }         
                },

                dog_gender_step2: {
                    required: true
                },
                img: {
                    required: true
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
                    remote: 'The microchip already exists.'
                },
                dog_gender_step2: "Please select dog gender",
                img: "Please upload your dog image"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
         
       
        $("#saveSireDamForm").validate({
            rules: { 
                microChipDamSire: {
                    required: true,
                    remote: {
                        url: base_url,
                        type: 'post',                           
                    }  
                },
                dogName: {
                    required: true
                },
            },
            messages: {
                microChipDamSire: {
                    required: "Please provide a microchip number",
                    remote: 'This microchip number already exists.'
                },
            },
            submitHandler: function (form) {               
                if ($("#saveSireDamForm").valid()) {
                    var sireNameOrDamName =  $('#dogName').val();
                    var microChip =  $('#microChipDamSire').val();
                    var isItSireDam =  $('#isItSireDam').val();
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url();?>customer/kennel/save_sire_dam',
                        data: {sireDamName:sireNameOrDamName,dogMicrochip:microChip,sireDam:isItSireDam},
                        success: function(response){
                            let res = JSON.parse(response)
                            console.log(res.success)  
                            if(res.success == 'true'){
                                toastr.success(res.msg);
                                // setTimeout(function(){
                                //        location.reload()
                                //     }, 3000);
                            }else{                       
                                toastr.error(res.msg);
                            }
                        }
                    });
                  
                }else{                    
                    return false;
                }
               
            }
        });

        $('#file-reset').on('click', function() {     
            $('#img').val(''); 
        });

       
    }); 

    $('.isSelect').change(function(){       
        var selectedOPtion = $(this).find("option:selected").text(); 
        var isSAddSire = $(this).attr("data-for");
        if(isSAddSire ==='addNewSire'){
            $("#isItSireDam").val("Sire"); 
            $('#cnclBtn').val('cancelSire');
            $('#FormTitle').text('Add New Sire')
        }else{
            $("#isItSireDam").val("Dam");
            $('#cnclBtn').val('cancelDam');
            $('#FormTitle').text('Add New Dam');
        }
        if(selectedOPtion=='Add New'){               
            $("#myModal").modal();
        }
    });

    $('#myModal').on('hidden.bs.modal', function () {   
        var btnCacel = $('#cnclBtn').val();
        if(btnCacel === 'cancelSire'){
            $("#dog_father_step2").val($(".isSelect option:first").val());
        } else{
            $("#dog_mother_step2").val($(".isSelect option:first").val());
        }   
       
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