<?php

ob_start();
include('../connection.php');
session_start();


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
    <a href="logout.php">Log out</a>
    <!--dashboard siguro to haha ewan-->
    <h2>Dashboard</h2>
    <!---dito makikita ung report galing sa DILG-->
    <a href="">Inbox</a>
    <!----gagawa sya dito ng report---->
    <a href="add-report.php">Create Report</a>
    
</body>
</html>

<?php

ob_end_flush();

?>