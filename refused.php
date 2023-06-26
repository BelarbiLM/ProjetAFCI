<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';
if(!isset($_GET['idOrder'])) 
{
    header("Location: home.php");// Si l'ID de la commande n'est pas présent dans l'URL, rediriger l'utilisateur vers une autre page
    exit();
}
?>
<header class="p-3">
    <div class="container header">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="<?php echo RACINE_SITE; ?>home.php" class="d-flex align-items-center justify-content-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="<?php echo "{$line_footer['logo']}"; ?>">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?php echo RACINE_SITE; ?>home.php" class="px-2 text-white text-decoration-none">Acceuil</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>shop.php" class="px-2 text-white text-decoration-none">Boutique</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>contact.php" class="px-2 text-white text-decoration-none">Contact</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>delivery.php" class="px-2 text-white text-decoration-none">Livraisons & Retours</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>about.php" class="px-2 text-white text-decoration-none">A propos</a></li>
            </ul>
        </div>
    </div>
</header>
<main class="refused">
    <div class="banner mt-0"><h2>Informations de paiement</span></h2></div>
    <div class="banner"><h3>Montant de la transaction : <span>00,00€</h3></div>  
    <div class="refused-div container text-center d-flex flex-column">
        <h2 class="mt-5">Votre paiement a échoué.</h2>
        <p>Malheureusement, le paiement de la commande <span>#00000</span> du <span>00/00/0000</span> qui a pour référence <span>xxx0000x0</span> a échoué. </p>
        <p>Une banque émettrice refusera souvent une tentative de débit d'une carte si le nom, la date d'expiration ou le code postal que vous avez entré ne correspond pas aux informations de la banque.</p>
        <p>Afin de procéder au paiement de votre commande et d'éviter l'annulation, nous vous conseillons de vous rapprocher de votre banque ou changer votre mode de paiement afin de pouvoir expédier les commandes le plus rapidement possible.</p>
        <p>Pour toutes informations complémentaires veuillez vous rendre sur la page "<a href="<?php echo RACINE_SITE; ?>contact.php">Contact</a>" du Services Clients en bas de votre écran.</p>
        <a href="<?php echo RACINE_SITE; ?>shop.php"><button type="button" class="btn btn-secondary mt-3 mb-2">Retour a la boutique</button></a>
        <a href="<?php echo RACINE_SITE; ?>payment.php"><button type="button" class="btn btn-secondary mb-5">Retour a la page de paiement</button></a>
    </div>
</main>
<?php include 'inc/footer.inc.php';?>