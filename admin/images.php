<?php
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
$email = $_SESSION['email'];


$image_data = "SELECT * FROM `users` WHERE email = '$email'";
$run_image_data = mysqli_query($conn, $image_data);
$images = mysqli_fetch_array($run_image_data);
