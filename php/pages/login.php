
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <div>Wilkommen bei DoBuy!</br>
    Melden Sie sich an, um zu Ihrer Kontoübersicht zu gelangen.</div>
    <form id="formular" method="post" action="loginaction.php">
        <input name="name" type="text" id="name" placeholder="Username">
        <input name="password" type="password" id="password" placeholder="Password">
        <button name="login" id="login">Login</button>
    </form>
    <form id="registrieren" method="post" action="register.php">
        <button name="reg" id="reg">Registrieren</button>
    </form>
</body>
</html>

