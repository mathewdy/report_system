<?php
date_default_timezone_set('Asia/Manila');
ob_start();
session_start();
include('../connection.php');
include('session.php');
include('images.php');


$user_id = $_SESSION['user_id'];

$report_link = "add-report.php";
$view_link = "reports.php";
$draft_link = "draft.php";
$note_link = "add-note.php";
$ranking = "ranking.php"
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
  <title> Add Report </title>
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


  <?php
  // database query 

  $query = "SELECT * FROM users WHERE user_id = '$user_id'";
  $run_query_data = mysqli_query($conn, $query);
  $rows = mysqli_fetch_array($run_query_data);



  ?>
  <main class="d-flex">
    <div class="preload-wrapper">
      <div class="spinner-border text-info" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
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
          <a href="<?php echo $report_link ?>" class="nav-link text-white active">
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
        <!-- <li>
          <a href="<?php echo $note_link ?>" class="nav-link text-white">
            <i class="bi bi-stickies me-2"></i>
            Notes
          </a>
        </li> -->
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
      <div class="row pt-2 px-4">
        <div class="col-lg-12">
          <div class="card p-5 shadow" style="border: none;">
            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
              <span class="d-flex mb-3">
                <div class="row w-100">
                  <div class="col-lg-6">
                    <label for="">Date Start:</label>
                    <input type="datetime-local" class="form-control w-100" name="date_start" required>
                  </div>
                  <div class="col-lg-6">
                    <label for="">Date End:</label>
                    <input type="datetime-local" class="form-control w-100" name="date_end" required>
                  </div>
                </div>
              </span>
              <span class="d-flex align-items-center mb-3">
                <label for="" style="margin-right: 12px;">From:</label>
                <input type="text" class="form-control w-100 ms-2" name="from" value="<?php echo $rows['email'] ?>" readonly>
              </span>
              <span class="d-flex align-items-center mb-3">
                <label style="margin-right: 12px;" for="">To:</label>
                <input type="text" id="search_data" name="to" class="w-100 brgy ms-2" style="border:none; outline:none;" />
              </span>
              <span class="d-flex align-items-center mb-3">
                <label style="margin-right: 12px;" for="">Barangay:</label>
                <input type="text" id="brgy" name="brgy" class="w-100 brgy ms-2" style="border:none; outline:none;" />
              </span>
              <span class="d-flex mb-2">
                <label for="">Subject:</label>
                <input type="text" class="form-control w-100 ms-2" name="subject">
              </span>
              <span class="d-flex mb-2">
                <label for="">OPR:</label>
                <input type="text" class="form-control w-100 ms-2" name="opr">
              </span>
              <div>
                <textarea id="tiny" name="statement"> </textarea>
              </div>

              <input type="file" class="form-control mt-2" name="pdf_file" id="" accept=".pdf">

              <span class="d-flex justify-content-end align-items-center mt-3">
                <input type="submit" class="btn btn-primary btn-md" name="send" value="Submit">
                <input type="submit" class="btn btn-danger btn-md ms-2" name="draft" value="Save as Draft">
              </span>
            </form>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
  <script src="../src/js/preload.js"></script>
  <script src="../src/js/multiple.js"></script>
  <script>
    $('#search_data').tokenfield({
      autocomplete: {
        source: function(data, response) {
          $.ajax({
            url: 'brgy.php',
            method: 'GET',
            dataType: 'json',
            data: {
              name: data.term
            },
            success: function(res) {
              // response(res)
              var usr = $.map(res, function(name) {
                return {
                  label: name,
                  value: name
                }
              })
              var results = $.ui.autocomplete.filter(usr, data.term)
              response(results)
              console.log(results)
            }
          })
        },
        delay: 100
      },
    })
  </script>
  <script>
    $('#brgy').tokenfield({
      autocomplete: {
        source: function(data, response) {
          $.ajax({
            url: 'brgy2.php',
            method: 'GET',
            dataType: 'json',
            data: {
              name: data.term
            },
            success: function(res) {
              // response(res)
              var usr = $.map(res, function(name) {
                return {
                  label: name,
                  value: name
                }
              })
              var results = $.ui.autocomplete.filter(usr, data.term)
              response(results)
              console.log(results)
            }
          })
        },
        delay: 100
      },
    })
  </script>
  <!-- <script>
    $('.brgy').tokenfield({
        autocomplete :{
            source: function(data, response){
                $.ajax({
                    url: 'brgy.php',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                    name: data.term
                    },
                    success: function(res){
                    // response(res)
                    var usr = $.map(res, function(name){
                        return{
                        label: name,
                        value: name
                        }
                    }) 
                    var results = $.ui.autocomplete.filter(usr, data.term)
                    response(results)
                    console.log(results)
                    }
                })
            }
        }
    });
  </script> -->
  <script>
    //   $('.tagator_textlength').autocomplete({
    //   source: function(data, response){
    //     $.ajax({
    //       url: 'brgy.php',
    //       method: 'GET',
    //       dataType: 'json',
    //       data: {
    //         name: data.term
    //       },
    //       success: function(res){
    //         // response(res)
    //         var usr = $.map(res, function(name){
    //           return{
    //             label: name,
    //             value: name
    //           }
    //         }) 
    //         var results = $.ui.autocomplete.filter(usr, data.term)
    //         response(results)
    //         console.log(results)
    //       }
    //     })
    //   }
    // })
    // $('.brgy').tagator('autocomplete', function(data, response){
    //   $.ajax({
    //       url: 'brgy.php',
    //       method: 'GET',
    //       dataType: 'json',
    //       data: {
    //         name: data.term
    //       },
    //       success: function(res){
    //         // response(res)
    //         var usr = $.map(res, function(name){
    //           return{
    //             label: name,
    //             value: name
    //           }
    //         }) 
    //         var results = $.ui.autocomplete.filter(usr, data.term)
    //         response(results)
    //         console.log(results)
    //       }
    //     })
    // });
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

  <!-- <script src="../src/js/multiple.js"></script> -->


