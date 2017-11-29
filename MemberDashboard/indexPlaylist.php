<?php
include 'auth.php';
include '../class/memberClass.php';
include '../class/playlistClass.php';
include '../class/songClass.php';
$email = $_SESSION['email'];

//getMemberId
$member = new Member();
$member->_setEmail($email);
$member_id = $member->getMemberId();

//updatePlaylistName
if(isset($_POST['updatePlaylistNameSubmit'])){    
    $name = $_POST["updatePlaylistName"];
    $oldName = $_POST["oldName"];  
    //getOldName
    $playlist = new Playlist();
    $playlist->_setMemberId($member_id);
    $playlist->_setPlaylistName($oldName);
    $playlist_id = $playlist->getPlaylistId();
    //Rename
    $playlist->_setPlaylistName($name);
    $playlist->_setPlaylistId($playlist_id);
    $playlist->rename();
}

//getAllSongs
$song = new Song();
$dataSong = $song->viewAllTitleBengali();
$dataSongId = $song->viewAllSongId();
$dataSongArtist = $song->viewAllArtist();
$arrSong = count($dataSong);
 
//newPlaylist
if(isset($_POST['newPlaylist'])){
    $newPlaylistName = $_POST["newPlaylistName"];
    if($newPlaylistName != NULL){ 
      $member->_setNewPlaylistName($newPlaylistName);
      $member->_setMemberId($member_id);
      $member->createPlaylist();
       
      $playlist = new Playlist();
      $playlist->_setMemberId($member_id);
      $playlist->_setPlaylistName($newPlaylistName);
      $playlist_id = $playlist->getPlaylistId();
      
      if(!empty($_POST['song'])){
        $song = $_POST["song"];
        $N = count($song); 
        include 'addSong.php';
      } 
      ?>
      <script> 
        window.alert("প্লেলিস্ট তৈরি হয়েছে।");
        window.location = 'indexPlaylist.php';
      </script>
      <?php
    }
    else {
        ?>
        <script> 
            window.alert("প্লেলিস্ট তৈরি হয় নি।");
            window.location = 'indexPlaylist.php';
        </script>   
<?php
    }
}

//showAllPlaylists
$noPlaylist ="";
$member->_setMemberId($member_id);
$data = $member->showPlaylist();
if (!empty($data)) {
    $arrlength = count($data);
}
else {
    $arrlength = 0;
    $noPlaylist = "কোনো প্লেলিস্ট নেই";
}


if(isset($_POST['submitPlaylist'])){
  $playlist=$_POST["playlist"];

  $playlist1 = new Playlist();
  $playlist1->_setMemberId($member_id);
  $playlist1->_setPlaylistName($playlist);
  $playlist_id = $playlist1->getPlaylistId();

 
  $playlist1->_setPlaylistId($playlist_id);
  $title_Bengali = $playlist1->getAllTitleBengali();
  $title_English = $playlist1->getAllTitleEnglish();
  $artist = $playlist1->getAllArtist();

  if (!empty($title_Bengali)) {
      $arrlength2 = count($title_Bengali);
  }
  else {
      $arrlength2 = 0;
  }
}

 
?> 
<!DOCTYPE html>
<html>
<title>স্বরলিপি</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="myStyle.css">
<style>
  html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}



  button {
    cursor: pointer;
  }

  .fixed {
      position: fixed;
      bottom: 0;
      width: 1000px;
      border: 10px solid black;
  }
    #myInput {
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }
    #myTable {
      border-collapse: collapse; 
      font-size: 15px;
      display: block;
      overflow-y: auto;
      overflow-x: auto;
      height:200px;   
    }
    
    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
      width: 100%;
    }
  

  
    .btn-group button {
      border: 1px solid; 
      cursor: pointer; /* Pointer/hand icon */
      float: left; /* Float the buttons side by side */
    }
    #playlist{
      list-style: none;
    }
    #playlist li a{
      color:black;
      text-decoration: none;
    }
    #playlist .current-song a{
      color:blue;
    }

    #myInputAudioSearch {
      background-image: url('/css/searchicon.png');
      background-position: 10px 12px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 15px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }

    #playlist {
      list-style-type: none;
      padding: 0;
      margin: 0;
      display: block;
      overflow-y: auto;
      overflow-x: auto;
      height:200px;
    }

    #playlist li a {
      border: 1px solid #ddd;
      margin-top: -1px; /* Prevent double borders */
      background-color: #f6f6f6;
      padding: 12px;
      text-decoration: none;
      font-size: 15px;
      color: black;
      display: block
    }


    #playlist li a:hover:not(.header) {
      background-color: #eee;
    }
    #playlist .current-song a{
            color:blue;
    }
