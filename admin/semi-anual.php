<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

$curMonth = date("m", time());
$curQuarter = ceil($curMonth / 3);






if ($curQuarter == 1 || $curQuarter == 2) {
    $months = ['January', 'February', 'March', 'April', 'May', 'June'];
} elseif ($curQuarter == 3 || $curQuarter == 4) {
    $months = ['July', 'August', 'September', 'October', 'November', 'December'];
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semi - Anual</title>
</head>

<body>
    <?php
    $sql = "SELECT *, EXTRACT(Month FROM date_created) AS month,
                            MONTHNAME(date_created) as monthname
                            FROM reports 
                            WHERE   status = '1' AND YEAR(date_created) = YEAR(CURDATE())
                            ORDER BY month, date_created  ASC";

    $run = mysqli_query($conn, $sql);

    ?>


    <h1> <?php echo $months[0] ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($run) > 0) {
                $count = 1;
                foreach ($run as $row) {

                    $month = $row['monthname'];

                    if ($month == $months[0]) {

            ?>

                        <tr>
                            <td><?php echo $count  ?></td>
                            <td><?php echo $row['subject']  ?></td>
                            <td><?php echo $row['date_created']  ?></td>




                        </tr>


            <?php
                    }
                    $count++;
                }
            }
            ?>

        </tbody>
    </table>


    <h1> <?php echo $months[1] ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($run) > 0) {
                $count = 1;
                foreach ($run as $row) {

                    $month = $row['monthname'];

                    if ($month == $months[1]) {

            ?>

                        <tr>
                            <td><?php echo $count  ?></td>
                            <td><?php echo $row['subject']  ?></td>
                            <td><?php echo $row['date_created']  ?></td>




                        </tr>


            <?php
                    }
                    $count++;
                }
            }
            ?>

        </tbody>
    </table>



    <h1> <?php echo $months[2] ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($run) > 0) {
                $count = 1;
                foreach ($run as $row) {

                    $month = $row['monthname'];

                    if ($month == $months[2]) {

            ?>

                        <tr>
                            <td><?php echo $count  ?></td>
                            <td><?php echo $row['subject']  ?></td>
                            <td><?php echo $row['date_created']  ?></td>




                        </tr>


            <?php
                    }
                    $count++;
                }
            }
            ?>

        </tbody>
    </table>

    <h1> <?php echo $months[3] ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($run) > 0) {
                $count = 1;
                foreach ($run as $row) {

                    $month = $row['monthname'];

                    if ($month == $months[3]) {

            ?>

                        <tr>
                            <td><?php echo $count  ?></td>
                            <td><?php echo $row['subject']  ?></td>
                            <td><?php echo $row['date_created']  ?></td>




                        </tr>


            <?php
                    }
                    $count++;
                }
            }
            ?>

        </tbody>
    </table>


    <h1> <?php echo $months[4] ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($run) > 0) {
                $count = 1;
                foreach ($run as $row) {

                    $month = $row['monthname'];

                    if ($month == $months[4]) {

            ?>

                        <tr>
                            <td><?php echo $count  ?></td>
                            <td><?php echo $row['subject']  ?></td>
                            <td><?php echo $row['date_created']  ?></td>




                        </tr>


            <?php
                    }
                    $count++;
                }
            }
            ?>

        </tbody>
    </table>


    <h1> <?php echo $months[5] ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($run) > 0) {
                $count = 1;
                foreach ($run as $row) {

                    $month = $row['monthname'];

                    if ($month == $months[5]) {

            ?>

                        <tr>
                            <td><?php echo $count  ?></td>
                            <td><?php echo $row['subject']  ?></td>
                            <td><?php echo $row['date_created']  ?></td>




                        </tr>


            <?php
                    }
                    $count++;
                }
            }
            ?>

        </tbody>
    </table>



</body>

</html>