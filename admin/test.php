<?php
include("../connection.php");
date_default_timezone_set('Asia/Manila');



$user_id = "ADM00001";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
    <title>Document</title>
</head>

<body>


    <form action="" method="post" enctype="multipart/form-data">


        <label for="">Date Start</label>
        <input type="date" name="date_start">
        <label for="">Date End</label>
        <input type="date" name="date_end">

        <br>



        <label for="">To:</label>
        <input type="text" name="to">
        <br>


        <label> From </label>
        <input type="text" name="from">

        <br>



        <label for="">Subject</label>
        <input type="text" name="subject">

        <br>

        <label> Barangay </label>
        <br>

        <label for="">Barangay 1</label>
        <input type="checkbox" name="brgy[]" value="Barangay 1">

        <br>

        <label for="">Barangay 2</label>
        <input type="checkbox" name="brgy[]" value="Barangay 2">
        <br>
        <label for="">Barangay 3</label>
        <input type="checkbox" name="brgy[]" value="Barangay 3">
        <br>
        <label for="">Barangay 4</label>
        <input type="checkbox" name="brgy[]" value="Barangay 4">
        <br>
        <label for="">Barangay 5</label>
        <input type="checkbox" name="brgy[]" value="Barangay 5">
        <br>
        <label for="">Barangay 6</label>
        <input type="checkbox" name="brgy[]" value="Barangay 6">
        <br>
        <label for="">Barangay 7</label>
        <input type="checkbox" name="brgy[]" value="Barangay 7">
        <br>

        <div>
            <textarea id="tiny" name="statement"> </textarea>
        </div>

        <input type="file" name="pdf_file" accept=".pdf" title="Upload PDF" />


        <input type="submit" name="submit" value="submit">

        <!-- delete of page -->


    </form>

    <script>
        tinymce.init({
            selector: 'textarea#tiny',
            // width: 2000,
            height: 300,
            resize: false,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | removeformat | code table help | save | restoredraft',
            menu: {
                favs: {
                    title: 'menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',

        });
    </script>



</body>

</html>



<?php

if (isset($_POST['submit'])) {

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


    $barangay = $_POST['brgy'];




    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $date_start = date('Y-m-d', strtotime($_POST['date_start']));
    $date_end = date('Y-m-d', strtotime($_POST['date_end']));

    $to = $_POST['to'];
    $to = mysqli_escape_string($conn, $to);


    $date_new_start = new DateTime($date_start);
    $date_new_end = new DateTime($date_end);

    $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
    $days = intval($diff);






    $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
    $days = intval($diff);






    //file upload 
    if (isset($_FILES['pdf_file']['name'])) {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];

        move_uploaded_file($file_tmp, "./pdf/" . $file_name);


        $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
        $run_validate_report = mysqli_query($conn, $validate_report);


        if (mysqli_num_rows($run_validate_report) > 0) {

            foreach ($run_validate_report as $row) {
                $report_id = $row['report_id'];
                $get_number = str_replace("RID", "", $report_id);
                $id_increment = $get_number + 1;
                $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

                $report_id = "RID" . $get_string;

                //insert a query

                foreach ($barangay as $brgy) {

                    $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
                    $run_insert_report = mysqli_query($conn, $insert_report);
                }

                if ($run_insert_report) {
                    echo "<script>alert('Success')</script>";
                } else {
                    $conn->error;
                }
            }
        } else {

            $report_id = "RID00001";


            foreach ($barangay as $brgy) {

                $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
                $run_insert_report = mysqli_query($conn, $insert_report);
            }
            if ($run_insert_report) {
                echo "<script>alert('Success')</script>";
            } else {
                $conn->error;
            }
        }
    } else {

        $file_name = " ";



        $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
        $run_validate_report = mysqli_query($conn, $validate_report);


        if (mysqli_num_rows($run_validate_report) > 0) {

            foreach ($run_validate_report as $row) {
                $report_id = $row['report_id'];
                $get_number = str_replace("RID", "", $report_id);
                $id_increment = $get_number + 1;
                $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

                $report_id = "RID" . $get_string;


                foreach ($barangay as $brgy) {

                    $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
                    $run_insert_report = mysqli_query($conn, $insert_report);
                }

                //insert a query


                if ($run_insert_report) {
                    echo "<script>alert('Success')</script>";
                } else {
                    $conn->error;
                }
            }
        } else {

            $report_id = "RID00001";


            foreach ($barangay as $brgy) {

                $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `message`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
                     VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$statement','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
                $run_insert_report = mysqli_query($conn, $insert_report);
            }

            if ($run_insert_report) {
                echo "<script>alert('Success')</script>";
            } else {
                $conn->error;
            }
        }
    }





    // validation of report id 
    //insert report id 


}




?>