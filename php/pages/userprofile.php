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
    ?>
    
    <main>
        <div>
            <span class="test">Haloo Markus</span>
        </div>
        <h1>Ihre bestellten Produkte</h1>
            <table id="table">
                <tr>
                    <th>Bild</th>
                    <th>Name</th>
                    <th>Beschreibung</th>
                    <th>Preis</th>
                </tr>
                <tr>
                    <td></td>
                    <td>Schuhe</td>
                    <td>Schuhe halt</td>
                    <td>187.69</td>
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
        </div>
        <?php
        //if(user = händler){
        //    echo '<h2>Ihre angebotenen Produkte</h2>
        //    <table>
        //    <tr>
        //        <th>Bild</th>
        //        <th>Name</th>
        //       <th>Beschreibung</th>
        //        <th>Preis</th>
        //    </tr>';
        //       foreach(product){
        //            echo '<tr><td>'.$product->getPicture().'</td>
        //            <td>'.$product->getName().'</td>
        //            <td>'.$product->getDescription().'</td>
        //            <td>'.$product->getPrice().'</td></tr>';
        //        }
        //    
        //    echo '</table>';
        //}
        ?>
    </main>
    <?php
    include "../templates/footer.php";
    ?>
</body>

</html>