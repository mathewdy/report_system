<?php
$conn = new mysqli("localhost", "root" , "", "report_system_dilg");
if($conn == false) {
    echo "error" . $conn->error;
}

// $conn = new mysqli("localhost", "u116389031_dilg_ccc" , "mathewPOGI123", "u116389031_dilg_ccc123");
// if($conn == false) {
//     echo "error" . $conn->error;
// }
?>