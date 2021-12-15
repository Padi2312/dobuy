<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>DOBUY - Ihr Onlineshop</title>
    <?php include './php/templates/head.php' ?>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
    include_once './php/common/session.php';
    include_once './php/database/database.php';
    //Important init database once here!
    new Database();

    include "php/templates/header.php";
    ?>

    <main>

        <div class="searchbar">
            <form action="search.php" method="post">
                <lable for="productsearch" class="form-lable">
                    <input type="text" class="form-control" id="searchterm" placeholder="Search here" name="searchterm">
            </form>
        </div>

        <div class="current">
            <span class="news">
                These are the most popular items on <span id="do">DO</span>BUY!
            </span>
        </div>

        <div id="grid" class="grid-container">
            <div class="item1">
                <span>Item 1</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="item2">
                <span>Item 2</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="item3">
                <span>Item 3</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="item4">
                <span>Item 4</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="item5">
                <span>Item 5</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="item6">
                <span>Item 6</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="item7">
                <span>Item 7</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="item8">
                <span>Item 8</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
            <div class="item9">
                <span>Item 9</span>
                <hr id="popular">
                <img id="productpicture" src="assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
            </div>
        </div>

    </main>

    <?php
    include "php/templates/scripts.php";
    include "php/templates/footer.php";
    ?>

    <script type="text/javascript" src=""></script>
</body>

</html>