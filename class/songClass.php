<?php
class Song {
	private $song_id;
    private $title_English;
    private $title_Bengali;
    private $artist;
    private $genre;
    private $lyric;
    private $popularity;
    private $mood;   

    public function viewAllSongId(){
        include 'dbConnect.php';
        $sql="SELECT * from song";
        $result=$mysqli->query($sql);
        while($row=$result->fetch_assoc()){
            $dataSongId[] = $row["song_id"];
        }
        return $dataSongId;
    }	

    public function viewAllTitleBengali(){
        include 'dbConnect.php';
        $sql="SELECT * from song";
        $result=$mysqli->query($sql);
        while($row=$result->fetch_assoc()){
            $dataSong[] = $row["title_Bengali"];
        }
        return $dataSong;
    }

    public function viewAllArtist(){
        include 'dbConnect.php';
        $sql="SELECT * from song";
        $result=$mysqli->query($sql);
        while($row=$result->fetch_assoc()){
            $dataSongArtist[] = $row["artist"];
        }
        return $dataSongArtist;
    }

    public function getSongId()
    {
        return $this->song_id;
    }

    public function _setSongId($song_id)
    {
        $this->song_id = $song_id;

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

    public function getGenre()
    {
        return $this->genre;
    }

    public function _setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    public function getLyric()
    {
        return $this->lyric;
    }

    public function _setLyric($lyric)
    {
        $this->lyric = $lyric;

        return $this;
    }

    public function getPopularity()
    {
        return $this->popularity;
    }

    public function _setPopularity($popularity)
    {
        $this->popularity = $popularity;

        return $this;
    }

    public function getMood()
    {
        return $this->mood;
    }

    public function _setMood($mood)
    {
        $this->mood = $mood;

        return $this;
    }
}
?>