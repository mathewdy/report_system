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
  ?>



  <a href="<?php echo $report_link ?>">Add Report</a>
  <a href="<?php echo $view_link ?>">View Report</a>
  <a href="<?php echo $draft_link ?>">Drafts</a>

  <a href="logout.php">Log Out</a>
</body>

</html>