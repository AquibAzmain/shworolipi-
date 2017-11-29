<?php
include 'db.php';
$email = $_SESSION['email_address'];
$admin = new Admin();
$d_admin_ID = $admin->getAdminId($email); 

$deleteSong = $deleteFileName = "";
$d_song_ID  = $d_title_Bengali = $d_artist = $d_genre = $d_popularity = $d_mood = ""; 
  

if(isset($_POST['deleteSongSubmit'])){
	$deleteSong = $_POST["deleteSong"];
	$admin->delete_song($deleteSong,$deleteFileName,$d_song_ID,$d_title_Bengali,$d_artist,$d_genre,$d_popularity,$d_mood,$d_admin_ID);


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
		    $( "#songs" ).autocomplete({
		      source: 'search.php'
		    });
		  });
		</script> 

    </head>
   <body>
     <div class="container" style = "width :80%"> 
      <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
         <div class="form-group">
            <label class="control-label col-sm-2" for="">গানের নামঃ</label>
            <div class="col-sm-10">   
                <input type="text" id="songs" name="deleteSong" class="form-control"  placeholder="বাংলায় লিখুন">
            </div>
          </div>
          <input type="submit" name = "deleteSongSubmit" value = "গানটি মুছে দিন"/>

      </form> 

     </div>
   </body>

</html>