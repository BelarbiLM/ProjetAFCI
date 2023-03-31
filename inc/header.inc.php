<body>
<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="<?php echo RACINE_SITE; ?>home.php" class="d-flex align-items-center justify-content-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="inc/img/logo.png" alt="Logo">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?php echo RACINE_SITE; ?>home.php" class="nav-link px-2 text-white">Acceuil</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>shop.php" class="nav-link px-2 text-white">Boutique</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>contact.php" class="nav-link px-2 text-white">Contact</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>delivery.php" class="nav-link px-2 text-white">Livraisons & Retours</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>about.php" class="nav-link px-2 text-white">A propos</a></li>
            </ul>
    
            <form class="hidden formtest col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark">
            </form>
            <i class="bi bi-search text-white"></i>
            <i class="bi bi-basket text-white" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"></i>
        </div>
    </div>
</header>

<!--Panier-->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasWithBothOptions">
    <div class="offcanvas-header justify-content-end basket-close">
        <i class="bi bi-x-circle text-white" data-bs-dismiss="offcanvas"></i>
    </div>
    <div class="offcanvas-header justify-content-center basket-title">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">PANIER</h5>
    </div>
    <div class="offcanvas-body d-flex align-items-center justify-content-center text-center">
        <div class="basket-empty">
            <p>Vous n'avez pas de produit dans votre panier</p>
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">CONTINUER MES ACHATS</button>
        </div>
        <div class="basket-full basket-product hidden">
            <div class="card">
                <div class="card-img-top"></div>
                <div class="card-body text-center">
                    <p class="card-text">Nom du produit</p>
                    <p class="card-text">Prix du produiti en €</p>
                    <form method="post" id="form-2" class="d-flex justify-content-center align-items-center">
                        <div class="ml-2">
                            <label for="quantity">Quantité : </label>
                            <select name="quantity" id="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Ajouter au panier</button>
                    </form>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center flex-column text-center">
                <span>Total :  €</span>
                <a href="<?php echo RACINE_SITE; ?>basket.php"><button type="button" class="btn btn-outline-dark btn-full-1 my-3">FINALISER MA COMMANDE</button></a>
                <p>En passant votre commande, vous acceptez <a href="<?php echo RACINE_SITE; ?>obligations.php">les conditions d'utilisations</a></p>
                <p><a href="<?php echo RACINE_SITE; ?>basket.php">Voir le panier</a></p>
            </div>
        </div>
    </div>
</div>
<script>
// affichage de l'input search 
const searchIcon = document.querySelector('.bi-search');
const searchForm = document.querySelector('.formtest');
const inputSearch = document.querySelector('.formtest input[type="search"]');
searchIcon.addEventListener('click', function() {
    searchIcon.classList.add('hidden');
    searchForm.classList.remove('hidden');
    inputSearch.focus();
});
document.addEventListener('click', function(event) {
    const isClickInside = searchForm.contains(event.target) || searchIcon === event.target;
    if (!isClickInside) {
        searchForm.classList.add('hidden');
        searchIcon.classList.remove('hidden');
    }
});

// responsive du panier a 770px ou moins (plus d'onglet panier redirection vers la page directement)
const basketIcon = document.querySelector('.bi-basket');
window.addEventListener('resize', function() {
if (window.innerWidth <= 770) {
    basketIcon.addEventListener('click', function() {
    window.location.href = '/eCommerce/basket.php';
    });
    basketIcon.removeAttribute('data-bs-toggle');
    basketIcon.removeAttribute('data-bs-target');
    basketIcon.removeAttribute('aria-controls');
} else {
    basketIcon.setAttribute('data-bs-toggle', 'offcanvas');
    basketIcon.setAttribute('data-bs-target', '#offcanvasWithBothOptions');
    basketIcon.setAttribute('aria-controls', 'offcanvasWithBothOptions');
    basketIcon.removeEventListener('click', function() {
    window.location.href = '/eCommerce/basket.php';
    });
}
});
</script>
