<?php
include_once 'classes/Animal.php';
include_once 'classes/Cat.php';
include_once 'classes/Dog.php';

$animal = new Animal;
$cat = new Cat('Снежок');
$dog = new Dog('Царевич');

$animal->type = 'Spider';

echo $animal->getType();

// Ошибка, так как private свойство
# animal->ears = 2;

$animal->setEars(2); // нужен сеттер

echo "<br>" . $animal->getEars();

echo "<br>" . $animal->getSkills();

echo "<hr>";

echo $cat->getType(); // определил в конструкторе

$cat->setPaws(4);

echo "<br>" . $cat->getPaws();

echo "<br>" . $cat->getSkills();

echo "<hr>";

echo $dog->getType();

$dog->setEyes(2);
$dog->setEars(1);

echo "<br>" . $dog->getEars();

echo "<br>" . $dog->getEyes();

echo "<br>" . $dog->getSkills();