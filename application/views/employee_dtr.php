<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Employee DTR</title>
    <meta name="description" content="Main Page">
    <?php
    echo link_tag('css/bootstrap-reboot.min.css');
    echo link_tag('css/bootstrap.min.css');
    echo link_tag('css/bootstrap-grid.min.css');
    echo link_tag('css/bootstrap-icons.css');
    echo link_tag('css/sidebarjs.min.css');
    echo link_tag('css/styles.css');
    ?>

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
                  <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>main/index" role="button">Personal DTR</a>
                  <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>main/analytics" role="button">Personal DTR Analytics</a>
                  <?php if ($category != "employee"){?>
                    <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>EmployeeDTR/index" role="button">Employee DTR</a>
                    <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>EmployeeDTRAnalytics/index" role="button">Employee DTR Analytics</a>
                    <a class="w-100 mr-2 text-white text-left"  href="<?php echo base_url(); ?>EmployeeDTR/office_analytics" role="button">Office DTR Analytics</a>
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

               
            

                    
                
                    <!-- <div class="row">
                        <div class="col-4">
                            <div class="card primary mb-2 bg-primary text-center text-white">
                                <div class="card-body">
                                    <h5 class="card-title text-left"><a href="<php echo base_url(); ?>productions" class="text-white stretched-link text-decoration-none card-main">Palay Production (2021)</a></h5>
                                    <h1 class="card-text font-weight-bold"><php echo $production_all['value']; ?><i class="<php echo $prod_caret; ?>"></i></h1>
                                    <div class="card-note w-50 mx-auto rounded-pill bg-warning">
                                        <p class="text-white">million metric tons</p>
                                    </div>
                                </div>
                                <div class="caret-select"><i class="bi bi-caret-right-alt pr-2"></i></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card primary mb-2 bg-primary text-center text-white">
                                <div class="card-body">
                                    <h5 class="card-title text-left"><a href="<php echo base_url(); ?>harvestareas" class="text-white stretched-link text-decoration-none card-main">Area Harvested (2021)</a></h5>
                                    <h1 class="card-text font-weight-bold"><php echo $harvestarea_all['value']; ?> <i class="<php echo $area_caret; ?>"></i></h1>
                                    <div class="card-note w-50 mx-auto rounded-pill bg-warning">
                                        <p class="text-white">million hectares</p>
                                    </div>
                                </div>
                                <div class="caret-select"><i class="bi bi-caret-right-alt pr-2"></i></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card primary mb-2 bg-primary text-center text-white">
                                <div class="card-body">
                                    <h5 class="card-title text-left"><a href="<php echo base_url(); ?>estyields" class="text-white stretched-link text-decoration-none card-main">Yield per Hectare (2021)</a></h5>
                                    <h1 class="card-text font-weight-bold"><php echo $estyield_all['value']; ?> <i class="<php echo $yield_caret; ?>"></i></h1>
                                    <div class="card-note w-75 mx-auto rounded-pill bg-warning">
                                        <p class="text-white">metric tons per hectare</p>
                                    </div>
                                </div>
                                <div class="caret-select"><i class="bi bi-caret-right-alt pr-2"></i></div>
                            </div>
                        </div>
                    </div> -->





                    <!-- Modal -->
                    <div class="modal fade" id="timein_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">TIME-IN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center mb-2">
                                
                                    <select id="select_month_timein" name="" class="border rounded pass-label mr-3">
                                            <option value="1">January</option>
                            
                                    </select>    
                                
                                    <select id="select_day_timein" name="" class="border rounded pass-label">
                                            <option value="1">1</option>
                                           
                                    </select>
                            
                            </div>

                            <div class="row justify-content-center">
                                
                                    <select id="select_hour_timein" name="" class="border rounded pass-label mr-3">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                    </select>    
                                
                                    <select id="select_minute_timein" name="" class="border rounded pass-label mr-3">
                                        <?php
                                            for ($x = 0; $x <= 59; $x++) {
                                                echo "<option value='".$x."'>".$x."</option>";
                                              }
                                        ?>
                                    </select>
                                
                                    <select id="select_ampm_timein" name="" class="border rounded pass-label">
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                    </select>
                            
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="timeinmodal_save">Save</button>
                        </div>
                        </div>
                    </div>
                    </div>



                    <!-- Modal -->
                    <div class="modal fade" id="timeout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">TIME-OUT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center mb-2">
                                
                                    <select id="select_month_timeout" name="" class="border rounded pass-label mr-3">
                                            <option value="1">January</option>
                            
                                    </select>    
                                
                                    <select id="select_day_timeout" name="" class="border rounded pass-label">
                                            <option value="1">1</option>
                                           
                                    </select>
                            
                            </div>

                            <div class="row justify-content-center">
                                
                                    <select id="select_hour_timeout" name="" class="border rounded pass-label mr-3">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                    </select>    
                                
                                    <select id="select_minute_timeout" name="" class="border rounded pass-label mr-3">
                                        <?php
                                            for ($x = 0; $x <= 59; $x++) {
                                                echo "<option value='".$x."'>".$x."</option>";
                                              }
                                        ?>
                                    </select>
                                
                                    <select id="select_ampm_timeout" name="" class="border rounded pass-label">
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                    </select>
                            
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="timeoutmodal_save">Save</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    

                <div class="row">
                  <div class="col-md-12 ml-3 mt-2">
                    <h1 style="color: gray; font-size: 32px;">Employee DTR
                    
                    </h1>
                    
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row mt-5 ml-5">
                        <select id="select_employee" name="" class="border rounded pass-label">
                                <option value="Select">Select Employee</option>
                                <?php
                                    foreach ($employees_data as $row)
                                    {
                                            echo "<option value='".$row->db_id."'>".$row->s_name.", ".$row->f_name." -- ".$row->employee_id."</option>";
                                    }
                                ?>
                        </select>    
                    </div>
                    <!-- Variety Group -->
                    <div class="row mt-3 ml-5 mr-4">
                    <div class="col-5">
                            <!-- Month -->
                            <select id="select_month" name="month" class="border rounded pass-label" style="text-align-last: center; height: 40px; width: 150px;" data-live-search="true">
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
                            <select id="select_year" name="year" class="border rounded pass-label" data-live-search="true" style="text-align-last: center; height: 40px; width: 100px;">
                                <option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
                                <option value="<?php echo date("Y") - 1; ?>"><?php echo date("Y") - 1; ?></option>
                                <option value="<?php echo date("Y") - 2; ?>"><?php echo date("Y") - 2; ?></option>
                                <option value="<?php echo date("Y") - 3; ?>"><?php echo date("Y") - 3; ?></option>
                                <option value="<?php echo date("Y") - 4; ?>"><?php echo date("Y") - 4; ?></option>
                                <option value="<?php echo date("Y") - 5; ?>"><?php echo date("Y") - 5; ?></option>
                            </select>
                        </div>

                        <div class="col-5">
                             <a class="btn btn-secondary" href="" role="button" id="printDtrTable" target="_blank">Print DTR Table</a>
                            <a class="btn btn-secondary" href="" role="button" id="printDtrForm" target="_blank">Print DTR Form</a>
                        </div>

                        <div class="col-2">
							<button class="btn btn-secondary" type="button" id="timein_btn" data-toggle="modal" data-target="#timein_modal" disabled>Time In</button>
                            <button class="btn btn-secondary" type="button" id="timeout_btn" data-toggle="modal" data-target="#timeout_modal" disabled>Time Out</button>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="row mt-3 ml-5 mb-3">
                      <div class="col-11">
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
                          <tbody id="table_body">
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>


                    
                   
                
            </main>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/sidebarjs.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>
    <script>
        var sidebarjs = new SidebarJS.SidebarElement();


        function getEmployeesDtrPerMonth(){
            var slected_month = $('#select_month').val();
            var slected_year = $('#select_year').val();
            var selected_employee = $('#select_employee').val();

            var base_url = '<?php echo base_url() ?>';

            // $("a#printDtrForm").attr("href", base_url + "main/print_dtr_form/" + month + "/" + year)
            // $("a#printDtrTable").attr("href", base_url + "main/print_dtr_table/" + month + "/" + year)
            $("a#printDtrForm").attr("href", base_url + "main/print_dtr_form/" + slected_month + "/" + slected_year+ "/" + selected_employee);
            $("a#printDtrTable").attr("href", base_url + "main/print_dtr_table/" + slected_month + "/" + slected_year+ "/" + selected_employee);

            
            $.ajax({
              url: "<?php echo base_url(); ?>employeedtr/get_time_records",
              method: 'POST',
              dataType: "JSON",
              data: {
                month: slected_month,
                year: slected_year, 
                emp_dbid:selected_employee
              },
              success: function (response) {
                // console.log(new Date(response['time_records'][1]['date']).getDate());
                // console.log(response['time_records'][1]['date']);

                const year = response['year'];
                const month = response['month'];
                const days = response['days'];
                const time_records = response['time_records'];

                 const t_array = [];

                  const d_temp = new Date(slected_month+"/1/"+slected_year);
                  let day_temp = d_temp.getDay();
            
                
                
                // var array_response = JSON.parse(response);

                var table_content = "";
                const days_name = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                for (let i = 1 ; i <= days; i++) {
                  
                  const date_str = '"'+month+'/'+i+'/'+ year+'"'; // mm/dd/yyyy
                  const date_obj = new Date(date_str);
                //   const day_name = days_name[date_obj.getDay()];
                if(day_temp == 7)
                    day_temp = 0;
                const day_name = days_name[day_temp];
                day_temp++;
                  
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
                
                document.getElementById("table_body").innerHTML = table_content;
                
              },
              error: function (request, status, error) {
                alert(request.responseText);
              }
            });
        }

         // Change month, change table value
         $("#select_month").change(function(){
                getEmployeesDtrPerMonth();
          });

          $("#select_year").change(function(){
                getEmployeesDtrPerMonth();
          });


        function getEmployeeDTR(emp_dbid){


            $.ajax({
            url: '<?php echo base_url(); ?>/get-empdtr',
            type: 'POST',
            data: {emp_dbid: emp_dbid},
            error: function() {
                alert('Something went wrong upon the data request.');
            },
            success: function(data) {
                    var array_response = JSON.parse(data);

                    var table_content = "";
                    for (let i = 0 ; i < array_response.length; i++) {
                        table_content += '<tr>';
                        table_content += '<td>'+array_response[i].date+'</td>'
                        table_content += '<td>'+array_response[i].am_time_in+'</td>'
                        table_content += '<td>'+array_response[i].am_time_out+'</td>'
                        table_content += '<td>'+array_response[i].pm_time_in+'</td>'
                        table_content += '<td>'+array_response[i].pm_time_out+'</td>'
                        table_content += '<td></td>'
                        table_content += '<td></td>'
                        table_content += '</tr>';
                        
                    }
                    //console.log(array_response);
                    document.getElementById("table_body").innerHTML = table_content;
            }
            });
        }

        
        $('#select_employee').change(function() {
            var selected_employee = $('#select_employee').val();

        
        if(selected_employee == "Select"){
            document.getElementById("timein_btn").disabled = true;
            document.getElementById("timeout_btn").disabled = true;
        }
        else{
            document.getElementById("timein_btn").disabled = false;
            document.getElementById("timeout_btn").disabled = false;
            getEmployeesDtrPerMonth();
        }
            
    });


//setting time in modal fields
    const month_names = ["null", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var currentdate = new Date(); 
    // var datetime = "Last Sync: " + currentdate.getDate() + "/"
    //             + (currentdate.getMonth()+1)  + "/" 
    //             + currentdate.getFullYear() + " @ "  
    //             + currentdate.getHours() + ":"  
    //             + currentdate.getMinutes() + ":"
    //             + currentdate.getSeconds();

        

    var current_month = currentdate.getMonth()+1;
    var select_month_timein_options="";
        for (let i =current_month ; i <= 12; i++) {
            select_month_timein_options += "<option value='"+i+"'>"+month_names[i]+"</option>"
        }
    document.getElementById("select_month_timein").innerHTML = select_month_timein_options;
    document.getElementById("select_month_timeout").innerHTML = select_month_timein_options;
    

    function getDaysInCurrentMonth() {
        // const date = new Date();
        return new Date(currentdate.getFullYear(), currentdate.getMonth() + 1, 0).getDate();
    }
    const days_ofcurrentmonth = getDaysInCurrentMonth();
    var select_day_timein_options="";
        for (let i =1 ; i <= days_ofcurrentmonth; i++) {
            select_day_timein_options += "<option value='"+i+"'>"+i+"</option>"
        }
    document.getElementById("select_day_timein").innerHTML = select_day_timein_options;
    document.getElementById("select_day_timeout").innerHTML = select_day_timein_options;





    
        function getProcessedDateTime(){
            var currentdate = new Date(); 
            // var datetime = (currentdate.getMonth()+1) + "/"
            // +  currentdate.getDate() + "/" 
            // + currentdate.getFullYear();
            var datetime = currentdate.getFullYear();
            return datetime;
        }


        

        function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        //minutes = minutes < 10 ? '0'+minutes : minutes;
        //var strTime = hours + ':' + minutes + ' ' + ampm;
        //return strTime;

        var currenttime = [hours, minutes, ampm];
        //var currenttime = [5, 45, 'pm'];
        return currenttime;
        }


        function saveTimeInData(){

            var d = new Date(); // for now
            var currenttime = formatAMPM(d);

            var time_in_mode;
            if(currenttime[2] == 'am' && currenttime[0] <=11){
                time_in_mode = "morning time-in";
                if(currenttime[0] == 11 && currenttime[1] != 0)
                    time_in_mode = "afternoon time-in";
            }else if(currenttime[2] == 'pm'){
                if(currenttime[0] ==12 || (currenttime[0] <=4)){
                    time_in_mode = "afternoon time-in";
                }
                if(currenttime[0] == 4 && currenttime[1] != 0){
                    alert("No more time-in allowed")
                    return;
                }
                if(currenttime[0] > 4){
                    alert("No more time-in allowed")
                    return;
                }
            }
            // time_in_mode = "afternoon time-in";

            //alert(currenttime[2]);
            //alert(formatAMPM(d));

            var hour = $('#select_hour_timein').val();
            var minute = $('#select_minute_timein').val();
            var ampm = $('#select_ampm_timein').val();
            if(minute<10){
                minute = "0"+minute;
            }
            var time_in = hour+":"+minute+" "+ampm;
            

            var month = $('#select_month_timein').val();
            var day = $('#select_day_timein').val();
            var year = getProcessedDateTime();
            var date_in = year+"-"+month+"-"+day;
            // alert(time_in);
            // alert(date_in);
            
            var selected_employee = $('#select_employee').val();
          

            $.ajax({
            url: '<?php echo base_url(); ?>/insert-timeindata',
            type: 'POST',
            data: {emp_dbid: selected_employee, time_in:time_in, date_in: date_in, time_in_mode:time_in_mode},
            error: function() {
                alert('Something went wrong upon the data request.');
            },
            success: function(data) {
                    var array_response = JSON.parse(data);
                    alert(array_response);
                    $('#timein_modal').modal('hide');
                    // getEmployeeDTR(selected_employee);
                    getEmployeesDtrPerMonth();
            }
            });
        }
   

    $("#timeinmodal_save").click(function(){
        saveTimeInData();
    });




    function saveTimeOutData(){

        var d = new Date(); // for now
        var currenttime = formatAMPM(d);

        var time_out_mode;
        if(currenttime[2] == 'am' && currenttime[0] >=9){
            time_out_mode = "morning time-out";
        }else if(currenttime[2] == 'pm' && currenttime[0] ==12){
            time_out_mode = "morning time-out";
        }else if(currenttime[2] == 'pm' && currenttime[0] ==1 && currenttime[1] ==0){
            time_out_mode = "morning time-out";
        }
        else if(currenttime[2] == 'pm' && currenttime[0] >=2 ){
            time_out_mode = "afternoon time-out";
        }else{
            alert("Not able to time-out during this time");
            return;
        }
        //time_in_mode = "afternoon time-in";

        //alert(currenttime[2]);
        //alert(formatAMPM(d));

        var hour = $('#select_hour_timeout').val();
        var minute = $('#select_minute_timeout').val();
        var ampm = $('#select_ampm_timeout').val();
        if(minute<10){
            minute = "0"+minute;
        }
        var time_out = hour+":"+minute+" "+ampm;


        var month = $('#select_month_timeout').val();
        var day = $('#select_day_timeout').val();
        var year = getProcessedDateTime();
        var date_in = year+"-"+month+"-"+day;
        // alert(time_in);
        // alert(date_in);

        var selected_employee = $('#select_employee').val();


        $.ajax({
        url: '<?php echo base_url(); ?>/insert-timeoutdata',
        type: 'POST',
        data: {emp_dbid: selected_employee, time_out:time_out, date_in: date_in, time_out_mode:time_out_mode},
        error: function() {
            alert('Something went wrong upon the data request.');
        },
        success: function(data) {
                var array_response = JSON.parse(data);
                alert(array_response);
                $('#timeout_modal').modal('hide');
                // getEmployeeDTR(selected_employee);
                getEmployeesDtrPerMonth();
        }
        });
    }


    $("#timeoutmodal_save").click(function(){
        saveTimeOutData();
    });

    </script>
</body>

</html>
