<?php
include 'db.php';
$email = $_SESSION['email_address'];
$admin = new Admin();
$d_admin_ID = $admin->getAdminId($email);

$deleteMember = "";
$d_member_ID  = $d_email_address = $d_reason = ""; 

 
if(isset($_POST['deleteMemberSubmit'])){
	$deleteMember = $_POST["deleteMember"];
	$d_reason = $_POST["reason"];
	$query = "SELECT * FROM member WHERE email = '$deleteMember'";
	$result = mysqli_query($mysqli,$query) or die(mysql_error());




	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
        	$d_member_ID = $row["member_id"];
        	$d_email_address = $row["email"];
	
          $admin->removeUser($deleteMember,$d_member_ID,$d_email_address,$d_reason,$d_admin_ID);
           ?>        
          <script> 
      	   	window.alert("সদস্যপদ বাতিল করা হয়েছে।");
      	   	window.location = 'index.php';
      	 </script>
          <?php
    	}

      require_once '../PHPMailer/PHPMailerAutoload.php';  
      $mail = new PHPMailer;                            
      $mail->isSMTP();                                     
      $mail->Host = 'smtp.gmail.com';  
      $mail->SMTPAuth = true;                            
      $mail->Username = 'shworolipi1002@gmail.com';                 
      $mail->Password = 'skylark1234';                          
      $mail->SMTPSecure = 'tls';                            
      $mail->Port = 587;                                      
      $mail->setFrom('shworolipi1002@gmail.com', 'Shworolipi User Deleted');
      $mail->addAddress($d_email_address);              
      $mail->addReplyTo('shworolipi1002@gmail.com', 'Shworolipi');
      $mail->isHTML(true);                                    
      $mail->Subject = "Shworolipi" ;
      $mail->Body    = $d_reason;
      if(!$mail->send()) {
        ?>        
          <script> 
            window.alert("মেইল পাঠানো যায় নি।");
            window.location = 'index.php';
        </script>
      <?php

      }  	
	}
	else {
?>        
    <script> 
	   	window.alert("ইমেইলটি খুঁজে পাওয়া যায় নি।");
	   	window.location = 'index.php';
	</script>

<?php
	}
}  
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/search.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    
	    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script>
		  $(function() {
		    $( "#member" ).autocomplete({
		      source: 'searchMember.php'
		    });
		  });
		</script> 

	 
    </head>
   <body>
     <div class="container" style = "width :80%"> 
      <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
         <div class="form-group">
            <label class="control-label col-sm-2" for="">সদস্যের ইমেইল আইডিঃ</label>
            <div class="col-sm-10">   
                <input type="text" required id="member" name="deleteMember" class="form-control">
            </div>
          </div>

           <div class="form-group">
                <label class="control-label col-sm-2" for="">সদস্যপদ বাতিলের কারণঃ</label>
                <div class="col-sm-10">   
                    <textarea name="reason" required placeholder="" class="form-control" rows="5" cols="40"></textarea>
                </div>
            </div>  
          <input type="submit" name = "deleteMemberSubmit" value = "সদস্যপদ বাতিল করুন"/>

      </form> 

     </div>
   </body>

</html>