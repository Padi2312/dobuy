<?php

include_once './php/models/usermodel.php';
include_once './php/database/repository/user_repository.php';

class User
{

    private $userRepo;
    private $session;

    function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->session = new Session();
    }


    function login($username, $password): bool
    {
        $user = $this->userRepo->getUserByName($username);
        $passwordCorrect = $this->verifyPassword($password, $user->getPassword());
        $this->session->setIsLoggedIn($passwordCorrect);
        return $passwordCorrect;
    }


    function signup($username, $password, $firstname, $lastname, $email)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $this->userRepo->insertUser($username, $hashedPassword, $firstname, $lastname, $email);
    }

    private function verifyPassword($password, $hashedPassword): bool
    {
        return password_verify($password, $hashedPassword);
    }
}
