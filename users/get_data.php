<?php
include "../connection.php";
if (isset($_POST['checkbox'])) {
    $query = "SELECT * FROM `barangay` ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $data = $row['column_name'];
    }
    echo json_encode(array("column_name" => $data));
}
?>
?>