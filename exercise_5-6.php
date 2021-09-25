<?php

class User {

    protected $name;
    protected $age;

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

}

class Worker extends User {

    private $salary;

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }

}

class Student extends User {

    private $grant;
    private $course;

    public function setGrant($grant) {
        $this->grant = $grant;
    }

    public function getGrant() {
        return $this->grant;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function getCourse() {
        return $this->course;
    }

}

class Driver extends Worker {

    private $experience;
    private $category;

    public function setExperience($experience) {
        if ($this->checkExperience($experience)) $this->experience = $experience;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setCategory($category) {
        if ($this->checkCategory($category)) $this->category = $category;
    }

    public function getCategory() {
        return $this->category;
    }

    private function checkExperience($exp) {
        if ($exp > 0 and $exp <= 70) {
            return true;
        }
        return false;
    }

    private function checkCategory($category) {
        if (in_array($category, ["A", "B", "C"])) {
            return true;
        }
        return false;
    }

}

$employee_1 = new Worker;
$employee_2 = new Worker;
$driver = new Driver;


$employee_1->setName("Иван");
$employee_1->setAge(25);
$employee_1->setSalary(1000);

$employee_2->setName("Вася");
$employee_2->setAge(26);
$employee_2->setSalary(3000);

$driver->setCategory("M");

echo "Exercise: 5-6";
echo "<br>Сумма зарплат: " . ($employee_1->getSalary() + $employee_2->getSalary());