</style>
<body>




<!-- Navbar -->
<div class="w3-top" style="z-index:3;">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
 <!-- <a href="#" class="w3-bar-item w3-button"> </a> -->
  <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> স্বরলিপি</a>
  <a href="searchindex.php" class="w3-bar-item w3-button w3-hide-small" title="Search"><i class="fa fa-search"></i>গান খুঁজুন</a>
  <a href="indexPlaylist.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-list"></i> প্লেলিস্ট</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right"><i class="fa fa-sign-out"></i>  লগ আউট</a>
 
  
  
 </div>
 </div>

<!-- Sidebar -->
<nav class="w3-sidebar  w3-bar-block w3-collapse w3-large" style="z-index:3;width:250px;margin-top:43px; background-color: #705e42" id="mySidebar">
  
  <a onclick="document.getElementById('id01').style.display='block'"  style = "background-color: #3a2e23"  class="w3-bar-item  w3-btn"><buttonclass="w3-button w3-circle w3-black">+</button> নতুন প্লেলিস্ট</a>
     <p class="w3-bar-item"><?php echo $noPlaylist;?></p>
  <?php for($x = 0; $x < $arrlength; $x++) {?> 
  
   <form action = ""  method="POST"> 
        <input type="hidden" name = "playlist"  value = "<?php echo $data[$x];?>">
        <button class="w3-bar-item button w3-button" onclick="topFunction()" type = "submit" name = "submitPlaylist"><img  hight="25px" width = "25px" src = 'images/music_icon.png'> <?php echo $data[$x];?></button>
    </form>
   


  <?php }?>
 <br/><br/><br/>         
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

