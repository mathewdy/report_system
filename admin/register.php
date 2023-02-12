<?php
include('../connection.php');
date_default_timezone_set('Asia/Manila');
session_start();
ob_start();
// //Import PHPMailer classes into the global namespace
// //These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// //Load Composer's autoloader
// require '../vendor/autoload.php';
// require ("PHPMailer.php");
// require("SMTP.php");
// require("Exception.php");
// function sendMail($email,$first_name,$last_name,$vkey){
              
//     $mail = new PHPMailer(true);

//     try {
//         //Server settings
    
//         $mail->isSMTP();                                            //Send using SMTP
//         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//         $mail->Username   = 'calamba.ccc@gmail.com';                     //SMTP username
//         $mail->Password   = 'buydgqnmohkheass';                               //SMTP password
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
//         //Recipients
//         $mail->setFrom('calamba.ccc@gmail.com', 'dilg-ccc');
//         $mail->addAddress($email);     //Add a recipient
//         //Content
//         $mail->isHTML(true);
        
//         //Set email format to HTML
//         $mail->Subject = 'Email Verification';
//         $mail->Body = "<span style=font-size:18px;letter-spacing:0.5px;color:black;>Good day <b></b>!</span><br><span style=font-size:15px;letter-spacing:0.5px;color:black;>Click here to verify your email Mr. / Mrs. $first_name, $last_name
//         <a href='http://$_SERVER[SERVER_NAME]/report_system/admin/verify.php?v_token=$vkey&email=$email'> Click me </a>
//         </span>";
    
    
//         $mail->send();
//         // echo "sent";
//         return true;
//     } catch (Exception $e) {
//         return false;
//     }
    
// }
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
    $vkey = mysqli_escape_string($conn,$vkey);


    $barangay = ucfirst($_POST['barangay']);
    $barangay = mysqli_escape_string($conn, $barangay);


    $query_validation = "SELECT `email` FROM `users` WHERE email = '$email' ";
    $run_validation = mysqli_query($conn, $query_validation);

    if (mysqli_num_rows($run_validation) > 0) {
        echo "<script>alert('Email already taken') </script>";
        echo "<script>window.location.href='login.php'</script>";
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
            $run_registration = mysqli_query($conn, $query_registration);
            move_uploaded_file($_FILES["image"]["tmp_name"], "admins/" . $_FILES["image"]["name"]);

                if ($run_registration) {
                    // sendMail($email,$first_name,$last_name,$vkey);
                    echo  "<script>alert('Account Created')</script>";
                    echo "<script>window.location.href='login.php?register'; </script>";
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