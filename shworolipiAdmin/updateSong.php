<?php
include 'db.php';
$email = $_SESSION['email_address'];
$admin = new Admin();
$admin_id = $admin->getAdminId($email); 

$nameErr = $artistErr  = $lyricsErr = $fileErr =  $moodErr = "";
$name = $genre = $lyrics = $artist = $mood = $moods = $c_song_id = $fileName = "";
$oldname = $oldartist = $oldlyrics = $oldfile = $oldmoods = $oldgenre = "";
$changeSong = "";
  
 

   	if(isset($_POST['updateSongSelect'])){
   		$changeSong = $_POST["updateSong"];
   		//echo "$changeSong";

   	$query2 = "SELECT * FROM song WHERE title_Bengali = '$changeSong'";
		$result2 = mysqli_query($mysqli,$query2) or die(mysql_error());
		if ($result2->num_rows > 0) {
		    // output data of each row
		    while($row = $result2->fetch_assoc()) {
		        $c_song_id = $row["song_id"];
		        $oldname =  $row["title_Bengali"];
		        $oldartist = $row["artist"]; 
		        $oldlyrics = $row["lyric"]; 
		        $oldmoods = $row["mood"];
		        $oldgenre = $row["genre"];
		        //$admin_id =  $row["admin_id"];
		       
		    }
		}

		else {
			echo "গান খুঁজে পাওয়া যায় নি।";
		}

	}	

	if(isset($_POST['updateSongSubmit'])){	

   	  $errors= array();
      $status = 1;
     
     $c_song_id = $_POST['id'];

      if (empty($_POST["name"])) {
        $nameErr = "গানের নামটি লিখুন";
        $status = 0;
      } else {
        $name = test_input2($_POST["name"]);
      }

      if (empty($_POST["artist"])) {
        $artistErr = "শিল্পীর নামটি লিখুন";
        $status = 0;
      } else {
        $artist = test_input2($_POST["artist"]);
      }

      $genre=$_POST["genre"];

      if (empty($_POST["lyrics"])) {
        $lyricsErr = "গানের কথা লিখুন";
      } else {
        $lyrics = test_input2($_POST["lyrics"]);
      }

        if(empty($_POST["mood"])) 
        {
            //$status = 0;
            $moodErr = "</br>ধরন নির্ধারণ করুন";
        } 
        else 
        {
            $mood = $_POST["mood"];
            $N = count($mood);
            $moods = "";
            for($i=0; $i < $N; $i++)
            {
                $moods .= $mood[$i] . ",";
            }
        }


    if($status == 1){       


    $admin->update_song_info($name,$artist,$genre,$lyrics,$moods,$admin_id,$c_song_id);

		

		$query4 = "DELETE FROM mood WHERE song_id='$c_song_id'";
		$result4 = mysqli_query($mysqli,$query4) or die(mysql_error());

		$sqlMood = "INSERT INTO mood (song_id,mood_name) VALUES ";
    for($i=0; $i < $N; $i++)
    {
      $sqlMood .= "('" .$c_song_id. "',"."'". $mood[$i] . "')," ;
    }
    $sqlMood = rtrim($sqlMood,',');
    $mysqli->query($sqlMood);


           
 ?>        

       <script> 
	   	 window.alert("গানটির তথ্য সফলভাবে পরিবর্তন হয়েছে");
	   	 window.location = 'index.php';
	   </script>

<?php		
      }else{
?>        
       <script> 
	   	 window.alert("গানটির তথ্য পরিবর্তন হয়নি।");
	   </script>

<?php
      }

   }
    function test_input2($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
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
		    $( "#songs1" ).autocomplete({
		      source: 'search.php'
		    });
		  });
		</script> 

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
</head>
   <body>
     <div class="container" style = "width :80%"> 
      <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
         <div class="form-group">
            <label class="control-label col-sm-2" for="">গানের নামঃ</label>
            <div class="col-sm-10">   
                <input type="text" id="songs1" name="updateSong" class="form-control"  placeholder="বাংলায় লিখুন">
            </div>
          </div>
          <input id = "show" type="submit" name = "updateSongSelect" value = "তথ্য পরিবর্তনের জন্য গানটি নির্ধারণ করুন"/>

      </form> 

     </div><br/>



	<div  class="container" style = "width :80%"> 
      <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
         <div class="form-group">
            <label class="control-label col-sm-2" for="">গানের নামঃ</label>
            <div class="col-sm-10">   
                <input type="text" name="name" class="form-control" placeholder="বাংলায় লিখুন" value="<?php echo $oldname;?>">
                <span class="error"><?php echo $nameErr;?></span>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">গেয়েছেনঃ</label>
            <div class="col-sm-10">    
                <input type="text" name="artist" class="form-control" placeholder="বাংলায় লিখুন" value="<?php echo $oldartist;?>">
                <span class="error"><?php echo $artistErr;?></span>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">বিভাগঃ</label>
            <div class="col-sm-10">    
                  <select class="form-control" name = "genre" >
                    <option value = "<?php echo $oldgenre;?>"><?php echo $oldgenre;?></option>
                    <option value = "দেশাত্মবোধক গান">দেশাত্মবোধক গান</option>
                    <option value = "রবীন্দ্রসঙ্গীত">রবীন্দ্রসঙ্গীত</option>
                    <option value = "নজরুলগীতি">নজরুলগীতি</option>
                    <option value = "লোকগীতি">লোকগীতি</option>
                    <option value = "আধুনিক">আধুনিক</option>
                  </select>
            </div>
          </div>

           <div class="form-group">
            <label class="control-label col-sm-2">মুড/ধরনঃ</label>
            <div class="col-sm-10">    
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="প্রেম">প্রেম</label>
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="বিরহ">বিরহ</label>
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="উৎসব">উৎসব</label>
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="আনন্দ">আনন্দ</label>
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="ভক্তি">ভক্তি</label>
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="বৃষ্টি">বৃষ্টি</label>
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="রজনী">রজনী</label>
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="সকাল">সকাল</label>
                <label class="checkbox-inline"><input type="checkbox" name="mood[]" value="বিয়ে">বিয়ে</label>
                <span class="error"><?php echo $moodErr;?></span>
                <span class="error"></br>গানটির ধরন ছিলঃ <?php echo $oldmoods;?></span>
            </div>
          </div> 

            <div class="form-group">
                <label class="control-label col-sm-2" for="">গানের কথাঃ</label>
                <div class="col-sm-10">   
                    <textarea name="lyrics" placeholder="বাংলায় লিখুন" class="form-control" rows="3" cols="40"><?php echo $oldlyrics;?></textarea>
                    <span class="error"><?php echo $lyricsErr;?></span>
                </div>
            </div>       
             <input type "hidden" style = "visibility: hidden;" name="id" value="<?php echo $c_song_id;?>">  
          <input type="submit" name = "updateSongSubmit" value = "নিশ্চিত করুন"/>

      </form> 

     </div>

   </body>
<script type="text/javascript" src="bootstrap-filestyle.min.js"> </script>   
</html>