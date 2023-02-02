<?php
include('../connection.php');
session_start();
ob_start();
$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];
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
	<div class="preload-wrapper">
    	<div class="spinner-grow text-info" role="status">
        	<span class="sr-only">Loading...</span>
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
						<a class="sidebar-link" href="home.php">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
                        </a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="view-report.php">
                            <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Inbox</span>
                        </a>
					</li>
					<li class="sidebar-item">
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
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
							<?php

							$query_image = "SELECT first_name, last_name, image FROM users WHERE user_id = '$user_id'";
							$run_image = mysqli_query($conn,$query_image);

							if(mysqli_num_rows($run_image) > 0) {
							foreach($run_image as $row_image){
								?>
								<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                	<img src="<?php echo "Images/" . $row_image['image']?>" alt="user" class="avatar img-fluid rounded me-1"/> <span class="text-dark"><?= $row_image['first_name'] .' '. $row_image['last_name'] ?></span>
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

												$query_reports = "SELECT * FROM reports WHERE to_user = '$email'";
												$run_reports = mysqli_query($conn,$query_reports);

												if (mysqli_num_rows($run_reports) > 0) {
													$no = 0;
													foreach ($run_reports as $row) {
													$no++;
												?>
												<tr class="border-bottom border-secondary">
													<td><?php echo $no ?></td>
													<td><?php echo $row['from_user'] ?></td>
													<td style="width: 50%;"><?php echo $row['subject'] ?></td>
													<td>
													<?php if ($row['status'] == 1) {
														echo "<span class='text-success'> Complete </span>";
													} elseif ($row['status'] == 2) {
														echo "<span class='text-danger'> No Submssion </span>";
													} elseif ($row['status'] == 3) {
														echo "<span class='text-warning'> Incomplete </span>";
													} elseif ($row['status'] == 4) {
														echo "<span class='text-primary'> Late </span>";
													} else {
														echo "<span class='text-danger'> No Submssion </span>";
													}  
													?>
													</td>
													<td>
													<a href="view-single-report.php?report_id=<?php echo $row['report_id']?>&to_user=<?php echo $row['to_user']?>">View Report</a>
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
</body>

</html>
<?php
ob_end_flush();

?>