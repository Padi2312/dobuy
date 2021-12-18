<?php

include_once '../database/database.php';
include_once '../models/ordermodel.php';
include_once '../database/repository/product_repository.php';

class OrderRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns a list of orders from a user based on their username
     */
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

    /**
     * Returns an order based on order id
     */
    function getOrder($orderid)
    {
        $result = $this->mysqli->query("SELECT * FROM order WHERE id ='$orderid'")->fetch_assoc();
        return new OrderModel($result);
    }

    /**
     * Inserts a order to the database with given product id,quantity, price and user
     */
    function addOrder($productid, $quantity, $price, $user)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO ordering (product_id,quantity, price, user,timestamp) VALUES (?, ?, ?, ?,NOW())");
        $stmt->bind_param('iids', $productid, $quantity, $price, $user);
        if (!$stmt->execute()) {
            var_dump("SQL Statement Failed!");
        }
        $stmt->close();
    }

    /**
     * Deletes an order from the database table
     */
    function deleteOrder($orderid)
    {
        $this->mysqli->query("DELETE FROM order WHERE id = '$orderid'");
    }

    /**
     * Returns the orders of  products of a user based on the given username
     */
    function getUserSoldProducts($username)
    {
        $resultMySql = $this->mysqli->query("SELECT ordering.* FROM ordering INNER JOIN product ON product.id = ordering.product_id INNER JOIN user ON user.username = product.provider WHERE product.provider = '$username'");
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

    /**
     * Returns a list with all orders available in database
     */
    function getAllOrders()
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM ordering");

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
}
