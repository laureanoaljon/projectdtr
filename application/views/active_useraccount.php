<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Active User Accounts</title>
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
                        <?php if ($category != "employee") { ?>
                            <a class="w-100 mr-2 text-white text-left" href="<?php echo base_url(); ?>EmployeeDTR/index" role="button">Employee DTR</a>
                            <a class="w-100 mr-2 text-white text-left" href="#" role="button">Employee DTR Analytics</a>
                            <a class="w-100 active mr-2 text-white text-left" href="<?php echo base_url(); ?>ActiveUserAccount/index" role="button">Active User Accounts</a>
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
                <div class="modal fade" id="newaccount_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">NEW USER ACCOUNT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form method="post" id="upload_form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-4">

                                            <!-- <label for="dpupload_input" style="cursor: pointer;">Change</label> -->
                                            <!-- style="opacity: 0; position: absolute; z-index: -1;" -->
                                            <?php
                                            if (isset($error)) {
                                                echo $error;
                                            }
                                            ?>
                                            <!-- <input class="form-control" type="file" name="image" id="dpupload_input" size="33"> -->
                                            <div id="divMsg" class="alert alert-success" style="display: none">
                                                <span id="msg"></span>
                                            </div>
                                            <img id="blah" src="<?php echo base_url(); ?>/assets/user.png" alt="Girl in a jacket">

                                            <input type="file" name="image_file" multiple="true" accept="image/*" id="finput" onchange="readURL(this);" style="width: 100px;"></br></br>

                                            <div class="col-md-5"></div>
                                        </div>

                                        <div class="col-8">
                                            <div class="row mb-2">
                                                <p class="mr-2">ID-Number: </p>
                                                <input type="text" name="newuser_idnumber" id="newuser_idnumber">
                                            </div>
                                            <div class="row mb-2">
                                                <p class="mr-2">Surname: </p>
                                                <input type="text" name="newuser_surname" id="newuser_surname">
                                            </div>
                                            <div class="row mb-2">
                                                <p class="mr-2">First Name: </p>
                                                <input type="text" name="newuser_fname" id="newuser_fname">
                                            </div>
                                            <div class="row mb-2">
                                                <p class="mr-2">Category: </p>
                                                <select id="newuser_category" name="newuser_category" class="border rounded pass-label">
                                                    <option value="Select">Select Category</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="office-head">Office Head</option>
                                                    <option value="hr-personnel">HR Personnel</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                </form>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="newusermodal_save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Modal -->
                <div class="modal fade" id="editaccount_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">EDIT USER ACCOUNT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="<?php echo base_url(); ?>/assets/user.png" alt="Girl in a jacket">
                                        <button class="btn btn-secondary" type="button">Change</button>
                                    </div>

                                    <div class="col-8">
                                        <input type="hidden" id="accid_tobeedited">
                                        <div class="row mb-2">
                                            <p class="mr-2">ID-Number: </p>
                                            <input type="text" name="" id="edituser_idnumber">
                                        </div>
                                        <div class="row mb-2">
                                            <p class="mr-2">Surname: </p>
                                            <input type="text" name="" id="edituser_surname">
                                        </div>
                                        <div class="row mb-2">
                                            <p class="mr-2">First Name: </p>
                                            <input type="text" name="" id="edituser_fname">
                                        </div>
                                        <div class="row mb-2">
                                            <p class="mr-2">Category: </p>
                                            <select id="edituser_category" name="" class="border rounded pass-label">
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
                                <button type="button" class="btn btn-primary" id="editusermodal_archive">Archive</button>
                                <button type="button" class="btn btn-primary" id="editusermodal_save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="col-md-10 ml-3 mt-2">
                        <h1 style="color: gray; font-size: 32px;">Active User Accounts</h1>
                    </div>
                </div>

                <div class="row">
                    <button class="btn btn-secondary ml-5 mt-5" type="button" id="loginBtn" data-toggle="modal" data-target="#newaccount_modal">New</button>
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
                                        foreach ($activeAccounts_data as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row_number . "</td>";
                                            echo "<td>" . $row->employee_id . "</td>";
                                            echo "<td>" . $row->s_name . "</td>";
                                            echo "<td>" . $row->f_name . "</td>";
                                            echo "<td>" . $row->category . "</td>";
                                            echo "<td><input class='mr-2' type='button' value='Edit' onclick='editaccount(" . $row->db_id . ")'><input type='button' value='Manage Face Recognition' onclick='manageFaceReco(" . $row->db_id . ")'></td>";
                                            echo "</tr>";
                                            $row_number++;
                                        }
                                        ?>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>js/chart.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script>
    <script>
        var sidebarjs = new SidebarJS.SidebarElement();


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function editaccount(emp_dbid) {

            $('#accid_tobeedited').val(emp_dbid);


            //getaccount data
            $.ajax({
                url: '<?php echo base_url(); ?>/get-accountdata',
                type: 'POST',
                data: {
                    emp_dbid: emp_dbid
                },
                error: function() {
                    alert('Something went wrong upon the data request.');
                },
                success: function(data) {
                    var array_response = JSON.parse(data);
                    //console.log(array_response);

                    $('#edituser_idnumber').val(array_response.employee_id);
                    $('#edituser_surname').val(array_response.s_name);
                    $('#edituser_fname').val(array_response.f_name);
                    $('#edituser_category').val(array_response.category);
                    $("#editaccount_modal").modal()
                }
            });
        }

        $(document).ready(function() {


            function getActiveUserAccounts() {
                $.ajax({
                    url: '<?php echo base_url(); ?>/get-activeaccounts',
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
                            table_content += '<td><input class="mr-2" type="button" value="Edit" onclick="editaccount(' + array_response[i].db_id + ')"><input type="button" value="Manage Face Recognition" onclick="manageFaceReco(' + array_response[i].db_id + ')"></td>';
                            table_content += '</tr>';

                        }
                        //console.log(array_response);
                        document.getElementById("table_body").innerHTML = table_content;
                    }
                });
            }


            function saveNewUserAccount() {

                var idnumber = $('#newuser_idnumber').val();
                var sname = $('#newuser_surname').val();
                var fname = $('#newuser_fname').val();
                var cat = $('#newuser_category').val();
                var dp = $('#dpupload_input').val();
                var pw = idnumber + "!" + sname;

                $.ajax({
                    url: '<?php echo base_url(); ?>/insert-newuserdata',
                    type: 'POST',
                    data: {
                        idnumber: idnumber,
                        sname: sname,
                        fname: fname,
                        cat: cat,
                        pw: pw,
                        dp: dp
                    },
                    error: function() {
                        alert('Something went wrong upon the data request.');
                    },
                    success: function(data) {
                        var array_response = JSON.parse(data);
                        alert(array_response);

                        if (array_response == "New User Account created") {
                            getActiveUserAccounts();
                            $('#newaccount_modal').modal('hide');

                            $('#newuser_idnumber').val("");
                            $('#newuser_surname').val("");
                            $('#newuser_fname').val("");
                            $('#newuser_category').val("Select");
                        }

                    }
                });
            }


            $("#newusermodal_save").click(function() {
                 saveNewUserAccount();
                //document.getElementById("upload_form").submit();
            });




            $('#upload_form').on('submit', function(e) {
                
                e.preventDefault();
                //    if($('#image_file').val() == '')  
                //    {  
                //         alert("Please Select the File");  
                //    }  
                //    else 
                //    {  
                $.ajax({
                    url: "<?php echo base_url(); ?>/insert-newuserdata",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(res) {
                        alert(res);
                        //console.log(res.success);
                        // if(res.success == true){
                        //  //$('#blah').attr('src','//www.tutsmake.com/ajax-image-upload-with-preview-in-codeigniter/');   
                        //  $('#msg').html(res.msg);   
                        //  $('#divMsg').show();   
                        // }
                        // else if(res.success == false){
                        //   $('#msg').html(res.msg); 
                        //   $('#divMsg').show(); 
                        // }
                        // setTimeout(function(){
                        //  $('#msg').html('');
                        //  $('#divMsg').hide(); 
                        // }, 3000);
                    }
                });
                // }  
            });







            function saveEditedUserAccount() {

                var db_id = $('#accid_tobeedited').val();
                var idnumber = $('#edituser_idnumber').val();
                var sname = $('#edituser_surname').val();
                var fname = $('#edituser_fname').val();
                var cat = $('#edituser_category').val();

                $.ajax({
                    url: '<?php echo base_url(); ?>/edit-userdata',
                    type: 'POST',
                    data: {
                        db_id: db_id,
                        idnumber: idnumber,
                        sname: sname,
                        fname: fname,
                        cat: cat
                    },
                    error: function() {
                        alert('Something went wrong upon the data request.');
                    },
                    success: function(data) {
                        var array_response = JSON.parse(data);
                        alert(array_response);

                        if (array_response == "User Account edited") {
                            getActiveUserAccounts();
                            $('#editaccount_modal').modal('hide');

                            $('#edituser_idnumber').val("");
                            $('#edituser_surname').val("");
                            $('#edituser_fname').val("");
                            $('#edituser_category').val("Select");
                        }

                    }
                });
            }

            $("#editusermodal_save").click(function() {
                saveEditedUserAccount();
            });

            $("#editusermodal_archive").click(function() {

                var db_id = $('#accid_tobeedited').val();

                $.ajax({
                    url: '<?php echo base_url(); ?>/archive-user',
                    type: 'POST',
                    data: {
                        db_id: db_id
                    },
                    error: function() {
                        alert('Something went wrong upon the data request.');
                    },
                    success: function(data) {
                        var array_response = JSON.parse(data);
                        alert(array_response);

                        if (array_response == "User Account archived") {
                            getActiveUserAccounts();
                            $('#editaccount_modal').modal('hide');

                            $('#edituser_idnumber').val("");
                            $('#edituser_surname').val("");
                            $('#edituser_fname').val("");
                            $('#edituser_category').val("Select");
                        }

                    }
                });
            });

        });
    </script>
</body>

</html>