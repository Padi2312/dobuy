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
    include "../common/session.php";
    include "../templates/header.php";
    ?>

    <main>

        <div class="producttitel">
            <p>Beispielitem</p>
        </div>

        <div id="product" class="grid-master">
            <div class="productpicture">
                <img id="productpicture" src="../../assets/images/icon_phone.png" title="Placeholder" alt="Placeholder">
            </div>
            <div class="productdescription">
                <p id="productdescription">This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder This is a placeholder</p>
            </div>
            <div class="price">
                <p id="price">125€</p>
            </div>
            <div class="tags">
                <p id="tags">Placeholder,Placeholder,Placeholder</p>
            </div>
            <div class="retailer">
                <p id="retailer">Max Mustermann</p>
            </div>
            <div class="rating">
                Rating: 4/5
            </div>
        </div>
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

    </main>


    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php";
    ?>
</body>

</html>