<?php include 'inc/init.inc.php';?>
<?php include 'inc/head.inc.php';?>
<?php include 'inc/header.inc.php';?>

<main>

    <div id="myCarousel" class="carousel slide border-bottom" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="carousel-caption text-black">
                        <div><img src="#" width="150" height="150"></div>
                        <div>
                            <h1>Nom du produit</h1>
                            <p>Phrase enjolivante et adjéctiver du produit</p>
                            <p>Prix du produit en €</p>
                            <p><a class="btn btn-lg btn-primary" href="product.php">Plus de détails</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption text-black">
                        <div><img src="#" width="150" height="150"></div>
                        <div>
                            <h1>Nom du produit</h1>
                            <p>Phrase enjolivante et adjéctiver du produit</p>
                            <p>Prix du produit en €</p>
                            <p><a class="btn btn-lg btn-primary" href="product.php">Plus de détails</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption text-black">
                        <div><img src="#" width="150" height="150"></div>
                        <div>
                            <h1>Nom du produit</h1>
                            <p>Phrase enjolivante et adjéctiver du produit</p>
                            <p>Prix du produit en €</p>
                            <p><a class="btn btn-lg btn-primary" href="product.php">Plus de détails</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>  <style>.carousel-indicators [data-bs-target] {background-color: black;}</style>

        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><svg viewBox='0 0 16 16' fill='000'><path d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/></svg></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><svg viewBox='0 0 16 16' fill='000'><path d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/></svg></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    <div class="container marketing">

        <h1 class="text-center">Meileures ventes :</h1>
        <div class="row">
            <div class="col-lg-4">
                <img src="" width="150" height="150">
                <h2 class="fw-normal">Nom du produit</h2>
                <p>Phrase enjolivante et adjéctiver du produit</p>
                <p>Prix du produit en €</p>
                <p><a class="btn btn-secondary" href="product.php">Plus de détails</a></p>
            </div>
            <div class="col-lg-4">
                <img src="" width="150" height="150">
                <h2 class="fw-normal">Nom du produit</h2>
                <p>Phrase enjolivante et adjéctiver du produit</p>
                <p>Prix du produit en €</p>
                <p><a class="btn btn-secondary" href="product.php">Plus de détails</a></p>
            </div>
            <div class="col-lg-4">
                <img src="" width="150" height="150">
                <h2 class="fw-normal">Nom du produit</h2>
                <p>Phrase enjolivante et adjéctiver du produit</p>
                <p>Prix du produit en €</p>
                <p><a class="btn btn-secondary" href="product.php">Plus de détails</a></p>
            </div>
        </div>

        <hr class='featurette-divider'>

        <div class='row featurette'>
            <div class='col-md-7'>
                <h2 class='featurette-heading fw-normal lh-1'>Livraisons Gratuites</h2>
                <p class='lead'>Pour les commandes de plus de 100€.</p>
            </div>
        </div>

        <hr class='featurette-divider'>

        <div class='row featurette'>
            <div class='col-md-7 order-md-2 text-end'>
                <h2 class='featurette-heading fw-normal lh-1'>Remboursements</h2>
                <p class='lead'>Garanti à 100% si conditions réspecter.</p>
            </div>
        </div>

        <hr class='featurette-divider'>

        <div class='row featurette'>
            <div class='col-md-7'>
                <h2 class='featurette-heading fw-normal lh-1'>Assistance 24h/24 et 7j/7</h2>
                <p class='lead'>Via Téléphone, Email et What's App.</p>
            </div>
        </div>

        <hr class='featurette-divider'>

        <div class='row featurette'>
            <div class='col-md-7 order-md-2 text-end'>
                <h2 class='featurette-heading fw-normal lh-1'>Paiement sécurisé</h2>
                <p class='lead'>Paiements en ligne sécurisés.</p>
            </div>
        </div>

        <hr class='featurette-divider'>

    </div>
</main>

<?php include 'inc/footer.inc.php';?>

