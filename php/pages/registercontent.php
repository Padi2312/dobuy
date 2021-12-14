<!DOCTYPE html>
<html lang="de">

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
    <title>Registrieren</title>
</head>

<body>
    <main>
    <div id="border1">
    <form id="registrieren" method="post" action="registeraction.php">
        <div id="logintext"><img id="logo2" src="../../assets/images/logo.svg" title="Logo von DOBUY" alt="Logo von DOBUY"> </br>
        Registrieren Sie sich um unsere Inhalte vollständig nutzen zu können.</div>
        <input name="username" type="text" id="username" class="inputtext" required placeholder="Username">
        <input name="firstname" type="text" id="firstname" class="inputtext" required  placeholder="Vorname">
        <input name="lastname" type="text" id="lastname" class="inputtext" required placeholder="Nachname">
        <input name="email" type="text" id="email" class="inputtext" required placeholder="E-Mail">
        <input name="password" type="password" id="password" class="inputtext" required placeholder="Password">
        <button name="register" id="reg">Registrieren</button>

    </form>
    </div>
    </main>
</body>

</html>