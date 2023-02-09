<?php

include('../connection.php');
session_start();
ob_start();
$email = $_SESSION['email'];

$report_link = "add-report.php";
$view_link = "reports.php";
$draft_link = "draft.php";
$note_link = "add-note.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../src/sweetalert2/dist/sweetalert2.min.css">

</head>
<style>
  .focus {
    border: none;
  }
  body{
    overflow-x: hidden;
  }
  .active{
    background: rgba(255, 255, 255, 0.3) !important;
  }
</style>
<body>
  <main class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; min-height: 100vh;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="../src/img/dilg.png" height="80" alt="">
        <span class="fs-4 ps-3">DILG</span>
        <span class="fs-4"></span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link text-white active">
            <i class="bi bi-house-door me-2"></i>
            Home
          </a>
        </li>
        <li>
          <a href="<?php echo $report_link ?>" class="nav-link text-white">
            <i class="bi bi-clipboard me-2"></i>
            New Report
          </a>
        </li>
        <li>
          <a href="<?php echo $view_link ?>" class="nav-link text-white" aria-current="page">
            <i class="bi bi-book-half me-2"></i>
            View Reports
          </a>
        </li>
        <li>
          <a href="<?php echo $draft_link ?>" class="nav-link text-white">
            <i class="bi bi-archive me-2"></i>
            Drafts
          </a>
        </li>
        <li>
          <a href="<?php echo $note_link ?>" class="nav-link text-white">
            <i class="bi bi-stickies me-2"></i>
            Notes
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <?php   
        $sql_admin = "SELECT * FROM users WHERE email = '$email'";
        $query_admin = mysqli_query($conn, $sql_admin);
        $admin_row = mysqli_fetch_array($query_admin);
        ?>
          <img src="<?php if (empty($admin_row['image'])) {
                      echo '../src/img/avatar.svg';
                    } else {
                      echo 'admins/' . $admin_row['image'];
                    } ?>" alt="" width="32" height="32" class="rounded-circle me-2">
            <?= $admin_row['first_name'] .' '. $admin_row['last_name']?>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>
    <div class="container-fluid bg-light p-0">
        <nav class="navbar bg-dark navbar-dark">
        <div class="container">
          <a class="navbar-brand ms-auto" href="#"><i class="bi bi-bell-fill"></i></a>
        </div>
      </nav>
      <div class="row w-100">
        <div class="col-lg-12 p-5 pt-2">
            <div class="card shadow p-5" style="border-radius: 0;border: none; min-height: 18rem;">
            <p class="text-muted h3">Edit Profile</p>
            <hr class="featurette-divider">
                <?php

                $query = "SELECT * FROM users WHERE email = '$email'";
                $run = mysqli_query($conn, $query);

                if (mysqli_num_rows($run) > 0) {
                    foreach ($run as $row) {
                ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-5">
                                    <img class="card-img-top" src="<?php echo "admins/" . $row['image'] ?>" alt="Profile Image" width="100px" height="100px" style="height: 200px; width: 200px;">
                                    <input type="hidden" name="old_image" value="<?php echo $row['image'] ?>">
                                    <input type="file" class="form-control"name="image">
                                </div>
                                <div class="col-lg-7">
                                    <span class="mb-2">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control mb-3" name="email" value="<?php echo $row['email'] ?>">
                                    </span>
                                    <span class="mb-2">
                                  <label for="">Password</label>
                                  <input type="password" class="form-control mb-3"  name="password" id="" >
                                              
                                    </span>
                                    <span class="mb-2">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" class="form-control mb-3" value="<?php echo $row['first_name'] ?>">

                                    </span>
                                    <span class="mb-2">
                                    <label for="">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control mb-3" value="<?php echo $row['middle_name'] ?>">

                                    </span>
                                    <span class="mb-2">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" class="form-control mb-3" value="<?php echo $row['last_name'] ?>">

                                    </span>
                                    <span class="mb-2">
                                    <label for="">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control mb-3" value="<?php echo $row['date_of_birth'] ?>" id="">

                                    </span>
                                    
                                    <span class="mb-2">
                                    <label for="">Barangay</label>
                                    <input type="text" name="barangay" class="form-control mb-3" value="<?php echo $row['barangay'] ?>">
                                    </span>
                                    
                                    <span class="d-flex justify-content-end">
                                    <input type="submit" class="btn btn-md btn-success" name="update" value="Update">
                                    </span>
                                </div>
                            </div>
                        </form>


                <?php
                    }
                }


                ?>


            </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <!-- <script src="../src/js/update.js"> </script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="../src/sweetalert2/dist/sweetalert2.all.js"></script>

</body>

</html>






<?php

if (isset($_POST['update'])) {


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
    $barangay = $_POST['barangay'];

    $email = mysqli_escape_string($conn, $email);
    $password = mysqli_escape_string($conn, $password);
    $first_name = mysqli_escape_string($conn, $first_name);
    $middle_name = mysqli_escape_string($conn, $middle_name);
    $last_name = mysqli_escape_string($conn, $last_name);
    $barangay = mysqli_escape_string($conn, $barangay);


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //images

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != '') {
        $update_filename = $_FILES['image']['name'];
    } else {
        $update_filename = $old_image;
    }

    if (empty($new_image)) {
        $query_update_1 = "UPDATE users SET first_name = '$first_name' , middle_name ='$middle_name', last_name = '$last_name', password = '$hashed_password',  barangay = '$barangay'  WHERE email = '$email'";
        $run_update_1 = mysqli_query($conn, $query_update_1);

        if ($run_update_1) {
          echo "<script>
          Swal.fire({
              icon: 'success',
              title: 'Updated Profile',
          })
          </script>";
            echo "<script>window.location.href='profile.php'</script>";
        } else {
            echo "error" . $conn->error;
        }
    }

    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
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
        // echo "<script>window.location.href='profile.php' </script>";
    } else {
        $query_update_2 = "UPDATE users SET first_name = '$first_name' , middle_name ='$middle_name', last_name = '$last_name',  password = '$hashed_password', barangay = '$barangay', image =  '$update_filename' WHERE email = '$email'";
        $run_update_2 = mysqli_query($conn, $query_update_2);

        if ($run_update_2) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "admins/" . $_FILES["image"]["name"]);
            echo "<script>
              Swal.fire({
                  icon: 'success',
                  title: 'Updated Image',
              })
              </script>";
            echo "<script>window.location.href='profile.php'</script>";
        } else {
            echo "Error" . $conn->error;
        }
    }
}



ob_end_flush();

?>