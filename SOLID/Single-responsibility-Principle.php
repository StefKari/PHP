<?php

class AnimalDB {

  private $servername = "localhost";
  private $username = "username";
  private $password = "password";
  private $dbName = "baza";
  private $conn;

  public function __construct() {
      try {
        $this->conn = new PDO("mysql:host=$servername;dbName=baza", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
      }catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }

  }

  public function getName() {
    $query = "SELECT * FROM animals WHERE id = ".$id.";";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    return $stmt;

  }

  public function save() {
    $query = "INSERT INTO animals (name) VALUES (".$name.")";
    $stmt = $this->conn->prepare($query);

    if($stmt->execute()){
        return true;
    }
    return false;

  }

}

class Animal {

  private $animalDB;
  private $name;

  function __construct($name) {
		$this->name = $name;
		$this->animalDb = new AnimalDB();
	}

  public function getName() {
    return $this->name;
  }
}
?>
