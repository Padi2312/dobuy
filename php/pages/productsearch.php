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
                <select class="form-select" aria-label="Default select example">
                  <option selected>Sortierung wählen</option>
                  <option value=1>Preis</option>
                  <option value=2>Name</option>
                  <option value=3>Beliebtheit</option>
                </select>
              </div>
              <div class="col">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Kategorie wählen</option>
                    <option value=1>Elektronik</option>
                    <option value=2>Bücher</option>
                    <option value=3>Kleidung</option>
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
                    <input class="form-check-input" type="checkbox" value="" id="pricerangeactivate" min="0" max="500" steps="10">
                    <label class="form-check-label" for="pricerangeactivate">aktivieren</label>
                  </div>
                </div>
              </br>
                <div class="input-group">
                  <span id="basic-addon1" class="input-group-text">Mindestpreis</span>
                  <input type="number" id="pricerangelow" class="form-control"> 
                  <div class="col-md"></div>
                  <span id="basic-addon2" class="input-group-text">Mindestpreis</span>
                  <input type="number" id="pricerangelow" class="form-control"> 
                </div>
              </div>
            </div>
          </div>
        </details>
      </form>
    </div>

    <div id="response" class="response container">
      <div class="productname">
        <a id="productname" href="productsite.php">Samsung Galaxy A12</a>
      </div>
      <div class="content row">
        <div class="col-md">
          <div class="productpicture">
            <img id="productpicture" src="../../assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
          </div>
        </div>
        <div class="col-md">
          <div class="description">
            <p id="description">
              Batterien : 1 Lithium-Polymer Batterien erforderlich (enthalten).
              Auslaufartikel (Produktion durch Hersteller eingestellt) : Nein
            </p>
          </div>
        </div>
        <div class="col">
          <div class="price">
            <p id="price">198,00€</p>
          </div>
          <div class="tags">
            <p id="tags">Elektronik, Smartphone, Samsung</p>
          </div>
        </div>
      </div>
    </div>

    <hr id="split" />

    <div id="response" class="response container">
      <div class="productname">
        <a id="productname" href="productsite.php">Samsung Galaxy A12</a>
      </div>
      <div class="content row">
        <div class="col-md">
          <div class="productpicture">
            <img id="productpicture" src="../../assets/images/icon_user.svg" title="Placeholder" alt="Placeholder">
          </div>
        </div>
        <div class="col-md">
          <div class="description">
            <p id="description">
              Batterien : 1 Lithium-Polymer Batterien erforderlich (enthalten).
              Auslaufartikel (Produktion durch Hersteller eingestellt) : Nein
            </p>
          </div>
        </div>
        <div class="col">
          <div class="price">
            <p id="price">198,00€</p>
          </div>
          <div class="tags">
            <p id="tags">Elektronik, Smartphone, Samsung</p>
          </div>
        </div>
      </div>
    </div>

  </main>

  <?php
  include "../templates/footer.php";
  include "../templates/scripts.php";
  ?>

</body>

</html>