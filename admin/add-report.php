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
    <div>
      <textarea id="tiny" name="message"> </textarea>
    </div>
    <input type="submit" name="send" value="Send">
  </form>

  <script>
    $('textarea#tiny').tinymce({
      height: 500,
      menubar: true,
      plugins: [
        'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
        'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
        'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount', 'save', 'autosave'
      ],
      toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help | save | restoredraft'
    });
  </script>
</body>

</html>

<?php

if (isset($_POST['send'])) {
  $message = $_POST['message'];
  echo $message;
}

?>