<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/database/database.php';

class ShoppingCardRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function getUsersShoppingCard($username)
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM shopping_card INNER JOIN product ON product.id = shopping_card.product_id WHERE user='$username'");
        if ($resultMySql->num_rows == 0) {
            return null;
        }

        $result = $resultMySql->fetch_all();
        return new UserModel($result);
    }

    function addProductToShoppingCard($username, $productid)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO shopping_card (product_id,user) VALUES (?,?)");
        $stmt->bind_param("is", $productid, $username);

        if (!$stmt->execute()) {
            var_dump("FEHLER");
        }

        $stmt->close();
    }
}
