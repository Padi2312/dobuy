<?php

/**
 * Database model for User Table
 * Provides getter for all table columns
 */
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

    /**
     * Returns Username
     */
    function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns Users Fullname
     */
    function getFullname()
    {
        return $this->firstname . " " . $this->lastname;
    }

    /**
     * Returns User Email
     */
    function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns User Role
     */
    function getRole()
    {
        return $this->role;
    }

    /**
     * Returns User Password
     */
    function getPassword()
    {
        return $this->password;
    }
}
