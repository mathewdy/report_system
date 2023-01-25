<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table id="data">
        <thead>
            <tr>
                <th>Week</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT *, EXTRACT(week FROM date_created) AS week
                    FROM reports 
                    WHERE status = '1' AND  YEAR(date_created) = YEAR(CURDATE())
                    ORDER BY week, date_created ASC";

            $run = mysqli_query($conn, $sql);

            if (mysqli_num_rows($run) > 0) {

                foreach ($run as $row) {

            ?>

                    <tr>
                        <td><?php echo $row['week'] ?></td>
                        <td><?php echo $row['date_created'] ?></td>

                    </tr>



            <?php
                }
            }

            ?>
        </tbody>
    </table>

</body>

</html>