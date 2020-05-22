<?php

class Category {
  // konekcija na bazu
  private $conn;
  private $table_name = "category";

  // svojstva
  public $id;
  public $name;
  public $created_at;

  // Constructor za konekciju na bazu
  public function __construct($db) {
    $this->conn = $db;
  }

  // cita iz baze kategoriju
  public function read() {
    // kreiranje upita
    $query = 'SELECT id, name, created_at
              FROM ' . $this->table_name . ' ORDER BY created_at DESC';

    // priprema izjavu upita
    $stmt = $this->conn->prepare($query);

    // izvrasava upit

    $stmt->execute();

    return $stmt;
  }

  // dobijanje jendog reda iz baze po id
 public function read_single(){
  // kreira upit
  $query = 'SELECT id, name FROM ' . $this->table_name . ' WHERE id = ?
                                                      LIMIT 0,1';

    //priprema izjavu upita
    $stmt = $this->conn->prepare($query);

    // vezuje id
    $stmt->bindParam(1, $this->id);

    // izvrsava upit
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // setuje svojstva
    $this->id = $row['id'];
    $this->name = $row['name'];
 }

  // kreira category
  public function create() {
    // kreairanje upita
    $query = "INSERT INTO category (name) VALUES (:name)";
    // priprema izjavu upita
    $stmt = $this->conn->prepare($query);

    // cisti od sql inzeksena
    $this->name = htmlspecialchars(strip_tags($this->name));

    // vezuje podatak
    $stmt->bindParam(':name', $this->name);

    // izvrsava upit
    if($stmt->execute()) {
      return true;
    }

    return false;

  }

  // update category
  public function update() {
    // kreairanje upita
    $query = 'UPDATE ' .  $this->table_name . ' SET name = :name
                                          WHERE id = :id';
    // priprema izjavu upita
    $stmt = $this->conn->prepare($query);

    // cisti od sql inzeksena
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // vezuje podatak
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id', $this->id);

    // izvrsava upit
    if($stmt->execute()) {
      return true;
    }

    return false;

  }

  // delete tj brisanje category
  public function delete() {
    // kreairanje upita
    $query = 'DELETE FROM ' . $this->table_name . ' WHERE id = :id';

    // priprema izjavu upita
    $stmt = $this->conn->prepare($query);

    // cisti od sql inzeksena
    $this->id = htmlspecialchars(strip_tags($this->id));

    // vezuje podatak
    $stmt->bindParam(':id', $this->id);

    // izvrsava upit
    if($stmt->execute()) {
      return true;
    }

    return false;

  }

}














 ?>
