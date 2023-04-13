<?php
include('../connection.php');
session_start();
ob_start();
date_default_timezone_set('Asia/Manila');

$email = $_SESSION['email'];
// $sql_info = "SELECT * FROM users WHERE email = '$email'";
// $query_info = mysqli_query($conn, $sql_info);
// $rows = mysqli_fetch_array($query_info);
// $barangay = $rows['barangay'];
$barangay = $_SESSION['barangay'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="../src/css/template-2.css" rel="stylesheet">
	<link href="../src/css/preloader.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<title>DILG</title>
</head>
<style>
	td{
		padding: 12px 0;
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
					<li class="sidebar-item active">
						<a class="sidebar-link" href="view-report.php">
                            <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Inbox</span>
                        </a>
					</li>
					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="add-report.php">
                            <i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">Compose</span>
                        </a>
					</li> -->
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
						<!-- template alert -->
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
							<?php
							
							//SELECT * FROM reports WHERE to_user = '$barangay' AND notif_status = '0' 
							//SELECT COUNT(DISTINCT Country) FROM Customers;
								$query_number_notif = "SELECT COUNT(DISTINCT report_id) AS number_of_notif FROM reports WHERE to_user = '$barangay' AND notif_status = '0'";
								$run_number_notif = mysqli_query($conn,$query_number_notif);
								
								if(mysqli_num_rows($run_number_notif) > 0){
								    foreach($run_number_notif as $row_notif){
								        ?>
								        
								        <div class="position-relative">
									        <i class="align-middle" data-feather="bell"></i>
									            <span class="indicator"><?php  echo $row_notif['number_of_notif']; ?></span>
								        </div>
								        
								        <?php
								        
								    }
								}
								

							?>
								
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									<?php 
									    echo $row_notif['number_of_notif'];
									?> New Notifications
								</div>
								<div class="list-group">
									<?php
										// query ko naman lahat ngsinend sakin na info
										// from_user, subject,date, time
										
										$query_reports = "SELECT DISTINCT  reports.from_user, reports.to_user,  reports.report_id, reports.subject, reports.date_created, reports.time_created FROM reports WHERE reports.to_user = '$barangay' AND reports.notif_status = '0' ORDER BY id DESC";
										$run_reports = mysqli_query($conn,$query_reports);

										if(mysqli_num_rows($run_reports) > 0){
											foreach($run_reports as $row_reports){
												// $new_date = date('F d, Y G:i A', strtotime($row_reports['date_created'], $row_reports['time_created']));
												$newDate = date("F d, Y", strtotime($row_reports['date_created']));
												$newTime = date("G:i A", strtotime($row_reports['time_created']));
												?>
												<a class="list-group-item clickable-list" data-href="view-inbox-report.php?report_id=<?php echo $row_reports['report_id']; ?>&to_user=<?php echo $row_reports['to_user']?>">
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
										<table class="w-100" id="data">
											<thead>
												<tr>
													<th>No.</th>
													<th>From</th>
													<th>Subject</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php

												$query_reports = "SELECT DISTINCT reports.subject,reports.report_id, reports.report_id_2, reports.to_user , reports.from_user, reports.opr, reports.message,reports.duration,reports.report_or_reply,reports.status,reports.notif_status,reports.date_start,reports.date_end,reports.deadline,reports.date_time_acknowledge,reports.date_created,reports.time_created,reports.date_updated,reports.date_updated,reports.time_updated FROM reports WHERE to_user  = '$barangay' ORDER BY id DESC";
												$run_reports = mysqli_query($conn,$query_reports);
												
												$cur_date = date('y-m-d h:i:s');
												// echo $cur_date;
												if (mysqli_num_rows($run_reports) > 0) {
													$no = 0;
													foreach ($run_reports as $row) {
													$no++;
												?>
												<tr class="border-bottom border-secondary">
													<td><?php echo $no ?></td>
													<td><?php if( $row['from_user'] == '1' ){
														echo "DILG Admin";
													}?></td>
													<td style="width: 50%;"><?php echo $row['subject'] ?></td>
													<td>
													<?php 
													if($row['date_end'] > $cur_date){
														echo "<span class='text-danger'> No Submssion </span>";
														// echo $row['date_end'];
													}else{
														if ($row['notif_status'] == 1) {
														echo "<span class='text-success'> Complete </span>";
														} elseif ($row['notif_status'] == 2) {
															echo "<span class='text-danger'> No Submssion </span>";
														} elseif ($row['notif_status'] == 3) {
															echo "<span class='text-warning'> Incomplete </span>";
														} elseif ($row['notif_status'] == 4) {
															echo "<span class='text-primary'> Late </span>";
														}
													}
													// if ($row['status'] == 1) {
													// 	echo "<span class='text-success'> Complete </span>";
													// } elseif ($row['status'] == 2) {
													// 	echo "<span class='text-danger'> No Submssion </span>";
													// } elseif ($row['status'] == 3) {
													// 	echo "<span class='text-warning'> Incomplete </span>";
													// } elseif ($row['status'] == 4) {
													// 	echo "<span class='text-primary'> Late </span>";
													// } else {
													// 	echo "<span class='text-danger'> No Submssion </span>";
													// }  
													?>
													</td>
													<td>
													<a href="view-inbox-report.php?to_user=<?php echo $row['to_user']?>&report_id=<?php echo $row['report_id']?>">View Report</a>
													</td>
												</tr>
												<?php
													}
												}
												?>
										</tbody>
									</table>
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
	</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="../src/js/template-2.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
<script src="../src/js/preload.js"></script>
<script src="../src/js/notif-click.js"></script>
<!--pusher-RYAN--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

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
    
    $.ajax({url: "number-notifs.php", success: function(result){
        $("#NumNotifs").html(result);
    }});
	$.ajax({url: "notification-reports.php", success: function(result){
        $("#all-report").html(result);
    }});
    
});
</script>
</body>

</html>
<?php
ob_end_flush();

?>