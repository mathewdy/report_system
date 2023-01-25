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
    <title>Weekly</title>
</head>

<?php

$sql = "SELECT *, EXTRACT(week FROM date_created) AS week,
                    EXTRACT(MONTH FROM date_created) AS month
                    FROM reports 
                    WHERE status = '1' AND  YEAR(date_created) = YEAR(CURDATE()) AND MONTH(date_created) = MONTH(CURDATE())
                    ORDER BY week, date_created ASC";

$run = mysqli_query($conn, $sql);

$month = date('F');

?>




<body>
    <h1><?php echo $month; ?></h1>
    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($run) > 0) {
                foreach ($run as $row) {
                    $month = $row['month'];



            ?>

                    <tr>
                        <td><?php echo $month ?></td>
                        <td><?php echo $row['subject']  ?></td>


                    </tr>


            <?php

                }
            }
            ?>

        </tbody>
    </table>
</body>

</html>