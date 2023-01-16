<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');


$user_id = $_SESSION['user_id'];

if (isset($_GET['uid'])) {
    // Store the cipher method
    $ciphering = "AES-128-CTR";
    $options = 0;
    // Non-NULL Initialization Vector for decryption
    $decryption_iv = '1234567891011121';

    // Store the decryption key
    $decryption_key = "TeamAgnat";

    // Use openssl_decrypt() function to decrypt the data
    $user_id = openssl_decrypt(
        $_GET['uid'],
        $ciphering,
        $decryption_key,
        $options,
        $decryption_iv
    );
    // foreach ($_GET as $encrypting_lrn => $encrypt_lrn){
    //   $decrypt_lrn = $_GET[$encrypting_lrn] = base64_decode(urldecode($encrypt_lrn));
    //   $decrypted_lrn = ((($decrypt_lrn*987654)/56789)/12345678911);
    // }

    if (empty($_GET['uid'])) {    //lrn verification starts here
        echo "<script>alert('User id not found');
        window.location = 'index.php';</script>";
        exit();
    }
}







?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>

<body>

    <table id="data">
        <thead>
            <tr>
                <th>No.</th>
                <th>LRN</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM reports ORDER BY id DESC ";
            $run = mysqli_query($conn, $sql);

            if (mysqli_num_rows($run) > 0) {
                $count = 0;
                foreach ($run as $row) {
                    $report_id = $row['report_id'];
                    // Store the cipher method
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
                        $report_id,
                        $ciphering,
                        $encryption_key,
                        $options,
                        $encryption_iv
                    );
                    //   $encrypted_data = (($lrn*12345678911*56789)/987654);
                    $view_link = "view-reports.php?rid=" . $encryption;
                    $delete_link = "delete-reports.php?rid=" . $encryption;
                    $count++;
            ?>

                    <tr class="clickable-row" data-href="<?php echo $view_link ?>" style="cursor:pointer;">
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['report_id'] ?></td>
                        <td><?php echo $row['to_user'] ?></td>
                        <td class="d-flex flex-row justify-content-evenly">
                            <a href="<?php echo $delete_link ?>">Delete</a>
                        </td>
                    </tr>



            <?php
                }
            }

            ?>
        </tbody>
    </table>


    <script src="../src/js/jquery-3.6.1.min.js"></script>

    <script src="../src/js/table.click.js"></script>

</body>

</html>