<!-- Diese Klasse enthält alle Informationen und Daten zu den Produkten-->
<?php

include_once '../database/repository/product_repository.php';
include_once 'session.php';
include_once 'filehandler.php';
include_once '../models/productmodel.php';

class Product
{

    private $productRepo;
    private $fileHandler;

    function __construct()
    {
        $this->productRepo = new ProductRepository();
        $this->fileHandler = new FileHandler();
    }

    /**
     * Adds a product with name,description, price, category and quantity to the shop
     * Either it includes an image path or not
     * Functions is for adding products directly from an admin
     */
    function addProduct($name, $description, $price,  $category, $quantity = 1)
    {
        $session = new Session();
        $uploadResult = $this->fileHandler->uploadImage();
        if ($uploadResult !== null) {
            return $this->productRepo->addProduct($name, $description, $price, $quantity, $uploadResult, $session->getUsername(), $category);
        } else {
            return $this->productRepo->addProduct($name, $description, $price, $quantity, "", $session->getUsername(), $category);
        }
    }

    /**
     * Adds a product with name,description, price, category and quantity to the shop
     * Either it includes an image path or not
     * By default the added product is invisible in the shop till the admin accepted it
     */
    function addProductOfUser($name, $description, $price,  $category, $quantity = 1)
    {
        $session = new Session();
        $uploadResult = $this->fileHandler->uploadImage();
        if ($uploadResult !== null) {
            return $this->productRepo->addProduct($name, $description, $price, $quantity, $uploadResult, $session->getUsername(), $category, false);
        } else {
            return $this->productRepo->addProduct($name, $description, $price, $quantity, "", $session->getUsername(), $category, false);
        }
    }

    /**
     * Make a product with the given id visible in the shop
     */
    function makeProductVisible($id)
    {
        $this->productRepo->changeVisibilityOfProduct($id, true);
    }

    /**
     * Returns a product based on the given product id
     */
    function getProductById($productId)
    {
        return $this->productRepo->getProductById($productId);
    }

    /**
     * Returns a list with all products of the shop
     * (It also returns products not being visible)
     */
    function getAllProducts(): array
    {
        return $this->productRepo->getAllProducts();
    }

    /**
     * Returns a list with all visible products
     */
    function getAllVisibleProducts()
    {
        return $this->productRepo->getAllVisibleProducts();
    }

    /**
     * Returns a list with all product offers from users
     * Products are not visible 
     */
    function getAllUserOffers()
    {
        return $this->productRepo->getAllUserOffers();
    }

    /**
     * Deletes a product with the given product id
     */
    function deleteProduct($id)
    {
        $this->productRepo->deleteProduct($id);
    }

    /**
     * Updates a product with the given product id
     */
    function updateProduct($productId, $name, $description, $price, $imagePath, $category, $quantity)
    {
        $product = $this->productRepo->getProductById($productId);
        if ($imagePath === "") {
            $imagePath = $product->getImagePath();
        }
        $this->productRepo->updateProduct($productId, $name, $description, $price, $imagePath,  $category, $quantity);
    }

    /**
     * Returns a list of random products
     * Amount of products can be set by function parameter
     */
    function getRandomProducts($amount): array
    {
        return $this->productRepo->getRandomProducts($amount);
    }

    /**
     * Filtern und sortieren der Produkte, sowieso Filtern durch Produktsuche, Return Value sind die Ergebnis Spalten
     */ 
    function filterProducts($sortparam, $available, $category, $pricerangebool, $pricerange, $keyword) {

        if ($sortparam === 1) {
            $sort = " ORDER BY price";
        } elseif ($sortparam === 2) {
            $sort = " ORDER BY name";
        } else {
            $sort = "";
        }

        $where = null;
        $start = null;
        $filterAvailable = null;
        $filterCategory = null;
        $filterPrice = null;
        $filterKeyword = null;

        if ($available === true || $category !== null || $pricerangebool === true || $keyword !== null) {
            $where = " WHERE";
        }

        if ($available === true) {
            $start = " product.quantity <> 0";
            $filterAvailable = -1;
        } elseif ($category !== null) {
            $start = " category_id = $category";
            $filterCategory = -1;
        } elseif ($pricerangebool === true) {
            $start = " product.price BETWEEN '$pricerange[0]' AND '$pricerange[1]'";
            $filterPrice = -1;
        } elseif ($keyword !== null) {
            $start = " product.name LIKE '%$keyword%'";
            $filterKeyword = -1;
        }

        if ($filterAvailable === -1) {
            $filterAvailable = null;
        } elseif ($available === true) {
            $filterAvailable = " AND product.quantity <> 0";
        } else {
            $filterAvailable = null;
        }
        if ($filterCategory === -1) {
            $filterCategory = null;
        } elseif ($category !== null) {
            $filterCategory = " AND product.category_id = $category";
        } else {
            $filterCategory = null;
        }
        if ($filterPrice === -1) {
            $filterPrice = null;
        } elseif($pricerangebool === true) {
            $filterPrice = " AND product.price BETWEEN '$pricerange[0]' AND '$pricerange[1]'";
        } else {
            $filterPrice = null;
        }
        if ($filterKeyword === -1) {
            $filterKeyword = null;
        } elseif($keyword !== null) {
            $filterKeyword = " AND product.name LIKE '%$keyword%'";
        } else {
            $filterKeyword = null;
        }

        if ($where === null) {
            $where = '';
        }
        if ($start === null) {
            $start = '';
        }
        if ($filterAvailable === null) {
            $filterAvailable = '';
        }
        if ($filterCategory === null) {
            $filterCategory = '';
        }
        if ($filterPrice === null) {
            $filterPrice = '';
        }
        if ($filterKeyword === null) {
            $filterKeyword = '';
        }
        
        $base = "SELECT * FROM product";
        $statement = sprintf("%s %s %s %s %s %s %s %s", $base, $where, $start, $filterAvailable, $filterCategory, $filterKeyword, $filterPrice, $sort);
        
        $resultMySql = $this->productRepo->query($statement);
        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $products = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($products, new ProductModel($item));
            }
            return $products;
        }
    } 

}
