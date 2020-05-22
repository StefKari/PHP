<?php

if(!isset($_SERVER["PHP_AUTH_USER"])) {
  header("WWW-Authenticate: Basic realm='Private Area'");
  header("HTTP/1.0 401 Unauthorized!");
  echo "Izvinite, morate se prijaviti!";
  exit();
}
else {
    if(($_SERVER["PHP_AUTH_USER"] == "Stef" && ($_SERVER["PHP_AUTH_PW"] == "00kari00"))) {
    print "Pozzdrav!";
    }
  else {
    header("WWW-Authenticate: Basic realm='Private Area'");
    header("HTTP/1.0 401 Unauthorized!");
    echo "Izvinite, morate se prijaviti!";
    die();
  }
}


?>
