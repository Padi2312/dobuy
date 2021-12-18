<?php

include_once '../database/database.php';
include_once '../models/productmodel.php';
include_once '../database/repository/category_repository.php';

class ProductRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function getProductById($productid): ProductModel|null
    {
        $result = $this->mysqli->query("SELECT * FROM product WHERE id ='$productid'")->fetch_assoc();
        if (!$result) {
            return null;
        } else {
            return new ProductModel($result);
        }
    }

    function addProduct($name, $description, $price, $quantity, $imagepath, $provider, $category, $visible = true)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO product (name, description, price, quantity, imagepath, provider, category_id,visible) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param('ssdissdi', $name, $description, $price, $quantity, $imagepath, $provider, $category, $visible);
        if (!$stmt->execute()) {
            error_log(print_r($this->mysqli->errno, TRUE));
            return null;
        }
        $insertedId = $this->mysqli->insert_id;
        $stmt->close();
        return $insertedId;
    }

    function changeVisibilityOfProduct($id, $visible)
    {
        $this->mysqli->query("UPDATE product SET visible = '$visible' WHERE id = '$id'");
    }

    function updateProduct($productid, $name, $description, $price, $imagepath, $category, $quantity)
    {
        $catRepo = new CategoryRepository();
        $categoryModel = $catRepo->getCategoryIdByName($category);
        $categoryId = $categoryModel->getID();
        $this->mysqli->query("UPDATE product SET name = '$name', description = '$description', price = '$price', imagepath = '$imagepath', quantity = '$quantity', category_id = '$categoryId' WHERE id = '$productid'");
    }

    function deleteProduct($productid)
    {
        $this->mysqli->query("DELETE FROM product WHERE id = '$productid'");
    }

    function getAllProducts(): array
    {

        $resultMySql = $this->mysqli->query("SELECT * FROM product");
        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $products = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($products, new ProductModel($item));
            }
            return $products;
        };
    }

    function getAllUserProducts()
    {
        $resultMySql = $this->mysqli->query("SELECT product.* FROM product INNER JOIN user ON user.username = product.provider WHERE user.role = 2 AND product.visible =false");
        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $products = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($products, new ProductModel($item));
            }
            return $products;
        };
    }

    function getAllVisibleProducts(): array
    {

        $resultMySql = $this->mysqli->query("SELECT * FROM product  WHERE visible = true");
        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $products = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($products, new ProductModel($item));
            }
            return $products;
        };
    }


    function getProductRating($productid)
    {
        $result = $this->mysqli->query("SELECT AVG(rating) FROM rating WHERE product_id = '$productid'")->fetch_field();
        return floor($result);
    }

    function getProducts($amount)
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM product LIMIT $amount");
        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $products = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($products, new ProductModel($item));
            }
            return $products;
        };
    }

    function getRandomProducts($amount = 10)
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM product WHERE visible = true ORDER BY RAND() LIMIT $amount");
        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $products = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($products, new ProductModel($item));
            }
            return $products;
        };
    }
}
