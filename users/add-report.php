<?php
ob_start();
session_start();
include('../connection.php');
include('session.php');

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
require '../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
  <main class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem; min-height: 100vh;">
      <a href="#" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
          <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z" />
        </svg>
        <span class="visually-hidden">Icon-only</span>
      </a>
      <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item">
          <a href="home.php" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
              <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
            </svg>
          </a>
        </li>
        <li class="nav-item">
          <a href="view-report.php" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Inbox">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
            </svg>
          </a>
        </li>
        <li>
          <a href="add-report.php" class="nav-link active py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Create Report">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
              <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
            </svg>
          </a>
        </li>
        <li>
          <a href="add-notes.php" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
              <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
              <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
            </svg>
          </a>
        </li>
        <li>
          <a href="drafts.php" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
              <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
            </svg>
          </a>
        </li>
        <li>
          <a href="drafts.php" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
            Sent
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
              <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
            </svg>
          </a>
        </li>
      </ul>
      <div class="dropdown border-top">
        <!-- Banda dito ko kailangan yung query ng user image -->

        <?php

        $query_image = "SELECT image FROM users WHERE user_id = '$user_id'";
        $run_image = mysqli_query($conn, $query_image);

        if (mysqli_num_rows($run_image) > 0) {
          foreach ($run_image as $row_image) {
        ?>
            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo "Images/" . $row_image['image'] ?>" alt="user" width="24" height="24" class="rounded-circle">
            </a>

        <?php
          }
        }
        ?>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>





    <?php

    $query_email = "SELECT email FROM users WHERE user_id = '$user_id'";
    $run_email = mysqli_query($conn, $query_email);
    $row_email = mysqli_fetch_array($run_email);

    ?>

    <div class="row pt-2 px-4">
      <div class="col-lg-12">
        <div class="card p-5 shadow" style="border: none;">
          <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <span class="d-flex mb-3">
              <div class="row w-100">
                <div class="col-lg-6">
                  <label for="">Date Start:</label>
                  <input type="datetime-local" class="form-control w-100" name="date_start">
                </div>
                <div class="col-lg-6">
                  <label for="">Date End:</label>
                  <input type="datetime-local" class="form-control w-100" name="date_end">
                </div>
              </div>
            </span>
            <span class="d-flex align-items-center mb-3">
              <label for="" style="margin-right: 12px;">From:</label>
              <input type="text" class="form-control w-100 ms-2" name="from" value="<?php echo $row_email['email'] ?>" readonly>
            </span>
            <span class="d-flex align-items-center mb-3">
              <label style="margin-right: 12px;" for="">To:</label>
              <input type="text" id="search_data" name="to" class="w-100 brgy ms-2" style="border:none; outline:none;" />
            </span>
            <span class="d-flex align-items-center mb-3">
              <label style="margin-right: 12px;" for="">Barangay:</label>
              <input type="text" id="brgy" name="brgy" class="w-100 brgy ms-2" style="border:none; outline:none;" />
            </span>
            <span class="d-flex mb-2">
              <label for="">Subject:</label>
              <input type="text" class="form-control w-100 ms-2" name="subject">
            </span>
            <span class="d-flex mb-2">
              <label for="">OPR:</label>
              <input type="text" class="form-control w-100 ms-2" name="opr">
            </span>
            <div>
              <textarea id="tiny" name="statement"> </textarea>
            </div>

            <input type="file" class="form-control mt-2" name="pdf_file" id="" accept=".pdf">

            <span class="d-flex justify-content-end align-items-center mt-3">
              <input type="submit" class="btn btn-primary btn-md" name="send" value="Submit">
              <input type="submit" class="btn btn-danger btn-md ms-2" name="draft" value="Save as Draft">
            </span>
          </form>
        </div>
      </div>
    </div>

    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
  <script src="../src/js/preload.js"></script>
  <script src="../src/js/multiple.js"></script>
  <script>
    $('#search_data').tokenfield({
      autocomplete: {
        source: function(data, response) {
          $.ajax({
            url: 'brgy.php',
            method: 'GET',
            dataType: 'json',
            data: {
              name: data.term
            },
            success: function(res) {
              // response(res)
              var usr = $.map(res, function(name) {
                return {
                  label: name,
                  value: name
                }
              })
              var results = $.ui.autocomplete.filter(usr, data.term)
              response(results)
              console.log(results)
            }
          })
        },
        delay: 100
      },
    })
  </script>
  <script>
    $('#brgy').tokenfield({
      autocomplete: {
        source: function(data, response) {
          $.ajax({
            url: 'brgy2.php',
            method: 'GET',
            dataType: 'json',
            data: {
              name: data.term
            },
            success: function(res) {
              // response(res)
              var usr = $.map(res, function(name) {
                return {
                  label: name,
                  value: name
                }
              })
              var results = $.ui.autocomplete.filter(usr, data.term)
              response(results)
              console.log(results)
            }
          })
        },
        delay: 100
      },
    })
  </script>
  <!-- <script>
    $('.brgy').tokenfield({
        autocomplete :{
            source: function(data, response){
                $.ajax({
                    url: 'brgy.php',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                    name: data.term
                    },
                    success: function(res){
                    // response(res)
                    var usr = $.map(res, function(name){
                        return{
                        label: name,
                        value: name
                        }
                    }) 
                    var results = $.ui.autocomplete.filter(usr, data.term)
                    response(results)
                    console.log(results)
                    }
                })
            }
        }
    });
  </script> -->
  <script>
    //   $('.tagator_textlength').autocomplete({
    //   source: function(data, response){
    //     $.ajax({
    //       url: 'brgy.php',
    //       method: 'GET',
    //       dataType: 'json',
    //       data: {
    //         name: data.term
    //       },
    //       success: function(res){
    //         // response(res)
    //         var usr = $.map(res, function(name){
    //           return{
    //             label: name,
    //             value: name
    //           }
    //         }) 
    //         var results = $.ui.autocomplete.filter(usr, data.term)
    //         response(results)
    //         console.log(results)
    //       }
    //     })
    //   }
    // })
    // $('.brgy').tagator('autocomplete', function(data, response){
    //   $.ajax({
    //       url: 'brgy.php',
    //       method: 'GET',
    //       dataType: 'json',
    //       data: {
    //         name: data.term
    //       },
    //       success: function(res){
    //         // response(res)
    //         var usr = $.map(res, function(name){
    //           return{
    //             label: name,
    //             value: name
    //           }
    //         }) 
    //         var results = $.ui.autocomplete.filter(usr, data.term)
    //         response(results)
    //         console.log(results)
    //       }
    //     })
    // });
  </script>
  <script>
    tinymce.init({
      selector: 'textarea#tiny',
      // width: 2000,
      height: 300,
      resize: false,
      plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
        'table', 'emoticons', 'template', 'codesample'
      ],
      toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | removeformat | code table help | save | restoredraft',
      menu: {
        favs: {
          title: 'menu',
          items: 'code visualaid | searchreplace | emoticons'
        }
      },
      menubar: 'favs file edit view insert format tools table',
      content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',

    });
  </script>
