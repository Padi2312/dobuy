<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>DOBUY - Produktname</title>
    <link rel="stylesheet" href="../../css/productsite.css">
    <link rel="stylesheet" href="../../css/main.css">
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
    include_once "../common/session.php"; 
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
        <hr/>
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

    <?php include "../templates/footer.php";?>

    <script type="text/javascript" src=""></script>
</body>

</html>