</body>

</html>

<?php

if (isset($_POST['send'])) {





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

  $date_start = date('Y-m-d h:i', strtotime($_POST['date_start']));
  $date_end = date('Y-m-d h:i', strtotime($_POST['date_end']));

  $date_new_start = new DateTime($date_start);
  $date_new_end = new DateTime($date_end);

  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);

  // print_r($date_start);
  // print_r($date_end);






  if ($days == 1 || $days == 0) {
    $duration = "Daily";
  } elseif ($days == 7) {
    $duration = "Weekly";
  } elseif ($days > 2 || $days <= 14) {
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






  //file upload 
  if (isset($_FILES['pdf_file']['name'])) {
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];

    move_uploaded_file($file_tmp, "./pdf/" . $file_name);


    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;

        //insert a query




        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);



        if ($run_insert_report) {

          $sent_report = "INSERT INTO `sent`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
          VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
          $run_sent_report = mysqli_query($conn, $sent_report);

          if ($run_sent_report) {
            echo "<script>alert('Success')</script>";
          }
        } else {
          echo "error" . $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";




      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
      VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {

        $sent_report = "INSERT INTO `sent`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
          VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_sent_report = mysqli_query($conn, $sent_report);

        if ($run_sent_report) {
          echo "<script>alert('Success')</script>";
        }
      } else {
        echo "error" . $conn->error;
      }
    }
  }
}


// saving as draft



if (isset($_POST['draft'])) {

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

  $to = $_POST['to'];
  $to = mysqli_escape_string($conn, $to);


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






  //file upload 
  if (isset($_FILES['pdf_file']['name'])) {
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];

    move_uploaded_file($file_tmp, "./pdf/" . $file_name);


    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;

        //insert a query




        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','2','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);



        if ($run_insert_report) {

          echo "<script>alert('Success')</script>";
        } else {
          echo "error" . $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";




      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
      VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','2','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {

        echo "<script>alert('Success')</script>";
      } else {
        echo "error" . $conn->error;
      }
    }
  }
}



ob_end_flush();
?>