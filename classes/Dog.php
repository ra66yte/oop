<?php

class Dog extends Animal {

    public $name;

    public function __construct($name) {
        $this->name = $name;
        $this->type = 'Dog';
    }

    public function getSkills() {
        return "{$this->type} <b>{$this->name}</b> спит только когда все спокойно и можно отдохнуть, лает и кушает все что дает хозяин. Он хороший ))";
    }

}
