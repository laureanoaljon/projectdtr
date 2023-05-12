<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>DTR Form</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

  </head>
  <body>
    <div>
        <div >
            <div style="text-align: center;">
                <h3>DTR Form</h3>
                <p><b>Month:</b> <u><?php echo date('F', strtotime("{$year}-{$month}")); ?></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Year:</b> <u><?php echo $year; ?></u></p>
                <p style="text-align: left !important;"><b>Name:</b> <u><?php echo $first_name. ' ' . $last_name; ?></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Employee Id:</b> <u><?php echo $employee_id; ?></u></p>
            </div>
            <div>
                <div>
                    <!-- Table -->
                    <table class="table table-bordered border-dark" style="width: 700px; background-color: #fff; border: 1px solid black; border-collapse: collapse;">
                        <thead style="background-color: #D3D3D3;">
                        <tr>
                            <th scope="col" rowspan="2" style="width: 7%; text-align: center; vertical-align: middle;">Date</th>
                            <th scope="col" colspan="2" style="text-align: center; vertical-align: middle;">Morning</th>
                            <th scope="col" colspan="2" style="text-align: center; vertical-align: middle;">Afternoon</th>
                            <th scope="col" rowspan="2" style="width: 10%; text-align: center; vertical-align: middle;">Day</th>
                        </tr>
                        <tr>
                            <th scope="col" style="width: 15%; text-align: center; vertical-align: middle;">Time-in</th>
                            <th scope="col" style="width: 15%; text-align: center; vertical-align: middle;">Time-out</th>
                            <th scope="col" style="width: 15%; text-align: center; vertical-align: middle;">Time-in</th>
                            <th scope="col" style="width: 15%; text-align: center; vertical-align: middle;">Time-out</th>
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
                                    <th scope="row" style="text-align: center;"><?php echo $x; ?></th>
                                    <td style="text-align: center;"><?php if (!empty($time_records[$y]['am_time_in'])) { echo date('h:i A',strtotime($time_records[$y]['am_time_in'])); } ?></td>
                                    <td style="text-align: center;"><?php if (!empty($time_records[$y]['am_time_out'])) { echo date('h:i A',strtotime($time_records[$y]['am_time_out'])); } ?></td>
                                    <td style="text-align: center;"><?php if (!empty($time_records[$y]['pm_time_in'])) { echo date('h:i A',strtotime($time_records[$y]['pm_time_in'])); }  ?></td>
                                    <td style="text-align: center;"><?php if (!empty($time_records[$y]['pm_time_out'])) { echo date('h:i A',strtotime($time_records[$y]['pm_time_out'])); } ?></td>
                                    <td style="text-align: center;"><?php echo $day; ?></td>
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
                                    <th scope="row" style="text-align: center;"><?php echo $x; ?></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center";><?php echo $day; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <div style="text-align: center;"> 
                <p>________________________________</p>
                <p><b>Signature over printed name</b></p>
            </div>
        </div>
    </div>
  </body>
</html>