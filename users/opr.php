<?php
include "../connection.php";

$data = [];
$sql = "SELECT * FROM opr";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)){
    array_push($data, $row['name']);
    // $users[] = $row;
}
?>
<?php
echo json_encode($data);
?>