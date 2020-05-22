<?php

interface DBConnect {
  function connect();
}

class MySQL implements DBConnect {
  public function connect() {
    return "Database conncetion";
  }
}

class User {
    private $dbConnect;

    public function __construct(DBConnect $dbConnect) {
        $this->dbConnect = $dbConnect;
    }
}













 ?>
