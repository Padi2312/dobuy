<!-- Auf dieser Seite können User Produkt für den Verkauf auf DoBuy vorschlagen -->
<?php
include_once '../common/notloggedin.php';
include_once '../common/session.php';
include_once '../common/category.php';
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
            if ($userdata->getRole() == 2) {
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
            <?php
            $isUser = $userdata->getRole() == 2;
            if ($isUser) {
                echo "<form action='addproductaction.php?type=2' method='post' enctype='multipart/form-data'>";
            } else {
                echo "<form action='addproductaction.php?type=1' method='post' enctype='multipart/form-data'>";
            }
            ?>
            <label for="fileToUpload">Bild auswählen:</label></br>
            <input type="file" name="fileToUpload" id="fileToUpload" class="restricted"></br>
            <label for="productname">Wie soll das Produkt heißen?</label></br>
            <input type="text" name="productname" id="productname" class="bar" required></br>
            <label for="price">Wie viel soll Ihr Produkt kosten?</label></br>
            <input type="number" step=".01" name="price" id="price" class="bar" required></br>
            <label for="description">Beschreiben Sie Ihr Produkt</label></br>
            <textarea name="description" id="description" class="bar" required></textarea></br>
            <label for="dropdown">Wählen Sie eine Kategorie</label><br />
            <select class="form-select" aria-label="category" id="dropdown" name="category" required>
                <option selected></option>
                <?php

                $category  = new Category();
                $categoryList = $category->getAllCategories();

                foreach ($categoryList as $item) {
                    $id = $item->getID();
                    $name = $item->getName();
                    echo "<option value=$id>$name</option>";
                }

                ?>

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