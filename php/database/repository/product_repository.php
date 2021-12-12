<?php

include_once './php/models/productmodel.php';

class ProductRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function getProduct($productid)
    {
        $result = $this->mysqli->query("SELECT * FROM product WHERE id ='$productid'")->fetch_assoc();
        return new ProductModel($result);
    }

    function addProduct($name, $description, $price, $quantity, $imagepath, $provider, $category)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO product (name, description, price, quantity, imagepath, provider, category_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssdissi', $name, $description, $price, $quantity, $imagepath, $provider, $category);
        if (!$stmt->execute()) {
            echo "SQL Statement Failed!";
        }
        $stmt->close();
    }

    function updateProduct($productid, $name, $description, $price, $imagepath, $quantity, $provider, $category)
    {
        $this->mysqli->query("UPDATE product SET name = '$name', description = '$description', price = '$price', imagepath = '$imagepath', quantity = '$quantity', provider = '$provider', category_id = '$category' WHERE id = '$productid'");
    }

    function deleteProduct($productid)
    {
        $this->mysqli->query("DELETE FROM product WHERE id = '$productid'");
    }

    function getAllProducts()
    {
        return $this->mysqli->query("SELECT * FROM product");
    }
}
