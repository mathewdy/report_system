<?php
date_default_timezone_set('Asia/Manila');
include('../connection.php');
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
    $user_type = 1;

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);






    // $query_user_id = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1";
    // $run_user_id = mysqli_query($conn, $query_user_id);
    // if (mysqli_num_rows($run_user_id) > 0) {
    //     foreach ($run_user_id as $row) {
    //         $user_id = $row['user_id'];
    //         $get_number = str_replace("ADM", "", $user_id);
    //         $id_increment = $get_number + 1;
    //         $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

    //         $id = "ADM" . $get_string;

    $id = "ADM00001";

    $register = "INSERT INTO `users`(`user_type`, `user_id`, `username`, `password`, `date_time_created`, `date_time_updated`) 
    VALUES ('$user_type','$id','$username','$hashed_password','$dateCreated','$dateUpdated')";
    $run_register = mysqli_query($conn, $register);

    if ($run_register) {
        echo ("REGISTERED");
    } else {



        $conn->error;
    }


    echo ($register);
}


// }
// }



?>