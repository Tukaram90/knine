<?php $this->load->view('useradmin/comman/userheader'); ?>
<style>
    /* CSS to style Treeview menu  */
ol.tree {
	padding: 0 0 0 30px;
	width: 300px;
}
li { 
	position: relative; 
	margin-left: -15px;
	list-style: none;
}      
li input {
	position: absolute;
	left: 0;
	margin-left: 0;
	opacity: 0;
	z-index: 2;
	cursor: pointer;
	height: 1em;
	width: 1em;
	top: 0;
}
li input + ol {
	
	background: url(<?php echo base_url('assets/imgs/toggle-small-expand.png') ?>) 40px 0 no-repeat;
	margin: -1.600em 0px 8px -44px; 
	height: 1em;
}
li input + ol > li { 
	display: none; 
	margin-left: -14px !important; 
	padding-left: 1px; 
}
li label {
	background: url(<?php echo base_url("assets/imgs/folder.png") ?>) 15px 1px no-repeat;
	cursor: pointer;
	display: block;
	padding-left: 37px;
}
li input:checked + ol {
	background: url(<?php echo base_url("assets/imgs/toggle-small.png") ?>) 40px 5px no-repeat;
	margin: -1.96em 0 0 -44px; 
	padding: 1.563em 0 0 80px;
	height: auto;
}
li input:checked + ol > li { 
	display: block; 
	margin: 8px 0px 0px 0.125em;
}
li input:checked + ol > li:last-child { 
	margin: 8px 0 0.063em;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Hierarchical Inheritance Dogs       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hierarchical Inheritance Dogs</li>
      </ol>
    </section>  
    <section class="content">
		<div class="row">
			
			<div class="col-md-6">
				<div class="box box-primary" style='margin: 10px;'>   
					<a href="<?php echo base_url(); ?>kennel-list" class="btn btn-success pull-right" style="margin: 10px;">Back</a>
					<?php 
					    if(isset($menu) && !empty($menu)){
							echo $menu;
						}
					?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
       
    </section>
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Kennel Details Modal</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<center>
						<img src="" id="imagepreview" class="img-responsive pad" style="width: 250px; height: 264px;" >
					</center>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><b>Kennel Name</b></p>
						<p id="name"></p>				
					</div>
					<div class="col-md-6">
						<p><b>Kennel Type</b></p>
						<p id="type"></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><b>Age</b></p>
						<p id="age"></p>				
					</div>
					<div class="col-md-6">
						<p><b>color</b></p>
						<p id="color"></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><b>Birthdate</b></p>
						<p id="bdate"></p>				
					</div>
					<div class="col-md-6">
						<p><b>Gender</b></p>
						<p id="gender"></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			
			</div>
		</div>		
		</div>		
	</div>       
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script>
	$("body").on("click",".getDetails", function(e){  
		let dog_id = $(this).attr('data-id');           
        $.ajax({
				url: '<?php echo base_url(); ?>customer/kennel/get_dog_details',
				type: "POST",
				data: {dog_id: dog_id},
				cache: false,
				success: function(dataResult){
					var info = JSON.parse(dataResult);
				     console.log(info)
					if(info.status ==true){ 
						$('#imagepreview').attr('src', '<?php echo base_url(); ?>uploads/dogs/'+info.data.dog_img);
						$('#name').html(info.data.dog_name);
						$('#type').html(info.data.dog_name);						
						$('#age').html(info.data.age);
						$('#color').html(info.data.color);
						$('#bdate').html(info.data.date_of_birth);
						$('#gender').html(info.data.gender);
						$('#modal-default').modal('show');				
						
					}else {
						$("#fail").show();
						//$('#fail').text(dataResult.msg);
					}
					
				}
			});
    });
</script>
