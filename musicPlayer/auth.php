<?php
session_start();
if(!isset($_SESSION["email"])){
header("Location: ../shworolipi/index.php");
exit(); }
?>