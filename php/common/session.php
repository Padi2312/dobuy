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
        return $_SESSION[$this->isLoggedInKey] == 1;
    }
}
