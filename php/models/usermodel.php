<?php
class UserModel
{
    private $username;
    private $firstname;
    private $lastname;
    private $password;
    private $email;
    private $role;

    function __construct($userRow)
    {
        $this->username = $userRow["username"];
        $this->firstname = $userRow["firstname"];
        $this->lastname = $userRow["lastname"];
        $this->email = $userRow["email"];
        $this->role = $userRow["role"];
        $this->password = $userRow["password"];
    }

    function getUsername()
    {
        return $this->username;
    }

    function getFullname()
    {
        return $this->firstname . " " . $this->lastname;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getRole()
    {
        return $this->role;
    }

    function getPassword()
    {
        return $this->password;
    }
}
