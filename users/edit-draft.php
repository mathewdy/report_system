<?php
session_start();
include('../connection.php');
include('session.php');
ob_start();

error_reporting(E_ERROR & E_WARNING);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
    <title>Document</title>
</head>

<body>



    <a href="drafts.php">Back</a>
    <?php

    if (isset($_GET['status']) && isset($_GET['user_id']) && isset($_GET['report_id'])) {
        $status = $_GET['status'];
        $user_id = $_GET['user_id'];
        $report_id = $_GET['report_id'];


        $query = "SELECT * FROM reports WHERE status = '$status' AND user_id = '$user_id' AND report_id = '$report_id'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($run);
    }



    ?>

    <form action="" method="POST" enctype="multipart/form-data">



        <label for="">From:</label>
        <input type="text" name="from" class="switch" value="<?php if (empty($row['from_user'])) {
                                                                    echo "";
                                                                } else {
                                                                    echo $row['from_user'];
                                                                } ?> ">
        <br>
        <label for="">To:</label>
        <input type="text" name="to" class="switch" value="<?php if (empty($row['to_user'])) {
                                                                echo "";
                                                            } else {
                                                                echo $row['to_user'];
                                                            } ?> ">
        <br>
        <label for="">Subject:</label>
        <input type="text" name="subject" class="switch" value="<?php if (empty($row['subject'])) {
                                                                    echo "";
                                                                } else {
                                                                    echo $row['subject'];
                                                                } ?>">



        <textarea id="default" name="statement">
            <?php if (empty($row['message'])) {
                echo "";
            } else {
                echo $row['message'];
            }  ?>  
        </textarea disabled readonly>
        <input type="file" name="files[]" id="" accept="image/jpeg,image/gif,image/png,application/pdf,image" multiple disable>


        <input type="submit" name="send" value="Send">
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


if (isset($_POST['send'])) {

    $time = date("h:i:s", time());
    $date = date('y-m-d');


    $from = $_POST['from'];
    $from = mysqli_escape_string($conn, $from);

    echo ($from);

    $to = $_POST['to'];
    $to = mysqli_escape_string($conn, $to);

    $subject = $_POST['subject'];
    $subject = mysqli_escape_string($conn, $subject);

    $statement = $_POST['statement'];
    $statement = mysqli_escape_string($conn, $statement);
    $status = 1;


    //file upload 

    $targetDir = "images/";
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

        //insert a query
        $update_report = "UPDATE `reports` SET `from_user`='$from',`to_user`='$to',`subject`='$subject',`message`='$statement',`pdf_files`='$insert_pdf_ValuesSQL',`image`='$insert_images_ValuesSQL',`status`='1',`date_updated`='$date',`time_updated`='$time' 
        WHERE report_id = '$report_id''";
        $run_update_report = mysqli_query($conn, $update_report);

        if ($run_update_report) {
            echo "<script>window.location.href='home.php' </script>";
        } else {
            $conn->error;
        }
    } else {

        $insert_pdf_ValuesSQL = "";
        $insert_images_ValuesSQL = "";


        // with out docuemnts

        //insert a query
        $update_report = "UPDATE `reports` SET `from_user`='$from',`to_user`='$to',`subject`='$subject',`message`='$statement',`pdf_files`='$insert_pdf_ValuesSQL',`image`='$insert_images_ValuesSQL',`status`='1',`date_updated`='$date',`time_updated`='$time' WHERE report_id = '$report_id'";
        $run_update_report = mysqli_query($conn, $update_report);

        if ($run_update_report) {
            echo "<script>window.location.href='home.php' </script>";
        } else {
            $conn->error;
        }
    }
}





if (isset($_POST['draft'])) {

    $time = date("h:i:s", time());
    $date = date('y-m-d');


    $from = $_POST['from'];
    $from = mysqli_escape_string($conn, $from);

    echo ($from);

    $to = $_POST['to'];
    $to = mysqli_escape_string($conn, $to);

    $subject = $_POST['subject'];
    $subject = mysqli_escape_string($conn, $subject);

    $statement = $_POST['statement'];
    $statement = mysqli_escape_string($conn, $statement);
    $status = 1;


    //file upload 

    $targetDir = "images/";
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

        //insert a query
        $update_report = "UPDATE `reports` SET `from_user`='$from',`to_user`='$to',`subject`='$subject',`message`='$statement',`pdf_files`='$insert_pdf_ValuesSQL',`image`='$insert_images_ValuesSQL',`status`='2',`date_updated`='$date',`time_updated`='$time' 
        WHERE report_id = '$report_id''";
        $run_update_report = mysqli_query($conn, $update_report);

        if ($run_update_report) {
            echo "<script>window.location.href='drafts.php' </script>";
        } else {
            $conn->error;
        }
    } else {

        $insert_pdf_ValuesSQL = "";
        $insert_images_ValuesSQL = "";


        // with out docuemnts

        //insert a query
        $update_report = "UPDATE `reports` SET `from_user`='$from',`to_user`='$to',`subject`='$subject',`message`='$statement',`pdf_files`='$insert_pdf_ValuesSQL',`image`='$insert_images_ValuesSQL',`status`='2',`date_updated`='$date',`time_updated`='$time' WHERE report_id = '$report_id'";
        $run_update_report = mysqli_query($conn, $update_report);

        if ($run_update_report) {
            echo "<script>window.location.href='drafts.php' </script>";

        } else {
            $conn->error;
        }
    }
}


ob_end_flush();

?>