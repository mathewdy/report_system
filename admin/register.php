<?php
include('../connection.php');
date_default_timezone_set('Asia/Manila');
session_start();
ob_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
require ("PHPMailer.php");
require("SMTP.php");
require("Exception.php");
function sendMail($email,$first_name,$last_name,$vkey){
              
    $mail = new PHPMailer(true);

    try {
        //Server settings
    
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'calamba.ccc@gmail.com';                     //SMTP username
        $mail->Password   = 'buydgqnmohkheass';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('calamba.ccc@gmail.com', 'dilg-ccc');
        $mail->addAddress($email);     //Add a recipient
        //Content
        $mail->isHTML(true);
        
        //Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body = "<span style=font-size:18px;letter-spacing:0.5px;color:black;>Good day <b></b>!</span><br><span style=font-size:15px;letter-spacing:0.5px;color:black;>Click here to verify your email Mr. / Mrs. $first_name, $last_name
        <a href='http://$_SERVER[SERVER_NAME]/report_system/admin/verify.php?v_token=$vkey&email=$email'> Click me </a>
        </span>";
    
    
        $mail->send();
        // echo "sent";
        return true;
    } catch (Exception $e) {
        return false;
    }
    
}

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
    <link rel="stylesheet" href="../src/sweetalert2/dist/sweetalert2.min.css">

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
                    <div class="col-lg-12 bg-white">
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
                                                <input type="date" class="form-control form-control-sm" max="2002-12-31" name="date_of_birth" id="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Barangay</label>
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                            <select name="barangay" id=""  class="form-select mb-3">
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
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Image</label>
                                                <input type="file" class="form-control form-control-sm" name="image" id="">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control form-control-sm" name="email">
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control form-control-sm" name="password" id="">
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="col-lg-12 d-flex flex-row justify-content-between align-items-end">
                                                <span>
                                                    <label for=""></label>
                                                    <select name="user_type" id=" " class="form-select">
                                                            <option value="" selected disabled  class="form-select">-User Type-</option>
                                                            <option value="1">DILG User</option>
                                                            <option value="2">Barangay User</option>
                                                    </select>
                                                </span>
                                                <span>
                                                    <input class="btn btn-md mb-1 btn-primary w-100" style="background: #7694D4; outline:#7694D4; border: #7694D4; border-radius: 0;" type="submit" name="register" value="Register">

                                                </span>
                                                <!-- <a class="text-decoration-none" href="login.php">Log In</a> -->
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
    <script src="../src/js/preload.js"></script>
    <script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>

</body>

</html>

<?php
if (isset($_POST['register'])) {

    //year month date
    date_default_timezone_set("Asia/Manila");
    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $email = $_POST['email'];
    $email = mysqli_escape_string($conn,$email);


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

    $vkey = md5(rand());


    $barangay = ucfirst($_POST['barangay']);
    $barangay = mysqli_escape_string($conn, $barangay);


    $query_validation = "SELECT `email` FROM `users` WHERE email = '$email' ";
    $run_validation = mysqli_query($conn, $query_validation);

    if (mysqli_num_rows($run_validation) > 0) {
        echo "<script>alert('Email already taken') </script>";
        exit();
    }

    $user_type = $_POST['user_type'];

    

    //image
    $image = $_FILES['image']['name'];
    $allowed_extension = array('gif', 'png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'GIF');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extension)) {
        echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Image Not Added!',
        })
        </script>";
        exit();
    } else {
        //validation
        //generate user_id 

            echo NULL;

            $query_registration = "INSERT INTO users (user_type,email,password,first_name,middle_name,last_name,date_of_birth,barangay,v_token,image,date_time_created,date_time_updated) 
            VALUES ('$user_type','$email', '$hashed_password', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$barangay', '$vkey', '$image', '$date $time' , '$date $time')";
            $run_registration = mysqli_query($conn, $query_registration) && sendMail($email,$first_name,$last_name,$vkey,$user_type);
            move_uploaded_file($_FILES["image"]["tmp_name"], "admins/" . $_FILES["image"]["name"]);

                if ($run_registration) {
                    // sendMail($email,$first_name,$last_name,$vkey);
                    echo "<script>window.location.href='index.php?registered' </script>";
                        // echo "<script></script>";
                    //redirection sa login page
                } else {
                    echo "error insert_admin" . $conn->error;
                }
                

        // $query_user_id = "SELECT * FROM users WHERE user_type = '1' ORDER BY user_id DESC LIMIT 1";
        // $run_user_id = mysqli_query($conn, $query_user_id);
        // if (mysqli_num_rows($run_user_id) > 0) {
        //     foreach ($run_user_id as $row) {
        //         // $user_id = $row['user_id'];
        //         // $get_number = str_replace("ADM", "", $user_id);
        //         // $id_increment = $get_number + 1;
        //         // $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        //         // $id = "ADM" . $get_string;
        //         //insert
        //         $query_registration = "INSERT INTO users (user_type,user_id,email,password,first_name,middle_name,last_name,date_of_birth,barangay,v_token,image,date_time_created,date_time_updated) 
        //         VALUES ('$user_type','$id','$email', '$hashed_password', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$barangay', '$vkey', '$image', '$date $time' , '$date $time')";
        //         $run_registration = mysqli_query($conn, $query_registration) && sendMail($email,$first_name,$last_name,$vkey);
        //         move_uploaded_file($_FILES["image"]["tmp_name"], "admins/" . $_FILES["image"]["name"]);


        //         if ($run_registration) {
        //             echo "<script>window.location.href='login.php?register-success' </script>";

        //             //redirection sa login page
        //         } else {
        //             echo "error insert_admin" . $conn->error;
        //         }
        //     }
        // } else {

        //     $username = $_POST['email'];

        //     $query_validation = "SELECT `user_type`,`email` FROM `users` WHERE user_type = '1' AND email = '$username' ";
        //     $run_validation = mysqli_query($conn, $query_validation);

        //     if (mysqli_num_rows($run_validation) > 0) {
        //         echo "<script>alert('Email already taken') </script>";
        //         echo "
        //             <script>
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Oops...',
        //                 text: 'Email Already Taken!',
        //             })
        //             </script>";
        //         exit();
        //     }

            // // $id = "ADM00001";

            // $query_registration = "INSERT INTO users (user_type,user_id,email,password,first_name,middle_name,last_name,date_of_birth,barangay,v_token,image,date_time_created,date_time_updated) 
            // VALUES ('$user_type','$id','$email', '$hashed_password', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$barangay', '$vkey', '$image', '$date $time' , '$date $time')";
            // $run_registration = mysqli_query($conn, $query_registration) && sendMail($email,$first_name,$last_name,$vkey);
            // move_uploaded_file($_FILES["image"]["tmp_name"], "admins/" . $_FILES["image"]["name"]);
            // if ($run_registration) {
            //     echo "<script>window.location.href='login.php?register-success' </script>";
            //     //redirection sa login page

            // } else {
            //     echo "error inset_admin 2" . $conn->error;
            // }
        }
    }


ob_end_flush();
?>