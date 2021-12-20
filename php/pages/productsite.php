<!-- Diese Datei zeigt die Produktseite der einzelnen Produkte an mit den Bewertungen für das Produkt -->
<?php
include_once "../common/session.php";
include_once "../common/product.php";
include_once "../common/category.php";
include_once "../common/shoppingcard.php";
include_once "../common/rating.php";
include_once "../forms/addrating.php";
$productId = $_GET["id"];

$productHandler = new Product();
$category = new Category();
$session = new Session();
$ratingRepo = new Rating();
$product = $productHandler->getProductById($productId);
if ($product === null) {
    header("Location: notfound.php");
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include "../templates/head.php";
    ?>
    <link rel="stylesheet" href="../../css/productsite.css">
</head>

<body>

    <?php include "../templates/header.php"; ?>
    <main>
        <p>
        </p>
        <div class="producttitel">
            <h1>
                <?php echo $product->getName(); ?>
            </h1>
        </div>

        <div id="product" class="grid-master container">
            <?php
            if ($product->getImagePath() !== "") {
                $imagePath = $product->getImagePath();
                echo "<div class='row'>
                    <div class='col'>
                    </div>
                    <div class='col-md-12'>
                        <img id='productpicture' src='$imagePath' title='Placeholder' alt='Placeholder' class='mx-auto d-block'>
                    </div>
                    <div class='col'>
                    </div>
                </div>";
            }
            ?>
            <div class="row">
                <div class="col">
                    <p id="productdescription">
                        <?php echo $product->getDescription(); ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p id="rating">Rating: <?php echo $ratingRepo->getOverallRatingForProduct($_GET['id']) ?>/5</p>
                </div>
                <div class="col">
                    <p id="retailer">
                        <?php
                        if ($product->getProvider() === "admin") {
                            echo  "<b>Von: <span style='color:#FFE600;'>DO</span>BUY!</b>";
                        } else {
                            echo "Händler: " . $product->getProvider();
                        }
                        ?>
                    </p>
                </div>
                <div class="col">
                    <div>
                        <p id="price"><?php echo $product->getPrice(); ?>€</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <?php
                $shoppingCard = new ShoppingCard();
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $action = "./shoppingcardaction.php?id=$id";
                } else {
                    $action = "./notfound.php";
                }

                if ($session->isLoggedIn() && !$shoppingCard->isProductInShoppingCard($id) && $product->getQuantity() > 0) {
                    echo "<form action='$action' method='post'>
                    <div class='shoppingcart-buttonline'>
                        <button type='submit' id='cartbutton'><span id='buttontext'>Zum Warenkorb hinzufügen</span></button>
                    </div>
                    </form>";
                }

                if ($session->isLoggedIn() && $shoppingCard->isProductInShoppingCard($id)) {
                    echo "<div class='alert alert-info text-center' role='alert'>
                                    Bereits im Warenkorb!
                                </div>";
                }
                ?>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <p class="h6 text-center">
                        <?php
                        $quantity = $product->getQuantity();
                        if ($quantity > 0) {
                            echo "Noch $quantity Stück auf Lager.";
                        } else {
                            echo "<div class='alert alert-warning text-center' role='alert'>
                                    Ausverkauft!
                                </div>";
                        }
                        ?>

                    </p>
                </div>
            </div>

        </div>

        <hr class="seperator" />

        <div id="rating-infobox">
            <span class="h4">Geben Sie eine Bewertung zum Produkt ab</span>
        </div>
        <div class="rating-form container">
            <form method="get" action="productsiteaction.php?id=<?php echo $productId; ?>">
                <div class="comment-wrapper container">
                    <?php
                    if (isset($_GET["error"]) && $_GET["error"] === "notloggedin" && !Session::isLoggedIn()) {
                        echo "<div class='alert alert-info text-center' role='alert'>
                                    Sie müssen angemeldet sein, um eine Bewertung zu einem Produkt abzugeben.
                                </div>";
                    }
                    ?>

                    <div class="row">
                        <div class="col">
                            <label class="h6" for="comment">Schreibe einen Kommentar</label><br>
                            <textarea id="comment" name="comment" class="bar"></textarea>
                        </div>
                    </div>
                </div>
                <div class="star-rating container">
                    <div class="row">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                        ?>
                            <div class="starrating col">
                                <input type="radio" id="<?php echo "option" . $i; ?>" name="optradio" value="<?php echo $i; ?>" required>
                                <label for="<?php echo "option" . $i; ?>" class="star-option-label"><?php echo $i; ?> Stern</label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <input type='hidden' name="id" value="<?php echo $productId; ?>">
                <button type="submit" class="btn"><span id="ratingbutton">Bewertung abgeben</span></button>
            </form>
        </div>

        <hr class="seperator" />
        <div id="comment-heading">
            <p class="h2 text-center">Bewertungen</p>
        </div>


        <?php

        $ratingList = $ratingRepo->getRatingsForProduct($_GET['id']);

        foreach ($ratingList as $rating) {
            echo
            '<div class="comments">
                <div class="grid-container">
                  <div class="username">
                    <p>' . $rating->getUser() . '</p>
                  </div>
                  <div class="commenttext">
                    <p>' . $rating->getDescription() . '</p>
                  </div>
                  <div class="rating">
                    <p>' . $rating->getRating() . '/5</p>
                  </div>
                </div>
             </div>';
        }

        ?>

    </main>

    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php";
    ?>
</body>

</html>