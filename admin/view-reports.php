<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('images.php');
include('session.php');
$email = $_SESSION['email'];

// $user_id = $_SESSION['user_id'];


if (isset($_GET['rid'])) {
  // Store the cipher method
  $ciphering = "AES-128-CTR";
  $options = 0;
  // Non-NULL Initialization Vector for decryption
  $decryption_iv = '1234567891011121';

  // Store the decryption key
  $decryption_key = "TeamAgnat";

  // Use openssl_decrypt() function to decrypt the data
  $report_id = openssl_decrypt(
    $_GET['rid'],
    $ciphering,
    $decryption_key,
    $options,
    $decryption_iv
  );
  // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
  //   $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
  //   $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
  // }



  $verify_report = "SELECT report_id FROM `reports` WHERE report_id = '$report_id'";
  $query_request = mysqli_query($conn, $verify_report) or die(mysqli_error($conn));
  if (mysqli_num_rows($query_request) == 0) {
    echo "
              <script type = 'text/javascript'>
              window.location = 'reports.php';
              </script>";
    exit();
  }
}
$report_link = "add-report.php";
$view_link = "reports.php";
$draft_link = "draft.php";
$note_link = "add-note.php";
$ranking = "ranking.php";
$registration = "registration.php";



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
  <!-- eto yung mga nadagdag -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../src/css/preloader.css">
  <title>Report</title>
</head>
<style>
  .focus {
    border: none;
  }

  body {
    overflow-x: hidden;
  }

  .active {
    background: rgba(255, 255, 255, 0.3) !important;
  }
</style>

