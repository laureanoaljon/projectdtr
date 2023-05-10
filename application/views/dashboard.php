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
                            <?php for ($y = 0; $y < count($time_records); $y++ ) { ?>
                              <?php if ($x == date('d', strtotime($time_records[$y]['date']))) { ?>
                                <?php if ($day == "Sun" || $day == "Sat") {?>
                                  <tr style="background-color: #d3d3d3;">
                                <?php } else { ?>
                                  <tr>
                                <?php } ?>
                                    <th scope="row"><?php echo $x; ?></th>
                                    <td><?php echo date('H:i A',strtotime($time_records[$y]['am_time_in'])); ?></td>
                                    <td><?php echo date('H:i A',strtotime($time_records[$y]['am_time_out'])); ?></td>
                                    <td><?php echo date('H:i A',strtotime($time_records[$y]['pm_time_in'])); ?></td>
                                    <td><?php echo date('H:i A',strtotime($time_records[$y]['pm_time_out'])); ?></td>
                                    <td style="text-align: center";><?php echo $day; ?></td>
                                    <td></td>
                                  </tr>
                              <?php } else { ?>
                                <?php if ($day == "Sun" || $day == "Sat") { ?>
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
                          <?php } ?>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>


                  <!-- <?php $time = date("H:i:s A", strtotime('16:10')); ?>
                  <?php $cur_time = date("H:i:s A"); ?>
                  <?php echo $time; ?>
                  <?php echo $cur_time; ?> -->

                  <!-- <div class='col-md-5'><?php echo '<img width="100%" height="auto" src="data:image/jpeg;base64,'.base64_encode($time_records[0]['image']).'"/>' ?></div> -->
                </div>           
              </main>
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

    <!-- Loading Modal  -->
    <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered text-center" role="document">
          <div class="col-md-12 d-flex justify-content-center text-white text-center">
              <span style="font-size: 20px; color: #FFFFFF;">
                  <i class="fa fa-spinner fa-spin fa-3x w-100" aria-hidden="true"></i>
              </span>
          </div>
      </div>        
    </div>

    <script>
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
    </script>

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
          $("#year").change(function(){
            alert($('#year').val());
          });

          $('#timeInOutModal').on('hidden.bs.modal', function () {
            // Clear previous image
            document.getElementById('captured-image').setAttribute('src', '');
          });

          // View Time in Time out modal
          $('#timeInOutModal').on('show.bs.modal',function (event) {
              // Clear previous image
              // document.getElementById('captured-image').setAttribute('src', '');

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

                // $('#loadingModal').modal('show');
                // if (response == "Time in successfully (AM)"){
                //   $('#timeInOutModal').modal('toggle');
                //   setTimeout(function() {
                //     $('#loadingModal').modal('toggle');
                //     window.location.href = '<?php echo base_url(); ?>main/index';
                //   }, 2000);
                // } else {
                //   // document.getElementById("errorPtag").innerHTML = result['message'];
                //   // $('#errorModal').modal('show');

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
