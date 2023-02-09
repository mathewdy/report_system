<?php
include('../connection.php');
// query ko naman lahat ngsinend sakin na info
// from_user, subject,date, time
session_start();
$barangay = $_SESSION['barangay'];
$query_reports = "SELECT from_user, subject, date_created, time_created FROM reports WHERE to_user = '$barangay' ";

    $run_reports = mysqli_query($conn,$query_reports);

    if(mysqli_num_rows($run_reports) > 0){
        foreach($run_reports as $row_reports){
            ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="dropdown-item" href="#">
                            <?php 
                            if($row_reports['from_user']== '1')
                            { 
                                echo "DILG Admin";
                            } 
                            ?>

                            <?php echo $row_reports['subject']?>
                            <?php echo $row_reports['date_created'];?>
                            <?php echo $row_reports['time_created']?>
                        </a>
                    </li>
                </ul>
            <?php
        }
    }


?>

