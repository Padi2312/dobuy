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
    $shoppingCard = new ShoppingCard();
    ?>

    <main>

        </table>
        <div id="tableheadline">Warenkorb</div>
        <table id="table">
            <tr>
                <th id="picture">Bild</th>
                <th id="name">Name</th>
                <th id="price">Preis</th>
                <th id="delete">Löschen</th>
            </tr>
            <?php
            $shoppingCardList = $shoppingCard->getShoppingCardByUser();
            foreach ($shoppingCardList as $product) {
                $id = $product->getID();
                echo '<tr>
                        <td ><img src=' . $product->getImagePath() . '></td>
                        <td>' . $product->getName() . '</td>
                        <td>' . $product->getPrice() . '</td>
                        <td>';
                echo "<form action='shoppingbasketaction.php?id=$id' method='post'>";
                echo '<button class="btn">
                                Entfernen
                            </button>   
                            </form>
                        </td>
                    </tr>';
            }
            ?>
        </table>
        <div class="buttonline">
            <?php
            if ($shoppingCard->getAmountOfShoppingCard() > 0) {
                echo " <form action='shoppingbasketaction.php?type=buy'  method='post'>
                        <button type='submit' class='btn' id='buy'>Kaufen</button>
                        </form>";
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