<div class="w3-row w3-padding-32">

    
        
    <!--newPlaylist-->
    <div class="w3-container">
      <div id="id01" class="w3-modal">
        <div style = "width: 40%" class="w3-modal-content w3-animate-top w3-card-4">
          <header class="w3-container w3-teal w3-center"> 
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p> নতুন প্লেলিস্ট তৈরি করতে প্লেলিস্ট এর নাম লিখুন</p>
          </header>
          <div class="w3-container">
            <form action = "" method = "POST"> 
            <br/>
                নতুন প্লেলিস্ট এর নামঃ<input type = "text" required style =  "width:70%" name = "newPlaylistName"><br/><hr/>
                <input type="text" id="myInput" onkeyup="myFunctionSearch()" placeholder="গান খুঁজুন" title="Type in a name">
                <table id="myTable"  style="width:100%">
                <?php for($x = 0; $x < $arrSong; $x++) {?>  
                    
                    <tr>
                          <td>  
                            <input type="checkbox" name="song[]" value="<?php echo $dataSongId[$x];?>">           
                            <?php  echo $dataSong[$x]. "(".$dataSongArtist[$x].")";?>    
                           </td>   
                    </tr>
                  
                <?php      }
                ?> 
                </table>
                <input type = "submit" class="w3-btn w3-block w3-black" name = "newPlaylist" value = "নিশ্চিত করুন">
            </form>
          </div>
          <footer class="w3-container w3-teal">
            <p></p>
          </footer>
        </div>
      </div>
    </div>   



    <!--UpdatePlaylistName-->
    <div class="w3-container">
      <div id="id05" class="w3-modal">
        <div style = "width: 40%" class="w3-modal-content w3-animate-top w3-card-4">
          <header class="w3-container w3-teal w3-center"> 
            <span onclick="document.getElementById('id05').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p>প্লেলিস্টের নাম পরিবর্তন করুন</p>
          </header>
          <div class="w3-container">
            <form action = "" method = "POST"> 
            <br/>
                পরিবর্তিত প্লেলিস্টের নামঃ<input type = "text" placeholder = "<?php echo "$playlist";?>" value="" style =  "width:60%" required name = "updatePlaylistName"><br/><hr/>
                <input type = "hidden" name = "oldName" value = "<?php echo "$playlist";?>">
                <input type = "submit" class="w3-btn w3-block w3-black" name = "updatePlaylistNameSubmit" value = "নিশ্চিত করুন">
            </form>
          </div>
          <footer class="w3-container w3-teal">
            <p></p>
          </footer>
        </div>
      </div>
    </div>

   <!--playlist functions-->
  <div style ="background-color: #eaebed" class="w3-container">
    <?php if(isset($_POST['submitPlaylist'])){?>
        <h4 align = 'center'>প্লেলিস্টের নাম :  <?php echo "$playlist"; ?></h4>  
        <div class="btn-group w3-center">
            <form  action = "../musicPlayer/audioPlaylist.php"  method="POST"> 
                <input type="hidden" name = "play"  value = "<?php echo "$playlist";?>"> 
                <button type = "submit" name = "submitPlay" style="width:20%" class="w3-btn w3-black w3-round-large">শুনুন</button>
            </form>  
            <form action = "deletePlaylist.php"  method="POST"> 
                <input type="hidden" name = "deletePlaylist"  value = "<?php echo "$playlist";?>"> 
                <button  type = "submit" name = "submitDeletePlaylist" style="width:20%" class="w3-btn w3-black w3-round-large">প্লেলিস্ট মুছে ফেলুন</button>
            </form>
            <form target="myframe" action = "playlistSongs.php"  method="POST"> 
              <input type="hidden" name = "playlist"  value = "<?php echo "$playlist";?>">
              <button onclick="topFunction2()" type = 'submit' style="width:20%" name = "newSongToPlaylist" class="w3-btn w3-black w3-round-large">নতুন গান যুক্ত করুন</button>
            </form>
            <form target="myframe" action = "deleteSong.php"  method="POST"> 
              <input type="hidden" name = "playlist"  value = "<?php echo "$playlist";?>">
              <button onclick="topFunction2()" type = 'submit' style="width:20%" name = "deleteSongFromPlaylist" class="w3-btn w3-black w3-round-large">গান মুছে ফেলুন</button>
            </form> 
              <button type = "submit" onclick="document.getElementById('id05').style.display='block'" style="width:20%" name = "newSongToPlaylist" class="w3-btn w3-black w3-round-large">প্লেলিস্টের নাম পরিবর্তন</button>
        </div>
      <?php if($arrlength2!=0){?>
        <audio style = "width: 100%" src="" controls id="audioPlayer"></audio>
        <input type="text" id="myInputAudioSearch" onkeyup="myFunctionAudioSearch()" placeholder="খুঁজুন.." title="Type in a name">
        <ul id="playlist">
            <li class = "current-song"><a href="../shworolipiAdmin/uploads/<?php echo $title_English[0];?>"><?php echo $title_Bengali[0]. " - " .$artist[0];?></a>
        <?php for($x = 1; $x < $arrlength2; $x++) {?>
            <li><a href="../shworolipiAdmin/uploads/<?php echo $title_English[$x];?>"><?php echo $title_Bengali[$x]. " - " .$artist[$x];?></a>
        <?php  } ?>    
        </ul>
   
    
      <?php  }  else { echo "প্লেলিস্টে কোনো গান নেই। গান যুক্ত করুন। <br/>";

      }?> <button style="margin:auto; padding:auto;display:block;" align = 'center' class="w3-btn w3-black w3-round-large" onclick="window.location.reload(true);">রিফ্রেশ করুন</button> 
    <?php } else { ?>
    </div>
    <img  src = 'images/musicImage.png' width = "100%">
    <?php    }?>
  

  


  <div class="w3-twothird w3-container">
    <iframe name="myframe" src="" frameborder="0" height="1000px" width=150%" style="overflow-x: hidden"></iframe>
  </div>

</div>


 <!-- Footer -->
<footer class="w3-container  w3-center  w3-black w3-xlarge">
  <p class="w3-medium"><img src="images/logo.png" style="width:100px;height:50px"></p>
</footer>


<!-- END MAIN -->
</div>
<script src="audioPlayer.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
function myFunctionAudioSearch() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInputAudioSearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("playlist");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}

function myFunctionSearch() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

 // loads the audio player
audioPlayer();

// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    document.documentElement.scrollTop = 0; // For IE and Firefox
}
function topFunction2() {
    document.body.scrollTop = 240; // For Chrome, Safari and Opera 
    document.documentElement.scrollTop = 240; // For IE and Firefox
}

</script>

</body>
</html>
