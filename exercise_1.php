<?php
class Worker {

    public $name;
    public $age;
    public $salary;

}

$employee_1 = new Worker;
$employee_2 = new Worker;

$employee_1->name = "Иван";
$employee_1->age = 25;
$employee_1->salary = 1000;

$employee_2->name = "Вася";
$employee_2->age = 26;
$employee_2->salary = 2000;

echo "Exercise: 1";
echo "<br>Сумма зарплат: " . ($employee_1->salary + $employee_2->salary);
echo "<br>Сумма возрастов: " . ($employee_1->age + $employee_2->age);
echo "<hr>";

