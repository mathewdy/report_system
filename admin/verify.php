<?php
include('../connection.php');
if(isset($_GET['v_token']) && isset($_GET['email'])){

    $v_token = $_GET['v_token'];
    $email = $_GET['email'];
    $query_verify = "SELECT v_token, user_type , email_status FROM users WHERE v_token = '$v_token' AND email = '$email'";
    $run_verify = mysqli_query($conn,$query_verify);

    if(mysqli_num_rows($run_verify) > 0){
        $row = mysqli_fetch_array($run_verify);
        if($row['email_status'] == '0'){
            $click_token = $row['v_token'];
            $update_query = "UPDATE users SET email_status = '1' WHERE v_token =  '$click_token' LIMIT 1";
            $run_query = mysqli_query($conn,$update_query);

            if($run_query)
            {
                echo "working";
                echo "<script>window.location.href='login.php' </script>" ;
                
            }else{
                echo "error" . $conn->error;
            } 
        }
    }else{
        echo "empty";
    }

}

?>