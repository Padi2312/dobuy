<!-- Diese Datei zeigt die Warenkorbseite an -->
<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include "../templates/head.php";
    ?>
    <link rel="stylesheet" href="../../css/shoppingbasket.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <?php
    include_once "../common/session.php";
    include_once "../common/shoppingcard.php";
    include "../templates/header.php";
    $shoppingCard = new ShoppingCard();
    ?>

    <main>

        <div class="container-fluid justify-content-center ">
            <p class="h1 text-center">Warenkorb</p>
            <div>
                <?php
                $shoppingCardList = $shoppingCard->getShoppingCardByUser();
                foreach ($shoppingCardList as $product) {
                    $id = $product->getID();
                    $imagePath = $product->getImagePath();
                    $name = $product->getName();
                    $price = $product->getPrice();
                    echo "<div class='card mb-3 p-2' style='border: 2px solid #dddddd;'>
            <div class='row g-0'>
                <div class='col-sm-4'>
                    <img src='$imagePath' style='max-height:400px;' class='img-fluid' alt='...'>
                </div>
                <div class='col-sm-4'>
                    <div class='card-body'>
                        <h5 class='card-title'>$name</h5>
                        <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class='card-text'><small class='text-muted'>Kaufpreis: $price € </small></p>
                    </div>
                </div>
                <div class='col'>
                    <form action='shoppingbasketaction.php?id=$id' method='post'>
                        <button class='btn' type='submit'>
                                    Entfernen  <i class='fa fa-trash' aria-hidden='true'></i>
                        </button>   
                    </form>
                </div>
            </div>
        </div>";
                }
                ?>
            </div>
            <div class="buttonline">
                <?php
                if ($shoppingCard->getAmountOfShoppingCard() > 0) {
                    echo " <form action='shoppingbasketaction.php?type=buy'  method='post'>
                        <button type='submit' class='btn' id='buy'>Kaufen</button>
                        </form>";
                }
                ?>
            </div>

        </div>


    </main>
    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php"
    ?>
</body>

</html>