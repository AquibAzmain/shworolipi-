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

//getAllSongs
$song = new Song();
$dataSong = $song->viewAllTitleBengali();
$dataSongId = $song->viewAllSongId();
$dataSongArtist = $song->viewAllArtist();
$arrSong = count($dataSong);

if(isset($_POST['songToPlaylist']) && !empty($_POST['song'])){
  $song = $_POST["song"];
  $playlistName = $_POST["playlistName"] ;
  $N = count($song);
   //getPlaylistId
  $playlist1 = new Playlist();
  $playlist1->_setMemberId($member_id);
  $playlist1->_setPlaylistName($playlistName);
  $playlist_id = $playlist1->getPlaylistId();

  include 'addSong.php';
}
   
if(isset($_POST['newSongToPlaylist'])){
  $playlist = $_POST["playlist"];
       
  //getPlaylistId
  $playlist1 = new Playlist();
  $playlist1->_setMemberId($member_id);
  $playlist1->_setPlaylistName($playlist);
  $playlist_id = $playlist1->getPlaylistId();

  
?>

    <!--newSongtoPlaylist-->
  <div class="w3-container">
      <div id="id02"  style="display:block">
        <div style = "width: 80%" class="w3-modal-content w3-animate-top">
          <header class="w3-container w3-teal  w3-center"> 
            <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <p> প্লেলিস্ট (<?php echo $playlist?>)এ গান যুক্ত করুন এবং রিফ্রেশ করুন</p>
          </header>
          <div class="w3-container">
            <form action = "" method = "POST"> 
            <br/>
                <input type="text" id="myInput2" onkeyup="myFunctionSearch2()" placeholder="গান খুঁজুন" title="Type in a name">
                <table id="myTable2"  style="width:100%">
                <?php for($x = 0; $x < $arrSong; $x++) {?>  
                    
                    <tr>
                          <td>
                            <input type="checkbox" name="song[]" value="<?php echo $dataSongId[$x];?>">             
                            <?php echo $dataSong[$x]. "(".$dataSongArtist[$x].")" ;?>
                            <input type = 'hidden' name = 'playlistName' value = "<?php echo $playlist?>">
                                  
                           </td>   
                    </tr>
                  
                <?php      }
                ?> 
                </table>
                <input type = "submit"   class="w3-btn w3-block w3-black" name = "songToPlaylist" value = "নিশ্চিত করুন">
            </form>

          </div>
        </div>
      </div>
    </div> 
<?php 
}
?>

<link rel="stylesheet" type="text/css" href="myStyle.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <style>
    .fixed {
        position: fixed;
        bottom: 0;
        width: 1000px;
        border: 10px solid black;
    }
    #myInput2 {
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }
    #myTable2 {
      border-collapse: collapse; 
      font-size: 15px;
      display: block;
      overflow-y: auto;
      overflow-x: auto;
      height:200px;   
    }
      #myTable2 th, #myTable2 td {
      text-align: left;
      padding: 12px;
      width: 100%;
    }
 </style> 


<script type="text/javascript">
function myFunctionSearch2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
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
</script>	
</html>