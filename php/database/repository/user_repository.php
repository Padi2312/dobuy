<?php

include_once './php/models/usermodel.php';


class UserRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns a user model if user was found  by username 
     * otherwise returns null if no user was found
     */
    function getUserByName($name): UserModel|null
    {
        $name = $this->mysqli->real_escape_string($name);
        $resultMySql = $this->mysqli->query("SELECT * FROM user WHERE username='$name'");
        if ($resultMySql->num_rows == 0) {
            return null;
        }

        $result = $resultMySql->fetch_assoc();
        return new UserModel($result);
    }

    /**
     * Inserts a user into the database with username,password,firstname,
     * lastname and email address
     */
    function insertUser($username, $password, $firstname, $lastname, $email)
    {
        $username = $this->mysqli->real_escape_string($username);
        $password = $this->mysqli->real_escape_string($password);
        $firstname = $this->mysqli->real_escape_string($firstname);
        $lastname = $this->mysqli->real_escape_string($lastname);
        $email = $this->mysqli->real_escape_string($email);

        $stmt = $this->mysqli->prepare("INSERT INTO user (username,password,firstname, lastname, email,role) VALUES (?,?,?,?,?, 2)");
        $stmt->bind_param("sssss", $username, $password, $firstname, $lastname, $email);

        if (!$stmt->execute()) {
            var_dump("FEHLER");
        }

        $stmt->close();
    }

    /**
     * Returns all users from the database
     */
    function getAllUsers()
    {
        return $this->mysqli->query("SELECT * FROM user")->fetch_all();
    }

    public function checkIfUserExists(string $user): bool
    {
        $userlist = $this->mysqli->query("SELECT username FROM user")->fetch_all();
        return array_search($user, $userlist);
    }

    public function checkIfUserMatchesPw(string $user, string $pw): bool
    {
        $pwlist = $this->mysqli->query("SELECT password FROM user WHERE username = $user")->fetch_all();
        return array_search($pw, $pwlist);
    }
}
