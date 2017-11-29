<?php
require 'dbconnect.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();
mysqli_set_charset($mysqli,"utf8");
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = "SELECT * FROM song WHERE title_Bengali LIKE '%".$searchTerm."%' ORDER BY title_Bengali ASC";
$result = mysqli_query($mysqli,$query) or die(mysql_error());

while ($row = $result->fetch_assoc()) {
    $data[] = $row['title_Bengali'];
}
//return json data
echo json_encode($data);
?>