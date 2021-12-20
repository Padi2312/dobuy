<!-- Diese Datei ermöglicht es dem Admin die Produkte zu bearbeiten -->
<?php
include_once '../common/notloggedin.php';
include_once "../common/ordering.php";
include_once "../common/product.php";
include_once "../common/user.php";
include_once "../common/session.php";

if (!isset($_GET["id"]) || $_GET["id"] == "") {
    header("location: ../../");
}

?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include "../templates/head.php";
    ?>
    <link rel="stylesheet" href="../../css/addproduct.css">
</head>

<body>

    <?php
    include "../templates/header.php";
    ?>

    <main>
        <div class="submit-form container">
            <div class="textbox">
                <span id="text" class="h3">Bearbeiten sie ihr Produkt.</span>
            </div>
            <hr id="seperator" />

            <?php
            $product = new Product();
            $id = $_GET["id"];
            $currentProduct = $product->getProductById($id);


            $imagePath = $currentProduct->getImagePath();
            $name = $currentProduct->getName();
            $price = $currentProduct->getPrice();
            $description = $currentProduct->getDescription();

            echo "
                <form action='editproductaction.php?id=$id&type=edit' method='post' enctype='multipart/form-data'>
                    <label for='fileToUpload'>Neues Bild auswählen oder nichts auswählen um das alte Bild zu behalten:</label><br>
                    <input type='file' name='fileToUpload' id='fileToUpload' class='restricted'><br><br>
                    <label for='productname'>Wie soll das Produkt heißen?</label><br>
                    <input type='text' name='productname' id='productname' class='bar' value='$name'><br>
                    <label for='price'>Wie viel soll Ihr Produkt kosten?</label><br>
                    <input type='number' step='.01' name='price' id='price' class='bar' value='$price'><br>
                    <label for='description'>Beschreiben Sie Ihr Produkt</label><br>
                    <textarea name='description' id='description' class='bar'>$description</textarea><br>
                    <button id='addproduct1'>Produkt aktualisieren</button>
                    </form>";

            echo "
                <form action='editproductaction.php?id=$id&type=delete' method='post' enctype='multipart/form-data'>
                    <button class='dobuy-button'>Löschen</button>
                    </form>
                    "
            ?>
        </div>
    </main>
    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php"
    ?>
</body>

</html>