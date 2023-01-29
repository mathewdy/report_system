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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/preloader.css">
    <link rel="stylesheet" href="../src/css/template.css">
    <title>Document</title>
</head>
<style>
    .bg {
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: -1;
    }

    .blob {
        position: absolute;
        height: 50rem;
        top: -50%;
        right: -25%;
        z-index: -2;
    }

    body {
        overflow-x: hidden;
    }

    .avatar {
        height: 100px;
    }
</style>

<body class="d-none">
    <div class="preload-wrapper">
        <div class="spinner-border text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <img class="bg" src="../src/img/bg.svg" alt="">
    <img class="blob" src="../src/img/blob.svg" alt="">

    <div class="container-xxl">
        <div class="row d-flex justify-content-center align-items-center pt-5">
            <div class="col-lg-10">
                <div class="row shadow">
                    <div class="col-lg-6 p-5 d-flex justify-content-center align-items-center" style="background: #7694D4;">
                        <img class="card-img-top" src="../src/img/draw.svg" alt="">
                    </div>
                    <div class="col-lg-6 bg-white">
                        <div class="p-5">
                            <p class="h3 text-center text-muted mb-4">Registration</p>
                            <hr class="featurette-divider">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- <img class="card-img-top avatar" src="../src/img/avatar.svg" alt=""> -->

                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" class="form-control form-control-sm" name="first_name">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" class="form-control form-control-sm" name="middle_name">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Last Name</label>
                                                <input type="text" class="form-control form-control-sm" name="last_name">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Date of Birth</label>
                                                <input type="date" class="form-control form-control-sm" name="date_of_birth" id="">

                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Address</label>
                                                <input type="text" class="form-control form-control-sm" name="address">
                                            </div>
                                        </div>
                                    </div>

                                

                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                            <select name="barangay" id=""  class="form-select">
                                                <option value="" selected disabled  class="form-select">-Barangay-</option>
                                                <?php

                                                    $query_barangay = "SELECT * FROM barangay";
                                                    $run_barangay = mysqli_query($conn,$query_barangay);

                                                    if(mysqli_num_rows($run_barangay) > 0){
                                                        foreach($run_barangay as $rows){
                                                            ?>

                                                                    <option value="<?php echo $rows['brgy']?>"><?php echo $rows['brgy']?></option>

                                                            <?php
                                                        }
                                                    }
                                                    

                                                ?>
                                            </select>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Barangay ID</label>
                                                <input type="text" class="form-control form-control-sm" name="barangay_id">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Image</label>
                                                <input type="file" class="form-control form-control-sm" name="image" id="">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control form-control-sm" name="email">
                                            </div>
                                            <div class="col-lg-12 mb-4">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control form-control-sm" name="password" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="featurette-divider">
                                    <div class="col-lg-12 text-center">
                                        <input class="btn btn-md mb-1 btn-primary w-100" style="background: #7694D4; outline:#7694D4; border: #7694D4; border-radius: 0;" type="submit" name="register" value="Register">
                                        <a class="text-decoration-none" href="login.php">Log In</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(window).on('load', function() {
            $('body').removeClass('d-none');
            $('.preload-wrapper').fadeOut(1000);
        })
    </script>
</body>

</html>

<?php
if (isset($_POST['register'])) {

    //year month date
    date_default_timezone_set("Asia/Manila");
    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $user_type = 2;
    $email = $_POST['email'];

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

    $query_validation = "SELECT email FROM users WHERE email = '$email'";
    $run_validation = mysqli_query($conn, $query_validation);

    if (mysqli_num_rows($run_validation) > 0) {
        echo "<script>alert('Email already taken') </script>";
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
                $query_registration = "INSERT INTO users (user_type,user_id,email,password,first_name,middle_name,last_name,date_of_birth,address,barangay,barangay_id,dilg_id,image,date_time_created,date_time_updated) VALUES ('$user_type','$id','$email', '$hashed_password', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$address', '$barangay', '$barangay_id', '0' , '$image', '$date $time' , '$date $time')";
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

            $email = $_POST['email'];

            $query_validation = "SELECT email FROM users WHERE email = '$email'";
            $run_validation = mysqli_query($conn, $query_validation);

            if (mysqli_num_rows($run_validation) > 0) {
                echo "<script>alert('Email already taken') </script>";
                exit();
            }

            $id = "TA00001";
            $query_registration = "INSERT INTO users (user_type,user_id,email,password,first_name,middle_name,last_name,date_of_birth,address,barangay,barangay_id,image,date_time_created,date_time_updated) VALUES ('$user_type','$id','$email', '$hashed_password', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$address', '$barangay', '$barangay_id', '$image', '$date $time' , '$date $time')";
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