<?php

include('../connection.php');
session_start();
include('session.php');
ob_start();


if (isset($_GET['status']) && isset($_GET['user_id']) && isset($_GET['report_id'])) {

    $query = "DELETE FROM `reports` WHERE report_id = '$report_id' AND status = '2'";
    $run_query = mysqli_query($conn, $query);

    if ($run_query) {
        echo "<script>alert('Sucessfuly Delete');
        window.location = 'drafts.php';</script>";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>

</body>

</html>