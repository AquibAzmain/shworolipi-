<?php
require_once 'dbconnect.php';
$db = Database::getInstance();
$mysqli = $db->getConnection(); 
mysqli_set_charset($mysqli,"utf8");
$email = $password = "";


    if (isset($_REQUEST['email'])){
        $email = stripslashes($_REQUEST['email']); // removes backslashes
        $email = mysqli_real_escape_string($mysqli,$email); //escapes special characters in a string


        $sql="SELECT * from member where email = '$email'";
        $res=$mysqli->query($sql);
        while($row=$res->fetch_assoc()){
              $password = $row["password"];
              $hash = $row["hash"];
        }
        $message = '
 
        আপনার পাসওয়ার্ড রিসেট করার লিংক: http://****************/shworolipi/passwordReset.php?email='.$email.'&hash='.$hash.'

        '; // Our message above including the link

            require_once '../PHPMailer/PHPMailerAutoload.php';
            
            $mail = new PHPMailer;                              
            $mail->isSMTP();                                     
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;                            
            $mail->Username = '****************';                 
            $mail->Password = '****************';                          
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;                                    
            
            $mail->setFrom('shworolipi1002@gmail.com', 'Shworolipi');
            $mail->addAddress($email);              
            $mail->addReplyTo('shworolipi1002@gmail.com', 'Shworolipi');
            $mail->isHTML(true);                                  
            
            $mail->Subject = "Shworolipi Password" ;
            $mail->Body    = $message;
            
            if(!$mail->send()) {
                echo 'ই-মেইল পাঠানো যায় নি।';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
            else {
                //echo 'ই-মেইল সফলভাবে গেছে।';
                ?><script>alert ("ই-মেইলে পাসওয়ার্ড রিসেট করার লিংক পাঠানো হয়েছে। ");
                window.location = 'index.php';  
                </script> <?php
            }
        }
  
?>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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


<div class="w3-container">
    <div id="id01" class="w3-modal" style="display:block">
        <div class="w3-modal-content w3-animate-zoom w3-card-8 " style="max-width:600px; background-image:url('images/regi.jpg'); background-size: 100% 100%;">
                  
            <div class="w3-center"><br>
                <span onclick="window.location.href='index.php'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">×</span>
                        
            </div>
            <form class="w3-container" action="" method="post" name="registration">
                <div class="w3-section">
                    <p align="center">পাসওয়ার্ড পুনরুদ্ধার</p>
                    <label><b>ই-মেইল</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="ই-মেইল দিন" name="email" required>
                    <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit" value = "forgotPassword">নিশ্চিত করুন</button>
                </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="window.location.href='index.php'" type="button" class="w3-button w3-red">বাতিল করুন</button>
            </div>

        </div>
    </div>
</div>