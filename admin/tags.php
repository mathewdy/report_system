<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
include('images.php');
error_reporting(E_ERROR & E_WARNING);


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
  <title> Add Report </title>
</head>
<style>
    .focus{
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
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door me-2" viewBox="0 0 16 16">
              <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
            </svg>
            Home
          </a>
        </li>
        <li>
          <a href="<?php echo $report_link ?>" class="nav-link active" aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard me-2" viewBox="0 0 16 16">
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
              <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
            </svg>
            New Report
          </a>
        </li>
        <li>
          <a href="<?php echo $view_link ?>" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye me-2" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
            View Reports
          </a>
        </li>
        <li>
          <a href="<?php echo $draft_link ?>" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive me-2" viewBox="0 0 16 16">
              <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
            </svg>
            Drafts
          </a>
        </li>
        <li>
          <a href="<?php echo $note_link ?>" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text me-2" viewBox="0 0 16 16">
              <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
              <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
            </svg>
            Notes
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php if (empty($images['image'])) {
                      echo "";
                    } else {
                      echo "admins/" . $images['image'];
                    } ?>" alt="" width="32" height="32" class="rounded-circle me-2">
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
            <input type="text" id="search_data" class="w-100 brgy mx-2" style="border:none; outline:none;"/>
          </span>
          <span class="d-flex mb-2">
            <label for="">Subject:</label>
            <input type="text" class="w-100" style="border:none; outline:none;" name="subject">
          </span>

          <div>
            <textarea id="tiny" name="statement"> </textarea>
          </div>

          <input type="file"  class="form-control mt-2" name="files[]" id="" accept="image/jpeg,image/gif,image/png,application/pdf,image" multiple>
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





  $status = 1;


  //file upload 

  $targetDir = "pdf/";
  $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');

  $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
  $fileNames = array_filter($_FILES['files']['name']);
  if (!empty($fileNames)) {
    foreach ($_FILES['files']['name'] as $key => $val) {
      // File upload path 
      $fileName = basename($_FILES['files']['name'][$key]);
      $targetFilePath = $targetDir . $fileName;

      // Check whether file type is valid 
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      if (in_array($fileType, $allowTypes)) {
        // Upload file to server 
        if (is_uploaded_file($_FILES["files"]["tmp_name"][$key])) {

          $mime = mime_content_type($_FILES["files"]["tmp_name"][$key]);

          if ($mime === 'application/pdf') {

            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
              // Image db insert sql 
              $insert_pdf_ValuesSQL .= $fileName;
            } else {
              $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
            }
          } elseif (strpos($mime, 'image/') === 0) {

            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
              // Image db insert sql 
              $insert_images_ValuesSQL .= $fileName;
            } else {
              $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
            }
          } else {
            echo ("not supported file, please choose pdf or jpg or png");
          }
        }
      }
    }

    $check_subject = "SELECT subject FROM reports WHERE subjects =  '$subject'";
    $run_subject = mysqli_query($conn,$check_subject);

    if($run_subject){
      echo "<script>alert('Already sent subject') </script>";
      echo "<script>window.location.href='add-report.php'</script>";
      exit();
    }


    // validation of report id 
    //insert report id 

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
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "<script>alert('Success')</script>";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "<script>alert('Success')</script>";
      } else {
        $conn->error;
      }
    }
  } else {

    $insert_pdf_ValuesSQL = "";
    $insert_images_ValuesSQL = "";


    // with out docuemnts
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
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "<script>alert('Success')</script>";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

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
  $status = 2;


  //file upload 

  $targetDir = "pdf/";
  $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');

  $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
  $fileNames = array_filter($_FILES['files']['name']);
  if (!empty($fileNames)) {
    foreach ($_FILES['files']['name'] as $key => $val) {
      // File upload path 
      $fileName = basename($_FILES['files']['name'][$key]);
      $targetFilePath = $targetDir . $fileName;

      // Check whether file type is valid 
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      if (in_array($fileType, $allowTypes)) {
        // Upload file to server 
        if (is_uploaded_file($_FILES["files"]["tmp_name"][$key])) {

          $mime = mime_content_type($_FILES["files"]["tmp_name"][$key]);

          if ($mime === 'application/pdf') {

            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
              // Image db insert sql 
              $insert_pdf_ValuesSQL .= $fileName;
            } else {
              $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
            }
          } elseif (strpos($mime, 'image/') === 0) {

            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
              // Image db insert sql 
              $insert_images_ValuesSQL .= $fileName;
            } else {
              $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
            }
          } else {
            echo ("not supported file, please choose pdf or jpg or png");
          }
        }
      }
    }







    // validation of report id 
    //insert report id 

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
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "sucess";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "<script>alert('Draft')</script>";
      } else {
        $conn->error;
      }
    }
  } else {
    // with out docuemnts
    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    $insert_pdf_ValuesSQL = "";
    $insert_images_ValuesSQL = "";

    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;

        //insert a query
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "<script>alert('Draft')</script>";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date_start','$date_end','$days','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "<script>alert('Draft')</script>";
      } else {
        $conn->error;
      }
    }
  }
}



ob_end_flush();
?>