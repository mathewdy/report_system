<?php
$db = new mysqli("localhost", "root", "", "test");
if ($db == false) {
    echo "error" . $db->error;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="" method="post" enctype="multipart/form-data">
        Select Image Files to Upload:
        <input type="file" name="files[]" multiple>
        <input type="submit" name="submit" value="UPLOAD">

        <!-- delete of page -->
        <br>
        <a href="DELETE_PAGE" onClick="return confirm('Delete This account?')">Delete Account</a>
    </form>


</body>

</html>



<?php

if (isset($_POST['submit'])) {
    // File upload configuration 
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
                            $insertValuesSQL .= $fileName;

                            $insert = "INSERT INTO `pdf`(`user_id`, `file_name`) VALUES ('aa','$insertValuesSQL')";
                            $run_insert = mysqli_query($db, $insert);
                            if ($run_insert) {
                                printf($run_insert);
                            } else {
                                echo ($insert);
                            }
                        } else {
                            $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                        }
                    } elseif (strpos($mime, 'image/') === 0) {

                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                            // Image db insert sql 
                            $insertValuesSQL .= $fileName;

                            $insert = "INSERT INTO `images`(`user_id`, `file_name`) VALUES ('aa','$insertValuesSQL')";
                            $run_insert = mysqli_query($db, $insert);
                            if ($run_insert) {
                                printf($run_insert);
                            } else {
                                echo ($insert);
                            }
                        } else {
                            $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                        }
                    } else {
                        $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
                    }
                }
            }
        }

        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database 

        } else {
            $statusMsg = "Upload failed! " . $errorMsg;
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
}

?>


<!-- strpos($mime, 'image/') === 0 -->

<!-- INSERT INTO pdf (file_name, uploaded_on) VALUES $insertValuesSQL -->