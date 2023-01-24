<?php
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

$user_id = $_SESSION['user_id'];

$image_data = "SELECT * FROM `users` WHERE user_id = '$user_id'";
$run_image_data = mysqli_query($conn, $image_data);
$images = mysqli_fetch_array($run_image_data);
