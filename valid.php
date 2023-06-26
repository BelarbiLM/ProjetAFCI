<?php 
include 'inc/init.inc.php';
include 'inc/head.inc.php';

if(isset($_GET['idOrder'])) {
    $id_order = $_GET['idOrder'];
    $result_order = executeQuery("SELECT * FROM `order` WHERE `idOrder` = $id_order");
    $line_order = $result_order->fetch_assoc();
    $result_customer = executeQuery("SELECT * FROM `retailCustomer` WHERE `idOrder` = $id_order");
    $line_customer = $result_customer->fetch_assoc();
} else {
    header("Location: home.php");
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
<main class="valid">
    <div class="banner mt-0"><h2>Informations de paiement</h2></div>
    <div class="banner"><h3>Montant de la transaction : <?php echo $line_order['amount']?> €</h3></div>  
    <div class="valid-div container text-center">
        <h2 class="mt-5">Votre paiement a été accepté.</h2>
        <p>Une confirmations de paiement et les informations relatives a la livraisons vous seront émise par email à l'adresse suivante : </p>
        <p><?php echo $line_customer['email']?></p>
        <p>La facture vous seras envoyer comme convenu a l'adresse suivante : </p>
        <p><?php if(!empty($line_customer['factuEmail'])){ echo $line_customer['factuEmail']; } else { echo $line_customer['email']; }?></p>
        <p>Nous vous conseillons de conserver vos informations de paiement.</p>
        <table class="table table-borderless">
            <tr>
                <th>Date de la transaction</th>
                <td><?php echo $line_order['dateOrder']?></td>
            </tr>
            <tr>
                <th>Numéro de la carte</th>
                <td>-</td>
            </tr>
            <tr>
                <th>Numéro de la commande</th>
                <td>#<?php echo $line_order['idOrder']?></td>
            </tr>
            <tr>
                <th>Référence de la transaction</th>
                <td>-</td>
            </tr>
        </table>
        <p>Pour toutes informations complémentaires veuillez vous rendre sur la page "<a href="<?php echo RACINE_SITE; ?>contact.php">Contact</a>" ou "<a href="<?php echo RACINE_SITE; ?>delivery.php">Livraisons & Retours</a>" du Services Clients en bas de votre écran.</p>
        <p>Merci pour votre achat !</p>
        <a href="<?php echo RACINE_SITE; ?>shop.php"><button type="button" class="btn btn-secondary mt-3 mb-5">Retour a la boutique</button></a>
    </div>
</main>
<?php include 'inc/footer.inc.php';?>