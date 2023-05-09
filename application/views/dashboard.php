<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
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
    <!-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-E2XBB2166Q');

    </script> -->

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
                  <a class="w-100 active mr-2 text-white text-left" href="#" role="button">Personal DTR</a>
                  <a class="w-100 mr-2 text-white text-left" href="#" role="button">Personal DTR Analytics</a>
                  <?php if ($category != "employee"){?>
                    <a class="w-100 mr-2 text-white text-left" href="#" role="button">Employee DTR</a>
                    <a class="w-100 mr-2 text-white text-left" href="#" role="button">Employee DTR Analytics</a>
                    <a class="w-100 mr-2 text-white text-left" href="#" role="button">Active User Accounts</a>
                    <a class="w-100 mr-2 text-white text-left" href="#" role="button">Archived User Accounts</a>
                  <?php } ?>
                  <a class="w-100 mr-2 text-white text-left" href="#" role="button">Change Password</a>
                  <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>main/logout" role="button">Logout</a>
                </nav>
              </div>
            </div>
            <nav id="sidebarMenu" class="col d-md-block sidebar collapse">
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
                        <h5 style="font-size: 20px;">Hello, <b><?php echo $first_name; ?></b></h5>
                      </div>
                    <?php } ?>
                </nav>

                <div class="col-md-12">
                  <div class="col-md-10 ml-3 mt-2">
                    <h1 style="color: gray; font-size: 32px;">Personal DTR</h1>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-12">
                    <!-- Variety Group -->
                    <div class="row mt-3 ml-0">
                        <div class="col-6">
                            <!-- Month -->
                            <select id="month" name="month" class="border rounded pass-label" style="text-align-last: center; height: 40px; width: 150px;" data-live-search="true">
                                <option value="January" <?php if ($month == '01'){  echo "selected"; } ?>>January</option>
                                <option value="February" <?php if ($month == '02'){  echo "selected"; } ?>>February</option>
                                <option value="March" <?php if ($month == '03'){  echo "selected"; } ?>>March</option>
                                <option value="April" <?php if ($month == '04'){  echo "selected"; } ?>>April</option>
                                <option value="May" <?php if ($month == '05'){  echo "selected"; } ?>>May</option>
                                <option value="June" <?php if ($month == '06'){  echo "selected"; } ?>>June</option>
                                <option value="July" <?php if ($month == '07'){  echo "selected"; } ?>>July</option>
                                <option value="August" <?php if ($month == '08'){  echo "selected"; } ?>>August</option>
                                <option value="September" <?php if ($month == '09'){  echo "selected"; } ?>>September</option>
                                <option value="October" <?php if ($month == '10'){  echo "selected"; } ?>>October</option>
                                <option value="November" <?php if ($month == '11'){  echo "selected"; } ?>>November</option>
                                <option value="December" <?php if ($month == '12'){  echo "selected"; } ?>>December</option>
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

                        <div class="col-4">
											    <button class="btn btn-secondary" type="button" id="printDtrTable">Print DTR Table</button>
                          <button class="btn btn-secondary" type="button" id="printDtrForm">Print DTR Form</button>
                        </div>

                        <div class="col-2">
											    <button class="btn btn-secondary" type="button" id="timeInBtn">Time In</button>
                          <button class="btn btn-secondary" type="button" id="timeOutBtn">Time Out</button>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-12 mt-4 ml-2">
                    <!-- Table -->
                    <table class="table table-bordered" style="background-color: #fff;">
                      <thead style="background-color: #D3D3D3;">
                        <tr>
                          <th scope="col" rowspan="2" style="width: 5%;  vertical-align: middle;">Date</th>
                          <th scope="col" colspan="2">Morning</th>
                          <th scope="col" colspan="2">Afternoon</th>
                          <th scope="col" rowspan="2" style="vertical-align: middle;">Day</th>
                          <th scope="col" rowspan="2" style="width: 50%;  vertical-align: middle;">Evaluation</th>
                        </tr>
                        <tr>
                          <th scope="col">Time-in</th>
                          <th scope="col">Time-out</th>
                          <th scope="col">Time-in</th>
                          <th scope="col">Time-out</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php for ($x = 1; $x <= $days; $x++) { ?>
                          <?php $day = date('D', strtotime("{$year}-{$month}-{$x}")); ?>
                          <?php if ($day == "Sun" || $day == "Sat") {?>
                            <tr style="background-color: #d3d3d3;">
                          <?php } else { ?>
                            <tr>
                          <?php } ?>
                            <th scope="row"><?php echo $x; ?></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center";><?php echo $day; ?></td>
                            <td></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>           
            </main>
        </div>
    </div>

    <!-- TimeIn Modal -->
    <div class="modal fade" id="timeInModal" tabindex="-1" aria-labelledby="timeInModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background-color: transparent">
            <h3 class="modal-title"><b>Time In</b></h3>
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="time_in" method="POST">
              <div class="form-row">
                <div class="col-md-12 mb-2">
                  <input type="text" class="form-control" name="current_time" value=<?php echo date("h:i:sa"); ?> id="current_time" >  
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="captureTimeInBtn">Capture</button>
            <button type="button" class="btn btn-secondary" id="confirmTimeInBtn">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- TimeOut Modal -->
    <div class="modal fade" id="timeOutModal" tabindex="-1" aria-labelledby="timeOutModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background-color: transparent">
            <h3 class="modal-title"><b>Time Out</b></h3>
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="time_in" method="POST">
              <div class="form-row">
                <div class="col-md-12 mb-2">
                  <input type="text" class="form-control" name="current_time" value=<?php echo date("h:i:sa"); ?> id="current_time" >  
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="captureTimeOutBtn">Capture</button>
            <button type="button" class="btn btn-secondary" id="confirmTimeOutBtn">Save</button>
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
        var sidebarjs = new SidebarJS.SidebarElement();

        $(document).ready(function(){
          $("#year").change(function(){
            alert($('#year').val());
          });

          $("#timeOutBtn").click(function(){
            $('#timeOutModal').modal('show');
          });

          $("#confirmTimeOutBtn").click(function(){
            var flag = 0;
            var current_time = $('#current_time').val();
            var type = 'time_out';

            alert(current_time);

            if (flag == 0) {
              $.ajax({
              url: "<?php echo base_url(); ?>dtr/time_in_out",
              method: 'POST',
              dataType: "JSON",
              data: {
                current_time: current_time, 
              },
              success: function (response) {
                console.log(response);
                $('#timeInModal').modal('toggle');
              },
              error: function (request, status, error) {
                alert(request.responseText);
              }
              });
            } 
          });

          $("#timeInBtn").click(function(){
            $('#timeInModal').modal('show');
          });

          $("#confirmTimeInBtn").click(function(){
            var flag = 0;
            var current_time = $('#current_time').val();
            var type = 'time_in';

            if (flag == 0) {
              $.ajax({
              url: "<?php echo base_url(); ?>dtr/time_in_out",
              method: 'POST',
              dataType: "JSON",
              data: {
                current_time: current_time, 
              },
              success: function (response) {
                console.log(response);
                $('#timeInModal').modal('toggle');
                // if (result['error'] == false){
                //   // alert("Success!");
                //   $('#loadingLoginSuccessModal').modal('show');
                //   setTimeout(function() {
                //     $('#loadingLoginSuccessModal').modal('hide');
                //     window.location.href = '<?php echo base_url(); ?>main/index';
                //   }, 2000);
                // } else {
                //   document.getElementById("errorPtag").innerHTML = result['message'];
                //   $('#errorModal').modal('show');

                //   setTimeout(function() {
                //     window.location.reload();
                //   }, 2000);
                // }
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
