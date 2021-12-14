<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <form id="registrieren" method="post" action="registeraction.php">
        <div>Wilkommen bei DoBuy!</div>
        <div>Registrieren Sie sich um unsere Inhalte vollständig nutzen zu können.</div>
        <input name="username" type="text" id="username" required placeholder="Username">
        <input name="firstname" type="text" id="firstname" required  placeholder="Vorname">
        <input name="lastname" type="text" id="lastname" required placeholder="Nachname">
        <input name="email" type="text" id="email" required placeholder="E-Mail">
        <input name="password" type="password" id="password" required placeholder="Password">
        <button name="register" id="register">Registrieren</button>

    </form>
</body>

</html>