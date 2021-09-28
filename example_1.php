<?php

interface iUser {

    public function setName($name);
    public function setAge($age);
    public function getName();
    public function getAge();

}

class Employee implements iUser {

    private $name;
    private $age;
    private $salary;

    public function __construct($name, $age, $salary) {

        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;

    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setSalary($salary) {
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

class Student implements iUser {

    private $name;
    private $age;
    private $scholarship;

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setScholarship($scholarship) {
        $this->scholarship = $scholarship;
    }

    public function getName() {
        return $this->name;
    }
 
    public function getAge() {
        return $this->age;
    }

    public function getScholarship() {
        return $this->scholarship;
    }
}

$employee = new Employee('Вася', 30, 1000);

$employee->setName('Петя');
$employee->setAge(33);
$employee->setSalary(2000);

var_dump($employee);

$student = new Student();

$student->setName('Иван');
$student->setAge(19);
$student->setScholarship(500);

var_dump($student);