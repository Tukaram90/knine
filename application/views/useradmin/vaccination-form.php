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
      Vaccination Form      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Vaccination Form</li>
      </ol>
    </section>  
   
    <section class="content">

        <div class="box box-primary">            
            <form role="form" action="<?php echo base_url(); ?>customer/vaccination/add_vaccination" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dog</label>
                                    <select name="dog_id" id="dog_id" class="form-control" autofocus onchange="getDogWithVaccinationDetails()">
                                        <option value="">Select Dog</option>
                                        <?php foreach($dogListByUser as $dog){ ?>
                                            <option value="<?= $dog['dog_id'] ?>" <?php if(!empty($DoseInfo) && isset($DoseInfo)){ if($dog['dog_id']==$DoseInfo['dog_id']){echo"selected";} } ?> ><?= $dog['dog_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                           
                        </div>
                        <div id="appendDiv"></div>  
                    </div>
                </div>          
                                      
              <div class="box-footer" style="display:none" id="BtnDiv">               
                <button type="submit" class="btn btn-primary pull-right" name="save-dose-form">Submit</button>
              </div>
            </form>
        </div> 
          <div  id="setVaccination" style="display:none">  </div>                                
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">            
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Vaccination Schedule Recommended by AKC</h4>
                    </div>
                    <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>                            
                            <tr>
                                <th width="12%">Age</th>
                                <th width="44%">Recommended Vaccinations</th>
                                <th>Optional Vaccinations</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>6-8 Weeks</td>
                            <td>Distemper<br> Parvovirus</td>
                            <td>Bordetella</td>
                        </tr>
                        <tr>
                            <td>10-12 Weeks</td>
                            <td>DHPP(vaccines for distemper<br>adenovirus[hepatitis]<br>parainfluenza <br> parvovirus)</td>
                            <td>Influenza <br> Leptospirosis<br> Bordetella<br> Lyme disease per lifestyle as recommended</td>
                        </tr>
                        <tr>
                            <td>16-18 Weeks</td>
                            <td>DHPP<br> Rabies</td>
                            <td>Influenza Lyme disease<br> Leptospirosis<br> Bordetella per lifestyle</td>
                        </tr>
                        <tr>
                            <td>12-16 Months</td>
                            <td>DHPP<br> Rabies</td>
                            <td>Coronavirus<br> Leptospirosis<br> Bordetella<br> Lyme disease</td>
                        </tr>
                        <tr>
                            <td>Every 1-2 Years</td>
                            <td>DHPP</td>
                            <td>Influenza<br> Coronavirus<br> Leptospirosis<br> Bordetella<br> Lyme disease per lifestyle</td>
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
    $(window).on('load', function() {
        $('#myModal1').modal('show');
    });

    function getDogWithVaccinationDetails(){
        var dog_id = $('#dog_id').val();
        $('#appendDiv').empty()
        $.ajax({
            url: '<?= base_url() ?>customer/vaccination/get_dog_with_vaccination_details',                    
            type: 'POST',
            dataType: 'json',
            data: {dog_id:dog_id},
           
            success: function(data) {
                console.log(data)
                $('#appendDiv').append(data.view)
                $('#BtnDiv').show();               
                var html = '<div id="optionVaccine" data-object=' + JSON.stringify(data.vaccineInfo) + '></div>';
               
                $('#setVaccination').text(JSON.stringify(data.vaccineInfo));
            }
        });
        
    } 
   
    var id =1;
    
    $('body').on('click','#addbtn',function(){
        id++;
       
        var vaccinelist = $('#setVaccination').text();
        var vaccinelistArr = JSON.parse(vaccinelist);
        var options = '';
        for (let x of vaccinelistArr) {
            options += '<option value="' + x.id+ '">' + x.vaccination_name + '</option>';
        }
        
       let html =` <div class="row"  id="row${id}">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Vaccine</label>
                            <select name="vaccination_id[]" id="vaccination_id" class="form-control" required>
                                <option value="">Select Vaccination</option>                               
                               ${options}
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
                            <input type="date" name="next_appointment[]" id="next_appointment" class="form-control" placeholder="Next Appointment" required> 
                        </div>
                    </div>
                    <div class="col-md-1"><br>
                    <a type="button" class="btn btn-danger remove" title="Remove"  data-id="${id}"> <i class="fa fa-trash-o"></i></a>
                    </div>    
                </div>`;
                $('#DivAppend').append(html)    
   })

   $('body').on('click','.remove',function(){
       let rowID =  $(this).attr('data-id');
       $('#row'+rowID).remove()
   })
</script>