<?php $this->load->view('useradmin/comman/userheader'); ?>
<style>    
.customDisbled{
    pointer-events: none; 
    background: #f4f4f4;    
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Edit Vaccination Form      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Vaccination Form</li>
      </ol>
    </section>  
   
    <section class="content">

        <div class="box box-primary">            
            <form role="form"  method="post" action="" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dog</label>
                                    <select name="dog_id" id="dog_id" class="form-control" readonly>
                                        <option value="">Select Dog</option>
                                        <?php foreach($dogListByUser as $dog){ ?>
                                            <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($DoseInfo) && isset($DoseInfo)){ if($dog['dog_id']==$DoseInfo['dog_id']){echo"selected";} } ?> ><?= $dog['dog_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Vaccinated Date</label>
                                    <input type="date" name="vaccinated_date" class="form-control" id="exampleInputName" placeholder="Date" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['vaccination_date']:"" ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Register Number</label>
                                    <input type="text" name="register_no" class="form-control" id="register_no" placeholder="Register Number" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['register_no']:"" ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Microchip Number</label>
                                    <input type="text" name="microchip_no" class="form-control" id="microchip_no" placeholder="Microchip Number" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['microchip_no']:"" ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date Of Birth</label>
                                    <input type="date" name="dog_birth_date" class="form-control" id="dog_birth_date" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['dog_birthdate']:"" ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Doctor Name</label>
                                    <input type="text" name="doctor" class="form-control" id="doctor" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['doctor_name']:"" ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Doctor Mobile</label>
                                    <input type="text" name="doctor_phone" class="form-control" id="doctor_phone" placeholder="Date" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['doctor_contact']:"" ?>" required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Vaccine</label>
                                <select name="vaccination_id" id="vaccination_id" class="form-control" required>
                                    <option value="">Select Vaccination</option>
                                    <?php foreach($vaccineList as $row){ ?>
                                        <option value="<?= $row['id'] ?>" <?php if(!empty($DoseInfo) && isset($DoseInfo)){ if($row['id']==$DoseInfo['vaccinated_id']){echo"selected";} } ?>><?= $row['vaccination_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Next Appointment</label>
                                <input type="date" name="next_appointment" id="next_appointment" class="form-control" placeholder="Next Appointment" value="<?php  echo(!empty($DoseInfo))?date("Y-m-d",strtotime($DoseInfo['next_appointment'])):"" ?>" required> 
                            </div>
                        </div>    
                    </div>
                        
                    </div>
                </div>          
                                      
              <div class="box-footer"> 
                <input type="hidden" name="id" value="<?= $DoseInfo['id'] ?>">              
                <button type="submit" class="btn btn-primary pull-right" name="edit-dose-form">Update</button>
              </div>
            </form>
        </div> 

        
    </section>
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>