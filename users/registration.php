<?php

include('../connection.php');
session_start();
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

    <h1>Registration</h1>
    <form action="" method="POST" enctype="multipart/form-data">

        <h2>Log In Info</h2>a
        <label for="">Username</label>
        <br>
        <input type="text" name="username">
        <br>
        <label for="">Password</label>
        <br>
        <input type="password" name="password" id="">

        <h2>Personal Info</h2>
        <label for="">First Name</label>
        <br>
        <input type="text" name="first_name">
        <br>
        <label for="">Middle Name</label>
        <br>
        <input type="text" name="middle_name">
        <br>
        <label for="">Last Name</label>
        <br>
        <input type="text" name="last_name">
        <br>
        <label for="">Date of Birth</label>
        <br>
        <input type="date" name="date_of_birth" id="">
        <br>
        <label for="">Address</label>
        <br>
        <input type="text" name="address">
        <br>
        <label for="">Barangay</label>
        <br>
        <input type="text" name="barangay">
        <br>
        <label for="">Barangay ID</label>
        <br>
        <input type="text" name="barangay_id">
        <br>
        <label for="">Image</label>
        <input type="file" name="image" id="">
        <br>
        <input type="submit" name="register" value="Register">


    </form>
</body>

</html>

<?php
if (isset($_POST['register'])) {

    //year month date
    date_default_timezone_set("Asia/Manila");
    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $user_type = 2;
    $username = $_POST['username'];

    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //personal data

    $first_name = ucfirst($_POST['first_name']);
    $first_name = mysqli_escape_string($conn, $first_name);

    $middle_name = ucfirst($_POST['last_name']);
    $middle_name = mysqli_escape_string($conn, $middle_name);

    $last_name = ucfirst($_POST['last_name']);
    $last_name = mysqli_escape_string($conn, $last_name);

    $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));

    $address = $_POST['address'];
    $address = mysqli_escape_string($conn, $address);

    $barangay = ucfirst($_POST['barangay']);
    $barangay = mysqli_escape_string($conn, $barangay);

    $barangay_id = ucfirst($_POST['barangay_id']);

    $query_validation = "SELECT username FROM users WHERE username = '$username'";
    $run_validation = mysqli_query($conn, $query_validation);

    if (mysqli_num_rows($run_validation) > 0) {
        echo "<script>alert('Username already taken') </script>";
        exit();
    }

    //image
    $image = $_FILES['image']['name'];
    $allowed_extension = array('gif', 'png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'GIF');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extension)) {
        echo "<script>alert('Image not added') </script>";
        exit();
    } else {
        //validation
        //generate user_id 
        $query_user_id = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1";
        $run_user_id = mysqli_query($conn, $query_user_id);
        if (mysqli_num_rows($run_user_id) > 0) {
            foreach ($run_user_id as $row) {
                $user_id = $row['user_id'];
                $get_number = str_replace("TA", "", $user_id);
                $id_increment = $get_number + 1;
                $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

                $id = "TA" . $get_string;

                //insert
                $query_registration = "INSERT INTO users (user_type,user_id,username,password,first_name,middle_name,last_name,date_of_birth,address,barangay,barangay_id,image,date_time_created,date_time_updated) VALUES ('$user_type','$id','$username', '$hashed_password', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$address', '$barangay', '$barangay_id', '$image', '$date $time' , '$date $time')";
                $run_registration = mysqli_query($conn, $query_registration);
                move_uploaded_file($_FILES["image"]["tmp_name"], "Images/" . $_FILES["image"]["name"]);


                if ($run_registration) {
                    echo "Added";

                    //redirection sa login page
                } else {
                    echo "error" . $conn->error;
                }
            }
        } else {

            $username = $_POST['username'];

            $query_validation = "SELECT username FROM users WHERE username = '$username'";
            $run_validation = mysqli_query($conn, $query_validation);

            if (mysqli_num_rows($run_validation) > 0) {
                echo "<script>alert('Username already taken') </script>";
                exit();
            }

            $id = "ADM00001";
            $query_registration = "INSERT INTO users (user_type,user_id,username,password,first_name,middle_name,last_name,date_of_birth,address,barangay,barangay_id,image,date_time_created,date_time_updated) VALUES ('$user_type','$id','$username', '$hashed_password', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$address', '$barangay', '$barangay_id', '$image', '$date $time' , '$date $time')";
            $run_registration = mysqli_query($conn, $query_registration);
            move_uploaded_file($_FILES["image"]["tmp_name"], "Images/" . $_FILES["image"]["name"]);
            if ($run_registration) {
                echo "Added";
                //redirection sa login page

            } else {
                echo "error" . $conn->error;
            }
        }
    }
}


ob_end_flush();
?>