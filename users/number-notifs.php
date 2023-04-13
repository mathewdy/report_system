<?php

include("../connection.php");
session_start();
$barangay = $_SESSION['barangay'];
$query_number_notif = "SELECT * FROM reports WHERE to_user = '$barangay' ";
$run_number_notif = mysqli_query($conn,$query_number_notif);
$num_of_notifs = mysqli_num_rows($run_number_notif);


?>
<span id="" class="badge bg-primary"><?php echo $num_of_notifs?></span>

<?php

?>