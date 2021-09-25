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

        if ($this->checkSession($name)) return htmlspecialchars($_SESSION[$name]);

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

class Flash {

    private $sessionHelper;

    public function __construct() {
        $this->sessionHelper = new Session;
    }

    public function setMessage($name, $message) {

        $this->sessionHelper->setSession($name, $message);

    }

    public function getMessage($name) {

        if ($this->sessionHelper->checkSession($name)) return $this->sessionHelper->getSession($name);

        return false;

    }

}

$flash = new Flash;

$flash->setMessage("message", "Hello, world!");

echo $flash->getMessage("message");
