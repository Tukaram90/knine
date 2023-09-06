<?php 
$this->load->view('useradmin/comman/userheader'); ?>
<link rel="stylesheet" href="/k9/pdf-bootstrap-3.3.7/dist/css/bootstrap.min.css">
<style>
            /* table, th, td {
            border: 1px solid black;
            }
            table.center {
            margin-left: auto; 
            margin-right: auto;
            } */
            .pull-right {
                /* float:right;  */
                text-align: right !important;
            }
            .row {
                margin-right: -15px;
                margin-left: -15px;
            }

            .text-center {
                text-align: center;
            }
                
            /* body {
                font-family: Helvetica, Arial, sans-serif;
                font-size: 12px;
                line-height: 1.42857143;
                color: #333;
                background-color: #fff;
            }                     */
        </style>
<script src="/k9/pdf-bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
       Handler Invoice      
      </h1>    
    </section>  
    <section class="invoice" id="printSection">
     
        <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                  <!-- <img src="<?php echo base_url(); ?>webasset/img/logo.jpg" width="50" height="50" class="img-responsive pull-left" id="weblogo" alt="k9 widget" > &emsp;
                  <small class="pull-right" style="text-align:right">Date: <?= date('Y-m-d') ?></small>
                  -->
                   
                  <div style="width: 100%;">
                    <div align="left" style="width: 40%;float: left;">
                      <img src="<?php echo base_url(); ?>webasset/img/logo.jpg" width="75" height="75" class="img-responsive pull-left" id="weblogo" alt="k9 widget" > 
                    </div>
                    <div align="left" style="width: 20%;text-align: center;">
                      <h4>
                        Handler Invoice      
                      </h4> 
                    </div>
                    <div align="left" style="width: 30%;float: right;">
                    <small class="pull-right" style="text-align:right">Date: <?= date('Y-m-d') ?></small>
                    </div>
                  </div>
              </h2>
            </div>           
        </div>

        <div class="row">
          <div style="position:relative">
              <div style="float:left; width: 33%;">
                <h4><b>From</b></h4>
                <address>
                    <strong><?= ucfirst($invoiceData['fullname']) ?></strong><br>
                    <?= $invoiceData['address'] ?><br>
                    Phone:  <?= $invoiceData['mobile'] ?><br>
                    Email:  <?= $invoiceData['email'] ?>
                </address>
              </div>
              <div style="float:left; width:  33%;">
                <h4><b>To</b></h4>
                <address>
                    <strong><?= $invoiceData['client_name'] ?></strong><br>
                    Email:  <?= $invoiceData['client_email'] ?>
                </address>
              </div>
              <div style="float:left; width:  33%;">
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
        </div> <br>
      
        <!-- <div class="row invoice-info"  style="position:relative">
            <div class="col-sm-4 invoice-col" style="float:left; width: 33%;">
            <h4><b>From</b></h4>
            <address>
                <strong><?= ucfirst($invoiceData['firstname']).' '.$invoiceData['lastname'] ?></strong><br>
                <?= $invoiceData['address'] ?><br>
                Phone:  <?= $invoiceData['mobile'] ?><br>
                Email:  <?= $invoiceData['email'] ?>
            </address>
            </div>
            
            <div class="col-sm-4 invoice-col" style="float:left; width: 33%;">
            <h4><b>To</b></h4>
            <address>
                <strong><?= $invoiceData['client_name'] ?></strong><br>
            
            </address>
            </div>
            
            <div class="col-sm-4 invoice-col" style="float:left; width: 33%;">
              <b>Dogs:</b><br>  
                <?php 
                
                foreach($dognamearr as $key => $name){
                    echo $name['dog_name'].', ';
                }
                
                ?>
            <br>
            <p><?= $invoiceData['show_details'] ?></p>
            </div>        
        </div> -->
     
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
               <tr>
                <td>&emsp; </td>
                <td>&emsp;</td>
                <td>&emsp;</td>
              </tr>    
              <?php if($invoiceData['deposit'] && $invoiceData['deposit']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Deposit</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?=  $invoiceData['deposit'] ?></td>                
              </tr>
              <?php } ?>
              <?php if($invoiceData['entry_fee'] && $invoiceData['entry_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Entry Fees</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['entry_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['handler_fee'] && $invoiceData['handler_fee']!=0){ ?>             
              <tr>
                <td>*</td>   
                <td>Handling Fees</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['handler_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['grooming_fee'] && $invoiceData['grooming_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Grooming Fees</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['grooming_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['boarding_fee'] && $invoiceData['boarding_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Boarding Fees</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['boarding_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['camping_fee'] && $invoiceData['camping_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Loding or RV Camping Fees</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['camping_fee'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['meals'] && $invoiceData['meals']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Meals</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['meals'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['bonus_points_earned'] && $invoiceData['bonus_points_earned']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Bonus for points earned</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['bonus_points_earned'] ?></td>                
              </tr>
              <?php } ?> 
              <?php if($invoiceData['bonus_group_placement'] && $invoiceData['bonus_group_placement']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Bonus for group placement</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['bonus_group_placement'] ?></td>                
              </tr>
              <?php } ?>
              <?php if($invoiceData['bonus_best_show'] && $invoiceData['bonus_best_show']!=0){ ?> 
              <tr>
                <td>*</td>   
                <td>Bonus for best in show</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?> <?= $invoiceData['bonus_best_show'] ?></td>                
              </tr>
              <?php } ?>
              <?php if($invoiceData['sweepstakes_fee'] && $invoiceData['sweepstakes_fee']!=0){ ?>
              <tr>
                <td>*</td>   
                <td>Sweepstakes Fees</td>           
                <td class="calculate"><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?><?= $invoiceData['sweepstakes_fee'] ?></td>                
              </tr>
              <?php } ?>
               <tr>
                  <td>&emsp;</td>
                  <td>&emsp;</td>
                  <td>&emsp;</td>
                </tr>
              <tr>
                <td>&emsp;</td>
                <td style="font-weight: bold;"><b >Total cost</b></td>
                <td style="font-weight: bold;"><span ><?=  ($invoiceData['currency'] != NULL || $invoiceData['currency'] != '')? $invoiceData['currency']:'' ?></span><b><span id="total"><?= $invoiceData['total_handling'] ?></span></b></td>
              </tr>              
            </tbody>
          </table>         
        </div>
        
      </div>    
      <p style="font-size: 7px;">pdf generated by <b style="color:#367fa9"> K9Widget</b></p>
    </section>    
   
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>