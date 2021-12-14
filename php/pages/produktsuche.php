<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>DOBUY - Produkte</title>
    <link rel="stylesheet" href="../../css/produktsuche.css">
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

    <?php //include "../templates/header.php";?> 

    <main>
        
        <form action="suche.php" method="post">
            <div class="suchleiste">
                <lable for="Produktsuche" class="form-lable">
                <input type="text" class="form-control" id="suchbegriff" placeholder="Geben Sie einen Suchbegriff ein" name="suchbegriff">
            </div>
        </form>

        <div id="response" class="grid-container">
            <div class="produktbild">
                <img id="produktbild" src="../../assets/images/icon_user.svg" title="Platzhalter" alt="Platzhalter">
            </div>
            <div class="produktname">
                <p id="produktname">Samsung Galaxy A12</p>
            </div>
            <div class="beschreibung">
                <p id="beschreibung">
                    Batterien  :  1 Lithium-Polymer Batterien erforderlich (enthalten).
                    Auslaufartikel (Produktion durch Hersteller eingestellt)  :  Nein
                </p>
            </div>
            <div class="tags">
                <p id="tags">Elektronik, Smartphone, Samsung</p>
            </div>
            <div class="preis">
                <p id="preis">198,00€</p>
            </div>
        <div>

    </main>

    <?php //include "../templates/footer.php";?>

    <script type="text/javascript" src=""></script>
</body>

</html>