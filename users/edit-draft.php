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



<a href="drafts.php">Back</a>
    <?php

        if(isset($_GET['status']) && isset($_GET['user_id']) && isset($_GET['report_id'])){
            echo $status = $_GET['status'];
            echo $user_id = $_GET['user_id'];
            echo $report_id = $_GET['report_id'];


            $query = "SELECT * FROM reports WHERE status = '$status' AND user_id = '$user_id' AND report_id = '$report_id'";
            $run = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($run);



        }



    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <textarea id="default"> 
            <?php if (empty($row['message'])) {
                echo "";
            } else {
                echo $row['message'];
            }  ?>  
        </textarea disabled readonly>

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


ob_end_flush();

?>