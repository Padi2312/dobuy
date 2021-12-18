    <details>
        <summary class="h2">
            Ihre bestellten Produkte
        </summary>
        <table id="table">
            <tr>
                <th id="picture">Bild</th>
                <th id="name">Name</th>
                <th id="price">Preis</th>
            </tr>
            <?php
            $orders = new Ordering();
            $orderList = $orders->getOrdersOfUser('user');
            foreach ($orderList as $product) {
                echo '<tr>
                        <td id="picture">' . $product->getImagePath() . '</td>
                        <td>' . $product->getName() . '</td>
                        <td class="outer">' . $product->getPrice() . '</td>
                    </tr>';
            }
            ?>
        </table>
    </details>
    <hr />
    <details>
        <summary class="h2">
            Ihre verkauften Produkte
        </summary>
        <table id="table">
            <tr>
                <th id="picture">Bild</th>
                <th id="name">Name</th>
                <th id="price">Preis</th>
                <th id="profit">Profit</th>
            </tr>
            <tr>
                <td><img src="../../assets/images/logo.svg"></td>
                <td>Schuhe</td>
                <td>187.69</td>
                <td class="outer">2 / 1 </td>
            </tr>
            <tr>
                <td><img src="../../assets/images/logo.svg"></td>
                <td>Schuhe</td>
                <td>187.69</td>
                <td class="outer">2 / 1 </td>
            </tr>
            <tr>
                <td><img src="../../assets/images/logo.svg"></td>
                <td>Schuhe</td>
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
        <button type="submit" class="btn" id="dealer" action="">Produkte anbieten</button>
    </details>