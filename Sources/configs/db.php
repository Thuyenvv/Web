<?php
class Database{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "ebook";
	private $conn;
	// Create connection
	public function connect(){
		$this->conn = null;
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($this->conn, 'UTF8');
			// Check connection
		if ($this->conn->connect_error) {
			   die("Connection failed: " . $this->conn->connect_error);
		}
		return $this->conn;
	}
}
?>