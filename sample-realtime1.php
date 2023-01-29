<?php
include('connection.php');
require __DIR__ . '/vendor/autoload.php';

//dito sa part na to yung  output,


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
    
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="result">

                <?php

                $query = "SELECT * FROM try";
                $run = mysqli_query($conn,$query);

                if(mysqli_num_rows($run) > 0){
                    foreach($run as $row){
                        ?>
                            <tr>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['date']?></td>
                            </tr>

                        <?php
                    }
                }

                ?>

            
            </tbody>
            
        </table>
    </div>


     
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
    $.ajax({url: "sample-realtime2.php", success: function(result){
    $("#result").html(result);
    }});
});
</script>
</body>
</html>


