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
    <input type="hidden" name="hidden" id="hidden" value="<?= $note_id; ?>">
    <div class="mb-3">
    <label for="message-text" class="col-form-label">Contents:</label>
    <textarea class="form-control" id="tiny" name="tiny" placeholder="" > <?= $row_notes['content']?></textarea>
    </div>
    <span class="d-flex justify-content-end align-items-center">
        <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name = "update" >Update</button>
    </span>
</form>
<?php

error_reporting(E_ERROR | E_PARSE);
    }
}
?>