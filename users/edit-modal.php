<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

$note_id = $_POST['note'];
$sql_notes = "SELECT * FROM notes WHERE id = '$note_id'";
$run_notes = mysqli_query($conn,$sql_notes);
?>

<form action="edit-notes.php" method="post">
<?php
if(mysqli_num_rows($run_notes) > 0){
    foreach($run_notes as $row_notes){
?>
    <input type="hidden" name="hidden" id="hidden">
    <div class="mb-3">
    <label for="message-text" class="col-form-label">Contents:</label>
    <textarea class="form-control" id="tiny" name="tiny"> <?= $row_notes['content']?></textarea>
    </div>
    <span class="d-flex justify-content-end align-items-center">
        <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update" >Update</button>
    </span>
</form>
<?php
    }
}
?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
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