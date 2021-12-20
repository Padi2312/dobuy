<!-- Diese Datei zeigt die Produktseite der einzelnen Produkte an mit den Bewertungen für das Produkt -->
<?php
include_once "../common/session.php";
include_once "../common/product.php";
include_once "../common/category.php";
include_once "../common/shoppingcard.php";
$productId = $_GET["id"];

$productHandler = new Product();
$category = new Category();
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
                    <p id="rating">Rating: 4/5</p>
                </div>
                <div class="col">
                    <p id="retailer">
                        <?php
                        if ($product->getProvider() == "admin") {
                            echo  "<b>Von: <span style='color:#FFE600;'>DO</span>BUY!</b>";
                        } else {
                            echo "Händler: " . $product->getProvider();
                        }
                        ?>
                    </p>
                </div>
                <div class="col">
                    <div>
                        <p id="price"><?php echo $product->getPrice(); ?> €</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <?php
                $session = new Session();
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
            <form class="postrating" method="post" action="postRating" id="rating-comment">
                <div class="comment-wrapper container">
                    <div class="row">
                        <div class="col">
                            <label class="h6" for="comment">Schreibe einen Kommentar</label><br>
                            <textarea name="comment" id="comment" class="bar"></textarea>
                        </div>
                    </div>
                </div>
                <div class="star-rating container">
                    <div class="row">
                        <div class="starrating col">
                            <input type="radio" id="one" name="ratingpoints" value=1>
                            <label for="one" class="star-option-label">1 Stern</label>
                        </div>
                        <div class="starrating col">
                            <input type="radio" id="two" name="ratingpoints" value=2>
                            <label for="two" class="star-option-label">2 Sterne</label>
                        </div>
                        <div class="starrating col">
                            <input type="radio" id="three" name="ratingpoints" value=3>
                            <label for="three" class="star-option-label">3 Sterne</label>
                        </div>
                        <div class="starrating col">
                            <input type="radio" id="four" name="ratingpoints" value=4>
                            <label for="four" class="star-option-label">4 Sterne</label>
                        </div>
                        <div class="starrating col">
                            <input type="radio" id="five" name="ratingpoints" value=5>
                            <label for="five" class="star-option-label">5 Sterne</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn"><span id="ratingbutton">Bewertung abgeben</span></button>
            </form>
        </div>

        <hr class="seperator" />
        <div id="comment-heading">
            <p class="h2 text-center">Bewertungen</p>
        </div>

        <div class="comments">
            <div class="grid-container">
                <div class="username">
                    <p>Jesus Christus</p>
                </div>
                <div class="commenttext">
                    <p>This is a very serious and important text, please think about what it says</p>
                </div>
                <div class="rating">
                    <p>4,5/5</p>
                </div>
            </div>
        </div>
        <div class="comments">
            <div class="grid-container">
                <div class="username">
                    <p>Jesus Christus</p>
                </div>
                <div class="commenttext">
                    <p>This is a very serious and important text, please think about what it says</p>
                </div>
                <div class="rating">
                    <p>4,5/5</p>
                </div>
            </div>
        </div>

    </main>


    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php";
    ?>
</body>

</html>