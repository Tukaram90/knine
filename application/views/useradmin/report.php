<?php $this->load->view('useradmin/comman/userheader'); ?>
<?php
if(empty($this->session->userdata('is_user_logged_in'))) {
  redirect(base_url().'user');
}

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<style>
  .highcharts-credits{
    display:none;
  }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Reports
        <small>Reports</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reports</li>
      </ol>
    </section>   
    <section class="content">     
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <a href="<?php echo base_url();?>expense-list">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><?= set_currency() ?></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Expense</span>
              <span class="info-box-number"> <?php echo $totalExpense; ?></span>
            </div>           
          </div>
          </a>         
        </div>  
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><?= set_currency() ?></span>
            <a href="#" id="showReportDetail">
                <div class="info-box-content">
                  <span class="info-box-text">Weekly Expense</span>
                  <span class="info-box-number"><?= $weekCount ?><small></small></span>
                </div>
            </a>
          </div>         
        </div>  
      </div>
      
      
      
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Expense Report</h3>
            </div> -->
           
            <div class="box-body">
              <div class="row">
                <form method="post" action="<?php echo base_url() ?>reports">                  
                  <div class="col-md-2">
                    <input type="text" class="form-control clrInput" name="monthYear" id="datepicker" placeholder="Select month" autocomplete="off" value="<?php echo $srchMonthYear ?? ''; ?>" />
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control clrInput" name="year" id="datepickerforyear" value="<?php echo $srchYear ?? ''; ?>" placeholder="Select Year" autocomplete="off" />
                  </div>
                  <div class="col-md-2">                    
                    <select name="expense_cat" id="expense_cat" class="form-control select2 clrInput"  style="width: 100%;">
                        <option value="">Select category</option>
                        <?php foreach($expenceCategory as $cat ){  ?>
                        <option value="<?= $cat['id'] ?>" <?php if(!empty($srchexpense_cat) && isset($srchexpense_cat)){ if($cat['id']==$srchexpense_cat){echo"selected";} } ?>><?= ucfirst($cat['title']) ?></option>
                        <?php }?>
                    </select> 
                  </div>
                  
                  <div class="col-md-3">
                    <input type= "button" value= "clear" class="btn btn-danger" onclick= "clearInput()">
                    <button type="submit" name="report" class="btn btn-info">Search</button>
                  </div>
                </form>
                <div class="col-md-3">
                  <label for="Total">Total Expense</label>
                  <input type="text" id="totalExpense" value="<?= $totalAmount; ?>" disabled>
                </div>
              </div>
              <div class="row">
                <div id = "container11" style="margin: 15px;min-width:310px; height:400px">
                </div>       
              </div>              
            </div>

          </div>         
        </div>
      </div>
      
      
       <div class="row" id="#AkcLink" name="AkcLink">
        <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Most useful links</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            
            <div class="box-body no-padding" style="" >
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <h5 class="box-title">AKC Links</h5>
                    <ul style="list-style-type:circle;padding-left:inherit;">
                      <li><a href="https://webapps.akc.org/event-search/#/search" target="_blank">AKC Event Search</a></li>
                      <li><a href="https://www.akc.org/rules/" target="_blank">AKC Rules and Regulation</a></li>
                      <li><a href="https://www.akc.org/register/" target="_blank">AKC Registration</a></li>
                      <li><a href="https://www.akc.org/sports/titles-and-abbreviations/" target="_blank">AKC Titles and Abbreviations</a></li>
                      <li><a href="https://shop.akc.org/" target="_blank">AKC Shop</a></li>
                      <li><a href="https://www.apps.akc.org/apps/judges_directory/" target="_blank">AKC Judges Directory</a></li>
                      <li><a href="https://www.akc.org/sports/conformation/akc-registered-handlers/" target="_blank">AKC Registered Handlers Program</a></li>
                      <li><a href="https://www.akc.org/sports/juniors/" target="_blank">AKC Juniors Resources</a></li>
                      <li><a href="https://www.akc.org/breeder-programs/dna/dna-resource-center/" target="_blank">AKC DNA Resource Center</a></li>
                      <li><a href="https://www.akc.org/sports/conformation/dog-show-ring-stewards/" target="_blank">AKC Ring Stewarding Information and certification</a></li>
                    </ul>
                  </div>
                  <div class="col-md-3">
                    <h5 class="box-title">AKC Licensed Superintendents</h5>
                    <ul style="list-style-type:circle;padding-left:inherit;">
                      <li><a href="http://www.barayevents.com/" target="_blank">BaRay Event Services</a></li>
                      <li><a href="http://www.foytrentdogshows.com/" target="_blank">Foy Trent Dog Shows</a></li>
                      <li><a href="http://www.jbradshaw.com/" target="_blank">Jack Bradshaw Dog Shows</a></li>
                      <li><a href="http://www.onofrio.com/" target="_blank">Jack Onofrio Dog Shows, LLC</a></li>
                      <li><a href="http://www.infodog.com/" target="_blank">MB-F Inc. / Infodog</a></li>
                      <li><a href="http://www.raudogshows.com/" target="_blank">Rau Dog Shows, Ltd</a></li>                      
                    </ul>
                  </div>
                  <div class="col-md-3">
                    <h5 class="box-title">Other Helpful links</h5>
                    <ul style="list-style-type:circle;padding-left:inherit;">
                      <li><a href="https://phadoghandlers.com/" target="_blank">Professional Handlers Association ( America )</a></li>
                      <li><a href="https://www.canadianprohandlers.ca/" target="_blank">Canadian Professional Handlers Association</a></li>
                      <li><a href="https://ofa.org/chic-programs/" target="_blank">OFA/CHIC Main Page ( Canine Health Information Center - DNA and Health testing )</a></li>
                      <li><a href="https://www.akc.org/dog-breeds/" target="_blank">AKC Breed Standards</a></li>
                      <li><a href="https://fci.be/en/nomenclature/" target="_blank">FCI Breed Standards</a></li>
                      <li><a href="https://fci.be/en/search.aspx?q=Judges+Directory" target="_blank">FCI Judges Directory</a></li>
                      <li><a href="https://www.ckc.ca/en/Join-CKC/Canadian-Kennel-Gazette" target="_blank">Canadian Kennel Club</a></li>                                            
                    </ul>
                  </div>
                  <div class="col-md-3">
                    <h5 class="box-title">AKC Dog Show Trade Magazines</h5>
                    <ul style="list-style-type:circle;padding-left:inherit;">
                      <li><a href="https://www.akc.org/products-services/magazines/akc-gazette" target="_blank">AKC Gazette</a></li>
                      <li><a href="https://bismagazineusa.com/" target="_blank">Best In Show Magazine</a></li>
                      <li><a href="https://caninechronicle.com/" target="_blank">Canine Chronicle</a></li>
                      <li><a href="https://www.dognews.com/" target="_blank">Dog News</a></li>
                      <li><a href="https://showsightmagazine.com/" target="_blank">Show Site Magazine</a></li>
                      <li><a href="https://www.canadiandogfancier.com/" target="_blank">Canadian Dog Fancier</a></li>                                                               
                    </ul>
                  </div>
                </div>
              </div>             
            </div>           
          </div>
        </div>
      </div>
      

      <div class="modal fade" id="ListModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="PopName"></h4>
            </div>
            <div class="modal-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Expense Date</th>
                    <th>Note</th>                    
                  </tr>
                </thead>
                  <tbody id="tblData"></tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
        <!-- subscription modal -->
           <!-- Modal -->
      <div class="modal fade" id="subscriptionModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              
            <div id="pricing-tables">
                <div class="container" >
                    
                        <?php if($subscriptionPlan){ ?> 
                          <?php 
                            $columnCount = 0;
                            foreach($subscriptionPlan as $row){
                                if ($columnCount % 3 == 0) {
                                  echo '<div class="row">';
                                }
                              ?>
                                <div class="col-md-3 col-sm-3 col-xs-12 pricing-table">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="text-nowrap text-uppercase text-center panel-title"><?= $row['name'] ?></h3></div>
                                        <div class="panel-body">
                                            <p class="lead text-nowrap text-uppercase text-center pricing-price" style="margin-bottom:0;"><sup>$</sup><?= $row['price'] ?><span class="text-lowercase pricing-duration">/<?= $row['plan_validity'] ?> month </span> </p>
                                        </div>
                                        <ul class="list-group">
                                            <?php  $row['features']; 
                                              $features_arr = explode("</li>" , $row['features']);
                                              foreach($features_arr as $key => $value){
                                            ?>
                                              <li class="list-group-item"><span><?= strip_tags($value) ?></span></li>
                                            <?php } ?>                                             
                                        </ul>
                                        <div class="panel-footer"><a class="btn btn-primary button" role="button" href="#">Join Now</a></div>
                                    </div>
                                </div>
                                <?php $columnCount++;
                                   if ($columnCount % 3 == 0) {
                                    echo '</div>';
                                   }
                                ?>
                          <?php } // end foreach ?>
                          <?php
                            // Close any open row
                            if ($columnCount % 3 != 0) {
                              echo '</div>';
                            }
                          ?>
                        <?php } ?>
                        <!-- <div class="row">
                          <div class="col-md-3 col-sm-3 col-xs-12 pricing-table">
                              <div class="panel panel-primary">
                                  <div class="panel-heading">
                                      <h3 class="text-nowrap text-uppercase text-center panel-title">Standard </h3></div>
                                  <div class="panel-body">
                                      <p class="lead text-nowrap text-uppercase text-center pricing-price" style="margin-bottom:0;"><sup>$</sup>245<span class="text-lowercase pricing-duration">/mo </span> </p>
                                  </div>
                                  <ul class="list-group">
                                      <li class="list-group-item"><span>List Group Item 1</span></li>
                                      <li class="list-group-item"><span>List Group Item 2</span></li>
                                      <li class="list-group-item"><span>List Group Item 3</span></li>
                                  </ul>
                                  <div class="panel-footer"><a class="btn btn-primary button" role="button" href="#" style="width:100%;font-family:&#39;proxima nova&#39;, sans-serif;">Button</a></div>
                              </div>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12 pricing-table" style="/*padding:0px 50px;*/">
                              <div class="panel panel-primary">
                                  <div class="panel-heading">
                                      <h3 class="text-nowrap text-uppercase text-center panel-title">Premium </h3></div>
                                  <div class="panel-body">
                                      <p class="lead text-nowrap text-uppercase text-center pricing-price" style="margin-bottom:0;"><sup>$</sup>415<span class="text-lowercase pricing-duration">/mo </span> </p>
                                  </div>
                                  <ul class="list-group">
                                      <li class="list-group-item"><span>List Group Item 1</span></li>
                                      <li class="list-group-item"><span>List Group Item 2</span></li>
                                      <li class="list-group-item"><span>List Group Item 3</span></li>
                                  </ul>
                                  <div class="panel-footer"><a class="btn btn-primary button" role="button" href="#" style="width:100%;font-family:&#39;proxima nova&#39;, sans-serif;">Button</a></div>
                              </div>
                          </div>
                        </div> -->
                </div>
            </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end subscription modal -->
      
    </section>   
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src = "https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
 <script>
    function clearInput(){
      var getValue = document.getElementById("expense_cat");
      if (getValue.value !="") {
          getValue.value = "";
      }
      var selectedYr = document.getElementById("datepickerforyear");
      if (selectedYr.value !="") {
          selectedYr.value = "";
      }
      var selectedMonth = document.getElementById("datepicker");
      if (selectedMonth.value !="") {
          selectedMonth.value = "";
      }
    }
    var ExpensesInfo = '<?php echo $expenceData; ?>';
    var result = JSON.parse(ExpensesInfo)
    
    $(document).ready(function() {
      
      if(result.length == 0){
        toastr.error('Data not found!');
      }else{      
        Highcharts.chart('container11', {
          chart: {
            type: 'column'
          },
          title: {
            align: 'left',
            text: 'EXPENSE REPORT'
          },     
          accessibility: {
            announceNewData: {
              enabled: true
            }
          },
          xAxis: {
            categories: result.expenseTitle
          },
          yAxis: {
            title: {
              text: 'TOTAL EXPENSE'
            }   
          },
          legend: {
            enabled: false
          },
          plotOptions: {
            series: {        
              dataLabels: {
                enabled: true,           
              },
              cursor: 'pointer',
              events: {
                click: function (event) {
                  var categoryName = event.point.category;
                  var monthYear = $('#datepicker').val();
                  var year = $('#datepickerforyear').val();
                  if(categoryName){
                    $.ajax({
                      type: 'POST',
                      url: '<?php echo base_url();?>customer/webuser/get_records_by_category',
                      data: {selectedCat: categoryName, monthYear: monthYear, year: year},
                      success: function(data) {
                        $("#PopName").text(categoryName)                        
                        $("#tblData").html(data);                       
                        $('#ListModal').modal('show');                        
                      }
                    });
                    
                  }
                }
              }
            },
            
          },

          tooltip: {
            // headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
          },

          series: [
            {
              name: "Expense",
              colorByPoint: true,
              data: result.expenseAmount           
            }           
          ],
          
        });
      }

      // $('#example11').DataTable()
      // $('#example2').DataTable({
      //   'paging'      : true,
      //   'lengthChange': false,
      //   'searching'   : false,
      //   'ordering'    : true,
      //   'info'        : true,
      //   'autoWidth'   : false
      // })
                
    });

    $("#showReportDetail").click(function() {     
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url();?>customer/webuser/get_week_detail_report',         
        success: function(data) {
          $("#PopName").text('Weekly Report')                        
          $("#tblData").html(data);                       
          $('#ListModal').modal('show');                        
        }
      });
    });
    

    var dp=$("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
    });

    $("#datepickerforyear").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
        autoclose:true
    });
    
    $(document).ready(function () {
        $('#subscriptionModal').modal('hide');
       
        $("#subscriptionForm").submit(function (e) {
            e.preventDefault();
            
            $("#subscriptionModal").hide();
        });
    });
 </script>
 <style>
