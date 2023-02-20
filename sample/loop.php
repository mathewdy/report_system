<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
$validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
$run_validate_report = mysqli_query($conn, $validate_report);


if (mysqli_num_rows($run_validate_report) > 0) {

  foreach ($run_validate_report as $row) {
    $report_id = $row['report_id'];
    $get_number = str_replace("RID", "", $report_id);
    $id_increment = $get_number + 1;
    $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

    $report_id = "RID" . $get_string;
  }
}


?>