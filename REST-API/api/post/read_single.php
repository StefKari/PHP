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

  // vraca id
  $post->id = isset($_GET['id']) ? $_GET['id'] :"Ubaci id u url!";

  //  vraca post single
  $post->read_single();

  // krairanje array
  $post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
  );

  // konvertuje u json
  print_r(json_encode($post_arr));




 ?>
