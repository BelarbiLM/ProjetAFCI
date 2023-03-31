<?php include 'inc/init.inc.php'; ?>
<?php include 'inc/head.inc.php'; ?>
<?php include 'inc/header.inc.php'; ?>

<main class="shop">
  <section class="text-center container">

    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 w-100">
        <h1 class="fw-light my-5">Notre Boutique</h1>
        <div class="d-flex flex-wrap justify-content-center my-3">
          <p>Filtrer :</p>
          <div>
            <a class="link-dark"><input type="checkbox" class="mx-2" id="categorie-1"><label for="categorie-1">Catégorie 1</label></a>
          </div>
          <div>
            <a class="link-dark"><input type="checkbox" class="mx-2" id="categorie-2"><label for="categorie-2">Catégorie 2</label></a>
          </div>
          <div>
            <a class="link-dark"><input type="checkbox" class="mx-2" id="categorie-3"><label for="categorie-3">Catégorie 3</label></a>
          </div>
          <div>
            <a class="link-dark"><input type="checkbox" class="mx-2" id="categorie-4"><label for="categorie-4">Catégorie 4</label></a>
          </div>
          <div>
            <a class="link-dark"><input type="checkbox" class="mx-2" id="categorie-5"><label for="categorie-5">Catégorie 5</label></a>
          </div>
        </div> 
        <div class="d-flex flex-wrap justify-content-center my-3">
          <p>Tri :</p>
          <div class="mx-2">
            <input type="radio" name="tri" id="filter-input-2 recent">
            <label for="recent">Tri par de plus récent au plus ancien</label>
          </div>
          <div class="mx-2">
            <input type="radio" name="tri" id="filter-input-2 more">
            <label for="more">Tri par tarif croissant</label>
          </div>
          <div class="mx-2">
            <input type="radio" name="tri" id="filter-input-2 less">
            <label for="less">Tri par tarif décroissant</label>
          </div>
        </div>
        <p class='text-muted'>Notre gamme de traceurs est scindée en fonction du mode d'alimentation : traceur autonome, le plus souvent étanche et aimanté, doté d'une batterie rechargeable; traceur à brancher sur la batterie du véhicule.</p>
      </div>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 1</p>
              <p class='card-text'>Prix du produit 1 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 2</p>
              <p class='card-text'>Prix du produit 2 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 3</p>
              <p class='card-text'>Prix du produit 3 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 4</p>
              <p class='card-text'>Prix du produit 4 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 5</p>
              <p class='card-text'>Prix du produit 5 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 6</p>
              <p class='card-text'>Prix du produit 6 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 7</p>
              <p class='card-text'>Prix du produit 7 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 8</p>
              <p class='card-text'>Prix du produit 8 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 9</p>
              <p class='card-text'>Prix du produit 9 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 10</p>
              <p class='card-text'>Prix du produit 10 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 11</p>
              <p class='card-text'>Prix du produit 11 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 12</p>
              <p class='card-text'>Prix du produit 12 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 13</p>
              <p class='card-text'>Prix du produit 13 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></svg>
            <div class="card-body text-center">
              <p class='card-text'>Produit 14</p>
              <p class='card-text'>Prix du produit 14 en €</p>
              <a href="product.php"><button type="submit" class="btn btn-outline-success mt-3">Voir la fiche</button></a>
            </div>
          </div>
        </div>
          
      </div>
    </div>
    
  </div>
</main>

<?php include 'inc/footer.inc.php';?>

  


