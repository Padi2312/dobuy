<?php

include_once './php/models/categorymodel.php';

class CategoryRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function getCategory($categoryid)
    {
        $result = $this->mysqli->query("SELECT * FROM category WHERE id ='$categoryid'")->fetch_assoc();
        return new CategoryModel($result);
    }

    function addCategory($name)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO category (name) VALUES (?)");
        $stmt->bind_param('s', $name);
        if (!$stmt->execute()) {
            echo "SQL Statement Failed!";
        }
        $stmt->close();
    }

    function updateCategory($categoryid, $name)
    {
        $this->mysqli->query("UPDATE category SET name = '$name' WHERE id = '$categoryid'");
    }

    function deleteCategory($categoryid)
    {
        $this->mysqli->query("DELETE FROM category WHERE id = '$categoryid'");
    }

    function getAllCategories()
    {
        return $this->mysqli->query("SELECT * FROM category");
    }
}