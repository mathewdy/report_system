<?php

include('../connection.php');
session_start();
ob_start();
$user_id = $_SESSION['user_id'];

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



    <h2>Edit Profile</h2>

    <?php

    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    $run = mysqli_query($conn,$query);

    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            ?>
                <form action="" method="POST" enctype="multipart/form-data">

                <img src="<?php echo "Images/" . $row['image']?>" alt="Profile Image" width="100px" height="100px">
                <input type="hidden" name="old_image" value="<?php echo $row ['image']?>">
                <br>
                <input type="file" name="image">
                <br>
                <label for="">Email</label>
                <br>
                <input type="email" name="email" value="<?php echo $row['email']?>">
                <br>
                <label for="">Password</label>
                <br>
                <input type="password" name="password" id="" value="<?php echo $row['password']?>">
                <br>
                <label for="">First Name</label>
                <br>
                <input type="text" name="first_name" value="<?php echo $row['first_name']?>">
                <br>
                <label for="">Middle Name</label>
                <br>
                <input type="text" name="middle_name" value="<?php echo $row['middle_name']?>">
                <br>
                <label for="">Last Name</label>
                <br>
                <input type="text" name="last_name" value="<?php echo $row['last_name']?>">
                <br>
                <label for="">Date of Birth</label>
                <br>
                <input type="date" name="date_of_birth" value="<?php echo $row['date_of_birth']?>" id="">
                <br>
                <label for="">Address</label>
                <br>
                <input type="text" name="address" value="<?php echo $row['address']?>">
                <br>
                <label for="">Barangay</label>
                <br>
                <input type="text" name="barangay" value="<?php echo $row['barangay']?>">
                <br>
                <label for="">Barangay ID</label>
                <br>
                <input type="text" name="barangay_id" value="<?php echo $row['barangay_id']?>">
                <br>
                <input type="submit" name="update" value="Update">
                </form>


            <?php
        }
    }


    ?>


    
</body>
</html>



<?php

if(isset($_POST['update'])){


    //year month date
    date_default_timezone_set("Asia/Manila");
    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = ucfirst($_POST['first_name']);
    $middle_name = ucfirst($_POST['middle_name']);
    $last_name = ucfirst($_POST['last_name']);
    $date_of_birth = ucfirst($_POST['date_of_birth']);
    $address = $_POST['address'];
    $barangay = $_POST['barangay'];
    $barangay_id = $_POST['barangay_id'];

    $email = mysqli_escape_string($conn,$email);
    $password = mysqli_escape_string($conn,$password);
    $first_name = mysqli_escape_string($conn,$first_name);
    $middle_name = mysqli_escape_string($conn,$middle_name);
    $last_name = mysqli_escape_string($conn,$last_name);
    $address = mysqli_escape_string($conn,$address);
    $barangay = mysqli_escape_string($conn,$barangay);
    $barangay_id = mysqli_escape_string($conn,$barangay_id);

    $user_id = 2;

    //images

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != ''){
        $update_filename = $_FILES['image']['name'];
    }else{
        $update_filename = $old_image;
    }

    if(empty($new_image)){
        $query_update_1 = "UPDATE users SET first_name = '$first_name' , middle_name ='$middle_name', last_name = '$last_name', address = '$address', barangay = '$barangay' , barangay_id = '$barangay_id' WHERE user_id = '$user_id'";
        $run_update_1 = mysqli_query($conn,$query_update_1);

        if($run_update_1){
            echo "Updated";
        }else{
            echo "error" . $conn->error;
        }
    }

    $allowed_extension = array('gif','png','jpg','jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        echo "<script>alert('File not allowed'); </script>";
        echo "<script>window.location.href='profile.php' </script>";
    }else{
        $query_update_2 = "UPDATE users SET first_name = '$first_name' , middle_name ='$middle_name', last_name = '$last_name', address = '$address', barangay = '$barangay' , barangay_id = '$barangay_id', image =  '$update_filename' WHERE user_id = '$user_id'";
        $run_update_2 = mysqli_query($conn,$query_update_2);

        if($run_update_2){
            move_uploaded_file($_FILES["image"]["tmp_name"], "guardian_image/".$_FILES["image"]["name"]);
            unlink("Images/". $old_image);
            echo "<script>alert('Profile updated!') </script>";

        }else{
            echo "Error" .$conn->error;
        }
    }

    
}



ob_end_flush();

?>