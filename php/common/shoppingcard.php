<?php

include_once 'session.php';
include_once '../database/repository/shoppingcard_repository.php';
include_once 'ordering.php';

class ShoppingCard
{

    private $session;
    private $shoppingCardRepo;
    private $ordering;

    function __construct()
    {
        $this->ordering = new Ordering();
        $this->session = new Session();
        $this->shoppingCardRepo = new ShoppingCardRepository();
    }

    function addToShoppingCard($productId)
    {
        $username = $this->session->getUsername();
        $this->shoppingCardRepo->addProductToShoppingCard($username, $productId);
    }

    function getShoppingCardByUser()
    {
        $username = $this->session->getUsername();
        return $this->shoppingCardRepo->getUsersShoppingCardProducts($username);
    }

    function getAmountOfShoppingCard()
    {
        $username = $this->session->getUsername();
        return $this->shoppingCardRepo->getAmountOfUsersShoppingCard($username);
    }

    function deleteProductFromShoppingCard($productId)
    {
        $username = Session::getUsername();
        $this->shoppingCardRepo->removeFromShoppingCard($username, $productId);
    }

    function buyProductsFromShoppingCard()
    {
        $username = $this->session->getUsername();
        if ($this->getAmountOfShoppingCard() > 0) {
            $shoppingCardList = $this->getShoppingCardByUser();
            foreach ($shoppingCardList as $item) {
                $productId = $item->getID();
                $this->ordering->addOrderForUser($username, $productId);
                $this->deleteProductFromShoppingCard($productId);
            }
        }
    }

    function isProductInShoppingCard($productId)
    {
        $username = Session::getUsername();
        return $this->shoppingCardRepo->isProductInShoppingCard($username, $productId);
    }
}
