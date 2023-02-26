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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../src/sweetalert2/dist/sweetalert2.min.css">
	<link href="../src/css/template-2.css" rel="stylesheet">
	<link href="../src/css/preloader.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<title>DILG</title>
</head>
<style>
	td{
		padding: 12px 0;
	}
</style>
<body>
  <div class="preload-wrapper">
    	<div class="text-light" role="status">
        	<span class="sr-only"><img src="../src/img/dilg.png" height="200px" alt=""></span>
    	</div>
    </div>
	<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<img src="../src/img/dilg.png" height="50" alt="">
					<span class="ms-3 align-middle">DILG</span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="index.php">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
                        </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="add-report.php">
                            <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">Compose</span>
                        </a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="reports.php">
                            <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Reports</span>
                        </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="ranking.php">
              <i class="align-middle" data-feather="award"></i> <span class="align-middle">Ranking</span>
            </a>
					</li>
					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="ranking.php">
              <i class="align-middle" data-feather="award"></i> <span class="align-middle">Ranking</span>
            </a> -->
					</li>
					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="register.php">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">New Account</span>
            </a>
					</li> -->
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                    <i class="align-self-center text-dark" data-feather="menu"></i>
                </a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<!-- template alert -->
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
							<?php
								  $query_notification_num = "SELECT * FROM reports  WHERE to_user = '1' AND notif_status = '0' ORDER BY report_id DESC ";
                                  // WHERE to_user = '1'
                                  $run_notification_num = mysqli_query($conn,$query_notification_num);
                                  $num_of_notifs = mysqli_num_rows($run_notification_num);

							?>
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator"><?php echo $num_of_notifs?></span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									<?= $num_of_notifs?> New Notifications
								</div>
								<div class="list-group">
									<?php
                    $query_reports = "SELECT from_user, report_id, subject, date_created, time_created FROM reports WHERE to_user = '1' AND notif_status = '0' ";
                    $run_reports = mysqli_query($conn,$query_reports);
										if(mysqli_num_rows($run_reports) > 0){
											foreach($run_reports as $row_reports){
												// $new_date = date('F d, Y G:i A', strtotime($row_reports['date_created'], $row_reports['time_created']));
												$newDate = date("F d, Y", strtotime($row_reports['date_created']));
												$newTime = date("G:i A", strtotime($row_reports['time_created']));
												?>
												<a class="list-group-item clickable-list" data-href="view-reports.php?report_id=<?php echo $row_reports['report_id']?>&from_user=<?php echo $row_reports['from_user']?>">
													<div class="row g-0 align-items-center">
														<div class="col-2">
															<i class="text-success" data-feather="mail"></i>
														</div>
														<div class="col-10">
															<div class="text-dark">
                                                            <?php echo $row_reports['from_user']?>
															</div>
															<div class="text-muted small mt-1 d-flex justify-content-between">
																<p class="p-0 m-0"><?php echo $row_reports['subject']?></p>
																<p class="p-0 m-0"><?= $newDate .' '.$newTime?></p>
															</div>
															<!-- <div class="text-muted small mt-1"></div> -->
														</div>
													</div>
												</a>
												<?php
											}
										}


										?>
								</div>
								<!-- <div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div> -->
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
							<?php

							$query_image = "SELECT first_name, last_name, image FROM users WHERE email = '$email'";
							$run_image = mysqli_query($conn,$query_image);

							if(mysqli_num_rows($run_image) > 0) {
							foreach($run_image as $row_image){
								?>
								<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                	<img src="<?php echo "../admin/admins/" . $row_image['image']?>" alt="user" class="avatar img-fluid rounded me-1"/> <span class="text-dark"><?= $row_image['first_name'] .' '. $row_image['last_name'] ?></span>
								</a>

								<?php
							}
							}


							?>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="profile.php"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

      <main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-lg-12">
                    <div class="row mt-4">
                      <?php
                        if(isset($_GET['report_id']) && isset($_GET['from_user'])){

                          $report_id = $_GET['report_id'];
                          $from_user = $_GET['from_user'];

                          $sql_report = "SELECT * FROM reports WHERE report_id = '$report_id' AND from_user = '$from_user'";
                          $run_report = mysqli_query($conn,$sql_report);

                          if(mysqli_num_rows($run_report) > 0){
                            foreach($run_report as $row){
                              ?>
                              <div class="card shadow p-5" style="border: none; border-radius: 0;">

                                  <form action="" method="POST" enctype="multipart/form-data">
                                    <span class="d-flex justify-content-between">
                                      <p>Report ID: <?php echo $row['report_id']?> </p>
                                      <p>Date: <?php echo $row['date_created']?></p>
                                    </span>
                                    <p class="p-0 m-0">To: <?php echo $row['to_user']?></p>
                                    <p class="p-0 m-0">From: <?php echo $row['from_user']?></p>
                                    <p class="p-0 m-0">Subject: <?php echo $row['subject']?></p>
                                    <p class="p-0 m-0">OPR: <?php echo $row['opr']?></p>
                                    <textarea name="message"  class="w-100" id="tiny">
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
                                          <input type="submit" class="btn btn-md btn-primary mt-2" name="submit" value="Acknowledge">
                                        <?php
                                      }

                                    ?>
                      

                                    
                                  </form>
                                </div>  
                              <?php

                            }


                                ?>

                                <?php
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
      <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-12 text-end">
							<p class="mb-0 text-muted">
								<strong>DILG</strong> &copy; 2023
							</p>
						</div>
					</div>
					</div>
				</div>
			</footer>

		</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="../src/js/template-2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="../src/js/preload.js"></script>
<script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="../src/js/notif-click.js"></script>

<!----pusher to ryan--->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src=" ../src/js/jquery-3.6.1.min.js"></script>

  <!-- <script src="../src/js/switch.js"> </script> -->
  <script>
    tinymce.init({
    selector: 'textarea#tiny',
    // width: 1000,
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
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
<script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="../src/js/preload.js"></script> -->

<!--pusher-RYAN--->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script> -->

<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('b66888c27162a9de31eb', {
    cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    // alert(JSON.stringify(data));
    //gawing ajax
    
    $.ajax({url: "demo_test.txt", success: function(result){
        $("#div1").html(result);
    }});
    
});
</script>
<script src="../src/js/notif-click.js"></script>
<!----end of pusher--->

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
    echo "<script>
              Swal.fire({
                  icon: 'success',
                  title: 'Acknowledged!',
              })
              </script>";
  }else{
    echo "error" . $conn->error;
    // view-reports.php?report_id=$report_id&from_user=$from_user';
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