<?php

include('connection.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>


    <?php


    //query ko yung number of rows at yung 0 status at kung notif lang talaga para sa kanya. sana all sa kanya

    $query_num_notif ="SELECT  reports.id, reports.notif_status FROM reports WHERE reports.user_id = 'TA00002' ";
    $run_notif_num = mysqli_query($conn,$query_num_notif);
    $row_num = mysqli_num_rows($run_notif_num);

    //lagyan mo na lang to ng icon riri, tas ipapataong ko kay tj tong code na to
    
    ?>

    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sample notif</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Notification <?php echo $row_num?>
            </a>
          <ul class="dropdown-menu">

            <?php


            $query_notifs = "SELECT reports.id, reports.from_user, reports.to_user, reports.subject, reports.notif_status, reports.date_created FROM reports WHERE reports.user_id = 'TA00002' ";
            $run_notif = mysqli_query($conn,$query_notifs);
            if(mysqli_num_rows($run_notif) > 0){
                foreach($run_notif as $row){
                    ?>
                        <!----tas pipindutin yung view notif if ever na papagawa ko or hindi para gumanda system--->
                        <!---riri ikaw na bahala mag ayos ng notifcation-->
                        <li>
                            <a class="dropdown-item" href="#">
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
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>