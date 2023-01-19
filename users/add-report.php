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
</head>
<body>

  <a href="home.php">Back</a>

    <form action="" method="POST" enctype="multipart/form-data">

      <!---or ajax search to select na lang ng recipients--> 
      <!---kapag pinindot na yung textbox for recipients mag papalit ng placeholder parang sa gmail--->

      <label for="">From:</label>
    <input type="text" name="from">
    <br>
    <label for="">To:</label>
    <input type="text" name="to" id="search_data">
    <br>
    <label for="">Subject:</label>
    <input type="text" name="subject">
    <div>
      <textarea id="default" name="statement"> </textarea>
    </div>

    <input type="file" name="files[]" id="" accept="image/jpeg,image/gif,image/png,application/pdf,image" multiple>
    <br>


    <input type="submit" name="send" value="Send Report">
    

    <input type="submit" name="draft" value="Save as Draft">

    </form>




<script>
    tinymce.init({
    selector: 'textarea#default',
    width: 1000,
    height: 300,
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