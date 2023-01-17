<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

error_reporting(E_ERROR & E_WARNING);


$user_id = $_SESSION['user_id'];

if (isset($_GET['uid'])) {
  // Store the cipher method
  $ciphering = "AES-128-CTR";
  $options = 0;
  // Non-NULL Initialization Vector for decryption
  $decryption_iv = '1234567891011121';

  // Store the decryption key
  $decryption_key = "TeamAgnat";

  // Use openssl_decrypt() function to decrypt the data
  $user_id = openssl_decrypt(
    $_GET['uid'],
    $ciphering,
    $decryption_key,
    $options,
    $decryption_iv
  );
  // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
  //   $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
  //   $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
  // }

  if (empty($_GET['uid'])) {    //lrn verification starts here
    echo "<script>alert('User id not found');
        window.location = 'index.php';</script>";
    exit();
  }
}







?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
  <title> Add Report </title>
</head>

<body>
  <form action="" method="POST" enctype="multipart/form-data">

    <label for="">From:</label>
    <input type="text" name="from">
    <br>
    <label for="">To:</label>
    <input type="text" name="to">
    <br>
    <label for="">Subject:</label>
    <input type="text" name="subject">
    <div>
      <textarea id="tiny" name="statement"> </textarea>
    </div>

    <input type="file" name="files[]" id="" accept="image/jpeg,image/gif,image/png,application/pdf,image" multiple>
    <br>


    <input type="submit" name="send" value="Send">
  </form>

  <script>
    $('textarea#tiny').tinymce({
      height: 500,
      menubar: true,
      plugins: [
        'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
        'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
        'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount', 'save', 'autosave'
      ],
      toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help | save | restoredraft'
    });
  </script>
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
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "sucess";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
      VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "sucess";
      } else {
        $conn->error;
      }
    }
  } else {
    // with out docuemnts
  }
}

?>