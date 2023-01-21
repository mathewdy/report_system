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
    <title>Ranking</title>
</head>

<body>
    <table id="data">
        <thead>
            <tr>
                <th>No.</th>
                <th>Barangay</th>
                <th>Total of Reports</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT to_user, COUNT(to_user) as count
                    FROM reports
                    WHERE status = '1'
                    GROUP BY to_user
                    ORDER BY count DESC ";
            $run = mysqli_query($conn, $sql);

            if (mysqli_num_rows($run) > 0) {
                $count = 0;
                foreach ($run as $row) {

                    $count++;
            ?>

                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['to_user'] ?></td>
                        <td><?php echo $row['count'] ?></td>

                    </tr>



            <?php
                }
            }

            ?>
        </tbody>
    </table>



</body>

</html>