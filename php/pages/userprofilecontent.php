<!DOCTYPE html>
<html lang="de">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#ffe600">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/userpage.css">
    <title>Konto</title>
</head>

<body>
    <main>
    <h1>Ihre bestellten Produkte</h1>
        <table>
            <tr>
                <th>Bild</th>
                <th>Name</th>
                <th>Beschreibung</th>
                <th>Preis</th>
            </tr>
            <?php
                foreach(product){
                    echo '<tr><td>'.$product->getPicture().'</td>
                    <td>'.$product->getName().'</td>
                    <td>'.$product->getDescription().'</td>
                    <td>'.$product->getPrice().'</td></tr>';
                }
            ?>
        </table>    

        <?php
        if(user = händler){
            echo '<h2>Ihre angebotenen Produkte</h2>
            <table>
            <tr>
                <th>Bild</th>
                <th>Name</th>
                <th>Beschreibung</th>
                <th>Preis</th>
            </tr>';
                foreach(product){
                    echo '<tr><td>'.$product->getPicture().'</td>
                    <td>'.$product->getName().'</td>
                    <td>'.$product->getDescription().'</td>
                    <td>'.$product->getPrice().'</td></tr>';
                }
            
            echo '</table>';
        }
        ?>
    </main>
</body>

</html>