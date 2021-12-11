<?php
class Database
{

    private array $config;
    private $mysqli;

    function __construct()
    {
        $this->config = require "database_config.php";
        $this->mysqli = new mysqli($this->config["host"], $this->config["user"], $this->config["password"], $this->config["db"]);
        // Check connection
        if ($this->mysqli === false) {
            die("ERROR: Could not connect. " . $this->mysqli->connect_error);
        }
    }


    function query($sql)
    {
        return $this->mysqli->query($sql)->fetch_assoc();
    }
}
