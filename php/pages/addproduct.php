<?php
include_once '../common/notloggedin.php';
include_once '../common/session.php';
include_once '../common/user.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include_once '../templates/head.php'; ?>
    <link rel="stylesheet" href="../../css/addproduct.css">
</head>

<body>

    <?php
    include_once "../common/session.php";
    include "../templates/header.php";
    ?>

    <main>

        <div class="submit-form container">
            <?php
            $user = new User();
            $userdata = $user->getCurrentUserData();
            if ($userdata->getRole() === 2) {
                echo '<div class="textbox">
                <span id="text">Sie wollen ein Produkt auf unserer Seite anbieten? Dann geben Sie uns mit diesem Formular die relevanten Informationen. Falls wir den Artikel für geeignet halten, nehmen wir ihn in das Sortiment auf und Sie werden natürlich am Gewinn beteiligt!</span>
            </div>';
            } else {
                echo '<div class="textbox">
                        <span id="text">Fügen sie ihrem Shop weitere tolle Produkte hinzu.</span>
                    </div>';
            }
            ?>

            <hr id="seperator" />
            <form action="addproductaction.php" method="post" enctype="multipart/form-data">
                <label for="fileToUpload">Bild auswählen:</label></br>
                <input type="file" name="fileToUpload" id="fileToUpload" class="restricted"></br>
                <label for="productname">Wie soll das Produkt heißen?</label></br>
                <input type="text" name="productname" id="productname" class="bar"></br>
                <label for="price">Wie viel soll Ihr Produkt kosten?</label></br>
                <input type="number" step=".01" name="price" id="price" class="bar"></br>
                <label for="description">Beschreiben Sie Ihr Produkt</label></br>
                <textarea name="description" id="description" class="bar"></textarea></br>
                <label for="dropdown">Wählen Sie eine Kategorie</label><br/>
                <select class="form-select" aria-label="category" id="dropdown">
                  <option selected>Kategorie wählen</option>
                  <option value=1>Bsp</option>
                  <option value=2>Bsp</option>
                  <option value=3>Bsp</option>
                </select>
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