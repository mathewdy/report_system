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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
    <title>Add Notes</title>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">



        <label for="">Content</label>
        <div>
            <textarea id="tiny" name="content"> </textarea>
        </div>

        <input type="submit" name="add" value="Add">


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
if (isset($_POST['add'])) {

    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $content = $_POST['content'];
    $content = mysqli_escape_string($conn, $content);


    $insert = "INSERT INTO `notes`(`user_id`, `content`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
    VALUES ('$user_id','$content','$date','$time','$date','$time')";

    $run_insert = mysqli_query($conn, $insert);

    if ($run_insert) {
        echo "sucess";
    } else {
        $conn->error;
    }
}






?>