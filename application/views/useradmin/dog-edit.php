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
            <form role="form" name="addDog" id="addDog" action="<?php echo base_url(); ?>customer/kennel/edit_dog/<?= $dogInfo['dog_id']?>" method="post" enctype="multipart/form-data">
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
                
                <div id="image_row">
                            <?php $gm=0; if($gallery_images) {
                            foreach($gallery_images as $gallery_image){
                            ?>
                            <div id="image_row_<?php echo $gm;?>">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="imageUpload" class="col-sm-4 col-form-label"><?php echo 'image' ?></label>
                                            <input class="form-control" name="imageUpload[]"
                                                       type="file"
                                                       id="imageUpload" data-toggle="tooltip"
                                                       data-placement="top" title=""
                                                       aria-required="true"
                                                       data-original-title=""/>
                                                <img class="img img-responsive text-center p_5" src="<?php echo base_url().$gallery_image['image_url'];?>" height="80" width="80" >
                                                <input type="hidden" value="<?php echo $gallery_image['image_url']  ?>" name="old_gallery_image[]">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2"><br>
                                    <input type="button" value="+" onClick="addImageRow(<?php  echo $gm; ?>);"
                                           class="btn btn-info"
                                           id="image-add">
                                    <input type="button" value="-" data-image_id="<?php echo $gallery_image['id']  ?>" onclick="deleteImageRow(this);"
                                           class="btn btn-danger"
                                           id="image-remove">
                                    </div>
                                </div>
                            </div>
                            <?php $gm++; } } ?>
                        </div>

              <div class="box-footer">
                <input type="hidden" name="dog_id" value="<?php echo(!empty($dogInfo))?$dogInfo['dog_id']:"" ?>">
                <button type="submit" class="btn btn-primary" name="edit-dog-form">Update</button>
                <a href="<?php echo base_url()?>remove-dog-tem/<?php echo $dogInfo['dog_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fa fa-close"></i>Delete</a> 
                <a href="<?php echo base_url()?>kennel-list" class="btn btn-info" ><i class="fa fa-list"></i>Return</a> 
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
<!-- Include SweetAlert 2 from a CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(function () {
      
      $("form[name='addDog']").validate({
  
          rules: {
              dogNameStep1: "required",
              registration: "required",
              phone: "required",
              subject: "required",
              message: "required",
              //microchip_step1: "required",
              dogNameStep1: {
                  required: true
              },
              registration: {
                  required: true                  
              },               
            //   microchip_step1: {
            //       required: true,                        
            //   },
  
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
            //   microchip_step1: {
            //       required: "Please provide a microchip number",                   
            //   },
              dog_gender_step2: "Please select dog gender",               
          },
          submitHandler: function (form) {
              form.submit();
          }
      });
  
  }); 
  
  var imageRowCounter = 1;
  function addImageRow(air) {
      "use strict";
      air = +air+1;
      var imageRow = '';
      imageRow = '<div id="image_row_' + air + '"><div class="row"><div class="col-md-10"> <div class="form-group"><label for="imageUpload" class="">' + "image" + '<i class="text-danger">*</i></label><input required class="form-control" name="imageUpload[]" type="file" id="imageUpload" data-toggle="tooltip" data-placement="top" title="" aria-required="true"></div></div><div class="col-md-2"><br><input type="button" value="+" onClick="addImageRow('+air+');" class="btn btn-info" id="image-add"> <input type="button" value="-" onclick="deleteImageRow(this);"  class="btn btn-danger"  id="image-remove"></div></div></div>';
      $('#image_row').append(imageRow);
      imageRowCounter++;
  }
  
   function deleteImageRow(dir) {
    "use strict";
    var url = '<?php echo base_url("customer/kennel/delete_dog_gallery_image"); ?>';
    var  imageId= $(dir).attr('data-image_id');
    var imageRowDiv = $(dir).prev().closest('div').parent().parent().attr('id');
    //var imageRowDiv = $(dir).prev().closest('div').parent().attr('id');
     
    if(imageId && imageRowDiv != 'image_row_0'){        
        Swal.fire({
        title: 'Confirm Action',
        text: 'Are you sure you want to proceed?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:url,
                    type:"post",
                    data:{imageId:imageId},
                    success:function(data){
                        $("#image_row").load(location.href + " #image_row>*", "");
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {            
                Swal.fire('Cancelled', 'Your  file is safe!', 'error');
            }
        });

            
            
    }else{
        //var imageRowDiv = $(dir).prev().closest('div').parent().attr('id');      
        if (imageRowDiv != 'image_row_0') {
            $('#' + imageRowDiv).remove();
        }        
    }    
}
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