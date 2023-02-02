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

    if(isset($_GET['report_id']) && isset($_GET['to_user'])) {
        $email = $_GET['to_user'];
        $report_id = $_GET['report_id'];
        $query_report = "SELECT * FROM sent WHERE report_id = '$report_id' AND to_user = '$email'";
        $run_report_id = mysqli_query($conn, $query_report);

        if (mysqli_num_rows($run_report_id) > 0) {
            foreach ($run_report_id as $row) {

                ?>
                    <label for="">From:</label>
                    <input type="text" name="from" value="<?php echo $row['from_user'];?> " readonly>
                    <br>
                    <label for="">To:</label>
                    <input type="text" name="to" value="<?php echo $row['to_user']?>" readonly>
                    <br>
                    <label for="">Barangay:</label>
                    <input type="text" name="brgy" value="<?php echo $row['barangay']?> " readonly>
                    <br>

                    <label for="">Date Start:</label>
                    <input type="text" name="date_start" value="<?php echo $row['date_start']?>" readonly> 
                    <br>
                    <label for="">Date End:</label>
                    <input type="text" name="date_end" value="<?php echo $row['date_end']?>" readonly>
                    <br>
                    <label for="">Subject:</label>
                    <input type="text" name="subject" value="<?php echo $row['subject'] ?>"readonly>
                    <br>
                    <label for="">OPR:</label>
                    <input type="text" name="opr" value="<?php echo $row['opr'] ?>"readonly>
                    <br>

                    <textarea id="tiny" name="statement"> <?php echo $row['message'] ?> </textarea>

                    <h1>Document</h1>
                    <embed type="application/pdf" src="<?php if (empty($row['pdf_files'])) {
                                                            echo "";
                                                        } else {
                                                            echo "pdf/" . $row['pdf_files'];
                                                        } ?> " width="500" height="500">
                <?php


            }

        }
    }
            

          
        

?>
</body>

<script>
    // Move focus to specific element
    tinymce.init({
    selector: 'textarea#tiny',
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