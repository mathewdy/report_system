<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
include('images.php');
include('edit-notes.php');

$user_id = $_SESSION['user_id'];

$report_link = "add-report.php";
$view_link = "reports.php";
$draft_link = "draft.php";
$note_link = "add-note.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  .focus {
    border: none;
  }
  body{
    overflow-x: hidden;
  }
  .active{
    background: rgba(255, 255, 255, 0.3) !important;
  }
</style>
<body>
  <main class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; min-height: 100vh;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="../src/img/dilg.png" height="80" alt="">
        <span class="fs-4 ps-3">DILG</span>
        <span class="fs-4"></span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link text-white active">
            <i class="bi bi-house-door me-2"></i>
            Home
          </a>
        </li>
        <li>
          <a href="<?php echo $report_link ?>" class="nav-link text-white">
            <i class="bi bi-clipboard me-2"></i>
            New Report
          </a>
        </li>
        <li>
          <a href="<?php echo $view_link ?>" class="nav-link text-white" aria-current="page">
            <i class="bi bi-book-half me-2"></i>
            View Reports
          </a>
        </li>
        <li>
          <a href="<?php echo $draft_link ?>" class="nav-link text-white">
            <i class="bi bi-archive me-2"></i>
            Drafts
          </a>
        </li>
        <li>
          <a href="<?php echo $note_link ?>" class="nav-link text-white">
            <i class="bi bi-stickies me-2"></i>
            Notes
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <?php   
        $sql_admin = "SELECT * FROM users WHERE user_id = '$user_id'";
        $query_admin = mysqli_query($conn, $sql_admin);
        $admin_row = mysqli_fetch_array($query_admin);
        ?>
          <img src="<?php if (empty($admin_row['image'])) {
                      echo '../src/img/avatar.svg';
                    } else {
                      echo 'admins/' . $admin_row['image'];
                    } ?>" alt="" width="32" height="32" class="rounded-circle me-2">
            <?= $admin_row['first_name'] .' '. $admin_row['last_name']?>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>
    <div class="container-fluid bg-light p-0">
    <nav class="navbar bg-dark navbar-dark">
        <div class="container">
          <a class="navbar-brand ms-auto" href="#"><i class="bi bi-bell-fill"></i></a>
        </div>
      </nav>
      <div class="row p-5">

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
        <div class="card shadow p-5" style="border: none; min-height: 18rem;">

                <p class="card-text"> <?php if (empty($rows['content'])) {
                        echo "";
                      } else {
                        echo $rows['content'];
                      }

                      ?> </p>
          <span class="mt-auto text-end">
            <a id="<?php echo ($note_id); ?>" data-id="<?= $note_id ?>" class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editNote">Edit</a>
            <a href="<?php echo ($delete_link) ?>" class="btn btn-danger btn-sm">Delete</a>
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
      </div>

      <!-- <div class="card shadow p-5" style="border: none;">
        <form action="" method="POST" enctype="multipart/form-data">



          <label for="">Content</label>
          <div>
            <textarea id="tiny" name="content"> </textarea>
          </div>

          <input type="submit" name="add" value="Add">


        </form>
      </div> -->
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <!-- <script src="../src/js/update.js"> </script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
    $('textarea#tiny').tinymce({
      height: 500,
      menubar: true,
      plugins: false,
      toolbar: false
    });
  </script>
</body>

</html>