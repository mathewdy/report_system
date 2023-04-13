<?php
include('../connection.php');
session_start();
$email = $_SESSION['email'];
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
                <div class="col-lg-12">
                    <div class="card p-5" style="background: rgba(255, 255, 255,0.5); border-radius: 0px;">
                        <form action="" method="POST">
                            <label for="">New Password:</label>
                            <input type="password" class="form-control" name="new_password">
                            <label for="">Confirm Password:</label>
                            <input type="password" class="form-control" name="password_2">
                            <span class="d-flex justify-content-end mt-4">
                                <a href="login.php" class="btn btn-sm btn-danger me-2">Cancel</a>
                                <input type="submit" class="btn btn-sm btn-primary " name="reset_password" value="Reset">
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
if(isset($_POST['reset_password'])){
    $new_password = $_POST['new_password'];
    $password_2 = $_POST['password_2'];

    $hashed_password = password_hash($password_2, PASSWORD_DEFAULT);


    if($new_password != $password_2){
        echo "Password doesn't matched";
    }else{
        $update_pass = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
        $run = mysqli_query($conn,$update_pass);

        if($run){
            echo "updated";
        }else{
            echo "error " . $conn->error;
        }
    }

}
ob_end_flush();
?>