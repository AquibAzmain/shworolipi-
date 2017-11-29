<?php
abstract class User{
	public function search($search_value){
		include 'dbConnect.php';
		$sql="SELECT * from song where lyric like '%$search_value%'";
		$res=$mysqli->query($sql);
	  	while($row=$res->fetch_assoc()){
	      $data[] = $row["title_Bengali"];
	  	}
	  	if (!empty($data)){
            return $data;
        }
	}

	public abstract function getGuideline();
	
}

?>