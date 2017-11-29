<?php
require_once 'dbconnect.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();
mysqli_set_charset($mysqli,"utf8");
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = "SELECT * FROM song WHERE lyric LIKE '%".$searchTerm."%' ORDER BY lyric ASC";
$result = mysqli_query($mysqli,$query) or die(mysql_error());

while ($row = $result->fetch_assoc()) {
    $data[] = $row['lyric'];
}
//return json data
echo json_encode($data);
?>