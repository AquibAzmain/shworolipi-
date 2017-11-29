<?php
require_once 'dbconnect.php';
include '../class/MemberClass.php';
$db = Database::getInstance();
$mysqli = $db->getConnection(); 
mysqli_set_charset($mysqli,"utf8");

$arrlength = "";
if(isset($_POST['search'])){
  $search_value=$_POST["searchItem"];
  $sql="SELECT * from song where lyric like '%$search_value%'";
  $res=$mysqli->query($sql);
  while($row=$res->fetch_assoc()){
      $data[] = $row["title_Bengali"];
  }
  if (!empty($data)) {
    $arrlength = count($data);  
  }
  else {
    $sql="SELECT * from song";
    $res=$mysqli->query($sql);
    while($row=$res->fetch_assoc()){
      $data[] = $row["title_Bengali"];
    }
    $arrlength = count($data);
  }
      
}          
?>

<!doctype html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>


  #titleSearch {
    background-image: url('/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
  }
    #myInput{
    background-image: url('/searchicon.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
  }

  #myTable {
    border-collapse: collapse;

    font-size: 18px;
    display: block;
    overflow-y: auto;
    overflow-x: hidden;
    height: 300px;   
  }

  #myTable th, #myTable td {
    text-align: left;
    padding: 12px;
    width: 100%;
    
  }

  #myTable tr {
    border-bottom: 1px solid #ddd;
  }

  #myTable tr.header, #myTable tr:hover {
    background-color: #f1f1f1;
  }



  #mySidenav button {
      padding: 15px;
      width: 180px;
      color: white;
      background-color: #4CAF50; /* Green */
      border: none;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;   
  }

  .dropdown {
      position: relative;
      display: inline-block;
  }

  .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 180px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
  }

  .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      cursor: pointer;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1;
    text-decoration: none;
  }

  .dropdown:hover .dropdown-content {
      display: block;
  }

  .dropdown:hover .dropbtn {
      background-color: #3e8e41;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
    $(function() {
      $( "#titleSearch" ).autocomplete({
        source: 'search2/searchQuery/searchTitleQuery.php'
      });
    });
    </script>


</head>
<body>
 <!-- Navbar -->
<div class="w3-top" style="z-index:3;">
 <div class="w3-bar w3-black w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a class="w3-bar-item w3-button"><i class="fa fa-home"></i> স্বরলিপি</a>
  <a  class="w3-bar-item w3-button w3-hide-small" title="Search"><i class="fa fa-search"></i>গান খুঁজুন</a>
  <a  class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-list"></i>প্লেলিস্ট</a>

  <a class="w3-bar-item w3-button w3-hide-small w3-right"><i class="fa fa-sign-out"></i>  লগ আউট</a>
 
  
  
 </div>
 </div>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-teal" style="z-index:3;width:250px;margin-top:43px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><img src = "images/shwLogo.png" width = "160px" height = "80px"/></h4>
  <a class="w3-bar-item w3-button w3-hover-black">অ্যাকাউন্ট</a>
  <a onclick="topFunction()" class="w3-bar-item w3-button w3-hover-black" id ="changePassward">পাসওয়ার্ড পরিবর্তন</a>
  <a  class="w3-bar-item w3-button w3-hover-black">অ্যাকাউন্ট মুছুন</a>
  <a  class="w3-bar-item w3-button w3-hover-black">নির্দেশিকা</a>
  <a class="w3-bar-item w3-button w3-hover-black"> যোগাযোগ</a>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 style = "font-size: 17px" class="w3-text-teal w3-center">গানের মাদল বাজলো প্রাণে <br/>
        মেতে উঠুন বাংলা গানে</h1> <hr/>
      <p></p>
        

      <div id= "changableDiv">
           <!-- First Grid-->
        <div class="w3-row-padding">
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>এসো হে বৈশাখ</b></p>
              <p>শিল্পীঃ কাদেরী কিবরিয়া</p>
              <p>বিভাগঃ রবীন্দ্রসঙ্গীত</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="এসো হে বৈশাখ">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>তুমি রবে নীরবে</b></p>
              <p>শিল্পীঃ আকিব আজমাইন</p>
              <p>বিভাগঃ রবীন্দ্রসঙ্গীত</p>
                  <form  action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="তুমি রবে নীরবে">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>আমি বাংলায় গান গাই</b></p>
              <p>শিল্পীঃ মাহ্‌মুদুজ্জামান বাবু</p>
              <p>বিভাগঃ দেশাত্মবোধক গান</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="আমি বাংলায় গান গাই">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
        </div>

        <!-- Second Grid-->
         <div class="w3-row-padding">
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>আমার আপনার চেয়ে</b></p>
              <p>শিল্পীঃ অন্বেষা দাসগুপ্ত</p>
              <p>বিভাগঃ নজরুলগীতি</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="আমার আপনার চেয়ে আপন যে জন">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>সব লোকে কয় লালন</b></p>
              <p>শিল্পীঃ বিউটি</p>
              <p>বিভাগঃ লোকগীতি</p>
                  <form  action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="সব লোকে কয় লালন কী জাত">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>আইল আইল রে</b></p>
              <p>শিল্পীঃ ইশতিয়াক</p>
              <p>বিভাগঃ আধুনিক</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="আইল আইল রে">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
        </div>

        <!-- Third  Grid-->
        <div class="w3-row-padding">
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>ও আমার বাংলা মা তোর</b></p>
              <p>শিল্পীঃ ফাহমিদা নবী</p>
              <p>বিভাগঃ দেশাত্মবোধক গান</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="ও আমার বাংলা মা তোর">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>আজ তোমার মন খারাপ মেয়ে</b></p>
              <p>শিল্পীঃ আকিব আজমাঈন</p>
              <p>বিভাগঃ আধুনিক</p>
                  <form  action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="আজ তোমার মন খারাপ মেয়ে">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <img src="images/music_icon.png" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
              <p><b>ভালোবেসে সখী নিভৃতে যতনে</b></p>
              <p>শিল্পীঃ শান</p>
              <p>বিভাগঃ রবীন্দ্রসঙ্গীত</p>
                  <form action = ../musicPlayer/audio.php method = "POST" >
                    <input type = "hidden" name = "play" value="ভালোবেসে সখী নিভৃতে যতনে">
                    <input type = "submit" name= "submitPlay" class="w3-button w3-black" value = "শুনুন">
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w3-third w3-container">
      <p class="w3-padding-large w3-right"><img src = "images/rabindra.jpg" width = "220px" height = "300px"/></p>
      <p class="w3-padding-large w3-right"><img src = "images/nazrul.jpg" width = "220px" height = "300px"/></p>
      <p class="w3-padding-large w3-right"><img src = "images/lalon.jpg" width = "220px" height = "300px"/></p>
      <p class="w3-padding-large w3-right"><img src = "images/hason.jpg" width = "220px" height = "300px"/></p>
    </div>
  </div>




<div class="w3-container">
  <div id="id03" class="w3-modal" style="display:block">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom w3-center" style="max-width:2000px;margin-top: 0px; background-image:url('images/search2.jpg'); background-size: 100% 100%;">
  
      <div class="w3-center"><br/><br/>
        <span onclick="closeSearch()" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">×</span> 
      </div>
      
    <div id="mySidenav" class="sidenav">
  <button onclick="window.location.href='searchindex.php'">গানের নাম/কথা</button>
  <button id="singer">শিল্পী</button>

  <div class="dropdown">
    <button class="dropbtn">গানের বিভাগ</button>
    <div class="dropdown-content">
      <a id="patriotic">দেশাত্মবোধক গান</a>
      <a id="rabindra">রবীন্দ্রসঙ্গীত</a>
      <a id="nazrul">নজরুলগীতি</a>
      <a id="folk">লোকগীতি</a>
      <a id="modern">আধুনিক</a>
    </div>
  </div>

  <div class="dropdown">
  <button class="dropbtn">মনের অবস্থা</button>
  <div class="dropdown-content">
    <a id = "prem">প্রেম</a>
    <a id = "biroho">বিরহ</a>
    <a id = "utsob">উৎসব</a>
    <a id = "anondo">আনন্দ</a>
    <a id = "vokti">ভক্তি</a>
    <a id = "bristi">বৃষ্টি</a>
    <a id = "rojoni">রজনী</a>
    <a id = "sokal">সকাল</a>
    <a id = "biye">বিয়ে</a>
  </div>
</div>

</div>

      <div id="div_content1">
<form action = "" method="POST">
  <div style="padding-top:5px " >
    <input style="width:80%;" type="text" id="titleSearch" name = "searchItem"  placeholder="গানের নাম অথবা গানের কথা লিখুন"> 
    <button class="w3-xlarge" type="submit" name="search">
      <i class="fa fa-search"></i>
    </button>
  </div>
</form>

<table align="center" id="myTable" style="width:82%">
<?php for($x = 0; $x < $arrlength; $x++) {?>  
    
    <tr>
          <td>
              <img src="css/music_icon.png" alt="icon" style="width:25px;height:25px;"><?php echo $data[$x];?>
           </td>
           <td>
              <form action = "../musicPlayer/audio.php"  method="POST"> 
                <input type="hidden" name = "play"  value = "<?php echo $data[$x];?>">
                <button id = tableSubmit type = "submit" name = "submitPlay" style="border: 0; background: transparent"><img src = "search2/play.png" width = "50px" height = "40px"/> </button> 
               </form>
          </td>   
    </tr>
  
<?php      }
?> 
</table>
</div>
      

     

    </div>
  </div>
</div>



</body>
<script type="text/javascript">


function closeSearch(){
  document.getElementById('id03').style.display='none';
  window.location = 'index.php';
}

$(document).ready(function(){
$('#title').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchTitle.php');

 });
});

