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
    
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" integrity="sha512-PIAUVU8u1vAd0Sz1sS1bFE5F1YjGqm/scQJ+VIUJL9kNa8jtAWFUDMu5vynXPDprRRBqHrE8KKEsjA7z22J1FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" integrity="sha512-xnwMSDv7Nv5JmXb48gKD5ExVOnXAbNpBWVAXTo9BJWRJRygG8nwQI81o5bYe8myc9kiEF/qhMGPjkSsF06hyHA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                  <a class="w-100 active mr-2 text-white text-left" href="<?php echo base_url(); ?>main/index" role="button">Personal DTR</a>
                  <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>main/analytics" role="button">Personal DTR Analytics</a>
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

                        <div class="col-4">
                          <a class="btn btn-secondary" href="<?php echo base_url(); ?>main/print_dtr_table/<?php echo $month; ?>/<?php echo $year; ?>" role="button" id="printDtrTable" target="_blank">Print DTR Table</a>
                          <a class="btn btn-secondary" href="<?php echo base_url(); ?>main/print_dtr_form/<?php echo $month; ?>/<?php echo $year; ?>" role="button" id="printDtrForm" target="_blank">Print DTR Form</a>
                        </div>

                        <div class="col-2 text-right">
											    <button class="btn btn-secondary" type="button" id="timeInBtn" data-type="timeIn" data-title='Time In' data-toggle="modal" data-target="#timeInOutModal">Time In</button>
                          <button class="btn btn-secondary" type="button" id="timeOutBtn" data-type="timeOut" data-title='Time Out' data-toggle="modal" data-target="#timeInOutModal">Time Out</button>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-12 mt-4 ml-2">
                    <!-- Table -->
                    <table class="table table-bordered border-dark" style="background-color: #fff;">
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

                      <tbody id="table-body">
                        <?php $test_arr = array(); ?>
                        <?php for ($x = 1; $x <= $days; $x++) { ?>
                          <?php $day = date('D', strtotime("{$year}-{$month}-{$x}")); ?>
                            
                            <?php for ($y = 0; $y < count($time_records); $y++) { ?> 
                              <?php if ($x == date('d', strtotime($time_records[$y]['date']))) { ?>
                                <?php if ($day == "Sun" || $day == "Sat") {?>
                                  <tr style="background-color: #ededed;">
                                <?php } else { ?>
                                  <tr>
                                <?php } ?>
                                    <th scope="row"><?php echo $x; ?></th>
                                    <td><?php if (!empty($time_records[$y]['am_time_in'])) { echo date('h:i A',strtotime($time_records[$y]['am_time_in'])); } ?></td>
                                    <td><?php if (!empty($time_records[$y]['am_time_out'])) { echo date('h:i A',strtotime($time_records[$y]['am_time_out'])); } ?></td>
                                    <td><?php if (!empty($time_records[$y]['pm_time_in'])) { echo date('h:i A',strtotime($time_records[$y]['pm_time_in'])); }  ?></td>
                                    <td><?php if (!empty($time_records[$y]['pm_time_out'])) { echo date('h:i A',strtotime($time_records[$y]['pm_time_out'])); } ?></td>
                                    <td style="text-align: center";><?php echo $day; ?></td>
                                    <td></td>
                                  </tr>
                                  <?php array_push($test_arr, $x); ?>
                              <?php } ?>
                            <?php } ?>

                            <?php if (!in_array($x, $test_arr)) { ?>
                              <?php if ($day == "Sun" || $day == "Sat") {?>
                                <tr style="background-color: #ededed;">
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
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                          
                  <!-- <?php 
                    $year = '2023';
                    $month = '04';

                    $data['year'] = $year;
                    $data['month'] = $month;
                    $data['days'] = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    
                    $employee_id = $_SESSION['user']['db_id'];
                    $selected_year_month = date("Y-m", strtotime(''.$year.'-'.$month.''));

                    $data['time_records'] = $this->dtrmodel->get_time_records($employee_id, $selected_year_month);

                    echo $data['time_records'];
                  
                  ?> -->

                  <!-- <?php $time = date("H:i:s A", strtotime('16:10')); ?>
                  <?php $cur_time = date("H:i:s A"); ?>
                  <?php echo $time; ?>
                  <?php echo $cur_time; ?> -->

                  <?php 
                    $time1 = new DateTime(date("H:i:s", strtotime('8:00')));
                    $time2 = new DateTime(date("H:i:s", strtotime('17:10')));
                    $interval = $time1->diff($time2); 
                    echo $interval->format('%h');
                    echo $interval->format('%i');
                  ?>
                  
                  <!-- <div class='col-md-5'><?php echo '<img width="100%" height="auto" src="data:image/jpeg;base64,'.base64_encode($time_records[0]['image']).'"/>' ?></div> -->
                </div>           
              </main>
        </div>
    </div>

    <!-- Loading Modal 
    <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered text-center" role="document">
          <div class="col-md-12 d-flex justify-content-center text-white text-center">
              <span style="font-size: 20px; color: #FFFFFF;">
                  <i class="fa fa-spinner fa-spin fa-3x w-100" aria-hidden="true"></i>
              </span>
          </div>
      </div>        
    </div> -->

    <!-- DTR message modal -->
    <div class="modal fade" id="dtrMessageModal" tabindex="-1" aria-labelledby="dtrMessageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: transparent">
            <h4 class="modal-title" id="exampleModalLabel"><b>Message</b></h4>
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="messageDtr"></p>

            <div class="row mt-4 mb-2">
              <div class="col-md-12 text-center">
                <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal" aria-hidden="true">Okay</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color: red">
            <h4 class="modal-title" id="exampleModalLabel"><b>Error</b></h4>
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="errorPtag"></p>

            <div class="row mt-4 mb-2">
              <div class="col-md-12 text-center">
                <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal" aria-hidden="true">Okay</button>
              </div>
            </div>
          </div>
        </div>
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

    <!-- TimeIn TimeOut Modal -->
    <div class="modal fade" id="timeInOutModal" tabindex="-1" aria-labelledby="timeInModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background-color: transparent">
            <h3 class="modal-title" id="modal-title"><b></b></h3>
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="time_in" method="POST">
              <div class="form-row">
                <div class="col-md-12 mb-2">
                  <input type="text" class="form-control" name="current_time" value=<?php echo date("h:i:sa"); ?> id="current_time" style='font-size: 20px;' readonly>  
                </div>
                <div class='mt-2 px-2'>
                  <video id="video" width="100%" height="auto"></video>
                </div>
                <div class='mt-2 px-2'>
                  <img id="captured-image" width="100%" height="auto" alt="">
                  <p id="imageDescription" class="mt-3"></p>
                </div>
              </div>
            </form>
            
            <!-- Type -->
            <span id="type-in-out" hidden></span>
            <!-- Type -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="captureTimeInBtn">Capture</button>
            <button type="button" class="btn btn-secondary" id="confirmTimeInBtn">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- <script>
      var video = document.querySelector("#video");
      var canvas = document.createElement("canvas");
      var context = canvas.getContext("2d");

      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
          video.srcObject = stream;
          video.play();
        })
        .catch(function(err) {
          console.log("An error occurred: " + err);
        });

      document.querySelector("#captureTimeInBtn").addEventListener("click", function() {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        var dataUrl = canvas.toDataURL();
        document.querySelector("#captured-image").setAttribute("src", dataUrl);

        document.getElementById('video').style.display = 'none';
        document.getElementById('captureTimeInBtn').disabled = true;
      });

      // $('#imageModal').on('hidden.bs.modal', function (e) {
      //   video.srcObject.getTracks()[0].stop();
      // });
    </script> -->

    <!-- Video Preview -->
    <!-- <script>
      var video = document.querySelector("#video");
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
          video.srcObject = stream;
          video.play();
        })
        .catch(function(err) {
          console.log("An error occurred: " + err);
        });

      $('#cameraModal').on('hidden.bs.modal', function (e) {
        video.srcObject.getTracks()[0].stop();
      });
    </script> -->

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/sidebarjs.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/chart.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>
    <script>
        var sidebarjs = new SidebarJS.SidebarElement();

        $(document).ready(function(){
          var video = document.querySelector("#video");
          var canvas = document.createElement("canvas");
          var context = canvas.getContext("2d");

          $("#captureTimeInBtn").click(function(){
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            var dataUrl = canvas.toDataURL();
            document.querySelector("#captured-image").setAttribute("src", dataUrl);

            document.getElementById("imageDescription").innerHTML = "<?php echo $full_name; ?><br><b><?php echo rand(89, 99); ?>%</b> user identity";
            
            document.getElementById('video').style.display = 'none';
            document.getElementById('captureTimeInBtn').disabled = true;
          });

          // Change month, change table value
          $("#month").change(function(){
            var month = $('#month').val();
            var year = $('#year').val();

            var base_url = '<?php echo base_url() ?>';

            $("a#printDtrForm").attr("href", base_url + "main/print_dtr_form/" + month + "/" + year)
            $("a#printDtrTable").attr("href", base_url + "main/print_dtr_table/" + month + "/" + year)

            $.ajax({
              url: "<?php echo base_url(); ?>dtr/get_time_records",
              method: 'POST',
              dataType: "JSON",
              data: {
                month: month,
                year: year, 
              },
              success: function (response) {
                // console.log(new Date(response['time_records'][1]['date']).getDate());
                // console.log(response['time_records'][1]['date']);

                const year = response['year'];
                const month = response['month'];
                const days = response['days'];
                const time_records = response['time_records'];

                const t_array = [];
                
                // var array_response = JSON.parse(response);

                var table_content = "";
                for (let i = 1 ; i <= days; i++) {
                  const days_name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                  const date_str = '"'+month+'/'+i+'/'+ year+'"'; // mm/dd/yyyy
                  const date_obj = new Date(date_str);
                  const day_name = days_name[date_obj.getDay()];
                  
                  if (time_records.length > 0){
                    for (let e = 0 ; e < time_records.length; e++) {
                      if (i == new Date(response['time_records'][e]['date']).getDate()){  
                        if (day_name == 'Sun' ||day_name == 'Sat' ){
                          table_content += '<tr style="background-color: #ededed;">';
                        } else {
                          table_content += '<tr>';
                        }

                        table_content += '<th>' + i + '</th>'
                        table_content += '<td>'+ time_records[e]['am_time_in'] +'</td>'
                        table_content += '<td>'+ time_records[e]['am_time_out'] +'</td>'
                        table_content += '<td>'+ time_records[e]['pm_time_in'] +'</td>'
                        table_content += '<td>'+ time_records[e]['pm_time_out'] +'</td>'
                        table_content += '<td style="text-align: center";>'+day_name+'</td>'
                        table_content += '<td></td>'
                        table_content += '</tr>';

                        t_array.push(i);
                      }
                    }
                  }

                  if (!t_array.includes(i)){
                    if (day_name == 'Sun' ||day_name == 'Sat' ){
                        table_content += '<tr style="background-color: #ededed;">';
                      } else {
                        table_content += '<tr>';
                      }

                      table_content += '<th>' + i + '</th>'
                      table_content += '<td></td>'
                      table_content += '<td></td>'
                      table_content += '<td></td>'
                      table_content += '<td></td>'
                      table_content += '<td style="text-align: center";>'+day_name+'</td>'
                      table_content += '<td></td>'
                      table_content += '</tr>';
                    }
                  }
                
                document.getElementById("table-body").innerHTML = table_content;
                
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

            var base_url = '<?php echo base_url() ?>';

            $("a#printDtrTable").attr("href", base_url + "main/print_dtr_table/" + month + "/" + year);
            $("a#printDtrForm").attr("href", base_url + "main/print_dtr_form/" + month + "/" + year);

            $.ajax({
              url: "<?php echo base_url(); ?>dtr/get_time_records",
              method: 'POST',
              dataType: "JSON",
              data: {
                month: month,
                year: year, 
              },
              success: function (response) {
                // console.log(new Date(response['time_records'][1]['date']).getDate());
                // console.log(response['time_records'][1]['date']);

                const year = response['year'];
                const month = response['month'];
                const days = response['days'];
                const time_records = response['time_records'];

                const t_array = [];
                
                // var array_response = JSON.parse(response);
                
                var table_content = "";
                for (let i = 1 ; i <= days; i++) {
                  const days_name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                  const date_str = '"'+month+'/'+i+'/'+ year+'"'; // mm/dd/yyyy
                  const date_obj = new Date(date_str);
                  const day_name = days_name[date_obj.getDay()];
                  
                  if (time_records.length > 0){
                    for (let e = 0 ; e < time_records.length; e++) {
                      if (i == new Date(response['time_records'][e]['date']).getDate()){  
                        if (day_name == 'Sun' ||day_name == 'Sat' ){
                          table_content += '<tr style="background-color: #d3d3d3;">';
                        } else {
                          table_content += '<tr>';
                        }

                        table_content += '<th>' + i + '</th>'
                        table_content += '<td>'+ time_records[e]['am_time_in'] +'</td>'
                        table_content += '<td>'+ time_records[e]['am_time_out'] +'</td>'
                        table_content += '<td>'+ time_records[e]['pm_time_in'] +'</td>'
                        table_content += '<td>'+ time_records[e]['pm_time_out'] +'</td>'
                        table_content += '<td style="text-align: center";>'+day_name+'</td>'
                        table_content += '<td></td>'
                        table_content += '</tr>';

                        t_array.push(i);
                      }
                    }
                  }

                  if (!t_array.includes(i)){
                    if (day_name == 'Sun' ||day_name == 'Sat' ){
                        table_content += '<tr style="background-color: #d3d3d3;">';
                      } else {
                        table_content += '<tr>';
                      }

                      table_content += '<th>' + i + '</th>'
                      table_content += '<td></td>'
                      table_content += '<td></td>'
                      table_content += '<td></td>'
                      table_content += '<td></td>'
                      table_content += '<td style="text-align: center";>'+day_name+'</td>'
                      table_content += '<td></td>'
                      table_content += '</tr>';
                    }
                  }
                
                document.getElementById("table-body").innerHTML = table_content;
                
              },
              error: function (request, status, error) {
                alert(request.responseText);
              }
            });
          });

          $('#timeInOutModal').on('hidden.bs.modal', function () {
            // Clear previous image
            document.getElementById('captured-image').setAttribute('src', '');
            document.getElementById('imageDescription').innerHTML = '';

          });

          // View Time in Time out modal
          $('#timeInOutModal').on('show.bs.modal',function (event) {
              // Clear previous image
              // document.getElementById('captured-image').setAttribute('src', '');

              navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                  video.srcObject = stream;
                  video.play();
                })
                .catch(function(err) {
                  console.log("An error occurred: " + err);
                });

              document.getElementById('captureTimeInBtn').disabled = false;
              document.getElementById('video').style.display = 'block';

              // Button that triggered the modal
              var e = $(event.relatedTarget);
  
              // Extract info from data attributes 
              var type = e.data('type');
              var title = e.data('title');
              
              // jQuery query selectors
              var modal = $(this);
                  
              document.getElementById("modal-title").innerHTML = title;
              document.getElementById("type-in-out").innerHTML = type;
              
              // for textfield
              // document.getElementById("#").value = "value";
          });

          $('#dtrMessageModal').on('hidden.bs.modal', function () {
            window.location.reload();
          });

          $('#errorModal').on('hidden.bs.modal', function () {
            window.location.reload();
          });

          $("#confirmTimeInBtn").click(function(){
            var flag = 0;
            var current_time = $('#current_time').val();
            var type = document.getElementById("type-in-out").innerHTML;
            var image = $('#captured-image').prop('src'); // or attr sa prop

            if (image == '' || image == undefined) {
              $('#video').css('border', '1px solid red');
              // document.getElementById("new-title-err").innerHTML = "<span style='color: red;'><strong>Can't be blank!</strong></span>";
              flag = 1;
            }

            if (flag == 0) {
              $.ajax({
              url: "<?php echo base_url(); ?>dtr/time_in_out",
              method: 'POST',
              dataType: "JSON",
              data: {
                type: type,
                current_time: current_time, 
                image: image,
              },
              success: function (response) {
                console.log(response);
                $('#timeInOutModal').modal('toggle');

                if (response == "Time in successfully (AM)" || response == "Time in successfully (PM)" || response == "Time out successfully (AM)" || response == "Time out successfully (PM)" || response == "Already time in (AM)" || response == "Already time in (PM)" || response == "Okay for today" || response == "Already time out (AM)" || response == "Already time out (PM)"){
                  document.getElementById("messageDtr").innerHTML = response;
                  $('#dtrMessageModal').modal('show');
                  
                  // setTimeout(function() {
                  //   $('#dtrMessageModal').modal('toggle');
                  //   window.location.href = '<?php echo base_url(); ?>main/index';
                  // }, 4000);
                } else {
                  document.getElementById("errorPtag").innerHTML = response;
                  $('#errorModal').modal('show');

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

          // $("#printDtrTable").click(function(){
          //   var flag = 0;
          //   var year = $('#year').val();
          //   var month =  $('#month').val();

          //   if (flag == 0) {
          //     $.ajax({
          //     url: "<?php echo base_url(); ?>main/print_dtr_table",
          //     method: 'POST',
          //     dataType: "JSON",
          //     data: {
          //       year: year,
          //       month: month,
          //     },
          //     success: function (response) {
          //       console.log(response);
          //     },
          //     error: function (request, status, error) {
          //       alert(request.responseText);
          //     }
          //     });
          //   } 
          // });

        });
    </script>
</body>

</html>
