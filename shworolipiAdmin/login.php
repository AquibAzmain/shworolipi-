<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Shworolipi Admin</title>
<link rel="stylesheet" href="css/adminLogin.css" />
</head>
<body>
<?php
	include '../class/adminClass.php';
	require('db.php');

	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
		
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($mysqli,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($mysqli,$password);
		
	//Checking is user existing in the database or not
       	$admin = new Admin();
       	$admin->signIn($email,$password);
    }else{
?>
<img align = "center" src="images/shwLogo.png" alt="icon" style = "display: block;  margin: 0 auto;">
<h2 align = "center">অ্যাডমিন প্যানেল</h2>
		<div align="center">
		<form name="user" method="post" action="" >
			<table>
				<tr><td>ই-মেইলঃ </td><td><input type = "text" name = "email" required></td></tr>
				<tr><td>পাসওয়ার্ডঃ </td><td><input type = "password" name = "password" required></td></tr>
			</table>
			<input type = "submit" name = "login" value = "প্রবেশ করুন">
		</form>
		</div>

<?php } ?>


</body>
</html>
