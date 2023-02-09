<?php

include('../connection.php');

$sql = "SELECT * FROM realtime";
$run = mysqli_query($conn,$sql);
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
            </tr>
        </thead>
        <tbody id="result">
            <?php

                if(mysqli_num_rows($run) > 0){
                    foreach($run as $row){
                        ?>
                        <tr>
                            <td>Melendez Dj</td>
                        </tr>

                        <?php
                    }
                }

            ?>
            
        </tbody>
    </table>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('b66888c27162a9de31eb', {
    cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    // alert(JSON.stringify(data));
    $.ajax({url: "output-realtime1.php", success: function(result){
        $("#result").html(result);
    }});
    
});
</script>

</body>
</html>

