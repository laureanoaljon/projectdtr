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
   

</head>

<body>
   
    <!-- Navigation --->
    <div class="container-fluid">
        <div class="row">
            <div id="sidebarView" sidebarjs>
              <div class="content">
                <div id="sidebarToggle" class="text-white" sidebarjs-toggle><i class="bi bi-chevron-left"></i></div>
                <nav class="navbar flex-column mt-3">
                  <h4 class="text-white text-left">Menu</h4>
                  <a class=" active mr-2 text-white text-left" href="#" role="button">Personal DTR</a>
                  <a class="mr-2 text-white text-left" href="#" role="button">Personal DTR Analytics</a>
                  <a class="mr-2 text-white text-left" href="#" role="button">Employee DTR</a>
                  <a class="mr-2 text-white text-left" href="#" role="button">Employee DTR Analytics</a>
                </nav>
                <nav class="navbar flex-column">
                  <a class="mr-2 text-white text-left" href="#" role="button">Active User Accounts</a>
                  <a class="mr-2 text-white text-left" href="#" role="button">Archived User Accounts</a>
                </nav>
                <nav class="navbar flex-column">
                  <a class="mr-2 text-white text-left" href="#" role="button">Change Password</a>
                  <a class="mr-2 text-white text-left" href="#" role="button">Logout</a>
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
                <nav class="navbar navbar-expand-lg navbar-light text-white" style="background-color: #4C4E52 !important;">
                    <!-- <a class="btn btn-warning text-white" href="<php echo base_url(); ?>" role="button"><i class="bi bi-house-door-fill"></i> National</a> -->
                    <h2>Daily Time Record</h2>
                    <?php if (isset($employee_id)) { ?>
                      <div class="text-right" style="margin-left: 1450px !important;">
                        <h5>Hello, <b><?php echo $first_name; ?></b></h5>
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
                            <select id="month" name="month" class="border rounded pass-label" style="text-align-last: center; height: 40px; width: 150px;" data-live-search="true">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
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

                        <div class="col-5">
											    <button class="btn btn-secondary" type="button" id="loginBtn">Print DTR Table</button>
                          <button class="btn btn-secondary" type="button" id="loginBtn">Print DTR Form</button>
                        </div>

                        <div class="col-2">
							<button class="btn btn-secondary" type="button" id="timein_btn" data-toggle="modal" data-target="#timein_modal" disabled>Time In</button>
                            <button class="btn btn-secondary" type="button" id="timeout_btn" disabled>Time Out</button>
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
                              <th scope="col">#</th>
                              <th scope="col">First</th>
                              <th scope="col">Last</th>
                              <th scope="col">Handle</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td colspan="2">Larry the Bird</td>
                              <td>@twitter</td>
                            </tr>
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

        var selected_employee;
        $('#select_employee').change(function() {
        var selected_employee = $('#select_employee').val();

        
        if(selected_employee == "Select"){
            document.getElementById("timein_btn").disabled = true;
            document.getElementById("timeout_btn").disabled = true;
        }
        else{
            document.getElementById("timein_btn").disabled = false;
            document.getElementById("timeout_btn").disabled = false;
            
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





    
        function getProcessedDateTime(){
            var currentdate = new Date(); 
            // var datetime = (currentdate.getMonth()+1) + "/"
            // +  currentdate.getDate() + "/" 
            // + currentdate.getFullYear();
            var datetime = currentdate.getFullYear();
            return datetime;
        }



        function saveTimeInData(){

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
            var date_in = month+"/"+day+"/"+year;
            // alert(time_in);
            // alert(date_in);
            
            $.ajax({
            url: '<php echo base_url(); ?>/insert-timeindata',
            type: 'POST',
            data: {emp_dbid: selected_employee, time_in:time_in, date_in: date_in},
            error: function() {
                alert('Something went wrong upon the data request.');
            },
            success: function(data) {
                    var array_response = JSON.parse(data);
                    alert(array_response);
            }
            });
        }
   

    $("#timeinmodal_save").click(function(){
        saveTimeInData();
    });


    </script>
</body>

</html>
