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
 </script>