.pricing-table .pricing-price {
  font-size:40px;
}


.pricing-table .panel-primary > .panel-heading {
  background-color:#222;
  background-image:none;
  color:white;
  font-weight:bold;
}

a.btn.btn-primary.button:hover {
  background-color:#fff;
  color:black;
  transition:0.7s ease-out;
  border:1px solid #000;
}

a.btn.btn-primary.button {
  width:100%;
  border:1px solid #000;
}

.pricing-table {
  -webkit-transition:all .3s ease;
  -moz-transition:all .3s ease;
  -ms-transition:all .3s ease;
  -o-transition:all .3s ease;
  transition:all .3s ease;
  -webkit-transform:translate(0px,0px);
  -moz-transform:translate(0px,0px);
  -ms-transform:translate(0px,0px);
  -o-transform:translate(0px,0px);
  transform:translate(0px,0px);
}

.pricing-table:hover {
  -webkit-transform:translate(0px,-10px);
  -moz-transform:translate(0px,-10px);
  -ms-transform:translate(0px,-10px);
  -o-transform:translate(0px,-10px);
  transform:translate(0px,-10px);
}

li.list-group-item {
  text-align:center;
  text-transform:capitalize;
}

span.text-lowercase.pricing-duration {
  font-size:20px;
}

#pricing2 p.lead.text-nowrap.text-uppercase.text-center.pricing-price {
  font-size:35px;
}

a.btn.btn-primary {
  background-image:none;
  background-color:#222;
  box-shadow:none;
  text-transform:uppercase;
  letter-spacing:2px;
  font-size:12px;
  border-radius:0px;
  border:0px;
  padding:10px 0px;
}

#pricing2 .panel-primary > .panel-heading {
  background-color:#222;
  background-image:none;
  font-family:'proxima nova', sans-serif;
}

li.list-group-item {
  font-family:'proxima nova', sans-serif;
}

div.panel.panel-primary {
  border-color:#000;
}

a:hover, a:focus {
  text-decoration:none;
}
</style>