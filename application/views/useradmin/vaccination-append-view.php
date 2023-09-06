<?php if(isset($DoseInfo) && !empty($DoseInfo)){?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Register Number</label>
                <input type="text" name="register_no" class="form-control"  id="register_no" placeholder="Register no"  value="<?php  echo(!empty($DoseInfo))?$DoseInfo['registration_no']:"" ?>">
            </div>
        </div>
        <div class="col-md-6">
            <img src="<?php if(isset($DoseInfo['dog_img']) && !empty($DoseInfo['dog_img'])){ echo base_url(); ?>uploads/dogs/<?= $DoseInfo['dog_img'];}else{ echo "https://via.placeholder.com/50";}?>" alt="Dogs Image" style="width:50px">
        </div>       
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Microchip Number</label>
                <input type="text" name="microchip_no" class="form-control"  id="microchip_no" placeholder="Microchip Number"  value="<?php  echo(!empty($DoseInfo))?$DoseInfo['chip_number']:"" ?>">
            </div>
        </div>
        <div class="col-md-6">
            <label class="control-label">Date Of Birth</label>
            <input type="date" name="dog_birth_date" class="form-control"  id="dog_birth_date" placeholder="Date Birth"  value="<?php  echo(!empty($DoseInfo))?$DoseInfo['date_of_birth']:"" ?>">
        </div>       
    </div>

<?php if($DoseInfo['isVaccinatedEntry']=='no'){ ?>
   
    <div class="row">        
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Doctor Name</label>
                <input type="text" name="doctor" class="form-control"  id="doctor" placeholder="Doctor Full Name"  required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="img">Doctor Mobile</label>                        
                <input type="text" name="doctor_phone" id="doctor_phone" class="form-control allowOnlyNumber" placeholder="Doctor Contact Number" required> 
            </div>
        </div>
    </div>   
   
<?php }else{?>
                        
    <?php foreach($DoseInfo['vaccineDetails'] as $row){ ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Taken Vaccine</label>
                    <input type="text" name="taken_vaccine_name" id="taken_vaccine_name" class="form-control" value="<?= $row['vaccination_name'] ?>" readonly> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Taken Vaccinated Date</label>
                    <input type="date" name="next_appointment" id="next_appointment" class="form-control" value="<?= $row['vaccination_date'] ?>" readonly> 
                </div>
            </div>    
        </div> 
    <?php } ?>
    <div class="row">
        <input type="hidden" name="doctor" value="<?php echo(!empty($DoseInfo))?$DoseInfo['doctor_name']:"" ?>">
        <input type="hidden" name="doctor_phone" value="<?php echo(!empty($DoseInfo))?$DoseInfo['doctor_contact']:"" ?>">
    </div>
   
<?php } ?>
    <div id="DivAppend">   
        <div class="row"  id="row1">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Vaccine</label>
                    <select name="vaccination_id[]" id="vaccination_id" class="form-control" required>
                        <option value="">Select Vaccination</option>
                        <?php foreach($vaccineList as $row){ ?>
                            <option value="<?= $row['id'] ?>" ><?= $row['vaccination_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Vaccinated Date</label>
                    <input type="date" name="vaccinated_date[]" class="form-control" id="exampleInputName" placeholder="Date" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Next Appointment</label>
                    <input type="date" name="next_appointment[]" id="next_appointment" class="form-control" placeholder="Next Appointment" > 
                </div>
            </div>
            <div class="col-md-1"><br>
                <a type="button" class="btn btn-info" title="Add New Title" id="addbtn"> <i class="fa fa-plus"></i></a>
            </div>
               
        </div>
       
    </div>
<?php } ?>       
       
   
