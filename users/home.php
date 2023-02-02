<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
include('edit-notes.php');

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];

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
					<li class="sidebar-item active">
						<a class="sidebar-link" href="home.php">
              <i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
            </a>
					</li>
					<li class="sidebar-item">
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
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Log out</a>
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
									<!-- NOTES -->
										<?php

										$query_data = "SELECT * FROM `notes` WHERE user_id = '$user_id'";
										$run_query_data = mysqli_query($conn, $query_data);

										if (mysqli_num_rows($run_query_data) > 0) {

										foreach ($run_query_data as $rows) {

											$note_id = $rows['id'];

											$ciphering = "AES-128-CTR";

											// Use OpenSSl Encryption method
											$iv_length = openssl_cipher_iv_length($ciphering);
											$options = 0;

											// Non-NULL Initialization Vector for encryption
											$encryption_iv = '1234567891011121';

											// Store the encryption key
											$encryption_key = "TeamAgnat";

											// Use openssl_encrypt() function to encrypt the data
											$encryption = openssl_encrypt(
											$note_id,
											$ciphering,
											$encryption_key,
											$options,
											$encryption_iv




											);


											$delete_link = "delete-notes.php?nid=" . $encryption;


										?>
									<div class="col-lg-3">
										<div class="card py-5" style="min-height: 20rem;">
											<div class="card-body">
												<p class="p-0 m-0 w-100 card-text"> 
													<?php 
													if (empty($rows['content'])) {
														echo "";
													} else {
														echo $rows['content'];
													}
													?> 
												</p>
											</div>
											<span class="text-center">
												<button type="button" id="<?php echo ($note_id); ?>" class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
												<a class="btn btn-danger btn-sm" href="<?php echo ($delete_link) ?>">Delete</a>
											</span>
										</div>
									</div>

											<!-- Modal -->






										<?php
										}
										}
										?>
									<div class="col-lg-3">
										<div class="card d-flex justify-content-center align-items-center" style="min-height: 20rem; border: 3px solid rgba(0, 0,0,0.2);">
											<span>
												<a href=""><i class="align-self-center text-primary" style="width: 150px; height: 150px" data-feather="plus-circle"></i></a>
											</span>
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