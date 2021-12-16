<!DOCTYPE html>
<html lang="de">

<head>
    <?php include_once '../common/session.php' ?>
    <?php include_once '../templates/head.php' ?>
    <link rel="stylesheet" href="../../css/addproduct.css">
</head>

<body>

    <?php
        include_once "../common/session.php";
        include "../templates/header.php";
    ?>

    <main>

        

        <div class="submit-form">
            <form action="addproductaction.php" method="post" enctype="multipart/form-data">
                <label for="fileToUpload">Bild auswählen:</label></br>
                <input type="file" name="fileToUpload" id="fileToUpload" class="restricted"></br>
                <label for="productname">Wie soll das Produkt heißen?</label></br>
                <input type="text" name="productname" id="productname" class="bar"></br>
                <label for="price">Wie viel soll Ihr Produkt kosten?</label></br>
                <input type="number" step=".01" name="price" id="price" class="bar"></br>
                <label for="description">Beschreiben Sie Ihr Produkt</label></br>
                <textarea name="description" id="description" class="bar"></textarea></br>
                <button id="addproduct1">Produkt hinzufügen</button>
            </form>
        </div>

    </main>
    <?php
        include "../templates/footer.php";
        include "../templates/scripts.php";
    ?>
</body>

</html>