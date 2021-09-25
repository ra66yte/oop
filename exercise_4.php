<?php

class Worker {

    private $name;
    private $age;
    private $salary;

    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getSalary() {
        return $this->salary;
    }

}

$employee = new Worker("Дима", 25, 1000);

echo "Exercise: 4";
echo "<br>Произведение возраста и зарплаты: " . ($employee->getAge() * $employee->getSalary());
