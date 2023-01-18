<?php
include('../connection.php');
session_start();
ob_start();

$email = $_SESSION['email'];

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
    <title>View-report</title>
</head>

<body>

<a href="home.php">Back</a>
    <?php


    $query_reports = "SELECT * FROM REPORTS WHERE to_user = '$email'";
    $run_reports = mysqli_query($conn,$query_reports);

    //dapat dito riri, mag mumukhang table parang lang

    if(mysqli_num_rows($run_reports) > 0){
        $no = 1;
        foreach($run_reports as $row){
            ?>

                <br>
                <label for="">No. <?php echo $no?></label>
                <br>
                <label for=""><?php echo $row['from_user']?></label>
                <br>
                <p><?php echo $row['subject']?></p>


                <a href="full-report.php?to_user=<?php echo $row['to_user']?>">View Entire Report</a>

                <br>
                <label for="">
                    <?php 
                    echo $date = date("M-d-Y", strtotime($row['date_created'])); 
                    ?>
                </label>
                

            <?php
            $no++;
        }
    }else{
        echo "No reports";
    }


    ?>



</body>

</html>

<?php

ob_end_flush();

?>