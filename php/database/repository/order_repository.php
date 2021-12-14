<?php

include_once './php/models/ordermodel.php';

class OrderRepository extends Database {

    function __construct() 
    {
        parent::__construct();
    }

    function getOrder($orderid)
    {
        $result = $this->mysqli->query("SELECT * FROM order WHERE id ='$orderid'")->fetch_assoc();
        return new OrderModel($result);
    }

    function addOrder($productid, $quantity, $price, $user)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO order (product_id, timestamp, quantity, price, user) VALUES (?, NOW(), ?, ?, ?)");
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

