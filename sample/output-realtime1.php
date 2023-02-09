<?php
include('../connection.php');

$sql = "SELECT * FROM realtime";
$run = mysqli_query($conn,$sql);

if(mysqli_num_rows($run) > 0){
    foreach($run as $row){
        ?>

            <tr>
                <td><?php echo $row['name']?></td>
            </tr>

        <?php
    }
}
?>