<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name">
        <input type="submit" name="send" value="send">
    </form>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('b66888c27162a9de31eb', {
    cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    // alert(JSON.stringify(data));
    //gawing ajax
    
    $.ajax({url: "demo_test.txt", success: function(result){
        $("#div1").html(result);
    }});
    
});
</script>

</body>
</html>

<?php
include('../connection.php');
require '../vendor/autoload.php';


if(isset($_POST['send'])){

    $name = $_POST['name'];

    $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        'b66888c27162a9de31eb',
        'f78b15853c11ffe40959',
        '1544749',
        $options
      );


    $sql ="INSERT INTO realtime (name) VALUES ('$name')";
    $run = mysqli_query($conn,$sql);

    if($run){
        $data['message'] = $name;
        $pusher->trigger('my-channel', 'my-event', $data);
    }

  

}

?>
