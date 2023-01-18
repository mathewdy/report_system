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

    $statement = $conn->prepare($query);

    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row["brgy"];
    }
}

echo json_encode($data);
