<?php
include("../connection.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="" method="post" enctype="multipart/form-data">
        Select Image Files to Upload:
        <input type="text" name="brgy">
        <input type="submit" name="submit" value="UPLOAD">

        <!-- delete of page -->
        <br>
        <a href="DELETE_PAGE" onClick="return confirm('Delete This account?')">Delete Account</a>
    </form>


</body>

</html>



<?php

if (isset($_POST['submit'])) {
    // File upload configuration 

    $brgy = $_POST['brgy'];

    $sql = "INSERT INTO `barangay`(`brgy`) VALUES ('$brgy')";
    $run = mysqli_query($conn, $sql);

    if ($run) {
        echo ("okay");
    } else {
        $conn->error;
    }
}
?>


<!-- strpos($mime, 'image/') === 0 -->

<!-- INSERT INTO pdf (file_name, uploaded_on) VALUES $insertValuesSQL -->