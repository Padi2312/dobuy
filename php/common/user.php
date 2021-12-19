<?php

include_once '../models/usermodel.php';
include_once '../database/repository/user_repository.php';
include_once '../common/session.php';


class User
{

    private $userRepo;

    function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    /**
     * Logs in a user with given username and password
     * If login succeeds function returns true 
     */
    function login($username, $password): bool
    {
        $user = $this->userRepo->getUserByName($username);
        if ($user === null) {
            return false;
        }
        $passwordCorrect = $this->verifyPassword($password, $user->getPassword());
        return $passwordCorrect;
    }

    /**
     * Registrates a user with username,password,firstname, lastname and email
     * It hashes the password for security reasons
     */
    function signup($username, $password, $firstname, $lastname, $email)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $this->userRepo->insertUser($username, $hashedPassword, $firstname, $lastname, $email);
    }

    /**
     * Checks if a user with given username exists
     * If user exists returns true otherwise false
     */
    function existsUser($username): bool
    {
        return $this->userRepo->getUserByName($username) !== null;
    }

    /**
     * Checks a plain password and a hashed password 
     * whether they're equal, if so then return true
     */
    private function verifyPassword($password, $hashedPassword): bool
    {
        return password_verify($password, $hashedPassword);
    }

    /**
     * Returns a list with UserModels of all users in the database
     */
    function getAllUsers()
    {
        return $this->userRepo->getAllUsers();
    }

    /**
     * Returns the current UserModel of the logged in user
     * Takes the username of the current session and look it up in the database
     */
    function getCurrentUserData()
    {
        $username = Session::getUsername();
        return $this->userRepo->getUserByName($username);
    }
}
