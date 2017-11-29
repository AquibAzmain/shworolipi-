<?php
include '../class/memberClass.php';
include '../class/NonMemberClass.php';
if (isset($_POST['contactSubmit'])){
  $SenderName = $_POST['SenderName'];
  $SenderEmail = $_POST['SenderEmail'];
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
      $mail->setFrom($SenderEmail, $SenderEmail);
      $mail->addAddress('shworolipi1002@gmail.com');              
      $mail->addReplyTo('shworolipi1002@gmail.com', 'Shworolipi');
      $mail->isHTML(true);                                    
      $mail->Subject = $SenderName ;
      $mail->Body    = $Message;
      if(!$mail->send()) {
        echo 'ই-মেইল পাঠানো যায় নি।';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;

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
<title>Shworolipi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/search.css">
<script src="jquery-3.2.0.min.js"></script>
<style>
body {
	font-family: "Lato", sans-serif;
}
.mySlides {display: none}
</style>

<body>
<?php
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){
	$email = stripslashes($_REQUEST['email']); // removes backslashes
	//$email = mysqli_real_escape_string($mysqli,$email); //escapes special characters in a string
	$password = stripslashes($_REQUEST['password']);
	//$password = mysqli_real_escape_string($mysqli,$password);
	$member = new member();
  $member->_setEmail($email);
  $member->_setPassword($password);
  $member->signIn();
}else{
?>
<div class="w3-container">
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px; background-image:url('images/regi.jpg'); background-size: 100% 100%;">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">×</span>
        
      </div>

      <form class="w3-container" action="" method="post" name="login">
        <div class="w3-section">
          <label><b>ই-মেইল</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="ই-মেইল দিন" name="email" required>
          <label><b>পাসওয়ার্ড</b></label>
          <input class="w3-input w3-border" type="password" placeholder="পাসওয়ার্ড দিন" name="password" required>
          <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit">নিশ্চিত করুন</button>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">বাতিল করুন</button>
        <span class="w3-right w3-padding w3-hide-small">ভুলে গেছেন? <a href="forgotPassword.php">পাসওয়ার্ড</a></span>
		  <p>নিবন্ধন করতে ক্লিক করুন <a class="w3-button w3-black" href='registration.php'> এখানে</a></p>
      </div>

    </div>
  </div>
</div>





<?php } ?>




<!-- Navbar -->
<div class="w3-top ">
  <div class="w3-bar w3-black w3-card-2">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-opennav w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large"> <i class="fa fa-home"></i> হোম</a>
    <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hide-small"> <i class="fa fa-book"></i> স্বরলিপি</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">  <i class="fa fa-envelope-o"></i> যোগাযোগ করুন</a>
     <a href="searchindex.php" id="search" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right"><i class="fa fa-search"></i> গান খুঁজুন</a>
	<button  onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right"> <i class="fa fa-sign-in"></i> প্রবেশ করুন</button>
  </div>
</div>



<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="#band" class="w3-bar-item w3-button w3-padding-large">স্বরলিপি</a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large">যোগাযোগ করুন</a>
</div>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
	<div class="w3-display-middle" style="white-space:nowrap;">
		<a href="searchindex.php" style = "text-decoration: none"><span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity">বাংলা গান শুনুন সহজেই</span></a>
	</div>
    <img src="images/1.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-black w3-padding-32 w3-hide-small">
      <h3></h3>
      <p><b></b></p>   
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
  <div class="w3-display-middle" style="white-space:nowrap;">
		<a href="searchindex.php" style = "text-decoration: none"><span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity">বাংলা গান শুনুন সহজেই</span></a>
	</div>
    <img src="images/3.jpg" style="width:100%">
	<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3></h3>
      <p><b></b></p>     
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
  <div class="w3-display-middle" style="white-space:nowrap;">
		<a href="searchindex.php" style = "text-decoration: none"><span class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity">বাংলা গান শুনুন সহজেই</span></a>
	</div>
    <img src="images/4.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3></h3>
      <!--<p><b>গ্রাম বাংলার গান গুলো আপনাকে নিয়ে যাবে শিকড়ে</b></p>-->    
    </div>
  </div>

  <!-- The about Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="about">
    <h2 class="w3-wide">স্বরলিপি</h2>
    <p class="w3-opacity"><i>বাংলা গানের সম্ভার</i></p>
    
    <?php
    $nonMember = new NonMember();
    $nonMember->getGuideline();
    ?>

  </div>
  

	
	<div id = "div_content3">
     
  </div>
		
		
  <!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">যোগাযোগ করুন</h2>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> ঢাকা, বাংলাদেশ<br>
        <i class="fa fa-envelope" style="width:30px"> </i> shworolipi1001@gmail.com<br>
		    <i class="fa fa-envelope" style="width:30px"> </i> shworolipi1002@gmail.com<br>
      </div>
      <div class="w3-col m6">
        <form action="" method="post">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
			<div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="নাম" required name="SenderName">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="ই-মেইল" required name="SenderEmail">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="মন্তব্য" required name="Message">
          <button  class="w3-button w3-black w3-section w3-right" name = "contactSubmit" type="submit">পাঠিয়ে দিন</button>
        </form>
      </div>
    </div>
  </div>
  

  
<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-center  w3-light-grey w3-small">
  <p class="w3-medium"><img src="images/logo.png" style="width:70px;height:50px"></p>
</footer>







<script>
$(document).ready(function(){
$('#search').click(function(){   

    $('#div_content3').load('../search2/searchindex.php');

 });
});

// Automatic Slideshow - change image every 5 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}


/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}

</script>

</body>
</html>
