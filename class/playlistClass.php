<?php
class Playlist {
	private $playlistName;
	private $member_id;
	private $song;
	private $playlist_id;
	private $title_English;
    private $title_Bengali;
    private $artist;

	public function getPlaylistId(){
		include 'dbConnect.php';
		$query = "SELECT * FROM playlist WHERE name = '$this->playlistName' AND member_id = '$this->member_id'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        while($row=$result->fetch_assoc()){
              $playlist_id = $row["playlist_id"];
        }
        return $playlist_id;
	}

	public function rename(){
		include 'dbConnect.php';
		$sqlSong = "UPDATE playlist SET name = '$this->playlistName' WHERE playlist_id = '$this->playlist_id'";
   		$mysqli->query($sqlSong);
   		?>
   		<script> 
            window.location = 'indexPlaylist.php';
        </script>
        <?php
	}

	public function deleteSong($song){
		include 'dbConnect.php';
		$query = "DELETE FROM adds WHERE playlist_id = $this->playlist_id AND song_id = $song";
    	$mysqli->query($query);
	}

	public function deletePlaylist($deletePlaylistName){
		include 'dbConnect.php';
		$query = "DELETE FROM playlist WHERE name = '$deletePlaylistName' AND member_id = '$this->member_id'";
    	$result = mysqli_query($mysqli,$query) or die(mysql_error());
        ?>
        <script> 
            window.alert("প্লেলিস্ট মুছে দেয়া হয়েছে।");
            window.location = 'indexPlaylist.php';
        </script>  
		<?php
	}


	public function getAllTitleEnglish(){
        include 'dbConnect.php';
        $sql="SELECT * from adds,song WHERE playlist_id = '$this->playlist_id' AND song.song_id = adds.song_id";
  		$result=$mysqli->query($sql);
        while($row=$result->fetch_assoc()){
            $data[] = $row["title_English"];
        }
        if (!empty($data)){
            return $data;
        }
    }

	public function getAllTitleBengali(){
        include 'dbConnect.php';
       	$sql="SELECT * from adds,song WHERE playlist_id = '$this->playlist_id' AND song.song_id = adds.song_id";
  		$result=$mysqli->query($sql);
        while($row=$result->fetch_assoc()){
            $data[] = $row["title_Bengali"];
        }
        if (!empty($data)){
            return $data;
        }
    }

    public function getAllArtist(){
        include 'dbConnect.php';
        $sql="SELECT * from adds,song WHERE playlist_id = '$this->playlist_id' AND song.song_id = adds.song_id";
  		$result=$mysqli->query($sql);
        while($row=$result->fetch_assoc()){
            $data[] = $row["artist"];
        }
        if (!empty($data)){
            return $data;
        }
    }

    public function getAllSongId(){
        include 'dbConnect.php';
        $sql="SELECT * from adds,song WHERE playlist_id = '$this->playlist_id' AND song.song_id = adds.song_id";
  		$result=$mysqli->query($sql);
        while($row=$result->fetch_assoc()){
            $data[] = $row["song_id"];
        }
        if (!empty($data)){
            return $data;
        }
    }

	public function _setMemberId($member_id)
    {
        $this->member_id = $member_id;

        return $this;
    }

    public function _setPlaylistName($playlistName)
    {
        $this->playlistName = $playlistName;

        return $this;
    }
    public function _setPlaylistId($playlist_id)
    {
        $this->playlist_id = $playlist_id;

        return $this;
    }

    public function getTitleEnglish()
    {
        return $this->title_English;
    }

    public function _setTitleEnglish($title_English)
    {
        $this->title_English = $title_English;

        return $this;
    }

    public function getTitleBengali()
    {
        return $this->title_Bengali;
    }

    public function _setTitleBengali($title_Bengali)
    {
        $this->title_Bengali = $title_Bengali;

        return $this;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function _setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

}
?>