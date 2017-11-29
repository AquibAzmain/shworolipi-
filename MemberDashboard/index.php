<?php
include("auth.php");
require_once 'dbconnect.php';
$db = Database::getInstance();
$mysqli = $db->getConnection(); 
mysqli_set_charset($mysqli,"utf8");

//getPopularSongs
$song_id = $arrSong = $song = $singer = $category = $banglaTitle="";
$getPopularSongs = "SELECT * FROM song ORDER BY popularity DESC LIMIT 9";
$result = $mysqli->query($getPopularSongs);
if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {
    $popularity[] = $row['popularity'];
    $song[] = $row['title_English'];
    $singer[] = $row['artist'];
    $banglaTitle[] = $row['title_Bengali'];
    $category[] = $row['genre'];
  }
}
$arrSong = count($song);

if (isset($_POST['contactSubmit'])){
  $SenderEmail = $_SESSION['email'];
  $Message = $_POST ['Message'];

  require_once '../PHPMailer/PHPMailerAutoload.php';  
      $mail = new PHPMailer;                            
      $mail->isSMTP();                                     
      $mail->Host = 'smtp.gmail.com';  
      $mail->SMTPAuth = true;                            
      $mail->Username = '****************';                 
      $mail->Password = '****************';                          
      $mail->SMTPSecure = 'tls';                            
      $mail->Port = 587;                                      
      $mail->setFrom($SenderEmail, 'shworolipi');
      $mail->addAddress('shworolipi1002@gmail.com');              
      $mail->addReplyTo('shworolipi1002@gmail.com', 'Shworolipi');
      $mail->isHTML(true);                                    
      $mail->Subject = 'Shworolipi Contact' ;
      $mail->Body    = $Message;
      if(!$mail->send()) {
        echo 'ই-মেইল পাঠানো যায় নি।';
        echo 'Mailer Error: ' . $mail->ErrorInfo;

          ?>        
          <script> 
            window.alert("মেইল পাঠানো যায় নি।");
            window.location = 'index.php';
        </script>
      <?php
      }

}      
?> 
<!DOCTYPE html>
<html>
<title>স্বরলিপি</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="myStyle.css">
<style>
  html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}



  #playlist2{width:100%;padding:20px;}
  .active a{color:#5DB0E6;text-decoration:none;}
  li {color:#eeeedd;background:#333;padding:5px;}
  ul {color:#eeeedd;background:#333;padding:5px;}
  li a{text-decoration:none; font-size: 15px}

  button {
    cursor: pointer;
  }

  .fixed {
      position: fixed;
      bottom: 0;
      width: 1000px;
      border: 10px solid black;
  }

    #myTable {
      border-collapse: collapse;

      font-size: 15px;
      display: block;
      overflow-y: auto;
      overflow-x: hidden;
      height:auto;   
    }

    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
      width: 100%;
      
    }

    #myTable tr {
      border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
      background-color: #f1f1f1;
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
  <a href="indexPlaylist.php" class="w3-bar-item w3-button w3-hide-small"> <i class="fa fa-list"></i> প্লেলিস্ট</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right"><i class="fa fa-sign-out"></i> লগ আউট</a>
 
  
  
 </div>
 </div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-teal" style="z-index:3;width:250px;margin-top:43px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <a href = "index.php" class="w3-bar-item"><img src = "images/shwLogo.png" width = "160px" height = "80px"/></a>
  <a onclick="topFunction()" class="w3-bar-item w3-button w3-hover-black" id = "account">অ্যাকাউন্ট</a>
  <a onclick="topFunction()" class="w3-bar-item w3-button w3-hover-black" id ="changePassward">পাসওয়ার্ড পরিবর্তন</a>
  <a onclick="topFunction()" class="w3-bar-item w3-button w3-hover-black" id ="deleteAccount">অ্যাকাউন্ট মুছুন</a>
  <a onclick="topFunction()" class="w3-bar-item w3-button w3-hover-black" id ="guideline">নির্দেশিকা</a>
  <a href="#contact" class="w3-bar-item w3-button w3-hover-black"> যোগাযোগ</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 style = "font-size: 17px" class="w3-text-teal w3-center">গানের মাদল বাজলো প্রাণে <br/>
        মেতে উঠুন বাংলা গানে</h1> <hr/>
      <p></p>
        







      <div id= "changableDiv">
           <!-- First Grid-->
        <div class="w3-row-padding">
         <?php for($x = 0; $x < 3; $x++) {?> 
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png"  style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b><?php echo "$banglaTitle[$x]";?></b></p>
              <p>শিল্পীঃ <?php echo "$singer[$x]"; ?></p>
              <p>বিভাগঃ <?php echo "$category[$x]"; ?></p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="<?php echo "$banglaTitle[$x]"; ?>">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <?php } ?>
        </div>
        
              <!-- First Grid-->
        <div class="w3-row-padding">
         <?php for($x = 3; $x < 6; $x++) {?> 
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png"  style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b><?php echo "$banglaTitle[$x]";?></b></p>
              <p>শিল্পীঃ <?php echo "$singer[$x]"; ?></p>
              <p>বিভাগঃ <?php echo "$category[$x]"; ?></p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="<?php echo "$banglaTitle[$x]"; ?>">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <?php } ?>
        </div>

              <!-- First Grid-->
        <div class="w3-row-padding">
         <?php for($x = 6; $x < 9; $x++) {?> 
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png"  style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b><?php echo "$banglaTitle[$x]";?></b></p>
              <p>শিল্পীঃ <?php echo "$singer[$x]"; ?></p>
              <p>বিভাগঃ <?php echo "$category[$x]"; ?></p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="<?php echo "$banglaTitle[$x]"; ?>">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <?php } ?>
        </div>
        



      </div>

    </div>
    <div class="w3-third w3-container">
      <p class="w3-padding-large w3-right"><img src = "images/rabindra.jpg" width = "220px" height = "300px"/></p>
      <p class="w3-padding-large w3-right"><img src = "images/nazrul.jpg" width = "220px" height = "300px"/></p>
      <p class="w3-padding-large w3-right"><img src = "images/lalon.jpg" width = "220px" height = "300px"/></p>
      <p class="w3-padding-large w3-right"><img src = "images/hason.jpg" width = "220px" height = "300px"/></p>
    </div>
  </div>


  <p class="w3-padding-large w3-center"><img src = "images/harmonium.jpg" width = "800px" height = "400px"/></p>
<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  

      <form action="" method="POST" class="w3-container w3-card-4 w3-padding-16 w3-white">
      <div class="w3-section">      
        <label>মন্তব্য</label>
        <input class="w3-input" type="text" name="Message" required>
      </div>  
      <button name = 'contactSubmit' type="submit" class="w3-button w3-right w3-theme">পাঠিয়ে দিন</button>
      </form>
 
</div>


 <!-- Footer -->
<footer class="w3-container  w3-center  w3-black w3-xlarge">
  <p class="w3-medium"><img src="images/logo.png" style="width:100px;height:50px"></p>
</footer>


<!-- END MAIN -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>


$(document).ready(function(){
$('#account').click(function(){   

    $('#changableDiv').load('account.php');

 });
});

$(document).ready(function(){
$('#changePassward').click(function(){   

    $('#changableDiv').load('changePassword.php');

 });
});


$(document).ready(function(){
$('#deleteAccount').click(function(){   

    $('#changableDiv').load('deleteAccount.php');

 });
});


$(document).ready(function(){
$('#guideline').click(function(){   

    $('#changableDiv').load('guideline.php');

 });
});



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



</script>

</body>
</html>
