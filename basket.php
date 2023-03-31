<?php include 'inc/init.inc.php';?>
<?php include 'inc/head.inc.php';?>
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
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Recherche..." aria-label="Search">
            </form>
            <i class="bi bi-search text-white"></i>
        </div>
    </div>
</header>
<main class="basket">

    <div class="banner"><h2>Panier</h2></div>  
    <div class="basket-div d-flex">
        
        <div class="basket-zone-1">
            <h2 class="text-center">MON PANIER D'ACHATS</h2>
            
            <div class="basket-empty text-center pt-5">
                <p class="pt-5">Vous n'avez pas de produit dans votre panier</p>
                <a href="<?php echo RACINE_SITE; ?>shop.php"><button type="button" class="btn btn-outline-secondary">CONTINUER MES ACHATS</button></a>
            </div>

            <div class="basket-full pt-5 hidden">
                <h3 class="text-center mb-5">VOS PRODUITS</h3>
                <div class="col basket-product">

                    <div class="card">
                        <div class="card-img-top"></div>
                        <div class="card-body text-center">
                            <p class="card-text">Nom du produit</p>
                            <p class="card-text">50,00€</p>
                            <form method="post" id="form-2" class="d-flex justify-content-center align-items-center flex-column">
                                <div>
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
                    <div class="card">
                        <div class="card-img-top"></div>
                        <div class="card-body text-center">
                            <p class="card-text">Nom du produit</p>
                            <p class="card-text">50,00€</p>
                            <form method="post" id="form-2" class="d-flex justify-content-center align-items-center flex-column">
                                <div>
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
                </div>

                <div class="d-flex flex-column align-items-center mt-5">
                    <a href="<?php echo RACINE_SITE; ?>payment.php"><button type="button" class="btn btn-dark btn-full-2 mb-3">FINALISER MA COMMANDE</button></a>
                    <p><a href="<?php echo RACINE_SITE; ?>shop.php">Retour a la boutique</a></p>
                    <p>En passant votre commande, vous acceptez <a href="<?php echo RACINE_SITE; ?>obligations.php">les conditions d'utilisations</a></p>
                </div>
            </div>
        </div>    

        <div class="basket-zone-2">      
            <div>
                <table class="table table-hover" cellpadding="10">
                    <tbody class="table-group-divider">
                        <tr>
                            <th>Sous-total</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Livraison</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Taxes incluses</th>
                            <td>-</td>
                        </tr>
                    </tbody>
                    <tfoot class="table-group-divider">
                        <tr>
                            <th>Total</th>
                            <td>-</td>
                        </tr>
                    </tfoot>
                </table>  
                <p class="table-detail">Total calculé après choix de la methode de livraison</p>  
            </div>
        
            <div class="basket-empty text-center pt-5">
                <p>Vous n'avez pas de produit dans votre panier</p>
                <a href="<?php echo RACINE_SITE; ?>shop.php"><button type="button" class="btn btn-outline-secondary">CONTINUER MES ACHATS</button></a>
            </div>
            <div class="basket-full text-center pt-5 hidden ">
                <a href="<?php echo RACINE_SITE; ?>payment.php"><button type="button" class="btn btn-dark btn-full-2 mb-3">FINALISER MA COMMANDE</button></a>
                <p>En passant votre commande, vous acceptez <a href="<?php echo RACINE_SITE; ?>obligations.php">les conditions d'utilisations</a></p>
            </div>
            
            <div class="basket-service p-3 text-center">
                <h5>BESOIN D'AIDE ?</h5>
                <p>Le <a href="<?php echo RACINE_SITE; ?>contact.php">Service Client</a> est à votre disposition du lundi au dimanche de 9h à 20h.</p>
                <div class="d-flex align-items-center justify-content-center"><h5><i class="bi bi-credit-card"></i>  PAIEMENT 100 % SÉCURISÉ</h5></div>
                <p>Les données de votre carte bancaire sont envoyées de manière sécurisée. Toutes les informations sont protégées à l'aide de la technologie Secure Sockets Layer (SSL).</p>
            </div>        
        </div>
    
    </div>
</main>

<?php include 'inc/footer.inc.php';?>
