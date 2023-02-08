<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
// include('edit-notes.php');
$barangay = $_SESSION['barangay'];
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	<title>DILG</title>
</head>

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
									<div class="col-lg-12 mb-5">
										<div id="calendar"></div>
									</div>
									<!-- NOTES -->
										<?php

										$query_data = "SELECT * FROM `notes` WHERE email = '$email'";
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
												<button type="button" id="<?php echo ($note_id); ?>" data-id="<?= $note_id ?>" class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editNote">Edit</button>
												<a class="btn btn-danger btn-sm" href="<?php echo ($delete_link) ?>">Delete</a>
											</span>
										</div>
									</div>

											 <!-- Modal -->
											 <div class="modal fade" id="editNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Notes</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body notes">
														
													</div>
													<div class=" modal-footer">
														
													</div>
													</div>
												</div>
											</div>





										<?php
										}
										}
										?>
									<div class="col-lg-3">
										<div class="card d-flex justify-content-center align-items-center" style="min-height: 20rem; border: 3px solid rgba(0, 0,0,0.2);">
											<span>
												<a href="" data-bs-toggle="modal" data-bs-target="#addNote"><i class="align-self-center text-primary" style="width: 150px; height: 150px" data-feather="plus-circle"></i></a>
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

	<!-- Add Note Modal -->
	<div class="modal fade" id="addNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Note</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
			<form action="add-notes.php" method="POST" enctype="multipart/form-data">
				<div>
					<textarea id="tiny" name="content"> </textarea>
				</div>
				<span class="d-flex justify-content-end mt-4">
				<input type="submit" class="btn btn-primary py-1 mx-2" name="add" value="Add">
				</span>
			</form>
          </div>
          <div class=" modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="../src/js/template-2.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="../src/js/preload.js"></script>
	<?php
$query = $conn->query("SELECT * FROM events ORDER BY id");
?>
<script>
	$(document).ready(function() {
		var calendar = $('#calendar').fullCalendar({
		editable:true,
		header:{
		left:'prev,next today',
		center:'title',
		right:'month,agendaWeek,agendaDay'
		},
		events: [<?php while ($row = $query ->fetch_object()) { ?>{ id : '<?php echo $row->id; ?>', title : '<?php echo $row->title; ?>', start : '<?php echo $row->start_event; ?>', end : '<?php echo $row->end_event; ?>', }, <?php } ?>],
		selectable:true,
		selectHelper:true,
		select: function(start, end, allDay)
		{
		var title = prompt("Enter Event Title");
		if(title)
		{
			var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
			var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
			$.ajax({
			url:"insert.php",
			type:"POST",
			data:{title:title, start:start, end:end},
			success:function(data)
			{
			calendar.fullCalendar('refetchEvents');
			alert("Added Successfully");
			window.location.replace("calendar.php");
			}
			})
		}
		},
		editable:true,

		});
	});
</script>
<script>
	$(document).ready(function(){
		$('.edit').click(function(){
			var note = $(this).data('id');
			$.ajax({
				url: 'edit-modal.php',
				type: 'post',
				data: {note: note},
				success: function(response){
					$('.notes').html(response);
					$('#editNote').modal('show');
				}
			});
		});
	});
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
</body>

</html>