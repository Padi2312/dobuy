<?php

include_once '../database/database.php';
include_once '../models/ratingmodel.php';

class RatingRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns Rating as RatingModel by id given
     */
    function getRating($ratingid)
    {
        $result = $this->mysqli->query("SELECT * FROM rating WHERE id ='$ratingid'")->fetch_assoc();
        return new RatingModel($result);
    }

    /**
     * Add new Rating to Database
     */
    function addRating($description, $rating, $user, $productid)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO rating (description, rating, user, product_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sisi', $description, $rating, $user, $productid);
        if (!$stmt->execute()) {
            error_log(print_r($this->mysqli->errno, TRUE));
        }
        $stmt->close();
    }

    /**
     * Update one Rating in Database
     */
    function updateRating($id, $description, $rating, $user, $productid)
    {
        $this->mysqli->query("UPDATE rating SET description = '$description', rating = '$rating', user = '$user', product_id = '$productid' WHERE id = '$id'");
    }

    /**
     * Delete one Rating from Database
     */
    function deleteRating($id)
    {
        $this->mysqli->query("DELETE FROM rating WHERE id = '$id'");
    }

    /**
     * Returns all Ratings as RatingModel from Database in an array
     */
    function getAllRatings()
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM rating");
        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $ratings = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($ratings, new RatingModel($item));
            }
            return $ratings;
        }
    }

    /**
     * Return all Ratings as RatingModel to one Product ID
     */
    function getRatingsByProductId($productId)
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM rating WHERE product_id = $productId ORDER BY id DESC");
        if ($resultMySql->num_rows === 0) {
            return array();
        } else {
            $ratings = array();
            $result = $resultMySql->fetch_all(MYSQLI_ASSOC);
            foreach ($result as $item) {
                array_push($ratings, new RatingModel($item));
            }
            return $ratings;
        }
    }

    /**
     * Returns Overall Rating for one Product
     */
    function getRatingForProduct($productid)
    {
        $result = $this->mysqli->query("SELECT AVG(rating) FROM rating WHERE product_id = '$productid'")->fetch_assoc();
        return round(floatval($result["AVG(rating)"]), 1);
    }
}
