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

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Add Award Titles       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Award Titles </li>
      </ol>
    </section>  
   
    <section class="content">
        <div class="box box-primary">
            <a href="<?php echo base_url(); ?>award-list" class="btn btn-warning pull-right" style="margin-top: 3px;margin-right: 15px;" title="Return To List Page"><i class="fa fa-list"> </i></a>
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle flushDiv">1</a>
                        <p>Award Titles</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p>Award Details</p>
                    </div>                    
                </div>
            </div>
            <form role="form" action="#" method="post" >
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12" >
                        <div class="col-md-12" >
                            <h3> Award Titles</h3>
                           
                                <div class="form-group">
                                        <label class="control-label">Select Dog</label>
                                       <select name="dog_id" id="" class="form-control">
                                          <option value="">Select Dog</option>
                                          <?php foreach($dogListByUserDetails as $dog){ ?>
                                                <option value="<?= $dog['dog_id'] ?>"><?= $dog['dog_name'] ?></option>
                                            <?php } ?>
                                       </select>
                                </div>
                            
                            <div id="DivAppend">
                            <div class="row" id="row1">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Award Title</label>
                                        <input type="text" name="awardTitle[]" id="awardTitle"  class="form-control" placeholder="Award Title" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Date</label>
                                        <input type="date" name="award_date[]" id="award_date"  class="form-control" placeholder="Award Achieved Date" />
                                    </div>
                                </div>
                                <div class="col-md-2"><br>
                                    <a type="button" class="btn btn-info" title="Add New Title" id="addbtn"> <i class="fa fa-plus"></i></a>
                                </div>                               
                            </div>                           
                            </div>
                                                   
                            <button class="btn btn-primary nextBtn btn-lg pull-right marginBottom countRow" type="button" >Next</button>
                        </div>
                    </div>
                </div>
                <div class="row setup-content" id="step-2">
                    <div class="col-xs-12" >
                        <div class="col-md-12">
                            <h3> Award Details</h3>
                           
                            <div id="htmlDiv"></div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right marginBottom" type="submit" >Submit</button>
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
   var id =1;
   $('#addbtn').click(function(){
       id++;
    let html = `<div class="row" id="row${id}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Award Title</label>
                            <input type="text" name="awardTitle[]" id="awardTitle"  class="form-control" placeholder="Award Title" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input type="date" name="award_date[]" id="award_date"  class="form-control" placeholder="Award Achieved Date" />
                        </div>
                    </div> 
                    <div class="col-md-2"><br>
                        <a type="button" class="btn btn-danger remove" title="Remove"  data-id="${id}"> <i class="fa fa-trash-o"></i></a>
                    </div>                            
                </div> `;
     $('#DivAppend').append(html)           
   })

   $('body').on('click','.remove',function(){
       let rowID =  $(this).attr('data-id');
       $('#row'+rowID).remove()
   })

   $('.countRow').click(function(){
        createElementForAwardDetails()
   })
   
   function createElementForAwardDetails(){
    $('#htmlDiv').empty()
    let htmlElemets = [];
      for (let index = 0; index < id; index++) {
        htmlElemets.push(`
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">Registration No</label>
                                        <input type="text" name="registration[]" class="form-control" id="registration" placeholder="Registration No" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">Club Name</label>
                                        <input type="text" name="club_name[]" class="form-control" id="club_name" placeholder="Club Name" >
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">Location</label>
                                        <input type="text" name="location[]" class="form-control" id="location" placeholder="Location" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">Photographer</label>
                                        <input type="text" name="photographer[]" class="form-control" id="photographer" placeholder="Photographer" >
                                    </div>
                                </div>
                            </div> 

                            <div class="row" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">Mobile No</label>
                                        <input type="text" name="mobile[]" class="form-control" id="mobile" placeholder="Mobile No" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">Breed Judge</label>
                                        <input type="text" name="breed_judge[]" class="form-control" id="breed_judge" placeholder="Breed Judge" >
                                    </div>
                                </div>
                            </div> 

                            <div class="row" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">Group Judge</label>
                                        <input type="text" name="group_judge[]" class="form-control" id="group_judge" placeholder="Group Judge" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label">Provisional</label>
                                        <input type="text" name="provisional" class="form-control" id="provisional" placeholder="Provisional" >
                                    </div>
                                </div>
                            </div> 
                                            
                        </div>
                    </div> `)
        
      }
      $('#htmlDiv').append(htmlElemets)  
   } 

   $('.flushDiv').click(function(){
        $(".panel panel-default").remove();
   })
   
   
</script>