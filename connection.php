<?php
$conn = new mysqli("localhost", "root" , "", "report_system_dilg");
if($conn == false) {
    echo "error" . $conn->error;
}
?>