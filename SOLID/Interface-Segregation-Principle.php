<?php

interface QuackBehavior {
  function quack();
}

class NormalQuack implements QuackBehavior {
  public function quack() {
    echo  "Quack!<br>";
  }
}

class MuteQuack implements QuackBehavior {
  public function quack() {
    echo "<< Silence >><br>";
  }
}

class Squeak implements QuackBehavior {
  public function quack() {
    echo "Squeak!<bb>";
  }
}

$NormalDuck = new NormalQuack();
$NormalDuck ->quack();

$MuteQuack = new MuteQuack();
$MuteQuack->quack();

$Squeak = new Squeak();
$Squeak->quack();












 ?>
