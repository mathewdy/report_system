<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login admin</title>
</head>

<body>
  <a href="add-report.php">Add Report</a>
  <a href="logout.php">Log Out</a>
</body>

</html>