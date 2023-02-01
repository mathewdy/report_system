<?php
    if(empty($_SESSION['user_id'])){
        echo "<script>window.location.href='login.php' </script>";
    }
?>
