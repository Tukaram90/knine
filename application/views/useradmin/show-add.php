<?php $this->load->view('useradmin/comman/userheader'); ?>
<?php
   $classEntredArr = array("6 to 9 month Puppy", "9 to 12 month Puppy", "12 to 15 month","12 to 18 month","15 to 18 month","Veterans","Brace","Stud Dog","Brood Bitch",
     "Novice","Novice Junior","Novice Intermediate","Novice Senior","Amateur-Owner-Handler","Bred-by-Exhibitor Puppy","Bed-by-Exhibitor Adult","American Bred","Open",
     "Open Junior","Open Intermediate","Open Senior","Best of Breed","Master Class","Sweepstakes","Field Trial Dog","Field Trial Bitch","Hunting Dog","Hunting Bitch","Working Dog","Working Bitch","Other non-regular");
     sort($classEntredArr);
    $awardlistArr = array('1','2','3','4','Reserve Winners','Winners','Best of Winners','Best Non-Regular',
    'Best of Breed','NOHS Best of Breed','Select','Award of Merit','Best Puppy','Best Bred-by-Exhibitor','Best Veteran','Withheld');
    $oneTroughFourArr = array(1,2,3,4);
    $nonRegularGroupArr = array("Best Puppy","Best Bred-By-Exhibitor","Best Veteran","Best Brace","Best in Misc","Other Non-Regular Group");
    sort($nonRegularGroupArr);
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

