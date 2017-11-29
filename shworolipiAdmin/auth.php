
<?php
session_start();
if(!isset($_SESSION["email_address"])){
header("Location: login.php");
exit(); }
?>
