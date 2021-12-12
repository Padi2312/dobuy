<?php
class Session
{

    private $isLoggedInKey = "isLoggedIn";

    function setIsLoggedIn($isLoggedIn)
    {
        $_SESSION[$this->isLoggedInKey] = $isLoggedIn;
    }

    function isLoggedIn()
    {
        if (isset($_SESSION[$this->isLoggedInKey])) {
            return $_SESSION[$this->isLoggedInKey] == 1;
        } else {
            return false;
        }
    }
}
