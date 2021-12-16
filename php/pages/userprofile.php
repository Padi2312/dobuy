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
    include_once "../common/session.php";
    include "../templates/header.php";
    include "../common/ordering.php";
    include "../common/product.php";
    ?>
    
    <main>
        <div id="userdata">
            
            <span class="kind">Benutzername</span>: Hubli1
            <span class="kind">Name</span>: Markus Hub
            <span class="kind">E-Mail</span>: MarkusderGeilste@Hub.de
                   
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
                            <td id="picture">' . $product->getImagePath() . '</td>
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
        <?php
        if ($session->isAdmin()){
        echo '<div id="tableheadline">Übersicht aller Produkte</div>
            <table id="table">
                <tr>
                    <th id="pictureadm">Bild</th>
                    <th id="nameadm">Name</th>
                    <th id="descriptionadm">Beschreibung</th>
                    <th id="priceadm">Preis</th>
                    <th id="edit">Bearbeiten</th>
                </tr>';
                $product1 = new Product();
                $products = $product1->getAllProducts();
                foreach ($products as $product){
                    echo '<tr>
                    <td id="display"><img src='.$product->getImagePath().'></td>
                    <td id="display">'.$product->getName().'</td>
                    <td id="display">'.$product->getDescription().'</td>
                    <td id="display">'.$product->getPrice().'</td>
                    <td  id="display"class="outer"><a href=""><img src="../../assets/images/edit.svg"></a></td>
                    </tr>';
                }
                echo '</table>';
        '<button type="submit" id="addproduct" action="">Produkte hinzufügen</button>
            
        <div id="tableheadline">Übersicht aller User</div>
            <table id="table">
                <tr>
                    <th id="useradm">Username</th>
                    <th id="usernameadm">Name</th>
                    <th id="emailadm">E-Mail-Adresse</th>
                    <th id="edit">Bearbeiten</th>
                </tr>
                <tr>
                    <td>Gertalod</td>
                    <td>Simon Lattin</td>
                    <td>simon@lattin.de</td>
                    <td class="outer"><a href=""><img src="../../assets/images/edit.svg"></a></td>
                </tr>
                <tr>
                    <td>Gertalod</td>
                    <td>Simon Lattin</td>
                    <td>simon@lattin.de</td>
                    <td class="outer"><a href=""><img src="../../assets/images/edit.svg"></a></td>
                </tr>
                <tr>
                    <td>Gertalod</td>
                    <td>Simon Lattin</td>
                    <td>simon@lattin.de</td>
                    <td class="outer"><a href=""><img src="../../assets/images/edit.svg"></a></td>
                </tr>
            </table>'; 
        } 
    ?>
    </main>
    <?php
    include "../templates/footer.php";
    include "../templates/scripts.php"
    ?>
</body>

</html>