<!DOCTYPE html>
<html lang="de">

<head>
    <?php include_once '../common/session.php'; ?>
    <?php include_once '../templates/head.php'; ?>
</head>

<body>
    <?php include "../templates/header.php"; ?>
    <link rel="stylesheet" href="../../css/login.css">

    <main>
        <div id="border1" class="container-fluid ">
            <form class="register-form" method="post" action="registeraction.php">
                <div id="logintext"><img id="logo2" src="../../assets/images/logo.svg" title="Logo von DOBUY" alt="Logo von DOBUY"> </br>
                    Registrieren Sie sich um unsere Inhalte vollständig nutzen zu können.</div>
                    <div class="form-group">
                    <input name="username" type="text" id="username" class="inputtext" required placeholder="Username">
                    </div>
                    <div class="form-group">               
                    <input name="firstname" type="text" id="firstname" class="inputtext" required placeholder="Vorname">
                    </div>
                    <div class="form-group">
                    <input name="lastname" type="text" id="lastname" class="inputtext" required placeholder="Nachname">
                    </div>
                    <div class="form-group">
                    <input name="email" type="text" id="email" class="inputtext" required placeholder="E-Mail">
                    </div>
                    <div class="form-group">
                    <input name="password" type="password" id="password" class="inputtext" required placeholder="Password">
                    </div>
                    <button type="submit" name="register" id="reg">Registrieren</button>
                    
            </form>
        </div>

    </main>
    <?php include "../templates/footer.php"; ?>

    <?php include '../templates/scripts.php'; ?>
</body>

</html>
