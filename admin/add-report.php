<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
include('images.php');


$user_id = $_SESSION['user_id'];

$report_link = "add-report.php";
$view_link = "reports.php";
$draft_link = "draft.php";
$note_link = "add-note.php";
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

  <title> Add Report </title>
</head>
<style>
  .focus {
    border: none;
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
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height: 100vh;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4"></span>
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
    <div class="container">
      <div class="card shadow p-5" style="border: none;">
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">

          <span class="d-flex mb-3">
            <div class="row w-100">
              <div class="col-lg-6">
                <label for="">Date Start:</label>
                <input type="date" class="form-control w-100" name="date_start">
              </div>
              <div class="col-lg-6">
                <label for="">Date End:</label>
                <input type="date" class="form-control w-100" name="date_end">
              </div>
            </div>
          </span>
          <span class="d-flex align-items-center mb-3">
            <label for="" style="margin-right: 12px;">From:</label>
            <input type="text" class="form-control w-100" style="border:none; outline:none;" name="from" value="<?php echo $rows['email'] ?>" readonly>
          </span>
          <span class="d-flex align-items-center mb-3">
            <label style="margin-right: 12px;" for="">To:</label>
            <input type="text" id="search_data" name="to" class="w-100 brgy mx-2" style="border:none; outline:none;" />
          </span>
          <span class="d-flex mb-2">
            <label for="">Subject:</label>
            <input type="text" class="w-100" style="border:none; outline:none;" name="subject">
          </span>

          <span class="d-flex mb-2">
            <label for="">Barangay</label>
            <br>
            <label for="">Barangay 1</label>
            <input type="checkbox" name="brgy[]" value="Barangay 1">
            <br>
            <label for="">Barangay 2</label>
            <input type="checkbox" name="brgy[]" value="Barangay 2">
            <br>
            <label for="">Barangay 3</label>
            <input type="checkbox" name="brgy[]" value="Barangay 3">
            <br>
            <label for="">Barangay 4</label>
            <input type="checkbox" name="brgy[]" value="Barangay 4">
            <br>
            <label for="">Barangay 5</label>
            <input type="checkbox" name="brgy[]" value="Barangay 5">
            <br>
            <label for="">Barangay 6</label>
            <input type="checkbox" name="brgy[]" value="Barangay 6">
            <br>
            <label for="">Barangay 7</label>
            <input type="checkbox" name="brgy[]" value="Barangay 7">
            <br>
          </span>

          <div>
            <textarea id="tiny" name="statement"> </textarea>
          </div>

          <input type="file" class="form-control mt-2" name="pdf_file" id="" accept=".pdf">
          <br>

          <span class="d-flex justify-content-end align-items-center">
            <input type="submit" class="btn btn-primary btn-md" name="send" value="Submit">
            <input type="submit" class="btn btn-danger btn-md" name="draft" value="Save as Draft">
          </span>



        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

  <script src="../src/Tagator/fm.tagator.jquery.js"></script>
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

  $statement = $_POST['statement'];
  $statement = mysqli_escape_string($conn, $statement);


  $barangay = $_POST['brgy'];




  $time = date("h:i:s", time());
  $date = date('y-m-d');

  $date_start = date('Y-m-d', strtotime($_POST['date_start']));
  $date_end = date('Y-m-d', strtotime($_POST['date_end']));

  $to = $_POST['to'];
  $to = mysqli_escape_string($conn, $to);


  $date_new_start = new DateTime($date_start);
  $date_new_end = new DateTime($date_end);

  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);






  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);






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

        foreach ($barangay as $brgy) {

          $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
          $run_insert_report = mysqli_query($conn, $insert_report);
        }

        if ($run_insert_report) {
          echo "<script>alert('Success')</script>";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";


      foreach ($barangay as $brgy) {

        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);
      }
      if ($run_insert_report) {
        echo "<script>alert('Success')</script>";
      } else {
        $conn->error;
      }
    }
  } else {

    // inserting with out file

    $file_name = " ";



    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;


        foreach ($barangay as $brgy) {

          $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
          $run_insert_report = mysqli_query($conn, $insert_report);
        }

        //insert a query


        if ($run_insert_report) {
          echo "<script>alert('Success')</script>";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";


      foreach ($barangay as $brgy) {

        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);
      }

      if ($run_insert_report) {
        echo "<script>alert('Success')</script>";
      } else {
        $conn->error;
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

  $statement = $_POST['statement'];
  $statement = mysqli_escape_string($conn, $statement);


  $barangay = $_POST['brgy'];




  $time = date("h:i:s", time());
  $date = date('y-m-d');

  $date_start = date('Y-m-d', strtotime($_POST['date_start']));
  $date_end = date('Y-m-d', strtotime($_POST['date_end']));

  $to = $_POST['to'];
  $to = mysqli_escape_string($conn, $to);


  $date_new_start = new DateTime($date_start);
  $date_new_end = new DateTime($date_end);

  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);






  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);






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

        foreach ($barangay as $brgy) {

          $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
          $run_insert_report = mysqli_query($conn, $insert_report);
        }

        if ($run_insert_report) {
          echo "<script>alert('Success')</script>";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";


      foreach ($barangay as $brgy) {

        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);
      }
      if ($run_insert_report) {
        echo "<script>alert('Success')</script>";
      } else {
        $conn->error;
      }
    }
  } else {

    // inserting with out file

    $file_name = " ";



    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;


        foreach ($barangay as $brgy) {

          $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
          $run_insert_report = mysqli_query($conn, $insert_report);
        }

        //insert a query


        if ($run_insert_report) {
          echo "<script>alert('Success')</script>";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";


      foreach ($barangay as $brgy) {

        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);
      }

      if ($run_insert_report) {
        echo "<script>alert('Success')</script>";
      } else {
        $conn->error;
      }
    }
  }
}



ob_end_flush();
?>