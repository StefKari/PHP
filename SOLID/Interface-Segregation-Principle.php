<?php

interface MusicGenre {
  function music();
}

class PopMusic implements MusicGenre {
  public function music() {
    echo  "Dua Lipa - Don't Start Now<br><br>";
  }
}

class RockMusic implements MusicGenre {
  public function music() {
    echo "Pantera - Cemetery Gates<br><br>";
  }
}

class HipHopMusic implements MusicGenre {
  public function music() {
    echo "Eminem - Love Yourself";
  }
}

$PopMusic = new PopMusic();
$PopMusic ->music();

$RockMusic = new RockMusic();
$RockMusic->music();

$HipHopMusic = new HipHopMusic();
$HipHopMusic->music();












 ?>
