<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('images.php');
include('session.php');

$user_id = $_SESSION['user_id'];


if (isset($_GET['rid'])) {
  // Store the cipher method
  $ciphering = "AES-128-CTR";
  $options = 0;
  // Non-NULL Initialization Vector for decryption
  $decryption_iv = '1234567891011121';

  // Store the decryption key
  $decryption_key = "TeamAgnat";

  // Use openssl_decrypt() function to decrypt the data
  $report_id = openssl_decrypt(
    $_GET['rid'],
    $ciphering,
    $decryption_key,
    $options,
    $decryption_iv
  );
  // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
  //   $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
  //   $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
  // }



  $verify_report = "SELECT report_id FROM `reports` WHERE report_id = '$report_id'";
  $query_request = mysqli_query($conn, $verify_report) or die(mysqli_error($conn));
  if (mysqli_num_rows($query_request) == 0) {
    echo "
              <script type = 'text/javascript'>
              window.location = 'reports.php';
              </script>";
    exit();
  }
}
$report_link = "add-report.php";
$view_link = "reports.php";
$draft_link = "draft.php";
$note_link = "add-note.php";
$ranking = "ranking.php";



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
  <!-- eto yung mga nadagdag -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../src/css/preloader.css">
  <title>Report</title>
</head>
<style>
  .focus {
    border: none;
  }

  body {
    overflow-x: hidden;
  }

  .active {
    background: rgba(255, 255, 255, 0.3) !important;
  }
</style>

