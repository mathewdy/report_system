<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

$curMonth = date("m", time());
$curQuarter = ceil($curMonth / 3);

if ($curQuarter == 1) {
    $months = ['January', 'February', 'March'];
} elseif ($curQuarter == 2) {
    $months = ['April', 'May', 'June'];
} elseif ($curQuarter == 3) {
    $months = ['July', 'August', 'September'];
} elseif ($curQuarter == 4) {
    $months = ['October', 'November', 'December'];
}







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quarterly</title>
</head>

<body>

    <?php




    $sql = "SELECT *, EXTRACT(Quarter FROM date_created) AS quarter, 
    MONTHNAME(date_created) as monthname 
    FROM reports 
    WHERE status = '1' AND YEAR(date_created) = YEAR(CURDATE()) 
    ORDER BY quarter, date_created ASC";

    $run = mysqli_query($conn, $sql);
    ?>

    <h1>Quarterly</h1>

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
            } else {
                echo "No Report";
            }
            ?>

        </tbody>
    </table>



</body>

</html>