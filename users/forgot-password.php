<?php

include('../connection.php');
ob_start();
session_start();


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


        <label for="">Enter your email</label>
        <input type="email" name="email">
        <label for="">Enter your user ID</label>
        <input type="text" name="user_id">
        <input type="submit" name="next" value="Enter">


    </form>
</body>
</html>


<?php

if(isset($_POST['next'])){
    $email = $_POST['email'];
    $email = mysqli_escape_string($conn, $email);
    $user_id = $_POST['user_id'];
    $user_id = mysqli_escape_string($conn, $user_id);


    $query = "SELECT * FROM users WHERE user_id = '$user_id' AND email = '$email'";
    $run = mysqli_query($conn,$query);

    if($run){
        echo "<script>window.location.href='reset-password.php'</script>";
    }else{
        echo "error" . $conn->error;
    }

}


ob_end_flush();

?>