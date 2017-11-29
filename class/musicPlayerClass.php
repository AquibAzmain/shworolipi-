<?php
class MusicPlayer {
	private $song;


	public function getSong($submitPlay){
		$sqlSongFile = "SELECT * FROM song WHERE title_Bengali = '$submitPlay'";
		return $sqlSongFile;
	}


	public function getNextAndPreviousSongs($songID,$totalRows){
		$nextSongsQuery = "(SELECT * FROM song LIMIT $songID, $totalRows) UNION ALL (SELECT * FROM song)";
		return $nextSongsQuery;
	}

	public function getTotalSongNumber(){
		include 'dbConnect.php';
		$totalRowsQuery = "SELECT COUNT(song_id) AS total_rows FROM song";
		$totalRowsResult = mysqli_query($mysqli,$totalRowsQuery) or die(mysql_error());
		while($row = $totalRowsResult->fetch_assoc()) {
		    $totalRows = $row["total_rows"];
		}
		return $totalRows;
	}

	public function updatePopularity($popularity,$submitPlay){
		include 'dbConnect.php';
		$updatePopularity = "UPDATE song SET popularity = $popularity+1 WHERE title_Bengali = '$submitPlay'";
        $result = mysqli_query($mysqli,$updatePopularity) or die(mysql_error());
	}

    public function _setSong($song)
    {
        $this->song = $song;

        return $this;
    }
}
?>