<?php
include('../connection.php');
session_start();
ob_start();
$email = $_SESSION['email'];
// $barangay = $_SESSION['barangay'];
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
					<li class="sidebar-item active">
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
										if(isset($_GET['report_id'])) {
											// $barangay = $_GET['barangay'];
											$report_id = $_GET['report_id'];
											$query_report = "SELECT * FROM sent WHERE report_id = '$report_id'";
											$run_report_id = mysqli_query($conn, $query_report);

											if (mysqli_num_rows($run_report_id) > 0) {
												foreach ($run_report_id as $row) {
													

													?>
													<!-- <input type="text" name="date_start" value="<?php echo $row['date_start']?>" readonly>  -->
													<div class="card p-5">
														<div class="row">
															<div class="col-lg-12 text-end">
																<p>
                                                                    <?php 
                                                                    $date_start =  date('F d, Y h:i:s A', strtotime($row['date_start']));
																	$date_end = date('F d, Y h:i:s A', strtotime($row['date_end']));
                                                                    echo "Date sent: " . $date_start . " - " . $date_end;
                                                                    ?>
                                                                </p>
																<!-- papalitan ng format yung date  -->
																<!-- dapat F d, Y yung format para maging February 2, 2023 - February 5, 2023 (sample yan)-->
															</div>
															<hr class="featurette-divider">
															<div class="col-lg-6">
																<div class="row">
																	<div class="col-lg-12 d-flex align-items-center" >
																		<label for="">From:</label>
																		<input type="text" class="form-control ms-2" style="border: none; outline: none; background: none;" name="from" value="<?php echo $row['from_user'];?> " readonly>
																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="row">
																	<div class="col-lg-12 d-flex align-items-center">
																		<label for="">Barangay:</label>
																		<input type="text" class="form-control ms-2" style="border: none; outline: none; background: none;" name="brgy" value="<?php echo $row['barangay']?> " readonly>
																	</div>
																	<div class="col-lg-12 d-flex align-items-center">
																		<label for="">Subject:</label>
																		<input type="text" class="form-control ms-2" style="border: none; outline: none; background: none;" name="subject" value="<?php echo $row['subject'] ?>"readonly>
																	</div>
																</div>
															</div>
															<div class="col-lg-12 d-flex align-items-center mb-2">
																<label for="">OPR:</label>
																<input type="text" name="opr" class="form-control ms-2" style="border: none; outline: none; background: none;" value="<?php echo $row['opr'] ?>"readonly>
															</div>
															<div class="col-lg-12">
																<textarea id="tiny" name="statement"> <?php echo $row['message'] ?> </textarea>

															</div>
															<div class="col-lg-12">
															<span>Attached files: </span>
																<?php
																$get_files = "SELECT * FROM files WHERE report_id = '$report_id'";
																$query_files = mysqli_query($conn, $get_files);
																if(mysqli_num_rows($query_files) > 0){
																	while($rows = mysqli_fetch_array($query_files)){
																		?>
																	<a href="../admin/pdf/<?php echo $rows['file_name'];?>" download><?php echo $rows['file_name'];?></a>
																		<?php
																	}
																}else{
																	echo "NO FILES ATTACHED";
																}
																?>
															</div>
														</div>
													</div>
													
														
														<!-- <br>
														
														<br>
														
														<br> -->

														<!-- <label for="">Date Start:</label>
														
														<br> -->
														<!-- <label for="">Date End:</label>
														<input type="text" name="date_end" value="<?php echo $row['date_end']?>" readonly>
														<br> -->
<!-- 														
														<br>
														
														<br> -->


													<?php


												}

											}
										}
												

											
											

									?>
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
</body>

</html>
<?php
ob_end_flush();

?>