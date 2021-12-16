<?php
session_start();
class Session
{

    static private $isLoggedInKey = "isLoggedIn";
    static private $usernameKey = "username";



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

    public static function setUsername($username)
    {
        $_SESSION[self::$usernameKey] = $username;
    }

    public static function getUsername()
    {
        if (isset($_SESSION[self::$usernameKey])) {
            return $_SESSION[self::$usernameKey];
        } else {
            return null;
        }
    }

    public static function isAdmin(): bool
    {
        if ($_SESSION[self::$usernameKey] == 'admin'){
            return true;
        } else {
            return false;
        }
    }
}
