<?php


interface QuackBehavior {
  function quack();
}

class NormalQuack implements QuackBehavior {
  public function quack() {
    return "Quack!";
  }
}

class MuteQuack implements QuackBehavior {
  public function quack() {
    return "<< Silence >>";
  }
}

class Squeak implements QuackBehavior {
  public function quack() {
    return "Squeak!";
  }
}

class Duck {

  private $quackType;

  public function __construct(QuackBehavior $QuackBehavior) {
    $this->quackType = $QuackBehavior;
  }

  public function getBehavior() {
    return $this->quackType->quack();
  }

}

$duck = new Duck(new NormalQuack); // dobijamo ponasanje NoramlDuck
$duck->getBehavior();








?>
