<?php

class UserRepository
{

    private $database;

    function __construct()
    {
        $this->database = new Database();
    }

    function getAdminUser()
    {
        $this->database->query("SELECT * FROM user WHERE username='admin'");
    }
}
