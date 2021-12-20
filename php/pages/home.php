<!-- Durch diese Datei wird die Homepage angezeigt, sie ist die Landingpage -->
<?php
include_once '../common/session.php';
include_once '../database/database.php';
include_once '../common/product.php';
//Important init database once here!
new Database();
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include '../templates/head.php' ?>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/home.css">
</head>

<body>

    <?php
    include "../templates/header.php";
    ?>

    <main>

        <div class="searchbar">
            <form action="productsearch.php?keyword=searchterm" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" id="searchterm" placeholder="Suchen Sie hier" name="searchterm">
                    <input class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Suchen">
                </div>
            </form>
        </div>

        <div class="current">
            <span class="news h1">
                Unsere Produkte auf <span id="do">DO</span>BUY!
            </span>
        </div>


        <div class="container">
            <?php
            $productClass = new Product();
            $randomProducts = $productClass->getRandomProducts(12);

            $numOfCols = 4;
            $rowCount = 0;

            foreach ($randomProducts as $product) {
                if ($rowCount % $numOfCols === 0) {
                    echo "<div class='row'>";
                }
                $rowCount++;
                $id = $product->getID();
                $name = $product->getName();
                $imagePath = $product->getImagePath();
                echo    "<div class='part col-md-3'>
                            <a class='link-product' href='productsite.php?id=$id'>
                                <div class='product-item'>
                                    <span>$name</span>
                                    <hr class='popular'>
                                    <img class='productpicture' src='$imagePath' title='$name' alt='$name'>
                                </div>
                            </a>
                        </div>";

                if ($rowCount % $numOfCols === 0) {
                    echo "</div>";
                }
            } ?>

        </div>
    </main>

    <?php
    include "../templates/scripts.php";
    include "../templates/footer.php";
    ?>

    <script type="text/javascript" src=""></script>
</body>

</html>