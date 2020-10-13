<?php

interface Output {
    public function load();
}

class SerializedArrayOutput implements Output {
    public function load() {
        return serialization($getSerialization);
    }
}

class JsonOutput implements Output {
    public function load() {
        return json_encode($arrayData);
    }
}

class ArrayOutput implements Output {
    public function load() {
        return $arr;
    }
}

?>
