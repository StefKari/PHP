<?php

interface Open {
  public function open();
}

class Door implements Open {
    public function open() {
        return 'Otvorena vrata!';
    }
}

class Window implements Open {
    public function open() {
        return 'Otvoren prozor!';
    }
}

class SmartDoor extends Door {
    public function open() {
        parent::open();
        $this->temperature();
    }
}

class SmartWindow extends Window {
    public function open() {
        parent::open();
        $this->temperature();
    }
}

class SmartOpener implements Open {

  private $opener;

  public function __construct(Open $opener) {
    $this->opener = $opener;
  }

  public function open() {
      $this->opener->open();
      $this->temperature();
  }
}


$door = new Door();
$window = new Window();

$smartDoor = new SmartOpener($door);
$smartWindow = new SmartOpener($window);

?>
