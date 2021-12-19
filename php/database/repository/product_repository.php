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

    /**
     * Returns a single product based on product id
     */
    function getProductById($productid): ProductModel|null
    {
        $result = $this->mysqli->query("SELECT * FROM product WHERE id ='$productid'")->fetch_assoc();
        if (!$result) {
            return null;
        } else {
            return new ProductModel($result);
        }
    }

    /**
     * Inserts a product with all properties for a product
     */
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

    /**
     * Can change the visibility of a product in the shop
     */
    function changeVisibilityOfProduct($id, $visible)
    {
        $this->mysqli->query("UPDATE product SET visible = '$visible' WHERE id = '$id'");
    }

    /**
     * Updates a product row. For updating you have to specifiy all attributes for a product
     */
    function updateProduct($productid, $name, $description, $price, $imagepath, $category, $quantity)
    {
        $catRepo = new CategoryRepository();
        $categoryModel = $catRepo->getCategoryIdByName($category);
        $categoryId = $categoryModel->getID();
        $this->mysqli->query("UPDATE product SET name = '$name', description = '$description', price = '$price', imagepath = '$imagepath', quantity = '$quantity', category_id = '$categoryId' WHERE id = '$productid'");
    }

    /**
     * Deltes a product with the passed product id
     */
    function deleteProduct($productid)
    {
        $this->mysqli->query("DELETE FROM product WHERE id = '$productid'");
    }


    /**
     * Returns all products being in the database
     */
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


    /**
     * Returns all products being inserted by a registrated user 
     * and not visible in shop yet
     */
    function getAllUserOffers()
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

    /**
     * Returns a list with products being visible in the shop
     */
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

    /**
     * Returns the average rating of a product
     */
    function getProductRating($productid)
    {
        $result = $this->mysqli->query("SELECT AVG(rating) FROM rating WHERE product_id = '$productid'")->fetch_field();
        return floor($result);
    }

    /**
     * Returns a specific amount of random products from the database
     * Amount can be specified in function parameter
     */
    function getRandomProducts($amount = 10)
    {
        $resultMySql = $this->mysqli->query("SELECT DISTINCT * FROM product WHERE visible = true ORDER BY RAND() LIMIT $amount");
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
