<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
// include('edit-notes.php');

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
    <link rel="stylesheet" href="../src/sweetalert2/dist/sweetalert2.min.css">

	<title>DILG</title>
</head>

<body>
<div class="preload-wrapper">
      <div class="spinner-border text-info" role="status">
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
								<?php
									$query = "SELECT * FROM users WHERE email = '$email'";
									$run = mysqli_query($conn,$query);

									if(mysqli_num_rows($run) > 0){
										foreach($run as $row){
								?>
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="row">
								
										<div class="col-lg-5">
											<div class="card p-5">
												<img class="card-img-top" src="<?php echo "Images/" . $row['image']?>" alt="Profile Image" style="max-height: 350px; width: 500px;">
												<input type="hidden" name="old_image" value="<?php echo $row ['image']?>">
												<input type="file" name="image">

											</div>
											
										</div>
										<div class="col-lg-7">
											<div class="card p-5">
												<label for="">Email</label>
												<input type="email" class="form-control" name="email" value="<?php echo $row['email']?>">
												<br>
												<label for="">Password</label>					
												<input type="password" class="form-control" name="password" id="" value="<?php echo $row['password']?>">
												<br>
												<label for="">First Name</label>											
												<input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']?>">
												<br>
												<label for="">Middle Name</label>										
												<input type="text" class="form-control" name="middle_name" value="<?php echo $row['middle_name']?>">
												<br>
												<label for="">Last Name</label>									
												<input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']?>">
												<br>
												<label for="">Date of Birth</label>
												<input type="date" class="form-control" name="date_of_birth" value="<?php echo $row['date_of_birth']?>" id="">
												<br>
												<label for="">Address</label>
												<input type="text" class="form-control" name="address" value="<?php echo $row['address']?>">
												<br>
												<label for="">Barangay</label>
												<input type="text" class="form-control" name="barangay" value="<?php echo $row['barangay']?>">
												<br>
												<label for="">Barangay ID</label>
												<input type="text" class="form-control" name="barangay_id" value="<?php echo $row['barangay_id']?>">
												<br>
												<span class="text-end">
													<input type="submit" class="btn btn-success" name="update" value="Update">
												</span>

											</div>
										</div>
									
									</form>


									<?php
													}
												}


												?>
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
<script src="../src/js/preload.js"></script>
<script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>


</body>

</html>
<?php

if(isset($_POST['update'])){


    //year month date
    date_default_timezone_set("Asia/Manila");
    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = ucfirst($_POST['first_name']);
    $middle_name = ucfirst($_POST['middle_name']);
    $last_name = ucfirst($_POST['last_name']);
    $date_of_birth = ucfirst($_POST['date_of_birth']);
    $address = $_POST['address'];
    $barangay = $_POST['barangay'];
    $barangay_id = $_POST['barangay_id'];

    $email = mysqli_escape_string($conn,$email);
    $password = mysqli_escape_string($conn,$password);
    $first_name = mysqli_escape_string($conn,$first_name);
    $middle_name = mysqli_escape_string($conn,$middle_name);
    $last_name = mysqli_escape_string($conn,$last_name);
    $address = mysqli_escape_string($conn,$address);
    $barangay = mysqli_escape_string($conn,$barangay);
    $barangay_id = mysqli_escape_string($conn,$barangay_id);


    //images

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != ''){
        $update_filename = $_FILES['image']['name'];
    }else{
        $update_filename = $old_image;
    }

    if(empty($new_image)){
        $query_update_1 = "UPDATE users SET first_name = '$first_name' , middle_name ='$middle_name', last_name = '$last_name', address = '$address', barangay = '$barangay' , barangay_id = '$barangay_id' WHERE user_id = '$user_id'";
        $run_update_1 = mysqli_query($conn,$query_update_1);

        if($run_update_1){
            echo "Updated";
            echo "<script>window.location.href='profile.php'</script>";
        }else{
            echo "error" . $conn->error;
        }
    }
        $allowed_extension = array('gif','png','jpg','jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
        $filename = $_FILES['image']['name'];
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($file_extension,$allowed_extension)){
			echo "
			<script>
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'File Not Allowed!',
			})
			</script>";
            echo "<script>window.location.href='profile.php' </script>";
        }else{
            $query_update_2 = "UPDATE users SET first_name = '$first_name' , middle_name ='$middle_name', last_name = '$last_name', address = '$address', barangay = '$barangay' , barangay_id = '$barangay_id', image =  '$update_filename' WHERE user_id = '$user_id'";
            $run_update_2 = mysqli_query($conn,$query_update_2);
    
            if($run_update_2){
                move_uploaded_file($_FILES["image"]["tmp_name"], "Images/".$_FILES["image"]["name"]);
                echo "<script>
					Swal.fire({
						icon: 'success',
						title: 'Updated Successfully',
						text: 'Your record has been updated'
					})
					</script>";
				echo "<script>window.location.href='profile.php'</script>";

    
            }else{
                echo "Error" .$conn->error;
            }
        }
    
        

   
}



ob_end_flush();

?>