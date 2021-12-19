<!-- Diese Datei zeigt die Seite an, auf die man weitergeleitet wird, wenn man ein Produkt hochgeladen hat -->
<!DOCTYPE html>
<html lang="">

<head>
    <?php
    include "../templates/head.php";
    ?>
</head>

<body>
    <?php include "../templates/header.php"; ?>

    <main>
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center m-3">
                <div>
                    <p class="h1 text-center">
                        Danke für ihr Angebot an <b><span style="color: #FFE600;">DO</span>BUY!</b>
                    </p>
                    <p class="h4 text-center">
                        Wir werden ihr Produkt in kürze evaluieren und je nach Ergebnis freischalten.
                    </p>
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