</body>

</html>

<?php

if (isset($_POST['send'])) {


  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'ac61d56134893cb6bd8b',
    '88335cc2df68ad7e3ae5',
    '1544747',
    $options
  );

  $time = date("h:i:s", time());
  $date = date('y-m-d');


  $from = $_POST['from'];
  $from = mysqli_escape_string($conn, $from);

  $to = $_POST['to'];
  $to = mysqli_escape_string($conn, $to);

  $subject = $_POST['subject'];
  $subject = mysqli_escape_string($conn, $subject);

  $opr = $_POST['opr'];
  $opr = mysqli_escape_string($conn, $opr);

  $statement = $_POST['statement'];
  $statement = mysqli_escape_string($conn, $statement);


  $brgy = $_POST['brgy'];
  $brgy = mysqli_escape_string($conn, $brgy);




  $time = date("h:i:s", time());
  $date = date('y-m-d');

  $date_start = date('Y-m-d h:i', strtotime($_POST['date_start']));
  $date_end = date('Y-m-d h:i', strtotime($_POST['date_end']));

  $date_new_start = new DateTime($date_start);
  $date_new_end = new DateTime($date_end);

  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);

  print_r($date_start);
  print_r($date_end);




  $diff = $date_new_end->diff($date_new_start)->format("%a");  //find difference
  $days = intval($diff);

  if ($days == 1) {
    $duration = "Daily";
  } elseif ($days == 7) {
    $duration = "Weekly";
  } elseif ($days > 2 || $days <= 14) {
    $duration = "Bi-weekly";
  } elseif ($days == 30) {
    $duration = "Monthly";
  } elseif ($days == 90) {
    $duration = "Quarterly";
  } elseif ($days >= 180) {
    $duration = "Semestral";
  } elseif ($days == 365) {
    $duration = "Annualy";
  }






  //file upload 
  if (isset($_FILES['pdf_file']['name'])) {
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];

    move_uploaded_file($file_tmp, "./Images/" . $file_name);


    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;

        //insert a query




        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);



        if ($run_insert_report) {

          $sent_report = "INSERT INTO `sent`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
          VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
          $run_sent_report = mysqli_query($conn, $sent_report);

          if ($run_sent_report) {

            $data['message'] = "sucess";
            $pusher->trigger('my-channel', 'my-event', $data);


            echo "<script>alert('Success')</script>";
          }
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";




      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
      VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {

        $sent_report = "INSERT INTO `sent`(`user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
          VALUES ('$user_id','$report_id','$from','$to','$brgy','$subject','$opr','$statement','$duration','$file_name','3','0','$date_start','$date_end','$days','$date','$time','$date','$time')";
        $run_sent_report = mysqli_query($conn, $sent_report);

        if ($run_sent_report) {
          $data['message'] = "sucess";
          $pusher->trigger('my-channel', 'my-event', $data);

          echo "<script>alert('Success')</script>";
        }
      } else {
        $conn->error;
      }
    }
  }
}


