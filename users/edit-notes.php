<?php
date_default_timezone_set('Asia/Manila');
include('../connection.php');

if (isset($_POST['update'])) {

  if (isset($_POST['hidden'])) {
    $note_id = $_POST['hidden'];
    $statement = $_POST['tiny'];

    $time = date("h:i:s", time());
    $date = date('y-m-d');

    $update = "UPDATE `notes` SET `content`='$statement',`date_updated`='$date',`time_updated`='$time' WHERE id = '$note_id'";
    $run_update = mysqli_query($conn, $update);

    if ($run_update) {
      echo "<script>window.location.href='home.php' </script>";
    }
  }
}

echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Notes</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                 <input type="hidden" name="hidden" id="hidden">
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Contents:</label>
                  <textarea class="form-control" id="tiny" name="tiny"> </textarea>
                </div>

                <button type="submit" class="btn btn-primary" name = "update" >Update</button>
              </form>
            </div>
            <div class=" modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>';
