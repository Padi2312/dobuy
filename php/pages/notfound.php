<!-- Diese Datei zeigt eine Fehlerseite an, für den Fall, dass ein Produkt nicht gefunden wurde -->
<?php include_once '../common/session.php' ?>

<!DOCTYPE html>
<html lang="de">

<head>
    <?php include_once '../templates/head.php' ?>
    <link rel="stylesheet" href="../../css/notfound.css">
</head>

<body>

    <?php
    include "../templates/header.php";
    ?>

    <main>
        <div class="container-fluid mb-5">
            <div class="content">
                <span id="picturetext">Wir konnten dieses Produkt nicht finden, dafür ist hier ein schönes Bild</span>
            </div>
            <hr id="seperator" />
            <div class="content">
                <img id="picture" src="../../assets/images/notfound.jpg" alt="Wir konnten dieses Produkt nicht finden" titel="Wir konnten dieses Produkt nicht finden">
            </div>
        </div>

    </main>

    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php";
    ?>
</body>

</html>