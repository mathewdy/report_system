<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

if (isset($_GET['report_id'])) {
    $report_id = $_GET['report_id'];

    if (empty($_GET['report_id'])) {    //lrn verification starts here
        echo "<script>alert('Report not found');
        window.location = 'sent-reports.php';</script>";
        exit();
    }

    // verify 

    $verify_report = "SELECT report_id FROM `sent` WHERE report_id = '$report_id'";
    $query_request = mysqli_query($conn, $verify_report) or die(mysqli_error($conn));
    if (mysqli_num_rows($query_request) == 0) {
        echo "
              <script type = 'text/javascript'>
              window.location = 'sent-reports.php';
              </script>";
        exit();
    } else {
        $delete_reports = "DELETE FROM `sent` WHERE report_id = '$report_id'";
        $run_delete = mysqli_query($conn, $delete_reports);
        if ($run_delete) {
            echo "<script>alert('Sucessfuly Delete');
        window.location = 'sent-reports.php';</script>";
            exit();
        }
    }
}
