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
    <table class="table">
        <tr>
            <th class="pictureadm">Bild</th>
            <th class="nameadm">Name</th>
            <th class="priceadm">Preis</th>
            <th class="edit">Aktzeptieren</th>
        </tr>
        <?php
        $product1 = new Product();
        $products = $product1->getAllUserOffers();
        foreach ($products as $product) {
            $id = $product->getID();
            echo '<tr>
            <td class="pictureadm"><img class="img" src=' . $product->getImagePath() . ' alt="Produktfoto"></td>
            <td class="nameadm">' . $product->getName() . '</td>
            <td class="priceadm">' . $product->getPrice() . '€</td>';
            echo "<td class='edit'><a href='adminsectionaction.php?id=$id'>Bestätigen</a></td>
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
    <table class="table">
        <tr>
            <th class="pictureadm">Bild</th>
            <th class="nameadm">Name</th>
            <th class="priceadmouter">Preis</th>
        </tr>
        <?php
        $ordering = new Ordering();
        $products = $ordering->getAllSoldProducts();
        foreach ($products as $product) {
            $id = $product->getID();
            echo '<tr>
            <td class="pictureadm"><img class="img" src=' . $product->getImagePath() . ' alt="Produktfoto"></td>
            <td class="nameadm">' . $product->getName() . '</td>
            <td class="priceadmouter">' . $product->getPrice() . '€</td>';
        }
        ?>
    </table>
</details>
<hr />
<details>
    <summary class="h4">
        Übersicht aller Produkte
    </summary>
    <form action='addproduct.php' method='post'>
        <button type='submit' class='btn'>Produkt hinzufügen</button>
    </form>
    <table class="table">
        <tr>
            <th class="pictureadm">Bild</th>
            <th class="nameadm">Name</th>
            <th class="priceadm">Preis</th>
            <th class="edit">Ändern</th>
        </tr>
        <?php
        $product1 = new Product();
        $products = $product1->getAllProducts();
        foreach ($products as $product) {
            $id = $product->getID();
            echo '<tr>
            <td class="pictureadm"><img class="img" src=' . $product->getImagePath() . ' alt="Produktfoto"></td>
            <td class="nameadm">' . $product->getName() . '</td>
            <td class="priceadm">' . $product->getPrice() . '€</td>';
            echo "<td class='edit'><a href='editproduct.php?id=$id'><img src='../../assets/images/edit.svg' alt='Müllkorb'></a></td>
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

    <table class="table">
        <tr>
            <th class="useradm">Username</th>
            <th class="usernameadm">Name</th>
            <th class="emailadm">E-Mail</th>
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