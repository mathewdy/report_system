<?php

include('../connection.php');
session_start();
ob_start();
$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<!------>
<a href="home.php">Back</a>
<br>
    <?php

    $query = "SELECT * FROM reports WHERE status = '2' AND user_id = '$user_id'";
    $run = mysqli_query($conn,$query);


    if(mysqli_num_rows($run) >0){
        foreach($run as $row){
            $report_id = $row['report_id'];
            ?>
                <label for="">
                    <?php 
                    //to recipients
                        if(empty($row['to_user'])){
                            
                            echo "<span style='color:red;'>Draft</span>";

                        }else{
                            echo $row['to_user'];
                        }
                        
                    ?>
                </label>

                <label for="">
                    
                    <?php

                        //for the subject
                        if(empty($row['subject'])){
                            echo "<span> (no subject) </span>";
                        }else{
                            echo $row['subject'];
                        }

                    ?>

                </label>

                <label for="">

                    <?php 
                        echo $date = date("M-d-Y", strtotime($row['date_created'])); 
                    ?>
                </label>
                
                <!--di pa tapos yung draft  --->
                <a href="edit-draft.php?status=<?php echo '2'?>&user_id=<?php echo $user_id?>&report_id=<?php echo $report_id?>">Edit Draft</a>
                <a href="delete-draft.php">Delete</a>


            <?php
        }
    }else{
        echo "This Draft is empty";
    }

    ?>

    



<script>
    tinymce.init({
    selector: 'textarea#default',
    width: 1000,
    height: 300,
    plugins:[
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | removeformat | code table help | save | restoredraft',
    menu: {
        favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
  
  });
</script>

</body>
</html>


<?php


ob_end_flush();
?>