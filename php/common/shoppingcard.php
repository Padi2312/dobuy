<!-- Diese Klasse enthält alle Informationen zum Warenkorb eines Benutzers-->
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

    /**
     * Adds a product with the given product id to the shoppingcart
     * of the logged in user. Username is provided about the session from user
     */
    function addToShoppingCard($productId)
    {
        $username = $this->session->getUsername();
        $this->shoppingCardRepo->addProductToShoppingCard($username, $productId);
    }

    /**
     * Gets the shoppingcart of the logged in user
     * Username is taken from the session of the logged in user
     */
    function getShoppingCardByUser()
    {
        $username = $this->session->getUsername();
        return $this->shoppingCardRepo->getUsersShoppingCardProducts($username);
    }

    /**
     * Returns the amount of the products in the shoppingcart 
     * of the current loggedin user
     */
    function getAmountOfShoppingCard()
    {
        $username = $this->session->getUsername();
        return $this->shoppingCardRepo->getAmountOfUsersShoppingCard($username);
    }

    /**
     * Removes a product from the shoppingcart of the loggedin user
     */
    function deleteProductFromShoppingCard($productId)
    {
        $username = Session::getUsername();
        $this->shoppingCardRepo->removeFromShoppingCard($username, $productId);
    }

    /**
     * Buys all the products being in the shoppingcart of the loggedin user
     * It adds the products with the id and username of the loggedin user
     * into the order table + deletes product from shoppingcart if buy succceded
     */
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

    /**
     * Checks if a product is already in the shoppingcart of the current loggedin user
     */
    function isProductInShoppingCard($productId)
    {
        $username = Session::getUsername();
        return $this->shoppingCardRepo->isProductInShoppingCard($username, $productId);
    }
}
