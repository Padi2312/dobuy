<?php

include_once './php/models/ratingmodel.php';

class RatingRepository extends Database {

    function __construct() {
        parent::__construct();
    }

    function getRating($ratingid) {
        $result = $this->mysqli->query("SELECT * FROM rating WHERE id ='$ratingid'")->fetch_assoc();
        return new RatingModel($result);
    }

    function addRating($title, $description, $rating, $user, $productid) {
        $stmt = $this->mysqli->prepare("INSERT INTO rating (title, description, rating, user, product_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('ssisi',$title, $description, $rating, $user, $productid);
        if(!$stmt->execute()) {
            echo "SQL Statement Failed!";
        }
        $stmt->close();
    }

    function updateRating($id, $title, $description, $rating, $user, $productid) {
        $this->mysqli->query("UPDATE rating SET title = '$title', description = '$description', rating = '$rating', user = '$user', product_id = '$productid' WHERE id = '$id'");
    }

    function deleteRating($id) {
        $this->mysqli->query("DELETE FROM rating WHERE id = '$id'");
    }

    function getAllRatings() {
        return $this->mysqli->query("SELECT * FROM rating");
    }

}