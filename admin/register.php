<?php
date_default_timezone_set('Asia/Manila');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register admin</title>
</head>

<body>
    <form action="" method="POST">
        <label for="">Username</label>
        <input type="text" name="username" maxlength="25" required>
        <label>Password</label>
        <input type="password" name="password" maxlength="50" required>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {


    $dateCreated = date("Y-m-d h:i:a");
    $dateUpdated = date("Y-m-d h:i:a");



    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = 0;

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $register = "INSERT INTO `users`(`username`, `password`, `user_type`, `date_time_created`, `date_time_updated`) 
    VALUES('$username','$hashed_password','$user_type','$dateCreated','$dateUpdated')";
    $run_register = mysqli_query($conn, $register);

    if ($run_register) {
        echo ("REGISTERED");
    } else {

        $conn->error;
    }
}



?>