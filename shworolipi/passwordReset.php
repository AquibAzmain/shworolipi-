<?php
require_once 'dbconnect.php';
$db = Database::getInstance();
$mysqli = $db->getConnection(); 
mysqli_set_charset($mysqli,"utf8");
$email = $hash = $active = "";



if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysqli_real_escape_string($mysqli,$_GET['email']); // Set email variable
    $hash = mysqli_real_escape_string($mysqli,$_GET['hash']); // Set hash variable

    $query = "SELECT email, hash, active FROM member WHERE email='".$email."' AND hash='".$hash."' AND active='1'";
    $result = mysqli_query($mysqli,$query);
    if ($result->num_rows > 0) {
    // output data of each row
        if (isset($_POST['resetPassword'])){
            $newPassword = $_POST['newPassword'];
            $query2 = "UPDATE member SET password='".md5($newPassword)."' WHERE email='".$email."' AND hash='".$hash."' AND active='1'";
            $result2 = mysqli_query($mysqli,$query2);
            //$_SESSION['email'] = $email;
            ?><script>alert ("পাসওয়ার্ড পরিবর্তিত হয়েছে। এখন আপনি সঠিক ই-মেইল ও পাসওয়ার্ড দিয়ে প্রবেশ করতে পারবেন।");
            window.location = 'index.php';  
            </script> <?php
        }
    }
    else{
        // No match -> invalid url or account has already been activated.
        echo 'লিংকটি সঠিক নয়।';
    }
}
else{
    // Invalid approach
    echo 'দুঃখিত। লিংকটি সঠিক নয় অথবা আপনি স্বরলিপিতে নিবন্ধন করেন নি।';
}


?>
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

       <div class="w3-container">
            <div id="id01" class="w3-modal" style="display:block">
                <div class="w3-modal-content w3-animate-zoom w3-card-8 " style="max-width:600px; background-image:url('images/regi.jpg'); background-size: 100% 100%;">
                          
                    <div class="w3-center"><br>
                        <span onclick="window.location.href='index.php'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">×</span>
                                
                    </div>
                    <form class="w3-container" action="" method="post" name="registration" onsubmit="return checkForm(this);">
                        <div class="w3-section">
                            <p align="center">পাসওয়ার্ড পুনরুদ্ধার</p>
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