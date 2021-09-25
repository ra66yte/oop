<?php

class Session {

    public function __construct() {
        session_start();
    }

    public function setSession($name, $value) {

        if ($_SESSION[$name] = $value) return true;

        return false;

    }

    public function getSession($name) {

        if ($this->checkSession($name)) return $_SESSION[$name];

        return false;

    }

    public function deleteSession($name) {
        
        if ($this->checkSession($name)) {
            unset($_SESSION[$name]);
            return true;
        }

        return false;

    }

    public function checkSession($name) {

        if (isset($_SESSION[$name])) return true;

        return false;

    }
}

$session = new Session;

$session->setSession("test", 1);

echo $session->getSession("test");

$session->setSession("test", 2);

echo $session->getSession("test");

$session->deleteSession("test");

var_dump($session->getSession("test"));
