<?php
include_once '../common/session.php';
include_once '../database/database.php';
include_once '../common/product.php';
//Important init database once here!
new Database();
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>DOBUY - Ihr Onlineshop</title>
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
            <form action="search.php" method="post">
                <lable for="productsearch" class="form-lable">
                    <input type="text" class="form-control" id="searchterm" placeholder="Suchbegriff eingeben" name="searchterm">
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
            for ($i = 0; $i < 12 / 4; $i++) {
                echo "<div class='row'>";
                for ($j = 0; $j < 4; $j++) {
                    $index = $i + $j;
                    $name = $randomProducts[$index]->getName();
                    $id = $randomProducts[$index]->getID();
                    $imagePath = $randomProducts[$index]->getImagePath();
                    echo "<div class='part col-md-3'>
                            <a class='link-product' href='productsite.php?id=$id'>
                             <div class='product-item'>
                                 <span id='title'>$name</span>
                                <hr id='popular'>
                                 <img id='productpicture' src='$imagePath' title='$name' alt='$name'>
                            </div>
                             </a>
                    </div>";
                }
                echo "</div>";
            }


            ?>

        </div>
    </main>

    <?php
    include "../templates/scripts.php";
    include "../templates/footer.php";
    ?>

    <script type="text/javascript" src=""></script>
</body>

</html>