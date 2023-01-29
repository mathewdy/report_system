<?php
include('../connection.php');
    $query_sent_reports = "SELECT * FROM reports";
    $run_reports = mysqli_query($conn,$query_sent_reports);
    if(mysqli_num_rows($run_reports) > 0){
        foreach($run_reports as $row){
            ?>

                <tr>
                    <td><?php echo $row['report_id']?></td>
                    <td><?php echo $row['to_user']?></td>
                    <td><a href="view-single-report.php?report_id=<?php echo $row['report_id']?>"><?php echo $row['subject']?></a></td>
                    <td>
                        <?php 
                        $date = date_create($row['date_created']);
                        echo date_format($date, "M-d-Y");
                        ?>
                    </td>
                </tr>

            <?php
        }
    }

?>