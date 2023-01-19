<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

$data = array();

if (isset($_GET["query"])) {

    // fix the query 
    $query = "
 SELECT brgy FROM barangay 
 WHERE brgy LIKE '" . $_GET["query"] . "%' 
 ORDER BY brgy ASC 
 LIMIT 15
 ";

    $run_query = mysqli_query($conn, $query);

    if (mysqli_num_rows($run_query)) {
        foreach ($run_query as $row) {
            $data[] = $row['brgy'];
        }
    }





    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row["brgy"];
    }
}

echo json_encode($data);
