<?php
session_start();
class Session
{

    static private $isLoggedInKey = "isLoggedIn";

    public static function setIsLoggedIn($isLoggedIn)
    {
        $_SESSION[self::$isLoggedInKey] = $isLoggedIn;
    }

    public static function isLoggedIn()
    {
        if (isset($_SESSION[self::$isLoggedInKey])) {
            return $_SESSION[self::$isLoggedInKey] == 1;
        } else {
            return false;
        }
    }
}
