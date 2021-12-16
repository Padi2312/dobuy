<?php

include_once '../database/database.php';

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
            return false;
        }

        $stmt->close();
        return true;
    }

    function getAmountOfUsersShoppingCard($username): int
    {
        $resultMySql = $this->mysqli->query("SELECT COUNT(*) FROM shopping_card WHERE user='$username'");
        $row = $resultMySql->fetch_row();
        return $row[0];
    }
}
