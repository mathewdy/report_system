<?php
include('connection.php');
//dito naman sa part na to yung mismong laman ng code for ajax jquery


$query = "SELECT * FROM try";
$run = mysqli_query($conn,$query);

if(mysqli_num_rows($run) > 0){
    foreach($run as $row){
        ?>
            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['date']?></td>
            </tr>

        <?php
    }
}

?>