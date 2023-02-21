<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
include('images.php');
include('edit-notes.php');
error_reporting(E_ERROR | E_PARSE);

$email = $_SESSION['email'];


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
					<li class="sidebar-item">
						<a class="sidebar-link" href="reports.php">
                            <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Reports</span>
                        </a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="ranking.php">
              <i class="align-middle" data-feather="award"></i> <span class="align-middle">Ranking</span>
            </a>
					</li>
					<!-- <li class="sidebar-item">
						<a class="sidebar-link" href="register.php">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">New Account</span>
            </a> -->
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
								  $query_notification_num = "SELECT * FROM `reports` WHERE to_user = '1' AND notif_status = '0' ";
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
                                        $query_reports = "SELECT from_user, subject, date_created, time_created FROM reports WHERE to_user = '1' ";
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
                                        <div class="card shadow py-0" style="border: none; border-radius: 0; max-height: 80vh; overflow: hidden; overflow-y: scroll;" >
                                            <table class="table table-bordered" id="data">
                                                <thead>
                                                    <tr>
                                                        <th>Rank</th>
                                                        <th>Barangay</th>
                                                        <th>Total of Reports</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    // $sql = "SELECT *, barangay.brgy, reports.to_user, COUNT(*) as total_report FROM reports
                                                    // LEFT JOIN barangay on reports.to_user = barangay.brgy ORDER BY total_report ASC";
													// SELECT *, COUNT(reports.to_user) as total_report FROM barangay
                                                    // LEFT JOIN reports on barangay.brgy = reports.to_user 
                                                    // WHERE reports.status = '1' OR reports.status = '4'
													// SELECT COUNT(report_or_reply), from_user FROM reports WHERE report_or_reply = '1'

													// SELECT COUNT(report_or_reply) AS number_reports, from_user AS barangay
													// FROM reports
													// GROUP BY from_user
													// HAVING COUNT(report_or_reply)
                                                    $sql = "SELECT COUNT(report_or_reply) AS number_reports, 
													from_user AS barangay
													FROM reports
													GROUP BY from_user
													HAVING COUNT(report_or_reply)";
                                                    $run = mysqli_query($conn, $sql);

                                                    if (mysqli_num_rows($run) > 0) {
                                                        $count = 1;
                                                        foreach ($run as $row) {
                                                        // $total_report = count($row['to_user']);

                                                            $count++;
                                                    ?>

                                                            <tr>
                                                                <td><?php if($count == '1'){
																	echo "";
																}else{
																	echo $cont++;
																} ?></td>
                                                                <td>
																	<?php if($row['barangay'] == '1'){
																	echo "DILG Admin";
																	}else{
																		echo $row['barangay'];
																	} 
																?>
																</td>
                                                                <td><?php  
																echo $row['number_reports'];
																//if($row['number_reports'] == '1'){
																// 	echo "";
																// }else{
																// 	echo $row['number_reports'];
																// } ?></td>

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
<script src="../src/js/table.click.js"></script>


<!----pusher to ryan--->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

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

<!----end of pusher--->

</body>

</html>
<?php

ob_end_flush();
?>