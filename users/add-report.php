<?php

ob_start();
session_start();
include('../connection.php');
 $user_id = $_SESSION['user_id'];
 $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">

      <!---or ajax search to select na lang ng recipients--> 
      <!---kapag pinindot na yung textbox for recipients mag papalit ng placeholder parang sa gmail--->

      <label for="">To:</label>
      <input type="email" name="to_user" value="sample@gmail.com" placeholder="Email" required>

      <label for="">Subject:</label>
      <input type="text" name="subject" placeholder="Subject" required>

      <textarea id="default" name="message" placeholder="Enter your report"></textarea>
      <br>
      <label for="">Image</label>
      <input type="file" name="images[]" multiple>
      <br>
      <label for="">PDF</label>
      <input type="file" name="PDF">
      <br>
      <input type="submit" name="send" value="Send">
    </form>




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
    'forecolor backcolor emoticons',
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

if(isset($_POST['send'])){



  // NEXT NAMAN YUNG SA PDF NA upload PDF sheeesh


  $to_user = $_POST['to_user'];
  $subject = $_POST['subject'];

  
  //year month date
  date_default_timezone_set("Asia/Manila");
  $time = date("h:i:s", time());
  $date = date('y-m-d');

  $message = $_POST['message'];
  $message = mysqli_escape_string($conn,$message);

  $query_report_id = "SELECT report_id FROM reports";
  $run_report_id = mysqli_query($conn,$query_report_id);
  $row = mysqli_num_rows($run_report_id);

  if(empty($row)){
    $report_id = "RID00001";
  }else{
    $get_number = str_replace("RID", "", $row);
    $id_increment = $get_number + 1;
    $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);
    $report_id = "RID" . $get_string;
  }



  $images = $_FILES['images'];

  # Number of images
    $num_of_imgs = count($images['name']);

    for ($i=0; $i < $num_of_imgs; $i++) { 
      
      # get the image info and store them in var
      $image_name = $images['name'][$i];
      $tmp_name   = $images['tmp_name'][$i];
      $error      = $images['error'][$i];

      # if there is not error occurred while uploading
      if ($error === 0) {
        
        # get image extension store it in var
        $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);

        
      $img_ex_lc = strtolower($img_ex);
            
      $allowed_exs = array('jpg', 'jpeg', 'png');



      if (in_array($img_ex_lc, $allowed_exs)) {
      
      $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
        
        # crating upload path on root directory
        $img_upload_path = 'report_image_uploads/'.$new_img_name;
        $pdf = 1;

        $sql_image  = "INSERT INTO reports (user_id,report_id,from_user,to_user,subject,message,pdf_files,image,date_created,time_created,date_updated,time_updated) VALUES ('$user_id', '$report_id','$email', '$to_user','$subject','$message','$pdf','$new_img_name', '$date', '$time', '$date', '$time' )";
        $run_image = mysqli_query($conn,$sql_image);
        # move uploaded image to 'uploads' folder
        move_uploaded_file($tmp_name, $img_upload_path);
        if($run_image){
          echo "added to database";
        }else{
          echo "<script>alert('$conn->error') </script>";
        }
        
      }else {
        # error message
            echo 	$em = "You can't upload files of this type";

          /*
          redirect to 'index.php' and 
          passing the error message
            */

              // header("Location: index.php?error=$em");
      }

    
      }else {
        # error message
        echo $em = "Unknown Error Occurred while uploading";

        /*
        redirect to 'index.php' and 
        passing the error message
          */

          // header("Location: index.php?error=$em");
      }
    }	



	
}
  

  
	// $images = $_FILES['images'];
  // $num_of_imgs = count($images['name']);

  // for($i = 0; $i< $num_of_imgs; $i++){
  //   $image_name = $images['name'][$i];
  //   $tmp_name = $images['tmp_name'][$i];
  //   $error = $images['error'][$i];
  // }

  // if($error === 0){


  //   //value muna ni pdf
  //   $pdf = 1;

  //   //upload na to
  //   $img_ex = pathinfo($image_name,PATHINFO_EXTENSION);
  //   $img_ex_lc = strtolower($img_ex);
  //   $allowed_extension = array('gif' , 'png' , 'jpeg', 'jpg' , 'PNG' , 'JPEG' , 'JPG' , 'GIF');
  //   if(in_array($img_ex_lc,$allowed_extension)){
  //     $new_image_name = uniqid('IMG-', true). '.'.$img_ex_lc;

  //     $image_upload_path = 'report_image_uploads/' . $new_image_name;

  //     //check muna natin kung may laman na yung mga reports or wala
  //       $query_reports = "SELECT * FROM reports ORDER BY user_id DESC LIMIT 1";
  //       $run_reports = mysqli_query($conn, $query_reports);
  //       if(mysqli_num_rows($run_reports) > 0) {
  //         foreach ($run_reports as $row) {
  //             $user_id = $row['user_id'];
  //             $get_number = str_replace("RID", "", $user_id);
  //             $id_increment = $get_number + 1;
  //             $get_string  = str_pad($id_increment, 5, 0, STR_PAD_LEFT);

  //             $id = "RID" . $get_string;
  //             //insert sa database

  //             $query_insert_image = "INSERT INTO reports (user_id,report_id,from_user,to_user,subject,message,pdf_files,image,date_created,time_created,date_updated,time_updated) VALUES ('$user_id', '$id','$email', '$to_user','$subject','$message','$pdf','$new_image_name', '$date', '$time', '$date', '$time' )";
  //             $run_insert_image = mysqli_query($conn,$query_insert_image);
  //             move_uploaded_file($tmp_name, $image_upload_path);

  //             if($run_insert_image){
  //             echo "inserted sa database";
  //             }else{
  //               echo "error" .$conn->error;
  //             }

              
  //         }
  //       }

    
  //     }else{
  //       //restriction
  //       echo "bawal yung ibang file bobo";
  //       echo "error while uploading 2";
  //     }
  
  //   }else{
  //     echo "Error while uploading 1";
  //     // maya na yung redirection
  //     echo "ulet";
  //   }
          

  // $sql = "INSERT INTO sample (message,image) VALUES ('$message','$image')";
  // $run = mysqli_query($conn,$sql);
  // move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"] ["name"]);

  // if($run == TRUE){
  //   echo "message sent";
  // }else{
  //   echo "error" . $conn->error;
  // }

?>