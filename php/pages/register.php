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
        <input name="username" type="text" id="username" placeholder="Username">
        <input name="firstname" type="text" id="firstname" placeholder="Vorname">
        <input name="lastname" type="text" id="lastname" placeholder="Nachname">
        <input name="email" type="text" id="email" placeholder="E-Mail">
        <input name="password" type="password" id="password" placeholder="Password">
        <button name="register" id="register">Registrieren</button>
        
        <script>
        document.getElementById("registrieren").onsubmit = (event) => {
            event.preventDefault();
            let benutzername = document.getElementById("benutzername").value;
            let passwort = document.getElementById("passwort").value;
            let firstname = document.getElementById("firstname").value;
            let lastname = document.getElementById("lastname").value;
            let email = document.getElementById("email").value;

            let valid = true;

            if (benutzername == "" || passwort == "" || firstname == "" || lastname == "" || email == "") {
                alert("Bitte alles aufüllen");
                valid = false;
            }

            if (valid) {
                event.target.submit();
            }
        }
        </script>

    </form>
</body>
</html>;