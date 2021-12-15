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


    function login($username, $password): bool
    {
        $user = $this->userRepo->getUserByName($username);
        if ($user === null) {
            return false;
        }
        $passwordCorrect = $this->verifyPassword($password, $user->getPassword());
        return $passwordCorrect;
    }


    function signup($username, $password, $firstname, $lastname, $email)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $this->userRepo->insertUser($username, $hashedPassword, $firstname, $lastname, $email);
    }

    function existsUser($username): bool
    {
        return $this->userRepo->getUserByName($username) !== null;
    }

    private function verifyPassword($password, $hashedPassword): bool
    {
        return password_verify($password, $hashedPassword);
    }
}
