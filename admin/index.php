<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
include('images.php');
include('edit-notes.php');

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
	<link href="../src/css/template-2.css" rel="stylesheet">
	<link href="../src/css/preloader.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	<title>DILG</title>
</head>
<style>
	td{
		padding: 12px 0;
	}
</style>
<body>
	<div class="preload-wrapper">
    	<div class="spinner-grow text-light" role="status">
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
					<li class="sidebar-item active">
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
					<li class="sidebar-item">
						<a class="sidebar-link" href="ranking.php">
              <i class="align-middle" data-feather="award"></i> <span class="align-middle">Ranking</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="register.php">
              <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">New Account</span>
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
								  $query_notification_num = "SELECT * FROM `reports` WHERE to_user = '1' ";
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
										<div class="card p-3">
											<div id="calendar"></div>
										</div>
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
				</div>
			</footer>
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
					<form action="add-note.php" method="POST" enctype="multipart/form-data">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
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
            url:"insert-calendar.php",
            type:"POST",
            data:{title:title, start:start, end:end},
            success:function(data)
            {
              calendar.fullCalendar('refetchEvents');
              alert("Added Successfully");
              window.location.replace("index.php");
            }
            })
          }
          },
    
          editable:true,
          eventResize:function(event)
          {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
            url:"update-calendar.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function(){
            calendar.fullCalendar('refetchEvents');
            alert('Event Update');
            }
          })
          },
    
          eventDrop:function(event)
          {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
            url:"update-calendar.php",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function()
            {
            calendar.fullCalendar('refetchEvents');
            alert("Event Updated");
            }
          });
          },
    
          eventClick:function(event)
          {
          if(confirm("Are you sure you want to remove it?"))
          {
            var id = event.id;
            $.ajax({
            url:"delete-calendar.php",
            type:"POST",
            data:{id:id},
            success:function()
            {
              calendar.fullCalendar('refetchEvents');
              alert("Event Removed");
              window.location.href='index.php';
            }
            })
          }
          },
    
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
</body>

</html>
<?php
ob_end_flush();

?>