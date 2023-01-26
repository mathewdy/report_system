<?php
include("../connection.php");
date_default_timezone_set('Asia/Manila');

$user_id = "ADM00001";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="" method="post" enctype="multipart/form-data">
        Generate deadline report

        <label for="">To:</label>
        <input type="text" id="search_data" class="w-100 brgy" style="border:none; outline:none;" placeholder="" autocomplete="off" class="form-control input-lg" name="to" />

        <label for="">Date Start</label>
        <input type="date" name="date_start">
        <label for="">Date End</label>
        <input type="date" name="date_end">

        <input type="submit" name="submit" value="submit">

        <!-- delete of page -->

    </form>


</body>

</html>



<?php

if (isset($_POST['submit'])) {

    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $date_start = date('Y-m-d', strtotime($_POST['date_start']));
    $date_end = date('Y-m-d', strtotime($_POST['date_end']));

    $to = $_POST['to'];
    $to = mysqli_escape_string($conn, $to);


    $date_new_start = new DateTime($date_start);
    $date_new_end = new DateTime($date_end);




    $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
    $days = intval($diff);







    $status = 4;


    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);
    if (mysqli_num_rows($run_validate_report) > 0) {

        foreach ($run_validate_report as $row) {
            $report_id = $row['report_id'];
            $get_number = str_replace("RID", "", $report_id);
            $id_increment = $get_number + 1;
            $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

            $report_id = "RID" . $get_string;

            //insert a query
            $insert_report = "INSERT INTO `reports`(`to_user`,`user_id`, `report_id`,  `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
            VALUES ('$to','$user_id','$report_id','$status','$date_start','$date_end','$days','$days','$time','$date','$time')";
            $run_insert_report = mysqli_query($conn, $insert_report);

            if ($run_insert_report) {
                echo "sucess";
            } else {
                $conn->error;
            }
        }
    } else {

        $report_id = "RID00001";

        //insert a query
        $insert_report = "INSERT INTO `reports`(`to_user`,`user_id`, `report_id`,  `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
            VALUES ('$to','$user_id','$report_id','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
            echo "sucess";
        } else {
            $conn->error;
        }
    }
}
?>