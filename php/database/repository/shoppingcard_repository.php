<?php

include_once '../database/database.php';
include_once '../models/productmodel.php';

class ShoppingCardRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

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

    function removeFromShoppingCard($username, $productid)
    {
        $this->mysqli->query("DELETE FROM shopping_card WHERE user='$username' AND product_id=$productid");
    }

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
}
