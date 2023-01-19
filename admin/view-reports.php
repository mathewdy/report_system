<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');



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

    if (empty($_GET['rid'])) {    //lrn verification starts here
        echo "<script>alert('User id not found');
        window.location = 'reports.php';</script>";
        exit();
    }

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
    <!-- nadagdag -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>View-report</title>
</head>

<body>

    <!-- query of db -->
    <?php
    $query_data = "SELECT * FROM `reports` WHERE report_id = '$report_id'";
    $run_query_data = mysqli_query($conn, $query_data);
    $rows = mysqli_fetch_array($run_query_data);
    ?>

    <form action="" method="POST" enctype="multipart/form-data">

        <?php


        $status = $rows['status'];

        if ($status == 2) {
        ?>
            <!-- burahin mo tong comment pag ngawa mo na  -->
            <!-- tapos etong switch is lakihan mo onti -->
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="constraint_checkbox">
            </div>
            <div>
                <!-- RYAN IBABA MO NALANG TONG UPDATE NA BUTTON -->
                <button type="submit" class="btn btn-primary switch" name="update" disabled>Update</button>
            </div>

            <input type="file" name="files[]" id="" accept="image/jpeg,image/gif,image/png,application/pdf,image" multiple disable>

        <?php
        }
        ?>

        <label for="">From:</label>
        <input type="text" name="from" class="switch" value="<?php if (empty($rows['from_user'])) {
                                                                    echo "";
                                                                } else {
                                                                    echo $rows['from_user'];
                                                                } ?> " disabled>
        <br>
        <label for="">To:</label>
        <input type="text" name="to" class="switch" value="<?php if (empty($rows['to_user'])) {
                                                                echo "";
                                                            } else {
                                                                echo $rows['to_user'];
                                                            } ?> " disabled>
        <br>
        <label for="">Subject:</label>
        <input type="text" name="subject" class="switch" value="<?php if (empty($rows['subject'])) {
                                                                    echo "";
                                                                } else {
                                                                    echo $rows['subject'];
                                                                } ?>" disabled>

        <textarea id="tiny" name="statement" class="switch" disabled> <?php if (empty($rows['message'])) {
                                                                            echo "";
                                                                        } else {
                                                                            echo $rows['message'];
                                                                        }  ?>   </textarea disabled>


        <h1>Images</h1>
        <img src="<?php if (empty($rows['image'])) {
                        echo "";
                    } else {
                        echo "pdf/" . $rows['image'];
                    } ?>" alt="No image" height="500px" width="500px">
        
        <h1>Document</h1>
        <embed type="application/pdf" src="<?php if (empty($rows['pdf_files'])) {
                                                echo "";
                                            } else {
                                                echo "pdf/" . $rows['pdf_files'];
                                            } ?> " width="500" height="500" > 


    </form>

    <script>
    tinymce.init({
    selector: 'textarea#tiny',
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
 <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
 <script src="../src/js/switch.js"> </script>


  

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

        //insert a query
        $update_report = "UPDATE `reports` SET `from_user`='$from',`to_user`='$to',`subject`='$subject',`message`='$statement',`pdf_files`='$insert_pdf_ValuesSQL',`image`='$insert_images_ValuesSQL',`status`='1',`date_updated`='$date',`time_updated`='$time' WHERE report_id = '$report_id'";
        $run_update_report = mysqli_query($conn, $update_report);

        if ($run_update_report) {
            echo "sucess";
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
            echo "sucess";
        } else {
            $conn->error;
        }
    }
}

?>