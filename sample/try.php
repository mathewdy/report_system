
<?php include('../connection.php');?>

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


     date_default_timezone_set('Asia/Manila');
     $date_time_created = date('Y-m-d');
     $date = 


$date_start = date('Y-m-d h:i', strtotime("2023-07-01"));
$date_end = date('Y-m-d h:i', strtotime("2023-07-17"));

  $date_new_start = new DateTime($date_start);
  $date_new_end = new DateTime($date_end);

  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  echo $days = intval($diff);

  print_r($date_start) . "<br>";

  print_r($date_end);

  $days = 157;

  if ($days == 1 || $days == 0) {
    echo $duration = "Daily";
  } elseif ($days >= 2 && $days <= 7) {
   echo $duration = "Weekly";
  } elseif ($days >= 8 && $days <= 14) {
   echo $duration = "Bi-weekly";
  } elseif ($days >= 15 && $days <= 29) {
   echo $duration = "Bi-Weekly";
  }elseif($days >= 30 && $days <= 31){
    echo $duration = "Monthly";
  }elseif($days >= 32 && $days <= 89){
    echo $duration = 'Monthly';
  }elseif ($days >= 90 && $days <= 179) {
   echo $duration = "Quarterly";
  } elseif ($days >= 180 && $days <= 364) {
   echo $duration = "Semestral";
  } elseif ($days == 365) {
   echo $duration = "Annualy";
  }

  // $sql = "INSERT INTO sample (duration) VALUES ('$duration') ";
  // $run = mysqli_query($conn,$sql);

  // if($run === TRUE){
  //   echo "inserted";
  // }else{
  //   echo "error";
  // }
 
 ?>
</body>
</html>