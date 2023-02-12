<?php
include('../connection.php');
date_default_timezone_set('Asia/Manila');
session_start();
ob_start();
$email = $_SESSION['email'];
$barangay = $_SESSION['barangay'];
// error_reporting(E_ERROR | E_PARSE);




//mula sa barangay papunta sa DILG 
// mag pull kayo sa database
// to_user == DILG ADMIN
// from_user == BARANGAY
// so ayusin mo na lang query sa may INSERT sa baba, apat yun ikaw na bahala sundan mo na lang yung structure sa DB

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="../src/css/template-2.css" rel="stylesheet">
	<link href="../src/css/preloader.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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
	.token-input{
		border: none !important;
		outline: none !important;
	}
	.tox{
		border-radius: 0 !important;
	}
</style>
<body>
  <!-- <div class="preload-wrapper">
    	<div class="spinner-grow text-info" role="status">
        	<span class="sr-only">Loading...</span>
    	</div>
    </div> -->
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
						<a class="sidebar-link" href="home.php">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
                        </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="view-report.php">
                            <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Inbox</span>
                        </a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="add-report.php">
                            <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">Compose</span>
                        </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="sent-reports.php">
                            <i class="align-middle" data-feather="send"></i> <span class="align-middle">Sent</span>
                        </a>
					</li>
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
          <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
							<?php
								$query_number_notif = "SELECT * FROM reports WHERE to_user = '$barangay' AND notif_status = '0' ";
								$run_number_notif = mysqli_query($conn,$query_number_notif);
								$num_of_notifs = mysqli_num_rows($run_number_notif);

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
										// query ko naman lahat ngsinend sakin na info
										// from_user, subject,date, time
										$query_reports = "SELECT from_user, subject, date_created, time_created FROM reports WHERE to_user = '$barangay' ";
										$run_reports = mysqli_query($conn,$query_reports);

										if(mysqli_num_rows($run_reports) > 0){
											foreach($run_reports as $row_reports){
												// $new_date = date('F d, Y G:i A', strtotime($row_reports['date_created'], $row_reports['time_created']));
												$newDate = date("F d, Y", strtotime($row_reports['date_created']));
												$newTime = date("G:i A", strtotime($row_reports['time_created']));
												?>
												<a class="list-group-item">
													<div class="row g-0 align-items-center">
														<div class="col-2">
															<i class="text-success" data-feather="mail"></i>
														</div>
														<div class="col-10">
															<div class="text-dark">
																<?php 
																	if($row_reports['from_user'] == "1"){
																		echo "DILG Admin";
																	}	
																?>
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
									<?php
										$query_email = "SELECT email , barangay FROM users WHERE email = '$email'";
										$run_email = mysqli_query($conn, $query_email);
										$row_email = mysqli_fetch_array($run_email);
									?>
									<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
										<span class="d-flex mb-3">
										<div class="row w-100 d-flex justify-content-end" >
											<!-- <div class="col-lg-6 text-end"> -->
											<!-- <<label for="">Date Start:</label>
											<input type="datetime-local" class="form-control w-100" name="date_start">
											</div> -->
											
											<div class="col-lg-12 d-flex align-items-center mb-2">
												<label for=>From:</label>
												<input type="text" class="form-control py-1 w-100 ms-2" name="from" value="Brgy. <?php echo $row_email['barangay'] ?>" readonly>
											</div>
											<!-- <div class="col-lg-12 d-flex align-items-center mb-2">
												<label style="margin-right: 12px;" for="">To:</label>
												<input type="text" id="search_data" name="to" class="w-100 brgy ms-2" style="border:none; outline:none;" />
											</div>
											<div class="col-lg-12 d-flex align-items-center mb-2">
												<label for="">Barangay:</label>
												<input type="text" id="brgy" name="brgy" class="w-100 brgy ms-2" style="border:none !important; outline:none !important;" />
												<span class="d-flex align-items-center">
												</span>
											</div> -->
											<div class="col-lg-12 d-flex align-items-center mb-2">
												<label for="">Subject:</label>
												<input type="text" class="form-control w-100 ms-2" name="subject">
											</div>
											<div class="col-lg-12 d-flex align-items-center mb-2">
												<label for="">OPR:</label>
												<input type="text" id="opr" class="form-control w-100 ms-2" name="opr">
											</div>
											<div class="col-lg-12">
												<textarea id="tiny" name="statement"> </textarea>
											</div>
											<div class="col-lg-12 mb-2">
                      <input type="file" class="form-control mt-2" name="pdf_file[]" id="" multiple="multiple" />
                      <!-- accept="application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword" -->
											</div>
											<div class="col-lg-12 text-end">
                        <a href="home.php" class="btn btn-danger btn-md">Cancel</a>
												<input type="submit" class="btn btn-primary btn-md ms-2" name="send" value="Submit">
											</div>
										</div>
									</form>
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
	</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="../src/js/template-2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
<script src="../src/js/preload.js"></script>
<script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>


<!----pusher to ryan--->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>

// Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;

// var pusher = new Pusher('b66888c27162a9de31eb', {
//     cluster: 'ap1'
// });

// var channel = pusher.subscribe('my-channel');
// channel.bind('my-event', function(data) {
//     // alert(JSON.stringify(data));
//     //gawing ajax
    
//     $.ajax({url: "number-notifs.php", success: function(result){
//         $("#NumNotifs").html(result);
//     }});
// 	$.ajax({url: "notification-reports.php", success: function(result){
//         $("#all-report").html(result);
//     }});
    
// });
</script>

<!------end of pusher--->

<script>
    $('#search_data').tokenfield({
      autocomplete: {
        source: function(data, response) {
          $.ajax({
            url: 'brgy.php',
            method: 'GET',
            dataType: 'json',
            data: {
              name: data.term
            },
            success: function(res) {
              // response(res)
              var usr = $.map(res, function(name) {
                return {
                  label: name,
                  value: name
                }
              })
              var results = $.ui.autocomplete.filter(usr, data.term)
              response(results)
              console.log(results)
            }
          })
        },
        delay: 100
      },
    })
  </script>
<script>
    $('#opr').tokenfield({
      autocomplete: {
        source: function(data, response) {
          $.ajax({
            url: 'opr.php',
            method: 'GET',
            dataType: 'json',
            data: {
              name: data.term
            },
            success: function(res) {
              // response(res)
              var usr = $.map(res, function(name) {
                return {
                  label: name,
                  value: name
                }
              })
              var results = $.ui.autocomplete.filter(usr, data.term)
              response(results)
              console.log(results)
            }
          })
        },
        delay: 100
      },
    })
  </script>
<script>
    tinymce.init({
      selector: 'textarea#tiny',
      // width: 2000,
      height: 300,
      resize: false,
      plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
        'table', 'emoticons', 'template', 'codesample'
      ],
      toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | removeformat | code table help | save | restoredraft',
      menu: {
        favs: {
          title: 'menu',
          items: 'code visualaid | searchreplace | emoticons'
        }
      },
      menubar: 'favs file edit view insert format tools table',
      content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',

    });
</script>
<script>
    $(document).ready(function() {
      $("#all_brgy").change(function() {
        if (this.checked) {
          $.ajax({
            url: "get_data.php",
            type: "post",
            dataType: "json",
            success: function(data) {
              $("#brgy").val(data.column_name);
            }
          });
        } else {
          $("#brgy").val("");
        }
      });
    });
</script>
</body>

</html>

<?php
require '../vendor/autoload.php';

if (isset($_POST['send'])) {

  // pusher to
  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'b66888c27162a9de31eb',
    'f78b15853c11ffe40959',
    '1544749',
    $options
  );


  $time = date("h:i:s", time());
  $date = date('y-m-d');



  $subject = $_POST['subject'];
  $subject = mysqli_escape_string($conn, $subject);

  $opr = $_POST['opr'];
  $opr = mysqli_escape_string($conn, $opr);

  $statement = $_POST['statement'];
  $statement = mysqli_escape_string($conn, $statement);


  // $brgy = $_POST['brgy'];
  // $brgy = mysqli_escape_string($conn, $brgy);




  $time = date("h:i:s", time());
  $date = date('y-m-d');

  $date_start = date('Y-m-d h:i');
  $date_end = date('Y-m-d h:i', strtotime($date_start)); // temporary date end kasi di ko alam saan ko kukunin yan


  $date_new_start = new DateTime($date_start);
  $date_new_end = new DateTime($date_end);



  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);

  switch ($days) {
    case "7":
      $duration = "Weekly";
      break;
    case "14":
      $duration = "Bi-Weekly";
      break;
    case "30":
      $duration = "Monthly";
      break;
    case "90":
      $duration = "Quarterly";
      break;
    case "180":
      $duration = "Semestral";
      break;
    case "365":
      $duration = "Annually";
      break;
    default:
      $duration = "Daily";
  }





  //file upload 
  if (isset($_FILES['pdf_file']['name'])) {
    $filename = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];



    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;

        //insert a query

        for($i=0;$i<count($filename);$i++){
          $f_name = $_FILES['pdf_file']['name'][$i];
          $insert_file = "INSERT INTO files (`report_id`, `file_name`) VALUES ('$report_id', '$f_name')";
          $query_file = mysqli_query($conn, $insert_file);
          move_uploaded_file($file_tmp[$i], "files/" . $filename[$i]);
        }

        $sql_get_users = "SELECT * FROM users where user_type = '1'";
        $query_get_users = mysqli_query($conn, $sql_get_users);
        while($rows = mysqli_fetch_array($query_get_users)){
          $insert_report = "INSERT INTO `reports`(`report_id`,`to_user`, `from_user`,`subject`, `opr`, `message`, `duration`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
          VALUES ('$report_id','1','$barangay','$subject','$opr','$statement','$duration','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
          $run_insert_report = mysqli_query($conn, $insert_report);
  
  
  
          if ($run_insert_report) {
          
  
            $sent_report = "INSERT INTO `sent`(`report_id`,`to_user`, `from_user`,`subject`, `opr`, `message`, `duration`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
            VALUES ('$report_id','1','$barangay','$subject','$opr','$statement','$duration','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
            $run_sent_report = mysqli_query($conn, $sent_report);
            if ($run_sent_report) {
              $data['message'] = "";
              $pusher->trigger('my-channel', 'my-event', $data);
              echo "<script>
              Swal.fire({
                  icon: 'success',
                  title: 'Report Sent',
              })
              </script>";
            }
          } else {
            echo "error" . $conn->error;
          }
        }
      }
    } else {

      $report_id = "RID00001";


      $insert_report = "INSERT INTO `reports`(`report_id`,`to_user`, `from_user`,`subject`, `opr`, `message`, `duration`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
          VALUES ('$report_id','1','$barangay','$subject','$opr','$statement','$duration','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {

        $sent_report = "INSERT INTO `sent`(`report_id`,`to_user`, `from_user`,`subject`, `opr`, `message`, `duration`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$report_id','1','$barangay','$subject','$opr','$statement','$duration','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_sent_report = mysqli_query($conn, $sent_report);

        if ($run_sent_report) {
          $data['message'] = "";
          $pusher->trigger('my-channel', 'my-event', $data);
        //   $pusher->trigger('my-channel', 'my-event', $data);

        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Report Sent',
        })
        </script>";
        }
      } else {
        $conn->error;
      }
    }
  }
}


