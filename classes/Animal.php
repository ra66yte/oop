<?php

class Animal {

    public $type;
    public $paws;
    public $eyes;
    private $ears;

    public function getType() {
        return $this->type;
    }

    public function getPaws() {
        return "У {$this->type} {$this->paws} лапы";
    }

    public function getEyes() {
        return "У {$this->type} {$this->eyes} глаза";
    }

    public function getEars() {
        return "У {$this->type} {$this->ears} уха";
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setPaws($paws) {
        $this->paws = $paws;
    }

    public function setEyes($eyes) {
        $this->eyes = $eyes;
    }

    public function setEars($ears) {
        $this->ears = $ears;
    }

    public function getSkills() {
        return "{$this->type} наверняка что-то умеет..";
    }

}
