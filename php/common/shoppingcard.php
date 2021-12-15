<?php

include_once 'session.php';
include '../database/repository/shoppingcard_repository.php';

class ShoppingCard
{

    private $session;
    private $shoppingCardRepo;

    function __construct()
    {
        $this->session = new Session();
        $this->shoppingCardRepo = new ShoppingCardRepository();
    }

    function addToShoppingCard($productId)
    {
        $username = $this->session->getUsername();
        $this->shoppingCardRepo->addProductToShoppingCard($username, $productId);
    }

    function getAmountOfShoppingCard()
    {
        $username = $this->session->getUsername();
        return $this->shoppingCardRepo->getAmountOfUsersShoppingCard($username);
    }
}
