<?php


include('../connection.php');

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

      <!---or dropdown to select na lang ng recipients-->

      <!---kapag pinindot na yung textbox for recipients mag papalit ng placeholder parang sa gmail--->
      <input type="text" name="recipients" placeholder="recipients">
      <input type="text" name="subject" placeholder="subject">
      <textarea id="default" name="message"></textarea>
      <br>
      <input type="file" name="image">
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
  $message = $_POST['message'];
  
  
  $image = $_FILES['image']['name'];
  $allowed_extension = array('gif' , 'png' , 'jpeg', 'jpg' , 'PNG' , 'JPEG' , 'JPG' , 'GIF');
  $filename = $_FILES ['image']['name'];
  $file_extension = pathinfo($filename , PATHINFO_EXTENSION);


  $sql = "INSERT INTO sample (message,image) VALUES ('$message','$image')";
  $run = mysqli_query($conn,$sql);
  move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"] ["name"]);

  if($run == TRUE){
    echo "message sent";
  }else{
    echo "error" . $conn->error;
  }
}

?>