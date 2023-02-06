<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
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
    .bg{
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: -1;
    }
    .blob{
        position: fixed;
        top: -150%;
        transform: rotate(-120deg);
        right: -70%;
        z-index: -2;
    }
    body{
        overflow-x: hidden;
    }
    .avatar{
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

    <div class="main">
        <main class="content">
            <div class="container-fluid pt-5 ">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 card" style="border: none; background: none;">
                                <img class="card-img-top" src="../src/img/illustration.svg" alt="">
                                <!-- <div class="card-img-overlay d-flex">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">Last updated 3 mins ago</p>
                                </div> -->
                            </div>
                            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="outer row card p-5 shadow" style="border: none;">
                                    <img class="card-img-top avatar" src="../src/img/avatar.svg" alt="">
                                    <p class="h5 text-center">Welcome!</p>
                                    <form action="" method="POST">
                                    <div class="col-lg-12 mb-4">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email" maxlength="25" required>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" maxlength="50" required>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12 text-center">
                                        <input type="submit" class="btn btn-md w-100 btn-primary" style="background: #7694D4; outline:#7694D4; border: #7694D4; border-radius: 0;" name="login" value="Log In">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </main>
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



    if(strpos($email,"@dilg.com") !== false){
        $query = "SELECT email,password,user_type,user_id FROM users WHERE email = '$email'";
        $result = mysqli_query($conn,$query);
    
    
        if(mysqli_num_rows($result) > 0){
                foreach($result as $row){
    
                    if($row['user_type'] == '1'){
                        echo "<script>alert('User unavailable'); </script>";
                    }else{
    
                    if (password_verify($password, $row['password'])){ 
                        //fetch mo muna yung user id, para ma sessidon papunta sa kabila 
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['user_id'] = $row['user_id'];
                            header("location: home.php");
                        die();
                    }   
                    
                    }
                
                }
            }else{
                echo " <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'User Not Found!',
                })
                </script>";
            }
    
    
    

    }else{
        echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Domain Not Found!',
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
if(isset($_GET['register-success'])){
    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Registration Success!',
    })
    </script>";
}
ob_end_flush();

?>