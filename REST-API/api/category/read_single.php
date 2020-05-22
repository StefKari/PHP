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

  // vraca id
  $category->id = isset($_GET['id']) ? $_GET['id'] : "Ubaci id u url!";

  //  vraca post single
  $category->read_single();

  // krairanje array
  $category_arr = array(
    'id' => $category->id,
    'name' => $category->name,
  );

  // konvertuje u json
  print_r(json_encode($category_arr));




 ?>
