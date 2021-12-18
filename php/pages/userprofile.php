<?php
include_once '../common/notloggedin.php';
include_once "../common/ordering.php";
include_once "../common/product.php";
include_once "../common/user.php";
include_once "../common/session.php";
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include "../templates/head.php";
    ?>
    <link rel="stylesheet" href="../../css/userprofile.css">
</head>

<body>

    <?php
    include_once "../templates/header.php";

    ?>

    <main>
        <div class="container">
            <p class="h3">Ihr Benutzerdaten:</p>
            <div id="userdata">
                <?php
                $user = new User();
                $userData = $user->getCurrentUserData();
                echo '<span class="kind">Benutzername</span>: ' . $userData->getUsername() . '<br>';
                echo '<span class="kind">Name</span>: ' . $userData->getFullname() . '<br>';
                echo '<span class="kind">E-Mail</span>: ' . $userData->getEmail() . '<br>';
                ?>
            </div>
            <hr class="seperator" />
            <?php
            if ($session->isAdmin()) {
                echo "<p class='h3'>Verwalten sie ihren Shop:</p><br>";
                include 'adminsection.php';
            } else {
                include 'usersection.php';
            }
            ?>

        </div>

    </main>
    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php"
    ?>
</body>

</html>