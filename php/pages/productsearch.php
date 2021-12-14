<!DOCTYPE html>
<html lang="">

<head>
    <?php
    include "../templates/head.php";
    ?>
    <link rel="stylesheet" href="../../css/productsearch.css">
</head>

<body>

    <?php 
    include_once "../common/session.php";
    include "../templates/header.php";
    ?>

    <main>

        <div class="searchbar">
            <form action="search.php" method="post">
                <lable for="productsearch" class="form-lable">
                    <input type="text" class="form-control" id="searchterm" placeholder="Search here" name="searchterm">
            </form>
        </div>

        <div id="response" class="grid-container">
            <div class="productpicture">
                <img id="productpicture" src="../../assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="productname">
                <a id="productname" href="productsite.php">Samsung Galaxy A12</a>
            </div>
            <div class="description">
                <p id="description">
                    Batterien : 1 Lithium-Polymer Batterien erforderlich (enthalten).
                    Auslaufartikel (Produktion durch Hersteller eingestellt) : Nein
                </p>
            </div>
            <div class="tags">
                <p id="tags">Elektronik, Smartphone, Samsung</p>
            </div>
            <div class="price">
                <p id="price">198,00€</p>
            </div>
        </div>

        <hr />

        <div id="response" class="grid-container">
            <div class="productpicture">
                <img id="productpicture" src="../../assets/images/icon_cart.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="productname">
                <a id="productname" href="productsite.php">Samsung Galaxy A12</a>
            </div>
            <div class="description">
                <p id="description">
                    Batterien : 1 Lithium-Polymer Batterien erforderlich (enthalten).
                    Auslaufartikel (Produktion durch Hersteller eingestellt) : Nein
                </p>
            </div>
            <div class="tags">
                <p id="tags">Elektronik, Smartphone, Samsung</p>
            </div>
            <div class="price">
                <p id="price">198,00€</p>
            </div>
        </div>

    </main>

    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php";
    ?>

</body>

</html>