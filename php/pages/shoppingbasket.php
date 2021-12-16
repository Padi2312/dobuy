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
    include_once "../common/shoppingcard.php";
    include "../templates/header.php";
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
            <?php
            $shoppingCard = new ShoppingCard();
            $shoppingCardList = $shoppingCard->getShoppingCardByUser();
            foreach ($shoppingCardList as $product) {
                echo '<tr>
                        <td ><img src=' . $product->getImagePath() . '></td>
                        <td>' . $product->getName() . '</td>
                        <td>' . $product->getDescription() . '</td>
                        <td>' . $product->getPrice() . '</td>
                    </tr>';
            }
            ?>
        </table>

        <button type="submit" id="buy">Kaufen</button>

    </main>
    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php"
    ?>
</body>

</html>