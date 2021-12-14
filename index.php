<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>DOBUY - Ihr Onlineshop</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#ffe600">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<body>

    <?php
    include_once './php/common/session.php';
    include "php/templates/header.php";
    include_once './php/database/database.php';
    new Database();
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
    include "php/templates/footer.php";
    ?>

    <script type="text/javascript" src=""></script>
</body>

</html>