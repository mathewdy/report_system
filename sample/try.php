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
//  $startTimeStamp = strtotime("2011-07-01");
//  $endTimeStamp = strtotime("2011-07-17");
 
//  $datePassReport = strtotime("2011-07-01");
//  $timePass = abs($datePassReport - $startTimeStamp);
//  $numberdays = $timePass/86400;
//  echo "user pass report date: " . intval($numberdays) . "<br>";

//  $timeDiff = abs($endTimeStamp - $startTimeStamp);
 
//  $numberDays = $timeDiff/86400;  // 86400 seconds in one day
 
//  // and you might want to convert to integer
//  $numberDays = intval($numberDays);
//  echo "Date range: " . $numberDays . "<br>";

//  if($numberdays > $numberDays){
//     echo "late";
//  }else{
//     echo "complete";
//  }


    //  date_default_timezone_set('Asia/Manila');
    //  $date_time_created = date('Y-m-d');
    //  $date = 


$date_start = date('Y-m-d h:i', strtotime("2011-07-01"));
$date_end = date('Y-m-d h:i', strtotime("2011-10-17"));

  $date_new_start = new DateTime($date_start);
  $date_new_end = new DateTime($date_end);

  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  echo $days = intval($diff);

  // print_r($date_start);
  // print_r($date_end);



  if ($days == 1 || $days == 0) {
    echo $duration = "Daily";
  } elseif ($days == 2 || $days <= 7) {
   echo $duration = "Weekly";
  } elseif ($days == 8 || $days <= 14) {
   echo $duration = "Bi-weekly";
  } elseif ($days == 30) {
   echo $duration = "Monthly";
  } elseif ($days == 90) {
   echo $duration = "Quarterly";
  } elseif ($days >= 180) {
   echo $duration = "Semestral";
  } elseif ($days == 365) {
   echo $duration = "Annualy";
  }
 
 ?>
</body>
</html>