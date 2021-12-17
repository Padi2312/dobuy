<!DOCTYPE html>
<html lang="">

<head>
    <?php
    include "../templates/head.php";
    ?>
    <link rel="stylesheet" href="../../css/productsite.css">
</head>

<body>

    <?php
    include_once "../common/session.php";
    include_once "../common/product.php";
    include "../templates/header.php";
    $productId = $_GET["id"];

    $productHandler = new Product();
    $product = $productHandler->getProductById($productId);
    if ($product === null) {
        header("Location: notfound.php");
    }
    ?>

    <main>
        <p>
        </p>
        <div class="producttitel">
            <p>
                <?php echo $product->getName(); ?>
            </p>
        </div>

        <div id="product" class="grid-master">
            <div class="productpicture">
                <img id="productpicture" src="<?php echo $product->getImagePath(); ?>" title="Placeholder" alt="Placeholder">
            </div>
            <div class="productdescription">
                <p id="productdescription">
                    <?php echo $product->getDescription(); ?>
                </p>
            </div>
            <div class="price">
                <p id="price"><?php echo $product->getPrice(); ?> €</p>
            </div>
            <!-- <div class="tags">
                <p id="tags">Placeholder,Placeholder,Placeholder</p>
            </div> -->
            <div class="retailer">
                <p id="retailer"><?php echo $product->getProvider(); ?></p>
            </div>
            <div class="rating">
                Rating: 4/5
            </div>
        </div>
        <?php
        include_once '../common/session.php';
        $session = new Session();

        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $action = "./shoppingcardaction.php?id=$id";
        } else {
            $action = "./notfound.php";
        }

        if ($session->isLoggedIn()) {
            echo "<form action='$action' method='post'>
                    <div class='shoppingcart-buttonline'>
                        <button type='submit' id='cartbutton'><span id='buttontext'>Zum Warenkorb hinzufügen</span></button>
                    </div>
                </form>";
        }
        ?>


        <hr id="seperator"/>
        <div id="comments">
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
        <div id="comments">
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
        <hr id="seperator"/>
        <div id="rating-infobox">
            <span class="rating-info">Geben Sie eine Bewertung zum Produkt ab</span>
        </div>
        <div class="rating-form container">
            <form class="postrating" method="post" action="postRating" id="rating-comment">
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
                <div id="comment-wrapper container">
                    <div class="row">
                        <div class="col">
                            <label for="comment">Schreibe einen Kommentar</label></br>
                            <textarea name="comment" id="comment"class="bar"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn"><span id="ratingbutton">Bewertung abgeben</span></button>
            </form>
        </div>

    </main>


    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php";
    ?>
</body>

</html>