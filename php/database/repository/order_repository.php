<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/dobuy/php/database/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/dobuy/php/models/ordermodel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/dobuy/php/database/repository/product_repository.php';

class OrderRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function getOrdersByUsername($username)
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM ordering WHERE user ='$username'");

        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $orders = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($orders, new OrderModel($item));
            }
            return $orders;
        }
    }

    function getOrder($orderid)
    {
        $result = $this->mysqli->query("SELECT * FROM order WHERE id ='$orderid'")->fetch_assoc();
        return new OrderModel($result);
    }

    function addOrder($productid, $quantity, $price, $user)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO ordering (product_id,quantity, price, user,timestamp) VALUES (?, ?, ?, ?,NOW())");
        $stmt->bind_param('iids', $productid, $quantity, $price, $user);
        if (!$stmt->execute()) {
            echo "SQL Statement Failed!";
        }
        $stmt->close();
    }

    function deleteOrder($orderid)
    {
        $this->mysqli->query("DELETE FROM order WHERE id = '$orderid'");
    }

    function getAllOrders()
    {
        return $this->mysqli->query("SELECT * FROM order");
    }
}
