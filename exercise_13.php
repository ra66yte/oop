<?php
include_once 'exercise_12.php';

class Log {

    private $dbHelper;

    public function __construct() {

        $this->dbHelper = new Db('localhost', 'root', '', 'base');

    }


    public function saveLog($log) {
        return $this->dbHelper->insertRows(['where' => 'log', 'columns' => array('title' => $log . ' №' . rand(1, 2000))]);
    }

    public function getLogs($count) {
        return $this->dbHelper->getRows(['where' => 'log', 'limit' => $count]);
    }

    public function truncateLogs() {
        return $this->dbHelper->truncateTables(['log']);
    }

}

$log = new Log;

var_dump($log->saveLog("Пример лога"));

// var_dump($log->getLogs(1));

// var_dump($log->truncateLogs());