// if (isset($_POST['draft'])) {


//   $data['message'] = "sucess";
//   $pusher->trigger('my-channel', 'my-event', $data);

//   $time = date("h:i:s", time());
//   $date = date('y-m-d');


//   $from = $_POST['from'];
//   $from = mysqli_escape_string($conn, $from);

//   $to = $_POST['to'];
//   $to = mysqli_escape_string($conn, $to);

//   $subject = $_POST['subject'];
//   $subject = mysqli_escape_string($conn, $subject);

//   $opr = $_POST['opr'];
//   $opr = mysqli_escape_string($conn, $opr);

//   $statement = $_POST['statement'];
//   $statement = mysqli_escape_string($conn, $statement);


//   $brgy = $_POST['brgy'];
//   $brgy = mysqli_escape_string($conn, $brgy);




//   $time = date("h:i:s", time());
//   $date = date('y-m-d');

//   $date_start = date("Y-m-d h:i");
//   $date_end = date('Y-m-d h:i', strtotime($_POST['date_end']));
//   $date_new_start = new DateTime($date_start);
//   $date_new_end = new DateTime($date_end);

//   $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
//   $days = intval($diff);





//   $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
//   $days = intval($diff);

//   if ($days == 1) {
//     $duration = "Daily";
//   } elseif ($days == 7) {
//     $duration = "Weekly";
//   } elseif ($days > 2 || $days <= 14) {
//     $duration = "Bi-weekly";
//   } elseif ($days == 30) {
//     $duration = "Monthly";
//   } elseif ($days == 90) {
//     $duration = "Quarterly";
//   } elseif ($days >= 180) {
//     $duration = "Semestral";
//   } elseif ($days == 365) {
//     $duration = "Annualy";
//   }






