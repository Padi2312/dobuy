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
                        <td id="picture"><img class="img" src=' . $product->getImagePath() . '></td>
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
            </tr>
            <?php
            $orders = new Ordering();
            $orderList = $orders->usersSoldProducts('user');
            foreach ($orderList as $product) {
                echo '<tr>
                        <td id="picture"><img class="img" src=' . $product->getImagePath() . '></td>
                        <td>' . $product->getName() . '</td>
                        <td class="outer">' . $product->getPrice() . '</td>
                    </tr>';
            }

            ?>
        </table>
    </details>