<!-- Ducrh diese Datei wird das LogIn-Formular angezeigt -->
<?php include_once '../common/session.php' ?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php include_once '../templates/head.php' ?>
    <link rel="stylesheet" href="../../css/login.css">
</head>

<body>
    <?php include "../templates/header.php"; ?>

    <main>
        <div class="container-fluid h-100">
            <div class="row justify-content-center">

                <form class="login-form " method="post" action="loginaction.php">
                    <div id="logintext">
                        <img id="logo2" src="../../assets/images/logo.svg" title="Logo von DOBUY" alt="Logo von DOBUY">
                        <br>
                        Melden Sie sich an, um zu Ihrer Kontoübersicht zu gelangen.
                    </div>
                    <hr id="seperator" />

                    <?php
                    if (isset($_GET["error"])) {
                        echo '<div class="alert alert-danger" role="alert">
                    Benutzername und passwort falsch
                    </div>';
                    }

                    if (isset($_GET["type"]) && $_GET["type"] === "sell") {
                        echo '<div class="alert alert-info" role="alert">
                    Um auf DoBuy Produkte anbieten zu können, müssen sie registriert sein.
                    </div>';
                    }
                    ?>

                    <div class=" form-group">
                        <label for="name">Benutzername</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Benutzername" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Passwort</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Passwort" required>
                    </div>
                    <div id="buttonline">
                        <a href="./register.php">
                            Registrieren
                        </a>
                        <button name="login" type="submit" class="btn" id="loginbutton">Anmelden</button>
                    </div>
                </form>
            </div>

        </div>

    </main>
    <?php include "../templates/footer.php"; ?>

    <?php include '../templates/scripts.php'; ?>
</body>

</html>