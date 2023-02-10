<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<script src="/cdn-cgi/apps/head/fHG6PlGkJkuh_9HPzJECz_j4pH8.js"></script><link rel="preconnect" href="https://fonts.gstatic.com">
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
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
															<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">3</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									3 New Notifications
								</div>
								<div class="list-group">
																					<a class="list-group-item">
													<div class="row g-0 align-items-center">
														<div class="col-2">
															<i class="text-success" data-feather="mail"></i>
														</div>
														<div class="col-10">
															<div class="text-dark">
																DILG Admin															</div>
															<div class="text-muted small mt-1 d-flex justify-content-between">
																<p class="p-0 m-0">sample 1</p>
																<p class="p-0 m-0">February 10, 2023 9:31 AM</p>
															</div>
															<!-- <div class="text-muted small mt-1"></div> -->
														</div>
													</div>
												</a>
																								<a class="list-group-item">
													<div class="row g-0 align-items-center">
														<div class="col-2">
															<i class="text-success" data-feather="mail"></i>
														</div>
														<div class="col-10">
															<div class="text-dark">
																DILG Admin															</div>
															<div class="text-muted small mt-1 d-flex justify-content-between">
																<p class="p-0 m-0">sample subject 2</p>
																<p class="p-0 m-0">February 10, 2023 6:40 AM</p>
															</div>
															<!-- <div class="text-muted small mt-1"></div> -->
														</div>
													</div>
												</a>
																								<a class="list-group-item">
													<div class="row g-0 align-items-center">
														<div class="col-2">
															<i class="text-success" data-feather="mail"></i>
														</div>
														<div class="col-10">
															<div class="text-dark">
																DILG Admin															</div>
															<div class="text-muted small mt-1 d-flex justify-content-between">
																<p class="p-0 m-0">quarterly</p>
																<p class="p-0 m-0">February 10, 2023 6:44 AM</p>
															</div>
															<!-- <div class="text-muted small mt-1"></div> -->
														</div>
													</div>
												</a>
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
															<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                	<img src="../admin/admins/black.jpg" alt="user" class="avatar img-fluid rounded me-1"/> <span class="text-dark">Gay Rhiannon</span>
                                	
								</a>

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
																								<tr class="border-bottom border-secondary">
													<td>1</td>
													<td>DILG Admin</td>
													<td style="width: 50%;">sample 1</td>
													<td>
													<span class='text-success'> Complete </span>													</td>
													<td>
													<a href="view-inbox-report.php?report_id=RID00001">View Report</a>
													</td>
												</tr>
																								<tr class="border-bottom border-secondary">
													<td>2</td>
													<td>DILG Admin</td>
													<td style="width: 50%;">sample subject 2</td>
													<td>
													<span class='text-success'> Complete </span>													</td>
													<td>
													<a href="view-inbox-report.php?report_id=RID00003">View Report</a>
													</td>
												</tr>
																								<tr class="border-bottom border-secondary">
													<td>3</td>
													<td>DILG Admin</td>
													<td style="width: 50%;">quarterly</td>
													<td>
													<span class='text-warning'> Incomplete </span>													</td>
													<td>
													<a href="view-inbox-report.php?report_id=RID00005">View Report</a>
													</td>
												</tr>
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
