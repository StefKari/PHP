<?php

  // Headers funkcije
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Contorl-Allow-Methods: POST');
  header('Access-Contorl-Allow-Headers: Access-Contorl-Allow-Headers,Content-Type,Access-Contorl-Allow-Methods,Authorization,X-Requeested-With');

  include_once '../basicAuth.php';
  include_once '../../config/database.php';
  include_once '../../models/category.php';

  // instanciranje objekta baze
  $database = new Database();
  $db = $database->connect();

  // instanciranje objekta posta
  $category = new Category($db);

  // dobiti sirove objavljenje podatke
  $data = json_decode(file_get_contents("php://input"));

  // postavljanje id
  $data = $category->id;

  // delete posta
  if($category->delete()) {
    echo json_encode(
      array('mesage' => 'Kategorija je izbrisana!')
    );
  }
  else {
    echo json_encode(
      array('message' => 'Kategorija nije izbrisana!')
    );
  }




 ?>
