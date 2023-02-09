<?php
include('../connection.php');

$query_notification_num = "SELECT * FROM `reports` WHERE to_user = '1'";
$run_notification_num = mysqli_query($conn,$query_notification_num);
$num_of_notifs = mysqli_num_rows($run_notification_num);
// WHERE to_user  = '1'

?>

<span id="" class="badge bg-primary"><?php echo $num_of_notifs?></span>

<?php
?>