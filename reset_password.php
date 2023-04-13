<?php
include('connection.php');
ob_start();
if(!isset($_GET['email'])){
    header("location:http://$_SERVER[SERVER_NAME]/report_system/users/login.php");
}
$email = $_GET['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DILG</title>
</head>
<body>
    <h1>Reset Password</h1> 
    <form action="" method="POST">
        <label for="">New Password</label>
        <input type="password" name="password">
        <label for="">Confirm Password</label>
        <input type="password" name="c_password">
        <button type="submit" name="submit">Confirm</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if(empty($password)){
        echo "Please enter your password";
    } else if(empty($c_password)){
        echo "Confirm your password";
    } else if($password != $c_password){
        echo "Password do not match";
    }else{
        $get_email = "SELECT * FROM users WHERE email = '$email'";
        $query_get_email = mysqli_query($conn, $get_email);
        $rows = mysqli_fetch_array($query_get_email);
        $user_type = $rows['user_type'];

        $update_password = "UPDATE users set password = '$hashed_password' where email = '$email'";
        $query_update_password = mysqli_query($conn, $update_password);

        if($query_update_password == true){
            if($user_type == '1'){
                header("location:http://$_SERVER[SERVER_NAME]/report_system/admin/login.php?rst-out");
            }else{
                header("location:http://$_SERVER[SERVER_NAME]/report_system/users/login.php?rst-out");
            }
        }

    }
}
?>