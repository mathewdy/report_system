<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
$email = $_SESSION['email'];

if (isset($_POST['add'])) {

  $time = date("h:i:s", time());
  $date = date('y-m-d');

  $content = $_POST['content'];
  $content = mysqli_escape_string($conn, $content);


  $insert = "INSERT INTO `notes`(`email`, `content`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
    VALUES ('$email','$content','$date','$time','$date','$time')";

  $run_insert = mysqli_query($conn, $insert);

  if ($run_insert) {
    echo "<script>window.location.href='index.php'</script>";
  } else {
    $conn->error;
  }
}






?>