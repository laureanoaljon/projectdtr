<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Analytics</title>
    <meta name="description" content="Main Page">
    <?php 
            echo link_tag('css/bootstrap-reboot.min.css');
            echo link_tag('css/bootstrap.min.css');
            echo link_tag('css/bootstrap-grid.min.css');
            echo link_tag('css/bootstrap-icons.css');
            echo link_tag('css/sidebarjs.min.css');
            echo link_tag('css/styles.css');     
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E2XBB2166Q"></script>

    <!-- Import Chart.js library
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

    
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" integrity="sha512-PIAUVU8u1vAd0Sz1sS1bFE5F1YjGqm/scQJ+VIUJL9kNa8jtAWFUDMu5vynXPDprRRBqHrE8KKEsjA7z22J1FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" integrity="sha512-xnwMSDv7Nv5JmXb48gKD5ExVOnXAbNpBWVAXTo9BJWRJRygG8nwQI81o5bYe8myc9kiEF/qhMGPjkSsF06hyHA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript" src="<?php echo base_url(); ?>js/html2canvas.min.js"></script>

    <style>
      th {
        text-align: center;
        vertical-align: center;
        font-weight: bold;
      }
    </style>
</head>

<body>
    <!-- Navigation --->
    <div class="container-fluid">
        <div class="row">
            <div id="sidebarView" sidebarjs>
              <div class="content">
                <div id="sidebarToggle" class="text-white" sidebarjs-toggle><i class="bi bi-chevron-left"></i></div>
                <nav class="navbar flex-column mt-2 text-left">
                  <h4 class="text-white text-left">Menu</h4>
                  <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>main/index" role="button">Personal DTR</a>
                  <a class="w-100 active mr-2 text-white text-left" href="<?php echo base_url(); ?>main/analytics" role="button">Personal DTR Analytics</a>
                  <?php if ($category != "employee"){?>
                    <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>EmployeeDTR/index" role="button">Employee DTR</a>
                    <a class="w-100 mr-2 text-white text-left" href="#" role="button">Employee DTR Analytics</a>
                    <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>ActiveUserAccount/index" role="button">Active User Accounts</a>
                    <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>ArchiveUserAccount/index" role="button">Archived User Accounts</a>
                  <?php } ?>
                  <a class="w-100 mr-2 text-white text-left" href="#" role="button" id="changePasswordBtn">Change Password</a>
                  <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>main/logout" role="button">Logout</a>
                </nav>
              </div>
            </div>
            <nav id="sidebarMenu" class="col d-md-block sidebar collapsed">
              <div class="sidebar-sticky pt-1">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <div id="sidebarToggle" class="text-white" sidebarjs-toggle><i class="bi bi-list"></i></div>
                    </li>
                </ul>
              </div>
            </nav>

            <main role="main" class="col">
                <nav class="navbar navbar-expand-lg navbar-light text-white" style="background-color: #4C4E52 !important; height: 50px;">
                    <div class="col-md-6 mt-1">
                      <h5 style="font-size: 25px;">Daily Time Record</h5>
                    </div>
                      
                    <?php if (isset($employee_id)) { ?>
                      <div class="col-md-6 mt-1 text-right">
                        <h5 style="font-size: 20px;">Hello, <b><?php echo $first_name; ?></b> <i class="fa fa-user-circle-o" aria-hidden="true"></i></h5>
                      </div>
                    <?php } ?>
                </nav>

                <div class="col-md-12">
                  <div class="col-md-10 ml-3 mt-2">
                    <h1 style="color: gray; font-size: 32px;">Personal DTR Analytics</h1>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-12">
                    <!-- Variety Group -->
                    <div class="row mt-3 ml-0">
                        <div class="col-6">
                            <!-- Month -->
                            <select id="month" name="month" class="border rounded pass-label" style="text-align-last: center; height: 40px; width: 150px;" data-live-search="true">
                                <option value="01" <?php if ($month == '01'){  echo "selected"; } ?>>January</option>
                                <option value="02" <?php if ($month == '02'){  echo "selected"; } ?>>February</option>
                                <option value="03" <?php if ($month == '03'){  echo "selected"; } ?>>March</option>
                                <option value="04" <?php if ($month == '04'){  echo "selected"; } ?>>April</option>
                                <option value="05" <?php if ($month == '05'){  echo "selected"; } ?>>May</option>
                                <option value="06" <?php if ($month == '06'){  echo "selected"; } ?>>June</option>
                                <option value="07" <?php if ($month == '07'){  echo "selected"; } ?>>July</option>
                                <option value="08" <?php if ($month == '08'){  echo "selected"; } ?>>August</option>
                                <option value="09" <?php if ($month == '09'){  echo "selected"; } ?>>September</option>
                                <option value="10" <?php if ($month == '10'){  echo "selected"; } ?>>October</option>
                                <option value="11" <?php if ($month == '11'){  echo "selected"; } ?>>November</option>
                                <option value="12" <?php if ($month == '12'){  echo "selected"; } ?>>December</option>
                            </select>

                            <!-- Year -->
                            <select id="year" name="year" class="border rounded pass-label" data-live-search="true" style="text-align-last: center; height: 40px; width: 100px;">
                                <option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
                                <option value="<?php echo date("Y") - 1; ?>"><?php echo date("Y") - 1; ?></option>
                                <option value="<?php echo date("Y") - 2; ?>"><?php echo date("Y") - 2; ?></option>
                                <option value="<?php echo date("Y") - 3; ?>"><?php echo date("Y") - 3; ?></option>
                                <option value="<?php echo date("Y") - 4; ?>"><?php echo date("Y") - 4; ?></option>
                                <option value="<?php echo date("Y") - 5; ?>"><?php echo date("Y") - 5; ?></option>
                            </select>
                        </div>

                        <div class="col-6 text-right">
                          <!-- <button class="btn btn-secondary" type="button" id="printAnalytics" data-type="" data-title="" data-toggle="modal" data-target="#targetModal">Print Analytics</button> -->
                          <a class="btn btn-secondary text-white" role="button" id="printAnalytics" data-html2canvas-ignore="true">Print Analytics</a>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mt-3 px-4" id="testHtml">
                    <div class="col-md-12 mt-3 ml-2">
                        <div class="card px-4">
                            <div class="card-body mt-3 mb-3">
                                <h5>Monthly Summary</h5>
                                <p>in number of days</p>

                                <div class="row px-2">
                                    <div class="col-sm">
                                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Workdays</h5>
                                                <p class="card-text" style="font-size: 40px;" id="workDays"><?php echo $workdays_count; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Present</h5>
                                                <p class="card-text" style="font-size: 40px;" id="presentDays"><?php echo $present_days_count; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Absent</h5>
                                                <p class="card-text" style="font-size: 40px;" id="absentDays"><?php echo $absent_days_count; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Tardy</h5>
                                                <p class="card-text" style="font-size: 40px;" id="tardyDays"><?php echo $tardy_days_count; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Undertime</h5>
                                                <p class="card-text" style="font-size: 40px;" id="undertimeDays"><?php echo $undertime_days_count; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Overtime</h5>
                                                <p class="card-text" style="font-size: 40px;" id="overtimeDays"><?php echo $overtime_days_count; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm">
                                        <div class="card bg-light mb-3" style="max-width: 18rem;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Half-day</h5>
                                                <p class="card-text" style="font-size: 40px;" id="halfDays"><?php echo $half_days_count; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 ml-2">
                        <div class="card px-4">
                            <div class="card-body mt-3 mb-3">
                                <h5>Yearly Summary</h5>

                                <div class="row px-2 mt-3">
                                    <div class="col-lg">
                                        <div class="card bg-light mb-3" style="max-width: auto;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Present</h5>
                                                <canvas id="presentChart"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg">
                                        <div class="card bg-light mb-3" style="max-width: auto;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Absent</h5>
                                                <canvas id="absentChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row px-2 mt-3">
                                    <div class="col-lg">
                                        <div class="card bg-light mb-3" style="max-width: auto;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Tardy</h5>
                                                <canvas id="tardyChart"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg">
                                        <div class="card bg-light mb-3" style="max-width: auto;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Undertime</h5>
                                                <canvas id="undertimeChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row px-2 mt-3">
                                    <div class="col-lg">
                                        <div class="card bg-light mb-3" style="max-width: auto;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Overtime</h5>
                                                <canvas id="overtimeChart"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg">
                                        <div class="card bg-light mb-3" style="max-width: auto;">
                                            <!-- <div class="card-header">Header</div> -->
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Half-day</h5>
                                                <canvas id="halfdayChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
            </main>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="timeInModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="background-color: transparent">
            <h4 class="modal-title"><b>Change Password</b></h4>
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="" class="" method="">
              <div class="form-row px-3">
                <div class="col-md-5 mb-3">
                  <label for="title_of_study"><b>Curent Password</b></label>
                </div>
                <div class="col-md-7 mb-3">
                  <input type="text" class="form-control" id="current_password" name="current_password" placeholder="" required="">
                  <span id="error-current-password-modal"></span>
                </div>

                <div class="col-md-5 mb-3">
                  <label for="study_description"><b>New Password</b></label>
                </div>
                <div class="col-md-7 mb-3">
                  <input type="text" class="form-control" id="new_password" name="new_password" placeholder="" required="">
                  <span id="error-new-password-modal"></span>
                </div>

                <div class="col-md-5 mb-3">
                  <label for="study_description"><b>Confirm Password</b></label>
                </div>
                <div class="col-md-7 mb-3">
                  <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="" required="">
                  <span id="error-confirm-password-modal"></span>
                </div>
              </div>
            </form>
            <div class='col-md-12 text-center mt-3'>
              <p id="messageChangePassword"></p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="confirmChangePasswordBtn">Save</button>
          </div>
        </div>
      </div>
    </div>

                      
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/sidebarjs.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/chart.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>

    <script>
      //////////////////// For Present Bar Chart //////////////////////////////
      // Get the canvas element
      const ctxPresent = document.getElementById('presentChart').getContext('2d');

      // Define the data
      const dataPresent = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Monthly Data',
          data: [23, 23, 20, 22, 23, 20, 20, 23, 23, 20, 23, 19],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };

      // Configure the options
      const optionsPresent = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      };

      // Create the chart
      const presentChart = new Chart(ctxPresent, {
        type: 'bar',
        data: dataPresent,
        options: optionsPresent
      });

      //////////////////// For Absent Bar Chart //////////////////////////////
      // Get the canvas element
      const ctxAbsent = document.getElementById('absentChart').getContext('2d');

      // Define the data
      const dataAbsent = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Monthly Data',
          data: [0, 2, 2, 3, 0, 1, 0, 2, 2, 5, 1, 4],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };

      // Configure the options
      const optionsAbsent = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      };

      // Create the chart
      const absentChart = new Chart(ctxAbsent, {
        type: 'bar',
        data: dataAbsent,
        options: optionsAbsent
      });

      //////////////////// For Tardy Bar Chart //////////////////////////////
      // Get the canvas element
      const ctxTardy = document.getElementById('tardyChart').getContext('2d');

      // Define the data
      const dataTardy = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Monthly Data',
          data: [1, 2, 1, 3, 1, 1, 0, 2, 2, 3, 1, 2],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };

      // Configure the options
      const optionsTardy = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      };

      // Create the chart
      const tardyChart = new Chart(ctxTardy, {
        type: 'bar',
        data: dataTardy,
        options: optionsTardy
      });

      //////////////////// For Undertime Bar Chart //////////////////////////////
      // Get the canvas element
      const ctxUndertime = document.getElementById('undertimeChart').getContext('2d');

      // Define the data
      const dataUndertime = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Monthly Data',
          data: [0, 1, 1, 2, 0, 1, 0, 2, 1, 2, 0, 5],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };

      // Configure the options
      const optionsUndertime = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      };

      // Create the chart
      const undertimeChart = new Chart(ctxUndertime, {
        type: 'bar',
        data: dataUndertime,
        options: optionsUndertime
      });

      //////////////////// For Overtime Bar Chart //////////////////////////////
      // Get the canvas element
      const ctxOvertime = document.getElementById('overtimeChart').getContext('2d');

      // Define the data
      const dataOvertime = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Monthly Data',
          data: [0, 0, 1, 3, 0, 1, 0, 2, 1, 2, 0, 4],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };

      // Configure the options
      const optionsOvertime = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      };

      // Create the chart
      const overtimeChart = new Chart(ctxOvertime, {
        type: 'bar',
        data: dataOvertime,
        options: optionsOvertime
      });

      //////////////////// For HalfDay Bar Chart //////////////////////////////
      // Get the canvas element
      const ctxHalfday = document.getElementById('halfdayChart').getContext('2d');

      // Define the data
      const dataHalfday = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Monthly Data',
          data: [0, 0, 1, 2, 0, 0, 0, 2, 1, 3, 0, 5],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };

      // Configure the options
      const optionsHalfday = {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      };

      // Create the chart
      const halfdayChart = new Chart(ctxHalfday, {
        type: 'bar',
        data: dataHalfday,
        options: optionsHalfday
      });
    </script>

    <script>
        var sidebarjs = new SidebarJS.SidebarElement();

        $(document).ready(function(){

          // Change month, change table value
          $("#month").change(function(){
            var month = $('#month').val();
            var year = $('#year').val();

            $.ajax({
              url: "<?php echo base_url(); ?>main/get_analytics",
              method: 'POST',
              dataType: "JSON",
              data: {
                month: month,
                year: year, 
              },
              success: function (response) {
                document.getElementById("workDays").innerHTML = response['workdays_count'];
                document.getElementById("presentDays").innerHTML = response['present_days_count'];
                document.getElementById("absentDays").innerHTML = response['absent_days_count'];
                document.getElementById("tardyDays").innerHTML = response['tardy_days_count'];
                document.getElementById("undertimeDays").innerHTML = response['undertime_days_count'];
                document.getElementById("overtimeDays").innerHTML = response['overtime_days_count'];
                document.getElementById("halfDays").innerHTML = response['half_days_count'];
              },
              error: function (request, status, error) {
                alert(request.responseText);
              }
            });
          });

          // Change year, change table value
          $("#year").change(function(){
            var month = $('#month').val();
            var year = $('#year').val();

            $.ajax({
              url: "<?php echo base_url(); ?>main/get_analytics",
              method: 'POST',
              dataType: "JSON",
              data: {
                month: month,
                year: year, 
              },
              success: function (response) {
                document.getElementById("workDays").innerHTML = response['workdays_count'];
                document.getElementById("presentDays").innerHTML = response['present_days_count'];
                document.getElementById("absentDays").innerHTML = response['absent_days_count'];
                document.getElementById("tardyDays").innerHTML = response['tardy_days_count'];
                document.getElementById("undertimeDays").innerHTML = response['undertime_days_count'];
                document.getElementById("overtimeDays").innerHTML = response['overtime_days_count'];
                document.getElementById("halfDays").innerHTML = response['half_days_count'];
              },
              error: function (request, status, error) {
                alert(request.responseText);
              }
            });
          });


           // Download result
           $("#printAnalytics").click(function(){
            var month = $('#month').val();
            var year = $('#year').val();
            var extractChart = document.getElementById("testHtml");

            // alert(extractChart);
            $('#testHtml').css('height', 'auto');
            
            var titleChart = month + "_" + year + ".png";
            
            html2canvas(extractChart).then(function (canvas) {
                saveAs(canvas.toDataURL(), titleChart);
            });

            $('#testHtml').css('height', 'auto');
          });

          $("#changePasswordBtn").click(function(){
            $('#changePasswordModal').modal('show');
          });

          // Press enter, trigger submit button
          $("#confirm_password").keypress(function(event) {
              if (event.keyCode === 13) {
                  $("#confirmChangePasswordBtn").click();
              }
          });

          $("#confirmChangePasswordBtn").click(function(){
            var flag = 0;
            var current_password = $('#current_password').val();
            var new_password = $('#new_password').val();
            var confirm_password = $('#confirm_password').val();

            if (current_password == '' || current_password == undefined) {
              $('#current_password').css('border', '1px solid red');
              // document.getElementById("new-title-err").innerHTML = "<span style='color: red;'><strong>Can't be blank!</strong></span>";
              flag = 1;
            }

            if (new_password == '' || new_password == undefined) {
              $('#new_password').css('border', '1px solid red');
              // document.getElementById("new-title-err").innerHTML = "<span style='color: red;'><strong>Can't be blank!</strong></span>";
              flag = 1;
            }

            if (confirm_password == '' || confirm_password == undefined) {
              $('#confirm_password').css('border', '1px solid red');
              // document.getElementById("new-title-err").innerHTML = "<span style='color: red;'><strong>Can't be blank!</strong></span>";
              flag = 1;
            }

            if (flag == 0) {
              $.ajax({
              url: "<?php echo base_url(); ?>main/change_password",
              method: 'POST',
              dataType: "JSON",
              data: {
                current_password: current_password,
                new_password: new_password, 
                confirm_password: confirm_password,
              },
              success: function (response) {
                console.log(response);

                if (response['message'] == "Successfully change password."){
                  document.getElementById("messageChangePassword").innerHTML = '<span style="color: blue;">' + response['message']+ '</span>';
                  
                  setTimeout(function() {
                    $('#changePasswordModal').modal('toggle');
                    window.location.href = '<?php echo base_url(); ?>main/index';
                  }, 1500);
                } else {
                  document.getElementById("messageChangePassword").innerHTML = '<span style="color: red;">' + response['message'] + '</span>';

                  // setTimeout(function() {
                  //   window.location.reload();
                  // }, 4000);
                }
              },
              error: function (request, status, error) {
                alert(request.responseText);
              }
              });
            } 
          });

        });
    </script>
</body>

</html>
