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
                        Registrieren Sie sich um unsere Inhalte vollständig nutzen zu können.
                    </div>
                    <hr id="seperator"/>
                    <div class="form-group">
                        <input name="username" type="text" id="username" class="form-control" required placeholder="Username">
                    </div>
                    <div class="form-group">               
                        <input name="firstname" type="text" id="firstname" class="form-control" required placeholder="Vorname">
                    </div>
                    <div class="form-group">
                        <input name="lastname" type="text" id="lastname" class="form-control" required placeholder="Nachname">
                    </div>
                    <div class="form-group">
                        <input name="email" type="text" id="email" class="form-control" required placeholder="E-Mail">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" id="password" class="form-control" required placeholder="Password">
                    </div>
                    <div id="buttonline">
                        <button type="submit" name="register" id="reg" class="btn">Registrieren</button>
                    </div>
                </form>
        </div>

    </main>
    <?php include "../templates/footer.php"; ?>

    <?php include '../templates/scripts.php'; ?>
</body>

</html>
