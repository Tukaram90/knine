<?php $this->load->view('useradmin/comman/userheader'); ?>
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
            <span class="info-box-icon bg-yellow"><i class="fa fa-rupee "></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Expense</span>
              <span class="info-box-number"> <?php echo $totalExpense; ?></span>
            </div>           
          </div>
          </a>         
        </div>  
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Today's  Expense</span>
              <span class="info-box-number"><?= 10 ?><small></small></span>
            </div>           
          </div>         
        </div>  
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Expense Report</h3>
            </div>
           
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <form method="post" action="<?php echo base_url() ?>reports">
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="monthYear" id="datepicker" autocomplete="off" value="<?php echo $srchMonthYear ?? ''; ?>" required/>
                    </div>
                    <div class="col-md-3">
                      <button type="submit" name="filter-report-month" class="btn btn-info">Get monthly report</button>
                    </div>
                    </form>
                  </div>
                  <div class="row">
                    <div class="chart">
                      <div id="monthwise"></div>                     
                    </div>
                 </div>
                </div>
               
                <div class="col-md-6">
                  <div class="row">
                    <form method="post" action="<?php echo base_url() ?>reports">
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="year" id="datepickerforyear" value="<?php echo $srchYear ?? ''; ?>" autocomplete="off" required/>
                    </div>
                    <div class="col-md-3">
                      <button type="submit" name="filter-report-year" class="btn btn-primary">Get yearly report</button>
                    </div>
                    </form>
                  </div>
                  <div class="row">
                    <div class="chart">
                      <div id="yearPieChart"></div>                     
                    </div> 
                  </div>                
                </div>
               
              </div>
              
            </div>
            
          </div>         
        </div>
      </div>
    </section>   
</div>  
<?php $this->load->view('useradmin/comman/userfooter'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('useradmin/comman/userjs'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
  // calendor for only month and year
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
  </script>
 
  <script language="JavaScript"> 
  google.charts.setOnLoadCallback(monthWiseChart);  
  google.charts.setOnLoadCallback(yearWiseChart);
  
  function monthWiseChart() { 
   
    var data = google.visualization.arrayToDataTable([
        ['Calculation', 'Expense'],
        <?php 
          if($counterData){
          foreach ($counterData as $row){
            echo "['".$row['title']."',".$row['total_amount']."],";
          }
         }
          ?>
    ]);
    var options = {
        title: 'Month expense report ',
        is3D: true,
    };   
    var chart = new google.visualization.PieChart(document.getElementById('monthwise'));
    chart.draw(data, options);
  }

 function yearWiseChart(){
    var data = google.visualization.arrayToDataTable([
        ['Calculation', 'Expense'],
        <?php 
          if($expenseYearData){
          foreach ($expenseYearData as $row){
            echo "['".$row['title']."',".$row['total_amount']."],";
          }
         }
          ?>
    ]);
    var options = {
        title: 'Year expense report ',
        is3D: true,
    };
    var chart = new google.visualization.PieChart(document.getElementById('yearPieChart'));
    chart.draw(data, options);  
 }
 

</script>