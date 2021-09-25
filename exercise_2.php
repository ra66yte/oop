<?php

class Worker {

    private $name;
    private $age;
    private $salary;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }

}

$employee_1 = new Worker;
$employee_2 = new Worker;

$employee_1->setName("Иван");
$employee_1->setAge(25);
$employee_1->setSalary(1000);

$employee_2->setName("Вася");
$employee_2->setAge(26);
$employee_2->setSalary(2000);

echo "Exercise: 2";
echo "<br>Сумма зарплат: " . ($employee_1->getSalary() + $employee_2->getSalary());
echo "<br>Сумма возрастов: " . ($employee_1->getAge() + $employee_2->getAge());
echo "<hr>";