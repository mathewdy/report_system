<?php
include('../connection.php');
date_default_timezone_set('Asia/Manila');
ob_start();


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

function sendMail($email,$first_name,$last_name){
    require("PHPMailer.php");
    require("SMTP.php");
    require("Exception.php");

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
        $mail->Body = "<span style=font-size:18px;letter-spacing:0.5px;color:black;>Good day <b></b>!</span><br><span style=font-size:15px;letter-spacing:0.5px;color:black;>Click here to reset your email Mr. / Mrs. $first_name, $last_name
        <a href='http://$_SERVER[SERVER_NAME]/report_system/reset_password.php?email=$email'> Click me </a>
        </span>";
       
    
        $mail->send();
        echo "sent";
        return true;
    } catch (Exception $e) {
        return false;
    }
    
}

echo NULL;

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
    <title>Log In</title>
</head>
<style>
    body{
        overflow-x: hidden;
        background: url(../src/img/hall.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    .overlay{
        width: 100%;
        height: 100vh;
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        /* background-color: rgba(153, 0, 0,0.3); */
        background-color: rgba(0, 0, 0,0.4);
        /* background: rgb(0,0,0);
        background: linear-gradient(90deg, rgba(0,0,0,0.6416316526610644) 0%, rgba(153,0,0,0.5323879551820728) 100%, rgba(121,9,9,1) 100%); */
        z-index: -2;
    }
    .main{
        z-index: 4 !important;
    }
    label{
        font-family:Verdana, Geneva, Tahoma, sans-serif !important;
        font-size: 12px;
    }
    input{
        outline: cadetblue !important;
        border: 2px solid cadetblue;
    }
    input:focus{
        outline: cadetblue;
    }
</style>
<body class="d-none">
    <div class="preload-wrapper">
        <div class="spinner-border text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="overlay"></div>
    <div class="main">
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div class="card p-5" style="background: rgba(255, 255, 255,0.5); border-radius: 0px;">
                        <H1>Enter your email</H1>
                        <form action="" method="POST">
                        <span>Please enter your email to reset your password.</span>
                        <input type="email" class="w-100" name="email">

                        <span class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-sm btn-primary" name="submit">Submit</button>
                        </span>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>
    <script>
        $(window).on('load', function(){
            $('body').removeClass('d-none');
            $('.preload-wrapper').fadeOut(1000);
        })
    </script>
</body>

</html>
<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    


    $sql_get_info = "SELECT * FROM users where user_type = '2' and email = '$email'";
    $query = mysqli_query($conn, $sql_get_info);
    if(mysqli_num_rows($query) > 0){
        $rows = mysqli_fetch_array($query);
        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
        sendMail($email, $first_name, $last_name);
    }else{
        echo "Sorry your email does not exist";
        exit();
    }
}
?>