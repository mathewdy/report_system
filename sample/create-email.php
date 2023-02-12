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
        <label for="">email</label>
        <input type="email" name="email">
        <input type="submit" name="send" value="Send">
    </form>
</body>
</html>

<?php
require '../vendor/autoload.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_email($email)
{
 
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'calamba.ccc@gmail.com';                     //SMTP username
    $mail->Password   = 'asnutfoaalnbzxjx';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    $mail->setFrom('calamba.ccc@gmail.com', 'dilg-ccc');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Email Verification";

    $mail->Body = "<a href='http://$_SERVER[SERVER_NAME]/report_system/admin/verify.php?email=$email'> Click me </a></span>";
    $mail->send();
}

if(isset($_POST['send'])){
    $email = $_POST['email'];

    send_email($email);
    echo "sent or not";

}

?>