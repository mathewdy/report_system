<?php


include('../connection.php');
session_start();
// query ko naman lahat ngsinend sakin na info
    // from_user, subject,date, time
    $query_reports = "SELECT from_user, subject, date_created, time_created FROM reports WHERE to_user = '1' ";
    $run_reports = mysqli_query($conn,$query_reports);

    if(mysqli_num_rows($run_reports) > 0){
        foreach($run_reports as $row_reports){
            ?>
                <p>
                    <?php echo $row_reports['from_user']?>;
                </p>
                <p>
                    <?php echo $row_reports['subject']?>
                </p>
                <p><?php echo $row_reports['date_created']?></p>
                <p><?php echo $row_reports['time_created']?></p>
            <?php
        }
    }



?>