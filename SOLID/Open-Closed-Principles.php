<?php

interface MusicGenre {
  function music();
}

class PopMusic implements MusicGenre {
  public function music() {
    return "Dua Lipa - Don't Start Now";
  }
}

class RockMusic implements MusicGenre {
  public function music() {
    return "Pantera - Cemetery Gates";
  }
}

class HipHopMusic implements MusicGenre {
  public function music() {
    return "Eminem - Love Yourself";
  }
}

class Music {

  private $genre;

  public function __construct(MusicGenre $musicGenre) {
    $this->genre = $musicGenre;
  }

  public function getGenre() {
    return $this->genre->music();
  }

}

$music = new Music(new RockMusic); // we got genre RockMusic
echo $music->getGenre();








?>
