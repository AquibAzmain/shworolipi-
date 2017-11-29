<?php
require_once 'dbconnect.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();
mysqli_set_charset($mysqli,"utf8");

$query = "SELECT * FROM song WHERE genre = 'নজরুলগীতি' ";
$result = mysqli_query($mysqli,$query) or die(mysql_error());

while ($row = $result->fetch_assoc()) {
    $data[] = $row['title_Bengali'];
}
$arrlength = count($data);
?>
<!doctype html>
<meta charset="utf-8">
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="jquery-3.2.0.min.js"></script>
 
</head>
<body>
 

<table align="center" id="myTable" style="width:82%">
  <tr class="header">
    <th style="width:60%;">গানের নাম</th>
    <th style="width:40%;">
      <form action = "../musicPlayer/audioCategory.php" method="POST">
        <input type="hidden" name = "category" value = "নজরুলগীতি">
        <input type = "submit" name = "submitPlay2" value = "শুনুন">
      </form>
    </th>
  </tr>

<?php for($x = 0; $x < $arrlength; $x++) {?>  
    
    <tr>
          <td>
              <img src="css/music_icon.png" alt="icon" style="width:25px;height:25px;"><?php echo $data[$x];?>
           </td>
           <td>
              <form action = "../musicPlayer/audio.php"  method="POST"> 
                <input type="hidden" name = "play"  value = "<?php echo $data[$x];?>" >
                <button id = tableSubmit type = "submit" name = "submitPlay" style="border: 0; background: transparent"><img src = "/shworolipi/search2/play.png" width = "50px" height = "40px"/></button> 
               </form>
          </td>   
    </tr>
  
<?php      }?> 
</table>


</body>

</html>