if (isset($_POST['draft'])) {


  $data['message'] = "sucess";
  $pusher->trigger('my-channel', 'my-event', $data);

  $time = date("h:i:s", time());
  $date = date('y-m-d');


  $from = $_POST['from'];
  $from = mysqli_escape_string($conn, $from);

  $to = $_POST['to'];
  $to = mysqli_escape_string($conn, $to);

  $subject = $_POST['subject'];
  $subject = mysqli_escape_string($conn, $subject);

  $statement = $_POST['statement'];
  $statement = mysqli_escape_string($conn, $statement);
  $status = 2;


  //file upload 

  $targetDir = "pdf/";
  $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');

  $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
  $fileNames = array_filter($_FILES['files']['name']);
  if (!empty($fileNames)) {
    foreach ($_FILES['files']['name'] as $key => $val) {
      // File upload path 
      $fileName = basename($_FILES['files']['name'][$key]);
      $targetFilePath = $targetDir . $fileName;

      // Check whether file type is valid 
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
      if (in_array($fileType, $allowTypes)) {
        // Upload file to server 
        if (is_uploaded_file($_FILES["files"]["tmp_name"][$key])) {

          $mime = mime_content_type($_FILES["files"]["tmp_name"][$key]);

          if ($mime === 'application/pdf') {

            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
              // Image db insert sql 
              $insert_pdf_ValuesSQL .= $fileName;
            } else {
              $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
            }
          } elseif (strpos($mime, 'image/') === 0) {

            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
              // Image db insert sql 
              $insert_images_ValuesSQL .= $fileName;
            } else {
              $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
            }
          } else {
            echo ("not supported file, please choose pdf or jpg or png");
          }
        }
      }
    }







    // validation of report id 
    //insert report id 

    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;

        //insert a query
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "sucess";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "sucess";
      } else {
        $conn->error;
      }
    }
  } else {
    // with out docuemnts
    $validate_report = "SELECT * FROM reports ORDER BY report_id DESC LIMIT 1";
    $run_validate_report = mysqli_query($conn, $validate_report);


    $insert_pdf_ValuesSQL = "";
    $insert_images_ValuesSQL = "";

    if (mysqli_num_rows($run_validate_report) > 0) {

      foreach ($run_validate_report as $row) {
        $report_id = $row['report_id'];
        $get_number = str_replace("RID", "", $report_id);
        $id_increment = $get_number + 1;
        $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

        $report_id = "RID" . $get_string;

        //insert a query
        $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
        $run_insert_report = mysqli_query($conn, $insert_report);

        if ($run_insert_report) {
          echo "sucess";
        } else {
          $conn->error;
        }
      }
    } else {

      $report_id = "RID00001";

      $insert_report = "INSERT INTO `reports`(`user_id`, `report_id`, `from_user`, `to_user`, `subject`, `message`, `pdf_files`, `image`, `status`, `date_created`, `time_created`, `date_updated`, `time_updated`) 
        VALUES ('$user_id','$report_id','$from','$to','$subject','$statement','$insert_pdf_ValuesSQL','$insert_images_ValuesSQL','$status','$date','$time','$date','$time')";
      $run_insert_report = mysqli_query($conn, $insert_report);

      if ($run_insert_report) {
        echo "sucess";
      } else {
        $conn->error;
      }
    }
  }
}



?>