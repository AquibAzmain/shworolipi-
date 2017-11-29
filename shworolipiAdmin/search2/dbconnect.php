<?php
/*
* Mysql database class - only one connection alowed
*/
class Database {
	private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "shworolipi";
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
		// Error handling
		if (mysqli_connect_errno()) { 
			 die("Database connection failed: " . 
			 mysqli_connect_error() . " (" . 
			 mysqli_connect_errno() . ")" 
			 ); 
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
}

/*$db = Database::getInstance();
$mysqli = $db->getConnection(); 
$sql_query = "SELECT * FROM users";
$result = $mysqli->query($sql_query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - email: " . $row["email"].  "<br>";
    }
} else {
    echo "0 results";
}*/
?>