<body>
  <div class="preload-wrapper">
    <div class="spinner-border text-info" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  <main class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; min-height: 100vh;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="../src/img/dilg.png" height="80" alt="">
        <span class="fs-4 ps-3">DILG</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link text-white">
            <i class="bi bi-house-door me-2"></i>
            Home
          </a>
        </li>
        <li>
          <a href="<?php echo $report_link ?>" class="nav-link text-white">
            <i class="bi bi-clipboard me-2"></i>
            New Report
          </a>
        </li>
        <li>
          <a href="<?php echo $view_link ?>" class="nav-link text-white active" aria-current="page">
            <i class="bi bi-book-half me-2"></i>
            View Reports
          </a>
        </li>
        <!-- <li>
          <a href="<?php echo $draft_link ?>" class="nav-link text-white">
            <i class="bi bi-archive me-2"></i>
            Drafts
          </a>
        </li> -->
        <li>
          <a href="<?php echo $ranking ?>" class="nav-link text-white">
            <i class="bi bi-award me-2"></i>
            Ranking
          </a>
        </li>
        <!-- <li>
          <a href="<?php echo $registration ?>" class="nav-link text-white">
            <i class="bi bi-award me-2"></i>
            Register Account
          </a>
        </li> -->
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
          $sql_admin = "SELECT * FROM users WHERE email = '$email'";
          $query_admin = mysqli_query($conn, $sql_admin);
          $admin_row = mysqli_fetch_array($query_admin);
          ?>
          <img src="<?php if (empty($admin_row['image'])) {
                      echo '../src/img/avatar.svg';
                    } else {
                      echo 'admins/' . $admin_row['image'];
                    } ?>" alt="" width="32" height="32" class="rounded-circle me-2">
          <?= $admin_row['first_name'] . ' ' . $admin_row['last_name'] ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>
    <div class="container-fluid p-0">
      <nav class="navbar bg-dark navbar-dark">
        <div class="container">
          <a class="navbar-brand ms-auto" href="#"><i class="bi bi-bell-fill"></i></a>
        </div>
      </nav>
      <div class="card shadow p-5" style="border: none; min-height: 35rem;">

      <?php


        if(isset($_GET['report_id']) && isset($_GET['from_user'])){

          $report_id = $_GET['report_id'];
          $from_user = $_GET['from_user'];

          $sql_report = "SELECT * FROM reports WHERE report_id = '$report_id' AND from_user = '$from_user'";
          $run_report = mysqli_query($conn,$sql_report);

          if(mysqli_num_rows($run_report) > 0){
            foreach($run_report as $row){
              ?>

                  <form action="" method="POST" enctype="multipart/form-data">

                    <label for="">Report ID: <?php echo $row['report_id']?> </label>
                    <label for="">Date: <?php echo $row['date_created']?></label>
                    <label for="">To: <?php echo $row['to_user']?></label>
                    <label for="">From: <?php echo $row['from_user']?></label>
                    <label for="">Subject: <?php echo $row['subject']?></label>
                    <label for="">OPR: <?php echo $row['opr']?></label>
                    <textarea name="message"  id="tiny">
                      <?php echo $row['message']?> 
                    </textarea>

                    <!----dates mula sa database--->
                    <input type="hidden" name="date_start" value="<?php echo $row['date_start']?>">
                    <input type="hidden" name="date_end" value="<?php echo $row['date_end']?>">
                    <input type="hidden" name="from_user" value="<?php echo $row['from_user']?>">
                    <input type="hidden" name="report_id" value="<?php echo $row['report_id']?>">

                    <?php


                      if($row['notif_status'] == '1'){
                        echo "<span>Acknowledged </span>";
                      }else{
                        ?>
                          <input type="submit" name="submit" value="Acknowledge">
                        <?php
                      }

                    ?>

                    
                  </form>
              <?php

            }


                
            }
            ?>

              <small>Files attached:</small>

            <?php

            // mamayaagawan ko nanaman to ng isset
            $sql_file = "SELECT * FROM files WHERE report_id = '$report_id' AND barangay = '$from_user'";
            $run_file = mysqli_query($conn,$sql_file);
            if(mysqli_num_rows($run_file) > 0){
              foreach($run_file as $row_file){
                ?>
                    <a href="../users/files/<?php echo $row_file['file_name'];?>" download><?php echo $row_file['file_name'];?></a>

                <?php
              }

            }
          ?>
          <span class="d-flex justify-content-end">

          <?php
        }

      ?>

                      
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

  <script src=" ../src/js/jquery-3.6.1.min.js"></script>

  <script src="../src/js/table.click.js"></script>
  <script src="../src/js/preload.js"></script>
  <!-- <script src="../src/js/switch.js"> </script> -->
  <script>
    tinymce.init({
    selector: 'textarea#tiny',
    width: 1000,
    height: 300,
    readonly: true,
    plugins:[
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | removeformat | code table help | save | restoredraft',
    menu: {
        favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
  
  });
</script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {

  //current date and time
	date_default_timezone_set('Asia/Manila');
	$time = date("h:i:s", time());
	$date = date('y-m-d');
  $report_id = $_POST['report_id'];
  $from_user = $_POST['from_user'];


 
  // // madedetermine kung anong type of report to 

	// if($_POST['date_start'] < $date){
	// 	$status =  "1";
	// }elseif($_POST['date_end'] > $date){
	// 	$status = "4";
	// }else{
	// 	$status = "3";
	// }

  $update = "UPDATE reports SET date_time_acknowledge = '$date $time' , notif_status = '1' WHERE report_id = '$report_id' AND  from_user = '$from_user'";
  $run_update = mysqli_query($conn,$update);

  if($run_update) {
    echo "updated // acknowledged";
  }else{
    echo "error" . $conn->error;
  }

  


  // $time = date("h:i:s", time());
  // $date = date('y-m-d');


  // $from = $_POST['from'];
  // $from = mysqli_escape_string($conn, $from);

  // $to = $_POST['to'];
  // $to = mysqli_escape_string($conn, $to);

  // $subject = $_POST['subject'];
  // $subject = mysqli_escape_string($conn, $subject);

  // $opr = $_POST['opr'];
  // $opr = mysqli_escape_string($conn, $opr);

  // $statement = $_POST['statement'];
  // $statement = mysqli_escape_string($conn, $statement);


  // // $brgy = $_POST['brgy'];
  // // $brgy = mysqli_escape_string($conn, $brgy);


  // $time = date("h:i:s", time());
  // $date = date('y-m-d');

  // // $date_start = date('Y-m-d h:i:s', strtotime($_POST['date_start']));
  // // $date_end = date('Y-m-d h:i:s', strtotime($_POST['date_end']));
  // $today = date("Y-m-d H:i:s");

  // $date_new_start = new DateTime($date . " ".  $time);
  // $date_new_end = new DateTime($date_end);

  // $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  // $days = intval($diff);


  // $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  // $days = intval($diff);
  
  // if ($days == 1 || $days == 0) {
  //   echo $duration = "Daily";
  // } elseif ($days >= 2 && $days <= 7) {
  //  echo $duration = "Weekly";
  // } elseif ($days >= 8 && $days <= 14) {
  //  echo $duration = "Bi-weekly";
  // } elseif ($days >= 15 && $days <= 29) {
  //  echo $duration = "Bi-Weekly";
  // }elseif($days >= 30 && $days <= 31){
  //   echo $duration = "Monthly";
  // }elseif($days >= 32 && $days <= 89){
  //   echo $duration = 'Monthly';
  // }elseif ($days >= 90 && $days <= 179) {
  //  echo $duration = "Quarterly";
  // } elseif ($days >= 180 && $days <= 364) {
  //  echo $duration = "Semestral";
  // } elseif ($days == 365) {
  //  echo $duration = "Annualy";
  // }

  
  // $check_opr = "SELECT * FROM reports WHERE opr = '$opr' and to_user = '$from'";
  // $query_check_opr = mysqli_query($conn, $check_opr);
  // if(mysqli_num_rows($query_check_opr) > 0){
  //   $rows = mysqli_fetch_array($query_check_opr);
  //   $date_start = strtotime($rows['date_start']);

  //   $daydiff = abs($date_submitted - $date_start);
  //   $numberdays = $daydiff/86400;

  //   if($date_submitted > $date_start){
  //     // admin
  //     $acknowledge_report = "UPDATE reports SET notif_status = '1', status = '1', duration = '$duration', date_end = '$date_end', deadline = '$days', date_time_acknowledge ='$today' WHERE to_user = '1' and opr = '$opr'";
  //     $run_acknowledge_report = mysqli_query($conn,$acknowledge_report);
  //     if($run_acknowledge_report == true){
  //       // user
  //       $run_report = "UPDATE reports SET notif_status = '1', status = '1', duration = '$duration', date_end = '$date_end', deadline = '$days', date_time_acknowledge ='$today' WHERE to_user = '$from' and opr = '$opr'";
  //       $query_run_report = mysqli_query($conn,$run_report);
  //       if($query_run_report == true){
  //         // echo "<script>alert('Report Updated')</script>";
  //         // echo "if updated";
  //       }else{
  //         echo $conn->error;
  //       }
  //     }else{
  //       echo $conn->error;
  //     }
  //   }
  // }
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

  // $acknowledge_report = "UPDATE reports SET status = '1', duration = '$duration', date_end = '$date_end', deadline = '$days' WHERE report_id = '$report_id'";
  // $run_acknowledge_report = mysqli_query($conn,$acknowledge_report);

//   if($run_acknowledge_report){
//     echo "<script>Alert('Updated') </script>";
//   }else{
//     echo "error" . $conn->error;
//   }


  // // $insert_report = "UPDATE `reports` SET `from_user`='$from',`to_user`='$to',`barangay`='$brgy',`subject`='$subject',`opr`='$opr',`message`='$statement',`duration`='$duration',`status`='$status',`notif_status`='0',`date_start`='$date_start',`date_end`='$date_end',`deadline`='$days',`date_updated`='$date',`time_updated`='$time' WHERE report_id = '$report_id' ";
  // // $run_insert_report = mysqli_query($conn, $insert_report);



  // if ($run_insert_report) {
  //   echo "<script>alert('Success update')</script>";
  // } else {
  //   $conn->error;
  // }
}

?>