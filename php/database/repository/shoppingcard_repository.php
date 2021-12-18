<?php

include_once '../database/database.php';
include_once '../models/productmodel.php';

class ShoppingCardRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns a list of products being in the shoppingcart based on the given username
     */
    function getUsersShoppingCardProducts($username)
    {
        $resultMySql = $this->mysqli->query("SELECT product.* FROM shopping_card INNER JOIN product ON product.id = shopping_card.product_id WHERE user='$username'");

        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $productsOfShoppingBasket = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($productsOfShoppingBasket, new ProductModel($item));
            }
            return $productsOfShoppingBasket;
        }
    }

    /**
     * Removes a product from the users shoppingcart
     */
    function removeFromShoppingCard($username, $productid)
    {
        $this->mysqli->query("DELETE FROM shopping_card WHERE user='$username' AND product_id=$productid");
    }

    /**
     * Adds a product with product id to the users shoppingcart
     */
    function addProductToShoppingCard($username, $productid)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO shopping_card (product_id,user) VALUES (?,?)");
        $stmt->bind_param("is", $productid, $username);

        if (!$stmt->execute()) {
            return false;
        }

        $stmt->close();
        return true;
    }

    /**
     * Returns the amount of products being in the shoppingcart of the given user
     */
    function getAmountOfUsersShoppingCard($username): int
    {
        $resultMySql = $this->mysqli->query("SELECT COUNT(*) FROM shopping_card WHERE user='$username'");
        if ($resultMySql && $resultMySql->num_rows > 0) {
            $row = $resultMySql->fetch_row();
            return $row[0];
        } else {
            return 0;
        }
    }

    /**
     * Checks whether a prodcut is already in the shoppingcart or not
     * If product is in shoppingcard return true otherwise false
     */
    function isProductInShoppingCard($username, $productId): bool
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM shopping_card WHERE user='$username' AND product_id='$productId'");
        return $resultMySql && $resultMySql->num_rows > 0;
    }
}
