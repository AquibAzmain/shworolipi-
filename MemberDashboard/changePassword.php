<?php
include("auth.php");
//echo $_SESSION['email'];
require_once 'dbconnect.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();
mysqli_set_charset($mysqli,"utf8");

$password = "";
 
$email = $_SESSION['email'];
$query = "SELECT * FROM member WHERE email= '$email'";
$result = mysqli_query($mysqli,$query) or die(mysql_error());
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $password = $row["password"];
    }
}
if (isset($_POST['resetPassword'])){
            $newPassword = $_POST['newPassword'];
            $query2 = "UPDATE member SET password='".md5($newPassword)."' WHERE email='".$email."'";
            $result2 = mysqli_query($mysqli,$query2);
            //$_SESSION['email'] = $email;
            ?><script>
            alert ("পাসওয়ার্ড পরিবর্তিত হয়েছে।");
            window.location = 'index.php';  
            </script> <?php
}            
if(isset($_POST['changePassword'])){
	$checkPassword = $_POST["checkPassword"];
	$checkPassword = md5($checkPassword);
	if($checkPassword == $password){
		
        
?>		<div class="w3-container">
		    <div id="id01" class="w3-modal" style="display:block">
		        <div class="w3-modal-content w3-animate-zoom w3-card-8 " style="max-width:600px; background-image:url('images/regi.jpg'); background-size: 100% 100%;">
		                  
		            <div class="w3-center"><br>
		                <span onclick="window.location.href='index.php'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">×</span>
		                        
		            </div>
		            <form class="w3-container" action="" method="post" name="registration" onsubmit="return checkForm(this);">
                        <div class="w3-section">
                            <p align="center">পাসওয়ার্ড পরিবর্তন</p>
                            <label><b>নতুন পাসওয়ার্ড</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="পাসওয়ার্ড"  pattern=".{6,}" title="6 characters minimum" name="newPassword" required>
                            <label><b>আবার লিখুন</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="পাসওয়ার্ড"  pattern=".{6,}" title="6 characters minimum" name="newPassword2" required>
                            <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" name = "resetPassword">নিশ্চিত করুন</button>
                        </div>
                    </form>

		            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
		                <button onclick="window.location.href='index.php'" type="button" class="w3-button w3-red">বাতিল করুন</button>
		            </div>

		        </div>
		    </div>
		</div>



		 <!-- Navbar -->
<div class="w3-top" style="z-index:3;">
 <div class="w3-bar w3-black w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a class="w3-bar-item w3-button"><i class="fa fa-home"></i> স্বরলিপি</a>
  <a  class="w3-bar-item w3-button w3-hide-small" title="Search"><i class="fa fa-search"></i>গান খুঁজুন</a>
  <a  class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-list"></i>প্লেলিস্ট</a>

  <a class="w3-bar-item w3-button w3-hide-small w3-right"><i class="fa fa-sign-out"></i>  লগ আউট</a>
 
  
  
 </div>
 </div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-teal" style="z-index:3;width:250px;margin-top:43px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><img src = "images/shwLogo.png" width = "160px" height = "80px"/></h4>
  <a class="w3-bar-item w3-button w3-hover-black">অ্যাকাউন্ট</a>
  <a onclick="topFunction()" class="w3-bar-item w3-button w3-hover-black" id ="changePassward">পাসওয়ার্ড পরিবর্তন</a>
  <a  class="w3-bar-item w3-button w3-hover-black">অ্যাকাউন্ট মুছুন</a>
  <a  class="w3-bar-item w3-button w3-hover-black">নির্দেশিকা</a>
  <a class="w3-bar-item w3-button w3-hover-black"> যোগাযোগ</a>
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
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>এসো হে বৈশাখ</b></p>
              <p>শিল্পীঃ কাদেরী কিবরিয়া</p>
              <p>বিভাগঃ রবীন্দ্রসঙ্গীত</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="এসো হে বৈশাখ">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>তুমি রবে নীরবে</b></p>
              <p>শিল্পীঃ আকিব আজমাইন</p>
              <p>বিভাগঃ রবীন্দ্রসঙ্গীত</p>
                  <form  action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="তুমি রবে নীরবে">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>আমি বাংলায় গান গাই</b></p>
              <p>শিল্পীঃ মাহ্‌মুদুজ্জামান বাবু</p>
              <p>বিভাগঃ দেশাত্মবোধক গান</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="আমি বাংলায় গান গাই">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
        </div>

        <!-- Second Grid-->
         <div class="w3-row-padding">
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>আমার আপনার চেয়ে</b></p>
              <p>শিল্পীঃ অন্বেষা দাসগুপ্ত</p>
              <p>বিভাগঃ নজরুলগীতি</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="আমার আপনার চেয়ে আপন যে জন">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>সব লোকে কয় লালন</b></p>
              <p>শিল্পীঃ বিউটি</p>
              <p>বিভাগঃ লোকগীতি</p>
                  <form  action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="সব লোকে কয় লালন কী জাত">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>আইল আইল রে</b></p>
              <p>শিল্পীঃ ইশতিয়াক</p>
              <p>বিভাগঃ আধুনিক</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="আইল আইল রে">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
        </div>

        <!-- Third  Grid-->
        <div class="w3-row-padding">
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>ও আমার বাংলা মা তোর</b></p>
              <p>শিল্পীঃ ফাহমিদা নবী</p>
              <p>বিভাগঃ দেশাত্মবোধক গান</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="ও আমার বাংলা মা তোর">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>আজ তোমার মন খারাপ মেয়ে</b></p>
              <p>শিল্পীঃ আকিব আজমাঈন</p>
              <p>বিভাগঃ আধুনিক</p>
                  <form  action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="আজ তোমার মন খারাপ মেয়ে">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>ভালোবেসে সখী নিভৃতে যতনে</b></p>
              <p>শিল্পীঃ শান</p>
              <p>বিভাগঃ রবীন্দ্রসঙ্গীত</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="ভালোবেসে সখী নিভৃতে যতনে">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
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
		<script> 
	   	 	//window.alert("পাসওয়ার্ড পরিবর্তন করা হয়েছে।");
	   	 	//window.location = 'index.php';
		</script>
	
<?php
	}
	else {
		?>
		<script> 
	   	 	window.alert("পাসওয়ার্ড সঠিক নয়।");
	   	 	window.location = 'index.php';
		</script>
	
<?php
	}
}
 ?> 

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>   
   <p> পাসওয়ার্ড পরিবর্তন</p>
	<form action = "changePassword.php" method = "POST">	
 		আপনার বর্তমান পাসওয়ার্ডঃ<input type = "password" required name = "checkPassword"><br/>
 		<input type = "submit" class="w3-btn w3-round-xxlarge w3-black" name = "changePassword" value = "নিশ্চিত">
	</form>

</body>
</html>

<script type="text/javascript">

  function checkForm(form)
  {
    if(form.newPassword.value == form.newPassword2.value) {
        return true;
    } else {
      alert("পাসওয়ার্ড মিলে নি। ");
      form.newPassword.focus();
      return false;
    }
  }

</script>  