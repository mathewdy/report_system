<?php
include('../connection.php');
session_start();
$email = $_SESSION['email'];
ob_start();

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
        <label for="">New Password:</label>
        <input type="password" name="new_password">
        <label for="">Confirm Password:</label>
        <input type="password" name="password_2">
        <input type="submit" name="reset_password" value="Reset">
    </form>
</body>
</html>

<?php
if(isset($_POST['reset_password'])){
    $new_password = $_POST['new_password'];
    $password_2 = $_POST['password_2'];

    $hashed_password = password_hash($password_2, PASSWORD_DEFAULT);


    if($new_password != $password_2){
        echo "Password doesn't matched";
    }else{
        $update_pass = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
        $run = mysqli_query($conn,$update_pass);

        if($run){
            echo "updated";
        }else{
            echo "error " . $conn->error;
        }
    }

}
ob_end_flush();
?>