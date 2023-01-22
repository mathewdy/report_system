<?php

ob_start();
session_start();
include('../connection.php');
 $user_id = $_SESSION['user_id'];
 $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
<main class="d-flex"> 
  <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem; min-height: 100vh;">
    <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
      <svg class="bi" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="visually-hidden">Icon-only</span>
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item">
        <a href="home.php" class="nav-link py-3 border-bottom"  title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
          </svg>
        </a>
      </li>
      <li class="nav-item">
        <a href="view-report.php" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Inbox">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
          </svg>
        </a>
      </li>
      <li>
        <a href="add-report.php" class="nav-link active py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Create Report">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
          </svg>
        </a>
      </li>
      <li>
        <a href="add-notes.php" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
            <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
            <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
          </svg>  
        </a>
      </li>
      <li>
        <a href="drafts.php" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
          </svg>  
        </a>
      </li>
    </ul>
    <div class="dropdown border-top">
      <!-- Banda dito ko kailangan yung query ng user image -->
      
      <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="..." alt="user" width="24" height="24" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
<div class="container my-5">
  <div class="card">
    <form action="" autocomplete="off" method="POST" enctype="multipart/form-data">

      <!---or ajax search to select na lang ng recipients--> 
      <!---kapag pinindot na yung textbox for recipients mag papalit ng placeholder parang sa gmail--->
    <span class="form-control">
      <label for="">From:</label>
      <input type="text" style="border:none;outline:none;" name="from">
    </span>
    <span class="form-control d-flex">
        <label for="">To:</label>
        <input type="text" class="w-100" name="to" style="border:none;outline:none;" id="search_data">
    </span>
    <span class="form-control d-flex">
      <label for="">Subject:</label>
      <textarea name="subject" class="w-100" id="exampleFormControlTextarea1" style="resize:none; border: none; outline:none;" rows="3"></textarea>
    </span>
    <div>
      <textarea id="default" name="statement"> </textarea>
    </div>

    <input type="file" name="files[]" id="" accept="image/jpeg,image/gif,image/png,application/pdf,image" multiple>
    <br>


    <input type="submit" name="send" value="Send Report">
    

    <input type="submit" name="draft" value="Save as Draft">

    </form>
  </div>
</div>

</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
      $('[data-toggle=tooltip]').tooltip();
  }); 
</script>
<script>
    tinymce.init({
    selector: 'textarea#default',
    // width: 2000,
    height: 300,
    resize: false,
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

if(isset($_POST['send'])){

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
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "sucess";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "sucess";
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
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "sucess";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "sucess";
      } else {
        $conn->error;
      }
    }
  }
}


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
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "sucess";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "sucess";
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
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "sucess";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "sucess";
      } else {
        $conn->error;
      }
    }
  }
}



?>