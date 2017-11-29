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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/adminHome.css">

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
  <a style = "text-decoration: none;"class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a style = "text-decoration: none;" href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> স্বরলিপি</a>
  <a href="searchindex.php" style = "text-decoration: none;"  style = "text-decoration: none;" class="w3-bar-item w3-button w3-hide-small" title="Search"><i class="fa fa-search"></i>গান খুঁজুন</a>
  <a style = "text-decoration: none;" href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right"><i class="fa fa-sign-out"></i></span> লগ আউট</a>
 </div>
</div>


<div class="tab" style = "padding-top: 1cm; height: 800px">
  <button class="tablinks" onclick="openCity(event, 'অ্যাকাউন্ট এর তথ্য পরিবর্তন')" >অ্যাকাউন্ট এর তথ্য পরিবর্তন</button>
  <button class="tablinks" onclick="openCity(event, 'গান সংযোগ')">গান সংযোগ</button>
  <button class="tablinks" onclick="openCity(event, 'গান বাতিল')">গান বাতিল</button>
  <button onclick="location.href = 'indexUpdate.php';" class="tablinks" onclick="openCity(event, 'গানের তথ্য পরিবর্তন')">গানের তথ্য পরিবর্তন</button>
  <button class="tablinks" onclick="openCity(event, 'সদস্যপদ বাতিল')">সদস্যপদ বাতিল</button>
  <button class="tablinks">নির্দেশনা</button>
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