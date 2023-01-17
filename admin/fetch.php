<?php
session_start();
date_default_timezone_set('Asia/Manila');
include('../connection.php');
include('session.php');

$data = array();

if (isset($_GET["query"])) {

    // fix the query 
    $query = "
 SELECT country_name FROM apps_countries 
 WHERE country_name LIKE '" . $_GET["query"] . "%' 
 ORDER BY country_name ASC 
 LIMIT 15
 ";

    $statement = $conn->prepare($query);

    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row["country_name"];
    }
}

echo json_encode($data);

?>



?>