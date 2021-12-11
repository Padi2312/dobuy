<?php

include_once './php/models/usermodel.php';
include_once './php/database/repository/user_repository.php';

class User
{

    private $userRepo;

    function __construct()
    {
        $this->userRepo = new UserRepository();
    }


    function login($username,$password)
    {
        $user = $this->userRepo->getUserByName($username);
        
    }

    function signup($username, $password, $firstname, $lastname, $email)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $this->userRepo->insertUser($username, $hashedPassword, $firstname, $lastname, $email);
    }
}
