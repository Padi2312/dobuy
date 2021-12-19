<!-- Diese Datei baut das Userprofil für den Admin und somit die Adminpage auf -->
<?php
include_once '../common/notloggedin.php';
include_once "../common/product.php";
include_once "../common/ordering.php";
include_once "../common/user.php";
?>

<details>
    <summary class="h4">
        Produktangebote von Benutzern
    </summary>
    <table id="table">
        <tr>
            <th id="pictureadm">Bild</th>
            <th id="nameadm">Name</th>
            <th id="priceadm">Preis</th>
            <th id="priceadm">Aktzeptieren</th>
        </tr>
        <?php
        $product1 = new Product();
        $products = $product1->getAllUserOffers();
        foreach ($products as $product) {
            $id = $product->getID();
            echo '<tr>
            <td id="pictureadm"><img class="img" src=' . $product->getImagePath() . '></td>
            <td id="nameadm">' . $product->getName() . '</td>
            <td id="priceadm">' . $product->getPrice() . '€</td>';
            echo "<td id='edit' class='outer'><a href='adminsectionaction.php?id=$id'>Bestätigen</a></td>
                </tr>";
        }
        ?>
    </table>
</details>
<hr />
<details>
    <summary class="h4">
        Verkaufte Produkte
    </summary>
    <table id="table">
        <tr>
            <th id="pictureadm">Bild</th>
            <th id="nameadm">Name</th>
            <th id="priceadm">Preis</th>
        </tr>
        <?php
        $ordering = new Ordering();
        $products = $ordering->getAllSoldProducts();
        foreach ($products as $product) {
            $id = $product->getID();
            echo '<tr>
            <td id="pictureadm"><img class="img" src=' . $product->getImagePath() . '></td>
            <td id="nameadm">' . $product->getName() . '</td>
            <td id="priceadm" class="outer">' . $product->getPrice() . '€</td>';
        }
        ?>
    </table>
</details>
<hr />
<details>
    <summary class="h4">
        Übersicht aller Produkte
    </summary>
    <a href="addproduct.php">
        <button type="submit" class="btn" id="addproduct" action="">Produkt hinzufügen</button>
    </a>
    <table id="table">
        <tr>
            <th id="pictureadm">Bild</th>
            <th id="nameadm">Name</th>
            <th id="priceadm">Preis</th>
            <th id="edit">Ändern</th>
        </tr>
        <?php
        $product1 = new Product();
        $products = $product1->getAllProducts();
        foreach ($products as $product) {
            $id = $product->getID();
            echo '<tr>
            <td id="pictureadm"><img class="img" src=' . $product->getImagePath() . '></td>
            <td id="nameadm">' . $product->getName() . '</td>
            <td id="priceadm">' . $product->getPrice() . '€</td>';
            echo "<td id='edit' class='outer'><a href='editproduct.php?id=$id'><img src='../../assets/images/edit.svg'></a></td>
                </tr>";
        }
        ?>
    </table>
</details>
<hr />
<details class="mb-5">
    <summary class="h4">
        Übersicht aller Benutzer
    </summary>

    <table id="table">
        <tr>
            <th id="useradm">Username</th>
            <th id="usernameadm">Name</th>
            <th id="emailadm">E-Mail</th>
        </tr>
        <?php
        $user = new User();
        $userList = $user->getAllUsers();
        foreach ($userList as $item) {
            echo '<tr>
            <td>' . $item->getUsername() . '</td>
            <td>' . $item->getFullname() . '</td>
            <td class="outer">' . $item->getEmail() . '</td>
        </tr>';
        } ?>
    </table>
</details>