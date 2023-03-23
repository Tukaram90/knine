<?php $this->load->view('useradmin/comman/userheader'); ?>
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
.customDisbled{
    pointer-events: none; 
    background: #f4f4f4; 
    
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Vaccination Form      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vaccination Form</li>
      </ol>
    </section>  
    <!-- <section class="content">
        <div class="box box-primary">            
            <form role="form" action="<?php echo base_url(); ?>customer/vaccination/add_vaccination" method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dog</label>
                                <select name="dog_id" id="" class="form-control" autofocus>
                                    <option value="">Select Dog</option>
                                    <?php foreach($dogListByUser as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($DoseInfo) && isset($DoseInfo)){ if($dog['dog_id']==$DoseInfo['dog_id']){echo"selected";} } ?>><?= $dog['dog_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Vaccinated Date</label>
                                <input type="date" name="vaccinated_date" class="form-control" id="exampleInputName" placeholder="Date" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['vaccination_date']:"" ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dr">Doctor Full Name</label><br>                        
                                <input type="text" name="doctor" class="form-control"  id="doctor" placeholder="Doctor Full Name" required="" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['doctor_name']:"" ?>"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Vaccination Name</label>
                                <input type="text" name="dose_name" class="form-control"  id="dose_name" placeholder="Vaccination Name" required="" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['vaccination_name']:"" ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Doctor Email</label>
                                <input type="text" name="doctor_email" id="doctor_email" class="form-control" placeholder="Doctor Email" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['doctor_email']:"" ?>"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img">Doctor Mobile</label>                        
                                <input type="text" name="doctor_phone" id="doctor_phone" class="form-control" placeholder="Doctor Contact Number" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['doctor_contact']:"" ?>"> 
                            </div>
                        </div>
                    </div>                   
                    
                    
                                 
              </div>          

              <div class="box-footer">
                <input type="hidden" name="vaccinated_id" value="<?php echo(!empty($DoseInfo))?$DoseInfo['id']:"" ?>">
                <button type="submit" class="btn btn-primary" name="save-dose-form">Submit</button>
              </div>
            </form>
        </div>     
       
  
    </section>    -->
    
    <section class="content">
        <div class="box box-primary">   
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle"><i class="fa   fa-user-md" style="color: #fff !important;"></i></a>
                        <p>Dr.Details</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">
                        <i class="fa fa-medkit" style="color: #fff !important;"></i>
                        </a>
                        <p>Dog with Vaccination</p>
                    </div>
                    <!-- <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p>Step 3</p>
                    </div> -->
                </div>
            </div>
            <form role="form"  action="<?php echo base_url(); ?>customer/vaccination/add_vaccination" method="post" enctype="multipart/form-data">
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3>Dr. Details</h3>                           
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Doctor Name</label>
                                        <input type="text" name="doctor" class="form-control"  id="doctor" placeholder="Doctor Full Name"  value="<?php  echo(!empty($DoseInfo))?$DoseInfo['doctor_name']:"" ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Experince</label> 
                                        <input type="text" name="experince" id="experince"  class="form-control"  placeholder="Experince" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['experince']:"" ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doctor Email</label>
                                        <input type="text" name="doctor_email" id="doctor_email" class="form-control" placeholder="Doctor Email" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['doctor_email']:"" ?>"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="img">Doctor Mobile</label>                        
                                        <input type="text" name="doctor_phone" id="doctor_phone" class="form-control allowOnlyNumber" placeholder="Doctor Contact Number" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['doctor_contact']:"" ?>"> 
                                    </div>
                                </div>
                            </div>     
                            <button class="btn btn-primary nextBtn btn-lg pull-right marginBottom" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Dog with Vaccination Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dog</label>
                                        <select name="dog_id" id="dog_id" class="form-control" autofocus>
                                            <option value="">Select Dog</option>
                                            <?php foreach($dogListByUser as $dog){ ?>
                                                <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($DoseInfo) && isset($DoseInfo)){ if($dog['dog_id']==$DoseInfo['dog_id']){echo"selected";} } ?>><?= $dog['dog_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label for="birth">Birth Date</label>                        
                                        <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Birth Date" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['dog_birthdate']:"" ?>" onchange="cauntAge()"> 
                                    </div>               
                                   
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Total Age</label>
                                        <input type="text" name="total_age" id="total_age" class="form-control" placeholder="Age" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['age']:"" ?>" readonly required="required"> 
                                    </div>
                                </div>
                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label for="birth">Vaccinated  Date</label>                        
                                        <input type="date" name="vaccinated_date" id="vaccinated_date" class="form-control" placeholder="Vaccinated Date" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['vaccination_date']:"" ?>"> 
                                    </div>               
                                   
                                </div>
                            </div>
                           

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vaccination Number</label>
                                        <select name="vaccination_number" id="vaccination_number" class="form-control" >
                                            <option value="">Select Vaccination Title</option>
                                            <?php foreach($vaccinationNumber as $row){ ?>
                                                <option value="<?= $row['id'] ?>" <?php if(!empty($DoseInfo) && isset($DoseInfo)){ if($row['id']==$DoseInfo['vaccinated_id']){echo"selected";} } ?>><?= $row['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label id="vaccinationLabel">Vaccination Name</label>               
                                       <input type="text" name="vaccination_name" id="vaccination_name" class="form-control" placeholder="Vaccination Name" value="<?php  echo(!empty($DoseInfo))?$DoseInfo['vaccination_name']:"" ?>"> 
                                    </div>
                                </div>
                            </div> 
                          
                            <input type="hidden" name="id" value="<?php echo(!empty($DoseInfo))?$DoseInfo['id']:"" ?>">
                            <button class="btn btn-success btn-lg pull-right marginBottom" name="save-dose-form" type="submit" onclick="return form_submit()">Finish!</button>
                        </div>
                    </div>
                </div>
              
            </form>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">            
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">AKC</h4>
                    </div>
                    <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="3">Vaccination Schedule Recommended by AKC</th>                            
                            </tr>
                            <tr>
                                <th width="12%">Age</th>
                                <th width="44%">Recommended Vaccinations</th>
                                <th>Optional Vaccinations</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>6-8 Weeks</td>
                            <td>Distemper, Parvovirus</td>
                            <td>Bordetella</td>
                        </tr>
                        <tr>
                            <td>10-12 Weeks</td>
                            <td>DHPP(vaccines for distemper,adenovirus[hepatitis],parainfluenza and parvovirus)</td>
                            <td>Influenza, Leptospirosis, Bordetella, Lyme disease per lifestyle as recommended</td>
                        </tr>
                        <tr>
                            <td>16-18 Weeks</td>
                            <td>DHPP, Rabies</td>
                            <td>Influenza, Lyme disease, Leptospirosis, Bordetella per lifestyle</td>
                        </tr>
                        <tr>
                            <td>12-16 Months</td>
                            <td>DHPP, Rabies</td>
                            <td>Coronavirus, Leptospirosis, Bordetella, Lyme disease</td>
                        </tr>
                        <tr>
                            <td>Every 1-2 Years</td>
                            <td>DHPP</td>
                            <td>Influenza, Coronavirus, Leptospirosis, Bordetella, Lyme disease per lifestyle</td>
                        </tr>
                        <tr>
                            <td>Every 1-3 Years</td>
                            <td>Rabies (as required by law)</td>
                            <td>none</td>
                        </tr>
                    
                        </tbody>
                    </table>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>            
            </div>
        </div>
    </section>
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script type="text/javascript">

    function first_step_validation(){
        $(".error").remove();
        var doctor = $('#doctor').val();
        if(doctor == ''){
            $('#doctor').after('<span class="error" style="color:red;">Enter Doctor name</span>');
            return false;
        }
        
        return true;
    }

    function form_submit(){
        $(".error").remove();
        var dog_id = $('#dog_id').val();
        if(dog_id == ''){
            $('#dog_id').after('<span class="error" style="color:red;">Please select Dog</span>');
            return false;
        }

        var birth_date = $('#birth_date').val();
        if(birth_date == ''){
            $('#birth_date').after('<span class="error" style="color:red;">Please select dog birth date</span>');
            return false;
        }

        var vaccinated_date = $('#vaccinated_date').val();
        if(vaccinated_date == ''){
            $('#vaccinated_date').after('<span class="error" style="color:red;">Please select vaccinated Date</span>');
            return false;
        }       

        var vaccination_number = $('#vaccination_number').val();
        if(vaccination_number == ''){
            $('#vaccination_number').after('<span class="error" style="color:red;">Please select vaccination number</span>');
            return false;
        }
        
        return true;
    }

    $(window).on('load', function() {
        $('#myModal').modal('show');
    });

    function cauntAge() {
        var Bdate  = $('#birth_date').val();
        var date = new Date(Bdate);
        var d1 = date.getDate(date)
        var m1 = (date.getMonth() + 1)
        var y1 =  date.getFullYear()
       
        var _date = new Date();
        $(".error").remove();
       if(date < _date){
        var d2 = _date.getDate();
        var m2 = 1 + _date.getMonth();
        var y2 = _date.getFullYear();
        var month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        if(d1 > d2){
            d2 = d2 + month[m2 - 1];
            m2 = m2 - 1;
        }

        if(m1 > m2){
            m2 = m2 + 12;
            y2 = y2 - 1;
        }

        var d = d2 - d1;
        var m = m2 - m1;
        var y = y2 - y1;

        $('#total_age').val(y+' Years '+m+' Months '+d+' Days');
       }else{
        $('#birth_date').after('<span class="error" style="color:red;">Please select proper date</span>');
        $('#total_age').val();
       }

    }


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
        var validation =  first_step_validation();
        if (isValid && validation)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
    });


    $('#vaccination_number').change(function(){
      var id = $(this).val();
     
      $.ajax({
        url:'<?= base_url() ?>customer/vaccination/getVaccinationName',
        method: 'post',
        data: {id: id},
        dataType: 'json',
        success: function(response){            
            if(response.vaccination_name === null){
                $("#vaccination_name").removeClass("customDisbled");
                $('#vaccination_name').val('');
                $("#vaccinationLabel").text("Add Note");
            }else{
                $("#vaccinationLabel").text("Vaccination Name");
                $("#vaccination_name").addClass("customDisbled");
                $('#vaccination_name').val(response.vaccination_name)
            }
        //   $('#vaccination_name').find('option').not(':first').remove();

          
        //   $.each(response,function(index,data){
        //      $('#vaccination_name').append('<option value="'+data['id']+'">'+data['vaccination_name']+'</option>');
        //   });
        }
     });
   });
 
</script>