<style>
    .customHrLine{
        border-top: 1px solid #ccc;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Show Details       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">show Details</li>
      </ol>
    </section>  
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(!empty($this->session->flashdata('error'))) {
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    
                        <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('error'); ?></p>
                        </div>
                        <?php
                    }
                    if(!empty($this->session->flashdata('success'))) {
                        ?>
                        
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        
                        <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                        <?php
                    }
                ?>        
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="box box-primary">            
            <form role="form" name="showForm" action="<?php echo base_url(); ?>shows-add"  method="post" enctype="multipart/form-data">
              <div class="box-body">
                    <div class="row">
                        <div class="col-md-10">
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
                        <div class="col-md-2"><br>
                        <a type="button" class="btn btn-info" title="Add New Title" id="addbtn"> <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    SECTION 1 - GENERAL SHOW DETAILS
                                </a>
                            </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Club name</label>
                                                <input type="text" name="clubname[]" id="clubname"  class="form-control" placeholder="Club name" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Show location</label>
                                                <input type="text" name="showlocation[]" id="showLocation"  class="form-control" placeholder="Show location" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Show Date</label>
                                                <input type="date" name="show_date[]" id="showDate"  class="form-control" placeholder="Show Date" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Entry Fee</label>
                                                <input type="text" name="fee[]" id="Fee"  class="form-control" placeholder="Entry Fee" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Show Photographer</label>
                                                <input type="text" name="photographer[]" id="photographer"  class="form-control" placeholder="Photographer" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Photographer contact info</label>
                                                <input type="text" name="photographer_contact[]" id="photographer_contact"  class="form-control" placeholder="Photographer contact" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Show Superintendent</label>
                                                <input type="text" name="show_superintendent[]" id="show_superintendent"  class="form-control" placeholder="Show Superintendent" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Show Chair</label>
                                                <input type="text" name="show_chair[]" id="show_chair"  class="form-control" placeholder="Show Chair" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Show Chair contact info</label>
                                                <input type="text" name="chair_contact_info[]" id="chair_contact_info"  class="form-control" placeholder="Show Chair contact info" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Breed Judge</label>
                                                <input type="text" name="breed_judge[]" id="breed_judge"  class="form-control" placeholder="Breed Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Provisional</label>
                                                <select name="breed_judge_provisional[]" id="" class="form-control">
                                                    <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Group Judge</label>
                                                <input type="text" name="group_judge[]" id="group_judge"  class="form-control" placeholder="Group Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Provisional</label>
                                                <select name="group_judge_provisional[]" id="" class="form-control">
                                                    <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Group Judge</label>
                                                <input type="text" name="nohs_judge[]" id="nohs_judge"  class="form-control" placeholder="NOHS Group Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Provisional</label>
                                                <select name="nohs_judge_provisional[]" id="" class="form-control">
                                                    <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Best In Show Judge</label>
                                                <input type="text" name="best_judge[]" id="best_judge"  class="form-control" placeholder="Best In Show Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Best in Show Judge</label>
                                                <input type="text" name="nohs_best_judge[]" id="nohs_best_judge"  class="form-control" placeholder="NOHS Best in Show Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Comments on Show grounds</label>
                                                <textarea class="form-control" rows="3" name="comments_grounds[]" id="comments_grounds" placeholder="Comments"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                 SECTION 2 - BREED ENTRY AND AWARDS
                                </a>
                            </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Dog Handled by</label>
                                            <input type="text" name="dog_handled[]" id="dog_handled"  class="form-control" placeholder="Dog Handled by" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Class Entered</label>
                                            <select name="class_entered[]" id="class_entered" class="form-control select2" style="width: 100%;">
                                                <option value="" disabled>Class Entered</option>
                                                <?php foreach($classEntredArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Entry Fee</label>
                                            <input type="text" name="handled_entry_fee[]" id="handled_entry_fee"  class="form-control" placeholder="Fee" />
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Number of Class dogs</label>
                                        <input type="text" name="nmbr_class_dog[]" id="nmbr_class_dog"  class="form-control" placeholder="Number of Class dogs" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Number of class bitches</label>
                                        <input type="text" name="nmbr_class_bitches[]" id="nmbr_class_bitches"  class="form-control" placeholder="Number of Class bitches" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Non-regular entries</label>
                                        <input type="text" name="non_regular_entry[]" id="non_regular_entry"  class="form-control" placeholder="Number of non-regular entries" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Number of BOB entries</label>
                                        <input type="text" name="number_bob_entry[]" id="number_bob_entry"  class="form-control" placeholder="Number of Class dogs" />
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Total entry showing in the Breed</label>
                                        <input type="text" name="total_entry[]" id="total_entry"  class="form-control" placeholder="Total entry showing in the Breed" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Major Entry</label>
                                            <select name="major_entry[]" id="" class="form-control">
                                                <option value="">select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">1<sup>st</sup> Award Received</label>
                                            <select name="first_award[]" id="1st_award" class="form-control select2" style="width: 100%;">
                                                <option value="">select</option>
                                                <?php foreach($awardlistArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">2<sup>nd</sup> Award Received</label>
                                            <select name="second_award[]" id="2nd_award" class="form-control select2" style="width: 100%;">
                                                <option value="">select</option>
                                                <?php foreach($awardlistArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">3<sup>rd</sup> Award Received</label>
                                            <select name="third_award[]" id="3rd_award[]" class="form-control select2" style="width: 100%;">
                                                <option value="">select</option>
                                                <?php foreach($awardlistArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">4<sup>th</sup>Award Received</label>
                                            <select name="fourth_award[]" id="4th_award[]" class="form-control select2" style="width: 100%;">
                                                <option value="">select</option>
                                                <?php foreach($awardlistArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>                                                    
                               </div>
                               <div class="row">
                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Comments on judging</label>
                                        <textarea class="form-control" rows="3" name="comments_judging[]" id="comments_judging" placeholder="Comments"></textarea>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    SECTION 3 - GROUPS AND BIS
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Group Placement</label>
                                                <select name="group_placement[]" id="group_placement" class="form-control">
                                                    <option value="">select</option>
                                                    <?php foreach($oneTroughFourArr as $option){ ?>
                                                        <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Number of group points</label>
                                                <input type="text" name="group_plcement_points[]" id="group_plcement_points"  class="form-control" placeholder="Number of group points" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Group Placement</label>
                                                <select name="nohs_group_placement[]" id="nohs_group_placement" class="form-control">
                                                   <option value="">select</option>
                                                    <?php foreach($oneTroughFourArr as $option){ ?>
                                                        <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Number of group points</label>
                                                <input type="text" name="nohs_group_points[]" id="nohs_group_points"  class="form-control" placeholder="Number of group points" />
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Best in Show</label>
                                                <select name="best_in_show[]" id="best_in_show" class="form-control">
                                                   <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Show entry</label>
                                                <input type="text" name="bst_show_entry[]" id="show_entry"  class="form-control" placeholder="Best in Show" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Reserve Best in Show</label>
                                                <select name="reserve_bst_show[]" id="" class="form-control">
                                                    <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Best in Show</label>
                                                <select name="nohs_best_in_show[]" id="nohs_best_in_show" class="form-control">
                                                    <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Show entry</label>
                                                <input type="text" name="nohs_show_entry[]" id="nohs_show_entry"  class="form-control" placeholder="Best in Show" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Reserve Best in Show</label>
                                                <select name="nohs_reserve_bst_show[]" id="" class="form-control">
                                                   <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Non- Regular Group</label>
                                                <select name="non_regular_group[]" id="non_regular_group" class="form-control">
                                                    <option value="">select</option>
                                                     <?php foreach($nonRegularGroupArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Group Judge</label>
                                                <input type="text" name="group_judge[]" id="group_judge"  class="form-control" placeholder="Best in Show" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Group Placement</label>
                                                <select name="group_placement_3section[]" id="group_placement_3section" class="form-control">
                                                    <option value="">select</option>
                                                    <?php foreach($oneTroughFourArr as $option){ ?>
                                                        <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Non-regular Best in Show</label>
                                                <select name="non_regular_best_in_show_3sec[]" id="non_regular_best_in_show_3sec" class="form-control">
                                                    <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Non-Regular Best in Show Judge</label>
                                                <input type="text" name="non_regular_best_show_judge_3sec[]" id="non_regular_best_show_judge_3sec"  class="form-control" placeholder="Best in Show" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-3 checkbox-inline " style="padding-left: 34px;">
                                            <input id="JuniorShowmanship" type="checkbox" name="junior_shownship[]" value="Junior Showmanship">Junior Showmanship</label>
                                            <label class="col-sm-3 checkbox-inline">
                                            <input id="BestJuniorinShow" type="checkbox" name="best_junior_inshow[]" value="Best Junior in Show">Best Junior in Show</label>
                                            <label class="col-sm-4 checkbox-inline">
                                            <input id="ReservesBestJuniorinShow" type="checkbox" name="reserve_best_junior[]" value="Reserves Best Junior in Show">Reserves Best Junior in Show</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Comments on Show grounds and Judging </label>
                                                <textarea class="form-control" rows="3" name="comments_show_grounds_judging3section[]" id="" placeholder="Comments on Show grounds and Judging"></textarea>
                                            </div>
                                        </div>
                                    </div>                       
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="DivAppend"></div>             
                </div>          

                <div class="box-footer">                    
                    <button type="submit" class="btn btn-primary"  name="save-show-form">Submit</button>
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
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?<?= time() ?>"></script>

<script>
     var id =1;
   $('#addbtn').click(function(){
       id++; 
        let html = `
            <div class="panel-group customRow${id}" id="accordion">
                            <div class="col-md-2">
                                <a type="button" class="btn btn-danger remove" title="Remove"  data-id="${id}"> <i class="fa fa-trash-o"></i></a>
                            </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne${id}">
                                        SECTION ${id}.1 - GENERAL SHOW DETAILS
                                    </a>                                
                                </h4>
                            </div>
                            <div id="collapseOne${id}" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Club name</label>
                                                <input type="text" name="clubname[]" id="clubname"  class="form-control" placeholder="Club name" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Show location</label>
                                                <input type="text" name="showlocation[]" id="showLocation"  class="form-control" placeholder="Show location" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Show Date</label>
                                                <input type="date" name="show_date[]" id="showDate"  class="form-control" placeholder="Show Date" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Entry Fee</label>
                                                <input type="text" name="fee[]" id="Fee"  class="form-control" placeholder="Entry Fee" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Show Photographer</label>
                                                <input type="text" name="photographer[]" id="photographer"  class="form-control" placeholder="Photographer" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Photographer contact info</label>
                                                <input type="text" name="photographer_contact[]" id="photographer_contact"  class="form-control" placeholder="Photographer contact" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Show Superintendent</label>
                                                <input type="text" name="show_superintendent[]" id="show_superintendent"  class="form-control" placeholder="Show Superintendent" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Show Chair</label>
                                                <input type="text" name="show_chair[]" id="show_chair"  class="form-control" placeholder="Show Chair" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Show Chair contact info</label>
                                                <input type="text" name="chair_contact_info[]" id="chair_contact_info"  class="form-control" placeholder="Show Chair contact info" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Breed Judge</label>
                                                <input type="text" name="breed_judge[]" id="breed_judge"  class="form-control" placeholder="Breed Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Provisional</label>
                                                <select name="breed_judge_provisional[]" id="" class="form-control">
                                                    <option value="">Provisional</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Group Judge</label>
                                                <input type="text" name="group_judge[]" id="group_judge"  class="form-control" placeholder="Group Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Provisional</label>
                                                <select name="group_judge_provisional[]" id="" class="form-control">
                                                    <option value="">Provisional</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Group Judge</label>
                                                <input type="text" name="nohs_judge[]" id="nohs_judge"  class="form-control" placeholder="NOHS Group Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Provisional</label>
                                                <select name="nohs_judge_provisional[]" id="" class="form-control">
                                                    <option value="">Provisional</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Best In Show Judge</label>
                                                <input type="text" name="best_judge[]" id="best_judge"  class="form-control" placeholder="Best In Show Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Best in Show Judge</label>
                                                <input type="text" name="nohs_best_judge[]" id="nohs_best_judge"  class="form-control" placeholder="NOHS Best in Show Judge" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Comments on Show grounds</label>
                                                <textarea class="form-control" rows="3" name="comments_grounds[]" id="comments_grounds" placeholder="Comments"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo${id}">
                                 SECTION ${id}.2 - BREED ENTRY AND AWARDS
                                </a>
                            </h4>
                            </div>
                            <div id="collapseTwo${id}" class="panel-collapse collapse">
                            <div class="panel-body">
                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Dog Handled by</label>
                                            <input type="text" name="dog_handled[]" id="dog_handled"  class="form-control" placeholder="Dog Handled by" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Class Entered</label>
                                            <select name="class_entered[]" id="class_entered" class="form-control select2" style="width: 100%;">
                                                <option value="">Class Entered</option>
                                                <?php foreach($classEntredArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Entry Fee</label>
                                            <input type="text" name="handled_entry_fee[]" id="handled_entry_fee"  class="form-control" placeholder="Fee" />
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label">Number of Class dogs</label>
                                        <input type="text" name="nmbr_class_dog[]" id="nmbr_class_dog"  class="form-control" placeholder="Number of Class dogs" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Number of class bitches</label>
                                        <input type="text" name="nmbr_class_bitches[]" id="nmbr_class_bitches"  class="form-control" placeholder="Number of Class bitches" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Non-regular entries</label>
                                        <input type="text" name="non_regular_entry[]" id="non_regular_entry"  class="form-control" placeholder="Number of non-regular entries" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Number of BOB entries</label>
                                        <input type="text" name="number_bob_entry[]" id="number_bob_entry"  class="form-control" placeholder="Number of Class dogs" />
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Total entry showing in the Breed</label>
                                        <input type="text" name="total_entry[]" id="total_entry"  class="form-control" placeholder="Total entry showing in the Breed" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Major Entry</label>
                                            <select name="major_entry[]" id="" class="form-control">
                                                <option value="">Major Entry</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">1<sup>st</sup> Award Received</label>
                                            <select name="first_award[]" id="1st_award" class="form-control select2" style="width: 100%;">
                                                <option value=""></option>
                                                <?php foreach($awardlistArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">2<sup>nd</sup> Award Received</label>
                                            <select name="second_award[]" id="2nd_award" class="form-control select2" style="width: 100%;">
                                                <option value=""></option>
                                                <?php foreach($awardlistArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">3<sup>rd</sup> Award Received</label>
                                            <select name="third_award" id="3rd_award[]" class="form-control select2" style="width: 100%;">
                                                <option value=""></option>
                                                <?php foreach($awardlistArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">4<sup>th</sup>Award Received</label>
                                            <select name="fourth_award" id="4th_award[]" class="form-control select2" style="width: 100%;">
                                                <option value=""></option>
                                                <?php foreach($awardlistArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>                                                    
                               </div>
                               <div class="row">
                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Comments on judging</label>
                                        <textarea class="form-control" rows="3" name="comments_judging[]" id="comments_judging" placeholder="Comments"></textarea>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree${id}">
                                    SECTION ${id}.3 - GROUPS AND BIS
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree${id}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Group Placement</label>
                                                <select name="group_placement[]" id="group_placement" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach($oneTroughFourArr as $option){ ?>
                                                        <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Number of group points</label>
                                                <input type="text" name="group_plcement_points[]" id="group_plcement_points"  class="form-control" placeholder="Number of group points" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Group Placement</label>
                                                <select name="nohs_group_placement[]" id="nohs_group_placement" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach($oneTroughFourArr as $option){ ?>
                                                        <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Number of group points</label>
                                                <input type="text" name="nohs_group_points[]" id="nohs_group_points"  class="form-control" placeholder="Number of group points" />
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Best in Show</label>
                                                <select name="best_in_show[]" id="best_in_show" class="form-control">
                                                    <option value=""></option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Show entry</label>
                                                <input type="text" name="bst_show_entry[]" id="show_entry"  class="form-control" placeholder="Best in Show" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Reserve Best in Show</label>
                                                <select name="reserve_bst_show[]" id="" class="form-control">
                                                    <option value=""></option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Best in Show</label>
                                                <select name="nohs_best_in_show[]" id="nohs_best_in_show" class="form-control">
                                                    <option value=""></option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Show entry</label>
                                                <input type="text" name="nohs_show_entry[]" id="nohs_show_entry"  class="form-control" placeholder="Best in Show" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">NOHS Reserve Best in Show</label>
                                                <select name="nohs_reserve_bst_show[]" id="" class="form-control">
                                                    <option value=""></option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Non- Regular Group</label>
                                                <select name="non_regular_group[]" id="non_regular_group" class="form-control">
                                                    <option value=""></option>
                                                     <?php foreach($oneTroughFourArr as $option){ ?>
                                                        <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Group Judge</label>
                                                <input type="text" name="group_judge[]" id="group_judge"  class="form-control" placeholder="Best in Show" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Group Placement</label>
                                                <select name="group_placement_3section[]" id="group_placement_3section" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach($oneTroughFourArr as $option){ ?>
                                                        <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Non-regular Best in Show</label>
                                                <select name="non_regular_best_in_show_3sec[]" id="non_regular_best_in_show_3sec" class="form-control">
                                                    <option value=""></option>
                                                   <?php foreach($nonRegularGroupArr as $option){ ?>
                                                    <option value="<?= $option ?>"><?= $option ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Non-Regular Best in Show Judge</label>
                                                <input type="text" name="non_regular_best_show_judge_3sec[]" id="non_regular_best_show_judge_3sec"  class="form-control" placeholder="Best in Show" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-3 checkbox-inline " style="padding-left: 34px;">
                                            <input id="JuniorShowmanship" type="checkbox" name="junior_shownship[]" value="Junior Showmanship">Junior Showmanship</label>
                                            <label class="col-sm-3 checkbox-inline">
                                            <input id="BestJuniorinShow" type="checkbox" name="best_junior_inshow[]" value="Best Junior in Show">Best Junior in Show</label>
                                            <label class="col-sm-4 checkbox-inline">
                                            <input id="ReservesBestJuniorinShow" type="checkbox" name="reserve_best_junior[]" value="Reserves Best Junior in Show">Reserves Best Junior in Show</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Comments on Show grounds and Judging </label>
                                                <textarea class="form-control" rows="3" name="comments_show_grounds_judging3section[]" id="" placeholder="Comments on Show grounds and Judging"></textarea>
                                            </div>
                                        </div>
                                    </div>                       
                                </div>
                            </div>
                        </div>
                    </div>`;     
     $('#DivAppend').append(html)           
   })

   $('body').on('click','.remove',function(){
       let rowID =  $(this).attr('data-id');
       $('.customRow'+rowID).remove()
   })

$(function () {
        $('.select2').select2();

       var base_url = "<?php echo base_url('customer/kennel/check_unique_microchip'); ?>";       
       $("form[name='showForm']").validate({
            rules: {
                dog_id: "required",                
                'clubname[]': {
                   required: true
                },
                'showlocation[]':{
                    required: true
                },
                'show_date[]':{
                    required: true
                },                             
            },
           // Specify validation error messages
           messages: {
            dog_id: "Please select a valid dog name.",
            // 'awardTitle[]': {
            //     required: 'Please enter a value for show',
            // },
            // 'award_date[]': {
            //     required: 'Please enter a value for show Date',
            // },
             
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
    /* font-size: 14px; */
}
/* .form-control.error {
    border-color: red;
    padding: .375rem .75rem;
} */
.panel-heading .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
    content: "\e114";    /* adjust as needed, taken from bootstrap.css */
    float: right;        /* adjust as needed */
    color: grey;         /* adjust as needed */
}
.panel-heading .accordion-toggle.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\e080";    /* adjust as needed, taken from bootstrap.css */
}
</style>
