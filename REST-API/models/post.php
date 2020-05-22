<?php
  class Post {
    // konekcija na bazu
    private $conn;
    private $table_name = 'post';

    // post svojstva
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // Constructor za konekciju na bazu
    public function __construct($db) {
      $this->conn = $db;
    }

    // cita iz baze post
    public function read() {
      // kreira upit
      $query = 'SELECT category.name as category_name, post.id, post.category_id, post.title, post.body, post.author, post.created_at
                                FROM ' . $this->table_name . '
                                LEFT JOIN
                                  category  ON post.category_id = category.id
                                ORDER BY
                                  post.created_at DESC';

      // priprema izjavu upita
      $stmt = $this->conn->prepare($query);

      // izvrasava upit
      $stmt->execute();

      return $stmt;
    }

    //dobijanje jednog podatka po id
    public function read_single() {
      //kreiranje upita
      $query = 'SELECT category.name as category_name, post.id, post.category_id, post.title, post.body, post.author, post.created_at
                                FROM ' . $this->table_name . '
                                LEFT JOIN
                                  category ON post.category_id = category.id
                                WHERE post.id = ?
                                LIMIT 1';
      // priprema izjavu upita
      $stmt = $this->conn->prepare($query);

      //vezuje id
      $stmt->bindParam(1,$this->id);

      // izvrasava upit
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      //postavljanje svojstva
      $this->title = $row['title'];
      $this->body = $row['body'];
      $this->author = $row['author'];
      $this->category_id = $row['category_id'];
      $this->category_name = $row['category_name'];

    }

    // kreiranje posta
    public function create() {
      // kreairanje upita
      $query = "INSERT INTO post (title,body,author,category_id) VALUES (:title,:body,:author,:category_id)";
      // priprema izjavu upita
      $stmt = $this->conn->prepare($query);

      // cisti od sql inzeksena
      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->body = htmlspecialchars(strip_tags($this->body));
      $this->author = htmlspecialchars(strip_tags($this->author));
      $this->category_id = htmlspecialchars(strip_tags($this->category_id));

      // vezuje podatak
      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':body', $this->body);
      $stmt->bindParam(':author', $this->author);
      $stmt->bindParam(':category_id', $this->category_id);

      // izvrsava upit
      if($stmt->execute()) {
        return true;
      }

      return false;

    }

    // update posta
    public function update() {
      // kreairanje upita
      $query = 'UPDATE ' . $this->table_name . '
                                SET title = :title, body = :body, author = :author, category_id = :category_id
                                WHERE id = :id';

      // priprema izjavu upita
      $stmt = $this->conn->prepare($query);

      // cisti od sql inzeksena
      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->body = htmlspecialchars(strip_tags($this->body));
      $this->author = htmlspecialchars(strip_tags($this->author));
      $this->category_id = htmlspecialchars(strip_tags($this->category_id));
      $this->id = htmlspecialchars(strip_tags($this->id));

      // vezuje podatak
      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':body', $this->body);
      $stmt->bindParam(':author', $this->author);
      $stmt->bindParam(':category_id', $this->category_id);
      $stmt->bindParam(':id', $this->id);

      // izvrsava upit
      if($stmt->execute()) {
        return true;
      }

      return false;
    }

    // delete tj brisanje posta
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
