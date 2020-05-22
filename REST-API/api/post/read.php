<?php
  // Headers funkcije
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Contorl-Allow-Methods: POST');
  header('Access-Contorl-Allow-Headers: Access-Contorl-Allow-Headers,Content-Type,Access-Contorl-Allow-Methods,Authorization,X-Requeested-With');

  include_once '../basicAuth.php';
  include_once '../../config/database.php';
  include_once '../../models/post.php';

  // instanciranje objekta baze
  $database = new Database();
  $db = $database->connect();

  // instanciranje objekta posta
  $post = new Post($db);

  // post koji cita iz baze
  $result = $post->read();
  // vraca broj redova
  $num = $result->rowCount();

  // proverava da li postoji
  if($num > 0) {
    // post array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'body' => html_entity_decode($body),
        'author' => $author,
        'category_id' => $category_id,
        'category_name' => $category_name
      );

      // ubacivanje $post_item u niz data tj u $posts_arr
      array_push($posts_arr['data'], $post_item);
      //array_push($posts_arr['data'], $post_item);
    }

    // konvertuje u json
    echo json_encode($posts_arr);

  } else {
    // nema postova
    echo json_encode(
      array('message' => 'Nema nadjenih postova!')
    );
  }
