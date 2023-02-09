<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
$current_year = date('y-m-d');
$current_year = strtotime($current_year);
$next_year = strtotime('2024-01-01');
if($current_year == $next_year){
    $delete_data = "DELETE FROM reports";
    $query_delete = mysqli_query($conn, $delete_data);
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
        <nav class="navbar bg-body-tertiary ">
            <div class="container border-bottom border-secondary">
                <a class="navbar-brand d-flex flex-row align-items-center">
                    <img src="../src/img/dilg.png" style="height: 100px;" alt="">
                    <span class="ms-3">
                        <p class="p-0 m-0" style="font-weight: 600; font-family:'Times New Roman', Times, serif;">REPUBLIC OF THE PHILIPPINES</p>
                        <hr class="p-0 m-0">
                        <p class="text-light p-0 m-0" style="font-weight: 550; font-family:Arial, Helvetica, sans-serif;font-size: 14px;">Department of the Interior and Local Government</p>
                    </span>
                    
                </a>
                <span>
                    <form class="d-flex align-items-end" method="POST">
                        <span class="d-flex flex-column">
                            <label for="" class="text-white">Email</label>
                            <input type="text" class="" name="email" maxlength="25" required>
                        </span>
                        <span class="d-flex flex-column ms-2">
                            <label class="text-white">Password</label>
                            <input type="password" class="" name="password" maxlength="50" required>
                        </span>
                        <span class="ms-2">
                            <input type="submit" class="btn btn-sm w-100 btn-primary" style="border-radius: 0;" name="login" value="Log In">
                        </span>
                    </form>
                    <a href="forgot-password.php" class="link-light" style="font-size: 13px;">Forgot Password?</a>
                </span>
                
            </div>
        </nav>
        <!-- <footer class="footer shadow">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>DILG</h3>
                </div>
            </div>
        </footer> -->
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
if (isset($_POST['login'])) {

    $email = mysqli_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];



    $query = "SELECT email,password,user_type ,barangay, email_status FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {

                if($row['email_status'] == '0'){
                    echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please Verify your email address to login ',
                        })
                        </script>
                        ";
                        exit();
                }

    
                if ($row['user_type'] == '1') {
                    echo "
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'User Not Available',
                        })
                        </script>";
                        exit();
                } else {
    
                    if (password_verify($password, $row['password'])) {
                        //fetch mo muna yung user id, para ma sessidon papunta sa kabila 
                        $_SESSION['email'] = $email;
                        $_SESSION['barangay'] = $row['barangay'];
                        header("location: home.php");
                        die();
                    }
                }
            }
        } else {
            echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'User Not Found!',
                })
                </script>";
        }





   
}
if(isset($_GET['opt-out'])){
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Successfully Logged Out',
    })
    </script>";
}
if(isset($_GET['rst-out'])){
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Password has been reset!',
    })
    </script>";
    
}
if(isset($_GET['registered'])){
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Registered!',
    })
    </script>";
}
ob_end_flush();

?>