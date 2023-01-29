<ul class="dropdown-menu" id="notification">

<?php
include('../connection.php');

$query_notifs = "SELECT reports.id, reports.from_user, reports.to_user, reports.subject, reports.notif_status, reports.date_created FROM reports WHERE reports.user_id = '$user_id' ";
$run_notif = mysqli_query($conn,$query_notifs);
if(mysqli_num_rows($run_notif) > 0){
    foreach($run_notif as $row){
        ?>
            <!----tas pipindutin yung view notif if ever na papagawa ko or hindi para gumanda system--->
            <!---riri ikaw na bahala mag ayos ng notifcation-->
            <li>
                <a class="dropdown-item" href="#" >
                    <span>From:</span>
                    <?php echo $row['from_user']?>
                    <li><hr class="dropdown-divider"></li>
                    <span>Subject: </span>
                    <?php echo $row['subject']?>
                    <?php echo $row['date_created']?>
                    <li><hr class="dropdown-divider"></li>
                </a>
            </li>

        <?php
    }
}else{
    echo "No notifs";
}

?>

</ul>