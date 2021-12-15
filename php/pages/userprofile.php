<!DOCTYPE html>
<html lang="de">

<head>
    <?php
    include "../templates/head.php";
    ?>
    <link rel="stylesheet" href="../../css/userpage.css">
</head>

<body>

    <?php
    include_once "../common/session.php";
    include "../templates/header.php";
    include "../common/ordering.php";
    ?>

    <main>
        <div id="userdaten">

            Username </br>
            Name </br>
            E-Mail </br>

        </div>

        <div id="tableheadline">Ihre bestellten Produkte</div>
        <table id="table">
            <tr>
                <th id="picture">Bild</th>
                <th id="name">Name</th>
                <th id="description">Beschreibung</th>
                <th id="price">Preis</th>
            </tr>
            <?php
            $orders = new Ordering();
            $orderList = $orders->getOrdersOfUser('user');
            foreach ($orderList as $product) {
                echo '<tr>
                        <td>' . $product->getImagePath() . '</td>
                       <td>' . $product->getName() . '</td>
                      <td>' . $product->getDescription() . '</td>
                       <td class="outer">' . $product->getPrice() . '</td></tr>';
            }
            ?>
        </table>
        <div id="tableheadline">Ihre verkauften Produkte</div>
        <table id="table">
            <tr>
                <th id="picture">Bild</th>
                <th id="name">Name</th>
                <th id="descriptionexpanded">Beschreibung</th>
                <th id="price">Preis</th>
                <th id="profit">Anz/Profit</th>
            </tr>
            <tr>
                <td><img src="../../assets/images/logo.svg"></td>
                <td>Schuhe</td>
                <td>Schuhe halt</td>
                <td>187.69</td>
                <td class="outer">2 / 1 </td>
            </tr>
            <tr>
                <td><img src="../../assets/images/logo.svg"></td>
                <td>Schuhe</td>
                <td>Schuhe halt</td>
                <td>187.69</td>
                <td class="outer">2 / 1 </td>
            </tr>
            <tr>
                <td><img src="../../assets/images/logo.svg"></td>
                <td>Schuhe</td>
                <td>Schuhe halt</td>
                <td>187.69</td>
                <td class="outer">2 / 1 </td>
            </tr>
            <?php
            //foreach(product){
            //    echo '<tr><td>'.$product->getPicture().'</td>
            //    <td>'.$product->getName().'</td>
            //   <td>'.$product->getDescription().'</td>
            //    <td>'.$product->getPrice().'</td></tr>';
            //}
            ?>
        </table>
        <?php
        //if(user = händler){
        //    echo '<h2>Ihre angebotenen Produkte</h2>
        //    <table>
        //    <tr>
        //        <th>Bild</th>
        //        <th>Name</th>
        //       <th>Beschreibung</th>
        //        <th>Preis</th>
        //          <th>Anzahl/Gewinn>/th>
        //    </tr>';
        //       foreach(product){
        //            echo '<tr><td>'.$product->getPicture().'</td>
        //            <td>'.$product->getName().'</td>
        //            <td>'.$product->getDescription().'</td>
        //            <td>'.$product->getPrice().'</td></tr>
        //              <td>'.$product->getCount().' / '.$preduct->getProfit.'</td></tr>';
        //        }
        //    
        //    echo '</table>';
        //} else {
        //    echo '<button type="submit" id="dealer" action="">Produkte anbieten</button>';
        //}
        ?>
        <button type="submit" id="dealer" action="">Produkte anbieten</button>
    </main>
    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php"
    ?>
</body>

</html>