$(document).ready(function(){
$('#singer').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchSinger.php');

 });
});


$(document).ready(function(){
$('#prem').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchPrem.php');

 });
});

$(document).ready(function(){
$('#anondo').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchAnondo.php');

 });
});

$(document).ready(function(){
$('#biroho').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchBiroho.php');

 });
});

$(document).ready(function(){
$('#biye').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchBiye.php');

 });
});

$(document).ready(function(){
$('#bristi').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchBrishti.php');

 });
});

$(document).ready(function(){
$('#rojoni').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchRojoni.php');

 });
});

$(document).ready(function(){
$('#sokal').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchShokal.php');

 });
});

$(document).ready(function(){
$('#utsob').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchUtshob.php');

 });
});

$(document).ready(function(){
$('#vokti').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchVokti.php');

 });
});

$(document).ready(function(){
$('#patriotic').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchPatriotic.php');

 });
});

$(document).ready(function(){
$('#rabindra').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchRobindro.php');

 });
});

$(document).ready(function(){
$('#nazrul').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchNazrul.php');

 });
});

$(document).ready(function(){
$('#folk').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchFolk.php');

 });
});

$(document).ready(function(){
$('#modern').click(function(){   

    $('#div_content1').load('search2/searchMedium/searchModern.php');

 });
});
</script>


</html>