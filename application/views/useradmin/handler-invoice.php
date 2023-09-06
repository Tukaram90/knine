<?php $this->load->view('useradmin/comman/userheader'); ?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Handler Invoice      
      </h1>    
    </section>  
    <section class="invoice" id="printSection">
     
      <div class="row">
        <div class="col-xs-12">
            <?php        
              $alert = $this->session->flashdata('alert');
              if ($alert) {
                echo '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $alert . '</div>';
              }
            ?>
          <h2 class="page-header">
            <img src="<?php echo base_url(); ?>webasset/img/logo.jpg" width="30" height="30" class="img-responsive pull-left" id="weblogo" alt="k9 widget" > &emsp;
            <small class="pull-right">Date: <?= date('Y-m-d') ?></small>            
          </h2>
        </div>        
      </div>
      
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <h4><b>From</b></h4>
          <address>
            <strong><?= ucfirst($invoiceData['fullname']) ?></strong><br>
            <?= $invoiceData['address'] ?><br>
            Phone:  <?= $invoiceData['mobile'] ?><br>
            Email:  <?= $invoiceData['email'] ?>
          </address>
        </div>
        
        <div class="col-sm-4 invoice-col">
          <h4><b>To</b></h4>
          <address>
            <strong><?= $invoiceData['client_name'] ?></strong><br>
            Email:  <?= $invoiceData['client_email'] ?>
          </address>
        </div>
        
        <div class="col-sm-4 invoice-col">
          <b>Dogs:</b><br>  
            <?php 
               
              foreach($dognamearr as $key => $name){
                echo $name['dog_name'].', ';
              }
              
            ?>
          <br>
          <p><?= $invoiceData['show_details'] ?></p>
        </div>
        
      </div>
     
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table" style="border-collapse: collapse; border: none;">
            <thead>
            <tr>
              <th>SR.NO</th>             
              <th>Description</th>
              <th>Cost</th>
            </tr>
            </thead>
            <tbody>
              <?php if($invoiceData['deposit'] && $invoiceData['deposit']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Deposit</td>           
                <td class="calculate"><?=  ($invoiceData['deposit'] != 0)? set_currency():'' ?><?=  $invoiceData['deposit'] ?></td>                
              </tr>
              <?php } ?>
              <?php if($invoiceData['entry_fee'] && $invoiceData['entry_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Entry Fees</td>           
                <td class="calculate"><?=  ($invoiceData['entry_fee'] != 0)? set_currency():'' ?><?= $invoiceData['entry_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['handler_fee'] && $invoiceData['handler_fee']!=0){ ?>             
              <tr>
                <td>*</td>   
                <td>Handling Fees</td>           
                <td class="calculate"><?=  ($invoiceData['handler_fee'] != 0)? set_currency():'' ?><?= $invoiceData['handler_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['grooming_fee'] && $invoiceData['grooming_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Grooming Fees</td>           
                <td class="calculate"><?=  ($invoiceData['grooming_fee'] != 0)? set_currency():'' ?><?= $invoiceData['grooming_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['boarding_fee'] && $invoiceData['boarding_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Boarding Fees</td>           
                <td class="calculate"><?=  ($invoiceData['boarding_fee'] != 0)? set_currency():'' ?><?= $invoiceData['boarding_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['camping_fee'] && $invoiceData['camping_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Loding or RV Camping Fees</td>           
                <td class="calculate"><?=  ($invoiceData['camping_fee'] != 0)? set_currency():'' ?><?= $invoiceData['camping_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['meals'] && $invoiceData['meals']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Meals</td>           
                <td class="calculate"><?=  ($invoiceData['meals'] != 0)? set_currency():'' ?><?= $invoiceData['meals'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['bonus_points_earned'] && $invoiceData['bonus_points_earned']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Bonus for points earned</td>           
                <td class="calculate"><?=  ($invoiceData['bonus_points_earned'] != 0)? set_currency():'' ?><?= $invoiceData['bonus_points_earned'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['bonus_group_placement'] && $invoiceData['bonus_group_placement']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Bonus for group placement</td>           
                <td class="calculate"><?=  ($invoiceData['bonus_group_placement'] != 0)? set_currency():'' ?><?= $invoiceData['bonus_group_placement'] ?></td>                
              </tr>
              <?php } ?>
              <?php if($invoiceData['bonus_best_show'] && $invoiceData['bonus_best_show']!=0){ ?> 
              <tr>
                <td>*</td>   
                <td>Bonus for best in show</td>           
                <td class="calculate"><?=  ($invoiceData['bonus_best_show'] != 0)? set_currency():'' ?><?= $invoiceData['bonus_best_show'] ?></td>                
              </tr>
              <?php } ?>
              <?php if($invoiceData['sweepstakes_fee'] && $invoiceData['sweepstakes_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Sweepstakes Fees</td>           
                <td class="calculate"><?=  ($invoiceData['sweepstakes_fee'] != 0)? set_currency():'' ?><?= $invoiceData['sweepstakes_fee'] ?></td>                
              </tr>
              <?php } ?>
              <tr>
                  <td></td>
                <td><b>Total cost</b></td>
                <td><span><?= set_currency() ?></span><b><span id="total"></span></b></td>
              </tr>
            </tbody>
          </table>
        </div>
        
      </div>
     
      <div class="row no-print">
        <div class="col-xs-12">
             <a href="<?php echo base_url();?>handler-expense" title="Back" class="btn btn-info"><span class="fa fa-list"> Back</span></a>
            <button id="printButton" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i>Print</button>
            <a href="<?php echo base_url();?>create-pdf/<?= $invoiceData['id'] ?>"  class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
            </a>
        </div>
      </div>
    </section>    
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>


<script>
  $( document ).ready(function() {
    var total = 0;
    $('.calculate').each(function() {
      var value = parseInt($(this).text());
      total += value;
    });
    $('#total').text(total);
  });
 
$('#printButton').click(function() {
  window.print()
});

</script>
<style>
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
       color:black;
}

</style>
