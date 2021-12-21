<!-- Diese Klasse enthält alle Informationen zu der Sitzung in der, der Benutzer sich befindet-->
<?php
session_start();
class Session
{

    static private $isLoggedInKey = "isLoggedIn";
    static private $usernameKey = "username";


    /**
     * Sets the variable "isLoggedIn" in the php session
     * to the value of the passed parameter
     */
    public static function setIsLoggedIn($isLoggedIn)
    {
        $_SESSION[self::$isLoggedInKey] = $isLoggedIn;
    }

    /**
     * Returns the value of the session variable "isLoggedIn"
     * Either returns true if user is loggedin otherwise false
     */
    public static function isLoggedIn()
    {
        if (isset($_SESSION[self::$isLoggedInKey])) {
            return $_SESSION[self::$isLoggedInKey] == 1;
        } else {
            return false;
        }
    }

    /**
     * Sets the variable "username" in the php session
     * to the value of the passed parameter
     */
    public static function setUsername($username)
    {
        $_SESSION[self::$usernameKey] = $username;
    }

    /**
     * Returns the value of the session variable "username"
     * Either returns the username if a user is logged in 
     * or returns null if no one is logged in
     */
    public static function getUsername()
    {
        if (isset($_SESSION[self::$usernameKey])) {
            return $_SESSION[self::$usernameKey];
        } else {
            return null;
        }
    }

    /**
     * Returns true if the saved username
     * is equal to "admin"
     */
    public static function isAdmin(): bool
    {
        if ($_SESSION[self::$usernameKey] == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}
