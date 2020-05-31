<?php

class HumanDB {

  private $servername = "localhost";
  private $username = "username";
  private $password = "password";
  private $dbName = "solid";
  private $conn;

  public function __construct() {
      try {
        $this->conn = new PDO("mysql:host=$servername;dbName=solid", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
      }catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }

  }

  public function getName() {
    $query = "SELECT * FROM humans WHERE id = ".$id.";";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    return $stmt;

  }

  public function save() {
    $query = "INSERT INTO humans (name) VALUES (".$name.")";
    $stmt = $this->conn->prepare($query);

    if($stmt->execute()){
        return true;
    }
    return false;

  }

}

class Human {

  private $humanDB;
  private $name;

  function __construct($name) {
		$this->name = $name;
		$this->humanDb = new HumanDB();
	}

  public function getName() {
    return $this->name;
  }
}
?>
