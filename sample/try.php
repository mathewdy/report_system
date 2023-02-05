<!DOCTYPE html>
<?php include('../connection.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="checkbox" name="send" value="try">
        <button type="submit" name="submit">confirm</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    if(isset($_POST['send'])){
        $sql_get_users = "SELECT * FROM users where user_type = '2'";
          $query_get_users = mysqli_query($conn, $sql_get_users);
        while($rows = mysqli_fetch_array($query_get_users)){
            $emails = $rows['email'];
            $send_all_report = "<br>"."INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('1','$emails')";
        // $q_send_all_report = mysqli_query($conn, $send_all_report);
        echo $send_all_report;
        }
    }else{
        echo "burikat";
    }
}
?>