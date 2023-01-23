<?php
include "../connection.php";

$sql = "SELECT * FROM barangay";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
    $brgy[] = $row;
}
?>
<?php
echo json_encode($brgy);
?>