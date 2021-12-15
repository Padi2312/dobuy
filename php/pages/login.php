<!DOCTYPE html>
<html lang="de">

<head>
    <?php include_once '../common/session.php' ?>
    <?php include_once '../templates/head.php' ?>
</head>

<body>
    <?php include "../templates/header.php"; ?>
    <link rel="stylesheet" href="../../css/login.css">

    <main>
        <div class="container-fluid ">
            <form class="login-form" method="post" action="loginaction.php">
                <div id="logintext">
                    <img id="logo2" src="../../assets/images/logo.svg" title="Logo von DOBUY" alt="Logo von DOBUY">
                    </br>
                    Melden Sie sich an, um zu Ihrer Kontoübersicht zu gelangen.
                </div>
                <hr />

                <?php
                if (isset($_GET["error"])) {
                    echo '<div class="alert alert-danger" role="alert">
                    Benutzername und passwort falsch
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
                    <button type="button" class="btn btn-link">
                        Registrieren
                    </button>
                </a>
                <button name="login" type="submit" class="btn" id="loginbutton">Anmelden</button>
                </div>
            </form>

        </div>

    </main>
    <?php include "../templates/footer.php"; ?>

    <?php include '../templates/scripts.php' ?>
</body>

</html>