<body>
  <div class="preload-wrapper">
    <div class="spinner-border text-info" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  <main class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; min-height: 100vh;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="../src/img/dilg.png" height="80" alt="">
        <span class="fs-4 ps-3">DILG</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link text-white">
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
          <a href="<?php echo $view_link ?>" class="nav-link text-white active" aria-current="page">
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
          <a href="<?php echo $ranking ?>" class="nav-link text-white">
            <i class="bi bi-award me-2"></i>
            Ranking
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
          <?= $admin_row['first_name'] . ' ' . $admin_row['last_name'] ?>
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
    <div class="container-fluid p-0">
      <nav class="navbar bg-dark navbar-dark">
        <div class="container">
          <a class="navbar-brand ms-auto" href="#"><i class="bi bi-bell-fill"></i></a>
        </div>
      </nav>
      <div class="card shadow p-5" style="border: none; min-height: 35rem;">
        <!-- query of db -->
        <?php
        $query_data = "SELECT * FROM `reports` WHERE report_id = '$report_id'";
        $run_query_data = mysqli_query($conn, $query_data);
        $rows = mysqli_fetch_array($run_query_data);
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

          <?php


          $status = $rows['status'];

          if ($status == 3 || $status == 2) {
          ?>
            <!-- burahin mo tong comment pag ngawa mo na  -->
            <!-- tapos etong switch is lakihn mo onti -->
            <div class="form-check form-switch mb-5">
              <input class="form-check-input" type="checkbox" role="switch" id="constraint_checkbox">
              <p>Toggle Edit</p>
            </div>
            <div>
              <!-- RYAN IBABA MO NALANG TONG UPDATE NA BUTTON -->
            </div>

            <!-- <input type="file" name="files[]" class="form-control" id="" accept="image/jpeg,image/gif,image/png,application/pdf,image" multiple disable> -->

          <?php
          }
          ?>

          <label for="">From:</label>
          <input type="text" name="from" class="switch form-control" value="<?php if (empty($rows['from_user'])) {
                                                                              echo "";
                                                                            } else {
                                                                              echo $rows['from_user'];
                                                                            } ?> " disabled>
          <br>
          <label for="">To:</label>
          <input type="text" name="to" class="switch form-control" value="<?php if (empty($rows['to_user'])) {
                                                                            echo "";
                                                                          } else {
                                                                            echo $rows['to_user'];
                                                                          } ?> " disabled>
          <br>
          <label for="">Barangay</label>
          <input type="text" name="brgy" class="switch form-control" value="<?php if (empty($rows['barangay'])) {
                                                                              echo "";
                                                                            } else {
                                                                              echo $rows['barangay'];
                                                                            } ?> " disabled>
          <br>
          <label for="">Subject:</label>
          <input type="text" name="subject" class="switch form-control" value="<?php if (empty($rows['subject'])) {
                                                                                  echo "";
                                                                                } else {
                                                                                  echo $rows['subject'];
                                                                                } ?>" disabled>

          <br>
          <label for="">OPR</label>
          <input type="text" name="opr" class="switch form-control" value="<?php if (empty($rows['opr'])) {
                                                                              echo "";
                                                                            } else {
                                                                              echo $rows['opr'];
                                                                            } ?> " disabled>

          <textarea id="tiny" name="statement" class="switch" disabled> <?php if (empty($rows['message'])) {
                                                                          echo "";
                                                                        } else {
                                                                          echo $rows['message'];
                                                                        }  ?>   </textarea disabled>
            
            <h1>Document</h1>
            <embed type="application/pdf" src="<?php if (empty($rows['pdf_files'])) {
                                                  echo "";
                                                } else {
                                                  echo "pdf/" . $rows['pdf_files'];
                                                } ?> " width="500" height="500" > 
            <span class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary switch" name="update" disabled>Update</button>
            </span>
        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

  <script src=" ../src/js/jquery-3.6.1.min.js"></script>

  <script src="../src/js/table.click.js"></script>
  <script src="../src/js/preload.js"></script>
  <script src="../src/js/switch.js"> </script>
  <script>
    tinymce.init({
    selector: 'textarea#tiny',
    width: 1000,
    height: 300,
    readonly: true,
    plugins:[
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | removeformat | code table help | save | restoredraft',
    menu: {
        favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
  
  });
</script>
</body>
</html>

<?php
if (isset($_POST['update'])) {

  $time = date("h:i:s", time());
  $date = date('y-m-d');


  $from = $_POST['from'];
  $from = mysqli_escape_string($conn, $from);

  $to = $_POST['to'];
  $to = mysqli_escape_string($conn, $to);

  $subject = $_POST['subject'];
  $subject = mysqli_escape_string($conn, $subject);

  $opr = $_POST['opr'];
  $opr = mysqli_escape_string($conn, $opr);

  $statement = $_POST['statement'];
  $statement = mysqli_escape_string($conn, $statement);


  $brgy = $_POST['brgy'];
  $brgy = mysqli_escape_string($conn, $brgy);




  $time = date("h:i:s", time());
  $date = date('y-m-d');

  $date_start = date('Y-m-d h:i:s', strtotime($_POST['date_start']));
  $date_end = date('Y-m-d h:i:s', strtotime($_POST['date_end']));


  $date_new_start = new DateTime($date_start);
  $date_new_end = new DateTime($date_end);

  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);






  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);

  if ($days == 1) {
    $duration = "Daily";
  } elseif ($days == 7) {
    $duration = "Weekly";
  } elseif (
    $days > 2 || $days <= 14
  ) {
    $duration = "Bi-weekly";
  } elseif ($days == 30) {
    $duration = "Monthly";
  } elseif ($days == 90) {
    $duration = "Quarterly";
  } elseif ($days >= 180) {
    $duration = "Semestral";
  } elseif ($days == 365) {
    $duration = "Annualy";
  }




  $insert_report = "UPDATE `reports` SET `from_user`='$from',`to_user`='$to',`barangay`='$brgy',`subject`='$subject',`opr`='$opr',`message`='$statement',`duration`='$duration',`status`='$status',`notif_status`='0',`date_start`='$date_start',`date_end`='$date_end',`deadline`='$days',`date_updated`='$date',`time_updated`='$time' WHERE report_id = '$report_id' ";
  $run_insert_report = mysqli_query($conn, $insert_report);



  if ($run_insert_report) {
    echo "<script>alert('Success update')</script>";
  } else {
    $conn->error;
  }
}

?>