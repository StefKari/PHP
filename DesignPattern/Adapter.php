<?php

const BR = "<br>";

class Movie {

    private $title;
    private $stageManager;

    function __construct($title,$stageManager) {
        $this->title = $title;
        $this->stageManager = $stageManager;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getStageManager() {
        return $this->stageManager;
    }
}

class ProductionHouse  {

    private $info;
    private $studioFilm;

    function __construct(Movie $info) {
        $this->info = $info;
    }

    public function  getMoviesInfo() {
        return $this->info->getTitle() . BR . $this->info->getStageManager() . BR;
    }
    public function  setStudioFilm($studioFilm) {

        $this->studioFilm = $studioFilm;
    }
    public function  getStudioFilm() {
        return $this->studioFilm;

    }
}

$movie = new Movie('Senke na Balkanom','Dragan Bjelogrlic');
$productionFIlm = new ProductionHouse($movie);
$productionFIlm->setStudioFilm('StudioFilm');
echo $productionFIlm->getMoviesInfo() . 'by ' . $productionFIlm->getStudioFilm();

?>
