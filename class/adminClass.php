<?php
require_once 'userClass.php';
class Admin extends User{
	private $admin_id;
	private $name;
	private $email;
	private $password;

    
    public function signIn($email,$password){
        include 'dbConnect.php';
        $query = "SELECT * FROM admin WHERE email_address='$email' and password='$password'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['email_address'] = $email;
            header("Location: index.php"); // Redirect user to index.php
        }else{
            echo "<div class='form'><h3>ই-মেইল/পাসওয়ার্ড সঠিক নয়।</h3><br/>প্রবেশ করতে করতে <a href='login.php'>লগইন</a></div>";
        }
    }

    public function signOut(){
        session_start();
        if(session_destroy()) // Destroying All Sessions
        {
             header("Location: ../shworolipiAdmin/index.php"); // Redirecting To Home Page
        }
    }

	public function upload_song($file_name,$name,$artist,$genre,$lyrics,$moods,$admin_id){
        include 'dbConnect.php';
	    $sql = "INSERT INTO song (title_English,title_Bengali,artist,genre,lyric,mood,admin_id) VALUES ('$file_name','$name','$artist','$genre','$lyrics','$moods','$admin_id') ";
        $mysqli->query($sql);
	}

	public function delete_song($deleteSong,$deleteFileName,$d_song_ID,$d_title_Bengali,$d_artist,$d_genre,$d_popularity,$d_mood,$d_admin_ID){
        include 'dbConnect.php';
        $query = "SELECT * FROM song WHERE title_Bengali = '$deleteSong'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $deleteFileName = "uploads/".$row["title_English"];
                $d_song_ID = $row["song_id"];
                $d_title_Bengali = $row["title_Bengali"];
                $d_artist = $row["artist"];
                $d_genre = $row["genre"];
                $d_popularity = $row["popularity"];
                $d_mood =  $row["mood"];
                //echo "$deleteFileName";

                //delete the file
                if(file_exists($deleteFileName)){

                    if (!unlink($deleteFileName)) {
                        ?>        
                        <script> 
                            window.alert("গানটি মুছা যায় নি।");
                            window.location = 'index.php';
                        </script>
                        <?php
                        //echo ("গানটি মুছা যায় নি।");
                    }
                    else
                    {
                        //insert into delete table
                        $query2 = "INSERT INTO deleteS (song_id,admin_id,title_Bengali,artist,genre,popularity,mood) 
                                    VALUES ('$d_song_ID','$d_admin_ID','$d_title_Bengali','$d_artist','$d_genre','$d_popularity', '$d_mood') ";
                        $result2 = mysqli_query($mysqli,$query2) or die(mysql_error());

                        //delete from song table
                        $query3 = "UPDATE song set title_English = '', title_Bengali = '(গানটি ডাটাবেজ থেকে মুছে দেয়া হয়েছে।)',artist = '' ,genre = '', lyric ='' , mood = '',admin_id = '', popularity = 0 WHERE title_Bengali = '$deleteSong'";
                        $result3 = mysqli_query($mysqli,$query3) or die(mysql_error());


                        $query4 = "DELETE FROM mood WHERE song_id='$d_song_ID'";
                        $result4 = mysqli_query($mysqli,$query4) or die(mysql_error());
                        ?>        
                        <script> 
                            window.alert("গানটি মুছে দেয়া হয়েছে।");
                            window.location = 'index.php';
                        </script>
                        <?php
                    }
                }
                else {
                    ?>        
                    <script> 
                        window.alert("ফাইল খুঁজে পাওয়া যায় নি।");
                        window.location = 'index.php';
                    </script>
                    <?php
                }
            }   
        }
	}

	public function update_song_info($name,$artist,$genre,$lyrics,$moods,$admin_id,$c_song_id){
        include 'dbConnect.php';
        $sqlUpdate = "UPDATE song SET title_Bengali = '$name',artist = '$artist',genre = '$genre',lyric = '$lyrics', mood = '$moods',admin_id = '$admin_id' WHERE song_id = '$c_song_id'";
        $result = mysqli_query($mysqli,$sqlUpdate) or die(mysql_error());
	}


    public function getAccountInfo($email){
        include 'dbConnect.php';
        $query = "SELECT name,password FROM admin WHERE email_address= '$email'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $password = $row["password"];
            }
        }
        $this->_setName($name);
        $this->_setPassword($password);
    }

    public function manageAccount($newName,$newPassword,$email){
        include 'dbConnect.php';
        $query = "UPDATE admin set name = '$newName', password = '$newPassword' WHERE email_address= '$email'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
    }

    public function getGuideline(){
        ?>
        <p align="justify"><strong>
         স্বরলিপির অ্যাডমিন সেকশন নির্ভুলভাবে চালাতে আপনাকে অনেক সতর্কতা অবলম্বন করতে হবে।<br/><br/>
        গান শুনতে গান খুঁজুন অপশনটি ব্যবহার করুন। আপনি আপনার নাম এবং পাসওয়ার্ডের তথ্য পরিবর্তন করতে পারবেন। পাসওয়ার্ড ভুলে যাবেন না।<br/><br/>
        নতুন গান সংযোগ করতে প্রথমে গানের নাম বাংলায় শুদ্ধভাবে লিখুন। তারপর তার এমপিথ্রি ফাইলটি যত্নসহকারে নির্বাচন করুন। তারপর একে একে শিল্পী, বিভাগ, গানের মুড বা ধরন এবং সবশেষে গানের কথা লিখুন। সবশেষে নিশ্চিত হতে ডাটাবেস পর্যবেক্ষণ করুন।<br/><br/>
        গান বাতিল করতে গানের নাম লিখে গানটি খুঁজে গানটিকে মুছে দিন।<br/><br/>
        গানের কোন তথ্য ভুল হলে বা পরিবর্তন করতে চাইলে, প্রথমে গানটিকে নির্বাচন করুন। তারপর যেই বিষয়টি পরিবর্তন করতে হবে সেটি পরিবর্তন করে নিশ্চিত করুন।</br><br/>
        কোন মেম্বারের সদস্যপদ বাতিল করতে চাইলে সদস্যের ই-মেইল আইডি এবং সদস্যপদ বাতিলের কারণ লিখে নিশ্চিত করুন।<br/><br/>
        কোন সদস্য ই-মেইলের মাধ্যমে কোন সমস্যার কথা জানিয়েছে কিনা জানতে নিয়মিত ই-মেইল চেক করুন।<br/>
        ধন্যবাদ।<br/><br/></strong>
        </p>
        <?php
    }

    public function removeUser($deleteMember,$d_member_ID,$d_email_address,$d_reason,$d_admin_ID){
        include 'dbConnect.php';
        //insert into remove table
        $query2 = "INSERT INTO remove (admin_id,member_id,email_address,reason) 
                    VALUES ('$d_admin_ID','$d_member_ID','$d_email_address','$d_reason') ";
        $result2 = mysqli_query($mysqli,$query2) or die(mysql_error());

        //delete from member table
        $query3 = "DELETE FROM member WHERE email = '$deleteMember'";
        $result3 = mysqli_query($mysqli,$query3) or die(mysql_error());

    }
	

    public function getAdminId($email){   
        include 'dbConnect.php';
        $query = "SELECT admin_id FROM admin WHERE email_address= '$email'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $admin_id =  $row["admin_id"];
            }
            return $admin_id; 
        }
        
    }

    public function _setAdminId($admin_id)
    {
        $this->admin_id = $admin_id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function _setPassword($password)
    {
        $this->password = $password;

        return $this;
    }	
}
?>
