<?php

class Cookie {

    private $name;
    private $value;
    private $list;
    public $time = 86400;

    public function setCookie($name, $value) {
        $this->name = $name;
        $this->value = $value;

        if (setcookie($this->name, $this->value, (time() + $this->time))) {
            return true;
        }
        return false;
    }

    public function getCookie($name) {
        if (isset($_COOKIE[$name])) {

            if (is_array($_COOKIE[$name]) and $_COOKIE[$name]) {
                $this->list = '';
                foreach ($_COOKIE[$name] as $key => $value) {
                    $this->list .= htmlspecialchars($name . "[" . $key . "] - " . $value) . "\n";
                }
                return $this->list;
            }
            return htmlspecialchars($_COOKIE[$name]);
        }
        return false;
    }

    public function deleteCookie($name) {

        if (isset($_COOKIE[$name])) {
            if (is_array($_COOKIE[$name]) and $_COOKIE[$name]) {
                foreach ($_COOKIE[$name] as $key => $value) {
                    setcookie($name . "[" . $key . "]", "", time() - 3600);
                }
            }
            
            if (setcookie($name, "", time() - 3600)) {
                return true;
            }
        }
        return false;
    }

}

$cookie = new Cookie;

$cookie->setCookie("user", "test"); // Есть вопросы
$cookie->setCookie("user[1]", "rabbyte");
$cookie->setCookie("user[2]", "vasya");

// $cookie->deleteCookie("user");

echo $cookie->getCookie("user");
