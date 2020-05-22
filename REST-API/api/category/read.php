<?php
  // Headers funkcije
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../basicAuth.php';
  include_once '../../config/database.php';
  include_once '../../models/category.php';

  // instanciranje objekta baze
  $database = new Database();
  $db = $database->connect();

  // instanciranje objekta posta
  $category = new Category($db);

  // category koji cita iz baze
  $result = $category->read();
  // vraca broj redova
  $num = $result->rowCount();

  // proverava da li postoji
  if($num > 0) {
    // category array
    $cat_arr = array();
    $cat_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $cat_item = array(
        'id' => $id,
        'name' => $name,
      );

      // ubacivanje $post_item u niz data tj u $posts_arr
      array_push($cat_arr['data'], $cat_item);
      //array_push($cat_arr['data'], $cat_item);
    }

    // konvertuje u json
    echo json_encode($cat_arr);

  } else {
    // nema category
    echo json_encode(
      array('message' => 'Nema nadjenih kategorija!')
    );
  }
