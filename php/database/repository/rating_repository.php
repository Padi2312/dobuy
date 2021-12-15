<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/dobuy/php/database/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/dobuy/php/models/ratingmodel.php';

class RatingRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function getRating($ratingid)
    {
        $result = $this->mysqli->query("SELECT * FROM rating WHERE id ='$ratingid'")->fetch_assoc();
        return new RatingModel($result);
    }

    function addRating($title, $description, $rating, $user, $productid)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO rating (title, description, rating, user, product_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('ssisi', $title, $description, $rating, $user, $productid);
        if (!$stmt->execute()) {
            error_log(print_r($this->mysqli->errno, TRUE));
        }
        $stmt->close();
    }

    function updateRating($id, $title, $description, $rating, $user, $productid)
    {
        $this->mysqli->query("UPDATE rating SET title = '$title', description = '$description', rating = '$rating', user = '$user', product_id = '$productid' WHERE id = '$id'");
    }

    function deleteRating($id)
    {
        $this->mysqli->query("DELETE FROM rating WHERE id = '$id'");
    }

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

    function getRatingsByProductId($productId)
    {
        $resultMySql = $this->mysqli->query("SELECT * FROM rating WHERE product_id = $productId");
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
}
