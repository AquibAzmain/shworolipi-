<?php
include 'db.php';
$email = $_SESSION['email_address'];
$admin = new Admin();
$admin_id = $admin->getAdminId($email); 

$nameErr = $artistErr  = $lyricsErr = $fileErr =  $moodErr = "";
$name = $genre = $lyrics = $artist = $mood = $moods = $song_id = "";
   	if(isset($_POST['upload'])){
      $errors= array();
      $status = 1;
      $file_name = $_FILES['audio']['name'];
      $file_size =$_FILES['audio']['size'];
      $file_tmp =$_FILES['audio']['tmp_name'];
      $file_type=$_FILES['audio']['type'];
      $arr = explode(".", $_FILES['audio']['name']);
      $file_ext=strtolower(end($arr));
    
      $expensions= array("mp3");
      
        

        if (empty($_FILES['audio']['name'])) {
            $fileErr =  "গানের ফাইলটি নির্বাচন করুন। ";
            $status = 0;
        }
        else {
            if(in_array($file_ext,$expensions)=== false){
            $fileErr =  "শুধুমাত্র mp3 ফাইল গ্রহণযোগ্য।";
            $status = 0;
        }
          // Check if file already exists
            if (file_exists("uploads/".$file_name)) {
                $fileErr = "দুঃখিত। একই ফাইল গ্রহণযোগ্য নয়।";
                $status = 0;
            }
        } 
    


      if (empty($_POST["name"])) {
        $nameErr = "গানের নামটি লিখুন";
        $status = 0;
      } else {
        $name = $_POST["name"];
      }

      if (empty($_POST["artist"])) {
        $artistErr = "শিল্পীর নামটি লিখুন";
        $status = 0;
      } else {
        $artist = $_POST["artist"];
      }

      $genre=$_POST["genre"];

      if (empty($_POST["lyrics"])) {
        $lyricsErr = "গানের কথা লিখুন";
      } else {
        $lyrics = $_POST["lyrics"];
      }


        //$mood = $_POST['mood'];
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
        move_uploaded_file($file_tmp,"uploads/".$file_name);


        $admin->upload_song($file_name,$name,$artist,$genre,$lyrics,$moods,$admin_id);


        $sqlSongID = "SELECT * FROM song WHERE title_English = '$file_name'";
        $result = mysqli_query($mysqli,$sqlSongID) or die(mysql_error());
        if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
            $song_id = $row["song_id"];
          }
        }


        $sqlMood = "INSERT INTO mood (song_id,mood_name) VALUES ";
        for($i=0; $i < $N; $i++)
        {
          $sqlMood .= "('" .$song_id. "',"."'". $mood[$i] . "')," ;
        }
        $sqlMood = rtrim($sqlMood,',');
        $mysqli->query($sqlMood);
           
 ?>        

       <script> 
	   	 window.alert("গানটি সফলভাবে আপলোড হয়েছে");
	   	 window.location = 'index.php';
	   </script>

<?php		
      }else{
         //echo "গানটি আপলোড হয় নি।";

?>        
       <script> 
	   	 window.alert("গানটি আপলোড হয় নি।");
	   </script>

<?php
      }

   }
   
    
?>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  

    </head>
   <body>
     <div class="container" style = "width :80%"> 
      <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
         <div class="form-group">
            <label class="control-label col-sm-2" for="">গানের নামঃ</label>
            <div class="col-sm-10">   
                <input type="text" name="name" class="form-control" placeholder="বাংলায় লিখুন" value="<?php echo $name;?>">
                <span class="error"><?php echo $nameErr;?></span>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">ফাইলঃ</label>
            <div class="col-sm-10">    
                <input type="file" name="audio" class="filestyle" data-buttonText="গানের ফাইলটি নির্বাচন করুন" data-buttonName="btn-primary">
                <span class="error"><?php echo $fileErr;?></span>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">গেয়েছেনঃ</label>
            <div class="col-sm-10">    
                <input type="text" name="artist" class="form-control" placeholder="বাংলায় লিখুন" value="<?php echo $artist;?>">
                <span class="error"><?php echo $artistErr;?></span>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">বিভাগঃ</label>
            <div class="col-sm-10">    
                  <select class="form-control" name = "genre">
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
            </div>
          </div> 

            <div class="form-group">
                <label class="control-label col-sm-2" for="">গানের কথাঃ</label>
                <div class="col-sm-10">   
                    <textarea name="lyrics" placeholder="বাংলায় লিখুন" class="form-control" rows="5" cols="40"><?php echo $lyrics;?></textarea>
                    <span class="error"><?php echo $lyricsErr;?></span>
                </div>
            </div>       
               
          <input type="submit" name = "upload" value = "নিশ্চিত করুন"/>
      </form> 

     </div>
   </body>
 
</html>