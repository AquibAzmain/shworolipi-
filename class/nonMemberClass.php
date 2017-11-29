<?php
require_once 'userClass.php';
class NonMember extends User{
	public function signUp($email, $password, $hash){
		include 'dbConnect.php';
		$query = "INSERT into `member` (email, password, hash) VALUES ('$email', '".md5($password)."', '$hash')";
        $result = mysqli_query($mysqli,$query);
        return true;
	}

	public function getConfirmation($email,$hash){
		include 'dbConnect.php';
        $query = "SELECT email, hash, active FROM member WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
	    $result = mysqli_query($mysqli,$query);
	    if ($result->num_rows > 0) {
	    // output data of each row
	    	$query2 = "UPDATE member SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
	    	$result2 = mysqli_query($mysqli,$query2);
	    	//echo 'Your account has been activated, you can now login';
	    	$_SESSION['email'] = $email;
			?><script>alert ("আপনার অ্যাকাউন্ট সচল হয়েছে। এখন আপনি সঠিক ই-মেইল ও পাসওয়ার্ড দিয়ে প্রবেশ করতে পারবেন।");
			window.location = 'index.php';	
			</script> <?php
	    }
	    else{
	        // No match -> invalid url or account has already been activated.
	        echo 'লিংকটি সঠিক নয় অথবা আপনার অ্যাকাউন্ট পূর্বেই সচল করা হয়েছে।';
	    }
	}


	public function getGuideline(){
        ?>
        <p align="justify">
	    স্বরলিপির গানের ভান্ডারে আপনাকে স্বাগতম!<br/><br/>
	  	আপনার পছন্দের বাংলা গান শুনতে গানটি খুঁজে নিন! গানের নাম বা গানের কথা দিয়ে গানটি খুঁজতে পারেন, তাছাড়া বিভিন্ন শিল্পী, বিভাগের গানও খুঁজতে পারেন। এছাড়াও আপনার মনের অবস্থার উপর ভিত্তি করেও গান শুনতে পারেন।
	  	মিউজিক প্লেয়ার থেকে দেখে নিতে পারেন গানের কথা এবং অন্যান্য তথ্য!<br/><br/>
	  	হোমপেইজে আপনি পাচ্ছেন স্বরলিপির সবচেয়ে জনপ্রিয় গানগুলো!<br/><br/>
	  	এছাড়াও প্লেলিস্ট তৈরি সহ আরো অনেক সুবিধা পেতে রেজিস্ট্রেশন করে হয়ে যান স্বরলিপির সদস্য! সদস্য হতে আপনার ইমেইল আইডি আর পাসওয়ার্ড প্রবেশ করুন। রেজিস্ট্রেশন সঠিক হলে আপনার কাছে ইমেইল পৌঁছে যাবে।
	  </p>
	  <?php
	}
	
}

?>