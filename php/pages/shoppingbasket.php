<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include "../templates/head.php";
    ?>
    <link rel="stylesheet" href="../../css/shoppingbasket.css">
</head>

<body>

    <?php
    include_once "../common/session.php";
    include "../templates/header.php";
    include "../common/ordering.php";
    ?>
    
    <main>

    </table>    
            <div id="tableheadline">Warenkorb</div>
            <table id="table">
                <tr>
                    <th id="picture">Bild</th>
                    <th id="name">Name</th>
                    <th id="description">Beschreibung</th>
                    <th id="price">Preis</th>
                    <th id="delete">Löschen</th>
                </tr>
                <tr>
                    <td><img src="../../assets/images/logo.svg"></td>
                    <td>Schuhe</td>
                    <td>Schuhe halt</td>
                    <td>187.69</td>
                    <td class="outer"><a href=""><img src="../../assets/images/delete.svg" id="deletepic"></a></td>
                </tr>
                <tr>
                    <td><img src="../../assets/images/logo.svg"></td>
                    <td>Schuhe</td>
                    <td>Schuhe halt</td>
                    <td>187.69</td>
                    <td class="outer"><a href=""><img src="../../assets/images/delete.svg" id="deletepic"></a></td>
                </tr>
                <tr>
                    <td><img src="../../assets/images/logo.svg"></td>
                    <td>Schuhe</td>
                    <td>Schuhe halt</td>
                    <td>187.69</td>
                    <td class="outer"><a href=""><img src="../../assets/images/delete.svg" id="deletepic"></a></td>
                </tr>
                
        </table>
    
        <button type="submit" id="buy">Kaufen</button>

    </main>
    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php"
    ?>
</body>

</html>