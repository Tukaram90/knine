<?php $this->load->view('useradmin/comman/userheader'); ?>
<style>
  .pedigree_node {
      border: 1px solid #99BBE8;
      background-color: #CCDDF4;
  }
  .tree_vertical_line {
      background-image: url('<?php echo base_url(); ?>assets/dist/treeasset/images/tree_line.gif');
      background-repeat: repeat-y;
      background-position: center top;
  }
  .tree_horizontal_line {
      background-image: url('<?php echo base_url(); ?>assets/dist/treeasset/images/tree_line.gif');
      background-repeat: repeat-x;
      background-position: left top;
  }
  .tree_horizontal_line_valign_middle {
      background-image: url('<?php echo base_url(); ?>assets/dist/treeasset/images/tree_line_2px.gif');
      background-repeat: repeat-x;
      background-position:left center}
  .tree_right_line {
      border-right-width: 1px;
      border-right-style: solid;
      border-right-color: #C6C6C6;
  }
  .tree_left_top_line {
      border-top-width: 1px;
      border-top-style: solid;
      border-top-color: #C6C6C6;
      border-left-width: 1px;
      border-left-style: solid;
      border-left-color: #C6C6C6;
  }
  .tree_right_top_line {
      border-top-width: 1px;
      border-top-style: solid;
      border-top-color: #C6C6C6;
      border-right-width: 1px;
      border-right-style: solid;
      border-right-color: #C6C6C6;
  }
</style>
  
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Pedgree Pic      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Expense</li>
      </ol>
    </section>  
    <section class="content">
       
        <div class="box box-primary">            
          <div class="row"><br><br>
         
            
                <table width='100%' border='0' align='center' cellpadding='0' cellspacing='5'>
                    <tr><?php print_r($family) ?></tr>
                </table><br><br>
            
          </div>            
			  </div>
        </div>       
    </section>       
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



