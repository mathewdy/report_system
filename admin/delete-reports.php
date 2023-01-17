<?php

session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');


if (isset($_GET['rid'])) {
    // Store the cipher method
    $ciphering = "AES-128-CTR";
    $options = 0;
    // Non-NULL Initialization Vector for decryption
    $decryption_iv = '1234567891011121';

    // Store the decryption key
    $decryption_key = "TeamAgnat";

    // Use openssl_decrypt() function to decrypt the data
    $report_id = openssl_decrypt(
        $_GET['rid'],
        $ciphering,
        $decryption_key,
        $options,
        $decryption_iv
    );
    // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
    //   $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
    //   $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
    // }

    if (empty($_GET['rid'])) {    //lrn verification starts here
        echo "<script>alert('User id not found');
        window.location = 'reports.php';</script>";
        exit();
    }

    $verify_report = "SELECT report_id FROM `reports` WHERE report_id = '$report_id'";
    $query_request = mysqli_query($conn, $verify_report) or die(mysqli_error($conn));
    if (mysqli_num_rows($query_request) == 0) {
        echo "
              <script type = 'text/javascript'>
              window.location = 'reports.php';
              </script>";
        exit();
    } else {
        $delete_reports = "DELETE FROM `reports` WHERE report_id = '$report_id'";
        $run_delete = mysqli_query($conn, $delete_reports);
        if ($run_delete) {
            echo "<script>alert('Sucessfuly Delete');
        window.location = 'reports.php';</script>";
            exit();
        }
    }
}
