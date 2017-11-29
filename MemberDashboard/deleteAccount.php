<?php
include 'auth.php';
include '../class/memberClass.php';
$email = $_SESSION['email'];

//confirmPassword
$member = new Member();
$member->_setEmail($email);
$member->confirmPassword();
$password = $member->getPassword();

//deleteAccount
if(isset($_POST['deleteAccount'])){
	$checkPassword = $_POST["checkPassword"];
	$checkPassword = md5($checkPassword);
	if($checkPassword == $password){
		$member1 = new Member();
		$member1->_setEmail($email);
		$member1->deletePersonalAccount();
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
<body>   
   <p> আপনি কি অ্যাকাউন্ট মুছে ফেলতে চাইছেন?</p>
	<form action = "deleteAccount.php" method = "POST">	
 		আপনার পাসওয়ার্ড দিয়ে নিশ্চিত করুনঃ<input type = "password" required name = "checkPassword"><br/>
 		<input type = "submit" class="w3-btn w3-round-xxlarge w3-black" name = "deleteAccount" value = "নিশ্চিত">
	</form>

</body>
</html>