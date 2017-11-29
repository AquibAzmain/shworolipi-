<?php
include 'auth.php';
include '../class/memberClass.php';
$email = $_SESSION['email'];

//getCurrentInfo
$member = new Member();
$member->_setEmail($email);
$member->getCurrentInfo();
$oldName = $member->getName();
$oldDate_of_birth = $member->getDateOfBirth();
$oldPhone_number = $member->getPhoneNumber();
$oldGender = $member->getGender();

//editInfo
if(isset($_POST['updateAccount'])){
	$newName = $_POST["name"];
	$newDate_of_birth = $_POST["date_of_birth"];
  $newPhone_number = $_POST["phone_number"];
  $newGender = $_POST["gender"];

  $member1 = new Member();
  $member1->_setEmail($email);
  $member1->_setName($newName);
	$member1->_setDateOfBirth($newDate_of_birth);
  $member1->_setPhoneNumber($newPhone_number);
  $member1->_setGender($newGender);
  $member1->editPersonalAccount();
}
?>
<!DOCTYPE html>
<html>
<title>অ্যাকাউন্ট</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<body>

<form action= "account.php" method = "POST"  class="w3-container w3-card-4 w3-light-grey w3-text-black w3-margin">


<h2 class="w3-center">অ্যাকাউন্ট</h2>
<p class="w3-center"><?php echo $email;?>
 

<div class="w3-row w3-section">
  <div class="w3-col" style="width:80px"><p>নামঃ</p></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="name" type="text" placeholder="নাম লিখুন" value="<?php echo $oldName;?>">
    </div>
</div>


<div class="w3-row w3-section">
  <div class="w3-col" style="width:80px"><p>জন্মতারিখঃ</p></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name = "date_of_birth" type = "date" max="2017-01-01" placeholder="(০১ জানুয়ারি)" value="<?php echo $oldDate_of_birth;?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:80px"><p>লিঙ্গঃ</p></div>
    <div class="w3-rest">
     	<select class="w3-input w3-border" name="gender">
      <?php if($oldGender=="পুরুষ" || $oldGender==""){ ?>
	  		<option value="পুরুষ">পুরুষ</option>
	  		<option value="নারী">নারী</option>
      <?php }else{?>
        <option value="নারী">নারী</option>
        <option value="পুরুষ">পুরুষ</option>
      <?php } ?>  
		</select>
    </div>
</div>



<div class="w3-row w3-section">
  <div class="w3-col" style="width:80px"><p>ফোনঃ</p></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="phone_number" type="text" placeholder="ফোন /মোবাইল" value="<?php echo $oldPhone_number;?>">
    </div>
</div>


<p class="w3-center">
<input type="submit" class="w3-button w3-section w3-black w3-ripple" name = "updateAccount" value = "তথ্য পরিবর্তন নিশ্চিত করুন"/>
</p>
</form>


 </body>
</html> 