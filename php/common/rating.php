<!-- Diese Klasse enthält alle Informationen zu den Bewertungen-->
<?php
include_once '../database/repository/rating_repository.php';

class Rating
{
    private $ratingRepo;

    function __construct()
    {
        $this->ratingRepo = new RatingRepository();
    }

    /**
     * Returns a list with all categories to one specific product
     */
    function getRatingsForProduct($productid)
    {
        return $this->ratingRepo->getRatingsByProductId($productid);
    }

    /**
     * Returns Overall Rating for one Product
     */
    function getOverallRatingForProduct($productid)
    {
        return $this->ratingRepo->getRatingForProduct($productid);
    }

    /**
     * Adds a Rating to the Database
     */
    function addRating($description, $rating, $user, $productid)
    {
        return $this->ratingRepo->addRating($description, $rating, $user, $productid);
    }
}
