<!DOCTYPE html>
<?php include('../connection.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
 $startTimeStamp = strtotime("2011-07-01");
 $endTimeStamp = strtotime("2011-07-17");
 
 $datePassReport = strtotime("2011-07-01");
 $timePass = abs($datePassReport - $startTimeStamp);
 $numberdays = $timePass/86400;
 echo "user pass report date: " . intval($numberdays) . "<br>";

 $timeDiff = abs($endTimeStamp - $startTimeStamp);
 
 $numberDays = $timeDiff/86400;  // 86400 seconds in one day
 
 // and you might want to convert to integer
 $numberDays = intval($numberDays);
 echo "Date range: " . $numberDays . "<br>";

 if($numberdays > $numberDays){
    echo "late";
 }else{
    echo "complete";
 }


    //  date_default_timezone_set('Asia/Manila');
    //  $date_time_created = date('Y-m-d');
    //  $date = 
 
 ?>
</body>
</html>