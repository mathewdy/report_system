<?php

include('connection.php');

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
    <form action="" method="POST">
        <input type="text" name="name">
        <input type="date" name="date" id="">
        <input type="submit" name="send" value="Send">
    </form>




     
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<!-- <script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('ac61d56134893cb6bd8b', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
//   alert(JSON.stringify(data));
$.ajax({url: "sample-realtime1.php", success: function(result){
    $("#table1").html(result);
  }});
});
</script> -->
</body>
</html>

<?php
require __DIR__ . '/vendor/autoload.php';


if(isset($_POST['send'])){

    
    $name = $_POST['name'];
    $date = $_POST['date'];

    $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        'ac61d56134893cb6bd8b',
        '88335cc2df68ad7e3ae5',
        '1544747',
        $options
      );
    


    $query = "INSERT INTO try (name,date) VALUES ('$name' , '$date')";
    $run = mysqli_query($conn,$query);

    if($run){
        $data['message'] = $name . $date;
        $pusher->trigger('my-channel', 'my-event', $data);
        echo "added";
    }else{
        echo "error";
    }
}

?>