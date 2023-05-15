<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Archived User Accounts</title>
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
                    <a class="w-100 mr-2 text-white text-left" href="#" role="button">Employee DTR Analytics</a>
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





                 <!-- Modal -->
                <!--<div class="modal fade" id="newaccount_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">NEW USER ACCOUNT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="<php echo base_url(); ?>/assets/user.png" alt="Girl in a jacket">
                                        <button class="btn btn-secondary" type="button">Change</button>
                                    </div>

                                    <div class="col-8">
                                        <div class="row mb-2">
                                            <p class="mr-2">ID-Number: </p>
                                            <input type="text" name="" id="newuser_idnumber">
                                        </div>
                                        <div class="row mb-2">
                                            <p class="mr-2">Surname: </p>
                                            <input type="text" name="" id="newuser_surname">
                                        </div>
                                        <div class="row mb-2">
                                            <p class="mr-2">First Name: </p>
                                            <input type="text" name="" id="newuser_fname">
                                        </div>
                                        <div class="row mb-2">
                                            <p class="mr-2">Category: </p>
                                            <select id="newuser_category" name="" class="border rounded pass-label">
                                                <option value="Select">Select Category</option>
                                                <option value="employee">Employee</option>
                                                <option value="office-head">Office Head</option>
                                                <option value="hr-personnel">HR Personnel</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="newusermodal_save">Save</button>
                            </div>
                        </div>
                    </div>
                </div> -->


                <div class="modal fade" id="reviveuserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Revive account?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="revivebtn_modal">Revive</button>
                        </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="deleteuserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete account?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="deletebtn_modal">Delete</button>
                        </div>
                        </div>
                    </div>
                </div>



              



                <div class="col-md-12">
                    <div class="col-md-10 ml-3 mt-2">
                        <h1 style="color: gray; font-size: 32px;">Archived User Accounts</h1>
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
                                            <th></th>
                                            <th>ID Number</th>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>User Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        <?php
                                        $row_number = 1;
                                        foreach ($archivedAccounts_data as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row_number . "</td>";
                                            echo "<td>" . $row->employee_id . "</td>";
                                            echo "<td>" . $row->s_name . "</td>";
                                            echo "<td>" . $row->f_name . "</td>";
                                            echo "<td>" . $row->category . "</td>";
                                            echo "<td><input type='button' value='Revive' onclick='reviveaccount(" . $row->db_id . ")'><input type='button' value='Delete' onclick='deleteaccount(" . $row->db_id . ")'></td>";
                                            echo "</tr>";
                                            $row_number++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                
                                <input type="hidden" id="currently_selecteduser_revive">
                                <input type="hidden" id="currently_selecteduser_delete">




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
        var sidebarjs = new SidebarJS.SidebarElement();

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


        function getArchiveUserAccounts() {
                $.ajax({
                    url: '<?php echo base_url(); ?>/get-archiveaccounts',
                    type: 'POST',
                    data: {
                        emp_dbid: "none"
                    },
                    error: function() {
                        alert('Something went wrong upon the data request.');
                    },
                    success: function(data) {
                        var array_response = JSON.parse(data);

                        //console.log(array_response);
                        var table_content = "";
                        for (let i = 0; i < array_response.length; i++) {
                            var j = i + 1;
                            table_content += '<tr>';
                            table_content += '<td>' + j + '</td>'
                            table_content += '<td>' + array_response[i].employee_id + '</td>'
                            table_content += '<td>' + array_response[i].s_name + '</td>'
                            table_content += '<td>' + array_response[i].f_name + '</td>'
                            table_content += '<td>' + array_response[i].category + '</td>'
                            table_content += '<td><input type="button" value="Revive" onclick="reviveaccount(' + array_response[i].db_id + ')"><input type="button" value="Delete" onclick="deleteaccount(' + array_response[i].db_id + ')"></td>';
                            table_content += '</tr>';

                        }
                        //console.log(array_response);
                        document.getElementById("table_body").innerHTML = table_content;
                    }
                });
            }


        function reviveaccount(emp_dbid) {
            $('#currently_selecteduser_revive').val(emp_dbid);

            $('#reviveuserModal').modal('show');
            
        };



          $("#revivebtn_modal").click(function() {

                var db_id = $('#currently_selecteduser_revive').val();
                
               $.ajax({
                url: '<?php echo base_url(); ?>/revive-user',
                type: 'POST',
                data: {
                    db_id:db_id
            },
                error: function() {
                    alert('Something went wrong upon the data request.');
                },
                success: function(data) {
                    var array_response = JSON.parse(data);
                    alert(array_response);

                    if (array_response == "User Account revived") {
                        getArchiveUserAccounts();
                        $('#reviveuserModal').modal('hide');
                    }

                }
            });
            });
      

        
        function deleteaccount(emp_dbid) {
            $('#currently_selecteduser_delete').val(emp_dbid);

            $('#deleteuserModal').modal('show');
            
        };

        $("#deletebtn_modal").click(function() {

            var db_id = $('#currently_selecteduser_delete').val();

            $.ajax({
            url: '<?php echo base_url(); ?>/delete-user',
            type: 'POST',
            data: {
                db_id:db_id
            },
            error: function() {
                alert('Something went wrong upon the data request.');
            },
            success: function(data) {
                var array_response = JSON.parse(data);
                alert(array_response);

                if (array_response == "User Account deleted") {
                    getArchiveUserAccounts();
                    $('#deleteuserModal').modal('hide');
                }
            }
            });
        });

            


          







        

            // $("#editusermodal_archive").click(function() {

            //     var db_id = $('#accid_tobeedited').val();
                
            //     $.ajax({
            //         url: '<php echo base_url(); ?>/archive-user',
            //         type: 'POST',
            //         data: {
            //             db_id:db_id
            //     },
            //         error: function() {
            //             alert('Something went wrong upon the data request.');
            //         },
            //         success: function(data) {
            //             var array_response = JSON.parse(data);
            //             alert(array_response);

            //             if (array_response == "User Account archived") {
            //                 getActiveUserAccounts();
            //                 $('#editaccount_modal').modal('hide');

            //                 $('#edituser_idnumber').val("");
            //                 $('#edituser_surname').val("");
            //                 $('#edituser_fname').val("");
            //                 $('#edituser_category').val("Select");
            //             }

            //         }
            //     });
            // });

    

      
    </script>
</body>

</html>