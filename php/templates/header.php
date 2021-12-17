<?php
include_once '../common/shoppingcard.php';
include_once '../common/session.php';
$session = new Session();

?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #dddddd;">
        <a class="navbar-brand" href="../../">
            <img src="../../assets/images/logo.svg" width="150" height="30" alt="DoBuy Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav,#navbarNavTwo" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a href="../pages/productsearch.php" class="nav-link" title="Zu der Prdukt kaufen Seite">Produkte kaufen</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (!$session->isLoggedIn()) {
                        echo "<a class='nav-link' href='../pages/login.php?type=sell' title='Zu der Produkt anbieten Seite'>Produkte anbieten</a>";
                    } else {
                        echo "<a class='nav-link' href='../pages/addproduct.php' title='Zu der Produkt anbieten Seite'>Produkte anbieten</a>";
                    }
                    ?>

                </li>
            </ul>
            <div class="navbar-collapse collapse order-3" id="navbarNavTwo">
                <ul class="navbar-nav ml-auto">
                    <?php

                    if ($session->isLoggedIn()) {
                        $shoppingCard = new ShoppingCard();
                        $amount = $shoppingCard->getAmountOfShoppingCard();
                        echo "<li class='nav-item'>
                            <a href='../../php/pages/shoppingbasket.php'  class='nav-item' title='Zum Warenkorb'>
                                Zum Warenkorb ($amount)
                            </a>
                            </li>
                            <li class='nav-item'>
                            <a href='../../php/pages/userprofile.php'  class='header_btn' title='Zum Account'>
                                        Zum Account
                            </a>
                            </li>
                            <li class='nav-item'>
                            <a href='../../php/pages/logoutaction.php'  class='header_btn' title='Zum Account'>
                                        Abmelden
                            </a>
                            </li>";
                    } else {
                        echo "<li class='nav-item'>
                                <a href='../../php/pages/login.php' class='nav-link' title='Zur Login Seite'>Anmelden</a>
                            </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

    </nav>
</header>