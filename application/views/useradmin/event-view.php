<?php $this->load->view('useradmin/comman/userheader'); ?>
<!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/calendar/fullcalendar/lib/main.min.css">

<style>
    table {
    display: table !important;
    overflow-x: auto;
    white-space: nowrap;
}
.btn-info.text-light:hover,
    .btn-info.text-light:focus {
        background: #000;
    }
    table, tbody, td, tfoot, th, thead, tr {
        border-color: #ededed !important;
        border-style: solid;
        border-width: 1px !important;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Add Schedule    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Schedule</li>
      </ol>
    </section>     
    <section class="content">
    
        <div class="row">
            <div class="col-md-9">
                <div class="box box-primary rounded-0 shadow">
                    <div id="calendar"></div>
                </div>
            </div>           
           <div class="col-md-3">
                <div class="box box-primary rounded-0 shadow">
                    <div id="alertSuccess" class="alert alert-success alert-dismissible" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i></h4> 
                        Date and Time have been booked               
                    </div>
                    <div id="alertSuccessDelet" class="alert alert-success alert-dismissible" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i></h4> 
                        Date and Time have been booked               
                    </div>
                    <div id="alertError" class="alert alert-danger alert-dismissible" style="display:none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i></h4>
                        Something went wrong!
                   </div>
                    <div class="box-header with-border">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
   
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                        <button type="button" type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
      
    </section>     
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="<?php echo base_url(); ?>assets/calendar/fullcalendar/lib/main.min.js"></script>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="<?php echo base_url(); ?>assets/calendar/js/script.js"></script>
<script>
    $(document).ready(function(){
        $("#schedule-form").on('submit', function(e){
            e.preventDefault();
           
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url();?>customer/kennel/add_shows',
                dataType: 'json',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                
                success: function(resp){
                    console.log(resp);
                    if(resp.success =='true'){	
                        $("#alertSuccess").show() 
                        setTimeout(function() {
                            $("#alertSuccess").hide(); 
                            location.reload();
                        }, 3000);			  		
                    }else{                        
                        $("#alertError").show() 
                        setTimeout(function() {
                            $("#alertError").hide(); 
                            location.reload();
                        }, 3000);
                    }
                    
                }
            });
        });

        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                
                var _conf = confirm("Are you sure to delete this scheduled event?");
                if (_conf === true) {                   
                    var data = 'id='+ id;
                    $.ajax({
                        "url":"<?php echo base_url(); ?>customer/kennel/delete_schedule",
                        "data":data,
                        "type":"post",
                        "success":function(msg) {
                            var resp = JSON.parse(msg);
                            if( resp.success == 'true') {                           
                                $("#alertSuccessDelet").show() 
                                setTimeout(function() {
                                    $("#alertSuccessDelet").hide(); 
                                    location.reload();
                                }, 3000);
                            }
                            else {
                                alert(resp.msg);
                            }
                        }
                    });
                }
            } else {
                alert("Event is undefined");
            }
        })
    })
</script>
