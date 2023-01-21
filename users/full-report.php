<?php

include('../connection.php');
session_start();
ob_start();

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



    <!---di pa to tapos----->

    <a href="view-report.php">Back</a>

    <?php


    if (isset($_GET['to_user'])) {


        $to_user = $_GET['to_user'];

        $query_data = "SELECT * FROM `reports` WHERE to_user = '$to_user'";
        $run_query_data = mysqli_query($conn, $query_data);
        $rows = mysqli_fetch_array($run_query_data);
    }






    ?>



    <form action="" method="POST" enctype="multipart/form-data">

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
        <textarea id="default">
        <?php if (empty($rows['message'])) {
            echo "";
        } else {
            echo $rows['message'];
        }  ?>  
    
        </textarea disabled readonly>

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


ob_end_flush();
?>