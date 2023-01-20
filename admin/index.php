<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
</head>

<body>
  <?php




  $ciphering = "AES-128-CTR";

  // Use OpenSSl Encryption method
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;

  // Non-NULL Initialization Vector for encryption
  $encryption_iv = '1234567891011121';

  // Store the encryption key
  $encryption_key = "TeamAgnat";

  // Use openssl_encrypt() function to encrypt the data
  $encryption = openssl_encrypt(
    $user_id,
    $ciphering,
    $encryption_key,
    $options,
    $encryption_iv
  );

  $report_link = "add-report.php?uid=" . $encryption;
  $view_link = "reports.php?uid=" . $encryption;
  $draft_link = "draft.php?uid=" . $encryption;
  $note_link = "add-note.php?uid=" . $encryption;
  ?>



  <a href="<?php echo $report_link ?>">Add Report</a>
  <a href="<?php echo $view_link ?>">View Report</a>
  <a href="<?php echo $draft_link ?>">Drafts</a>
  <a href="<?php echo $note_link ?>">Add Notes</a>



  <!-- NOTES -->

  <?php

  $query_data = "SELECT * FROM `notes` WHERE user_id = '$user_id'";
  $run_query_data = mysqli_query($conn, $query_data);

  if (mysqli_num_rows($run_query_data) > 0) {

    foreach ($run_query_data as $rows) {


  ?>

      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <p class="card-text"> <?php if (empty($rows['content'])) {
                                  echo "";
                                } else {
                                  echo $rows['content'];
                                }

                                ?> </p>
          <a href="#" class="card-link">Edit</a>
          <a href="#" class="card-link">Delete</a>
        </div>
      </div>

  <?php
    }
  }
  ?>


  <a href="logout.php">Log Out</a>
</body>

</html>