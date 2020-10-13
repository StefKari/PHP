<?php

interface Observer {
  public function onChanged($sender, $args);
}

interface Observable {
  public function addObserver($observer);
}

class MoviesList implements Observable {

    private $arr = [];

    public function addMovie($name) {
        foreach($this->arr as $elem) {
            $elem->onChanged($this, $name);
        }
    }

    public function addObserver($observer) {
      $this->arr[] = $observer;
    }
}

class MovieListLogger implements Observer {
    public function onChanged($sender, $args) {
        echo ("'$args' added to main list of Movies \n" );
    }
}

$movieList = new MoviesList();
$movieList->addObserver(new MovieListLogger());
$movieList->addMovie('Zigosani u reketu!');

?>
