<!-- Diese Datei zeigt das Userprofil an -->
<details>
    <summary class="h2">
        Ihre bestellten Produkte
    </summary>

    <div class="container">
        <?php
        $orders = new Ordering();
        $username = Session::getUsername();
        $orderList = $orders->getOrdersOfUser($username);
        if (count($orderList) == 0) {
            echo "<p class='m-4 h3 text-center'>Noch keine Produkte gekauft</p>";
        }

        foreach ($orderList as $product) {
            $imagePath = $product->getImagePath();
            $name = $product->getName();
            $price = $product->getPrice();
            echo "<div class='card mb-3 p-2' style='border: 2px solid #dddddd;'>
            <div class='row g-0'>
                <div class='col-md-4'>
                    <img src='$imagePath' class='img-fluid rounded-start' alt='...'>
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                        <h5 class='card-title'>$name</h5>
                        <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class='card-text'><small class='text-muted'>Kaufpreis: $price € </small></p>
                    </div>
                </div>
            </div>
        </div>";
        }

        ?>
    </div>
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
        $username = Session::getUsername();
        $orderList = $orders->usersSoldProducts($username);

        if (count($orderList) == 0) {
            echo "<p class='m-4 h3 text-center'>Noch keine Produkte verkauft</p>";
        }
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