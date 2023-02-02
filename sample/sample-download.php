<?php

$conn = mysqli_connect("host", "username", "password", "database_name");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "SELECT * FROM files WHERE id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $file_name = $row['file_name'];
    $file_type = $row['file_type'];
    $file_size = $row['file_size'];
    $content = $row['content'];

    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Type: $file_type");
    header("Content-Length: $file_size");

    echo $content;
} else {
    echo "File not found.";
}

mysqli_close($conn);

?>
