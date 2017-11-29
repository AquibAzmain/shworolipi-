 <?php
$mysqli = mysqli_connect("localhost","root","","shworolipi");
mysqli_set_charset($mysqli,"utf8");
$sqlSong = "INSERT INTO adds (playlist_id,song_id) VALUES ";
for($i=0; $i < $N; $i++)
{
  $sqlSong .= "('" .$playlist_id. "',"."'". $song[$i] . "')," ;
}
$sqlSong = rtrim($sqlSong,',');
$mysqli->query($sqlSong);
?>