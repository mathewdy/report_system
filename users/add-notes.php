<?php

ob_start();
include('../connection.php');
session_start();
include('session.php');
$user_id = $_SESSION['user_id'];

if (isset($_POST['add'])) {

    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $content = $_POST['content'];
    $content = mysqli_escape_string($conn, $content);


    $insert = "INSERT INTO `notes`(`user_id`, `content`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
    VALUES ('$user_id','$content','$date','$time','$date','$time')";

    $run_insert = mysqli_query($conn, $insert);

    if ($run_insert) {
        echo "<script>window.location.href='home.php' </script>";
    } else {
        $conn->error;
    }
}






?>