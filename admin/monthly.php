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
    <title>Monthly</title>
</head>

<?php

$sql = "SELECT *, EXTRACT(Month FROM date_created) AS month,
                            MONTHNAME(date_created) as monthname
                            FROM reports 
                            WHERE   status = '1' AND YEAR(date_created) = YEAR(CURDATE())
                            ORDER BY month, date_created  ASC";

$run = mysqli_query($conn, $sql);



?>

<body>
    <!-- january -->
    <h1>January</h1>
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

                    $month = $row['month'];

                    if ($month == 1) {

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


    <!-- Febuary -->
    <h1>Febuary</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 2) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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



    <!-- March -->
    <h1>March</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 3) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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


    <!-- April -->
    <h1>April</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 4) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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


    <!-- May -->
    <h1>May</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 5) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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


    <!-- June -->
    <h1>June</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 6) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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


    <!-- july -->
    <h1>July</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 7) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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


    <!-- August -->
    <h1>August</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 8) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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

    <!-- September -->
    <h1>September</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 9) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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


    <!-- October -->
    <h1>October</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 10) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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

    <!-- November -->
    <h1>November</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 11) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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


    <!-- December -->
    <h1>December</h1>
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

                foreach ($run as $row) {
                    $count = 1;
                    $month = $row['month'];

                    if ($month == 12) {

            ?>

                        <tr>
                            <td><?php echo $count ?></td>
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