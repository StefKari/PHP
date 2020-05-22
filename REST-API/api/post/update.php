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

  // dobiti sirove objavljenje podatke
  $data = json_decode(file_get_contents("php://input"));

  // postavljanje id
  $data = $post->id;

  $data = $post->title;
  $data = $post->body;
  $data = $post->author;
  $data = $post->category_id;

  // update posta
  if($post->update()) {
    echo json_encode(
      array('mesage' => 'Post je update!')
    );
  }
  else {
    echo json_encode(
      array('message' => 'Post nije update!')
    );
  }


















 ?>
