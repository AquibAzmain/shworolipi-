<?php
require_once 'userClass.php';

class Member extends User {
	private $member_id;
	private $name;
	private $email;
	private $password;
	private $dateOfBirth;
	private $gender;
	private $phoneNumber;
    private $active;
    private $newPlaylistName;


    public function signIn(){
        include 'dbConnect.php';
        //Checking is user existing in the database or not
        $query = "SELECT * FROM `member` WHERE email='$this->email' and password='".md5($this->password)."' AND active='1'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['email'] = $this->email;
            header("Location: ../MemberDashboard/index.php"); // Redirect user to index.php
            }else{ ?>
                <div class="w3-container" >
                    <div id="id01" class="w3-modal" style="display:block">
                    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px; background-image:url('images/regi.jpg'); background-size: 100% 100%;">
                  
                      <div class="w3-center"><br>
                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">×</span>
                        
                      </div>
                      <form class="w3-container" action="" method="post" name="login">
                        <div class="w3-section">
                          <p style = "color: red">আপনার দেয়া ইমেইল অথবা পাসওয়ার্ডটি সঠিক নয় অথবা আপনার অ্যাকাউন্ট সচল হয় নি। আবার চেষ্টা করুন। ধন্যবাদ।</p>
                          <label><b>ই-মেইল</b></label>
                          <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="ই-মেইল দিন" name="email" required>
                          <label><b>পাসওয়ার্ড</b></label>
                          <input class="w3-input w3-border" type="password" placeholder="পাসওয়ার্ড দিন" name="password" required>
                          <button class="w3-button w3-block w3-blue w3-section w3-padding" type="submit">নিশ্চিত করুন</button>
                        </div>
                      </form>

                      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">বাতিল করুন</button>
                        <span class="w3-right w3-padding w3-hide-small">ভুলে গেছেন? <a href="forgotPassword.php">পাসওয়ার্ড</a></span>
                        <p>নিবন্ধন করতে ক্লিক করুন <a class="w3-button w3-black" href='registration.php'> এখানে</a></p>
                      </div>

                    </div>
                  </div>
                </div>
                <?php
                }
    }

    public function signOut(){
        session_start();
        if(session_destroy()) // Destroying All Sessions
        {
            header("Location: ../shworolipi/index.php"); // Redirecting To Home Page
        }    
    }

    public function getCurrentInfo(){
        include 'dbConnect.php';
        $query = "SELECT * FROM member WHERE email= '$this->email'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $password = $row["password"];
                $date_of_birth = $row["date_of_birth"];
                $phone_number = $row["phone_number"];
                $gender = $row["gender"];
            }
        }
        $this->_setName($name);
        $this->_setPassword($password);
        $this->_setDateOfBirth($date_of_birth);
        $this->_setPhoneNumber($phone_number);
        $this->_setGender($gender);
    }

    public function editPersonalAccount(){
        include 'dbConnect.php';
        $query = "UPDATE member set name = '$this->name', date_of_birth = '$this->dateOfBirth', phone_number = '$this->phoneNumber', gender = '$this->gender' WHERE email= '$this->email'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        ?>
        <script> 
             window.alert("তথ্য সফলভাবে পরিবর্তন হয়েছে");
             window.location = 'index.php';
        </script>
        <?php   
    }

    public function confirmPassword(){
        include 'dbConnect.php';
        $query = "SELECT * FROM member WHERE email= '$this->email'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $password = $row["password"];
            }
        }
        $this->_setPassword($password);
    }

    public function deletePersonalAccount(){
        include 'dbConnect.php';
        $query = "DELETE FROM member WHERE email = '$this->email'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        ?>
        <script> 
            window.alert("অ্যাকাউন্ট মুছে দেয়া হয়েছে।");
            window.location = '../shworolipi/index.php';
        </script>    
        <?php
    }

    public function getGuideline(){ 
        ?>
        <p align="justify">
        স্বরলিপির গানের ভান্ডারে আপনাকে স্বাগতম!<br/><br/>
        আপনার পছন্দের বাংলা গান শুনতে গানটি খুঁজে নিন! গানের নাম বা গানের কথা দিয়ে গানটি খুঁজতে পারেন, তাছাড়া বিভিন্ন শিল্পী, বিভাগের গানও খুঁজতে পারেন। এছাড়াও আপনার মনের অবস্থার উপর ভিত্তি করেও গান শুনতে পারেন।
        মিউজিক প্লেয়ার থেকে দেখে নিতে পারেন গানের কথা এবং অন্যান্য তথ্য!<br/><br/>
        হোমপেইজে আপনি পাচ্ছেন স্বরলিপির সবচেয়ে জনপ্রিয় গানগুলো! প্লেলিস্টে সংগ্রহ করুন আপনার সবচেয়ে প্রিয় গানগুলো! এখানে আপনি পাচ্ছেন নতুন গান সংযোজন, পুরোনো গান বাদ দেয়া, কোনো গান শোনা বা সম্পূর্ণ প্লেলিস্ট শোনা, প্লেলিস্ট ফেইসবুকে শেয়ার করার মতো অনেক সুবিধা।<br/><br/>
        স্বরলিপির সাথে থাকুন, বাংলা গানের সাথে থাকুন!
        </p>
        <?php 
    } 

    public function showPlaylist(){
        include 'dbConnect.php';
        $sql="SELECT DISTINCT name from playlist where member_id = $this->member_id";
        $result = $mysqli->query($sql);
        while($row=$result->fetch_assoc()){
            $data[] = $row["name"];
        }
        if (!empty($data)){
            return $data;
        }    
    }

    public function createPlaylist(){
        include 'dbConnect.php';
        $query = "INSERT INTO playlist (name, member_id) VALUES ('$this->newPlaylistName', '$this->member_id')";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
    }

    public function getMemberId(){
        include 'dbConnect.php';
        $query = "SELECT * FROM member WHERE email= '$this->email'";
        $result = mysqli_query($mysqli,$query) or die(mysql_error());
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $member_id = $row["member_id"];
            }
        return $member_id;
        }   
    }

    public function getTrendySongList(){
        $getPopularSongs = "SELECT * FROM song ORDER BY popularity DESC LIMIT 9";
        return $getPopularSongs;
    }

    public function _setMemberId($member_id)
    {
        $this->member_id = $member_id;

        return $this;
    }



    public function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }


    public function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function _setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }


    public function _setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }


    public function _setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }
    public function getGender()
    {
        return $this->gender;
    }

  
    public function _setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function _setNewPlaylistName($newPlaylistName)
    {
        $this->newPlaylistName = $newPlaylistName;

        return $this;
    }
} 
?>