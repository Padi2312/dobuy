    <header>
        <div id="logo">
            <img src="../../assets/images/logo.svg" title="Logo von DOBUY" alt="Logo von DOBUY">
        </div>
        <div id="header_right">
            <nav id="mainMenue">
                <ul id="mainMenue_inner">
                    <li class="menuepoint menuepoint1">
                        <a href="../../php/pages/productsearch.php" title="Zu der Prdukt kaufen Seite - Link öffnet im aktuellen Fenser">Produkte kaufen</a>
                    </li>

                    <li class="menuepoint menuepoint2">
                        <a href="###2" title="Zu der Produkt anbieten Seite - Link öffnet im aktuellen Fenser">Produkte anbieten</a>

                    </li>

                    <li class="menuepoint menuepoint3">
                        <a href="###3" title="Zur Kontakt Seite - Link öffnet im aktuellen Fenser">Kontakt</a>

                    </li>
                </ul>
            </nav>

            <div id="button_wrap">
                <?php
                if (Session::isLoggedIn()) {
                    echo "<a href='###4' id='ware_button' class='header_btn' title='Zum Warenkorb - Link öffnet im aktuellen Fenser'>
                        <span class='unsichtbar'>Zum Warenkorb</span>
                    </a>
                    <a href='php/pages/userprofile.php' id='acc_button' class='header_btn' title='Zum Account - Link öffnet im aktuellen Fenster'>
                                <span class='unsichtbar'>Zum Account</span>
                                </a>";
                } else {
                    echo "<a href='php/pages/logincontent.php' id='login_btn' title='Zur Login Seite - Link öffnet im aktuellen Fenster'>Anmelden</a>";
                }
                ?>

            </div>
        </div>
    </header>