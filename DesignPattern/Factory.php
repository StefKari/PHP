<?php

interface Factory {
    public function getMovie();
}

interface MovieInfo {
    public function getInfo();
}

class FirstFactory implements Factory {
    public function getMovie() {
        return new SenkeNadBalkanom();
    }
}

class SecendFactory implements Factory {
    public function getMovie() {
        return new Montevideo();
    }
}

class SenkeNadBalkanom implements MovieInfo {
    public function getInfo() {
        return 'Senke nad Balkanom!';
    }
}

class Montevideo implements MovieInfo {
    public function getInfo() {
        return 'Montevideo Bog te video!';
    }
}

$firstFactory = new FirstFactory();
$secendFactory = new SecendFactory();

$firstFactory->getMovie();
$secendFactory->getMovie();

?>
