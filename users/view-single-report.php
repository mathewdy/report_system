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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    
<a href="sent-reports.php">Back</a>
    <?php

        if(isset($_GET['report_id'])){
            $report_id = $_GET['report_id'];
            $query_report = "SELECT * FROM reports WHERE report_id = '$report_id'";
            $run_report_id = mysqli_query($conn,$query_report);

            if(mysqli_num_rows($run_report_id) > 0){
                foreach($run_report_id as $row){
                    ?>

                    <textarea id="default" name="statement" readonly>
                        <?php if (empty($row['message'])) {
                            echo "";
                        } else {
                            echo $row['message'];
                        }  ?>  
                    </textarea disabled >

                    <?php
                }
            }
        }

    ?>



<script>
    // Move focus to specific element
    tinymce.init({
    selector: 'textarea#default',
    readonly: true,
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