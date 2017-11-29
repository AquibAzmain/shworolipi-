<?php
include("auth.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Shworolipi</title>
<style type="text/css" media="screen">
  body {
    font-family: "Lato", sans-serif;
    background-image: url("images/background.jpg");
    background-repeat: no-repeat;
    background-size: 120%;
  }
</style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/adminHome.css">
  <script type="text/javascript" src="bootstrap-filestyle.min.js"> </script> 
<style type="text/css" media="screen">
  input[type=submit] {
    width: 50%;
    height: 40px;
    margin:auto; 
    display:block;
    background-color: black;
    color: white;
    border: none;
    cursor: pointer;
  }    
</style>
</head>
<body>
 <!-- Navbar -->
<div class="w3-top" style="z-index:3;">
 <div class="w3-bar w3-black w3-theme-d2 w3-left-align w3-large">
  <a style = "text-decoration: none;"class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a style = "text-decoration: none;" href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> স্বরলিপি</a>
  <a href="searchindex.php" style = "text-decoration: none;"  style = "text-decoration: none;" class="w3-bar-item w3-button w3-hide-small" title="Search"><i class="fa fa-search"></i>গান খুঁজুন</a>
  <a style = "text-decoration: none;" href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right"><span class="glyphicon glyphicon-log-out"></span> লগ আউট</a>
 </div>
</div>

<div class="tab" style = "padding-top: 1cm; height: 800px">
  <button class="tablinks" onclick="openCity(event, 'হোম')">
    <div class="chip">
      <img src="images/admin.png" alt="Person" width="96" height="96">
      <?php echo $_SESSION['email_address']; ?>
    </div>  </button>
  <button class="tablinks" onclick="openCity(event, 'অ্যাকাউন্ট এর তথ্য পরিবর্তন')" >অ্যাকাউন্ট এর তথ্য পরিবর্তন</button>
  <button class="tablinks" onclick="openCity(event, 'গান সংযোগ')">গান সংযোগ</button>
  <button class="tablinks" onclick="openCity(event, 'গান বাতিল')">গান বাতিল</button>
  <button class="tablinks" onclick="openCity(event, 'গানের তথ্য পরিবর্তন')" id="defaultOpen">গানের তথ্য পরিবর্তন</button>
  <button class="tablinks" onclick="openCity(event, 'সদস্যপদ বাতিল')">সদস্যপদ বাতিল</button>
  <button class="tablinks" class="tablinks"onclick="openCity(event, 'নির্দেশনা')">নির্দেশনা</button>
</div>

<div style = "padding-top: 2cm;" id="হোম" class="tabcontent">

</div>

<div style = "padding-top: 2cm;" id="অ্যাকাউন্ট এর তথ্য পরিবর্তন" class="tabcontent">
<?php
include 'updateAccount.php';
?>
</div>

<div style = "padding-top: 2cm;" id="গান সংযোগ" class="tabcontent">
<?php
include 'uploadDB.php';
?>
</div>

<div style = "padding-top: 2cm;" id="গান বাতিল" class="tabcontent">
<?php
include 'deleteSong.php';
?>
</div>

<div style = "padding-top: 2cm;" id="গানের তথ্য পরিবর্তন" class="tabcontent">
<?php
include 'updateSong.php';
?>
</div>

<div style = "padding-top: 2cm;" id="সদস্যপদ বাতিল" class="tabcontent">
<?php
include 'deleteMember.php';
?>
</div>

<div style = "padding-top: 2cm;" id="নির্দেশনা" class="tabcontent">
<?php
include 'guideline.php';
?>
</div>
     
</body>
<script src="js/adminHome.js"></script>
</html> 
