<?php $this->load->view('useradmin/comman/userheader'); ?>
<style>
    .customHrLine{
        border-top: 1px solid #ccc;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Award Details       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Award Details</li>
      </ol>
    </section>  
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="box box-primary">            
            <form role="form" name="showForm" action="<?php echo base_url(); ?>add-award"  method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Select Dog</label>
                                <select name="dog_id" id="" class="form-control">
                                    <option value="">Select Dog</option>
                                    <?php foreach($dogListByUserDetails as $dog){ ?>
                                        <option value="<?= $dog['dog_id'] ?>"><?= $dog['dog_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="DivAppend">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row" id="row1">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Show</label>
                                            <input type="text" name="awardTitle[]" id="awardTitle"  class="form-control" placeholder="Show" />
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

                                <div class="row" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Registration No</label>
                                            <input type="text" name="registration[]" class="form-control" id="registration" placeholder="Registration No" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Club Name</label>
                                            <input type="text" name="club_name[]" class="form-control" id="club_name" placeholder="Club Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Location</label>
                                            <input type="text" name="location[]" class="form-control" id="location" placeholder="Location" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" >                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Photographer</label>
                                            <input type="text" name="photographer[]" class="form-control" id="photographer" placeholder="Photographer" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Mobile No</label>
                                            <input type="text" name="mobile[]" class="form-control" id="mobile" placeholder="Mobile No" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Breed Judge</label>
                                            <input type="text" name="breed_judge[]" class="form-control" id="breed_judge" placeholder="Breed Judge" >
                                        </div>
                                    </div>
                                </div> 

                                <div class="row" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Show judges name</label>
                                            <input type="text" name="judges_name[]" class="form-control" id="judges_name" placeholder="Show judges name" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Group Judge</label>
                                            <input type="text" name="group_judge[]" class="form-control" id="group_judge" placeholder="Group Judge" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Provisional</label>
                                            <input type="text" name="provisional[]" class="form-control" id="provisional" placeholder="Provisional" >
                                        </div>
                                    </div>
                                </div> 
                                <hr class="customHrLine">
                                <div class="row" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Dog Handeled by</label>
                                            <input type="text" name="dog_handeled_by[]" class="form-control" id="dog_handeled_by" placeholder="Dog Handeled by" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Entry Of Dogs</label>
                                            <input type="text" name="entry_of_dogs[]" class="form-control" id="entry_of_dogs" placeholder="Entry Of Dogs" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Entry Of Bitches</label>
                                            <input type="text" name="entry_of_bitches[]" class="form-control" id="entry_of_bitches" placeholder="Entry Of Bitches" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Entry Of BOB</label>
                                            <input type="text" name="entry_of_bob[]" class="form-control" id="entry_of_bob" placeholder="Entry Of BOB" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Entry Of Non Rgular</label>
                                            <input type="text" name="entry_of_non_regular[]" class="form-control" id="entry_of_non-regular" placeholder="Entry Of Non Regular" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Entry Of Major</label>
                                            <input type="text" name="entry_of_major[]" class="form-control" id="entry_of_major" placeholder="Entry Of Major" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Class Entered</label>
                                            <input type="text" name="class_enterd[]" class="form-control" id="class_enterd" placeholder="Class Entered" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Total Entry</label>
                                            <input type="text" name="no_in_class[]" class="form-control" id="no_in_class" placeholder="Total Entry" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Awards</label>
                                            <input type="text" name="awards[]" class="form-control" id="awards" placeholder="Awards" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" >
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Points</label>
                                            <input type="text" name="points[]" class="form-control" id="points" placeholder="Points" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Group</label>
                                            <input type="text" name="group[]" class="form-control" id="no_in_class" placeholder="Group" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label">Judge Comments</label>
                                            <!-- <input type="text" name="comments_judging[]" class="form-control" id="comments_judging" placeholder="Comments Judging" > -->
                                            <textarea class="form-control" rows="3" name="comments_judging[]" class="form-control" id="comments_judging" placeholder="Comments"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>                               
                    </div>                            
                </div>          

                <div class="box-footer">                    
                    <button type="submit" class="btn btn-primary"  name="add-award-form">Submit</button>
                </div>
            </form>
        </div>
            </div>
            <div class="col-md-1"></div>
        </div>       
        
    </section>       
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?<?= time() ?>"></script>

<script>
     var id =1;
   $('#addbtn').click(function(){
       id++;
    let html = `<div class="panel panel-default" id="row${id}">
                    <div class="panel-body">
                        <div class="row" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Show ${id}</label>
                                    <input type="text" name="awardTitle[]" id="awardTitle"  class="form-control" placeholder="Show" />
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
                        </div>

                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Registration No</label>
                                    <input type="text" name="registration[]" class="form-control" id="registration" placeholder="Registration No" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Club Name</label>
                                    <input type="text" name="club_name[]" class="form-control" id="club_name" placeholder="Club Name" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Location</label>
                                    <input type="text" name="location[]" class="form-control" id="location" placeholder="Location" >
                                </div>
                            </div>
                        </div>
                                
                        <div class="row" >                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Photographer</label>
                                    <input type="text" name="photographer[]" class="form-control" id="photographer" placeholder="Photographer" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Mobile No</label>
                                    <input type="text" name="mobile[]" class="form-control" id="mobile" placeholder="Mobile No" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Breed Judge</label>
                                    <input type="text" name="breed_judge[]" class="form-control" id="breed_judge" placeholder="Breed Judge" >
                                </div>
                            </div>
                        </div> 

                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Show judges name</label>
                                    <input type="text" name="judges_name[]" class="form-control" id="judges_name" placeholder="Show judges name" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Group Judge</label>
                                    <input type="text" name="group_judge[]" class="form-control" id="group_judge" placeholder="Group Judge" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Provisional</label>
                                    <input type="text" name="provisional[]" class="form-control" id="provisional" placeholder="Provisional" >
                                </div>
                            </div>
                        </div>
                                
                        <hr class="customHrLine">
                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Dog Handeled by</label>
                                    <input type="text" name="dog_handeled_by[]" class="form-control" id="dog_handeled_by" placeholder="Dog Handeled by" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Entry Of Dogs</label>
                                    <input type="text" name="entry_of_dogs[]" class="form-control" id="entry_of_dogs" placeholder="Entry Of Dogs" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Entry Of Bitches</label>
                                    <input type="text" name="entry_of_bitches[]" class="form-control" id="entry_of_bitches" placeholder="Entry Of Bitches" >
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Entry Of BOB</label>
                                    <input type="text" name="entry_of_bob[]" class="form-control" id="entry_of_bob" placeholder="Entry Of BOB" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Entry Of Non Rgular</label>
                                    <input type="text" name="entry_of_non-regular[]" class="form-control" id="entry_of_non-regular" placeholder="Entry Of Non Regular" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Entry Of Major</label>
                                    <input type="text" name="entry_of_major[]" class="form-control" id="entry_of_major" placeholder="Entry Of Major" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Class Entered</label>
                                    <input type="text" name="class_enterd[]" class="form-control" id="class_enterd" placeholder="Class Entered" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Total Entry</label>
                                    <input type="text" name="no_in_class[]" class="form-control" id="no_in_class" placeholder="Total Entry" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Awards</label>
                                    <input type="text" name="awards[]" class="form-control" id="awards" placeholder="Awards" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" >
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Points</label>
                                    <input type="text" name="points[]" class="form-control" id="points" placeholder="Points" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control-label">Group</label>
                                    <input type="text" name="group[]" class="form-control" id="no_in_class" placeholder="Group" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                     <label for="control-label">Comments Judging</label>                                    
                                    <textarea class="form-control" rows="3" name="comments_judging[]" id="comments_judging" placeholder="Comments"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
     $('#DivAppend').append(html)           
   })

   $('body').on('click','.remove',function(){
       let rowID =  $(this).attr('data-id');
       $('#row'+rowID).remove()
   })

$(function () {
       
       var base_url = "<?php echo base_url('customer/kennel/check_unique_microchip'); ?>";       
       $("form[name='showForm']").validate({

           rules: {
                dog_id: "required",                
                'awardTitle[]': {
                   required: true
                },
                'award_date[]':{
                    required: true
                },
                'registration[]':{
                    required: true
                },
                'club_name[]':{
                    required: true
                },
                'location[]':{
                    required: true
                },

              
           },
           // Specify validation error messages
           messages: {
            dog_id: "Please select a valid dog name.",
            'awardTitle[]': {
                required: 'Please enter a value for show',
            },
            'award_date[]': {
                required: 'Please enter a value for show Date',
            },
             
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