<?php

class Cat extends Animal {

    public $name;

    public function __construct($name) {
        $this->name = $name;
        $this->type = 'Cat';
    }

    public function getSkills() {
        return "{$this->type} <b>{$this->name}</b> спит целыми днями, мяукает и кушает только самый вкусный корм.";
    }

}
