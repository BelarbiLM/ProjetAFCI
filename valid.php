<?php include 'inc/init.inc.php';?>
<?php include 'inc/head.inc.php';?>
<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="<?php echo RACINE_SITE; ?>home.php" class="d-flex align-items-center justify-content-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="inc/img/logo.png" alt="Logo">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"><!--mettre text-secondary quand on clique sur le lien-->
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
<main class="valid">

    <div class="banner mt-0"><h2>Informations de paiement</span></h2></div>
    <div class="banner"><h3>Montant de la transaction : <span>00,00€</h3></div>  
    
    <div class="valid-div container text-center">

        <h2 class="mt-5">Votre paiement a été accepté.</h2>
        <p>Une confirmations de paiement et les informations relatives a la livraisons vous seront émise par email à l'adresse suivante : </p>
        <span>xxxxx@xxxx.xx</span>
        <p>La facture vous seras envoyer comme convenu a l'adresse suivante : </p>
        <span>xxxxx@xxxx.xx</span>
        <p>Nous vous conseillons de conserver vos informations de paiement.</p>
        <table class="table table-borderless">
            <tr>
                <th>Date de la transaction</th>
                <td>00/00/0000 00:00</td>
            </tr>
            <tr>
                <th>Numéro de la carte</th>
                <td>0000 0000 0000 0000</td>
            </tr>
            <tr>
                <th>Numéro de la commande</th>
                <td>#00000</td>
            </tr>
            <tr>
                <th>Référence de la transaction</th>
                <td>xxx0000x0</td>
            </tr>
        </table>
        <p>Pour toutes informations complémentaires veuillez vous rendre sur la page "<a href="<?php echo RACINE_SITE; ?>contact.php">Contact</a>"" ou "<a href="<?php echo RACINE_SITE; ?>delivery.php">Livraisons & Retours</a>"" du Services Clients en bas de votre écran.</p>
        <p>Merci pour votre achat !</p>
        <a href="<?php echo RACINE_SITE; ?>shop.php"><button type="button" class="btn btn-secondary mt-3 mb-5">Retour a la boutique</button></a>
    
    </div>
</main>
<?php include 'inc/footer.inc.php';?>