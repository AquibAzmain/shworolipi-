<?php
include_once '../class/adminClass.php';
$email = $_SESSION['email_address'];
 
$admin = new Admin();
$admin->getAccountInfo($email);
$name = $admin->getName();
$password = $admin->getPassword();

if(isset($_POST['updateAccount'])){
	$name = $_POST["newName"];
	$password = $_POST["newPassword"];
	$admin->manageAccount($name,$password,$email);
}  

?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css" media="screen">
          input[type=submit] {
          width: 50%;
          margin:auto; 
          display:block;
          background-color: black;
          color: white;
          border: none;
          cursor: pointer;
      }    
      </style>
   
     <div class="container" style = "width :50%"> 
      <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
         <div class="form-group">
            <label class="control-label col-sm-2" for="">নামঃ</label>
            <div class="col-sm-10">   
                <input type="text" name="newName" class="form-control" value="<?php echo $name;?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">পাসওয়ার্ডঃ</label>
            <div class="col-sm-10">   
                <input type="password" name="newPassword" class="form-control" value="<?php echo $password;?>">
            </div>
          </div>  
          <input type="submit" name = "updateAccount" value = "তথ্য পরিবর্তন নিশ্চিত করুন"/>
      </form> 
     </div>
   </body>

</html>