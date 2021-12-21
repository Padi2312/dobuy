<?php

include_once '../database/database.php';
include_once '../models/categorymodel.php';


class CategoryRepository extends Database
{
    /**
     * Handles all actions for the database in category table Context
     */
    function __construct()
    {
        parent::__construct();
    }

    function getCategoryById($categoryid)
    {
        $result = $this->mysqli->query("SELECT * FROM category WHERE id ='$categoryid'")->fetch_assoc();
        return new CategoryModel($result);
    }

    /**
     * Returns the Category as new Instance of CategoryModel
     */
    function getCategoryByName($name)
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM category WHERE name ='$name'");
        if ($resultMySql->num_rows == 0) {
            return null;
        }

        $result = $resultMySql->fetch_assoc();
        return new CategoryModel($result);
    }

    /**
     * Adds new Category to Database Table, Index (ID) is auto incremented
     */
    function addCategory($name)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO category (name) VALUES (?)");
        $stmt->bind_param('s', $name);
        if (!$stmt->execute()) {
            echo "SQL Statement Failed!";
        }
        $stmt->close();
    }

    /**
     * Updates Categoryname by unique id
     */
    function updateCategory($categoryid, $name)
    {
        $this->mysqli->query("UPDATE category SET name = '$name' WHERE id = '$categoryid'");
    }

    /**
     * Deletes Category by unique id
     */
    function deleteCategory($categoryid)
    {
        $this->mysqli->query("DELETE FROM category WHERE id = '$categoryid'");
    }

    /**
     * Returns all Categories as CategoryModels in an array
     */
    function getAllCategories()
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM category");

        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $categories = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($categories, new CategoryModel($item));
            }
            return $categories;
        }
    }
}
