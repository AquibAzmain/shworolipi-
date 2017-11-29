<?php
include '../class/NonMemberClass.php';
include 'db.php';

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysqli_real_escape_string($mysqli,$_GET['email']); // Set email variable
    $hash = mysqli_real_escape_string($mysqli,$_GET['hash']); // Set hash variable

   $nonMember = new NonMember();
   $nonMember -> getConfirmation($email,$hash);
}
else{
    // Invalid approach
    echo 'Invalid approach, please use the link that has been send to your email.';
}
?>