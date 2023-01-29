<?php
include('../connection.php');
session_start();
ob_start();
// dapat magawa ko tong realtime sa add-reports
require '../vendor/autoload.php';

// dito sa sent report, kung kanino ko pinadala, subject, date, *bonus na lang kung lagyan to ng filter
// or gawing data table ni ryn to

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
    

<a href="home.php">Back</a>
<table>
    <thead>
        <tr>
            <th>Report ID:</th>
            <th>To:</th>
            <th>Subject:</th>
            <th>Date:</th>
        </tr>
    </thead>
    <tbody id="result_sent">

        <?php

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

        
    </tbody>
</table>



<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('ac61d56134893cb6bd8b', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    // alert(JSON.stringify(data));
    $.ajax({url: "sent-reports1.php", success: function(result){
    $("#result_sent").html(result);
    }});
});
</script>
</body>
</html>