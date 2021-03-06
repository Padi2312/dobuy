<!-- Durch diese Datei wird die Suchseite angezeigt auf der man auch Sortierung und Filter einstellen kann -->
<?php
include_once "../common/product.php";
include_once "../common/category.php";
include_once "../common/session.php";
?>

<!DOCTYPE html>
<html lang="de">

<head>
  <?php
  include "../templates/head.php";
  ?>
  <link rel="stylesheet" href="../../css/productsearch.css">
</head>

<body>

  <?php
  include "../templates/header.php";
  ?>

  <main>

    <div class="searchbar">

      <form action="productsearch.php" method="get">
        <div class="input-group">
          <input type="text" class="form-control" id="searchterm" placeholder="Suchen Sie hier" name="searchterm">
          <input class="btn btn-outline-secondary" type="submit" id="button-addon2" value="Suchen">
        </div>
        <details id="filters">
          <summary>Filters</summary>
          <div class="filterbar container">
            <div class="row">
              <div class="col">
                <select class="form-select" aria-label="Default select example" name="sort" onchange="this.form.submit()">
                  <?php
                  $options = array("Sortierung wählen", "Preis", "Name");
                  foreach ($options as $index => $item) {
                    if (isset($_GET["sort"]) && $index == $_GET["sort"]) {
                      echo "<option value=$index selected>$item</option>";
                    } else {
                      echo "<option value=$index>$item</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col">
                <select class="form-select" aria-label="Default select example" name="category" onchange="this.form.submit()">
                  <option selected>Kategorie wählen</option>

                  <?php
                  $categoryRepo = new Category();
                  $categoryList = $categoryRepo->getAllCategories();
                  foreach ($categoryList as $category) {
                    if (isset($_GET["category"]) && $category->getID() == $_GET["category"]) {
                      echo '<option value =' . $category->getID() . ' selected>' . $category->getName() . '</option>';
                    } else {
                      echo '<option value =' . $category->getID() . '>' . $category->getName() . '</option>';
                    }
                  }
                  ?>

                </select>
              </div>
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="availablecheck" name="available" onchange="this.form.submit()">
                  <label class="form-check-label" for="availablecheck">Nur Verfügbare anzeigen</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div id="formatline">
                  <label class="form-label">Preisspanne:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pricerangeactivate" name="activated">
                    <label class="form-check-label" for="pricerangeactivate">Preisspanne aktivieren</label>
                  </div>
                </div>
                <br>
                <div class="input-group">
                  <span id="basic-addon1" class="input-group-text">Mindestpreis</span>
                  <input type="number" id="pricerangelow" class="form-control" name="price1">
                  <div class="col-md"></div>
                  <span id="basic-addon2" class="input-group-text">Maximalpreis</span>
                  <input type="number" id="pricerangehigh" class="form-control" name="price2">
                </div>
              </div>
            </div>
            <hr />
          </div>
        </details>

      </form>
    </div>





    <?php

    loadProducts(getParameters());

    /**
     * Returns Products as ProductModels which match the filters and searches. Also sorting is included.
     */
    function loadProducts($parameters)
    {
      $repo = new Product();
      $category = new Category();
      $productList = $repo->filterProducts($parameters[0], $parameters[1], $parameters[2], $parameters[3], $parameters[4], $parameters[5]);

      foreach ($productList as $product) {
        $categoryModel = $category->getCategoryById($product->getCategory());
        echo
        '<div class="response container">
                    <div class="productname h3">
                      <a class="productnameresponse" href="productsite.php?id=' . $product->getID() . '">' . $product->getName() . '</a>
                    </div>
                    <div class="content row">
                      <div class="col-md">
                        <div class="productpicture">
                          <img class="productpictureresponse" src="' . $product->getImagePath() . '" title="Placeholder" alt="Placeholder">
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="description">
                          <p>' . $product->getDescription() . '</p>
                        </div>
                      </div>
                      <div class="col">
                        <div class="price">
                          <p>' . $product->getPrice() . '€</p>
                        </div>
                        <div class="tags">
                          <p>' . $categoryModel->getName() . '</p>
                        </div>
                      </div>
                    </div>
                  </div>
              
                  <hr class="split" />';
      }
    }

    /**
     * Returns Parameters needed for Filter Function
     */
    function getParameters()
    {

      if (isset($_GET['sort'])) {
        if (intval($_GET['sort']) === 0) {
          $sort = null;
        } else {
          $sort = intval($_GET['sort']);
        }
      } else {
        $sort = null;
      }

      if (isset($_GET['available'])) {
        $available = true;
      } else {
        $available = false;
      }

      if (isset($_GET['category'])) {
        if (intval($_GET['category']) === 0) {
          $category = null;
        } else {
          $category = intval($_GET['category']);
        }
      } else {
        $category = null;
      }

      if (isset($_GET['activated'])) {
        $active = true;
      } else {
        $active = false;
      }

      if (isset($_GET['price1']) && isset($_GET['price2'])) {
        if (intval($_GET['price1']) < intval($_GET['price2'])) {
          $values = array();
          array_push($values, $_GET['price1']);
          array_push($values, $_GET['price2']);
        } else {
          $values = null;
        }
      } else {
        $values = null;
      }

      if (isset($_GET['searchterm'])) {
        if ($_GET['searchterm'] === "") {
          $keyword = null;
        } else {
          $keyword = $_GET['searchterm'];
        }
      } else {
        $keyword = null;
      }


      $parameters = array();

      array_push($parameters, $sort);
      array_push($parameters, $available);
      array_push($parameters, $category);
      array_push($parameters, $active);
      array_push($parameters, $values);
      array_push($parameters, $keyword);

      return $parameters;
    }

    ?>

  </main>

  <?php
  include "../templates/footer.php";
  include "../templates/scripts.php";
  ?>

</body>

</html>