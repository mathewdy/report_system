<?php
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

if (isset($_POST['update'])) {

  if (isset($_POST['hidden'])) {
    $note_id = $_POST['hidden'];
    $statement = $_POST['tiny'];

    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $update = "UPDATE `notes` SET `content`='$statement',`date_updated`='$date',`time_updated`='$time' WHERE id = '$note_id'";
    $run_update = mysqli_query($conn, $update);

    if ($run_update) {
      echo "<script>window.location.href='home.php' </script>";
    }
  }
}
