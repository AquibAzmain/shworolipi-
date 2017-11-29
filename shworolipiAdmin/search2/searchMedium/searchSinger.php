<?php
require_once 'dbconnect.php';
$db = Database::getInstance();
$mysqli = $db->getConnection();
mysqli_set_charset($mysqli,"utf8");


$query = "SELECT DISTINCT artist FROM song ";
$result = mysqli_query($mysqli,$query) or die(mysql_error());

while ($row = $result->fetch_assoc()) {
    $data[] = $row['artist'];
}
$arrlength = count($data);
?>
<!doctype html>
<meta charset="utf-8">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="jquery-3.2.0.min.js"></script>
 
</head>
<body>
 
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="শিল্পীর নাম খুঁজুন..." style="width:82%">
<table align="center" id="myTable" style="width:82%">
  <tr class="header">
    <th style="width:60%;">শিল্পীর নাম</th>
    <th style="width:40%;"></th>
  </tr>
  
<?php for($x = 0; $x < $arrlength; $x++) {?>  
    
    <tr>
          <td>
              <?php echo $data[$x];?>
           </td>
           <td>
              <form action = "../musicPlayer/audio.php"  method="POST"> 
                <input type="hidden" name = "play"  value = "<?php echo $data[$x];?>" >
                <button id = tableSubmit type = "submit" name = "submitPlay" style="border: 0; background: transparent"><img src = "/shworolipi/search2/right.png" width = "50px" height = "50px"/></button> 
               </form>
          </td>   
    </tr>
  
<?php      }?> 
</table>


</body>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
</html>