<!DOCTYPE html>
<html lang="">

<head>
  <?php
  include "../templates/head.php";
  ?>
  <link rel="stylesheet" href="../../css/productsearch.css">
</head>

<body>

  <?php
  include_once "../common/session.php";
  include "../templates/header.php";
  ?>

  <main>

    <div class="searchbar">
      <form action="search.php" method="post">
        <input type="text" class="form-control" id="searchterm" placeholder="Suchen Sie hier" name="searchterm" onchange="<?php echo "test" ?>">
        <details id="filters">
          <summary>Filters</summary>
          <div  class="filterbar container">
            <div class="row">
              <div class="col">
                <lable for="sorting">Sortierung</span></br>
                <select class="form-select" aria-label="Default select example" id="sorting">
                  <option selected>Sortierung wählen</option>
                  <option >Preis</option>
                  <option >Name</option>
                  <option >Beliebtheit</option>
                </select>
              </div>
              <div class="col">
                <lable for="category">Kategorie</span></br>
                <select class="form-select" aria-label="Default select example" id="category">
                    <option selected>Kategorie wählen</option>
                    <option >Elektronik</option>
                    <option >Bücher</option>
                    <option >Kleidung</option>
                  </select>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="availablecheck">
                  <label class="form-check-label" for="availablecheck">Nur verfügbare anzeigen</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div id="formatline">
                  <label for="pricerange" class="form-label">Preisspanne:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="pricerangeactivate">
                    <label class="form-check-label" for="pricerangeactivate">aktivieren</label>
                  </div>
                </div>
              </br>
                <input type="range" class="form-range" min="0" max="500" id="pricerange"> 
                <div class="rangeindicator">
                  <div id="left">0</div><div id="right">500</div>
                </div>
              </div>
            </div>
          </div>
        </details>
      </form>
    </div>

    <div id="response" class="grid-container">
      <div class="productpicture">
        <img id="productpicture" src="../../assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
      </div>
      <div class="productname">
        <a id="productname" href="productsite.php">Samsung Galaxy A12</a>
      </div>
      <div class="description">
        <p id="description">
          Batterien : 1 Lithium-Polymer Batterien erforderlich (enthalten).
          Auslaufartikel (Produktion durch Hersteller eingestellt) : Nein
        </p>
      </div>
      <div class="tags">
        <p id="tags">Elektronik, Smartphone, Samsung</p>
      </div>
      <div class="price">
        <p id="price">198,00€</p>
      </div>
    </div>

    <hr id="split" />

    <div id="response" class="grid-container">
      <div class="productpicture">
        <img id="productpicture" src="../../assets/images/icon_cart.svg" title="Placeholder" alt="Placeholder">
      </div>
      <div class="productname">
        <a id="productname" href="productsite.php">Samsung Galaxy A12</a>
      </div>
      <div class="description">
        <p id="description">
          Batterien : 1 Lithium-Polymer Batterien erforderlich (enthalten).
          Auslaufartikel (Produktion durch Hersteller eingestellt) : Nein
        </p>
      </div>
      <div class="tags">
        <p id="tags">Elektronik, Smartphone, Samsung</p>
      </div>
      <div class="price">
        <p id="price">198,00€</p>
      </div>
    </div>

  </main>

  <?php
  include "../templates/footer.php";
  include "../templates/scripts.php";
  ?>

</body>

</html>