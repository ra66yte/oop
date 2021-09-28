<?php

abstract class User {

    protected $name;
    protected $age;

    public function __construct($name, $age) {

        $this->name = $name;
        $this->age = $age;

    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }
 
    public function getAge() {
        return $this->age;
    }


}

class Employee extends User {

    
    private $salary;

    public function __construct($name, $age, $salary) {

        parent::__construct($name, $age);
        $this->salary = $salary;

    }

    
    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }
}

class Student extends User {

    private $scholarship;

    public function __construct($name, $age, $scholarship) {

        parent::__construct($name, $age);
        $this->scholarship = $scholarship;

    }

    public function setScholarship($scholarship) {
        $this->scholarship = $scholarship;
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

$student = new Student('Коля', 21, 400);

$student->setName('Иван');
$student->setAge(19);
$student->setScholarship(500);

var_dump($student);