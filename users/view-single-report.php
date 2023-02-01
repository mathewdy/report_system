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

    if (isset($_GET['report_id'])) {
        $report_id = $_GET['report_id'];
        $query_report = "SELECT * FROM sent WHERE report_id = '$report_id'";
        $run_report_id = mysqli_query($conn, $query_report);

        if (mysqli_num_rows($run_report_id) > 0) {
            foreach ($run_report_id as $row) {
    ?>

                <form action="" method="post" enctype="multipart/form-data">

                    <label for="">From:</label>
                    <input type="text" name="from" class="switch" value="<?php if (empty($row['from_user'])) {
                                                                                echo "";
                                                                            } else {
                                                                                echo $row['from_user'];
                                                                            } ?> " readonly>
                    <br>
                    <label for="">To:</label>
                    <input type="text" name="to" class="switch" value="<?php if (empty($row['to_user'])) {
                                                                            echo "";
                                                                        } else {
                                                                            echo $row['to_user'];
                                                                        } ?> " readonly>
                    <br>
                    <label for="">Subject:</label>
                    <input type="text" name="subject" class="switch" value="<?php if (empty($row['subject'])) {
                                                                                echo "";
                                                                            } else {
                                                                                echo $row['subject'];
                                                                            } ?>" readonly>
                    <br>

                    <label for="">OPR:</label>
                    <input type="text" name="subject" class="switch" value="<?php if (empty($row['opr'])) {
                                                                                echo "";
                                                                            } else {
                                                                                echo $row['opr'];
                                                                            } ?>" readonly>
                    <br>



                    <textarea id="default" name="statement" readonly>
                        <?php if (empty($row['message'])) {
                            echo "";
                        } else {
                            echo $row['message'];
                        }  ?>  
                    </textarea disabled >

                     <h1>Document</h1>
        <embed type="application/pdf" src="<?php if (empty($row['pdf_files'])) {
                                                echo "";
                                            } else {
                                                echo "Images/" . $row['pdf_files'];
                                            } ?> " width="500" height="500" > 



                    </form>

                    

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