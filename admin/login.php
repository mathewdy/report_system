<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
</head>

<body>
    <form action="" method="POST">
        <label for="">Username</label>
        <input type="text" name="username" maxlength="25" required>
        <label>Password</label>
        <input type="password" name="password" maxlength="50" required>
        <input type="submit" name="login" value="login">
    </form>
</body>

</html>


<?php
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT username,password,user_type,user_id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {

            if ($row['user_type'] == '2') {
                echo "<script>alert('User unavailable'); </script>";
            } else {

                if (password_verify($password, $row['password'])) {
                    //fetch mo muna yung user id, para ma sessidon papunta sa kabila 
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $row['user_id'];
                    header("location: index.php");
                    die();
                }
            }
        }
    } else {
        echo "User not found" . $conn->error;
    }
}


?>