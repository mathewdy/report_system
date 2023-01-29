<?php
include "../connection.php";

$data = [];
$sql = "SELECT email FROM users";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
    array_push($data, $row['email']);
    // $users[] = $row;
}
?>
<?php
echo json_encode($data);
?>