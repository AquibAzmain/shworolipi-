<?php
include 'db.php';
include '../class/musicPlayerClass.php';
$musicPlayer = new MusicPlayer();
$totalRows = $musicPlayer ->getTotalSongNumber();
//$songToPlay = $songID = $lyrics = "";

if(isset($_POST['submitPlay'])){
	$submitPlay = $_POST["play"];

	$sqlSongFile = $musicPlayer->getSong($submitPlay);
    $result = mysqli_query($mysqli,$sqlSongFile) or die(mysql_error());
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
           $songToPlay = $row["title_English"];
           $songID = $row["song_id"];
           $lyrics = $row["lyric"];
           $popularity = $row['popularity'];
           $songID = $songID-1;
        }

        //updatePopularity
        $musicPlayer->updatePopularity($popularity,$submitPlay);
 

        $nextSongsQuery = $musicPlayer->getNextAndPreviousSongs($songID,$totalRows);
		$nextSongsResult = mysqli_query($mysqli,$nextSongsQuery) or die(mysql_error());
		while($row = $nextSongsResult->fetch_assoc()) {
		   $nextSongs[] = $row['title_English'];
		   $lyricsAll[] = $row['lyric'];
		   $singerAll[] = $row['artist'];
		   $banglaTitleAll[] = $row['title_Bengali'];
		   $categoryAll[] = $row['genre'];
		   $moodAll[] = $row['mood'];
		}


    }

    else{ 
    	$submitPlay = $_POST["play"];

		$sqlSongFile = "SELECT * FROM song WHERE artist = '$submitPlay'";
	    $result = mysqli_query($mysqli,$sqlSongFile) or die(mysql_error());
	    if ($result->num_rows > 0) {
	    // output data of each row
	        while($row = $result->fetch_assoc()) {
	           $songToPlay = $row["title_English"];
	           $songID = $row["song_id"];
	           $songID = $songID-1;
	        }
	        $nextSongsQuery = "SELECT * FROM song where artist = '$submitPlay'";
			$nextSongsResult = mysqli_query($mysqli,$nextSongsQuery) or die(mysql_error());
			while($row = $nextSongsResult->fetch_assoc()) {
		   		$nextSongs[] = $row['title_English'];
		   		$lyricsAll[] = $row['lyric'];
		   		$singerAll[] = $row['artist'];
		   		$banglaTitleAll[] = $row['title_Bengali'];
		   		$categoryAll[] = $row['genre'];
		   		$moodAll[] = $row['mood'];

			}
	    }

?>
    <script>
    //window.history.back();
    //window.alert("গানটি খুঁজে পাওয়া যায় নি।");
    </script>
<?php    
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title> Music player </title>
		<meta charset="utf-8">
		<link rel = "stylesheet" type = "text/css" href = "musicPlayer.css">
		<link rel = "stylesheet" type = "text/css" href = "w3.css">
		<style>
		.sidenav {
		    height: 100%;
		    width: 0;
		    position: fixed;
		    z-index: 1;
		    top: 0;
		    left: 0;
		    background-color: #111;
		    overflow-x: hidden;
		    transition: 0.5s;
		    padding-top: 25px;
		}

		.sidenav p,a {
		    padding: 8px 8px 8px 8px;
		    text-decoration: none;
		    font-size: 13px;
		    color: #818181;
		    display: block;
		    transition: 0.3s;
		}

		.sidenav a:hover, .offcanvas a:focus{
		    color: #f1f1f1;
		}

		.sidenav .closebtn {
		    position: absolute;
		    top: 0;
		    right: 25px;
		    font-size: 36px;
		    margin-left: 50px;
		}

		#main {
		    transition: margin-left .5s;
		    padding: 10px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		</style>
			
	</head>
	<body bgcolor = "#111316">

<div id="main">
<div id="myNav" class="overlay" style="max-width:2000px;margin-top:46px">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<div class = "audio_player_cont">
		<div class = "player">
			<div id = "songTitle" class = "song_title">  </div>
			<input id = "songSlider" class = "song_slider" type = "range" min = "0" step = "1" onchange = "seekSong()" />
			<div>
				<div id = "currentTime" class = "current_time"> 00:00 </div>
				<div id = "duration" class = "duration_time"> 00:00 </div>
			</div>
			<div id = "controllers" class = "controllers">
				<img src = "images/lyric.png" style="cursor:pointer" width = "40px" height = "30px" onclick="openSideNav()" />
				<img src = "images/backward.png" style="cursor:pointer" width = "40px" height = "30px" onclick = "toPlayBackward();" />
				<img src = "images/pause.png" style="cursor:pointer" width = "50px" height = "40px"  onclick = "toPlayOrPause(this);" />
				<img src = "images/replay.png" style="cursor:pointer" width = "40px" height = "30px"  onclick = "toReplay();" />
				<img src = "images/forward.png" style="cursor:pointer" width = "40px" height = "30px"  onclick = "toPlayForward();" />
				<img src = "images/sound.png" style="cursor:pointer" width = "40px" height = "30px" onclick = "toMuteUnmute(this);"/>
				<input id = "volumeSlider" style="cursor:pointer" class = "volume_slider" type = "range" min = "0" max = "1" step = ".01" onchange = "adjustVolume();" />
			</div>
		</div>
		
		</div>

</div>
</div>

<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
	<div><p id = "songBanglaTitle"> </p></div>
	<div><p id = "songSinger">  </p></div>
	<div><p id = "songCategory"> </p></div>
	<div><p>গানের কথাঃ <p id = "songLyrics" style="text-align: center"></p></div>
</div>


</body>
<script type = "text/javascript" src = "msJS.js"> </script>

<script>
	/*var firstSong = ["<?php echo $songToPlay ?>"];
	var nextSongs = <?php echo json_encode($nextSongs)?>;
	var songList = firstSong.concat(nextSongs);	*/

	var songList = <?php echo json_encode($nextSongs)?>;
	var lyricsList = <?php echo json_encode($lyricsAll)?>;
	var banglaTitleList = <?php echo json_encode($banglaTitleAll)?>;
	var singerList = <?php echo json_encode($singerAll)?>;
	var categoryList = <?php echo json_encode($categoryAll)?>;
	var moodList = <?php echo json_encode($moodAll)?>;



function openSideNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeSideNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>	
</html>