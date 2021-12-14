

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#ffe600">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/login.css">
    <title>Login</title>
</head>


<body>

    <?php //include "../common/session.php"; ?>
    <?php //include "../templates/header.php"; ?>
    <main>
    <div id="border1">
    <div id="logintext">
            <img id="logo2" src="../../assets/images/logo.svg" title="Logo von DOBUY" alt="Logo von DOBUY">
    </br>
        Melden Sie sich an, um zu Ihrer Kontoübersicht zu gelangen.</div>
    <?php
    if (isset($_GET["error"])) {
        echo "<div>Benutzername oder passwort falsch</div>";
    }
    ?>
    <form id="formular" method="post" action="loginaction.php">
        <input name="name" type="text" id="name" class="inputtext" placeholder="Username">
        <input name="password" type="password" class="inputtext" id="password" placeholder="Password">
        <button name="login" id="login">Login</button>
    </form>
    <form id="registrieren" method="post" action="register.php">
        <button name="reg" id="reg">Registrieren</button>
    </form>
    </div>
    </main>
    
    <?php //include "../templates/footer.php"; ?>
</body>

</html>