//   file upload 
//   if (isset($_FILES['pdf_file']['name'])) {
//     $file_name = $_FILES['pdf_file']['name'];
//     $file_tmp = $_FILES['pdf_file']['tmp_name'];

//     move_uploaded_file($file_tmp, "./Images/" . $file_name);


//     $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
//     $run_validate_report = mysqli_query($conn, $validate_report);


//     if (mysqli_num_rows($run_validate_report) > 0) {

//       foreach ($run_validate_report as $row) {
//         $report_id = $row['report_id'];
//         $get_number = str_replace("RID", "", $report_id);
//         $id_increment = $get_number + 1;
//         $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

//         $report_id = "RID" . $get_string;

//         insert a query




//         $insert_report = "INSERT INTO `reports`( `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
//         VALUES ('$report_id','$from','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
//         $run_insert_report = mysqli_query($conn, $insert_report);



//         if ($run_insert_report) {
//           $data['message'] = "sucess";
//           $pusher->trigger('my-channel', 'my-event', $data);
//         echo "<script>
//         Swal.fire({
//             icon: 'success',
//             title: 'Report Sent',
//         })
//         </script>";
//         } else {
//           $conn->error;
//         }
//       }
//     } else {

//       $report_id = "RID00001";




//       $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
//       VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
//       $run_insert_report = mysqli_query($conn, $insert_report);

//       if ($run_insert_report) {

//         $data['message'] = "sucess";
//         $pusher->trigger('my-channel', 'my-event', $data);

//         echo "<script>
//               Swal.fire({
//                   icon: 'success',
//                   title: 'Report Sent',
//               })
//               </script>";
//       } else {
//         $conn->error;
//       }
//     }
//   }
// }



?>