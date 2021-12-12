<?php

include_once './php/models/usermodel.php';


class UserRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function getUserByName($name): UserModel
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM user WHERE username='$name'");
        $result = $resultMySql->fetch_assoc();
        return new UserModel($result);
    }

    function insertUser($username, $password, $firstname, $lastname, $email)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO user (username,password,firstname, lastname, email,role) VALUES (?,?,?,?,?, 2)");
        $stmt->bind_param("sssss", $username, $password, $firstname, $lastname, $email);

        if (!$stmt->execute()) {
            var_dump("FEHLER");
        }

        $stmt->close();
    }

    function getAllUsers()
    {
        return $this->mysqli->query("SELECT * FROM user");
    }
}
