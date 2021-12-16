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
                    <button type='submit' id='cartbutton'><span id='buttontext'>Zum Warenkorb hinzufügen</span></button>
                </form>";
        }
        ?>


        <hr />
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
        <div id="rating-form">
            <form class="postrating" method="post" action="postRating">
                <input type="radio" id="one" name="ratingpoints" value=1>
                <label for="one">1 Stern</label>
                <input type="radio" id="two" name="ratingpoints" value=2>
                <label for="two">2 Sterne</label>
                <input type="radio" id="three" name="ratingpoints" value=3>
                <label for="three">3 Sterne</label>
                <input type="radio" id="four" name="ratingpoints" value=4>
                <label for="four">4 Sterne</label>
                <input type="radio" id="five" name="ratingpoints" value=5>
                <label for="five">5 Sterne</label></br>
                <label for="comment">Schreib einen Kommentar</label>
                <textarea name="comment" id="comment">
            </form>
        </div>

    </main>


    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php";
    ?>
</body>

</html>