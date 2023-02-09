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
    <title>DILG</title>
</head>
<body>
    <H1>Enter your email</H1>
    <form action="" method="POST">
    <span>Please enter your email to reset your password. <input type="email" name="email"></span>
    <button type="submit" name="submit">Submit</button>
    </form>
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